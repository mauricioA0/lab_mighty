<?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
<?php Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl().'/jui/css/base/jquery-ui.css'); ?>


<div id="container" class="container">

<aside id="columnasMarca" class="col-md-3 col-sm-12 col-xs-12">
    <section class="nav-aside">
        <p class="logoMarcaListado">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/marcas/logo-autosencuotas.png" alt="" data-pin-nopin="true">
        </p>

      <!--PARTIAL DE FILTROS-->
        <?php echo $this->renderPartial('_filtro', array('marcas'=>$marcas, 'planes'=>$planes, 'categorias'=>$categorias, 'vista'=>$tipo)); ?>

    </section>
</aside>
<section id="modelosListado" class="col-md-9 col-sm-12 col-xs-12">
    <h1> Planes de ahorro Utilitarios</h1>
    <p class="financiado">Planes de Camionetas, Pickups, Utilitarios, Furgones, Minivan, SUV</p>
    <div id="filtrosbreadcrumb" class=" breadcrumb  col-md-12">
        <div class="col-md-6">
            <ul id="ul-nav-listado" class="left ">
                <li><a href=""><i class="fa fa-home"></i> / </a></li>
                <li><a href="#">Planes Utilitarios /</a></li>
                <li class="active"> </li>
            </ul>

        </div>
        <div class="col-md-6">
            <p class="left margintop">Se encontraron <span class="cantidad"><strong>
                <?php echo $total; ?></strong></span> Modelos.</p>
            <div class="cambiar">
                <ul class="seleccion">
                    <li id="bloques" class="checking"><i class="fa fa-th-large"></i></li>
                    <li id="listados"><i class="fa fa-bars"></i></li>
                </ul>
            </div>
        </div>
    </div>
    <ul id="listado" class="col-md-12">

        <?php echo $this->renderPartial('_nuevosGaleria', array('nuevos'=>$nuevos, 'pages'=>$pages, 'vista'=>$vista)); ?>   

    </ul>
</section>
</div>

<!--MODAL -->
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
        

<!-- BANNER -->
<?php echo $this->renderPartial('/default/_banner'); ?> 
<!-- FIN BANNER -->


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