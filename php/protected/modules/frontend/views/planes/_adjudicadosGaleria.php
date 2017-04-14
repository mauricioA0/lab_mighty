

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
	<li class="todo itemLiModelosMarca col-md-4 col-sm-6 col-xs-12 plan-70-30 clase-5 Ford" style="display: list-item;">
		<a href="<?php echo $url; ?>">
			<div class="grid-item-content">
				<a href="<?php echo $url; ?>">
					<div class="img-auto img-container col-md-12 col-xs-12">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/autos/<?php echo Modelo::getNombreImagenCh($destacado->modelos->marcas->nombre_marca,  $destacado->modelos->nombreDirectorio); ?>" alt="$destacado->modelos->nombreModelo; ?>" title="<?php echo $destacado->modelos->marcas->nombre_marca.' '.$destacado->modelos->nombreModelo; ?>" class="img-responsive listImg">
					</div>
				</a>
				<div class="hover-item adjudicadosComenzados ">
					<div class="inner-hover adjudicadosComenzados">
						<p><?php echo ucwords($destacado->reventas->nombreCortoReventa); ?></p>
						<p class="valorList">Valor 0km <?php echo '$'. str_replace(',', '.',number_format($destacado->modelos->precio0kmModelo)); ?></p>
						<p class="tEntrega"><?php echo $destacado->explicaACDestacado; ?></p>
                                                <p class="mobile_hide">
                                                    <?php echo $destacado->tipoAC; ?>
                                                    <label class="right">
                                                        <?php echo 'Plan '. $tipo.' $'. str_replace(',', '.',number_format($destacado->valorAC));; ?>
                                                    </label>
                                                </p>
					</div>
				</div>
				<div id="item-content-info" class="col-md-12 col-xs-12 item-content-info">
					<p class="nombreList"><?php echo $destacado->modelos->marcas->nombre_marca.' '.$destacado->modelos->nombreModelo; ?></p>
					<p class="estadodeplan"><?php echo 'Plan '. $tipo; ?></p>
					<p class="cuotaPlan"><?php echo '$'. str_replace(',', '.',number_format($destacado->valorAC)); ?></p>
					<p>Tiene <strong><?php echo $destacado->cantCuotasAC; ?>/84</strong> Cuotas pagas</p>
                                        
					<div class="plan plan-<?php echo ($destacado->tipoAC == '100%') ? 'cien' : 'setenta'; ?>">
						<p>Plan <?php echo $destacado->tipoAC; ?></p>
					</div>
				</div>
				<div class="botonConsultar">
					<a class="btn btn-success-outline right" href="<?php echo $url; ?>">Ver Detalle <i class="fa fa-chevron-right"></i> </a>
				</div>
			</div>
		</a>
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
