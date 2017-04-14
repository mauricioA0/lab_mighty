<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/estilos-item.css');
    $url_mod = Yii::app()->request->baseUrl."/img/modelos/".Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).".jpg";


?>
<script>$('#img_facebook').attr('content','<?php echo 'https://'.$_SERVER['HTTP_HOST'].$url_mod; ?>');</script>
<div id="main">
<section id="slideDownModelo" class="col-md-12 col-xs-12" style="display: none;">
   <article class="container">
      <div class="col-md-2 col-xs-3">
          <img src="<?php echo $url_mod;?>" alt="<?php $detalles->modelos->nombreModelo; ?>" class="img-responsive">
      </div>
      <div class="col-md-7 col-xs-6">
         <div class="col-md-6">
            <h2 class="tituloItem"><?php $detalles->modelos->nombreModelo; ?></h2>
            <p class="precio0kmModelo">Financiado por <?php echo $detalles->modelos->marcas->nombre_plan_marca; ?> en cuotas sín interés</p>
         </div>
         <div class="valores-slideTop col-md-6">
            <p class="cuotasSlideTop">Cuotas Desde: $<?php echo  Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan); ?></p>
            <p class="precio0kmModelo">Precio 0km <?php echo '$'. str_replace(',', '.',number_format($detalles->modelos->precio0kmModelo)); ?> - Plan <?php echo $detalles->tipoPlan;?> </p>
         </div>
      </div>
      <div class="col-md-3 col-xs-3">
         <p class="mostrarModeloModal btn btn-top-slide" onclick="javascript:actions.modalConsulta('<?php echo $detalles->idModeloPlan; ?>');" data-cuota="<?php echo  Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan); ?>" id="mostrarModeloModal-<?php echo $detalles->modelos->idModelo; ?>" data-id="<?php echo $detalles->modelos->idModelo; ?>" data-nombre="<?php $detalles->modelos->nombreModelo; ?>" data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).'.jpg'; ?>" data-tipo="<?php echo $detalles->tipoPlan;?>" data-descri="Entrega programada en cuota 7" data-conce="<?php echo Concesionarios::idConceByMarcaId($detalles->modelos->marcas->id); ?>">Consultar</p>
      </div>
   </article>
</section>
<section>
<div id="container" class="container">
<div class="padding-small">
<div id="wrapperContent" class="container">
   <div class="col-md-12 nopadding">
      <div id="breadcrumb" class="col-md-12">
         <ul class="breadcrumb">
            <li class="active color"><a href="<?php echo Yii::app()->createUrl('index.php'); ?>" ><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="<?php echo Yii::app()->createUrl($detalles->modelos->marcas->slug); ?>" ><?php echo $detalles->modelos->marcas->nombre_plan_marca.$msg; ?></a></li>
            <li class="active" ><?php echo $detalles->modelos->nombreModelo; ?></li>
            <li class="nombreMarcaCirculo"><a href="<?php echo Yii::app()->createUrl($detalles->modelos->marcas->slug); ?>" ><label><?php echo Concesionarios::nombreConceByMarcaId($detalles->modelos->marcas->id); ?></label></a></li>
            <li class="right "><a href="/favoritos" title="Agregar a Favoritos ">Favoritos <span class="favBarra">0</span></a></li>
         </ul>
      </div>
      <div id="item-photo-content" class="col-md-5 col-sm-12 col-xs-12">
         <div class="col-md-12 item-central-index border-color item-small padding-small-item">
            <div class=" col-xs-12 col-md-12 tiny-padding">
                <a 
                    <?php if(!$favorito){ ?> 
                        onclick="window.open('https://www.motorsclick.com/login/public/favoritos_add/<?php echo $detalles->idPublicacion; ?>','_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');"  
                    <?php } ?>
                                            id="favor" class="addto col-md-7 col-sm-6 favoritoCheck" title="Agregar este modelo a favoritos" onclick="actions.agregarFavorito('publicaciones','<?php echo $detalles->idPublicacion; ?>');" >
                <i class="fa <?php if(!$favorito){ echo 'fa-heart';  } else { echo 'fa-check';} ?> circulo "></i>
               <span class="linkHref" data-href="/favoritos" ><?php if(!$favorito){ echo 'Agregar a Favoritos';  } else { echo 'Agregado a Favoritos';} ?></span>
               </a>
               <div class="col-md-5 col-sm-6">
                  <span class="hide"><?php echo $detalles->modelos->marcas->nombre_plan_marca; ?></span>
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/marcas/<?php echo strtolower(str_replace(' ', '-',$detalles->modelos->marcas->nombre_marca)); ?>.png" alt="Logo <?php echo $detalles->modelos->marcas->nombre_marca; ?>" class="img-responsive left">
               </div>
            </div>
            <div class="col-md-12 tiny-padding zoom">
               <img id="zoom_01" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio); ?>" src="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).'.jpg'; ?>" alt="" title="" class="img-responsive img-thumbnail padding-bottomtop" onerror="this.onerror=null; this.src='/img/marcas/default-450x280.jpg'">
            </div>
            <div class="col-md-12 tiny-padding">
               <ul class="nopadding owl-carousel">
                  <?php
                     $total =7 ;
                     for ($i=1; $i < $total; $i++) { ?>
                  <li class="list-img-carousel">
                     <a class="fancybox" rel="gallery1" href="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).'-'.$i.'.jpg'; ?>" >
                         <img alt="<?php echo $detalles->modelos->marcas->nombre_plan_marca; ?>" src="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/mini/<?php echo Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).'-'.$i.'.jpg'; ?>" onerror="this.onerror=null; this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/marcas/image.png'" />
                     </a>
                  </li>
                  <?php } ?>
               </ul>
            </div>
            <div id="shared" class="col-md-12 tiny-padding ">
               <!--VOTACION CON ESTRELLAS RATY-->
               <div class=" votar col-md-6 col-sm-6 col-xs-12">
                  <span class="nopading col-md-12"><?php echo $title; ?></span>
                  <div id="fraseVot"></div>
                  <div class="col-md-12  estrellasVotacion" >
                     <div id="estrellasVotos">
                        <?php $this->widget('ext.DzRaty.DzRaty', array(
                           'name' => 'raty-modelos',
                           'id'=>'raty-modelos',
                           'value' => $raty,
                           'options' => array(
                                   'click' => "js:function(score, evt){

                                           var modelo = ".$detalles->modelos->idModelo.";
                                           actions.votacionRaty(score, modelo);
                                   }",

                                   'mouseover' => "js:function(score, evt){

                                           //$('#promedio').html(score);
                                   }",

                                   'readOnly' => $ratyDisabled,
                           ),
                           )); ?>
                     </div>
                     <h3>
                        <i class="fa fa-star " aria-hidden="true" style="margin-right:5px;"></i>
                        
                        <span id="promedio" content="<?php echo $raty; ?>"><?php echo $raty; ?></span> <small>/</small>  <small content="5"> 5 </small><span  class="review" content="<?php echo $review; ?> "><?php echo $review; ?> votos</span>
                     </h3>
                  </div>
               </div>
               <!--Fin votacion Raty-->
               <div class="col-md-6 col-sm-6 col-xs-12" onclick="btnCompararModelo('113', '100');">
                  <?php $url_c = strtolower($detalles->modelos->marcas->nombre_marca).'_'.strtolower(str_replace(' ', '-',$detalles->modelos->nombreModelo)).'_'.TipoPlan::generarSlugTipoPlan($detalles->tipoPlan); ?>
                  <a href="<?php echo Yii::app()->createUrl('comparar-planes-ahorro/'.$url_c); ?>" id="url_comparar"  title="Comparar">
                  <span class="comparar-modelo"><i class="fa fa-exchange"></i> Comparar este plan</span>
                  </a>
               </div>
            </div>
            <!-- fin de estrellas -->
            <div class="col-md-12 col-xs-12">
               <ul id="personal-social-item">
                  <li><i class="fa fa-eye  circulo"></i><span><?php echo str_replace(',', '.',number_format($detalles->vistasAenC)); ?></span></li>
                  <li class="compartir-slide-down"><i class="fa fa-envelope   circulo"></i> <span class="">compartir</span></li>
                  <li>
                     <!--BOTON ME GUSTA-->
                     <?php echo CHtml::ajaxLink(
                        '<i id="megusta" class="'.$megustaClass.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="Me gusta este modelo"></i>',

                        Yii::app()->createUrl( 'ajax-votacion' ),
                        array( // ajaxOptions
                            'type' => 'POST',
                            'dataType'=>'json',
                            'data' => array( 'voto' => 'SI', 'modelo' => $detalles->modelos->idModelo),
                            'beforeSend' => 'function(request){}',
                            'success' => "js:function(data){

                                if(data.Ok)
                                {
                                        $('.vp').html(data.votos);
                                        $('#megusta').removeClass('fa-thumbs-up');
                                        $('#megusta').addClass('fa-heart circulovp');
                                        $('#noMegusta').removeClass('fa-thumbs-down');
                                $('#noMegusta').addClass('fa-check circulo');
                                }
                            }",

                        ),
                        array( /* HTML OPTIONS*/)
                        ); ?>
                     <span class="vp"><?php echo str_replace(',', '.',number_format($detalles->modelos->votPos)); ?></span>
                  </li>
                  <!--fin boton me gusta -->
                  <!--BOTON NO ME GUSTA-->
                  <li>
                     <?php echo CHtml::ajaxLink(
                        '<i id="noMegusta" class="'.$nogustaClass.'" data-toggle="tooltip" data-placement="top" title="" data-original-title="No me gusta este modelo"></i>',

                        Yii::app()->createUrl( 'ajax-votacion' ),
                        array( // ajaxOptions
                            'type' => 'POST',
                            'dataType'=>'json',
                            'data' => array( 'voto' => 'NO', 'modelo' => $detalles->modelos->idModelo),
                            'beforeSend' => 'function(request){}',
                            'success' => "js:function(data){

                                if(data.Ok)
                                {
                                        $('.ng').html(data.votos);
                                        $('#noMegusta').removeClass('fa-thumbs-down');
                                $('#noMegusta').addClass('fa-check circulo');
                                $('#megusta').removeClass('fa-thumbs-up');
                                        $('#megusta').addClass('fa-heart circulovp');
                                }
                            }",

                        ),
                        array( /* HTML OPTIONS*/)
                        ); ?>
                     <span class="ng"><?php echo $detalles->modelos->votNeg; ?></span>
                  </li>
                  <!--fin boton no me gusta -->
               </ul>
               <div id="compartir" class="compartir-modelo" style="display: none;">
                  <p id="cerrar" class="right"> <i class="fa fa-close"></i></p>
                  <ul id="ul-list" class="ul-list">
                     <li class="btn btn-success-outline">Compartir Link</li>
                     <li class="btn btn-success-outline">Enviar por Correo</li>
                  </ul>
                  <!-- sharedLink-->
                  <div id="sharedLink">
                    <span class="hide" ><?php echo 'https://'.$_SERVER['HTTP_HOST'].Yii::app()->createUrl($detalles->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$detalles->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($detalles->tipoPlan)); ?></span>
                     <form>
                        <input id="dynamic" type="text" readonly="true" value="<?php echo 'https://'.$_SERVER['HTTP_HOST'].Yii::app()->createUrl($detalles->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$detalles->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($detalles->tipoPlan)); ?>" class="input-shared form-control" required="">
                     </form>
                  </div>
                  <!--  sharedToFriend-->
                  <div id="sharedToFriend">
                     <div id="porMail" class="col-md-12">
                        <form action="../include/enviarMailCompartir.php" method="POST" id="formMail">
                           <input type="text" name="demail" placeholder="De: Tu nombre..." class="form-control" required="">
                           <input type="text" name="paramail" placeholder="Para: nombre@mail.com " class="form-control" required="">
                           <textarea id="mensajemail" name="mensajemail" class="form-control" required=""></textarea>
                           <div class="respondeMail"></div>
                           <div class="previa">
                              <span class="previaText"></span>
                              <a href="" data-info="info"><?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo;?></a>
                              <input type="hidden" name="nombreModelo" value="<?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo;?>">
                              <input type="hidden" name="link" value="<?php echo "https://".$_SERVER['HTTP_HOST'].Yii::app()->createUrl($detalles->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$detalles->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($detalles->tipoPlan)); ?>">
                              <input type="hidden" name="tplan" value="<?php echo $detalles->tipoPlan; ?>">
                              <input type="hidden" name="cuota" value="$<?php echo  Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan); ?>">
                              <input type="hidden" name="imagen" value="<?php echo 'https://'.$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).'.jpg'; ?>">
                              <span class="textoEnviaMail"></span>
                           </div>
                           <input type="submit" class="btn-enviar" id="enviarPorMailBtn">
                        </form>
                     </div>
                  </div>
                  <!-- addthis-->
                  <div id="addthis"></div>
               </div>
            </div>
         </div>
      </div>
      <div id="item-info-content" class="col-md-7 col-sm-12 col-xs-12 ">
         <div id="content-info-plan" class="col-md-12 item-central-index border-color item-small padding-small-item">
            <div id="tabs" class="row ">
               <ul class="ul-class">
                  <li class="col-md-4 col-sm-4 col-xs-12 list-tabs active-link">
                     <p data-link="#plan"><i class="fa fa-file-text"></i> Plan de Ahorro</p>
                  </li>
                  <li class="col-md-4 col-sm-4 col-xs-12 list-tabs">
                     <p data-link="#listado"><i class="fa fa-list-ol"></i> Valor de Cuotas</p>
                  </li>
                  <li class="col-md-4 col-sm-4 col-xs-12 list-tabs consulta">
                     <p data-link="#consulta"><i class="fa fa-comment"></i> Consultar</p>
                  </li>
               </ul>
               <div id="plan" class="content-tab " style="display: block;">
                  <div class="top-info-item col-md-12">
                     <h1 class="left"><?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo; ?> en Cuotas</h1>
                  </div>
                  <div class="col-md-12 " itemscope="" itemtype="http://schema.org/AggregateOffer">
                     <div id="valorCuota-item" class="margin-15">
                        <div class="col-xs-12 col-md-4 col-lg-4">
                           <p class="superMorocha textLeft">
                              <meta content="ARS">
                              Cuotas Desde: 
                           </p>
                           <span class="price">$<span content="<?php echo  Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan); ?>"><?php echo  Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan); ?></span></span>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-8">
                           <p class="financiado textLeft">Plan de ahorro <?php echo $detalles->tipoPlan; ?> | valor 0km <?php echo '$'. str_replace(',', '.',number_format($detalles->modelos->precio0kmModelo)); ?> </p>
                           <p class="financiado textLeft">Financiado por <span><a href="<?php echo Yii::app()->createUrl($detalles->modelos->marcas->slug); ?>" title="Planes de Ahorro <?php echo $detalles->modelos->marcas->nombre_plan_marca; ?>"><?php echo $detalles->modelos->marcas->nombre_plan_marca; ?></a></span> hasta en 84 cuotas</p>
                            <?php
                                $url = "https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];

                              ?>
                           <div class=" col-md-12 col-xs-12 left" data-media="<?php echo 'https://'.$_SERVER['HTTP_HOST'].$url_mod; ?>" data-url="<?php echo "https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']; ?>" data-title="<?php echo  $descripcion;?>" data-description="<?php echo $descripcion.'. '.$detalles->explicaPlan.'. '.$detalles->explicaPlanDestacado;?>">
                                 <div id="atstbx" class="at-share-tbx-element addthis_20x20_style addthis-smartlayers addthis-animated at4-show">

                                     <a class="sharer " data-sharer="facebook" data-url="<?php echo $url; ?>" data-title="<?php echo  $descripcion;?>" >
                                         <span class="at-icon-wrapper" style="width: 40px !important;height: 40px !important;text-align: center; float: left; background-color: rgb(59, 89, 152); padding: 8px; line-height: 40px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Facebook" alt="Facebook" class="at-icon at-icon-facebook">
                                               <g>
                                                  <path d="M22 5.16c-.406-.054-1.806-.16-3.43-.16-3.4 0-5.733 1.825-5.733 5.17v2.882H9v3.913h3.837V27h4.604V16.965h3.823l.587-3.913h-4.41v-2.5c0-1.123.347-1.903 2.198-1.903H22V5.16z" fill="#fff"></path>
                                               </g>
                                            </svg>
                                         </span>
                                     </a>




                                    <a class="sharer" data-sharer="twitter" data-url="<?php echo $url; ?>" data-title="<?php echo  $descripcion;?>" >
                                       <span class="at-icon-wrapper" style=" width: 40px !important;height: 40px !important;text-align: center; float: left; background-color: rgb(29, 161, 242); padding: 8px; line-height: 40px;">
                                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Twitter" alt="Twitter"  class="at-icon at-icon-twitter">
                                             <g>
                                                <path d="M27.996 10.116c-.81.36-1.68.602-2.592.71a4.526 4.526 0 0 0 1.984-2.496 9.037 9.037 0 0 1-2.866 1.095 4.513 4.513 0 0 0-7.69 4.116 12.81 12.81 0 0 1-9.3-4.715 4.49 4.49 0 0 0-.612 2.27 4.51 4.51 0 0 0 2.008 3.755 4.495 4.495 0 0 1-2.044-.564v.057a4.515 4.515 0 0 0 3.62 4.425 4.52 4.52 0 0 1-2.04.077 4.517 4.517 0 0 0 4.217 3.134 9.055 9.055 0 0 1-5.604 1.93A9.18 9.18 0 0 1 6 23.85a12.773 12.773 0 0 0 6.918 2.027c8.3 0 12.84-6.876 12.84-12.84 0-.195-.005-.39-.014-.583a9.172 9.172 0 0 0 2.252-2.336" fill="#fff"></path>
                                             </g>
                                          </svg>
                                       </span>
                                    </a>


                                    <a class="sharer" data-sharer="googleplus" data-url="<?php echo $url; ?>" data-title="<?php echo  $descripcion;?>">
                                       <span class="at-icon-wrapper" style="width: 40px !important;height: 40px !important;text-align: center; float: left; background-color: rgb(220, 78, 65);  padding: 8px; line-height: 40px;">
                                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="Google+" alt="Google+"  class="at-icon at-icon-google_plusone_share">
                                             <g>
                                                <path d="M12 15v2.4h3.97c-.16 1.03-1.2 3.02-3.97 3.02-2.39 0-4.34-1.98-4.34-4.42s1.95-4.42 4.34-4.42c1.36 0 2.27.58 2.79 1.08l1.9-1.83C15.47 9.69 13.89 9 12 9c-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.72-2.84 6.72-6.84 0-.46-.05-.81-.11-1.16H12zm15 0h-2v-2h-2v2h-2v2h2v2h2v-2h2v-2z" fill="#fff"></path>
                                             </g>
                                          </svg>
                                       </span>
                                    </a>
                                    <a class="sharer " data-sharer="linkedin" data-url="<?php echo $url; ?>" data-title="<?php echo  $descripcion;?>" >
                                       <span class="at-icon-wrapper" style="width: 40px !important;height: 40px !important;text-align: center; float: left; background-color: rgb(0, 119, 181); padding: 8px; line-height: 40px;">
                                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" title="LinkedIn" alt="LinkedIn" class="at-icon at-icon-linkedin">
                                             <g>
                                                <path d="M26 25.963h-4.185v-6.55c0-1.56-.027-3.57-2.175-3.57-2.18 0-2.51 1.7-2.51 3.46v6.66h-4.182V12.495h4.012v1.84h.058c.558-1.058 1.924-2.174 3.96-2.174 4.24 0 5.022 2.79 5.022 6.417v7.386zM8.23 10.655a2.426 2.426 0 0 1 0-4.855 2.427 2.427 0 0 1 0 4.855zm-2.098 1.84h4.19v13.468h-4.19V12.495z" fill="#fff"></path>
                                             </g>
                                          </svg>
                                       </span>
                                    </a>
                                     
                                     <a class="sharer " data-sharer="whatsapp" data-url="<?php echo $url; ?>" data-title="<?php echo  $descripcion;?>" >
                                       <span class="at-icon-wrapper" style="width: 40px !important;height: 40px !important;text-align: center; float: left; background-color: #25D366; padding: 8px; line-height: 40px;">
                                          
                                           <svg id="WhatsApp_Logo" data-name="WhatsApp Logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 418.86 420.88">
                                           <defs><style>.cls-1{fill:#455a64;fill:#fff;}</style></defs><title>wa</title><g id="WA_Logo" data-name="WA Logo"><path class="cls-1" d="M367,71A207.2,207.2,0,0,0,219.46,9.83C104.51,9.83,11,103.38,10.9,218.37A208.18,208.18,0,0,0,38.74,322.63L9.16,430.7l110.56-29a208.37,208.37,0,0,0,99.66,25.38h.09C334.4,427.09,428,333.53,428,218.53A207.29,207.29,0,0,0,367,71ZM219.46,391.87h-.07a173.08,173.08,0,0,1-88.23-24.16l-6.33-3.76L59.23,381.16l17.51-64-4.12-6.56a172.93,172.93,0,0,1-26.5-92.25c0-95.57,77.8-173.33,173.42-173.33A173.37,173.37,0,0,1,392.81,218.52C392.77,314.1,315,391.87,219.46,391.87ZM314.55,262c-5.21-2.61-30.83-15.21-35.61-17s-8.25-2.61-11.72,2.61-13.46,17-16.5,20.43-6.08,3.91-11.29,1.3-22-8.11-41.91-25.86c-15.49-13.82-25.95-30.88-29-36.1s-.32-8,2.28-10.63c2.34-2.34,5.21-6.09,7.82-9.13s3.47-5.22,5.21-8.69.87-6.52-.43-9.13-11.72-28.26-16.07-38.69c-4.23-10.16-8.53-8.78-11.72-8.95-3-.15-6.51-.18-10-.18a19.14,19.14,0,0,0-13.9,6.52c-4.78,5.22-18.24,17.83-18.24,43.47s18.67,50.43,21.28,53.91,36.75,56.11,89,78.69a299.33,299.33,0,0,0,29.71,11c12.48,4,23.84,3.41,32.82,2.07,10-1.5,30.83-12.61,35.17-24.78s4.34-22.61,3-24.78S319.76,264.65,314.55,262Z" transform="translate(-9.16 -9.83)"></path></g>
                                           </svg>
                            
                                       </span>
                                    </a>

                                 </div>
                              </div>
                        
                        </div>
                        <div class="col-md-12 col-xs-12">
                           <form action="?" class="margin-15">
                            <?php $descripcion = "Planes de Ahorro ".$detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo.' .Financia '.$detalles->tipoPlan."  - Plan de Ahorro Argentina"; ?>

                     
                                <textarea name="textarea" id="textarea" class="col-md-12 form-control" placeholder="Consultá ahora y contactate con un asesor."></textarea>

                              <input name="btnSend" id="btnSend" class="btn rigth col-md-3 col-xs-12" value="Continuar">
                
                           </form>
                        </div>
                     </div>
                     <p> </p>
                     <p class="item-info-content ">
                        <span>
                            <?php if($detalles->cambioModelo){ ?>
                            <?php $desc_it =  'Suscribe por '.$detalles->modelos->nombreModelo.'<br>'.TipoPlan::findDetallePlanByTipoPlan($detalles->tipoPlan).'<br>'.$detalles->explicaPlan; ?>
                            <?php } else { ?>
                            <?php $desc_it = 'Financia hasta 84 cuotas <br>'.TipoPlan::findDetallePlanByTipoPlan($detalles->tipoPlan); ?>
                            <?php                             
                                } 
                                
                                echo $desc_it;
                            ?>                                          
                        </span>
                     </p>
                     <p class="margin-15 shared explicaDesta"><?php echo $detalles->explicaPlan;?><br>
                        <b><?php echo $detalles->explicaPlanDestacado;?></b><br>
                        <?php echo $detalles->entrega;?>
                     </p>
                     <div class="col-md-12">
                        <?php
                           if(count($publicaciones)>1){
                               foreach ( $publicaciones as $mi_publi ){
                                   if($detalles->tipoPlan!=$mi_publi->tipoPlan){
                           ?>
                        <p>
                           <a href="<?php echo Yii::app()->createUrl($mi_publi->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$mi_publi->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($mi_publi->tipoPlan));?>">
                           <?php echo $mi_publi->modelos->marcas->nombre_plan_marca.' '.$mi_publi->modelos->nombreModelo.' '.$mi_publi->tipoPlan;?>
                           </a>
                        </p>
                        <?php
                           }

                           }
                           }
                           ?>
                     </div>
                  </div>
               </div>
               <!-- fin plan -->
               <div id="listado" class="content-tab" style="display: none;">
                  <div class="banner-cuotas col-md-6">
                     <h5><i class="fa fa-credit-card"></i> Podes pagar Medios de pago</h5>
                     <div class="col-md-12 col-xs-12">
                        <p class="financiado col-xs-12 nopadding">Tarjetas de crédito</p>
                        <ul class="ulMarcasTarjetas">
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/visa_logo.png " alt="" title="Paga con tarjeta Visa!" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/amex_logo.png" alt="" title="Paga con tarjeta American Express!" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/master_logo.png" alt="" title="Paga con tarjeta Mastercard" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/cabal_logo.png" alt="" title="Paga con tarjeta Cabal" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/cencosud.png" alt="" title="Paga con tarjeta Cabal" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/argencard.png" alt="" title="Paga con tarjeta Cabal" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/tarjeta_shopping.png" alt="" title="Paga con tarjeta Cabal" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/tarjeta_naranja.png" alt="" title="Paga con tarjeta Cabal" class="pago"></li>
                        </ul>
                     </div>
                     <div class="col-md-12 col-xs-12">
                        <p class="financiado col-xs-12 nopadding">Efectivo en puntos de pago</p>
                        <ul class="ulMarcasTarjetas">
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/pago_facil.png " alt="" class="pago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/rapipago.png" alt="" class="rapipago"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/provincia_logo.png" alt="" class="provincia"></li>
                           <li class="marcasimg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/general/ripsa_logo.png" alt="" class="provincia"></li>
                        </ul>
                     </div>
                     <div class="col-md-12">
                        <p class="financiado col-xs-12 nopadding">Depósito y transferencia bancaria</p>
                     </div>
                  </div>
                  <div class="valorCuotasContenedor col-md-6">
                     <?php $plan = Publicaciones::findPlanCuotasById($detalles->idPublicacion); ?>
                     <p class="dCuotas even " id="precioRegular"><?php if($cuotaDescuento!='$0'){ ?><span id="preRegular">Precio Regular:</span>Suscripción + Cuota 1:<span class="pCuotas"><?php echo $cuotaDescuento; ?></span><?php } ?></p>
                     <p id="precioOnline" class="dCuotas"><span id="preOnline">Precio Promo Internet:</span><?php if($plan['cuota1'] != null and $plan['valor1'] != null) { echo $plan['cuota1'];  ?><span class="pCuotas"><?php echo '$'.str_replace(',', '.',number_format($plan['valor1'])); ?></span><?php } ?></p>
                     <?php $cont = 0; ?>
                     <?php foreach($plan['plancuotas'] as $indice => $valor): ?>
                     <p class="dCuotas <?php echo ($cont % 2 == 0) ? 'odd':'even'; ?> "><?php echo 'Cuota '. $indice; ?>:<span class="pCuotas"><?php echo '$'. str_replace(',', '.',number_format($valor)); ?></span></p>
                     <?php $cont++; ?>
                     <?php endforeach; ?>
                     <p class="dCuotas odd morocha">Cuota Pura:<span class="pCuotas morocha"><?php echo $cuotaPura; ?></span></p>
                     <p id="ahorra">AHORRÁS <span id="precioAhorra"><?php echo $ahorro; ?></span><span id="aclaracionAhorra">Descuento automático vía internet</span></p>
                  </div>
                  <div class="col-md-12">
                     <form action="?" class="margin-15">
                        <textarea name="textarea2" id="textarea2" class="col-md-12 form-control" placeholder="Consultá ahora y contactate con un asesor."></textarea>
                        <input name="btnSend" id="btnSend2" class="btn  col-md-12 col-xs-12" value="Continuar">
                     </form>
                  </div>
               </div>
               <div id="consulta" class="content-tab col-md-12" style="display: none;">
                  <div class="col-md-8">
                     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                     <!--<script>Tools.createCookie("listadoModelos", "113", 600);</script>
                        <script>Tools.createCookie("listadoMarcas", "7", 600);</script>
                        <script>Tools.createCookie("UltimoVisto", "187", 200);</script>-->
                     <div id="formulario">
                        <?php echo $this->renderPartial('_consultar', array('model'=>$model, 'detalles'=>$detalles,'id_modelo'=>$detalles->idModeloPlan, 'nombrePlan'=>$detalles->modelos->marcas->nombre_plan_marca,'idConce'=>Concesionarios::idConceByMarcaId($detalles->modelos->marcas->id))); ?>
                     </div>
                  </div>
                  <?php if(count($asesores)){?>
                  <div id="asesoresOnline" class="col-md-4 col-xs-12 col-sm-12">
                     <h5 class=" "><i class="fa fa-circle  "></i> Asesores Online</h5>
                     <ul class="nopadding">
                        <?php
                           foreach ( $asesores as $mi_ase ){
                               if($mi_ase['Sexo']=='1'){
                                   $sexo  = "female";
                               } else {
                                   $sexo  = "male";
                               }
                           ?>
                        <li><i class="fa fa-<?php echo $sexo; ?>"></i> <?php echo $mi_ase['usuario'];?></li>
                        <?php
                           }
                           ?>
                     </ul>
                  </div>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
      <div id="ficha-beneficios" class="col-md-12 col-xs-12 border-color item-video item-small padding-small-item">
         <div id="ficha-item" class="col-md-7">
            <article>
               <header>
                  <h3 class="titulo-h3">
                     <i class="fa fa-thumbs-up"></i> Ficha Técnica
                  </h3>
               </header>
               <!--SOLAPAS FICHAS Y EQUIPAMIENTOS-->
               <div id="tab-ficha">
                  <ul class="ul-class-ficha">
                     <li class="col-sm-4 col-md-4 col-xs-12 list-tabs active-link">
                        <p data-link=" #equipamiento "> <i class="fa fa-list-ol"></i> Equipamiento </p>
                     </li>
                     <li class="col-sm-4 col-md-4 col-xs-12 list-tabs">
                        <p data-link="#ficha"><i class="fa fa-file-text"></i> Ficha Técnica</p>
                     </li>
                     <li class="col-sm-4 col-md-4 col-xs-12 list-tabs">
                        <p data-link="#colores"><i class="fa fa-car"></i> Colores</p>
                     </li>
                  </ul>
               </div>
               <!--Fin solapas ficha y equipamientos-->
               <?php echo $detalles->modelos->equipamientoModelo; ?>
               <!--EQUIPAMIENTO-->
               <div id="equipamiento" class="tab-ficha valorCuotasContenedor" style="display: block;">
                  <?php $seccionAnterior = ''; ?>
                   <ul>
                  <?php foreach($detalles->modelos->equipamientos as $equipamiento): ?>
                    <?php 
                    
                        $equipamiento->seccion_equip = trim($equipamiento->seccion_equip); 
                        if($seccionAnterior != $equipamiento->seccion_equip): 
                    ?>
                  <?php $seccionAnterior = $equipamiento->seccion_equip; ?>
                    <li><h5><?php echo $equipamiento->seccion_equip; ?></h5></li>

                  <?php endif; ?>
                  <li class="odd"><span class="valorFicha"><?php echo $equipamiento->detalle_equip; ?></span></li>
                  <?php endforeach; ?>
                  </ul>
               </div>
               <?php /*<!--fin de equipamiento-->
               <!FICHA TECNICA--> */ ?>
               <div id="ficha" class="tab-ficha valorCuotasContenedor" style="display: none;">
                  <br><br>
                  <?php foreach($detalles->modelos->fichas as $ficha): ?>
                  <?php if(!empty($ficha->archivo_ficha)): ?>
                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/icon-pdf.png"><br>
                  <?php endif; ?>
                  <h5>
                     <a href="<?php echo Yii::app()->request->baseUrl.FichaTecnica::$pathFicha.$ficha->archivo_ficha; ?>" target="blank"><?php echo $ficha->archivo_ficha; ?></a>
                  </h5>
                  <?php endforeach; ?>
               </div>
               <!--Fin ficha tecnica-->
               <!--COLORES-->
               <div id="colores" class="tab-ficha valorCuotasContenedor" style="display: none;">
                  <div id="coloresFlotante" class="contenedorContFlotantes partesPu">
                     <?php
                        if(count($colores)){
                            foreach ( $colores as $mi_color){
                                $color = explode('//', $mi_color);
                        ?>
                     <div class="contenedorColorcitos col-md-4">
                        <?php echo $color[1]; ?>
                        <div class="colorcitos " style="background:#<?php echo $color[0]; ?>;"></div>
                     </div>
                     <?php
                        }
                        } else {
                        ?>
                     <div class="contenedorColorcitos col-md-4">
                        Gris Estrella KNH
                        <div class="colorcitos " style="background:#aaadb0;"></div>
                     </div>
                     <?php } ?>
                  </div>
               </div>
               <!--fin colores-->
            </article>
         </div>
         <div id="beneficios" class="col-md-5 col-xs-12">
            <article>
               <header>
                  <h3 class="titulo-h3"><i class="fa fa-thumbs-up"></i> Beneficios y seguridad:</h3>
               </header>
               <div class="border-bottom">
                  <ol id="listadoBeneficios">
                     <li>
                        <div class="textoBeneficios">
                           <i class="fa fa-check"></i>
                           <p>Compra Segura: <?php echo $detalles->modelos->marcas->nombre_marca; ?> te asegura por escrito el valor de las cuotas, el funcionamiento del plan y todas las condiciones y bonificaciones vigentes</p>
                        </div>
                     </li>
                     <li>
                        <div class="textoBeneficios">
                           <i class="fa fa-check"></i>
                           <p>Compra Segura: <?php echo $detalles->modelos->marcas->nombre_marca; ?> Argentina valida tus datos y la información de suscripción brindada por los asesores para máxima satisfacción del cliente</p>
                        </div>
                     </li>
                     <li>
                        <div class="textoBeneficios">
                           <i class="fa fa-check"></i>
                           <p>Bonificaciones excluisivas para Plan Nacional <?php echo date('Y'); ?> <span class="linksTexto" onclick="consultanosDesdeTexto();">consultando en este sitio Oficial</span>.</p>
                        </div>
                     </li>
                     <li>
                        <div class="textoBeneficios">
                           <i class="fa fa-check"></i>
                           <p>Después de <span class="linksTexto" onclick="consultanosDesdeTexto();">consultarnos</span> en este sitio, podés visitarnos o <b>suscribir desde tu casa!</b> Y sumar bonificaciones y beneficios especiales!</p>
                        </div>
                     </li>
                  </ol>
               </div>
               <footer class="border-bottom">
               </footer>
            </article>
            <article>
               <div class="fb-page padding fb_iframe_widget" data-href="https://www.facebook.com/autosencuotas" data-width="431" data-height="420" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1680878075483211&amp;container_width=0&amp;height=420&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fautosencuotas&amp;locale=es_LA&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;small_header=false&amp;width=431"><span style="vertical-align: bottom; width: 431px; height: 214px;"><iframe name="fe60830f525044" width="431px" height="420px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.2/plugins/page.php?adapt_container_width=true&amp;app_id=1680878075483211&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df3a86a126e203b%26domain%3Dwww.nuevo.autosencuotas.com.ar%26origin%3Dhttp%253A%252F%252Fwww.nuevo.autosencuotas.com.ar%252Ff3681539d610aa%26relation%3Dparent.parent&amp;container_width=0&amp;height=420&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Fautosencuotas&amp;locale=es_LA&amp;sdk=joey&amp;show_facepile=true&amp;show_posts=false&amp;small_header=false&amp;width=431" style="border: none; visibility: visible; width: 431px; height: 214px;" class=""></iframe></span></div>
               <div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 431px; height: 487px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 431px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 487px;" tabindex="0" vspace="0" width="100%" id="I0_1460569077013" name="I0_1460569077013" src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;width=431&amp;href=https%3A%2F%2Fplus.google.com%2F112292941267336479282&amp;rel=publisher&amp;hl=es&amp;origin=http%3A%2F%2Fwww.nuevo.autosencuotas.com.ar&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.es.SY_40ZMoMWM.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCMEcK17yqR0As8sbSiRgyv-iZFALw#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1460569077013&amp;parent=http%3A%2F%2Fwww.nuevo.autosencuotas.com.ar&amp;pfname=&amp;rpctoken=26636808" data-gapiattached="true" title="+Badge"></iframe></div>
            </article>
         </div>
      </div>
      <!-- ficha-beneficios -->
      <div class="col-md-12 border-color item-video item-small padding-small-item">
         <section class="col-md-6 col-xs-12 ">
            <article>
               <header>
                  <h3 class=" titulo-h3"><i class="fa fa-youtube-square"></i> Video <?php echo $detalles->modelos->marcas->nombre_marca.' '.$detalles->modelos->nombreModelo; ?></h3>
               </header>
               <iframe width="100%" height="315"  src="<?php echo $detalles->modelos->videoModelo; ?>"  frameborder=”0″ allowfullscreen></iframe>
               <footer>
               </footer>
            </article>
         </section>
         <section class="col-md-6 col-xs-12 ">
            <article>
               <header>
                  <h3 class="titulo-h3">Modelos Relacionados</h3>
               </header>
            </article>
            <div id="relacionados" class="carousel">
               <?php
                  if(count($relacionados)){
                      foreach ( $relacionados as $mi_rel){
                          //var_dump($mi_rel);
                          $url = Yii::app()->createUrl($mi_rel->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$mi_rel->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($mi_rel->tipoPlan));



                      ?>
               <div class="item-relacionados">
                  <a href="<?php echo $url; ?>" title="<?php echo $mi_rel->modelos->nombreModelo;?>" alt="">
                     <div class="contenedor-img-item-relacionados">
                        <figure>
                           <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($mi_rel->modelos->marcas->nombre_marca,  $mi_rel->modelos->nombreDirectorio); ?>" alt="" class="img-responsive">
                        </figure>
                     </div>
                  </a>
                  <div class="col-md-12 ">
                     <a href="<?php echo $url; ?>" title="<?php echo $mi_rel->modelos->nombreModelo; ?>" alt="">
                        <div class="bloque-item-relacionado col-xs-12 col-md-12 ">
                           <h3 class="item-relacionado-small"><?php echo $mi_rel->modelos->nombreModelo;?></h3>
                           <i class="fa fa-heart"></i>
                        </div>
                        <div>
                           <span class="item-recomendado-tipoPlan">Plan de ahorro <?php echo $mi_rel->tipoPlan; ?></span>
                           <p class="item-recomendado-valor">$<?php echo Modelo::findCuotaMenorByTipoPlan($mi_rel->tipoPlan, $mi_rel->idModeloPlan); ?></p>
                        </div>
                     </a>
                     <div>
                        <a href="<?php echo $url; ?>" title="<?php echo $mi_rel->modelos->nombreModelo; ?>" alt="">
                        </a>
                        <ul class="box-links">
                           <a href="<?php echo $url; ?>" title="<?php echo $mi_rel->modelos->nombreModelo; ?>" alt="">
                           </a>
                           <li class="link-compare"><a href="<?php echo $url; ?>" title="<?php echo $mi_rel->modelos->nombreModelo; ?>" alt="">
                              </a><a href="javascript:actions.comparaRelacionado(<?php echo $mi_rel->idPublicacion; ?>);" title="Comparar"><i class="fa fa-exchange"></i><span>Comparar</span></a>
                           </li>
                           <li class="quickview">
                              <a href="javascript:actions.modalConsulta('<?php echo $mi_rel->idPublicacion; ?>');" id="mostrarModeloModal-<?php echo $mi_rel->modelos->idModelo; ?>" class="a-quickview ves-colorbox rhb cboxElement" data-cuota="$<?php echo Modelo::findCuotaMenorByTipoPlan($mi_rel->tipoPlan, $mi_rel->idModeloPlan); ?>" data-id="<?php echo $mi_rel->modelos->idModelo; ?>" data-nombre="<?php echo $mi_rel->modelos->nombreModelo; ?>" data-conce="<?php echo Concesionarios::idConceByMarcaId($mi_rel->modelos->marcas->id); ?>" data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($mi_rel->modelos->marcas->nombre_marca,  $mi_rel->modelos->nombreDirectorio); ?>" data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($mi_rel->modelos->marcas->nombre_marca,  $mi_rel->modelos->nombreDirectorio); ?>" data-tipo="100%" data-publicacion="821" data-nom-public="Planes de Ahorro">
                              <i class="fa fa-eye"></i><span>Vista Rápida - </span></a>
                           </li>
                           <li class="mostrarModeloModal" data-cuota="<?php echo Modelo::findCuotaMenorByTipoPlan($mi_rel->tipoPlan, $mi_rel->idModeloPlan); ?>" data-id="121" data-nombre="<?php echo $mi_rel->modelos->nombreModelo; ?>" data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($mi_rel->modelos->marcas->nombre_marca,  $mi_rel->modelos->nombreDirectorio); ?>" data-descri="Entrega programada en cuota 10">
                              <a href="<?php echo $url; ?>" class="colorbox product-zoom rhb cboxElement" title="Ver detalle"> <i class="fa fa-external-link" aria-hidden="true"></i></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <?php
                  }
                  }
                  ?>
         </section>
         <section class="tag col-md-12 col-xs-12">
         <h3> <i class="fa fa-tags"></i> Tags</h3>
         <?php
            if(count($tags)){

            ?>
         <ul id="tags">
         <a href="" alt="Planes de Ahorro <?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo; ?>" title="Planes de Ahorro <?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo; ?>">
         <li class="tags">Plan de <?php echo $detalles->modelos->marcas->nombre_plan_marca; ?></li>
         </a>
         <?php foreach ( $tags as $mi_tag ) {?>
         <a href="" alt="Planes de Ahorro <?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo; ?>" title="Planes de Ahorro <?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo; ?>">
         <li class="tags"><?php echo $mi_tag; ?></li>
         </a>
         <?php } ?>
         </ul>
         <?php }  ?>
         </div>
         <!-- -->
         <?php echo $this->renderPartial('_comparador', array('j'=>true, 'publicacion1'=>$detalles->idPublicacion)); ?>
         <!-- -->
      </div>
      <div class="col-md-12 descargo">
      Las fotos e imagenes no son contractuales y son solo de caracter ilustrativo. Los planes son comercializados por <strong><?php echo Concesionarios::nombreConceByMarcaId($detalles->modelos->marcas->id); ?></strong>. Los requisitos crediticios son los solicituados por <strong><?php echo $detalles->modelos->marcas->nombre_plan_marca; ?></strong>, al momento vigente de la adjudicación. El valor de las cuotas es a solo efecto indicativo con el precio vigente. El importe de las cuotas corresponde a la modalidad de la cuota reducida con recuperación porcentual posterior conforme indicaciones generales del contrato de ahorro. No incluye gastos de flete, patentamiento, prenda, ni seguro del bien. Al retirar el vehículo se pagarán gastos de acuerdo a lo establecido por resolución N° 26/04 de la inspección de justicia. Stock disponible de 168 suscripciones
      </div>
   </div>
   </section>
</div>
<section class=" nopadding col-md-12">
   <!-- BANNER -->
   <?php echo $this->renderPartial('/default/_banner'); ?>
   <!-- FIN BANNER -->
</section>
<script>

   jQuery(document).ready(function($)
   {
       $('.fancybox').fancybox();
   });


   var hash = location.hash;
   var hash = hash.replace("#", "");
   if (hash != '') {
       $('.vendedorFijo').val(hash);
       $(document).ready(function () {
           Tools.createCookie("vendedorFijo", hash, 100);
       });
   }


   function cerrarCompara(cual)
   {
       $('#espacioComparar' + cual).html('<div class="nueva-seleccion"> <p><i class="fa fa-plus" onclick="cargarFormSelectorComparador(\'\',\'\',' + cual + ');"></i></p></div>');
   }


   function btnCompararModelo(idModelo, tipoPlan)
   {
       cargarFormSelectorComparador(idModelo, tipoPlan, '0r');
       altura = jQuery('#area-comparador').offset().top;
       altura = parseInt(altura) - 50;
       $('html, body').stop().animate({
           scrollTop: altura
       }, 2000);
   }


   function cargarFormSelectorComparador(idModelo, tipoPlan, cual)
   {
       if (cual == '0r') {
           cual = '0';
           sendRequest('GET', '../include/planComparacion.php?id=' + tipoPlan + '&modelo=' + idModelo + '&cualEspacio=' + cual, contenidoComparadorCargado, '', cual)
       } else {
           sendRequest('POST', '../include/formSelectorComparador.php', formSelectorCompararCargado, 'cualEspacio=' + cual, cual)
       }
   }


   function formSelectorCompararCargado(req, mas)
   {
       req = req.responseText;
       $('#espacioComparar' + mas).html(req);
   }



   function contenidoComparadorCargado(req, mas)
   {
       req = req.responseText;
       $('#espacioComparar' + mas).html(req);
   }



   function buscarModelo(el, cual)
   {
       padre = el.parentNode;
       val = el.value;
       $(padre).html('<div class="conteImgCarga"><img src="/img/loader-circulo-azul.gif" width="26"></div>');
       $(padre).load('../include/modeloComparacion.php?id=' + val + '&cualEspacio=' + cual);
   }




   function buscarPlan(el, cual)
   {
       padre = el.parentNode;
       val = el.value;
       $(padre).html('<div class="conteImgCarga"><img src="/img/loader-circulo-azul.gif" width="26"></div>');
       $(padre).load('../include/planComparacion.php?id=' + val + '&cualEspacio=' + cual);
       $(padre).addClass("comparaLLena");
       if (cantidadApretados == 2) {
           agregarDosMas();
       }
       if (nuncaPidioDatos && cantidadApretadosForm == 3) {
           nuncaPidioDatos = false;
           pedirDatos();
       }
   }




   function buscarPublicacion(el, modelo, cual)
   {
       padre = el.parentNode;
       val = el.value;
       $(padre).html('<div class="conteImgCarga"><img src="/img/loader-circulo-azul.gif" width="26"></div>');
       $(padre).load('../include/planComparacion.php?id=' + val + '&modelo=' + modelo + '&cualEspacio=' + cual);
   }
   
   
   
   
</script>

<script type="application/ld+json">
{
    "@context": "http://schema.org/",
    "@type": "Product",
    "name": "<?php echo $detalles->modelos->marcas->nombre_plan_marca.' '.$detalles->modelos->nombreModelo; ?>",
    "image": "<?php echo 'https://'.$_SERVER['HTTP_HOST'].$url_mod; ?>",
    "description": "<?php echo str_replace('"', '', $GLOBALS['meta']); ?>",
    "mpn": "96751b84be0e92a781017f7ddf0bb733a23173aa",
    "brand": {
        "@type": "Brand",
        "name": "<?php echo $detalles->modelos->marcas->nombre_plan_marca; ?>",
        "image" : "<?php echo  'https://'.$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl.'/img/marcas/'.strtolower(str_replace(' ', '-',$detalles->modelos->marcas->nombre_marca)).'.png'; ?>"
        },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "<?php echo $raty; ?>",
        "bestRating": "5",
        "reviewCount": "<?php echo $review;?>"
        },
    "offers": {
        "@type": "AggregateOffer",
        "priceCurrency": "ARS",
        "lowPrice": "<?php echo  Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan); ?>",
        "priceValidUntil": "2017-11-05",
        "itemCondition": "Product",
        "availability": "Offer",
        "seller": {
            "@type": "Organization",
            "name": "Autos en cuotas"
        }
    }
}
</script>

