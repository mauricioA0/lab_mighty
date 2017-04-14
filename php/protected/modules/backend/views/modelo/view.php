<?php
$this->breadcrumbs=array(
	'Modelos'=>array('admin'),
	$model->idModelo,
);

$this->menu=array(
	array('label'=>'Lista de Modelos','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Modelo</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idModelo',
		'precio0kmModelo',
		'nombreModelo',
		'equipamientoModelo',
		
		array(
			'name'=>'idMarcaModelo',
			'value'=>$model->marcas->nombre_marca,
		),


		array(
			'name'=>'enabledModelo',
			'value'=>($model->enabledModelo == 1) ? "SI" : "NO",
		),

		'claseModelo',
		'videoModelo',
		'tagsModelo',
		'nombreDirectorio',
		'urlLink',
		'coloresModelo',
		'claseModeloDos',
		'nivelModelo',
		'votPos',
		'votNeg',
		'ip',
	),
)); ?>
