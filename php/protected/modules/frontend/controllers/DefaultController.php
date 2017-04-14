<?php

class DefaultController extends Controller
{
	public function actionError404()
	{
                $get_publi = explode('-', $_SERVER['REQUEST_URI']);
                $url = '';
                
                $posible_id = $get_publi[(count($get_publi)-1)];
                // verificar la publicacion
                if(count($get_publi) and $posible_id ){
                    $publica = Publicaciones::findPlanById($posible_id);
                    
                    // si se puede obtener el destacado
                    if($publica){
                        $url =  Yii::app()->createUrl($publica->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$publica->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($publica->tipoPlan));
                    }
                    
                }
                
                if($url){
                    $this->redirect(array($url));
                    exit();
                } else {
                    $this->render('error404');
                }
	}


	public function actionContactoOk()
	{
		$slideMarcas = Marca::getMenu();

		$this->render('contacto_ok', array('marcas'=>$slideMarcas));
	}

        public function actionMapa()
	{
            $this->render('mapa');
	}




	public function actionCargarRatyInicial()
	{
		$modelos = Modelo::model()->findAllByAttributes(array('enabledModelo'=>'1'));

		$sitio = Yii::app()->getBaseUrl();
		$sitio = str_replace('/', '', $sitio);
		$sitioId = Sitios::model()->findByAttributes(array('nombre_sitio'=>$sitio));


		foreach($modelos as $modelo)
		{
			$raty = new Raty();
			$raty->modelo_id = $modelo->idModelo;
			$raty->puntos_raty = '200';
			$raty->total_raty = '55';
			$raty->sitio_id = $sitioId->id;
			$raty->fecha_raty = date('Y-m-d');
			$raty->save();
		}
	}
        
        public function actionAcetacionCookie(){
            
            $cookieAcep = new CHttpCookie('acetacion_cookie', 'SI');
            $cookieAcep->expire = time() + (60*60*365*1000); // 24 hours; 
            Yii::app()->request->cookies['acetacion_cookie'] = $cookieAcep;
            
        }
        
        public function  actionCompartir(){
                


                // obtengo el mail del reventa
          
                if($_POST['nombreModelo'] and $_POST['paramail']){
             
                    $asunto = " Plan de ahorro ".$_POST['nombreModelo'];
                    $mensaje =" <img src='https://www.autosencuotas.com.ar/img/logo-autosencuotas.png' />";
                    $mensaje .= "<h1>".$asunto."</h1>";
                    $mensaje.= " <p>".$_POST['demail']." te recomienda que mires el siguiente <a href='".$_POST['link']."' target='_blank' >plan de ahorro</a>.</p>";
                    $mensaje.= " <p> Modelo : ".$_POST['nombreModelo']."</p>";
                    $mensaje.= " <p> Tipo de plan : ".$_POST['tplan']."</p>";
                    $mensaje.= " <p> Cuota desde : ".$_POST['cuota']."</p>";
                    $mensaje.= " <p> Mensaje : ".$_POST['mensajemail']."</p>";

                    $mensaje.="<br><br><br><img src='".$_POST['imagen']."' />";
                    

                    var_dump($mensaje);

                    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    // Cabeceras adicionales
                    $cabeceras .= 'To: Autos en Cuotas <no-responder@autosencuotas.com>' . "\r\n";
                    $cabeceras .= 'From: Autos en Cuotas <no-responder@autosencuotas.com>' . "\r\n";
                    //$cabeceras .= 'Cc: copia@mail.com' . "\r\n";
                    //$cabeceras .= 'Bcc: federico@autosencuotas.com' . "\r\n";

                    //mail($mail_rev, $asunto, $mensaje, $cabeceras);
                    //mail('federico@autosencuotas.com', $asunto, $mensaje, $cabeceras);
                    mail('mvillalba2013.02@gmail.com', $asunto, $mensaje, $cabeceras);
                    mail($_POST['paramail'], $asunto, $mensaje, $cabeceras);
                }
                echo CJSON::encode(array('Ok'=>true));
                
        }
        
        
        
       
      

}