'use strict';

const mongoose = require('mongoose');
const Schema   = mongoose.Schema;

/*
	Modelos
*/

const ModelosSchema = new Schema({
  nombre: {type: String, default: '', trim: true},
  equipamento: {type: String, default: ''},
  marca: {type: Schema.ObjectId, ref: 'Marca'},
  activo: {type: Boolean},
  clase: {type: String, default: '', trim: true},
  videoUrl: {type: String, default: ''},
  etiquetas: {type: Schema.ObjectId, ref: 'Etiquetas'},
  nombreDirectorio: {type: String, default: ''},
  urlLink: {type: String, default: ''},
  colores: {type: String, default: ''},
	precios: [{
    user: { type : Schema.ObjectId, ref : 'User' },
    precio: { type : Number, default : 0 },
    createdAt: { type : Date, default : Date.now }
  }]
});

/*
	Metodos
*/

ModelosSchema.methods = {

	agregarModelo: function() {
		return this.save();
	}

};

mongoose.model('Modelo', ModelosSchema);
