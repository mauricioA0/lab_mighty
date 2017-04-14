<?php
$this->breadcrumbs=array(
	'Ficha Tecnicas'=>array('admin'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar FichaTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Administrador FichaTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Crear Ficha Tecnica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>