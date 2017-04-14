<?php

class EstaticasController extends Controller
{
	public function actionEmpresa()
	{
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
            
                $GLOBALS['title'] = "Quienes Somos Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Autos en cuotas".$msg." - Conocé Quienes Somos y donde estamos. Autos en cuotas - Planes de Ahorro. Tu Auto en cuotas, simple.";
		$this->render('empresa');
	}


	public function actionTerminosCondiciones()
	{
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
            
                $GLOBALS['title'] = "Terminos y Condiciones Autos en cuotas".$msg;
                $GLOBALS['meta'] = "Autos en cuotas".$msg." - Términos y Condiciones del uso del sitio - Aspectos legales y detalles de contenido. Planes de ahorro para 0Km en cuotas";
		$this->render('legales');
	}


	public function actionPreguntasfrecuentes()
	{
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
                $GLOBALS['title'] = "Preguntas frecuentes Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Preguntas frecuentes Autos en Cuotas".$msg;
		$this->render('preguntas_frecuentes');
	}


	public function actionRedesSociales()
	{
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
                $GLOBALS['title'] = "Redes Sociales Autos en Coutas".$msg;
                $GLOBALS['meta'] = "Seguí a Autos en Cuotas".$msg." en las redes Sociales Facebook, Google+, Twitter, YouTube, Instagram y otras. Tené tu Auto 0Km en cuotas por Plan de ahorro.";
		$this->render('redes_sociales');
	}


	public function actionContactoAdministrativo()
	{
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
            
                $GLOBALS['title'] = "Contacto Administrativo Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Autos en Cuotas".$msg." - Contacto administrativo del sitio. Planes de ahorro para 0Km. Tu Auto en cuotas, simple.";
		$this->render('contacto_administrativo');
	}


	public function actionVenderPlan()
	{
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
            
                $GLOBALS['title'] = "Vender mi plan de Ahorro".$msg;
                $GLOBALS['meta'] = "Vender mi plan de Ahorro".$msg;
                
                $marcas = Marca::getMenu();
		$this->render('vender_miplan',array('marcas' => $marcas));
	}
        
        public function actionEnviarVenderPlan()
        {
          
            $nombre=$_POST['nombre'];
            $tel=$_POST['telefono'];
            $tel2 = $_POST['telefono2'];
            $email=$_POST['mail'];
            $nextel=$_POST['nex'];
            $cuotas=$_POST['cuotas'];
            $cuotas_imp=$_POST['cuotas_impagas'];
            $marca=$_POST['marca'];
            $modelo=$_POST['modelo'];
            $tipo_plan=$_POST['tipo_plan'];
            $ciudad=$_POST['ciudad'];
            $mensaje=$_POST['mensaje'];

         //envio de email
            $de = "$email";
            $asunto='Autosencuotas - Vender mi plan';
            $cuerpo .= "Nombre: ".$nombre."\r\n"."\r\n";
            $cuerpo .= "Telefono: ".$tel."\r\n"."\r\n";
            if($tel2!=''){
                 $cuerpo .= "Telefono 2: ".$tel2."\r\n"."\r\n";
            }
            if($nextel!=''){
                $cuerpo .= "Nex: ".$nextel."\r\n"."\r\n";
            }
            $cuerpo .= "E-Mail: ".$email."\r\n"."\r\n";
            $cuerpo .= "Marca: ".$marca."\r\n"."\r\n";
            if($modelo!=''){
                $cuerpo .= 'Modelo:'.$modelo."\r\n"."\r\n";
            }
            if($ciudad!=''){
                $cuerpo .= 'Ciudad:'.$ciudad."\r\n"."\r\n";
            }
            
            if($tipo_plan!=''){
                $cuerpo .= 'Tipo Plan:'.$tipo_plan."\r\n"."\r\n";
            }
            
            if($cuotas!=''){
                $cuerpo .= 'Cuotas Pagas:'.$cuotas."\r\n"."\r\n";
            }
            
            if($cuotas_imp!=''){
                $cuerpo .= 'Cuotas Impagas:'.$cuotas_imp."\r\n"."\r\n";
            }

            if($mensaje!=''){
            $cuerpo .= 'Mensaje:'.$mensaje."\r\n"."\r\n";
            }

            $header1 ="Cc: autoscuotasadjudicado@gmail.com"."\r\n";

            $header = "Content-Type: text/plain; charset=\"iso-8859-1\" \r\n";

            $header .= "Content-Transfer-Encoding: 8bit \r\n";

            $header .= "MIME-Version: 1.0 \r\n";

            $header .= "From: $de"."\r\n";

            $a='martinsaide@autosencuotas.com';

            
            //mail($a, $asunto, $cuerpo, $header.$header1);
            mail('mvillalba2013.02@gmail.com', $asunto, $cuerpo, $header);
            
            $this->redirect(Yii::app()->createUrl('contacto-ok'));
	

        }
        
        
        public function actionEnviarRecuperarPlan()
        {
          
            $nombre=$_POST['nombre'];
            $tel=$_POST['telefono'];
            $tel2 = $_POST['telefono2'];
            $email=$_POST['mail'];


            $marca=$_POST['marca'];
            $modelo=$_POST['modelo'];

            $ciudad=$_POST['ciudad'];
            $mensaje=" Recuperar mi plan : ".$_POST['mensaje'];
            
            //$this->enviarConsultaDelivery($email, $telefono, $telefono2, $nombre, $ciudad, $conce, $modelo, $origen, $mensaje, $ip, $listadoModelos, $listadoMarcas)
            $this->enviarConsultaDelivery($email, $tel, $tel2, $nombre, $ciudad, $marca, $modelo, '19', $mensaje, $_SERVER['REMOTE_ADDR'], '', '');

            
            $this->redirect(Yii::app()->createUrl('contacto-ok'));
	

        }
        
        
        public function enviarConsultaDelivery($email, $telefono, $telefono2, $nombre, $ciudad, $conce, $modelo, $origen, $mensaje, $ip, $listadoModelos = '', $listadoMarcas = ''){

            $dbh = new PDO('mysql:host=deliveryaec.com;dbname=delivery_manadelivery', 'delivery_freddy', 'MyFdiPw_616', array( PDO::ATTR_PERSISTENT => false));
            $stmt = $dbh->prepare(" SELECT idCliente FROM clientes WHERE emailCliente='".$email."' ");
            // call the stored procedure
            $stmt->execute();

            // fetch all rows into an array.
            $clientes = $stmt->fetch(PDO::FETCH_ASSOC);

            // si existe el cliente previo
            if(count($cliente)){
                // verifica si los
                if( $telefono != $rows[0]['datosContacto'] ){
                    $stmt = $dbh->prepare(" UPDATE clientes SET datosContacto= CONCAT(nombre_sitio,' // ', '".$telefono."') WHERE idCliente='".$rows[0]['idCliente']."' ");
                    $stmt->execute();
                }

                $last_id = $rows[0]['idCliente'];

            } else {
                $stmt = $dbh->prepare(" INSERT INTO clientes(nombreCliente,telCliente,telCliente2,emailCliente,ciudad)VALUES('$nombre','$telefono','$telefono2','$email','$ciudad') ");
                $stmt->execute();
                $last_id = $dbh->lastInsertId();
            }

            $stmt = $dbh->prepare(" INSERT INTO consultas(cliente,vendedor,idPlan,fecha,tipo,origen,mensaje,asignacion,vista,listadoModelos,listadoMarcas,ipConsulta)VALUES('$last_id','$conce','$modelo',now(),1,'$origen','$mensaje','0','0','$listadoModelos','$listadoMarcas','$ip') ");
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = null;
            $dbh = null;


        }
        
        

	public function actionTrabajaNosotros()
	{
		$this->render('trabaja_nosotros');
	}

	public function actionWhatsapp()
	{
		$this->render('whatsapp');
	}
        
        public function actionRecuperarPlan()
	{
		$slideMarcas = Marca::getMenu();
                
                $GLOBALS['title'] = "Recuperar tu plan para tu 0km. Autos en cuotas.";
                $GLOBALS['meta'] = "Recuperá tu Plan de ahorro en Autos en cuotas - Si estabas pagando un Plan de Ahorro y querés continuar, consultá ahora como recuperar tu plan.";

		$this->render('recuperar_plan', array('marcas'=>$slideMarcas));
	}
        
        
        public function  actionChat( $tipo = '1'){
	
                
            if($tipo == 1 ){
                $cod = '2lFQcF7QeweRC4Zje0a2VyYcuROfTSgl';
                $cod2 = 'sa48522';
            } else {
                $cod = '30m26ItTPDGQfnjpZ7HEjhT2EgkR64wD';
                $cod2 = 'sa27692';
            }
            $zona = ini_get('date.timezone');

            $arrDias = array();
            $chatVSpirit = false;
            $chatZopim = true;

            $arrDias = array('Lunes','Martes','Miercoles','Jueves','viernes','Sabado','Domingo');

            $dia = $arrDias[date('N') - 1];
            $hora = date('H:i');

            $chat_day = Chat::findDay($dia);

            
            $chatVSpirit = true;
            $chatZopim = false;
                
            if($chat_day){
                
                foreach ( $chat_day as $mi_dat ){
                    
                    if($hora>=$mi_dat->h_desde and $hora<=$mi_dat->h_hasta){
                        $chatZopim = true;
                        $chatVSpirit = false;
                    }
                    
                }
            } 




                if($chatVSpirit){

                    $script = ' 
                            <script>var vsid = "'.$cod2.'";
                            (function() {
                            var vsjs = document.createElement(\'script\'); vsjs.type = \'text/javascript\'; vsjs.async = true; vsjs.setAttribute(\'defer\', \'defer\');
                             vsjs.src = (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'www.virtualspirits.com/vsa/chat-\'+vsid+\'.js\';
                              var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(vsjs, s);
                            })();</script>';
                    
                    echo $script;
                }


                if($chatZopim){ 

                $script = '
               
                    <script>window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
                    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
                    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
                    $.src="https://v2.zopim.com/?'.$cod.'";z.t=+new Date;
                    $.type=\'text/javascript\';e.parentNode.insertBefore($,e)})(document,"script");</script>';

                    
                    $html  = '<style>#click2call a:hover { opacity: 0.9; }';
                    $html .= '#click2call_hupbtn img { height: 50px; margin: 0px 0px 0px 10px; }';
                    $html .= '#click2call_msgdiv { font-size: 15px; font-weight: bold; }';
                    $html .= 'a#click2call_callbtn, a#click2call_hupbtn { position: fixed; left: 0; bottom: 20px; z-index: 999; }';
                    $html .= 'a#click2call_callbtn i { margin-right: 10px; } </style>';

                    $html .= '<script type="text/javascript" src="https://webrtc.anura.com.ar/click2call/js/jquery.json-2.4.min.js"></script>';
                    $html .= '<script type="text/javascript" src="https://webrtc.anura.com.ar/click2call/js/jquery.cookie.js"></script>';
                    $html .= '<script type="text/javascript" src="https://webrtc.anura.com.ar/click2call/js/verto-min.js"></script>';
                    $html .= '<script type="text/javascript" src="https://webrtc.anura.com.ar/click2call/click2call.js"></script>';

                    $html .= '<div id="click2call" align="center">';
                    $html .= '<a id="click2call_callbtn"> <img src="https://www.autosencuotas.com/img/general/call.svg" width="160px"> </a>';
                    $html .= '<a id="click2call_hupbtn"> <img src="https://webrtc.anura.com.ar/click2call/img/phone_hang.png"> </a>';
                
                    $html .= '<div id="click2call_msgdiv"></div>';

                    $html .= '<div style="visibility: hidden; display: none;">';
                    $html .= '<input id="click2call_user" value="200">';
                    $html .= '<input id="click2call_domain" value="autosencuotas.grancentral.com.ar">';
                    $html .= '<input id="click2call_password" value="200@c904">';
                    $html .= '<input id="click2call_number" value="900">';
                    $html .= '<input id="click2call_host" value="wss://webrtc.anura.com.ar:9084">';
                    $html .= '</div>';
                
                    $html .= '<div id="media" style="visibility: hidden; display: none;"> <video width=800 id="webcam" autoplay="autoplay" hidden="true"></video> </div>';
                    $html .= '</div>';
                    
                    if($tipo == 1 ){
                        $script .= 'document.write(\''.$html.'\'); ';
                    }
                    
                echo $script;


            } 
                
        }
        
        // publicaciones
        public function actionFavoritos(){
            
            $cookies = Yii::app()->request->cookies['favoritos'];
            
            $favoritos = array();
            
            if($cookies){
                
                if($cookies['publicaciones']){
                    $favoritos['publicaciones'] = $cookies['publicaciones']; 
                }
                
                if($cookies['adjudicados']){
                    $favoritos['adjudicados'] = $cookies['adjudicados'];
                }
                
                if($cookies['comenzados']){
                    $favoritos['comenzados'] = $cookies['comenzados'];
                }
                
            }
            
            $this->render('favoritos', array('favoritos'=>$favoritos));
        }
        
        
        public function actionAddFavoritos() {
            $cookieAcep = new CHttpCookie('favoritos_publicaciones_50', 'SI');
            var_dump($cookieAcep);
            $cookieAcep->expire = time() + (365*60*60*365*1000); // 24 hours; 
            Yii::app()->request->cookies['favoritos']['publicaciones']['50'] = $cookieAcep;
            
            var_dump(Yii::app()->request->cookies['favoritos']['publicaciones']);
            die("HOLA");
            $tipo = $_POST['tipo'];
                    
            $producto = $_POST['producto'];
                    
            switch ($tipo11) {
                
                case 'publicaciones':
                        array_push(Yii::app()->request->cookies['favoritos']['publicaciones'], $producto);
                    break;

                case 'adjudicados':
                        array_push(Yii::app()->request->cookies['favoritos']['adjudicados'], $producto);
                    break;
                
                case 'comenzados':
                        array_push(Yii::app()->request->cookies['favoritos']['comenzados'], $producto);
                    break;
                
                default:
                    break;
            }
            
            var_dump(Yii::app()->request->cookies['favoritos']);
            
        }
        

	
}
