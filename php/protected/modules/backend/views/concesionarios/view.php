<?php
$this->breadcrumbs=array(
	'Concesionarioses'=>array('admin'),
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

<h1>Ver Concesionarios</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre_conce',


		array(
			'name'=>'marca_id',
			'value'=>$model->marcas->nombre_marca
		),

		'habilitar_conce',
		'nombre_corto_conce',
		'precio_listado_conce',
		'destacar_listado_conce',
		'descuento_conce',
		'slug',
	),
)); ?>

<label>Este concesionario se visualiza en los siguientes sitios web:</label>

<?php $sitios = Sitiosconce::model()->findAllByAttributes(array('conce_id'=>$model->id)); ?>

<ul class="nav nav-stacked">
	<?php foreach($sitios as $sitio): ?>
	<li><span><a href="<?php echo 'http://'.$sitio->sitios->url_sitio; ?>" target="blank"><?php echo $sitio->sitios->url_sitio; ?></a></span></li>
	<?php endforeach; ?>
</ul>