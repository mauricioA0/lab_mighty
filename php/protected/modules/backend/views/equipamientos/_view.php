<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo_id')); ?>:</b>
	<?php echo CHtml::encode($data->modelos->nombreModelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_equip')); ?>:</b>
	<?php echo CHtml::encode($data->detalle_equip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habilitar_equip')); ?>:</b>
	<?php echo CHtml::encode($data->habilitar_equip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_carga_equip')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_carga_equip); ?>
	<br />


</div>