<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_sitio')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_sitio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_sitio')); ?>:</b>
	<?php echo CHtml::encode($data->url_sitio); ?>
	<br />


</div>