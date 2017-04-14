<?php
$this->breadcrumbs=array(
	'Publicaciones'=>array('admin'),
	'Administrador',
);

$this->menu=array(

	array('label'=>'Generar slug','url'=>array('slug'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Administrador Publicaciones</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'publicaciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		array(
			'name'=>'idModeloPlan',
			'value'=>'$data->modelos->nombreModelo',
			'filter'=>CHtml::listData(Modelo::model()->findAll(array('order'=>'nombreModelo')), 'idModelo', 'nombreModelo'),
		),


		array(
			'name'=>'tipoPlan',
			'value'=>'$data->tipoPlan',
			'filter'=>CHtml::listData(TipoPlan::model()->findAll(array('order'=>'nombre_plan')), 'nombre_plan', 'nombre_plan'),
		),

		array(
			'name'=>'concePlan',
			'value'=>'$data->concesionarios->nombre_conce',
			'filter'=>CHtml::listData(Concesionarios::model()->findAll(array('order'=>'nombre_conce')), 'id', 'nombre_conce'),
		),




		/*
		'cambioModelo',
		'enabledPlan',
		'explicaCambioModelo',
		'concePlan',
		'entrega',
		'prioridad',
		'promo',
		'cantCuotas',
		'vistasPda',
		'vistasP0km',
		'vistasAenC',
		'vistasCenC',
		'fechaUltimaMod',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view} {update}',
		),
	),
)); ?>
