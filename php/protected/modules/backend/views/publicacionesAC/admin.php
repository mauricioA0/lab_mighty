<?php
$this->breadcrumbs=array(
	'Publicaciones AC'=>array('admin'),
	'Administrador',
);

$this->menu=array(

);

?>

<h1>Administrador Publicaciones AC</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'publicaciones-ac-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(


		array(
			'name'=>'idModeloAC',
			'value'=>'$data->modelos->nombreModelo',
			'filter'=>CHtml::listData(Modelo::model()->findAll(array('order'=>'nombreModelo')), 'idModelo', 'nombreModelo'),
		),


		array(
			'name'=>'tipoAC',
			'value'=>'$data->tipoAC',
			'filter'=>CHtml::listData(TipoPlanAc::model()->findAll(array('order'=>'nombre_planac')), 'nombre_planac', 'nombre_planac'),
		),
		/*
		'enabledAC',
		'reventaAC',
		'prioridad',
		'cantCuotasAC',
		'valorAC',
		'estadoPlan',
		'cantConsultas',
		'cambioModeloAC',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
