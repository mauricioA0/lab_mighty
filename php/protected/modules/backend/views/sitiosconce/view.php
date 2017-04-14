<?php
$this->breadcrumbs=array(
	'Sitiosconces'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Sitiosconces','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear Sitiosconce','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar Sitiosconce','url'=>array('update','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar Sitiosconce','url'=>'#','linkOptions'=>array('class'=>'btn btn-primary', 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador Sitiosconces','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Sitiosconce #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sitio_id',
		'conce_id',
	),
)); ?>
