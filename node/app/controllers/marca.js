'use strict';

const mongoose = require('mongoose');
const { wrap: async } = require('co');
const only = require('only');
const { respond, respondOrRedirect } = require('../utils');
const Marca = mongoose.model('Marca');
const assign = Object.assign;

/**
 * Load
 */

exports.load = async(function* (req, res, next, id) {
  try {
    req.marca = yield Marca.load(id);
    if (!req.marca) return next(new Error('Marca not found'));
  } catch (err) {
    return next(err);
  }
  next();
});

exports.index = async(function* (req, res) {
  const page = (req.query.page > 0 ? req.query.page : 1) - 1;
  const _id = req.query.item;
  const limit = 30;
  const options = {
    limit: limit,
    page: page
  };

  if (_id) options.criteria = { _id };

  const marcas = yield Marca.list(options);
  const count = yield Marca.count();

  respond(res, 'marcas/index', {
    title: 'Marcas',
    marcas: marcas,
    page: page + 1,
    pages: Math.ceil(count / limit)
  });
});

/**
 * New marca
 */

exports.new = function (req, res){
  res.render('marcas/new', {
    title: 'Nueva marca',
    marca: new Marca()
  });
};

/**
 * Create an marca
 */

exports.create = async(function* (req, res) {

  const marca = new Marca(only(req.body, 'nombre activo nombrePlan'));
  marca.user = req.user;

  try {
    yield marca.agregarMarca();
    respondOrRedirect({ req, res }, `/marcas/${marca._id}`, marca, {
      type: 'success',
      text: 'Correcto, creada nueva marca!'
    });
  } catch (err) {
    console.log(err.toString());
    respond(res, 'marcas/new', {
      title: marca.nombre || 'Nueva marca',
      errors: [err.toString()],
      marca
    }, 422);
  }
});

/**
 * Edit an marca
 */

exports.edit = function (req, res) {
  res.render('marcas/edit', {
    title: 'Edit ' + req.marca.nombre,
    marca: req.marca
  });
};

/**
 * Update concesionario
 */

exports.update = async(function* (req, res){
  const marca = req.marca;
  assign(marca, only(req.body, 'nombre nombreCorto diaCierre'));
  try {
    yield marca.agregarMarca();
    respondOrRedirect({ res }, `/marcas/${marca._id}`, marca);
  } catch (err) {
    respond(res, 'marcas/edit', {
      title: 'Edit ' + marca.nombre,
      errors: [err.toString()],
      marca
    }, 422);
  }
});

/**
 * Show
 */

exports.show = function (req, res){
  respond(res, 'marcas/show', {
    title: req.marca.nombre,
    marca: req.marca
  });
};

exports.destroy = async(function* (req, res) {
  yield req.marca.remove();
  respondOrRedirect({ req, res }, '/articles', {}, {
    type: 'info',
    text: 'Deleted successfully'
  });
});
