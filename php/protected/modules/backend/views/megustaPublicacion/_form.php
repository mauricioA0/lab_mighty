<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'megusta-publicacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->textFieldRow($model,'publicacion_id',array('class'=>'span5')); ?><br><br>

	<?php echo $form->textFieldRow($model,'cantidad_megusta',array('class'=>'span5','maxlength'=>10)); ?><br><br>

	<?php echo $form->textFieldRow($model,'ip_megusta',array('class'=>'span5','maxlength'=>25)); ?><br><br>

	<?php echo $form->textFieldRow($model,'fecha_megusta',array('class'=>'span5')); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
