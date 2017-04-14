<?php
$this->breadcrumbs=array(
	'Planes'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Admintrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Editar Planes AC</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>