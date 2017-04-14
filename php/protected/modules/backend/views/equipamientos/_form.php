<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'equipamientos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->labelEx($model,'modelo_id'); ?>
	<?php echo $form->dropDownList($model,'modelo_id', CHtml::listData(Modelo::model()->findAll(array('order'=>'nombreModelo ASC')), 'idModelo', 'nombreModelo') ,array('class'=>'span5')); ?><br><br>

	<?php echo $form->textField($model,'detalle_equip',array('size'=>70, 'class'=>'span8')); ?><br><br>

        <?php echo $form->labelEx($model,'seccion_equip'); ?>
	<?php echo $form->dropDownList($model,'seccion_equip', CHtml::listData(Equipamientos::model()->findAll(array('order'=>'seccion_equip ASC','group'=>'seccion_equip')), 'seccion_equip', 'seccion_equip') ,array('class'=>'span5')); ?><br><br>
        
        
	<?php echo $form->labelEx($model,'habilitar_equip'); ?>
	<?php echo $form->dropDownList($model,'habilitar_equip', array('NO'=>'NO', 'SI'=>'SI') ,array('class'=>'span2','maxlength'=>2)); ?><br><br>

	<?php echo $form->labelEx($model,'fecha_carga_equip'); ?>
	<?php echo $form->dateField($model,'fecha_carga_equip',array('class'=>'span5', 'value'=>date('Y-m-d'))); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
