<div id="container" class="container">
    <aside id="columnasMarca" class="col-md-3 col-sm-12 col-xs-12">

        <section class="nav-aside">
            <div id="logosMarcas" class="col-md-12 col-sm-12 col-sx-12 nopadding">
                <div class="col-md-6 col-sm-6 col-sx-12  ">
                    <div id="logoListadoMarcas" class="logoMarcaListado">
                        <?php 
                            if($reventa!=''){
                                $img_logo_sup = $reventa;
                            } else {
                                $img_logo_sup = 'logo-todo-listado-2';
                            }
                        ?>
                        <img id="img_logo_sup" src="<?php echo Yii::app()->request->baseUrl; ?>/img/marcas/<?php echo $img_logo_sup; ?>.png" alt="" class="img-responsive">
                    </div>
                </div>
                <div id="infoAside" class="col-md-6 col-sm-6 col-sx-12">
                    <h2>Planes  <?php echo $tipo; ?></h2>
                    <p>Planes de ahorro  <?php echo $tipo; ?></p>
                    <p>Ahorrando tiempo, llegás antes a tu nuevo 0 km</p>
                </div>
            </div>

            <!--PARTIAL DE FILTROS-->
            <?php echo $this->renderPartial('_filtro', array('marcas' => $marcas, 'planes' => $planes, 'categorias' => $categorias, 'vista' => $tipo, 'reventa' => $reventa, 'reventas'=>$reventas )); ?>


        </section>
    </aside>
    <section id="modelosListado" class="col-md-9 col-sm-12 col-xs-12">
        <div id="banner-comadj" class="">

            <a href="/planes-ahorro-adjudicados/autoahorro-volkswagen/up/plan-ahorro-100-porciento-financiado/714" title="" alt="Planes Adujicados Volkswagen Up">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/adjudicados/planes-ahorro-comenzados-autoahorro-volkswagen-upplan-ahorro-100-porciento-financiado-714.jpg" alt="" title=""/>
            </a>

            <a href="/planes-ahorro-adjudicados/autoahorro-volkswagen/gol-trend/plan-ahorro-100-porciento-financiado/705" title="" alt="Planes Adujicados Volkswagen Gol Trend">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/adjudicados/planes-ahorro-adjudicados-autoahorro-volkswagen-gol-trend-plan-ahorro-100-porciento-financiado-705.jpg" alt="" title=""/>
            </a>

            <a href="/planes-ahorro-adjudicados/fiat-plan/palio-attractive/plan-ahorro-100-porciento-financiado/700" title="" alt="Planes Adujicados Fiat Palio Fire">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/adjudicados/planes-ahorro-comenzados-fiat-plan-palio-attractive-plan-ahorro-100-porciento-financiado-700.jpg" alt="" title=""/>
            </a>

            <a href="/planes-ahorro-adjudicados/autoahorro-volkswagen/gol-trend/plan-ahorro-100-porciento-financiado/705" title="" alt="Planes Adujicados Volkswagen Up">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/adjudicados/planes-ahorro-adjudicados-autoahorro-volkswagen-gol-trend-plan-ahorro-100-porciento-financiado-705.jpg" alt="" title=""/>
            </a>

            <a href="/planes-ahorro-adjudicados/autoahorro-volkswagen/up/plan-ahorro-100-porciento-financiado/714" title="" alt="Planes Adujicados Volkswagen Up">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/slider/adjudicados/planes-ahorro-comenzados-autoahorro-volkswagen-upplan-ahorro-100-porciento-financiado-714.jpg" alt="" title=""/>
            </a>


        </div>
        <!-- Fin de carousel -->
        <section class="filter col-md-12">
            <div id="filtrosbreadcrumb" class="breadcrumb  col-md-12">
                <div class="col-md-7">
                    <ul id="ul-nav-listado" class="left">
						<li><a href="<?php echo Yii::app()->createUrl("index.php"); ?>"><i class="fa fa-home"></i> / </a></li>
						<li><a href="<?php echo Yii::app()->createUrl($url); ?>">Planes <?php echo $tipo; ?> /</a></li>
                                                <li class="marcaListadoBread"> <?php echo substr(strrchr($reventa, "__"), 1);; ?> </li>
					</ul>
				</div>

                <div class="col-md-5">
                    <p class="left margintop">Se encontraron <span class="cantidad"><strong>
                                <?php echo $total; ?> </strong></span> Modelos</p>
                    <div class="cambiar">
                        <ul class="seleccion">
                            <li id="bloques" onclick="javascript:filtro.vistaFiltro('Galeria', '<?php echo $urlGal; ?>');" class="checking"><i class="fa fa-th-large"></i></li>
                            <li id="listados" onclick="javascript:filtro.vistaFiltro('Lista', '<?php echo $urlList; ?>');" ><i class="fa fa-bars"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="tagFilter" class="col-md-12">
            <h5>Tu busqueda: </h5>
            <ul id="migapan">

            </ul>
        </section>

        <ul id="listado">

            <?php
            echo $this->renderPartial('_adjudicadosGaleria', array('destacados' => $destacados,
                'pages' => $pages,
                'tipo' => $tipo,
                'vista' => $vista));
            ?>

        </ul>
    </section>
</div>

<!-- BANNER -->
<?php echo $this->renderPartial('/default/_banner'); ?>
<!-- FIN BANNER -->




<!--JAVASCRIPT-->
<script>

    filtro.urlGaleria = '<?php echo $urlGal; ?>';
    filtro.urlListado = '<?php echo $urlList; ?>';


    var min = parseInt('<?php echo $precioMin; ?>');
    var max = parseInt('<?php echo $precioMax; ?>');
    var cuotamin = parseInt('<?php echo $cuotaMin; ?>');
    var cuotamax = parseInt('<?php echo $cuotaMax; ?>');

    filtro.chexFiltroLabel();
    filtro.slidePrecio();
    filtro.slideCuota();

</script>
