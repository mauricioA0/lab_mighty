<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nombre_conce',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'marca_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'habilitar_conce',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre_corto_conce',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'precio_listado_conce',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'destacar_listado_conce',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'descuento_conce',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
