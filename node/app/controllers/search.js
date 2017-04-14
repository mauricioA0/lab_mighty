'use strict';

exports.busquedas = function(req, res) {
	res.render('busquedas/busquedas', {});
}

exports.nuevaConsulta = function (req, res) {
	res.render('busquedas/nueva_consulta', {});
}