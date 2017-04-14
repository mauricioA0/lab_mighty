<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo_id')); ?>:</b>
	<?php echo CHtml::encode($data->modelo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo_ficha')); ?>:</b>
	<?php echo CHtml::encode($data->archivo_ficha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Habilitar_ficha')); ?>:</b>
	<?php echo CHtml::encode($data->Habilitar_ficha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_carga_ficha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_carga_ficha); ?>
	<br />


</div>