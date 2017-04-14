<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo_id')); ?>:</b>
	<?php echo CHtml::encode($data->modelo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_color')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hexa_color')); ?>:</b>
	<?php echo CHtml::encode($data->hexa_color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habilitar_color')); ?>:</b>
	<?php echo CHtml::encode($data->habilitar_color); ?>
	<br />


</div>