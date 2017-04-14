<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('conce_id')); ?>:</b>
	<?php echo CHtml::encode($data->concesionarios->nombre_conce); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_promo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_promo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_promo')); ?>:</b>
	<?php echo CHtml::encode($data->texto_promo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descargar_promo')); ?>:</b>
	<?php echo CHtml::encode($data->descargar_promo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_id')); ?>:</b>
	<?php echo CHtml::encode($data->marcas->nombre_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('habilitar_promo')); ?>:</b>
	<?php echo CHtml::encode($data->habilitar_promo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	*/ ?>

</div>