<?php
$this->breadcrumbs=array(
	'Megusta'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);

?>

<h1>Administrador MeGusta</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'megusta-publicacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
		'publicacion_id',
		'cantidad_megusta',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
