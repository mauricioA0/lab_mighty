<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_conce')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_conce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_id')); ?>:</b>
	<?php echo CHtml::encode($data->marcas->nombre_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habilitar_conce')); ?>:</b>
	<?php echo CHtml::encode($data->habilitar_conce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_corto_conce')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_corto_conce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_listado_conce')); ?>:</b>
	<?php echo CHtml::encode($data->precio_listado_conce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destacar_listado_conce')); ?>:</b>
	<?php echo CHtml::encode($data->destacar_listado_conce); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descuento_conce')); ?>:</b>
	<?php echo CHtml::encode($data->descuento_conce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	*/ ?>

</div>