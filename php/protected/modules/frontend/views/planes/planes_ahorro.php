<section  class="container">
 <section>
  <!--?php include'../include/slidermarcas.php'; ?-->
</section>


<!--DESTACADOS-->
<section id="ahorroListado" class="medio col-md-12 ">

  <h3 class="titulo-content col-md-12"><a href="/planes-nuevos/">Suscripciones planes de ahorro nuevos, últimos <span class="numero">12</span> lanzamientos </a></h3>
  <div class="sub-text"><span>Encontrá últimos vehículos del mercado automotor.</span></div>

  <ul id="ultimos" class="listado">

    <?php 
        foreach($planesDestacados as $destacado): 
            $url =  Yii::app()->createUrl($destacado->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$destacado->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($destacado->tipoPlan));
    ?>

     <li class="todo autosencuotas itemLiModelosMarca col-md-3 col-xs-12 plan-100% clase-20 Renault">
      <a itemprop="url" href="<?php echo $url; ?>">
       <div class="grid-item-content">
        <div class="hover-item hover-ahorro">

         <div class="inner-hover">
          <p class="nombreList" itemprop="name"><?php echo $destacado->modelos->nombreModelo; ?></p>
          <p class="valorList" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">Valor 0km <span itemprop="priceCurrency" content="ARS">$</span><span itemprop="price"><?php echo str_replace(',', '.', number_format($destacado->modelos->precio0kmModelo)); ?></span></p>
          <p class="tEntrega" itemprop="description">
           Modelo financiado por <span class="bold"><?php echo $destacado->modelos->marcas->nombre_marca; ?></span> Plan de Cuota en Pesos
         </p>
       </div>
     </div>

     <div class="img-container img-auto col-md-12 col-xs-12 ">
      <img itemprop="image" src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($destacado->modelos->marcas->nombre_marca,  $destacado->modelos->nombreDirectorio); ?>" alt="<?php echo $destacado->modelos->nombreModelo; ?>" title="<?php echo $destacado->modelos->marcas->nombre_marca.' '.$destacado->modelos->nombreModelo; ?>" class="img-responsive listImg">
    </div>

    <div id="item-content-info" class="col-md-12 col-xs-12 item-content-info" itemprop="brand" itemscope="" itemtype="http://schema.org/Organization">
      <p class="nombreList" itemprop="name"><?php echo $destacado->modelos->nombreModelo; ?></p>
      <div class="plan plan-<?php echo ($destacado->tipoPlan == '100%') ? 'cien' : 'setenta'; ?>">
       <p>Plan <?php echo $destacado->tipoPlan; ?></p>
     </div>
     <div id="item-price<?php echo $destacado->idModeloPlan; ?>" class="col-md-12 col-xs-12 item-price">
       <p><span class="cd col-md-6 ">Cuotas Desde:</span><span class="cuotaPlan center col-md-6"><?php echo '$'. Modelo::findCuotaMenorByTipoPlan($destacado->tipoPlan, $destacado->idModeloPlan); ?></span></p>
       <p><?php echo $destacado->modelos->marcas->nombre_plan_marca; ?></p>
     </div>
   </div>

   <a href="<?php echo $url; ?>" class="btn btn-default" data-url="">Ver Plan</a>
 </div>
</a>
</li>
<?php endforeach; ?>

</ul>
</section>
<!--Fin destacados-->


<!--ECONOMICOS-->
<section class="medio col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <h3 class="titulo-content col-md-12">Planes de Ahorro Económicos</h3>
  <div class="sub-text"><span>Encontrá los autos más económicos del mercado de autos 0km</span></div>
  <ul class="listado">

    <?php 
        foreach($planesEconomicos as $economico):
            $url =  Yii::app()->createUrl($economico->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$economico->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($economico->tipoPlan));
    ?>
      <li class="todo autosencuotas itemLiModelosMarca col-md-3 col-xs-12 plan-100% clase-0 Renault">
       <a itemprop="url" href="<?php echo $url; ?>">
        <div class="grid-item-content">


          <div class="hover-item hover-ahorro">

            <div class="inner-hover">
              <p class="nombreList" itemprop="name"><?php echo $economico->modelos->marcas->nombre_marca.' '.$economico->modelos->nombreModelo; ?></p>
              <p class="valorList" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">Valor 0km <span itemprop="priceCurrency" content="ARS">$</span><span itemprop="price"><?php echo str_replace(',', '.', number_format($economico->modelos->precio0kmModelo)) ; ?></span></p>
              <p class="tEntrega">
    						<?php if(intval(preg_replace('/[^0-9]+/', '', $publica->entrega), 10)){ ?>
                Entrega programada cuota <?php echo intval(preg_replace('/[^0-9]+/', '', $publica->entrega), 10);?>
                                                    <?php } ?>
                                    <br>Financiado por <span class="bold"><?php echo $publica->modelos->marcas->nombre_plan_marca; ?></span>                                            </p>
            </div>

          </div>
          <div class="img-container img-auto col-md-12 col-xs-12 ">
            <img itemprop="image" src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($economico->modelos->marcas->nombre_marca,  $economico->modelos->nombreDirectorio); ?>" alt="<?php echo $economico->modelos->nombreModelo; ?>" title="<?php echo $economico->modelos->marcas->nombre_marca.' '.$economico->modelos->nombreModelo; ?>" class="img-responsive listImg">
          </div>
          <div id="item-content-info" class="col-md-12 col-xs-12 item-content-info" itemprop="brand" itemscope="" itemtype="http://schema.org/Organization">
            <p class="nombreList" itemprop="name"><?php echo $economico->modelos->marcas->nombre_marca.' '.$economico->modelos->nombreModelo; ?></p>
            <div class="plan plan-<?php echo ($economico->tipoPlan == '100%') ? 'cien' : 'setenta'; ?>">
            <p>Plan <?php echo $economico->tipoPlan; ?></p>
            </div>
            <div id="item-price<?php echo $economico->idModeloPlan; ?>" class="col-md-12 col-xs-12 item-price">
              <p><span class="cd col-md-6 ">Cuotas Desde:</span><span class="cuotaPlan center col-md-6"><?php echo '$'. Modelo::findCuotaMenorByTipoPlan($economico->tipoPlan, $economico->idModeloPlan); ?></span></p>
              <p><?php echo $economico->modelos->marcas->nombre_plan_marca; ?></p>
            </div>
          </div>
          <a href="<?php echo $url; ?>" class="btn btn-default" data-url="">Ver Plan</a>
        </div>
      </a>
    </li>
  <?php endforeach; ?>

</ul>
</section>
<!--Fin de Economicos-->

<!--MAS VISTOS-->
<section class="medio col-lg-12 col-md-12 col-sm-12 col-xs-12">

  <h3 class="titulo-content col-lg-12 col-md-12 col-sm-12 col-xs-12">Planes de Ahorro más vistos</h3>
  <div class="sub-text"><span>Los autos más destacados del mercado automotor</span></div>
  <ul class="listado">



    <?php 
        foreach($planesMasVistos as $masvisto):
            $url =  Yii::app()->createUrl($masvisto->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$masvisto->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($masvisto->tipoPlan));
            
    ?>
    <li class="todo autosencuotas itemLiModelosMarca col-md-3 col-xs-12 plan-100% clase-20 Renault">
     <a itemprop="url" href="<?php echo $url; ?>">
      <div class="grid-item-content">


        <div class="hover-item hover-ahorro">

          <div class="inner-hover">
            <p class="nombreList" itemprop="name"><?php echo $masvisto->modelos->marcas->nombre_marca. ' ' .$masvisto->modelos->nombreModelo; ?></p>
            <p class="valorList" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">Valor 0km <span itemprop="priceCurrency" content="ARS">$</span><span itemprop="price"><?php echo str_replace(',', '.', number_format($masvisto->modelos->precio0kmModelo)); ?></span></p>
            <p class="tEntrega" itemprop="description">
              Modelo financiado por <span class="bold"><?php echo $masvisto->modelos->marcas->nombre_marca; ?></span> Plan de Cuota en Pesos                                </p>

            </div>

          </div>
          <div class="img-container img-auto col-md-12 col-xs-12 ">
            <img itemprop="image" src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($masvisto->modelos->marcas->nombre_marca,  $masvisto->modelos->nombreDirectorio); ?>" alt="<?php echo $masvisto->modelos->nombreModelo; ?>" title="<?php echo $masvisto->modelos->marcas->nombre_marca.' '.$masvisto->modelos->nombreModelo; ?>" class="img-responsive listImg">
          </div>
          <div id="item-content-info" class="col-md-12 col-xs-12 item-content-info" itemprop="brand" itemscope="" itemtype="http://schema.org/Organization">
            <p class="nombreList" itemprop="name"><?php echo $masvisto->modelos->marcas->nombre_marca. ' ' .$masvisto->modelos->nombreModelo; ?></p>
            <div class="plan plan-<?php echo ($masvisto->tipoPlan == '100%') ? 'cien' : 'setenta'; ?>">
              <p>Plan <?php echo $masvisto->tipoPlan; ?></p>
            </div>
            <div id="item-price<?php echo $masvisto->idModeloPlan;?>" class="col-md-12 col-xs-12 item-price">
              <p><span class="cd col-md-6 ">Cuotas Desde:</span><span class="cuotaPlan center col-md-6"><?php echo '$'. Modelo::findCuotaMenorByTipoPlan($masvisto->tipoPlan, $masvisto->idModeloPlan); ?></span></p>
              <p><?php echo $masvisto->modelos->marcas->nombre_plan_marca; ?></p>
            </div>
          </div>
           <a href="<?php echo $url; ?>" class="btn btn-default" data-url="">Ver Plan</a>
        </div>
      </a>
    </li>
  <?php endforeach; ?>
  </ul>
</section>
<!--Fin mas vistos-->

</section>

