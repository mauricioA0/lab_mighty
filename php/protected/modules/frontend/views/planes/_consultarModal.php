
<div class="col-md-12">


    <?php $form = $this->beginWidget('CActiveForm', array(
        'method'=>'post',
        'id'=>'form-consulta',
        'enableAjaxValidation'=>true,
        'clientOptions'=>array(
          'validateOnSubmit'=>true,
         )));
     ?>


    <div id="formulario">
        <h2 class="asesoresTitulo col-xs-12">Consultar un Asesor Oficial</h2>
        <p id="important"><label for="important">Important*</label><input name="important" type="text" class="inputs" id="important" value="important" required="required"></p>

        <!--PARTE 1-->
        <div id="parte1">
            <p id="primerito">
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                    <?php echo $form->textField($model, 'nombre_cons', array('class'=>'inputs form-control', 'placeholder'=>'Apellido y Nombre','required'=>'required')); ?>
                </div>
                <?php echo $form->error($model, 'nombre_cons'); ?>
            </p>


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <?php echo $form->textField($model, 'tel_cons', array('class'=>'inputs form-control', 'placeholder'=>'Cod Área + Teléfono*')); ?>
            </div>
            <?php echo $form->error($model, 'tel_cons'); ?>


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                 <?php echo $form->textField($model, 'email_cons', array('class'=>'inputs form-control', 'placeholder'=>'E-mail*')); ?>
            </div>
            <?php echo $form->error($model, 'email_cons'); ?>

        </div>
        <!--Fin parte 1 -->

        <!--PARTE 2 -->
        <div id="parte2" style="display:none; float:left;">

            <small style="color:#c9c9c9;">Dejanos un Tel. Opcional, tu provincia y sobre que te gustaria recibir asesoramiento.</small>

            
            
            <div>
            <?php echo $form->dropDownList($model, 'provincia_cons', CHtml::listData(Provincias::model()->findAll(), 'provincia', 'provincia') ,array('class'=>'inputCiudad form-control', 'prompt'=>'Provincia')); ?>
            <?php echo $form->error($model, 'provincia_cons'); ?>
            </div>


            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <?php echo $form->textField($model, 'cel_cons', array('class'=>'inputs form-control', 'placeholder'=>'Cod Área + Teléfono Opcional')); ?>
            </div>
            <?php echo $form->error($model, 'cel_cons'); ?>
            
        
            <div>
                <?php echo $form->textarea($model, 'consulta_cons', array('class'=>'inputs form-control', 'rows'=>4, 'cols'=>50)); ?>
                <?php echo $form->error($model, 'consulta_cons'); ?>
                <input type="hidden" name="Consultas[conce_id]" id="conce_id"  />
            </div>

        </div>
        
        <div id="parte3">
            <div class="col-md-6 col-sm-6">
                <span class="img"></span>
            </div>
            
            <div class="col-md-6 col-sm-6">
                <h3><span class="nom"></span></h3>
                <p><span class="cuota"></span></p>
                <p><span class="tipoPlan"></span></p>
            </div>
            
            
            
            
        </div>
        <!--Fin parte 2 -->

        <?php echo CHtml::ajaxSubmitButton( 'Continuar', Yii::app()->createUrl('ajax-consultas'),
                array(
                'dataType'=>'json',
                'type'=>'POST',
                'data'=>'js:$("#form-consulta").serialize()',

                'success'=>'js:function(data){
                    console.log("Ingreso");
                    console.log(data);
                    
                    var mostrar = "no";
              
                    if((Object.keys(data).length==2 || data.Ok) ){
                        $("#parte1").slideUp("fast", function(){
                            mostrar = "si";
                            if(data.Ok)
                            {
                                window.location=data.url;
                                
                            }
                            else
                            {
                                $("#parte2").slideDown("slow");
                                $("#Consultas_id").val(data.id);
                        
                            }

                        });
                        
                    } 
                    
                    if(mostrar == "si"){
                      
                        Object.keys(data).forEach(function (item){

                            var str =  item.replace("Consultas_", "");
                            str =  str.replace("_cons", "");
                            str =  str.toUpperCase();
                            alert(str + " " + data[item][0] );
                        } );
                    }
                    
                }'),

                array('class'=>'consultar btn btn-success col-md-12 col-xs-12')
            );
        ?>

        <?php echo $form->hiddenField($model, 'publicacion_id'); ?>
        <?php echo $form->hiddenField($model, 'tipo_plan_cons'); ?>
        <?php echo $form->hiddenField($model, 'cant_cuotas_coons'); ?>
        <?php echo $form->hiddenField($model, 'nombre_plan_con'); ?>
        <?php echo $form->hiddenField($model, 'id'); ?>

    </div>

    <?php $this->endWidget(); ?><div>
</div>
</div>