<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);
define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config);


/*en esta aciion obtenemos los ID de las concesionarias de cada sitio  las 
dejamos predefinidas en una global*/
$site = Yii::app()->urlSite->urlDecode();

$GLOBALS['site'] = $site;


$sitiosconce = Sitiosconce::findByIdSitioAndConceHabilitado($site);


$arrIdConce = array();

foreach($sitiosconce as $conce)
{
	$arrIdConce[] = $conce->conce_id;
}

Yii::app()->params['conce'] =  $arrIdConce;

Yii::app()->run();