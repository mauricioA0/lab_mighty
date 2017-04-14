<?php
$this->breadcrumbs=array(
	'Ficha Tecnicas',
);

$this->menu=array(
	array('label'=>'Crear FichaTecnica','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador FichaTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ficha Tecnica</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
