<?php
$this->breadcrumbs=array(
	'Publicaciones'=>array('admin'),
	$model->idPublicacion=>array('view','id'=>$model->idPublicacion),
	'Editar',
);

$this->menu=array(
	array('label'=>'Ver','url'=>array('view','id'=>$model->idPublicacion),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Admintrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Editar Publicaciones</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>