'use strict';

/**
 * Module dependencies.
 */

const mongoose = require('mongoose');
const notify = require('../mailer');

// const Imager = require('imager');
// const config = require('../../config');
// const imagerConfig = require(config.root + '/config/imager.js');

const Schema = mongoose.Schema;

/**
 * Concesionario Schema
 */

const ConcesionarioSchema = new Schema({
  nombre: { type : String, default : '', trim : true },
  nombreCorto: { type : String, default : '', trim : true },
  estado: { type : Boolean, default : true },
  user: { type : Schema.ObjectId, ref : 'User' },
  marca: [{type: Schema.ObjectId, ref : 'Marca' }],
  diaCierre: { type : String, default : '01' },
  supervisor: [{
    user: { type : Schema.ObjectId, ref : 'User' },
    createdAt: { type : Date, default : Date.now }
  }],
  vendedores: [{
    user: { type : Schema.ObjectId, ref : 'User' },
    porcentaje: { type : Number, default : 0 },
    createdAt: { type : Date, default : Date.now }
  }],
  createdAt: { type : Date, default : Date.now }
});

/**
 * Validations
 */

ConcesionarioSchema.path('nombre').required(true, 'El nombre es requerido');
ConcesionarioSchema.path('nombreCorto').required(true, 'El nombre corto es requerido');
ConcesionarioSchema.path('marca').required(true, 'La marca es requerida');
/**
 * Pre-remove hook
 */

ConcesionarioSchema.pre('remove', function (next) {
  // const imager = new Imager(imagerConfig, 'S3');
  // const files = this.image.files;

  // if there are files associated with the item, remove from the cloud too
  // imager.remove(files, function (err) {
  //   if (err) return next(err);
  // }, 'article');

  next();
});

/**
 * Methods
 */

ConcesionarioSchema.methods = {


  /**
   * Save concesionario
   *
   * @api private
   */

  saveIt: function() {
    const err = this.validateSync();
    if (err && err.toString()) throw new Error(err.toString());
    return this.save();
  },

  addSupervisor: function(supervisor) {
    this.supervisor.push({
      user: supervisor
    })
  }

};

/**
 * Statics
 */

ConcesionarioSchema.statics = {

  /**
   * Find concesionario by id
   *
   * @param {ObjectId} id
   * @api private
   */

  load: function (_id) {
    return this.findOne({ _id })
      .populate('marca', 'nombre')
      .populate('marca')
      .exec();
  },

  /**
   * List concesionarios
   *
   * @param {Object} options
   * @api private
   */

  list: function (options) {
    const criteria = options.criteria || {};
    const page = options.page || 0;
    const limit = options.limit || 30;
    return this.find(criteria)
      .populate('user', 'name username')
      .sort({ createdAt: -1 })
      .limit(limit)
      .skip(limit * page)
      .exec();
  }
};

mongoose.model('Concesionario', ConcesionarioSchema);
