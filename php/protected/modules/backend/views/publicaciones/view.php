<?php
$this->breadcrumbs=array(
	'Publicaciones'=>array('admin'),
	$model->idPublicacion,
);

$this->menu=array(

	array('label'=>'Administrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar','url'=>array('update','id'=>$model->idPublicacion),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Publicaciones</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'idPublicacion',
		
		array(
			'name'=>'idModeloPlan',
			'value'=>$model->modelos->nombreModelo,
		),

		'explicaPlan',
		'cuotasPlan',
		'explicaPlanDestacado',
		
		array(
			'name'=>'tipoPlan',
			'value'=>$model->tipoPlan,
		),

		'cambioModelo',

		array(
			'name'=>'enabledPlan',
			'value'=>($model->enabledPlan == 1) ? "SI" : "NO",
		),

		'explicaCambioModelo',
		'concePlan',
		'entrega',
		'prioridad',
		
		array(
			'name'=>'promo',
			'value'=>$model->promos->nombre_promo,
		),


		'cantCuotas',
		'vistasPda',
		'vistasP0km',
		'vistasAenC',
		'vistasCenC',
		'fechaUltimaMod',
		'slug'
	),
)); ?>
