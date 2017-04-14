<section id="">
  <setcion class="container-fluid">
    <div class="row">
      <div class="container">
        <div class="col-md-7">
          <img src="http://www.autosencuotas.com.ar/img/whatsapp.jpg" alt="" class="img-responsive" />
        </div>
        <div class="col-md-5">
          <h3>Plan B: Formulario de consulta</h3>
          <p>Si no pudiste agregarnos o escribirnos por Whats App, completá el siguiente formulario de consulta y un asesor se comunicará con vos</p>
          <div id="formulario">

        <div class="col-md-12">


    <form id="form-consulta-detalle" action="/ajax-enviar-consulta" method="post">

    <div id="formulario">
        <h2 class="asesoresTitulo col-xs-12">Consultar un Asesor Oficial</h2>
        <p id="important"><label for="important">Important*</label>
          <input name="important" type="text" class="inputs" id="important" value="important" required="required">
        </p>

        <!--PARTE 1-->

            <p id="primerito">
                </p><div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                    <input class="inputs form-control" placeholder="Apellido y Nombre" name="Consultas[nombre_cons]" id="Consultas_nombre_cons" type="text" maxlength="100">                </div>
                <div class="errorMessage" id="Consultas_nombre_cons_em_" style="display:none"></div>            <p></p>


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="inputs form-control" placeholder="Cod Área + Teléfono*" name="Consultas[tel_cons]" id="Consultas_tel_cons" type="text" maxlength="25">            </div>
            <div class="errorMessage" id="Consultas_tel_cons_em_" style="display:none"></div>

             <div>
            <select class="inputCiudad form-control" name="Consultas[provincia_cons]" id="Consultas_provincia_cons">
<option value="">Provincia</option>
<option value="Buenos Aires">Buenos Aires</option>
<option value="Catamarca">Catamarca</option>
<option value="Chaco">Chaco</option>
<option value="Chubut">Chubut</option>
<option value="Cordoba">Cordoba</option>
<option value="Corrientes">Corrientes</option>
<option value="Entre Rios">Entre Rios</option>
<option value="Formosa">Formosa</option>
<option value="Jujuy">Jujuy</option>
<option value="La Pampa">La Pampa</option>
<option value="La Rioja">La Rioja</option>
<option value="Mendoza">Mendoza</option>
<option value="Misiones">Misiones</option>
<option value="Neuquen">Neuquen</option>
<option value="Rio Negro">Rio Negro</option>
<option value="Salta">Salta</option>
<option value="San Juan">San Juan</option>
<option value="San Luis">San Luis</option>
<option value="Santa Cruz">Santa Cruz</option>
<option value="Santa Fe">Santa Fe</option>
<option value="Santiago del Estero">Santiago del Estero</option>
<option value="Tierra del Fuego">Tierra del Fuego</option>
<option value="Tucuman">Tucuman</option>
</select>
 <div class="errorMessage" id="Consultas_provincia_cons_em_" style="display:none"></div>
</div>

        <!--Fin parte 1 -->

        <!--PARTE 2 -->
            <p>
                </p><div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                     <input class="inputs form-control" placeholder="E-mail*" name="Consultas[email_cons]" id="Consultas_email_cons" type="text" maxlength="100">                </div>
                <div class="errorMessage" id="Consultas_email_cons_em_" style="display:none"></div>
                <p></p>


            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                <input class="inputs form-control" placeholder="Cod Área + Teléfono Opcional" name="Consultas[cel_cons]" id="Consultas_cel_cons" type="text" maxlength="25">            </div>
            <div class="errorMessage" id="Consultas_cel_cons_em_" style="display:none"></div>

            <div>
                <textarea class="inputs form-control" rows="4" cols="50" name="Consultas[consulta_cons]" id="Consultas_consulta_cons"></textarea>
                <div class="errorMessage" id="Consultas_consulta_cons_em_" style="display:none"></div>
            </div>

        <!--Fin parte 2 -->

        <input class="consultar btn btn-success col-md-12 col-xs-12" type="submit" name="yt2" value="Enviar" id="yt2">
        <input value="" name="Consultas[publicacion_id]" id="Consultas_publicacion_id" type="hidden">
        <input value="" name="Consultas[tipo_plan_cons]" id="Consultas_tipo_plan_cons" type="hidden">
        <input value="" name="Consultas[nombre_plan_con]" id="Consultas_nombre_plan_con" type="hidden">
    </div>

    </form><div>
</div>
</div>
        </div>
      </div>
    </div>
  </setcion>
</section>
