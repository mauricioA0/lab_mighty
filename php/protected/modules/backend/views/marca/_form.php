<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'marca-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->textFieldRow($model,'nombre_marca',array('class'=>'span5','maxlength'=>45)); ?><br><br>

	<?php echo $form->textFieldRow($model,'nombre_plan_marca',array('class'=>'span5','maxlength'=>100)); ?><br><br>

	<?php echo $form->textFieldRow($model,'video_marca',array('class'=>'span5','maxlength'=>255, 'placeholder' => 'Código video youtube','autocomplete' => 'off')); ?>
	<iframe id="iframe" width="360" height="200" src="https://www.youtube.com/embed/<?php echo $model->video_marca; ?>" frameborder="0" allowfullscreen style="display:<?php echo ($model->video_marca!=null) ? 'block':'none'?>"></iframe><br><br>

	<?php echo $form->labelEx($model,'orden_importancia_marca'); ?>
	<?php echo $form->dropDownList($model,'orden_importancia_marca', Marca::getPosiciones()  ,array('class'=>'span2','maxlength'=>2)); ?><br><br>

	<?php echo $form->labelEx($model,'habilitar_marca'); ?>
	<?php echo $form->dropDownList($model,'habilitar_marca', array('NO'=>'NO', 'SI'=>'SI') ,array('class'=>'span2')); ?><br><br>

	<?php //echo $form->textFieldRow($model,'listado_marca',array('class'=>'span5')); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
