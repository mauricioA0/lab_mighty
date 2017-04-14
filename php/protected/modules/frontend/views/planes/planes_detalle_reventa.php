<?php  Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/estilos-item.css'); ?>
<div id="container" class="container">
<?php echo $this->renderPartial('_bloque_adjcom', array("publicacion"=>$publicacion, 'tipo_url'=>$tipo_url, 'nombre_url'=>$nombre_url)); ?>
</div>


        <div id="contenedorForm">
            <div class="closeForm"><i class="fa fa-close"></i></div>
            <div class="container">
            <div class="contFormContaaaacto"><form class="formContacto" action="/consulta-adjudicado" method="post">
        <p id="important"><label for="important">Important*</label><input name="important" type="text" class="inputs" id="important" value="important" required="required"></p>
        <p id="primerito">
            <label for="nombre">Apellido y Nombre*</label>
            <input name="nombre" type="text" class="inputs form-control" id="nombre" value="" required="required"></p>
        <p><label for="email">Email*</label>
            <input name="email" id="email" class="inputs form-control" type="text" required="required"></p>
        <p><label for="localidad">Localidad</label>
            <select name="ciudad" id="ciudad" class="inputCiudad form-control" required="">
                <option value="">Provincia</option><option value="Capital Federal">Capital Federal</option><option value="GBA Norte">GBA Norte</option><option value="GBA Oeste">GBA Oeste</option><option value="GBA Sur">GBA Sur</option><option value="Buenos Aires">Buenos Aires</option><option value="Catamarca">Catamarca</option><option value="Cordoba">Córdoba</option><option value="Corrientes">Corrientes</option><option value="Chaco">Chaco</option><option value="Chubut">Chubut</option><option value="Entre Rios">Entre Ríos</option><option value="Formosa">Formosa</option><option value="Jujuy">Jujuy</option><option value="La Pampa">La Pampa</option><option value="La Rioja">La Rioja</option><option value="Mendoza">Mendoza</option><option value="Misiones">Misiones</option><option value="Neuquen">Neuquén</option><option value="Rio Negro">Río Negro</option><option value="Salta">Salta</option><option value="San Juan">San Juan</option><option value="San Luis">San Luis</option><option value="Santa Fe">Santa Fe</option><option value="Santa Cruz">Santa Cruz</option><option value="Santiago del Estero">Santiago del Estero</option><option value="Tierra del Fuego">Tierra del Fuego</option><option value="Tucuman">Tucumán</option>
                </select></p>
        <p><label for="telefono" required="required">Cod Área + Teléfono*</label>
            <input name="telefono" type="tel" class="inputs form-control" id="telefono" required=""></p>
        <p><label for="telefono23">Cod Área + Celular</label>
            <input name="telefono2" type="tel" class="inputs form-control" id="telefono23"></p>
        <p><label for="mensaje" id="mensaje">Mensaje</label>
            <textarea name="mensaje" type="text" class="inputs form-control" id="mensajearea"></textarea></p>
        <input name="consultar" type="submit" class="consultar" value="Consultar ">
        <input name="publicacionID" type="hidden" id="modelo" value="<?php echo $publicacion->idPublicacionAC; ?>">
        <input name="url" type="hidden" id="modelo" value="<?php echo "https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']; ?>">
        </form></div>
            </div>

        </div>

        <section class="container">
          <div class="col-md-12">
            <p class="financiado"> Vendedor mayorista de planes de ahorro Adjudicados y planes ahorristas comenzados. La información y valores publicados son a título informativo y pueden variar sin previo aviso. Las fotos e imágenes son ilustrativas y pueden diferir del modelo de ahorro suscripto. Autos en Cuotas se limita a realizar la publicación con la información suministrada por dicho mayorista.</p>
          </div>
        </section> 

<section class=" nopadding col-md-12">
<!-- BANNER -->
<?php echo $this->renderPartial('/default/_banner'); ?>
<!-- FIN BANNER -->
</section>
