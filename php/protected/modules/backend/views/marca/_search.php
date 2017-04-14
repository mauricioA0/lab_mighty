<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nombre_marca',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'video_marca',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'habilitar_marca',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre_plan_marca',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'orden_importancia_marca',array('class'=>'span5','maxlength'=>2)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
