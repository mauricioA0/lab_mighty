'use strict';

const mongoose = require('mongoose');
const Schema   = mongoose.Schema;

/*
	Marca
*/

const PersonaSchema = new Schema({
	nombreCompleto: {type: String, default: '', trim: true},
	sexo: {type: String, default: '', trim: true},
	fNacimiento: {type: Date},
	tipoDocumento: {type: String, default: ''},
	nroDocumento: {type: Number, default: ''},
});

/*
	Validations
*/

PersonaSchema.path("nombreCompleto").required(true, "El nombre es requerido");
PersonaSchema.path("tipoDocumento").required(true, "El tipo de documento es requerido");
PersonaSchema.path("nroDocumento").required(true, "El numero de documento es requerido");

/*
	Metodos
*/

PersonaSchema.methods = {

	agregarPersona: function() {
		const err = this.validateSync();
    if (err && err.toString()) throw new Error(err.toString());
    return this.save();
	}

};

mongoose.model('Persona', PersonaSchema);
