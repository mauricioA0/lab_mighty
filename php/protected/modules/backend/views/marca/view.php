<?php
$this->breadcrumbs=array(
	'Marcas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Marcas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear Marca','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar Marca','url'=>array('update','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar Marca','url'=>'#','linkOptions'=>array('class'=>'btn btn-primary', 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador Marcas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Marca</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre_marca',
		'video_marca',
		'habilitar_marca',
		'nombre_plan_marca',
		'orden_importancia_marca',
	),
)); ?>
