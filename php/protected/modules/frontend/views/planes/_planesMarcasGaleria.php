
<li style="display: none;">
    <div id="posts" vista="<?php echo $vista; ?>"></div>
    <script>$(".cantidad").html(<?php echo $total;?>);</script>

</li>
	<?php if(!Yii::app()->user->getFlash('sin-resultados')): ?>


<?php
    foreach($publicaciones as $publica):
        $url =  Yii::app()->createUrl($publica->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$publica->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($publica->tipoPlan));
        $publ_ = strtolower(str_replace(' ', '-',$publica->modelos->marcas->nombre_marca.'_'.$publica->modelos->nombreModelo)).'_'.TipoPlan::generarSlugTipoPlan($publica->tipoPlan);
?>
<li class="todo itemLiModelosMarca col-md-4 col-sm-6 col-xs-12 plan-10-0 clase-0" data-orden="167701">
	<div class="comparar-producto">
		<fieldset>
                    <input id="<?php echo str_replace('.', '-_-', $publ_)  ; ?>" onclick="actions.camparadorSelector('<?php echo str_replace('.', '-_-', $publ_); ?>');" type="checkbox" name="comparar" data-compare="113" data-compare-tipo="100" value="" data-comparar="seleccionado">
			<p>Comparar este plan</p>
		</fieldset>
	</div>
	<a href="<?php echo $url; ?>">

		<div class="grid-item-content">


			<?php if(Modelo::getPublicacionNueva($publica->modelos->idModelo)): ?>
			<span class="nuevoModelo">  Nuevo  </span>
			<?php endif; ?>


			<div class="hover-item ">
				<div class="inner-hover">
					<p class="nombreList"><?php echo $publica->modelos->marcas->nombre_marca. ' '.$publica->modelos->nombreModelo; ?></p>
					<p class="valorList">Valor 0km <?php echo '$'. str_replace(',', '.',number_format($publica->modelos->precio0kmModelo)); ?> </p>
					<p class="tEntrega">
						<?php if(intval(preg_replace('/[^0-9]+/', '', $publica->entrega), 10)){ ?>
                                                Entrega programada cuota <?php echo intval(preg_replace('/[^0-9]+/', '', $publica->entrega), 10);?>
                                                <?php } ?>
                                <br>Financiado por <span class="bold"><?php echo $publica->modelos->marcas->nombre_plan_marca; ?></span>
                              </p>
						<div id="fraseVot<?php echo $publica->idPublicacion; ?>"></div><div class="col-md-12  estrellasVotacion">
              <div id="estrellasVotos<?php echo $publica->idPublicacion; ?>" class="col-md-6" itemscope="" itemtype="http://schema.org/AggregateRating" itemprop="aggregateRating">

						<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star icon-warning" style="font-family:'FontAwesome' !important; margin-left:10px;"></i><?php echo Raty::findRatyByIdModelo($publica->modelos->idModelo); ?><small>/5</small></div><p class="like-listado"> <i class="fa fa-thumbs-up"></i> <?php echo $publica->modelos->votPos; ?></p>
                                                </div>   
                                                
                                                <p class="mobile_hide">
                                                    <?php echo $publica->tipoPlan; ?>
                                                    <label class="right">
                                                        <?php echo 'Cuotas desde : $'. Modelo::findCuotaMenorByTipoPlan($publica->tipoPlan, $publica->idModeloPlan); ?>
                                                    </label>
                                                </p>
                                </div>

          </div>
					<div class="img-auto img-container col-md-12 col-xs-12">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($publica->modelos->marcas->nombre_marca,  $publica->modelos->nombreDirectorio); ?>" alt="<?php echo $publica->modelos->nombreModelo; ?>" title="<?php echo $publica->modelos->marcas->nombre_marca.' '.$publica->modelos->nombreModelo; ?>" class="img-responsive listImg">
					</div>
					<div id="item-content-info<?php echo $publica->idPublicacion; ?>" class=" item-content-info col-md-12 col-xs-12">
						<p class="nombreList"><?php echo $publica->modelos->marcas->nombre_marca. ' '.$publica->modelos->nombreModelo; ?></p>
						<div class="plan plan-<?php echo ($publica->tipoPlan == '100%') ? 'cien' : 'setenta'; ?>">
							<p>Plan <?php echo $publica->tipoPlan; ?></p>
						</div>
					</div>
					<div id="item-price<?php echo $publica->idPublicacion; ?>" class="item-price col-md-12 col-xs-12">
						<p><span class="cd col-md-6 ">Cuotas Desde:</span><span class="cuotaPlan center col-md-6"><?php echo '$'. Modelo::findCuotaMenorByTipoPlan($publica->tipoPlan, $publica->idModeloPlan); ?></span></p>
						<p><?php echo $publica->modelos->marcas->nombre_plan_marca; ?></p>
                                                
					</div>
				</div>
			</a>
			<div>
				<a
				  href="javascript:actions.modalConsulta('<?php echo $publica->idModeloPlan; ?>');"
				  id="mostrarModeloModal-<?php echo $publica->idModeloPlan; ?>"
				  class="btn btn-success  mostrarModeloModal"
				  data-cuota="<?php echo '$'. Modelo::findCuotaMenorByTipoPlan($publica->tipoPlan, $publica->idModeloPlan); ?>" data-id="<?php echo $publica->idModeloPlan; ?>"
				  data-nombre="<?php echo $publica->modelos->nombreModelo; ?>"
				  data-img="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($publica->modelos->marcas->nombre_marca,  $publica->modelos->nombreDirectorio); ?>"
				  data-tipo="<?php echo $publica->tipoPlan; ?>"
				  data-publicacion="<?php echo $publica->idPublicacion; ?>"
                                  data-conce="<?php echo Concesionarios::idConceByMarcaId($publica->modelos->marcas->id); ?>"
				  data-nom-public="<?php echo $tipo; ?>">Consultar
				  </a>
				<a class="btn btn-success-outline right" href="<?php echo Yii::app()->createUrl($publica->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$publica->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($publica->tipoPlan)); ?>"  >Ver Detalle <i class="fa fa-chevron-right"></i> </a>
			</div>
		</li>

	<?php endforeach; ?>


<?php else: ?>

<div class="col-xs-12">
<div class="alert alert-warning" role="alert">Su busqueda no obtuvo resultados.</div>
</div>

<?php endif; ?>
