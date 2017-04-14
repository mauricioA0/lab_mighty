<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/estilos-item.css');
    $model = new Consultas();
?>
<section class="container">
	<div id="area-comparador" class="col-md-12 col-xs-12 col-lg-12 col-sm-12 border-color item-video item-small padding-small-item">
		<div class="col-md-6 col-lg-10 col-sm-12 col-xs-12">
				<h3 class=" titulo-h3"><i class="fa fa-car"></i> <i class="fa fa-exchange"></i> <i class="fa fa-car"></i> Comparar Planes de Ahorro</h3>
				<h4 class="titulo-h3">Inverti y ahorr&aacute; comparando entre 10 marcas de planes 0km, m&aacute;s de 100 modelos disponibles. </h4>
		</div>
		<div class="referer col-md-6 col-lg-2 col-sm-12 col-xs-12">
			<a href="" title="Volver a la p&aacute;gina anterior">Volver </a>
		</div>

		<ul id="ulComparadorItem" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">

                    <li class="liComparadorItem col-md-4 col-sm-6 col-xs-12" id="espacioComparar1">
                        <div class="nueva-seleccion comparaLLena" id="comparadorEspacio1">
                            <?php if($publicacion1!=''){ ?>
                                <script>actions.selectorPlan('<?php echo $publicacion1; ?>','comparadorEspacio1');</script>
                            <?php } else { ?>
                                <script>actions.getMarcas('comparadorEspacio1');</script>
                            <?php } ?>
                        </div>
                    </li>

                    <li class="liComparadorItem col-md-4 col-sm-6 col-xs-12" id="espacioComparar2">
                        <div class="nueva-seleccion comparaLLena" id="comparadorEspacio2">
                             <?php if(isset($publicacion2) and $publicacion2!=''){ ?>
                                <script>actions.selectorPlan('<?php echo $publicacion2; ?>','comparadorEspacio2');</script>
                            <?php } else { ?>
                                <script>actions.getMarcas('comparadorEspacio2');</script>
                            <?php } ?>
                        </div>
                    </li>

                    <li class="liComparadorItem col-md-4 col-sm-6 col-xs-12" id="espacioComparar3">
                        <div class="nueva-seleccion comparaLLena" id="comparadorEspacio3">
                            <?php if(isset($publicacion3) and$publicacion3!=''){ ?>
                                <script>actions.selectorPlan('<?php echo $publicacion3; ?>','comparadorEspacio3');</script>
                            <?php } else { ?>
                                <script>actions.getMarcas('comparadorEspacio3');</script>
                            <?php } ?>
                        </div>
                    </li>

		</ul>
	</div>

    <div  class="col-md-12 col-xs-12 col-lg-12 col-sm-12 border-color item-video item-small padding-small-item">
        <input  readonly style="cursor: pointer;" id="url-comparador" class="col-md-10" type="text" value="<?php echo "https://".$_SERVER['HTTP_HOST'].'/comparar-planes-ahorro'; ?>" >
    </div>

    <div id="socialesContent" class="col-md-12 col-xs-12 nomargintop">
        <div class="col-md-12 col-sm-12 col-xs-12"><h4>Compartilo en:</h4></div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a id="url_face" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']); ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=250'); return false;" class="social-face  col-md-12 col-sm-12 col-xs-12 socialIconMedia"> Compartir en <i class="fa fa-facebook"></i></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a id="url_google" href="https://plus.google.com/share?url=<?php echo urlencode("https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']); ?>&t=" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=250'); return false;" class="social-goo col-md-12 col-sm-12 col-xs-12 socialIconMedia"> Compartir en <i class="fa fa-google-plus"></i></a>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <a id="url_twitter" href="http://twitter.com/home?status=<?php echo urlencode("https://".$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']); ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=250'); return false;" class="social-twi col-md-12 col-sm-12 col-xs-12 socialIconMedia"> Compartir en <i class="fa fa-twitter"></i></a>
        </div>

    </div>
</section>


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
