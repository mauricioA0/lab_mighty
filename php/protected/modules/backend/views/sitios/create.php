<?php
$this->breadcrumbs=array(
	'Sitios'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Sitios','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador Sitios','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Crear Sitios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>