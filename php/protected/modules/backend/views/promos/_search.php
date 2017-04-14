<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'conce_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'nombre_promo',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'texto_promo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'descargar_promo',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'marca_id',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'habilitar_promo',array('class'=>'span5','maxlength'=>2)); ?>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
