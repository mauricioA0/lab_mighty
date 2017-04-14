<?php
$this->breadcrumbs=array(
	'Modelos'=>array('admin'),
	'Administrador',
);


?>

<h1>Lista de Modelos</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'modelo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'precio0kmModelo',
		'nombreModelo',

		array(
			'name'=>'idMarcaModelo',
			'value'=>'$data->marcas->nombre_marca',
			'filter'=>CHtml::listData(Marca::model()->findAll(), 'id', 'nombre_marca'),
		),


		array(
			'name'=>'enabledModelo',
			'value'=>'($data->enabledModelo == 1) ? "SI" : "NO"',
		),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
    		 'template'=>'{view}',
		),
	),
)); ?>
