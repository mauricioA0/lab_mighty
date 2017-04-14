'use strict';

const mongoose = require('mongoose');
const Schema   = mongoose.Schema;

/*
	Marca
*/

const MarcaSchema = new Schema({
	nombre: {type: String, default: '', trim: true},
	videoUrl: {type: String, default: '', trim: true},
	activo: {type: Boolean},
	nombrePlan: {type: String, default: ''}
});

/*
	Validations
*/

MarcaSchema.path("nombre").required(true, "El nombre es requerido");
MarcaSchema.path("nombrePlan").required(true, "El plan debe tener un nombre");

/*
	Metodos
*/

MarcaSchema.methods = {

	agregarMarca: function() {
		const err = this.validateSync();
    if (err && err.toString()) throw new Error(err.toString());
    return this.save();
	}

};

/*
	Statics
*/

MarcaSchema.statics = {
	  /**
   * Find marca by id
   *
   * @param {ObjectId} id
   * @api private
   */

  load: function (_id) {
    return this.findOne({ _id })
      .populate('user', 'name email username')
      .populate('comments.user')
      .exec();
  },

  // cargarMarcas: function () {
		// return this.find({})			
		// 	.sort({ createdAt: -1 })
		// 	.exec();

  // },

  cargarMarcas: function() {
    return this.find({})
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
}

mongoose.model('Marca', MarcaSchema);
