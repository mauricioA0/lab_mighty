<?php
    if($mostrar_conf){
?>
<script>
    function enviarCookie(){
        actions.aceptacionCookie();
    }
    setTimeout('enviarCookie()','10000');
</script>

<div id="aceptar-cookie" class="aceptar-cookie col-md-12 col-xs-12">
  <div class=" alert-warning" role="alert">
  <div class="container">

    <div class=" botones-cookie left col-md-2 col-xs-3">
        <input type="button" onclick="actions.aceptacionCookie();" value="Ok" class="aceptar-cookie-btn"  title="Si aceptar cookie " />
    </div>

    <div class=" right col-md-10 col-xs-9">
        <p>Las cookies propias y de terceros nos permiten mejorar nuestros servicios. Al navegar por nuestro sitio web, aceptas el uso que hacemos de las cookies.</p>
    </div>
  </div>



  </div>

</div>
<?php } ?>

<footer class="col-md-12 col-xs-12 nopadding">
    <section class="container padding"></section>

    <section id="copy">
            <div class="container">
                    <button id="toTop" class="square"><i class="fa fa-chevron-up"></i></button>
            </div>
            <article class="container padding" >

                    <section id="footer-cont">
                            <div id="logo-footer-peque" class="col-md-3 col-sm-7 wow fadeInLeft">
                                    <a href="https://www.autosencuotas.com.ar/" title="Autos en Cuotas - Planes de Ahorro" >
                                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/logo-autosencuotas-gris.png" alt="Autos en Cuotas - Planes de Ahorro" class="img-responsive ">
                                    </a>
                                    <p><span>Autosencuotas.com</span> nace hace mas de 15 años, como un proyecto sobre planes de ahorro y financiación de vehículos 0km, utilizando un medio muy novedoso como lo era Internet en ese momento.</p>
                            </div>
                            <div id="contacto-footer" class="col-md-3 col-sm-5 col-xs-12 wow fadeInLeft" >
                                    <h5>CONTACTO</h5>
                                    <p class="nopadding col-xs-12"> <a href="<?php echo Yii::app()->createUrl('contacto-administrativo'); ?>" title="Escribinos para que podamos ayudarte con las preguntas que seguro tenes cuando te querés comprar tu 0km! " class="mail-footer"><i class="fa fa-envelope"></i> <span itemprop="email">Contactate con Nosotros</span></a>  </p>
                                    <p class="nopadding col-xs-12" > <a href="<?php echo Yii::app()->createUrl("mapa"); ?>" class="mapa-footer"><i class="fa fa-building"></i> <span>Oficina: Lima 385 Piso 9 - C.A.B.A</span></a>  </p>
                                    <p class="nopadding col-xs-12"> <i class="fa fa-phone-square"></i>  Llamanos al <span><a rel="+54911 0810 345 0042">0810.345.0042</a></span> </p>
                                    <p class="nopadding col-xs-12"><a rel="(011) 5218-4266"> <i class="fa fa-phone-square"></i> <span  >Cap Fed y GBA  - (011) 5218-4266/65</span></a> </p>
                                    <p class="nopadding col-xs-12"><a rel="+54911 3691-5736"><i class="fa fa-whatsapp"></i> <span > Agreganos +54911 3691-5736</span></a></p>
                            </div>
                            <div id="seguinos" class="col-md-3 col-sm-7 col-xs-12">
                                    <h5>SEGUINOS</h5>
                                    <a href="https://www.facebook.com/autosencuotas" title="Seguinos en - Facebook -" target="_blank"><i class="fa fa-facebook  square  left"></i> </a>
                                    <a href="https://plus.google.com/+AutosencuotasAr/" title="Seguinos en - Google Plus -" target="_blank"><i class="fa fa-google-plus square left"></i></a>
                                    <a href="https://twitter.com/autosencuotas" title="Seguinos en - Twitter -"  target="_blank"><i class="fa fa-twitter square left"></i></a>
                                    <a href="https://www.linkedin.com/company/autos-en-cuotas" target="_blank"><i class="fa fa-linkedin square left"></i></a>
                                    <a href="https://www.youtube.com/user/autosencuotasar" target="_blank"><i class="fa fa-youtube square left"></i></a>
                                    <a href="https://www.instagram.com/autosencuotasoficial/" target="_blank"><i class="fa fa-instagram square left"></i></a>
                            </div>
                            <div id="newsletter" class="col-md-3 col-sm-5 col-xs-12">
                                    <h5>NEWSLETTER</h5>
                                    <form action="?">
                                            <div class="block-content">
                                                    <div class="form-subscribe-header">
                                                            <p>Recib&iacute; novedades con la mejor info sobre los planes de ahorro.</p>
                                                    </div>
                                                    <div class="box-email">
                                                            <div class="input-email"><input type="text" name="email" id="newsletter_email" title="Recibi novedades" class="input-text required-entry validate-email" value="Email Address" onfocus="if (this.value != '') { this.value = '';}" onblur="if (this.value == '') {this.value = 'Email Address'; }">
                                                            </div>
                                                            <div class="action">
                                                                    <button type="submit" title="Subscribe" class="button"><i class="fa fa-angle-right"></i></button>
                                                            </div>
                                                    </div>
                                            </div>
                                    </form>

                            </div>
                    </section>
                    <div class="container padding">
                            <div class="footerPadding col-md-12 padding">
                                    <div class=" col-sm-6 col-md-3 col-xs-12 wow fadeInLeft">
                                            <h5>Planes de Ahorro</h5>
                                            <ul class="ul-list " itemscope="itemscope" itemtype="http://schema.org/WebSite">
                                            <?php foreach($marcas as $marca){ ?>
                                                <li><a itemprop="url" href="<?php echo Yii::app()->createUrl($marca->concesionarios->marcas->slug); ?>"><span itemprop='name'><?php echo ucwords($marca->concesionarios->marcas->nombre_plan_marca); ?></span></a></li>
                                            <?php } ?>
                                            </ul>
                                    </div>
                                    <div class=" col-sm-6 col-md-3 col-xs-12 wow fadeInLeft">
                                            <h5>Planes Especiales</h5>
                                            <ul class="ul-list" itemscope="itemscope" itemtype="http://schema.org/WebSite" >
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('planes-destacados'); ?>"><span itemprop='name'> Planes Destacados</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('planes-economicos'); ?>"><span itemprop='name'> Planes Económicos</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('planes-utilitarios'); ?>"><span itemprop='name'> Plan de Utilitarios</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('planes-nuevos'); ?>"><span itemprop='name'>Últimos Planes</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('planes-adjudicados'); ?>"><span itemprop='name'> Planes Adjudicados</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('planes-empezados'); ?>"><span itemprop='name'> Planes Comenzados</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('vender-mi-plan'); ?>"><span itemprop='name'> Vender mi plan</span></a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('comparar-planes-ahorro'); ?>"><span itemprop='name'> Comparar Planes de Ahorro</span></a></li>
                                            </ul>
                                    </div>
                                    <div class=" col-sm-6 col-md-3 col-xs-12 wow fadeInLeft">
                                            <h5>Autos en Cuotas</h5>
                                            <ul class="ul-list" itemscope="itemscope" itemtype="http://schema.org/WebSite" >
                                                    <li><a itemprop="url" href="https://rosario.autosencuotas.com.ar/" title="Autos en Cuotas en Rosario">Rosario</a></li>
                                                    <li><a itemprop="url" href="https://mardelplata.autosencuotas.com.ar/" title="Autos en Cuotas en Mar del Plata">Mar del Plata y Alrededores</a></li>
                                                    <li><a itemprop="url" href="https://cordoba.autosencuotas.com.ar/" title="Autos en Cuotas en Cordoba">Cordoba</a></li>
                                                    <li><a itemprop="url" href="https://costa-atlantica.autosencuotas.com.ar/" title="Autos en Cuotas en Costa Atlantica">Costa Atlántica</a></li>
                                                    <li><a itemprop="url" href="https://autosencuotas.com.ar/blog/" title="Conoc� el blog de Autosencuotas" target="_blank">Blog de Autosencuotas</a></li>

                                            </ul>

                                    </div>
                                    <div class="col-sm-6 col-md-3 col-xs-12 wow fadeInLeft">
                                            <h5>Nosotros</h5>
                                            <ul class="ul-list" itemscope="itemscope" itemtype="http://schema.org/WebSite" >
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('trabaja-con-nosotros'); ?>" title="Trabajá con nosotros">Trabajá en Autosencuotas</a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('quienes-somos'); ?>" title="Autosencuotas �ntimo">Quiénes somos</a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('legales'); ?>" title="Legales">Términos y condiciones</a></li>

                                                    <li><a itemprop="url" href="https://autosencuotas.com.ar/Nota-AutoPlus-Planes-de-Ahorro-recomendado.pdf" title="Nota de Prensa Autos en Cuotas" target="_blank">Nota de Prensa</a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('redes-sociales'); ?>" title="Redes Sociales">Redes Sociales</a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('contacto-administrativo'); ?>" title="Contacto administrativo">Contacto Administrativo</a></li>
                                                    <li><a itemprop="url" href="<?php echo Yii::app()->createUrl('preguntas-frecuentes'); ?>" title="Preguntas Frecuentes sobre planes de ahorro">Preguntas Frecuentes</a></li>
                                                    <li><a itemprop="url" href="https://www.autosencuotas.com.ar/blog/contacto-administradoras-de-planes-de-ahorro/" title="Telefono de las terminales de planes de ahorro">Teléfono terminales</a></li>
                                            </ul>
                                    </div>
                            </div>
                            <p class="col-md-12 col-xs-12 col-sm-12">Contactenos en nuestras Oficinas Administrativas de Lunes a Viernes de 8 a 21:30 Hs. y Sábados de 10 a 13 Hs. Nuestro personal puede derivar todas sus consultas a asesores especializados en cada marca de Plan de Ahorro para agilizar su respuesta y sacarle todas sus dudas.</p>
                    </div>
            </article>
    </section>

<section id="legalesFraude">
	<article class="container">
		<p>
			Autos en Cuotas SRL y sus sitios web: autosencuotas.com y autosencuotas.com.ar No realiza venta directa al publico. No cuenta con representantes, vendedores en ninguna parte del país. No publica en otros sitios, en el caso hipotético de una compra la misma debe ser realizada únicamente en el concesionario oficial de la marca elegida, los concesionarios oficiales de vehículos 0km que aquí publican, se encuentran identificados en cada producto publicado por su razón social. En caso de que se presente alguien invocando nuestro nombre (sin haber completado ningún formulario en nuestro sitio) , por favor denuncie el mismo al 0810-345-0042.
		</p>
	</article>
</section>
    <section class="container padding10">
            <div class="col-md-3 col-xs-12">
                    <span class="little padding-small margin-right">Powered by Autosencuotas Group</span>
                    <span class="little padding-small margin-right">Copyright © 2003 - <?php echo date('Y'); ?> :: <a href="https://www.autosencuotas.com.ar/"  title="Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan. Planes de Autos financiados en Pesos">Autos en Cuotas</a></span>
            </div>
            <div class="col-md-9 col-xs-12">
                    <div id="gpartners" class="col-md-2 col-xs-2"><img src="<?php echo Yii::app()->request->baseUrl ?>/img/general/gpartners.jpg" alt="Autos en cuotas google partners" class="img-responsive nopadding"   /></div>
                    <div id="cace" class="col-md-2 col-xs-2"><a href="https://www.cace.org.ar/directorio-de-socios/autos-en-cuotas/"  title="Autos en cuotas - " target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo-cace.png" alt="Miebro Cace" class="img-responsive"   /></a></div>
                    <div id="pdp2" class="col-md-2 col-xs-2"><a href="https://www.sitioseguro.jus.gov.ar/dnpdp/acceso/index.epl" title="Inscripto en el Registro Nacional de Bases de Datos. Registro N 69906" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo-pdp.jpg"  class="img-responsive" alt="Base de datos registrada"    /></a></div>
                    <div id="cyber" class="col-md-2 col-xs-2"><a href="https://www.autosencuotas.com.ar/cybermonday-2016/" title="Autos en cuotas - Cybermonday" target="_blank"><img src="https://www.autosencuotas.com.ar/cybermonday-2016/public/img/Sello-Cybermonday.png" alt="Tienda Oficial Cybermonday" class="img-responsive"   /></a></div>
                    <div id="hotsale"   class="col-md-2 col-xs-2"><a href="<?php echo Yii::app()->request->baseUrl ?>/hotsale/" title="Autos en cuotas - HotSale" target="_blank"><img src="/img/general/hotsale-footer.png" alt="Tienda Oficial Hotsale" class="img-responsive"   /></a></div>
                    <div class="col-md-2 col-xs-2"><span class=" padding-small"><a href="http://qr.afip.gob.ar/?qr=clCwrVq2u32TaDlYd7oQ5w,," target="_blank"><img src="https://www.autosencuotas.com.ar/cybermonday-2016/public/img/DATAWEB.jpg" alt="Imagen AFIP" height="60" data-pin-nopin="true"></a></span>		</div>


            </div>
            <?php //<div class="g-partnersbadge" data-agency-id="2020181984"></div> ?>
    </section>
</footer>


<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">


    

</script>
<!--End of Zopim Live Chat Script-->

<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "Autosencuotas.com",
  "url" : "https://<?php echo $_SERVER['HTTP_HOST']; ?>",
  "logo" : "https://www.autosencuotas.com.ar/img/logo-autosencuotas.png",
  "address": [{
    "@type": "PostalAddress",
  "addressCountry" : "AR",
  "addressLocality": "Ciudad de Buenos Aires",
  "streetAddress" : "Lima 385",
  "postalCode": "C1073AAG"
  }],
  "contactPoint" : [
    { "@type" : "ContactPoint",
      "telephone" : "+54 9 11 52184266",
      "contactType" : "customer service"
    } ] }
</script>