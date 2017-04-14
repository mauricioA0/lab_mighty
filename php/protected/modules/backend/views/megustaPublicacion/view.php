<?php
$this->breadcrumbs=array(
	'Megusta Publicacions'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar MegustaPublicacions','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear MegustaPublicacion','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar MegustaPublicacion','url'=>array('update','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar MegustaPublicacion','url'=>'#','linkOptions'=>array('class'=>'btn btn-primary', 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador MegustaPublicacions','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver MegustaPublicacion #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'publicacion_id',
		'cantidad_megusta',
		'ip_megusta',
		'fecha_megusta',
	),
)); ?>
