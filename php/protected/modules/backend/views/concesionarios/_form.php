<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'concesionarios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->textFieldRow($model,'nombre_conce',array('class'=>'span5','maxlength'=>45)); ?><br><br>

	<?php echo $form->textFieldRow($model,'nombre_corto_conce',array('class'=>'span5','maxlength'=>45)); ?><br><br>

	<?php echo $form->labelEx($model,'marca_id'); ?>
	<?php echo $form->dropDownList($model,'marca_id', CHtml::listData(Marca::model()->findAll(), 'id', 'nombre_marca') ,array('class'=>'span5')); ?><br><br>


	<?php echo $form->textFieldRow($model,'precio_listado_conce',array('class'=>'span5','maxlength'=>10)); ?><br><br>

	<?php echo $form->labelEx($model,'destacar_listado_conce'); ?>
	<?php echo $form->dropDownList($model,'destacar_listado_conce', array('NO'=>'NO', 'SI'=>'SI')  ,array('class'=>'span2','maxlength'=>2)); ?><br><br>


	<?php echo $form->textFieldRow($model,'descuento_conce',array('class'=>'span5','maxlength'=>10)); ?><br><br>


	<label><span>Agregar a sitio Web</span></label>
	<?php 
		try
		{
		    $this->widget('application.extensions.asmselectex.EAsmSelectEx',
		        array(
		            'name' => 'Sitiosconce[sitio_id]',
		            'data' => CHtml::listData(Sitios::model()->findAll(), 'id', 'nombre_sitio'),
		            'selected' => CHtml::listData(Sitiosconce::model()->findAllByAttributes(array('conce_id'=>$model->id)), 'id', 'sitio_id'),
		            'htmlOptions' => array('title'=>"SELECCIONAR SITIO WEB"),
		            'scriptOptions' => array('addItemTarget'=>'top',
		                                     'animate'=>true,
		                                     'highlight'=>true,
		                                     'sortable'=>false),
		        )
		    );
		} 
		catch (Exception $e) 
		{
		    echo 'Caught Exception: ' .  $e->getMessage() . "<br />\n";
		}
	?>
	<br><br>


	<?php echo $form->labelEx($model,'habilitar_conce'); ?>
	<?php echo $form->dropDownList($model,'habilitar_conce', array('NO'=>'NO', 'SI'=>'SI') ,array('class'=>'span2')); ?><br><br>

	<?php echo $form->textFieldRow($model,'slug',array('class'=>'span5','maxlength'=>100)); ?><br><br>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
