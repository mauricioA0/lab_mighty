<?php 
$marcas = Marca::getMenu();

$arrDias = array();
$chatVSpirit = false;
$chatZopim = true;

$arrDias[] = 'Lunes';
$arrDias[] = 'Martes';
$arrDias[] = 'Miercoles';
$arrDias[] = 'Jueves';
$arrDias[] = 'viernes';
$arrDias[] = 'Sabado';
$arrDias[] = 'Domingo';

$dia = $arrDias[date('N') - 1];
$hora = date('H:i');

if($dia != 'Jueves')
{
	if($hora >= '21:30' && $hora < '09:00')
	{
		$chatVSpirit = true;
		$chatZopim = false;
	}
	else
	{
		$chatZopim = true;
	}
}
else
{
	if($hora >= '19:30' && $hora < '09:00')
	{
		$chatVSpirit = true;
		$chatZopim = false;
	}
	else
	{
		$chatZopim = true;
	}
}


?>
<div id="container" class="container">
    <div id="error-section" class="col-md-12">
        <h1>Autos en Cuotas</h1>
        <h3>404 - No hemos encontrado la p&aacute;gina que buscas. Puedes dirigirte a : </h3>
        
        <div id="error" class="col-md-3">
        	<h4><a href="<?php echo Yii::app()->createUrl('planes-ahorro'); ?>" > Planes de ahorro</a></h4>
        	<ul class="error-ul" >
            <?php foreach ( $marcas as $marca){ ?>
                <li><a href="<?php echo Yii::app()->createUrl($marca->concesionarios->marcas->slug); ?>"><?php echo ucwords(strtolower($marca->concesionarios->marcas->nombre_plan_marca)); ?></a></li>
            <?php } ?>
        </ul>
        
        </div>
        <div class="col-md-5">
        	<img src="/img/general/e404.png" alt="Error 404">
        	
        </div>
        <div class="col-md-4">
        	<img src="/img/general/nop.png" alt="Es un error amigo! ">
        </div>

        <div class="col-md-12">
        	<ul class="ul-footer-error">
        		<li><h4><a href="<?php echo Yii::app()->createUrl('comparar-planes-ahorro'); ?>">Comparar Planes</a></h4></li>
        <li><h4><a href="<?php echo Yii::app()->createUrl('planes-adjudicados'); ?>">Planes Adjudicados</a></h4></li>
        <li><h4><a href="<?php echo Yii::app()->createUrl('planes-empezados'); ?>">Planes Comenzados</a></h4></li>
        <li><h4><a href="<?php echo Yii::app()->createUrl('planes-nuevos'); ?>">Planes Nuevos</a></h4></li>
        <li><h4><a href="<?php echo Yii::app()->createUrl('planes-utilitarios'); ?>">Planes Utilitarios</a></h4></li>
        <li><h4><a href="<?php echo Yii::app()->createUrl('planes-economicos'); ?>">Planes Econ&oacute;micos</a></h4></li>
        <li><h4><a href="<?php echo Yii::app()->createUrl('vender-mi-plan'); ?>">Vender Mi Plan</a></h4></li>
        	</ul>
        	
        </div>
        
    </div>
</div>
<?php if($chatVSpirit): ?>

<script type="text/javascript">

var vsid = "sa48522";
(function() { 
var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
 vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat-'+vsid+'.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
})();
</script>

<?php endif; ?>


<?php if($chatZopim): ?>

<script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?2lFQcF7QeweRC4Zje0a2VyYcuROfTSgl";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>

<?php endif; ?>
