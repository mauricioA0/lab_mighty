<?php
$this->breadcrumbs=array(
	'Colores'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar Colores','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear Color','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);

?>

<h1>Administrador de Colores</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'colores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		array(
			'name'=>'modelo_id',
			'value'=>'$data->modelos->nombreModelo',
			'filter'=>CHtml::listData(Modelo::model()->findAllByAttributes(array('enabledModelo'=>'1'), array('order'=>'nombreModelo')), 'idModelo', 'nombreModelo'),
		),
		
		'nombre_color',
		'hexa_color',
		'habilitar_color',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
