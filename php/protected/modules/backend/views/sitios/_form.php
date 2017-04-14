<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'sitios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?><br><br>

	<?php echo $form->textFieldRow($model,'nombre_sitio',array('class'=>'span5','maxlength'=>100)); ?><br><br>

	<?php echo $form->textFieldRow($model,'url_sitio',array('class'=>'span5','maxlength'=>100)); ?><br><br>
        
	<?php echo $form->textFieldRow($model,'descripcion_prov',array('class'=>'span5','maxlength'=>100)); ?><br><br>

        <?php 
            if(count($conces)){
        ?>
        <table class="items table">
            <tr>
                <th>Concesionaria</th>
                <th>Marca</th>
                <th>Eliminar</th>
            </tr>
        
        <?php 
                foreach ( $conces as $mi_conce ){
                    echo '<tr><td>'.$mi_conce->concesionarios->nombre_conce.'</td><td>'.$mi_conce->concesionarios->marcas->nombre_marca.'</td>';
                    echo '<td><a class="delete" title="Borrar" rel="tooltip" href="'.Yii::app()->createUrl('/backend/sitiosconce/delete/'.$mi_conce->id).'"><i class="icon-trash"></i></a></td>';
                }
        ?>
        </table>
        <?php
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
