<?php
$this->breadcrumbs=array(
	'Concesionarios'=>array('admin'),
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
	$.fn.yiiGridView.update('concesionarios-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrador Concesionarios</h1><br>


<?php 

        $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'concesionarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre_conce',

		array(
			'name'=>'marca_id',
			'value'=>'$data->marcas->nombre_marca',
			'filter'=>CHtml::listData(Marca::model()->findAll(), 'id', 'nombre_marca')
			),
     

		'habilitar_conce',

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
