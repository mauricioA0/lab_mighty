<?php
$this->breadcrumbs=array(
	'Megusta Publicacions'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar MegustaPublicacions','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador MegustaPublicacions','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Crear MegustaPublicacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>