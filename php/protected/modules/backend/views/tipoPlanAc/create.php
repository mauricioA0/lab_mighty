<?php
$this->breadcrumbs=array(
	'Planes'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Crear Planes AC</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>