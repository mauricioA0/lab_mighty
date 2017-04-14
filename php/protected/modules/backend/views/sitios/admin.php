<?php
$this->breadcrumbs=array(
	'Sitios'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar Sitios','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear Sitios','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);


?>

<h1>Administrador Sitios</h1>


<br>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'sitios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'nombre_sitio',
		'url_sitio',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
