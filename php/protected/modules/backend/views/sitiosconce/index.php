<?php
$this->breadcrumbs=array(
	'Sitiosconces',
);

$this->menu=array(
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Concesionarios en Sitios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
