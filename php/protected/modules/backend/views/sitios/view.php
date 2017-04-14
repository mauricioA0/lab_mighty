<?php
$this->breadcrumbs=array(
	'Sitios'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Sitios','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear Sitios','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar Sitios','url'=>array('update','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar Sitios','url'=>'#','linkOptions'=>array('class'=>'btn btn-danger', 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador Sitioss','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Sitios</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre_sitio',
		'url_sitio',
	),
)); ?>
