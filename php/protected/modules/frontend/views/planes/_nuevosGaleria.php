
<div id="posts" vista="<?php echo $vista; ?>">
<script>$(".cantidad").html(<?php echo $total;?>);</script>
<?php if(!Yii::app()->user->getFlash('sin-resultados')): ?>

<?php
    foreach($nuevos as $nuevo):
        $publ_ = strtolower(str_replace(' ', '-',$nuevo->modelos->marcas->nombre_marca.'_'.$nuevo->modelos->nombreModelo)).'_'.TipoPlan::generarSlugTipoPlan($nuevo->tipoPlan);
        $url =  Yii::app()->createUrl($nuevo->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$nuevo->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($nuevo->tipoPlan));
?>

<div class="post">
<li class="todo autosencuotas itemLiModelosMarca col-md-4 col-sm-6 col-xs-12 plan-10-0 clase-40 Fiat" data-orden="222801">
	<div class="comparar-producto">
		<fieldset>
                    <input id="<?php echo str_replace('.', '-_-',$publ_); ?>" onclick="actions.camparadorSelector('<?php echo str_replace('.', '-_-', $publ_); ?>');" type="checkbox" name="comparar" data-compare="113" data-compare-tipo="100" value="" data-comparar="seleccionado">
			<p>Comparar este plan</p>
		</fieldset>
	</div>
        <a href="<?php echo $url; ?>">


	<?php if(Modelo::getPublicacionNueva($nuevo->modelos->idModelo)): ?>
		<span class="nuevoModelo">  Nuevo  </span>
	<?php endif; ?>

		<div class="grid-item-content">

                    <div class="hover-item ">
                        <div class="inner-hover">
                            <p class="nombreList"><?php echo $nuevo->modelos->marcas->nombre_marca. ' '.$nuevo->modelos->nombreModelo; ?></p>
                            <p class="valorList">Valor 0km <?php echo '$'. str_replace(',', '.',number_format($nuevo->modelos->precio0kmModelo)); ?> </p>
                            <p class="tEntrega">
                                <?php if(intval(preg_replace('/[^0-9]+/', '', $nuevo->entrega), 10)){ ?>
                                Entrega programada cuota <?php echo intval(preg_replace('/[^0-9]+/', '', $nuevo->entrega), 10);?>
                                <?php } ?>
                                <br>Financiado por
                                <span class="bold"><?php echo $nuevo->modelos->marcas->nombre_plan_marca; ?></span>
                            </p>

                            <div id="fraseVot<?php echo $nuevo->idPublicacion; ?>"></div>

                            <div class="col-md-12  estrellasVotacion">
                                <div id="estrellasVotos<?php echo $nuevo->idPublicacion; ?>" class="col-md-6" itemscope="" itemtype="http://schema.org/AggregateRating" itemprop="aggregateRating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star icon-warning" style="font-family:'FontAwesome' !important; margin-left:10px;"></i>
                                    <?php echo Raty::findRatyByIdModelo($nuevo->modelos->idModelo); ?><small>/5</small>
                                </div>

                                <p class="like-listado">
                                    <i class="fa fa-thumbs-up"></i> <?php echo $nuevo->modelos->votPos; ?>
                                </p>
                            </div>
                            
                            <p class="mobile_hide">
                                <?php echo $nuevo->tipoPlan; ?>
                                <label class="right">
                                    <?php echo 'Cuotas desde : $'. Modelo::findCuotaMenorByTipoPlan($nuevo->tipoPlan, $nuevo->idModeloPlan); ?>
                                </label>
                            </p>
                
                        </div>

                    </div>


			<div class="img-auto img-container col-md-12 col-xs-12">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($nuevo->modelos->marcas->nombre_marca,  $nuevo->modelos->nombreDirectorio); ?>" alt="<?php echo $nuevo->modelos->nombreModelo; ?>" title="<?php echo $nuevo->modelos->marcas->nombre_marca.' '. $nuevo->modelos->nombreModelo; ?>" class="img-responsive listImg">
			</div>
			<div id="item-content-info<?php echo $nuevo->idPublicacion; ?>" class="col-md-12 col-xs-12 item-content-info">
				<p class="nombreList"><?php echo $nuevo->modelos->marcas->nombre_marca.' '. $nuevo->modelos->nombreModelo; ?></p>

				<div id="item-price<?php echo $nuevo->idModeloPlan;  ?>" class="col-md-12 col-xs-12 item-price">
					<p><span class="cd col-md-6 ">Cuotas Desde:</span><span class="cuotaPlan center col-md-6"><?php echo '$'. Modelo::findCuotaMenorByTipoPlan($nuevo->tipoPlan, $nuevo->idModeloPlan); ?></span></p>
					<p><?php echo $nuevo->modelos->marcas->nombre_plan_marca; ?></p>
				</div>
			</div>


		</div>
		<div class="plan plan-<?php echo ($nuevo->tipoPlan == '100%') ? 'cien' : 'setenta'; ?>">
			<p>Plan <?php echo $nuevo->tipoPlan; ?></p>
		</div>
                
                

	</a>
	<div class="botonConsultar">
	  <a
	  href="javascript:actions.modalConsulta('<?php echo $nuevo->idModeloPlan; ?>');"
	  id="mostrarModeloModal-<?php echo $nuevo->idModeloPlan; ?>"
	  class="btn btn-success mostrarModeloModal"
	  data-cuota="<?php echo '$'. Modelo::findCuotaMenorByTipoPlan($nuevo->tipoPlan, $nuevo->idModeloPlan); ?>" data-id="<?php echo $nuevo->idModeloPlan; ?>"
	  data-nombre="<?php echo $nuevo->modelos->nombreModelo; ?>"
	  data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($nuevo->modelos->marcas->nombre_marca,  $nuevo->modelos->nombreDirectorio); ?>"
	  data-tipo="<?php echo $nuevo->tipoPlan; ?>"
	  data-publicacion="<?php echo $nuevo->idPublicacion; ?>"
          data-conce="<?php echo Concesionarios::idConceByMarcaId($nuevo->modelos->marcas->id); ?>"
	  data-nom-public="<?php echo $tipo; ?>">Consultar
	  </a>

		<a class="btn btn-success-outline right" href="<?php echo $url; ?>" >Ver Detalle <i class="fa fa-chevron-right"></i> </a>
	</div>
</li>
</div>
<?php endforeach; ?>

<?php else: ?>

<div class="col-xs-12">
<div class="alert alert-warning" role="alert">Su busqueda no obtuvo resultados.</div>
</div>
<?php endif; ?>
</div>


<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Cargando...',
    'donetext' => 'No se encontraron mas resultados',
    'pages' => $pages,
)); ?>
