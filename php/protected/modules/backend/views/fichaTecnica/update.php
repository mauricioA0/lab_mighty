<?php
$this->breadcrumbs=array(
	'Ficha Tecnicas'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar FichasTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear FichaTecnica','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Ver FichaTecnica','url'=>array('view','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Admintrador FichasTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Editar Ficha Tecnica</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>