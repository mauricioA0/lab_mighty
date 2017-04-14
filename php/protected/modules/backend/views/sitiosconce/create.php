<?php
$this->breadcrumbs=array(
	'Concesionarios'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Agregar Concesionario a Sitios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>