<form class="formAsideCheck" action="?" id="filtro" url="Galeria">
<div class="content-list-aside col-md-12 filters">

	<?php if(!empty($marcas)): ?>
	<div class="titleAsideList">Marcas</div><span class="line-close-div"></span>
		<ul >

		<?php foreach($marcas as $indice => $marca): ?>
			<li>
                            <input <?php if(Yii::app()->session['marca'] and in_array($marca, Yii::app()->session['marca'])){ echo 'checked=""';}?> type="checkbox" value="<?php echo $marca; ?>" name="marca[]" class="checks" onclick="javascript:filtro.filtrar($('#posts').attr('vista'));">
				<label class="checklabel"><?php echo $marca; ?></label>
			</li>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>
</div>
<div class="content-list-aside col-md-12">
	<div class="titleAsideList">Categorias</div><span class="line-close-div"></span>
		<ul>
			<?php
                        ksort($categorias);
                        foreach($categorias as $indice => $categ):
			switch ($indice) {
				case '0':
					$icon = 'autos';
					break;
				case '5':
					$icon = 'familiar';
					break;
				case '10':
					$icon = 'camionetas';
					break;
				case '20':
					$icon = 'camionetas';
					break;
				case '30':
					$icon = 'pickups2';
					break;
				case '40':
					$icon = 'utilitarios';
					break;

			}?>
			<li>
				<input type="checkbox" value="<?php echo $indice; ?>" name="categ[]" class="checks" onclick="javascript:filtro.filtrar($('#posts').attr('vista'));">
				<label  class="checklabel"><?php echo $categ; ?></label>
				<span class="icon-<?php echo $icon; ?> right"></span>
			</li>
			<?php endforeach; ?>
		</ul>
</div>
<?php  if($vista == 'Adjudicados' || $vista == 'Comenzados'){  ?>
<div class="content-list-aside col-md-12">
	<div class="titleAsideList">Vendedor</div><span class="line-close-div"></span>
		<ul>
			<?php if(count($reventas)){ foreach($reventas as $reventa_){ ?>
			<li>
				<input type="checkbox" value="<?php echo $reventa_->idReventa; ?>" nombre="<?php echo $reventa_->nombreCortoReventa; ?>" name="reventas[]" class="checks" onclick="javascript:filtro.filtrar($('#posts').attr('vista'));">
				<label class="checklabel"><?php echo $reventa_->nombreReventa; ?></label>
			</li>
                        <?php }} ?>
		</ul>
</div>
<?php } ?>
    
<div class="content-list-aside col-md-12">
	<div class="titleAsideList">Tipo de Plan</div><span class="line-close-div"></span>
		<ul>
			<?php foreach($planes as $indice => $plan): ?>
			<li>
				<input type="checkbox" value="<?php echo $plan; ?>" name="plan[]" class="checks" onclick="javascript:filtro.filtrar($('#posts').attr('vista'));">
				<label class="checklabel">Plan <?php echo $plan; ?></label>
			</li>
			<?php endforeach; ?>
		</ul>
</div>


<!--SEGUN SEA LA VISTA MUESTRO O NO PARTES DEL FILTRO-->


<?php  if($vista == 'Adjudicados' || $vista == 'Comenzados'){  ?>


<div class="content-list-aside paddingBottom col-md-12">
    <div class="titleAsideList" id="title_precio_venta" ><label title="Valor total de venta de plan Adjudicado">Anticipo Hasta</label></div><span class="line-close-div"></span>
	<div id="defaultSlider1"></div>
	$<input type="text" value="0" class="textInputValue" id="precioDesde" name="precioDesde" >
</div>

<div class="content-list-aside paddingBottom col-md-12">
	<div class="titleAsideList">Precio Cuota Hasta</div><span class="line-close-div"></span>
		<div id="defaultSlider3"></div>
		$<input type="text" value="0" class="textInputValue" id="precioCuota" name="precioCuota" >
                
                <?php if($reventa){ ?>
                    <input type="hidden" name="reventa" value="<?php echo $reventa; ?>" >
                <?php } ?>
</div>
<?php } else { ?>

<div class="content-list-aside paddingBottom col-md-12">
    <div class="titleAsideList" id="title_precio_venta">Valor 0km Hasta</div><span class="line-close-div"></span>
	<div id="defaultSlider1"></div>
	$<input type="text" value="0" class="textInputValue" id="precioDesde" name="precioDesde" >
</div> <?php } ?>

<div class="content-list-aside paddingBottom col-md-12">
    <input type="reset" value="Remover Filtros" onclick="this.form.reset();javascript:filtro.filtrar($('#posts').attr('vista'));" />
</div>

<input type="hidden" name="tipoPlan" value="<?php echo $vista; ?>">

<?php if(isset($slug)): ?>
<input type="hidden" name="slug" value="<?php echo $slug; ?>">
<?php endif; ?>
</form>
