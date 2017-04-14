<?php
$this->breadcrumbs=array(
	'Colores'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Coloress','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador Coloress','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Crear Colores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>