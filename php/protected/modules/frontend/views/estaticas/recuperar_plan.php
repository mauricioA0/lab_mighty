<section class="container">
	<div class="col-md-6">
		<form action="<?php echo Yii::app()->createUrl('recuperar_plan'); ?>" method="post" class="formVender">
			<h1>Reactivá mi plan de ahorro</h1>
			<div class="form-group">
				<label for="">Apellido y Nombre (*)</label>
				<input name="nombre" type="text" class="form-control" id="nombreVender" value=""  required="required" />
			</div>
			<div class="form-group">
				<label for=""><i class="fa fa-envelope"></i> E-mail (*)</label>
				<input name="mail" type="mail" class="form-control" id="" value=""  required="required" />
			</div>
			<div class="form-group">
				<label for=""><i class="fa fa-phone-square"></i> Tel&eacute;fono (*)</label>
				<input name="telefono" type="tel" class="form-control" id="" value=""  required="required" />
			</div>
			<div class="form-group">
				<label for=""><i class="fa fa-mobile"></i> Celular</label>
				<input name="telefono2" type="tel" class="form-control" id="" value="" />
			</div>

			
                        <div class="form-group">
				<label for=""><i class="fa fa-file-text-o"></i> Marca (*)</label>
                                <select name="marca" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <?php foreach ( $marcas as $marca){ ?>
                                    <option value="<?php echo $marca->concesionarios->id; ?>"><?php echo ucwords(strtolower($marca->concesionarios->marcas->nombre_plan_marca)); ?></option>
                                    <?php } ?>
                                </select>
			</div>
                        
                        <div class="form-group">
				<label for=""><i class="fa fa-car"></i> Modelo (*)</label>
				<input name="modelo" type="modelo" class="form-control" id="" value="" required="required" />
			</div>
                        
                        
			<div class="form-group">
				<label for=""><i class="fa fa-comment"></i> Mensaje</label>
				<textarea name="mensaje" type="text"  class="form-control"  id="mensaje"></textarea><input name="ciudadUser" type="hidden" id="ciudadUser" value="" />
			</div>
			<input name="consultar" type="submit" class="consultar consultarVender btn btn-success" value="Consultar"/>
		</form>
	</div>
	<div class="col-md-6  textoVender">
		<h2>Si tenías un plan de ahorro, lo dejaste de pagar y ahora querés recuperarlo!</h2>
		<p>Completá el formulario con tus datos para que un asesor oficial te contacte y juntos vean la mejor oportunidad para que puedas seguir pagando y llegar a tu 0 km.</p>

	</div>
</section>