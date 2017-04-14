<header id="header" class="col-md-12 nopadding">
	<section id="top" class="col-md-12">
		<div id="top-header" class="container">
			<div class="col-md-6">
				<p><i class="fa fa-phone-square"></i> Atenci&oacute;n al Cliente: 0810.345.0042 </p>
			</div>
			<div class="col-md-6">
				<ul id="ul-nav-top-social">
					<li><a href="https://www.facebook.com/autosencuotas" target="_blank" title="Seguinos en Facebook" ><i class="facebook fa fa-facebook-official"></i></a></li>
					<li><a href="https://plus.google.com/+AutosencuotasAr/" target="_blank" title="Seguinos en Google Plus" ><i class="google fa fa-google-plus-square"></i></a></li>
					<li><a href="https://twitter.com/autosencuotas" target="_blank" title="Seguinos en Twitter" ><i class="twitter fa fa-twitter-square"></i></a></li>
					<li><a href=""><i class="whatsapp fa fa-whatsapp"></i></a></li>
					<li><a href="https://www.youtube.com/user/autosencuotasar" title="Seguinos en YouTube" target="_blank"><i class="youtube fa fa-youtube-square"></i></a></li>
				</ul>
			</div>
		</div>
		<!-- fin de top-->
	</section>
	<section class="col-md-12"  id="logoContainer"  >
		<div id="logo" class="container">
			<a href="<?php echo Yii::app()->createUrl('index.php'); ?>" class="left col-md-2">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo-autosencuotas.png" alt=" Logo Autos en cuotas" class="wow bounceInLeft img-responsive" data-wow-delay="1s" >
			</a>
			<div id="socialesContent" class="col-xs-12 col-md-7">
				<div class="hidden-sm hidden-md hidden-lg visible-xs-* col-xs-12">
					<a href="whatsapp://send?text=http://www.autosencuotas.com.ar/" data-action="share/whatsapp/share" class="whatsapp social-wa socialIconMedia col-md-12 col-sm-12 col-xs-12 wa-index">Compartir en <i class="fa fa-whatsapp"></i></a>
				</div>
			</div>  <?php /*
			<div id="form-top-search" class="col-xs-12 col-md-7">

                            <div class=""><form action="?" method="post" id="buscador">
					<div class="col-xs-12 col-md-12 ">
						<input type="text" id="buscarDatos" autocomplete="off" name="buscar" class=" form-control buscar-modelos" placeholder="&#xF002; Buscar por: Marca, Modelo... " style="font-family:Arial, FontAwesome">

					</div>
				</form>
				<div class="col-md-12">
					<div id="resultadoDeBusqueda"></div>
				</div>
			</p>
		</div>*/ ?>
		<div class="col-md-3 text-center">
			<style>
				#user_account{ text-align: right; color:#323232; padding: 10px 20px; border:1px solid #ddd;margin-top: 5%;float: right;}
				#user_account i{ margin-right: 10px;}
			</style>
			<a href="<?php echo Yii::app()->createUrl('/login/public/home'); ?>"  id="user_account"><i class="fa fa-user" aria-hidden="true"></i> 
                            <?php if($_SESSION['id']){ echo 'Ir a mi cuenta'; } else { echo 'Ingresar / Registrarse'; } ?>
                        </a>
			<div class="fb-like" data-href="https://www.facebook.com/autosencuotas/" data-layout="box_count" data-action="like" data-show-faces="false" data-share="false"></div>
		</div>
	</div>
</section>

<section id="hiddenNav" class=" col-md-12">
	<div class="mobil ">
		<a href="<?php echo Yii::app()->createUrl('index.php'); ?>" class="left logo-hidden">
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo-autosencuotas.png" alt=" Logo Autos en cuotas"  class="left" data-wow-delay="1s" width="50" >
		</a>
		<a class="slidebtn btn-mobil-slide btn-sidebar" title="Menu Planes de Ahorro">
			<span>Planes de Ahorro</span>
		</a>
	</div>
	<div class="menuMobil">
		<span class="slidebtn"><i class="fa fa-times-circle slideclose"></i></span>
		<ul id="mobilMenuList" class="nopadding">
			<li><a href="#" class="nolink">Elegi la categoria</a></li>
			<li>
				<div class="showMenu">Planes de Ahorro</div>
				<div class="mostrarMenu">

					<!--MENU DINAMICO-->
					<ul id="subMenuHidden" class="nopadding">
            <?php foreach($marcas as $marca){ ?>
						<li><a href="<?php echo Yii::app()->createUrl($marca->concesionarios->marcas->slug); ?>"><?php echo strtolower($marca->concesionarios->marcas->nombre_plan_marca); ?></a></li>
              <?php } ?>
					</ul>


				</div>
			</li>
      <li><a id="url_compara_mov" href="<?php echo Yii::app()->createUrl('comparar-planes-ahorro'); ?>"><span id="text_compara_mov">Comparar Planes</span> <span id="nro_compara_mov"></span></a></li>
			<li><a href="<?php echo Yii::app()->createUrl('planes-adjudicados'); ?>">Planes Adjudicados</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('planes-empezados'); ?>">Planes Comenzados</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('planes-nuevos'); ?>">Planes Nuevos</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('planes-utilitarios'); ?>">Planes Utilitarios</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('planes-economicos'); ?>">Planes Económicos</a></li>
			<li><a href="<?php echo Yii::app()->createUrl('vender-mi-plan'); ?>">Vender Mi Plan</a></li>
			<li class="btn-telephone"><a rel="+54911 0810 345 0042">0810-345-0042</a></li>
		</ul>
	</div>
</section>

	<section  id="ul-nav" class="col-md-12 nopadding">
		<div id="navigation-sticky-wrapper" class="sticky-wrapper">
		<section id="menuBlue" class="col-md-12 nopadding">
			<ul id="ul-primary-nav" class="container ">

				<li class="home-index"><a href="<?php echo Yii::app()->createUrl('index.php'); ?>" title="Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan sin interés. Planes de Autos financiados en Pesos"><i class="fa fa-home"></i></a></li>

				<li id="planDeAhorro">
                                    <a id="planDeAhorroURL" href="<?php echo Yii::app()->createUrl('planes-de-ahorro'); ?>" title="Planes de Ahorro"><h1>Planes de Ahorro <i class="fa fa-caret-down"></i></h1> </a>
					<section id="subMenuWhite">
				<section class="container">
					<article class="col-md-3">
						<ul id="nombreMarcas" class="nopadding">
							<?php foreach($marcas as $marca): ?>
                                                    <li data-list="<?php echo strtolower($marca->concesionarios->marcas->nombre_marca) ?>-list" class="">
                                                        <h2 class="menu_plan_h2"><a href="<?php echo Yii::app()->createUrl('frontend/planes/planesMarcas', array('slug' => $marca->concesionarios->marcas->slug)); ?>" title=" Planes nacionales financiados por Autoahorro Volkswagen "><?php echo $marca->concesionarios->marcas->nombre_plan_marca; ?></a></h2>
                                                    </li>
				<?php endforeach; ?>
						</ul>
					</article>
					<article class="col-md-9 nopadding">

							<?php foreach($marcas as $marca): ?>

							<ul class="ulModelosListadoGral nopadding <?php echo strtolower($marca->concesionarios->marcas->nombre_marca) ?>-list">

									<?php foreach($marca->concesionarios->marcas->modelos as $modelo): ?>
									<?php $publicaciones =  Publicaciones::findByIdModeloPlanHabilitado($modelo->idModelo, $marca->concesionarios->id); ?>
									<?php foreach($publicaciones as $publica): ?>

										<li class='col-md-4 listModelHeader'>
											<a href='<?php echo Yii::app()->createUrl($marca->concesionarios->marcas->slug.'/'.strtolower(str_replace(' ', '-',$publica->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($publica->tipoPlan)); ?>' title='<?php echo $marca->concesionarios->marcas->nombre_plan_marca." ".$modelo->nombreModelo; ?>'>
                                                                                            <div class="col-xs-5">
                                                                                                <div class=" sprite <?php echo str_replace('.png', '', Modelo::getNombreImagenCh($marca->concesionarios->marcas->nombre_marca,  $modelo->nombreDirectorio)); ?> img-responsive">
                                                                                                </div>
                                                                                            </div>
											<div class="col-xs-7">
											<?php echo $publica->modelos->nombreModelo;?><br><?php echo 'Plan '. $publica->tipoPlan; ?>
											</div>

											</a>
										</li>
									<?php endforeach; ?>
									<?php endforeach; ?>

								</ul>
							<?php endforeach; ?>

					</article>
				</section>

		</section>
					</li>
                                        <li><a id="url_compara" href="<?php echo Yii::app()->createUrl('comparar-planes-ahorro'); ?>" title="Comparar Planes de Ahorro"><h3 class="h3_menu" ><span id="text_compara">Comparar Planes</span> <span id="nro_compara"></span></h3></a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('planes-adjudicados'); ?>" title="Planes de Ahorro Adjudicados"><h3 class="h3_menu" >Planes Adjudicados</h3></a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('planes-empezados'); ?>"   title="Planes de Ahorro Comenzados"><h3 class="h3_menu" >Planes Comenzados</h3></a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('planes-nuevos'); ?>"      title="Planes de Ahorro Nuevos"><h3 class="h3_menu" >Planes Nuevos</h3></a></li>
					<!-- <li><a href="<?php //echo Yii::app()->createUrl('planes-utilitarios'); ?>" alt="Planes de Ahorro para Utilitarios" title="Planes de Ahorro para Utilitarios">Planes Ultilitarios</a></li>-->
                                        <li><a href="<?php echo Yii::app()->createUrl('planes-economicos'); ?>"  title="Planes de Ahorro Económicos"><h3 class="h3_menu" >Planes Económicos</h3></a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl('vender-mi-plan'); ?>"   title="Vender mi Plan de Ahorro"><h3 class="h3_menu">Vender mi Plan</h3></a></li>

				</ul>
		</section>
	</div>

	</section>
</header>
