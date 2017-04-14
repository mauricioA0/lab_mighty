<?php

class UrlRouterDominio extends CApplicationComponent
{

    private $url = null;

 
    public function init() {
        

    }
 
    public function urlDecode() {
       
       //$url = Yii::app()->getBaseUrl();
       $url = $_SERVER['HTTP_HOST'];
       $url = str_replace('www.', '', $url);
      // $url = 'www.autosencuotas.com.ar';
       $sitio = Sitios::model()->findByAttributes(array('url_sitio' => $url));

       return $sitio;
    }
}