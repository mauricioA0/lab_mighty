<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modelo_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre_color',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'hexa_color',array('class'=>'span5','maxlength'=>25)); ?>

	<?php echo $form->textFieldRow($model,'habilitar_color',array('class'=>'span5','maxlength'=>2)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>