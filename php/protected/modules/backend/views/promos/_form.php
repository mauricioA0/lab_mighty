<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'promos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->labelEx($model,'conce_id'); ?>
	<?php echo $form->dropDownList($model,'conce_id', CHtml::listData(Concesionarios::model()->findAll(array('order'=>'nombre_conce ASC')), 'id', 'nombre_conce') ,array('class'=>'span5')); ?><br><br>

	<?php echo $form->textFieldRow($model,'nombre_promo',array('class'=>'span5','maxlength'=>100)); ?><br><br>

	<?php echo $form->textFieldRow($model,'texto_promo',array('class'=>'span5','maxlength'=>100)); ?><br><br>

	<?php echo $form->textAreaRow($model,'descargar_promo',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?><br><br>

	<?php echo $form->labelEx($model,'marca_id'); ?>
	<?php echo $form->dropDownList($model,'marca_id', CHtml::listData(Marca::model()->findAll(array('order'=>'nombre_marca ASC')), 'id', 'nombre_marca') ,array('class'=>'span3','maxlength'=>45)); ?><br><br>

	<?php echo $form->labelEx($model,'habilitar_promo'); ?>
	<?php echo $form->dropDownList($model,'habilitar_promo', array('NO'=>'NO', 'SI'=>'SI') ,array('class'=>'span2','maxlength'=>2)); ?><br><br>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>100)); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
