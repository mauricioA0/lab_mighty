<div id="posts" vista="<?php echo $vista; ?>">
<script>$(".cantidad").html(<?php echo $total;?>);</script>
<?php if(!Yii::app()->user->getFlash('sin-resultados')): ?>

<?php 
    foreach($destacados as $destacado):
        if($destacado->estadoPlan==2){
            $url =  Yii::app()->createUrl('planes-ahorro-adjudicados/'.$destacado->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$destacado->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($destacado->tipoAC).'/'.$destacado->idPublicacionAC);
        } else {
            $url =  Yii::app()->createUrl('planes-ahorro-comenzados/'.$destacado->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$destacado->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($destacado->tipoAC).'/'.$destacado->idPublicacionAC);
        }
?>
   <div class="post">

      <li class="nopadding todo itemLiModelosMarca itemlargo col-lg-12 col-md-12 col-sm-12 plan-70-30 clase-5 Ford">
       <div class="col-lg-12 col-sm-12 col-md-12 overflow  nopadding">
         <div class="col-lg-4 col-sm-4 col-md-4 img-content-li">
           <a href="<?php echo $url; ?>">
           <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($destacado->modelos->marcas->nombre_marca,  $destacado->modelos->nombreDirectorio); ?>" alt="<?php echo $destacado->modelos->nombreModelo; ?>" title="<?php echo $destacado->modelos->marcas->nombre_marca.' '.$destacado->modelos->nombreModelo; ?>" class="img-responsive listImg">
           </a>
         </div>
         <div class="col-lg-8 col-md-8 col-sm-8 ">
           <div class="flota plan plan-<?php echo ($destacado->tipoAC == '100%') ? 'cien' : 'setenta'; ?>">
             <p>Plan <?php echo $destacado->tipoAC; ?></p>
           </div>
           <h2 class="nombreList"><?php echo $destacado->modelos->marcas->nombre_marca.' '.$destacado->modelos->nombreModelo; ?></h2>
           <p class="estadodeplan">Plan  <?php echo $tipo; ?> - <a href="<?php echo $url; ?>">
             <?php echo ucwords($destacado->reventas->nombreCortoReventa); ?></a></p>
             <div>
               <p class="cuotaPlan"><?php echo '$'. str_replace(',', '.',number_format($destacado->valorAC)); ?> <span class="valorList">Valor 0km <?php echo '$'. str_replace(',', '.',number_format($destacado->modelos->precio0kmModelo)); ?></span></p>
             </div>
             <p>Tiene <strong><?php echo $destacado->cantCuotasAC; ?>/84</strong> Cuotas pagas</p>             
             <p class="tEntrega"><?php echo $destacado->explicaACDestacado; ?></p>
             <div>
               <a href="<?php echo $url; ?>" class="listadoBtn">Consultar un asesor</a>
             </div>
           </div>
         </div>
       </li>

   </div>
   <?php endforeach; ?>

   <?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Cargando...',
    'donetext' => 'No se encontraron mas resultados',
    'pages' => $pages,
)); ?>

<?php else: ?>

<div class="col-xs-12">
<div class="alert alert-warning" role="alert">Su busqueda no obtuvo resultados.</div>
</div>
<?php endif; ?>

</div>

