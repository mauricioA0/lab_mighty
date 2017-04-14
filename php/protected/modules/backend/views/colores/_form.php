<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'colores-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->labelEx($model,'modelo_id'); ?>
	<?php echo $form->dropDownList($model,'modelo_id', array(CHtml::listData(Modelo::model()->findAllByAttributes(array('enabledModelo'=>'1'), array('order'=>'nombreModelo')), 'idModelo', 'nombreModelo')) ,array('class'=>'span5')); ?><br><br>


	
    <?php echo $form->textFieldRow($model,'hexa_color',array('class'=>'span5','maxlength'=>25)); ?><br><br>
    
   	<?php $this->widget('application.extensions.colorpicker.EColorPicker', 
      array(
            'name'=>'hexa_color',
                    'mode'=>'flat',
                    'curtain' => true,
           )
    ); ?>
	<br><br>

	<?php echo $form->textFieldRow($model,'nombre_color',array('class'=>'span5','maxlength'=>25)); ?><br><br>

	

	<?php echo $form->textFieldRow($model,'habilitar_color',array('class'=>'span5','maxlength'=>2)); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>


