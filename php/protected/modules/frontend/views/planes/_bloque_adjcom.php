<?php

$model = new Consultas();
//Obtengo la cuota pura segun el plan
$valorAuto = $publicacion->modelos->precio0kmModelo;
$tipoPlan = $publicacion->tipoAC;
$cantCuotas = 84;

if($tipoPlan == '100%')
{
    $cuotaPura = $valorAuto / $cantCuotas;
    $plan_c = 100;
}
else
{
    $plan_c = substr($tipoPlan, 0,2);
    $cuotaPura = ($valorAuto * $plan_c) / 100;
    $cuotaPura = $cuotaPura / $cantCuotas;
    $cuotaPura = round($cuotaPura);
}

// ahorro del adj - com  (cuota_pura * cant ) - valor de venta
$ahorro = ($cuotaPura*$publicacion->cantCuotasAC)-$publicacion->valorAC;
switch ($tipoPlan) {
    case "70/30":

            $explica = 'Plan 70/30 quiere decir 70% del veh&iacute;culo dividido en 84 cuotas y que el 30% se paga al contado al retirar la unidad.';

        break;
    
    case "100%":
            $explica = 'Plan 100% quiere decir que el 100% del valor del veh&iacute;culo se divide en 84 cuotas.';
        break;
    
    case "60/40":
            $explica = 'Plan 60/40 quiere decir 60% del veh&iacute;culo dividido en 84 cuotas y que el 40% se paga al contado al retirar la unidad.';
        break;
    
    case "75/25":
            $explica = 'Plan 75/25 quiere decir 75% del veh&iacute;culo dividido en 84 cuotas y que el 25% se paga al contado al retirar la unidad.';
        break;

    default:
        break;
}

$codigo = substr($publicacion->reventaAC,0,1).substr($publicacion->modelos->marcas->nombre_marca,0,1).substr($publicacion->modelos->nombreModelo,0,1).$publicacion->idPublicacionAC;

$url_rev = Yii::app()->createUrl($tipo_url.'/'.$publicacion->reventas->idReventa.'__'.$publicacion->reventas->nombreCortoReventa);
?>

<!--PARTIAL CONSULTAS-->
<div class="modalBox">
    <div class="container">
        <div class="boxcontent">
            <div class="modal-header">
                <div class="cerrarFlotante col-md-12 padding10"><i class="fa fa-close right"></i></div>
                <div class="col-md-6 col-sm-6"><span class="img"></span></div>
                <div class="col-md-6 col-sm-6">
                    <h3><span class="nom"></span></h3>
                    <p><span class="cuota"></span></p>
                    <p><span class="tipoPlan"></span></p>
                </div>

                <?php echo $this->renderPartial('_consultarModal', array('model'=>$model)); ?>

            </div>
        </div>
    </div>
</div>

<section id="slideDownModelo" class="col-md-12 col-xs-12" style="display: none;">
    <article class="container">
        <div class="col-md-2 col-xs-3">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($publicacion->modelos->nombreDirectorio).'.jpg'; ?>" alt="<?php echo $detalles->modelos->marcas->nombre_marca;?>" title="<?php echo $detalles->modelos->marcas->nombre_marca;?>" class="img-responsive">
        </div>
        <div class="col-md-7 col-xs-6">
            <div class="col-md-6">
             <h2 class="tituloItem"><?php $publicacion->modelos->nombreModelo; ?></h2>
             <p class="precio0kmModelo">Financiado por <?php echo $publicacion->modelos->marcas->nombre_plan_marca; ?> en cuotas sín interés</p>
         </div>
            <div class="valores-slideTop col-md-6">             
                <p class="cuotasSlideTop">Valor de venta <?php echo str_replace(',', '.',number_format($publicacion->valorAC)); ?> </p>
                <p class="precio0kmModelo">Valor de cuota total aprox: $<?php echo str_replace(',', '.',number_format($publicacion->promedioCuotasAC)); ?>- Plan <?php echo $publicacion->tipoAC;?></p>
            </div>
        </div>
        <div class="col-md-3 col-xs-3">
            <p class="mostrarModeloModal btn btn-top-slide" onclick="javascript:actions.modalConsulta('<?php echo $publicacion->idPublicacionAC; ?>');" data-public="adjudicado" data-cuota="<?php echo  str_replace(',', '.',number_format($publicacion->promedioCuotasAC)); ?>" id="mostrarModeloModal-<?php echo $publicacion->idPublicacionAC; ?>" data-id="<?php echo $publicacion->idPublicacionAC; ?>" data-nombre="<?php echo $publicacion->modelos->nombreModelo; ?>" data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($publicacion->modelos->nombreDirectorio).'.jpg'; ?>" data-tipo="<?php echo $publicacion->tipoAC;?>" data-descri="">Consultar</p>
        </div>
    </article>
 </section>

<div class="padding-small">
    <div id="wrapperContent" class="container"  >
        <div class="col-md-12">
            <div id="breadcrumb" class="col-md-12">
                <ul class="breadcrumb">

                    <li class="active color"><a itemprop="url" href="<?php echo Yii::app()->createUrl("index.php"); ?>"><i class="fa fa-home"></i></a></li>
                    <li class="active"><a itemprop="url" href="<?php echo Yii::app()->createUrl($tipo_url); ?>"><?php echo $nombre_url;?></a></li>
                    <li class="active" itemprop="name"><a href="<?php echo $url_rev; ?>"><?php echo $publicacion->reventas->nombreCortoReventa; ?></a></li>
                    <?php /*<li class="right nombreMarcaCirculo" itemprop="brand"><a href="site/reventa-marca.php">Ver todos los modelos de  Dietrich</a></li> */?>
                </ul>
            </div>
            <div id="item-photo-content" class="col-md-5 col-xs-12  col-sm-6 ">
                <div class="col-md-12 item-central-index border-color item-small padding-small-item">
                    <div id="imgContainerPhoto" class="col-md-12 tiny-padding zoom">
                        <img id="zoom_01"  data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($publicacion->modelos->nombreDirectorio).'.jpg'; ?>" src="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($publicacion->modelos->nombreDirectorio).'.jpg'; ?>" alt="" title="" class="img-responsive ">
                    </div>
                    <div class="col-md-12 tiny-padding">
                                            <ul class="nopadding owl-carousel">
                                                <?php
                    $total =7 ;
                    $url = "https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI'];
                    for ($i=1; $i < $total; $i++) { ?>
                    <li class="list-img-carousel">
                        <a class="fancybox" rel="gallery1" href="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/<?php echo Modelo::getNombreImagenGr($publicacion->modelos->nombreDirectorio).'-'.$i.'.jpg'; ?>" >
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/modelos/mini/<?php echo Modelo::getNombreImagenGr($publicacion->modelos->nombreDirectorio).'-'.$i.'.jpg'; ?>" onerror="this.onerror=null; this.src='<?php echo Yii::app()->request->baseUrl; ?>/img/marcas/image.png'" />
                        </a>
                    </li>
                    <?php } ?>
                                            </ul>
                    </div>
                    
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
            </div>
            <div id="item-info-content" class="col-md-7 col-sm-6 col-xs-12">
              <div id="content-info-plan-adcom"  class="col-md-12 item-central-index border-color item-small padding-small-item">


              <div class="col-md-7 padding10">
                <h2 class="nombreReventaH1"><?php echo $publicacion->modelos->marcas->nombre_plan_marca.' '.$publicacion->modelos->nombreModelo; ?></h2>

                <div class="col-md-12">
                  <p class="planTipoAc">
                    <span data-toggle="tooltip" title="<?php echo $explica; ?>"><?php echo $nombre_url;?> <?php echo $publicacion->tipoAC; ?> en 84 cuotas.</span>
                  </p>
                </div>
                <div class="col-md-12 col-xs-12">
                  <p class=" superMorocha" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                      <meta itemprop="priceCurrency" content="ARS" />
                      <span itemprop="price" content="<?php echo str_replace(',', '.',number_format($publicacion->valorAC)); ?>" class="precioAC">$<?php echo str_replace(',', '.',number_format($publicacion->valorAC)); ?></span>
                    </p>
                  <p class="financiado">Valor de venta</p>
                  <p class="pago_cuota_pura"> Pagado a Cuota Pura <strong>$<?php echo str_replace(',', '.',number_format($cuotaPura*($publicacion->cantCuotasAC)));?></strong></p>
                  <?php if($ahorro>0){?>
                  
                  <p class="ahorro">
                    Ahorro
                    <span><strong>$<?php echo str_replace(',', '.',number_format($ahorro));?></strong></span>
                  </p>
                  <?php } ?>
                  <p id="referenciaDetalle" class="financiado">Código Referencia: <?php echo $codigo; ?></p>
                </div>



                <div class="col-md-12">
                  <p class="">Tiene <strong> <?php echo $publicacion->cantCuotasAC; ?> </strong> cuotas pagas. </p>
                  <p class="">Restan pagar <strong> <?php echo 84 - $publicacion->cantCuotasAC; ?> </strong> cuotas. </p>
                  </div>
                
              </div>
              <div class="col-md-5">
                <a href="<?php echo $url_rev; ?>" class="margin-15">
                    <img id="imgAdjmarca" itemprop="image" src="<?php echo Yii::app()->request->baseUrl.'/img/marcas/'.strtolower(str_replace(' ', '-',$publicacion->reventas->nombreCortoReventa)); ?>.png" alt="<?php Concesionarios::nombreConceByMarcaId($publicacion->modelos->marcas->id); ?>" class="img-responsive">
                </a>
                <div class="col-md-12 col-xs-12">
                    <p class="valor-0km margin-15">Valor m&oacute;vil 0km $<?php echo str_replace(',', '.',number_format($publicacion->modelos->precio0kmModelo)); ?> </p>
                  
                  
                  <p>Valor de cuota pura <strong>$<?php echo str_replace(',', '.',number_format($cuotaPura)); ?></strong></p>
                <p>
                    Valor de cuota total aprox. <strong>$<?php echo str_replace(',', '.',number_format($publicacion->promedioCuotasAC));?></strong>
                </p>
                </div>

                <div class="bloqueGris padding10 col-md-12 col-xs-12 bloqueAC ">
                    <p><?php echo $publicacion->explicaAC; ?> . Plan <?php echo $publicacion->tipoAC; ?> con el 30% pago e incluido en el precio.</p>

                </div>
                <div class=" margin-15 col-md-12 col-xs-12  bloqueAC ">
                  <p><?php echo $publicacion->modelos->equipamientoModelo; ?> </p>
                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <form action="?" class="margin-15">
                      <textarea name="" id="textarea" class="col-md-12 form-control" placeholder="Consultá ahora y contactate con un asesor."></textarea>
                      <input type="submit" name="btnSend" id="btnSender" class="btn rigth col-md-3 col-xs-12" value="Continuar">
                  </form>
              </div>
</div>
              </div>
                </div>
            </div>
            <div class=" container">
                <div class="videoAdj col-md-12  ">
                    <div class="item-video item-small padding-small-item">
                        <div class="col-md-6">
                            <h3 class=" titulo-h3"><i class="fa fa-youtube-square"></i> Video</h3>
                            <iframe width="100%" height="315"  src="<?php echo $publicacion->modelos->videoModelo; ?>"  frameborder=”0″ allowfullscreen></iframe>
                        </div>
                        <div class="col-md-6">
                            <h3 class=" titulo-h3">¿Por qu&eacute; conviene un plan Adjudicado?</h3>
                            <h5></h5>
                            <p class="fs_adcom"> Antes de realizar una compra o venta hay que consultar al concesionario oficial y/o la  administradora el estado del plan y la forma correcta de realizar dicha transferencia. </p>
                            <a href="https://www.autosencuotas.com.ar/blog/contacto-administradoras-de-planes-de-ahorro/">https://www.autosencuotas.com.ar/blog/contacto-administradoras-de-planes-de-ahorro/</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<script type="application/ld+json">
{
    "@context": "http://schema.org/",
    "@type": "Product",
    "name": "<?php echo $publicacion->modelos->marcas->nombre_plan_marca.' '.$publicacion->modelos->nombreModelo; ?>",
    "image": "<?php echo 'https://'.$_SERVER['HTTP_HOST'].$url_rev; ?>",
    "description": "<?php echo str_replace('"', '', $GLOBALS['meta']); ?>",
    "mpn": "96751b84be0e92a781017f7ddf0bb733a23173aa",
    "brand": {
        "@type": "Brand",
        "name": "<?php echo $publicacion->modelos->marcas->nombre_plan_marca; ?>",
        "image" : "<?php echo  'https://'.$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl.'/img/marcas/'.strtolower(str_replace(' ', '-',$publicacion->modelos->marcas->nombre_marca)).'.png'; ?>"
        },
 
    "offers": {
        "@type": "Offer",
        "priceCurrency": "ARS",
        "Price": "<?php echo str_replace(',', '.',number_format($publicacion->valorAC));?>",
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