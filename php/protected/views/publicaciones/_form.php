<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'publicaciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'idModeloPlan',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'explicaPlan',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cuotasPlan',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'explicaPlanDestacado',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'tipoPlan',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'cambioModelo',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldRow($model,'enabledPlan',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'explicaCambioModelo',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'concePlan',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'entrega',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'prioridad',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'promo',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'cantCuotas',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'vistasPda',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'vistasP0km',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'vistasAenC',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'vistasCenC',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fechaUltimaMod',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'descuentoSuscrip',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
