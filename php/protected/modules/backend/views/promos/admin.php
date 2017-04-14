<?php
$this->breadcrumbs=array(
	'Promos'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);

?>

<h1>Administrador Promos</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
		'nombre_promo',

		array(
			'name'=>'conce_id',
			'value'=>'$data->concesionarios->nombre_conce',
			'filter'=>CHtml::listData(Concesionarios::model()->findAll(array('order'=>'nombre_conce ASC')), 'id', 'nombre_conce'),
		),

		array(
			'name'=>'marca_id',
			'value'=>'$data->marcas->nombre_marca',
			'filter'=>CHtml::listData(Marca::model()->findAll(array('order'=>'nombre_marca ASC')), 'id', 'nombre_marca'),
		),
		/*
		'habilitar_promo',
		'slug',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
