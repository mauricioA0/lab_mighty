'use strict';

const mongoose = require('mongoose');
const { wrap: async } = require('co');
const only = require('only');
const { respond, respondOrRedirect, isAdminOrManager } = require('../utils');
const Concesionario = mongoose.model('Concesionario');
const Marca = mongoose.model('Marca');
const User = mongoose.model("User");
const assign = Object.assign;

/**
 * Load
 */

exports.load = async(function* (req, res, next, id) {
  try {
    req.concesionario = yield Concesionario.load(id);
    if (!req.concesionario) return next(new Error('Concesionario not found'));
  } catch (err) {
    return next(err);
  }
  next();
});

exports.index = async(function* (req, res) {

  let user = req.user;
  let puedeABM = isAdminOrManager(user);

  const page = (req.query.page > 0 ? req.query.page : 1) - 1;
  const _id = req.query.item;
  const limit = 30;
  const options = {
    limit: limit,
    page: page
  };

  if (_id) options.criteria = { _id };

  const concesionarios = yield Concesionario.list(options);
  const count = yield Concesionario.count();

  respond(res, 'concesionarios/index', {
    title: 'Concesionarios',
    concesionarios: concesionarios,
    page: page + 1,
    pages: Math.ceil(count / limit),
    puedeABM: puedeABM
  });
});

/**
 * New concesionario
 */

exports.new = async(function* (req, res){

  const marcas = yield Marca.cargarMarcas();
  const supervisors = yield User.getSupervisors();
  const vendedores = yield User.getVendedores();

  res.render('concesionarios/new', {
      title: 'Nuevo Concesionario',
      concesionario: new Concesionario(),
      marcas: marcas,
      supervisores: supervisors,
      vendedores: vendedores
    });

});

/**
 * Create an concesionario
 */

exports.create = async(function* (req, res) {

  const concesionario = new Concesionario(only(req.body, 'nombre nombreCorto marca diaCierre'));
  concesionario.user = req.user;
  concesionario.supervisor = {user: req.body.supervisor};
  for (var i = 0; i < req.body.vendedores.length; i++) {
    concesionario.vendedores.push({user: req.body.vendedores[i]});
  }
  try {
    yield concesionario.saveIt();

    respondOrRedirect({ req, res }, `/concesionarios/${concesionario._id}`, concesionario, {
      type: 'success',
      text: 'Correcto, creada nueva concesionario!'
    });
  } catch (err) {
    console.log(err.toString());

    const errors = Object.keys(err.errors)
      .map(field => err.errors[field].message);

    respond(res, 'concesionarios/new', {
      title: concesionario.nombre || 'Nuevo concesionario',
      errors,
      concesionario
    }, 422);
  }
});

/**
 * Edit an concesionario
 */

exports.edit = async(function* (req, res) {

  const marcas = yield Marca.cargarMarcas();
  const supervisors = yield User.getSupervisors();
  const vendedores = yield User.getVendedores();


  /*

    TO-DO

    1- cargar marcas, supervisores y vendedores en el edit
    2- mostrar los valores del concesionario a editar


  */

  console.log(req.user);
  console.log(req.concesionario);
  console.log(req.concesionario.marca);

  res.render('concesionarios/edit', {
    title: 'Edit ' + req.concesionario.nombre,
    concesionario: req.concesionario,
    marcas: marcas,
    supervisores: supervisors,
    vendedores: vendedores,
  });
});

/**
 * Update concesionario
 */

exports.update = async(function* (req, res){
  const concesionario = req.concesionario;
  assign(concesionario, only(req.body, 'nombre nombreCorto marca diaCierre supervisor vendedores'));
  concesionario.supervisor = {user: req.body.supervisor};
  for (var i = 0; i < req.body.vendedores.length; i++) {
    concesionario.vendedores.push({user: req.body.vendedores[i]});
  }
  try {
    yield concesionario.save();
    respondOrRedirect({ res }, `/concesionarios/${concesionario._id}`, concesionario);
  } catch (err) {
    respond(res, 'concesionarios/edit', {
      title: 'Edit ' + concesionario.title,
      errors: [err.toString()],

      concesionario
    }, 422);
  }
});

/**
 * Show
 */

exports.show = function (req, res){
  respond(res, 'concesionarios/show', {
    title: req.concesionario.nombre,
    concesionario: req.concesionario
  });
};

exports.destroy = async(function* (req, res) {
  yield req.concesionario.remove();
  respondOrRedirect({ req, res }, '/concesionarios', {}, {
    type: 'info',
    text: 'Deleted successfully'
  });
});