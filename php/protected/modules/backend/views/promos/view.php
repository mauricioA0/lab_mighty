<?php
$this->breadcrumbs=array(
	'Promos'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar','url'=>array('update','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar','url'=>'#','linkOptions'=>array('class'=>'btn btn-primary', 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Promos</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		
		array(
			'name'=>'conce_id',
			'value'=>$model->concesionarios->nombre_conce,
		),

		array(
			'name'=>'marca_id',
			'value'=>$model->marcas->nombre_marca,
		),

		'nombre_promo',
		'texto_promo',
		'descargar_promo',
		'habilitar_promo',
		'slug',
	),
)); ?>
