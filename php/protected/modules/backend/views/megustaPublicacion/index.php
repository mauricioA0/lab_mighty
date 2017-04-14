<?php
$this->breadcrumbs=array(
	'Megusta Publicacions',
);

$this->menu=array(
	array('label'=>'Crear MegustaPublicacion','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador MegustaPublicacions','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Megusta Publicacions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
