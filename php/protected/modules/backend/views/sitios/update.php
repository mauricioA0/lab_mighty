<?php
$this->breadcrumbs=array(
	'Sitios'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Sitios','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear Sitios','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Ver Sitios','url'=>array('view','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Admintrador Sitios','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Editar Sitio</h1>

<?php  echo $this->renderPartial('_form',array('model'=>$model,'conces'=>$conces)); ?>