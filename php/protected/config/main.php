<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'autosencuotas',
    'language' => 'es',
    'charset'=>'utf-8',
    'defaultController' => 'frontend/home/index',
    'theme'=>'bootstrap',

    'preload'=>array('log'),
    'theme'=>'abound',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'zii.behaviors.CTimestampBehavior',
	),

	'modules'=>array(
        'frontend',
        'backend',
   
            
        'sitemap' => array(
            'class' => 'ext.sitemap.SitemapModule',     //or whatever the correct path is
            'actions' => array(array('route'=>'','prefs' => array('priority'=>1)),
                        array('route'=>'comparar-planes-ahorro'),
                        array('route'=>'planes-de-ahorro'),
                        array('route'=>'planes-adjudicados'),
                        array('route'=>'planes-empezados'),
                        array('route'=>'planes-nuevos'),
                        array('route'=>'planes-economicos'),
                        array('route'=>'vender-mi-plan'),
                        array('route'=>'planes-pickups'),
                        array('route'=>'planes-destacados'),
                        array('route'=>'planes-utilitarios'),
                        array('route'=>'planes-autos'),
                        array('route'=>'planes-autos-familiar'),
                        array('route'=>'planes-autos-familiar'),
                        array('route'=>'planes-pickups'),
                        array('route'=>'preguntas-frecuentes'),
                        array('route'=>'legales'),
                        array('route'=>'contacto-administrativo','prefs' => array('priority'=>0.8)),
                        array('route'=>'mapa','prefs' => array('priority'=>0.8)),
                
                
                ),                    //optional
            'absoluteUrls' => true,               //optional
            'protectedControllers' => array('backend'),   //optional
            'protectedActions' =>array('site'),   //optional
            'priority' => '0.6',                        //optional
            'changefreq' => 'weekly',                    //optional
            'lastmod' => date('Y-m-d'),                  //optional
            'cacheId' => 'cache',                       //optional
            'cachingDuration' => 3600,                  //optional          
        ),
        'gii'=>array(
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
            'class'=>'system.gii.GiiModule',
            'password'=>'4ut0s',
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
            
        'hybridauth' => array(
            'baseUrl' => 'https://'. $_SERVER['SERVER_NAME'] . '/hybridauth', 
            "providers" => array ( 
                "openid" => array (
                    "enabled" => true
                ),
 
                "yahoo" => array ( 
                    "enabled" => true 
                ),
 
                "google" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id" => "AIzaSyCUgV3m5AFu7Yk5mer3Oj00Vsnwtfpgkxo", "secret" => "" ),
                    "scope"   => ""
                ),
 
                "facebook" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "id" => "724331347729270", "secret" => "95fde99e4c15b2dab71027db312bcaf4" ),
                    "scope"   => array ('scope','email','public_profile', 'user_about_me', 'user_birthday', 'user_hometown', 'user_about_me', 'user_birthday', 'user_hometown', 'user_website', 'offline_access', 'read_stream', 'publish_stream', 'read_friendlists'), 
                    "display" => "" 
                ),
 
                "twitter" => array ( 
                    "enabled" => true,
                    "keys"    => array ( "key" => "e4ZNHXsojP2kZD6LOU9rFdARl", "secret" => "SscKGEhI2gcHh6wmWQcOSg40lpR8UJ0UUvPnvsNrVep3D3wrRL" ),
                    "includeEmail" => true
                )
            )
        ),
            
    ),

	// application components
	'components'=>array(

		'user'=>array(
            'allowAutoLogin'=>true,
        ),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),


        //Componente para detectar la url del sitio
        'urlSite'=>array(
            'class'=>'UrlRouterDominio',
        ),


        'request'=>array(
            'enableCookieValidation'=>true,
        ),


        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName' => false,
            'rules'=>array(




                ##ESTATICAS                                
                'sitemap.xml'                => 'sitemap/default/index',
                'sitemap.html'               => 'sitemap/default/index/format/html',
                'quienes-somos'              => 'frontend/estaticas/Empresa',
                'legales'                    => 'frontend/estaticas/terminosCondiciones',
                'preguntas-frecuentes.php'   => 'frontend/estaticas/preguntasFrecuentes',
                'whatsapp'                   => 'frontend/estaticas/whatsapp',
                'contacto-whatsApp'          => 'frontend/estaticas/whatsapp',
                'preguntas-frecuentes'       => 'frontend/estaticas/preguntasFrecuentes',
                'redes-sociales'             => 'frontend/estaticas/redesSociales',
                'contacto-administrativo'    => 'frontend/estaticas/contactoAdministrativo',
                'vender-mi-plan'             => 'frontend/estaticas/venderPlan',
                'enviar-plan-adj'            => 'frontend/estaticas/enviarVenderPlan',
                'recuperar_plan'             => 'frontend/estaticas/enviarRecuperarPlan',
                'trabaja-con-nosotros'       => 'frontend/estaticas/trabajaNosotros',
                'recuperar-plan-de-ahorro'   => 'frontend/estaticas/recuperarPlan',
                'contacto-ok'                => 'frontend/default/contactoOk',
                'enviar-consulta'            => 'frontend/planes/enviarConsultas',
                'mapa'                       => 'frontend/default/mapa',


                ##CARGAS Y MIGRACIONES
                'comenzar-Raty'              => 'frontend/default/cargarRatyInicial',


                ##ERRORES
                'error-404'                  => 'frontend/default/error404',


                ##AJAX
                'ajax-adjudicados-gal'       => 'frontend/planes/ajaxAdjudicadosGalPartial',
                'ajax-adjudicados-list'      => 'frontend/planes/ajaxAdjudicadosListPartial',
                'ajax-comenzados-gal'        => 'frontend/planes/ajaxComenzadosGalPartial',
                'ajax-comenzados-list'       => 'frontend/planes/ajaxComenzadosListPartial',
                'ajax-nuevos-gal'            => 'frontend/planes/ajaxNuevosGalPartial',
                'ajax-nuevos-lista'          => 'frontend/planes/ajaxNuevosListaPartial',
                'ajax-planesmarca-gal'       => 'frontend/planes/ajaxPlanesMarcasGalPartial',
                'ajax-planesmarca-lista'     => 'frontend/planes/ajaxPlanesMarcasListaPartial',
                'ajax-consultas'             => 'frontend/planes/ajaxEnviarConsultasModal',
                'ajax-enviar-consulta'       => 'frontend/planes/ajaxEnviarConsultas',
                'ajax-votacion'              => 'frontend/modelo/ajaxVotacion',
                'ajax-votacion-raty'         => 'frontend/modelo/ajaxVotacionRaty',
                'ajax-favoritos'            =>  'frontend/estaticas/addFavoritos',
                'ajax-marca-comparador'      => 'frontend/modelo/ajaxMarcaComparador',
                'ajax-planes-comparador'     => 'frontend/planes/ajaxPlanesComparador',
                'ajax-selector-plan'         => 'frontend/planes/ajaxSelectorPlan',
                'ajax-marca'                 => 'frontend/modelo/MarcasComparador',
                'ajax-aceptacion-cookie'     => 'frontend/default/AcetacionCookie',
                'consulta-adjudicado'        => 'frontend/planes/consultaAdjudicado',
                'emailAdjudicados.php'       => 'frontend/planes/consultaAdjudicado',
                'enviarMailCompartir.php'    => 'frontend/default/compartir',
               // 'ajax-update-consultas'      => 'frontend/planes/ajaxUpdateEnviarConsulta',


                ##BACKEND
                'administracion_autos'                                       => 'backend/default/login',
                'logout'                                        => 'backend/default/logout',
                'backend/sitiosconce/delete/<id>'               =>'backend/sitiosconce/delete/id/<id>',
                'backend/<controller:\w+>/<id:\d+>'             =>'backend/<controller>/view',
                'backend/<controller:\w+>/<action:\w+>/<id:\d+>'=>'backend/<controller>/<action>',
                'backend/<controller:\w+>/<action:\w+>'         =>'backend/<controller>/<action>',


                ## FRONTEND
                ''                                          => 'frontend/home/index',
                'planes-de-ahorro'                          => 'frontend/planes/planesAhorro',
                'planes-adjudicados'                        => 'frontend/planes/planesAdjudicados',
                'planes-adjudicados/<rev>'                  => 'frontend/planes/planesAdjudicados/reventa/<rev>',
                'planes-empezados'                          => 'frontend/planes/planesComenzados',
                'planes-empezados/<rev>'                    => 'frontend/planes/planesComenzados/reventa/<rev>',
                'planes-nuevos'                             => 'frontend/planes/planesNuevos',
                'nuevos-planes'                             => 'frontend/planes/planesNuevos',
                'planes-destacados'                          => 'frontend/planes/planesDestacados',
                'planes-utilitarios'                        => 'frontend/planes/planesUtilitarios',
                'planes-autos'                              => 'frontend/planes/planesUtilitarios/tipoPlan/Autos',
                'planes-autos-familiar'                     => 'frontend/planes/planesUtilitarios/tipoPlan/Familiar',
                'planes-camionetas'                         => 'frontend/planes/planesUtilitarios/tipoPlan/Camioneta',
                'planes-pickups'                            => 'frontend/planes/planesUtilitarios/tipoPlan/Pick-Up',
                'planes-economicos'                         => 'frontend/planes/planesEconomicos',
                'procreauto'                                => 'frontend/planes/planesEconomicos',
                'planes-economicos/cordoba'                 => 'frontend/planes/planesEconomicos',
                'precios-cuidados-para-autos'               => 'frontend/planes/planesEconomicos',
                'planes-ahorro-comenzados/<m>/<mo>/<t>/<c>' => 'frontend/planes/planesDetalleReventa/marcaplan/<m>/slug/<mo>/plan/<t>/id/<c>/tipo/comenzado',
                'planes-ahorro-adjudicados/<m>/<mo>/<t>/<c>'=> 'frontend/planes/planesDetalleReventa/marcaplan/<m>/slug/<mo>/plan/<t>/id/<c>/tipo/adjudicado',
                'comparar-planes'                           => 'frontend/planes/comparadorPlanes',
                'comparar-planes-ahorro'                    => 'frontend/planes/comparadorPlanes',
                'comparar-planes-ahorro/<p>'                => 'frontend/planes/comparadorPlanes/p/<p>',
                'comparar-planes-ahorro/<p>/<p1>'           => 'frontend/planes/comparadorPlanes/p/<p>/p1/<p1>',
                'comparar-planes-ahorro/<p>/<p1>/<p2>'      => 'frontend/planes/comparadorPlanes/p/<p>/p1/<p1>/p2/<p2>',
                'hybridauth'                                => 'hybridauth/default/index',
                '<slug>'                                    => 'frontend/planes/planesMarcas',
                '<marcaplan>/<slug>/plan-ahorro-<plan>'     => 'frontend/planes/planesDetalle/marcaplan/<marcaplan>/slug/<slug>/plan/<plan>',
                'amp/<marcaplan>/<slug>/plan-ahorro-<plan>' => 'frontend/planes/planesDetalleAMT/marcaplan/<marcaplan>/slug/<slug>/plan/<plan>',
                'boot/actualizar-base'                      => 'frontend/planes/actualizarBase',
                'js/chat'                                   => 'frontend/estaticas/chat',
                'js/chat/<tipo>'                            => 'frontend/estaticas/chat/tipo/<tipo>',
                
                //'plan-detalle/marcaplan/<slug>/plan-de-ahorro/<plan>'  => 'frontend/planes/planesDetalle',
            ),
        ),


		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=delivery',
			'emulatePrepare' => true,
			'username' => 'delivery',
			'password' => 'rsPFz1T',
			'charset' => 'utf8',
		),

		'errorHandler'=>array(
            'errorAction'=>'frontend/default/error404',
        ),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error',
                    'logFile'=>'error.log',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'info',
                    'logFile'=>'info.log',
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'warning',
                    'logFile'=>'warning.log',
                ),
                /*array(
                    'class'=>'CPhpMailerLogRoute',
                    'levels'=>'error, warning, info',
                    'emails'=>'webmaster@example.com',  //a este email se envian los diferentes niveles
                    'except'=>'exception.CHttpException.404',
                ),*/
            ),
        ),
            
        'sprite'=>array(
            'class'=>'ext.sprite.NSprite',
            // if you remove the imageFolderPsth setting it will use the icon folder within   
            // the sprite package (ext.sprite.icons)
            'imageFolderPath'=>null,
            /*'imageFolderPath'=>array(
                Yii::getPathOfAlias('img'),
                'imgv2'
            ),*/
        ),
            
            
        
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'mail@gmail.com',
        'valorMax'  =>'260000',
	),
);
