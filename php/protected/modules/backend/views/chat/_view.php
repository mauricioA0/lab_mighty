<?php
/* @var $this ChatController */
/* @var $data Chat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sitio')); ?>:</b>
	<?php echo CHtml::encode($data->sitio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dia')); ?>:</b>
	<?php echo CHtml::encode($data->dia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h_desde')); ?>:</b>
	<?php echo CHtml::encode($data->h_desde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('h_hasta')); ?>:</b>
	<?php echo CHtml::encode($data->h_hasta); ?>
	<br />


</div>