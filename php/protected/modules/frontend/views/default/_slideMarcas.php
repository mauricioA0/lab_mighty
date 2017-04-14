<div class="container">
	<div id="slidermarca" class="col-md-12">

	<?php foreach($marcas as $conce): ?>
		<ul class="nopadding bxslider">
				<li class="list-img-carousel">
					<a href="" class="logo-marcas-footer">
					<img src="public/img/marcas/logo-<?php echo str_replace( ' ', '-',strtolower($conce->concesionarios->marcas->nombre_marca)); ?>.png" alt=" " title="Planes de ahorro <?php echo $conce->concesionarios->marcas->nombre_marca.' - '.$conce->concesionarios->nombre_conce; ?>" class="img-responsive">
				</a></li>
		</ul>
	<?php endforeach; ?>
	</div>
</div>