<?php
$this->breadcrumbs=array(
	'Concesionarios'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);


?>

<h1>Administrador Conceionarios en Sitios Web</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'sitiosconce-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	

		
		array(
			'name'=>'conce_id',
			'value'=>'$data->concesionarios->nombre_conce',
			'filter'=>CHtml::listData(Concesionarios::model()->findAll(), 'id', 'nombre_conce'),
		),

		array(
			'name'=>'sitio_id',
			'value'=>'$data->sitios->nombre_sitio',
			'filter'=>CHtml::listData(Sitios::model()->findAll(), 'id', 'nombre_sitio'),
		),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
