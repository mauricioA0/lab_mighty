<section class="container">
	<div class="col-md-6">
		<form action="<?php echo Yii::app()->createUrl('enviar-plan-adj'); ?>" method="post" class="formVender">
			<h1>Vender Mi Plan</h1>
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
                                        <option><?php echo ucwords(strtolower($marca->concesionarios->marcas->nombre_plan_marca)); ?></option>
                                    <?php } ?>
                                </select>
			</div>
                        
                        <div class="form-group">
				<label for=""><i class="fa fa-car"></i> Modelo (*)</label>
				<input name="modelo" type="modelo" class="form-control" id="" value="" required="required" />
			</div>
                        
			<div class="form-group">
				<label for=""><i class="fa fa-file-text-o"></i> Cuotas pagas (*) [No menos de 10]</label>
                                <select name="cuotas" class="form-control" required="required" >
                                    <option value="">Seleccionar</option>
                                <?php for($i = 10; $i <= 84; $i++){ ?>
                                    <option><?php echo $i." cuotas"; ?></option>
                                <?php }?>
                                </select>
                                
			</div>
                        
                        <div class="form-group">
				<label for=""><i class="fa fa-file-text-o"></i> Cuotas impagas (si es que tiene)</label>
                                <select name="cuotas_impagas" class="form-control" >
                                    <option value="">Seleccionar</option>
                                    <?php for($i = 1; $i <= 84; $i++){ ?>
                                        <option><?php echo $i." cuotas"; ?></option>
                                    <?php }?>
                                </select>
                                
			</div>
                        
                        <div class="form-group">
				<label for=""><i class="fa fa-file-text-o"></i> Tipo de Plan (*)</label>
                                <select name="tipo_plan" class="form-control" >
                                    <option value="">Seleccionar</option>
                                    <option value="100">100%</option>
                                    <option value="70/30">70/30</option>
                                    <option value="60/40">60/40</option>
                                    <option value="50/50">50/50</option>
                                </select>
                                
			</div>
                        
			<div class="form-group">
				<label for=""><i class="fa fa-comment"></i> Mensaje</label>
				<textarea name="mensaje" type="text"  class="form-control"  id="mensaje"></textarea><input name="ciudadUser" type="hidden" id="ciudadUser" value="" />
			</div>
			<input name="consultar" type="submit" class="consultar consultarVender btn btn-success" value="Consultar">
		</form>
	</div>
	<div class="col-md-6  textoVender">
		<h2>¿Cómo vendo mi plan?</h2>
		<p>Para ceder el plan se debe firmar ante escribano público la transferencia mediante un formulario de cesión provisto por el concesionario oficial y/o terminal</p>
		<h2>¿Qué planes compramos?</h2>
		<p>Planes ya empezados, con o sin atrasos, planes ya adjudicados sean 100% ó fraccionados (70/30, 60/40, etc) y planes recindidos.</p>
		<h2>¿Qué valor tiene mi plan hoy?</h2>
		<p>El valor es el acordado entre la parte compradora y vendedora, sin ser este un monto estipulado, es de común acuerdo en base a las cuotas pagas y la posibilidad de comercialización de dicho plan en el mercado. La gran ventaja de esta operatoria es la rapidez con que se realiza la operación.</p>
		<h2>¿Quién le comprará su plan?</h2>
		<p>En nuestro sitio publica como comprador mayorista de planes de ahorro, Martín Saide, quien se dedica a la compra y venta desde hace mas de 19 años, y cuenta con la experiencia y seriedad necesaria para realizar correctamente este proceso.</p>

	</div>
</section>