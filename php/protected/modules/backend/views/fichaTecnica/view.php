<?php
$this->breadcrumbs=array(
	'Ficha Tecnicas'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar FichasTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Crear FichaTecnica','url'=>array('create'),'linkOptions'=>array('class'=>'btn btn-primary'),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Editar FichaTecnica','url'=>array('update','id'=>$model->id),'linkOptions'=>array('class'=>'btn btn-primary')),
	array('label'=>'Borrar FichaTecnica','url'=>'#','linkOptions'=>array('class'=>'btn btn-primary', 'submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que quiere eliminar este elemento?')),
	array('label'=>'Administrador FichasTecnicas','url'=>array('admin'),'linkOptions'=>array('class'=>'btn btn-primary')),
);
?>

<h1>Ver Ficha Tecnica</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		
		array(
			'name'=>'modelo_id',
			'value'=>$model->modelos->nombreModelo,
		),

		array(
			'type'=>'raw',
			'name'=>'archivo_ficha',
			'value'=>CHtml::link($model->archivo_ficha, Yii::app()->request->baseUrl.FichaTecnica::$pathFicha.$model->archivo_ficha, array('target'=>'blank')),
		),


		'Habilitar_ficha',
		'fecha_carga_ficha',
	),
)); ?>
