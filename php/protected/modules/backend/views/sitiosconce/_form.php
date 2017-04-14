<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sitiosconce-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>


	<?php echo $form->labelEx($model,'conce_id'); ?>
	<?php echo $form->dropDownList($model,'conce_id',  CHtml::listData(Concesionarios::model()->findAll(), 'id', 'nombre_conce') ,array('class'=>'span5')); ?><br><br>

	<?php
		if($model->isNewRecord )
		{
			echo $form->dropDownListRow($model, 'sitio_id', CHtml::listData(Sitios::model()->findAll(), 'id', 'nombre_sitio'), array('multiple' => 'multiple', 'class' => 'span5'));
		}
		else{
			
			try
			{
			    $this->widget('application.extensions.asmselectex.EAsmSelectEx',
			        array(
			            'name' => 'Sitiosconce[sitio_id]',
			            'data' => CHtml::listData(Sitios::model()->findAll(), 'id', 'nombre_sitio'),
			            'selected' => CHtml::listData(Sitiosconce::model()->findAllByAttributes(array('conce_id'=>$model->conce_id)), 'id', 'sitio_id'),
			            'htmlOptions' => array('title'=>"SELECCIONAR SITIO"),
			            'scriptOptions' => array('addItemTarget'=>'bottom',
			                                     'animate'=>true,
			                                     'highlight'=>true,
			                                     'sortable'=>false)
			        )
			    );
			} 
			catch (Exception $e) 
			{
			    echo 'Caught Exception: ' .  $e->getMessage() . "<br />\n";
			}
		}

	?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

