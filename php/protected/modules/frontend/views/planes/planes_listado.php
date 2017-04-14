 <div class="container">
    <aside id="columnasMarca" class="col-md-3 col-sm-12 col-xs-12 natural">
        <section class="nav-aside ">
                <p class="logoMarcaListado">
                    <?php 
                    
                        $img_url = '/img/marcas/logo-'.str_replace(' ','-',strtolower(Concesionarios::nombreConceByMarcaId($publicaciones[0]->modelos->marcas->id))).'-'.str_replace(' ','-',strtolower($publicaciones[0]->modelos->marcas->nombre_marca)).'.png';

                        if (file_exists(__DIR__.'/../../../../..'.$img_url)) {
                            $img_url = Yii::app()->request->baseUrl.$img_url;
                        } else {
                            $img_url = Yii::app()->request->baseUrl.'/img/marcas/logo-'.str_replace(' ','-',strtolower($publicaciones[0]->modelos->marcas->nombre_marca)).'.png';
                        }
                        
                        
                    ?>
                    <img src="<?php echo $img_url; ?>" alt="">
                </p>
 			
<!--PARTIAL DE FILTROS-->
<?php echo $this->renderPartial('_filtro', array('marcas'=>'', 'planes'=>$planes, 'categorias'=>$categorias, 'vista'=>$tipo, 'slug'=>$slug)); ?>

        </section>
    </aside>
 
     <section id="modelosListado" class="col-md-9 col-sm-12 col-xs-12">
        
        <h1> Planes de Ahorro <?php echo $publicaciones[0]->modelos->marcas->nombre_marca.' '.$mensa; ?> 
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/marcas/<?php echo strtolower($publicaciones[0]->modelos->marcas->nombre_marca); ?>.png" alt="" class="right">
        </h1>
        <p class="financiado col-xs-12"><?php echo $publicaciones[0]->modelos->marcas->nombre_marca; ?> Financia tu Nuevo 0 km sin Interés y en Cuotas al 0%</p>

        <section class="filter col-md-12 col-xs-12">
            <div id="filtrosbreadcrumb" class=" breadcrumb  col-md-12">
                <div class="col-md-8">
                    <ul id="ul-nav-listado" class="left ">
                        <li><a href="<?php echo Yii::app()->createUrl('index.php'); ?>" > <i class="fa fa-home home"></i> / </a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('planes-de-ahorro'); ?>" >Planes de Ahorro  / </a></li>
                        <li class="active"><a href=""><?php echo $publicaciones[0]->modelos->marcas->nombre_plan_marca; ?>/ </a></li>
                        <li class=""><span class="marcaListadoBread"><?php echo Concesionarios::nombreConceByMarcaId($publicaciones[0]->modelos->marcas->id); ?></span></li>
                    </ul>
                </div>
 		
                <div class="col-md-4">
                    <p class="left margintop ">
                        <strong><span class="cantidad"><?php echo $total; ?> </strong> PRODUCTOS
                    <p>
                    
                    <div class="cambiar">
                        <ul class="seleccion">
                            <li id="bloques" onclick="javascript:filtro.vistaFiltro('Galeria', '<?php echo $urlGal; ?>');" class="checking"><i class="fa fa-th-large"></i></li>
                            <li id="listados" onclick="javascript:filtro.vistaFiltro('Lista', '<?php echo $urlList; ?>');" ><i class="fa fa-bars"></i></li>
                                <a href="whatsapp://send?text= ?>" data-text="Cómo crear el botón de Compartir en WhatsApp en tu sitio:" data-href="" class="wats wa_btn wa_btn_s" style="display:none">Compartir</a>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
            
        <section id="productos" >
            Planes para comparar: <span class="prod-a-compa" id="prod-a-compa">0</span> <a href="<?php echo Yii::app()->createUrl('comparar-planes-ahorro/'); ?>" id="url_comparar"  title="Comparar">Comparar</a>
        </section>

        <ul id="listado" class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <?php echo $this->renderPartial('_planesMarcasGaleria', array('publicaciones'=>$publicaciones, 'total'=>$total,'vista'=>$vista, 'tipo'=>$tipo)); ?>
        </ul>

    </section>
</div>


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


<!-- BANNER -->
<?php echo $this->renderPartial('/default/_banner'); ?> 
<!-- FIN BANNER -->


<script>



filtro.urlGaleria = '<?php echo $urlGal; ?>';
filtro.urlListado = '<?php echo $urlList; ?>';

var min = parseInt('<?php echo $precioMin; ?>');
var max = parseInt('<?php echo $precioMax; ?>');

//funcion que se usa para seleccionar los check cuado hacemos click en el label
filtro.chexFiltroLabel();
filtro.slidePrecio(); 
    

</script>