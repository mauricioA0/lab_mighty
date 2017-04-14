<div id="posts" vista="<?php echo $vista; ?>">
    <script>$(".cantidad").html(<?php echo $total;?>);</script>
	<?php if(!Yii::app()->user->getFlash('sin-resultados')): ?>


<?php
    foreach($publicaciones as $publica):
        $url =  Yii::app()->createUrl($publica->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$publica->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($publica->tipoPlan));
?>
<li class="todo nopadding autosencuotas itemLiModelosMarca itemlargo col-xs-12 plan-10-0 clase-40 Fiat " data-orden="222801">
   <div class="col-lg-12 col-sm-12 col-md-12 overflow nopadding">
      <a href="<?php echo $url; ?>">
         <div class="col-lg-4 col-sm-4 col-md-4 img-content-li">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($publica->modelos->marcas->nombre_marca,  $publica->modelos->nombreDirectorio); ?>" alt="FiorinoFurgon" title="Fiat Fiorino Furgon" class="img-responsive listImg">
         </div>
      </a>
      <a href="<?php echo $url; ?>">
         <div class="col-lg-8 col-md-8 col-sm-8 ">
            <div class=" flota plan plan-<?php echo ($publica->tipoPlan == '100%') ? 'cien': 'setenta'; ?>">
               <p>Plan <?php echo $publica->tipoPlan; ?></p>
            </div>
            <h2 class="nombreList"><?php echo $publica->modelos->marcas->nombre_plan_marca. ' ' .$publica->modelos->nombreModelo; ?></h2>
            <p><?php echo $publica->modelos->marcas->nombre_plan_marca; ?></p>
            <div class="col-lg-6 col-sm-6 col-md-6 nopadding">
               <div id="fraseVot"></div>
               <div class="col-md-12  estrellasVotacion">
                  <div id="estrellasVotos" class="col-md-6" itemscope="" itemtype="http://schema.org/AggregateRating" itemprop="aggregateRating">
                     <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
                     <?php echo Raty::findRatyByIdModelo($publica->modelos->idModelo); ?><small>/5</small>
                  </div>
                  <p class="like-listado"> <i class="fa fa-thumbs-up"></i> <?php echo $publica->modelos->votPos; ?></p>
               </div>
               <p><span class="cd col-lg-6 col-sm-6 col-md-6  nopadding">Cuotas Desde:</span><span class="cuotaPlan center col-md-6"><?php echo '$'. Modelo::findCuotaMenorByTipoPlan($publica->tipoPlan, $publica->idModeloPlan); ?></span></p>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 nopadding">
               <p class="valorList">Valor 0km <?php echo '$'. str_replace(',', '.',number_format($publica->modelos->precio0kmModelo)); ?> </p>
            </div>
            <p class="tEntrega">
  						<?php if(intval(preg_replace('/[^0-9]+/', '', $publica->entrega), 10)){ ?>
              Entrega programada cuota <?php echo intval(preg_replace('/[^0-9]+/', '', $publica->entrega), 10);?>
                                                  <?php } ?>
                                  <br>Financiado por <span class="bold"><?php echo $publica->modelos->marcas->nombre_plan_marca; ?></span>
                                </p>
         </div>
      </a>
      <div class="botones margin-15 col-lg-8">
         <a
              href="javascript:actions.modalConsulta('<?php echo $publica->idModeloPlan; ?>');"
              id="mostrarModeloModal-<?php echo $publica->idModeloPlan; ?>"
              class="btn btn-success mostrarModeloModal"
              data-cuota="<?php echo '$'. Modelo::findCuotaMenorByTipoPlan($publica->tipoPlan, $publica->idModeloPlan); ?>" data-id="<?php echo $publica->idModeloPlan; ?>"
              data-nombre="<?php echo $publica->modelos->nombreModelo; ?>"
              data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($publica->modelos->marcas->nombre_marca,  $publica->modelos->nombreDirectorio); ?>"
              data-tipo="<?php echo $publica->tipoPlan; ?>"
              data-publicacion="<?php echo $publica->idPublicacion; ?>"
              data-conce="<?php echo Concesionarios::idConceByMarcaId($publica->modelos->marcas->id); ?>"
              data-nom-public="<?php echo $tipo; ?>">Consultar
              </a>
         <a class="btn btn-success-outline right" href="<?php echo $url; ?>">Ver Detalle <i class="fa fa-chevron-right"></i> </a>
      </div>
   </div>
</li>
<?php endforeach; ?>


<?php else: ?>

<div class="col-xs-12">
<div class="alert alert-warning" role="alert">Su busqueda no obtuvo resultados.</div>
</div>

<?php endif; ?>
</div>
