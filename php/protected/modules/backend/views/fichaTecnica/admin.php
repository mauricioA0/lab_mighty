<?php
$this->breadcrumbs=array(
	'Ficha Tecnica'=>array('admin'),
	'Administrador',
);

$this->menu=array(
	array('label'=>'Listar FichasTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear FichaTecnica','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary')),
);

?>

<h1>Administrador Ficha Tecnica</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'ficha-tecnica-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',

		array(
			'name'=>'modelo_id',
			'value'=>'$data->modelos->nombreModelo',
			'filter'=>CHtml::listData(Modelo::model()->findAllByAttributes(array('enabledModelo'=>'1')), 'idModelo', 'nombreModelo'),
		),
		

		'archivo_ficha',
		'Habilitar_ficha',

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
