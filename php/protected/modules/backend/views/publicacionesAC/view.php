<?php
$this->breadcrumbs=array(
	'Publicaciones AC'=>array('admin'),
	$model->idPublicacionAC,
);

$this->menu=array(

	array('label'=>'Administrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Publicaciones AC</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idPublicacionAC',

		array(
			'name'=>'idModeloAC',
			'value'=>$model->modelos->nombreModelo,
		),

		'explicaAC',
		'promedioCuotasAC',
		'explicaACDestacado',
		
		array(
			'name'=>'tipoAC',
			'value'=>$model->tipoAC,
		),


		array(
			'name'=>'enabledAC',
			'value'=>($model->enabledAC == 1) ? "SI" : "NO",
		),

		'reventaAC',
		'prioridad',
		'cantCuotasAC',
		'valorAC',
	
		array(
			'name'=>'estadoPlan',
			'value'=>($model->estadoPlan == 1) ? "SI" : "NO",
		),

		'cantConsultas',
		'cambioModeloAC',
	),
)); ?>
