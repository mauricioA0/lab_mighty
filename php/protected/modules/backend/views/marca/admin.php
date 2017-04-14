<?php
$this->breadcrumbs=array(
	'Marcas'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('marca-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Marcas</h1><br>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'marca-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
		'nombre_marca',
		'habilitar_marca',
		'nombre_plan_marca',
		'orden_importancia_marca',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
