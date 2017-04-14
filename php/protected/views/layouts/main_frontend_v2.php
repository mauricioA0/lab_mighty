<?php
    /* @var $this Controller */
    if($_SERVER['REQUEST_URI']=="/" OR $_SERVER['REQUEST_URI']=="/index.php" ){
        $org = "WebPage";
    } else {
        $org = "";
    }
    
    if(!isset($GLOBALS['title'])){
        $GLOBALS['title'] = 'Autos en cuotas - Planes de ahorro. Tu Auto 0Km financiado al 0% por Plan';
    }
    
    if(!isset($GLOBALS['meta'])){
        $GLOBALS['meta'] = 'Planisset(es de autos en cuotas. Tené tu Auto 0 km, de cuotas bajas y sin interés. Autoahorro Volkswagen, Fiat Plan, Plan Chevrolet, Ovalo Ford, Autoplan Peugeot, Rombo Renault. Adjudicado, Comenzado, Créditos.';
    }
    
    if(!isset($GLOBALS['img_facebook'] )){
        $GLOBALS['img_facebook'] = "https://".$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl."/img/logo-autosencuotas.png";
    }

//    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
    ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="es-AR" <?php if($org!=""){ ?> itemscope="itemscope"  itemtype="http://schema.org/<?php echo $org;?>" <?php } ?> xmlns:og="http://opengraphprotocol.org/schema/">
    <head profile="http://gmpg.org/xfn/11">
        <meta name="robots" content="index,follow">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="https://www.autosencuotas.com.ar/favicon.ico"/>
        <link rel="alternate" hreflang="es-AR" href="https://www.autosencuotas.com.ar">
        <title>AMP <?php echo $GLOBALS['title'];  ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" media="all"  >
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" media="all"  >
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' media="all" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" media="all" />
        <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"></noscript>

        <link rel='stylesheet' href="<?php echo Yii::app()->createUrl('css/css.min.css');?>" media="all"  />
        <link rel='stylesheet' href="<?php echo Yii::app()->createUrl('assets/73a812be/sprite.css');?>" media="all"  />


        <script src="<?php echo Yii::app()->createUrl('js/jquery.min.js');?>"  ></script>
        
        <script src="<?php echo Yii::app()->createUrl('js/owl.carousel.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/bootstrap.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/jquery.hoverIntent.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/wow.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/main.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/jquery.sticky.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/jquery.fancybox.js');?>"  ></script>


        <script src="<?php echo Yii::app()->createUrl('js/jQfunciones.min.js');?>"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/Actions.js');?>"  ></script>
        <script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"  ></script>

        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="<?php echo Yii::app()->createUrl('js/ActionsFiltro.js');?>" ></script>



        <script  type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.0/mustache.min.js' async="async"  ></script>
        <script src="<?php echo Yii::app()->createUrl('js/sharer.min.js');?>"  ></script>
        <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>
        <?php Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl() . '/jui/css/base/jquery-ui.css'); ?>

        <script src="https://apis.google.com/js/platform.js" async="async"></script>

        <!-- Grab Google CDNs jQuery; fall back to local if necessary -->
        <!--<script>
        window.jQuery || document.write(unescape('%3Cscript src="/js_folder/jquery-1.6.1.min.js"%3E%3C/script%3E'))
        </script>-->

        <!-- fin de links css y js -->
        <!-- Metatags  -->
        <meta name="language" content="es-AR">
        <meta name="rating" content="General">
        <meta name="title" content="<?php echo $GLOBALS['title'];  ?>">
        <meta name="description" content="<?php echo $GLOBALS['meta']; ?>">
        <?php if(!isset($GLOBALS['keyworks'])){ ?>
            <meta name="keywords" content="fiat,volkswagen,vw,chevrolet,ford,renault,citroen,peugeot,financiados,0%,interes,modelos,autos,cuotas,cuota,plan,planes,ahorro,0km,nuevo">
        <?php } ?>
        <!-- Facebook OpenGraph -->

        <meta property="og:site_name" content="Autos En Cuotas - Plan Nacional. Tu nuevo 0km por plan sin interés."/>
        <meta property="og:title" content="<?php if($GLOBALS['title']){
            echo $GLOBALS['title'];
        } else { ?>
        Autos en cuotas - Planes de ahorro. Tu nuevo 0km por plan sin interés. Planes de Autos financiados en Pesos.
        <?php } ?> "/>
        <meta property="og:description" content="Planes de autos en cuotas. Tené tu nuevo 0km por plan, con la cuota mas baja, sin interés  y directo de fábrica. Adjudicados, Comenzados, Contado. Fiat Plan, Autoahorro Volkswagen, Plan Chevrolet, Ovalo Ford, Autoplan Peugeot,Rombo Renault, Citroen,Vw."/>
        <meta property="og:url" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>"  />

        <meta property="og:image" content="<?php echo $GLOBALS['img_facebook']; ?>"  />
        <?php if(isset($GLOBALS['meta-price'])){ ?>
            <meta property="og:price:currency" content="ARS">
            <meta property="og:price:amount" content="$<?php echo $GLOBALS['meta-price']; ?>">
        <?php } ?>
        <meta property="og:type" content="<?php echo strtolower($org); ?>" />
        <meta property="article:author" content="https://www.autosencuotas.com.ar" />
        <meta property="fb:app_id" content="{180485742027316}"/>
        <meta property="fb:admins" content="{1090431019}"/>


        <!-- Twitter Cards -->

        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site:id" content="103020298"/>
        <meta name="twitter:title" content="<?php echo $GLOBALS['title']; ?> " />
        <meta name="twitter:creator" content="@autosencuotas"/>
        <meta name="twitter:url" content="<?php echo "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
        <meta name="twitter:image" content="https://www.autosencuotas.com.ar/img/logo-autosencuotas.png" />
        <meta name="twitter:description" content="Planes de autos en cuotas. Tené tu nuevo 0km por plan, con la cuota mas baja, sin interés  y directo de fábrica. Adjudicados, Comenzados, Contado. Fiat Plan, Autoahorro Volkswagen, Plan Chevrolet, Ovalo Ford, Autoplan Peugeot,Rombo Renault, Citroen,Vw" />
        <meta name="twitter:site" content="@autosencuotas" />
        <meta name="twitter:domain" content="<?php echo "https://".$_SERVER['HTTP_HOST']; ?>">

        <!-- fin de metatags -->
        <script async="async">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-1218470-1', 'auto');
        ga('send', 'pageview');
             
        </script>

    </head>

    <body>

<?php
    $marcas = Marca::getMenu();

    if(!Yii::app()->request->cookies['acetacion_cookie']){
        $cookieAcep = new CHttpCookie('acetacion_cookie', 'NO');
        $cookieAcep->expire = time() + (60*60*365*1000); // 24 hours;
        Yii::app()->request->cookies['acetacion_cookie'] = $cookieAcep;
        $mostrar_conf = true;
    } elseif(Yii::app()->request->cookies['acetacion_cookie']=="NO"){
        $mostrar_conf = true;
    } else {
        $mostrar_conf = false;
    }

?>

	<?php  $this->renderPartial('/default/_header', array('marcas'=>$marcas)); ?>

	<?php echo $content; ?>

	<?php  $this->renderPartial('/default/_footer', array('marcas'=>$marcas,'mostrar_conf'=>$mostrar_conf)); ?>


<script>
 var $j = jQuery.noConflict(true); $j.noConflict();

 function check_image_load(){$('[data-image]').each(function(e){if (is_in_view($(this))){$(this).append('<img src="'+$(this).attr('data-image')+'" width="'+$(this).attr('data-imagew')+'" height="'+$(this).attr('data-imageh')+'" />').removeAttr('data-image').hide().fadeIn(2000);
}});
$('[data-real-src]').each(function(e){if (is_in_view($(this))){if($(this).attr('data-real-type')=="image"){$(this).attr('src',$(this).attr('data-real-src')).removeAttr('data-real-src').hide().fadeIn(2000);
}}});
}function is_in_view(elem){var docViewTop = $(window).scrollTop();
var docViewBottom = docViewTop + $(window).height();
var elemTop = $(elem).offset().top;
var elemBottom = elemTop + $(elem).height();
return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
}$(document).ready(function (){$(window).load(function(){check_image_load();
actions.overMenuPlanahorro();


/*
var vsid = "sa48522";
(function(){var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat-'+vsid+'.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
})();
*/
});
$(window).scroll(function(){check_image_load(); });


});


window.onbeforeunload = confirmWinClose;
function confirmWinClose () {
    alert("Poner HTML");
    var confirmClose = true;
    return confirmClose;
};

$( "body" ).click(function() {
     window.onbeforeunload = {};
});


</script>
<script src="https://www.motorsclick.com/js/chat" type="text/javascript"></script>

</body>

</html>
