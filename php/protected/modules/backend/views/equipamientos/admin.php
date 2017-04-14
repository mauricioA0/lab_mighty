<?php
$this->breadcrumbs=array(
	'Equipamientos'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Administrador Equipamientos</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'equipamientos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		
		array(
			'name'=>'modelo_id',
			'value'=>'$data->modelos->nombreModelo',
			'filter'=>CHtml::listData(Modelo::model()->findAll(array('order'=>'nombreModelo')), 'idModelo', 'nombreModelo')
		),

		'detalle_equip',
		'habilitar_equip',
		'seccion_equip',
		'fecha_carga_equip',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
