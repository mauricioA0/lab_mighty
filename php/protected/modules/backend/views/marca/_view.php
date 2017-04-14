<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_marca')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_marca')); ?>:</b>
	<?php echo CHtml::encode($data->video_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habilitar_marca')); ?>:</b>
	<?php echo CHtml::encode($data->habilitar_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_plan_marca')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_plan_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden_importancia_marca')); ?>:</b>
	<?php echo CHtml::encode($data->orden_importancia_marca); ?>
	<br />


</div>