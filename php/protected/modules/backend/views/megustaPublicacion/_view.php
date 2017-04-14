<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publicacion_id')); ?>:</b>
	<?php echo CHtml::encode($data->publicacion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_megusta')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_megusta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ip_megusta')); ?>:</b>
	<?php echo CHtml::encode($data->ip_megusta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_megusta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_megusta); ?>
	<br />


</div>