<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_plan')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_plan')); ?>:</b>
	<?php echo CHtml::encode($data->detalle_plan); ?>
	<br />


</div>