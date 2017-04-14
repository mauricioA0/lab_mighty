<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'ficha-tecnica-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	
	<?php echo $form->labelEx($model,'modelo_id'); ?>
	<?php echo $form->dropDownList($model,'modelo_id', array(CHtml::listData(Modelo::model()->findAllByAttributes(array('enabledModelo'=>'1'), array('order'=>'nombreModelo')), 'idModelo', 'nombreModelo')) ,array('class'=>'span5')); ?><br><br>



	<!--ARCHIVO-->
	<?php echo $form->labelEx($model,'archivo_ficha'); ?>

	<?php if(!$model->isNewRecord): ?>

	<a href="<?php echo Yii::app()->request->baseUrl.FichaTecnica::$pathFicha.$model->archivo_ficha; ?>" target="blank">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-pdf.png">
	</a><br>

	<span>
		<a href="<?php echo Yii::app()->request->baseUrl.FichaTecnica::$pathFicha.$model->archivo_ficha; ?>" target="blank">
			<?php echo $model->archivo_ficha; ?>
		</a>
	</span><br><br>

	<?php endif; ?>

	<?php echo $form->fileField($model,'archivo_ficha',array('class'=>'span5','maxlength'=>100)); ?><br><br><br>
	<!--fin archivo-->



	<?php echo $form->labelEx($model,'Habilitar_ficha'); ?>
	<?php echo $form->dropDownList($model,'Habilitar_ficha', array('NO'=>'NO', 'SI'=>'SI') ,array('class'=>'span2','maxlength'=>2)); ?><br><br>

	<?php echo $form->labelEx($model,'fecha_carga_ficha'); ?>
	<?php echo $form->dateField($model,'fecha_carga_ficha',array('class'=>'span5',)); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
