<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sitio_id')); ?>:</b>
	<?php echo CHtml::encode($data->sitio_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conce_id')); ?>:</b>
	<?php echo CHtml::encode($data->conce_id); ?>
	<br />


</div>