<div class="col-md-12">


    <?php $form = $this->beginWidget('CActiveForm', array(
        'method'=>'post',
        'action'=>Yii::app()->createUrl('ajax-enviar-consulta'),
        'id'=>'form-consulta-detalle',
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
          'validateOnSubmit'=>true,
         )));
     ?>


    <div id="formulario">
        <h2 class="asesoresTitulo col-xs-12">Consultar un Asesor Oficial</h2>
        <p id="important"><label for="important">Important*</label><input name="important" type="text" class="inputs" id="important" value="important" required="required"></p>

        <!--PARTE 1-->
       
            <p id="primerito">
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                    <?php echo $form->textField($model, 'nombre_cons', array('class'=>'inputs form-control', 'placeholder'=>'Apellido y Nombre')); ?>
                </div>
                <?php echo $form->error($model, 'nombre_cons'); ?>
            </p>


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <?php echo $form->textField($model, 'tel_cons', array('class'=>'inputs form-control', 'placeholder'=>'Cod Área + Teléfono*')); ?>
            </div>
            <?php echo $form->error($model, 'tel_cons'); ?>


             <div>
            <?php echo $form->dropDownList($model, 'provincia_cons', CHtml::listData(Provincias::model()->findAll(array('order'=>'idProvincia')), 'provincia', 'provincia') ,array('class'=>'inputCiudad form-control', 'prompt'=>'Provincia')); ?>
            <?php echo $form->error($model, 'provincia_cons'); ?>
            </div>
        
        <!--Fin parte 1 -->

        <!--PARTE 2 -->
            <p>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                     <?php echo $form->textField($model, 'email_cons', array('class'=>'inputs form-control', 'placeholder'=>'E-mail*')); ?>
                </div>
                <?php echo $form->error($model, 'email_cons'); ?>
            </p>


            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <?php echo $form->textField($model, 'cel_cons', array('class'=>'inputs form-control', 'placeholder'=>'Cod Área + Teléfono Opcional')); ?>
            </div>
            <?php echo $form->error($model, 'cel_cons'); ?>
            
        
            <div>
                <?php echo $form->textarea($model, 'consulta_cons', array('class'=>'inputs form-control', 'rows'=>4, 'cols'=>50)); ?>
                <?php echo $form->error($model, 'consulta_cons'); ?>
            </div>

        <!--Fin parte 2 -->

        <?php echo CHtml::ajaxSubmitButton( 'Continuar', Yii::app()->createUrl('ajax-enviar-consulta'),
                array(
                'dataType'=>'json',
                'type'=>'POST',
                'data'=>'js:$("#form-consulta-detalle").serialize()',

                'success'=>'js:function(data){

                    if(data.Ok)
                    {
                        window.location=data.url;
                    }
                    
                }'),

                array('class'=>'consultar btn btn-success col-md-12 col-xs-12')
            );
        ?>

        <?php echo $form->hiddenField($model, 'publicacion_id', array('value'=>$id_modelo,'id'=>'publicacion_id')); ?>
        <?php echo $form->hiddenField($model, 'conce_id', array('value'=>$idConce,'id'=>'conce_id_consulta')); ?>
        <?php echo $form->hiddenField($model, 'tipo_plan_cons', array('value'=>$detalles->tipoPlan,'id'=>'tipo_plan_cons')); ?>
        <?php echo $form->hiddenField($model, 'nombre_plan_con', array('value'=>$nombrePlan,'id'=>'nombre_plan_con')); ?>

    </div>

    <?php $this->endWidget(); ?><div>
</div>
</div>