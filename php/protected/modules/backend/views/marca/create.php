<?php
$this->breadcrumbs=array(
	'Marcas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Marcas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador Marcas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Crear Marca</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>