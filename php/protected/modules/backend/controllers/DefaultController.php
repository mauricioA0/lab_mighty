<?php

class DefaultController extends Controller
{
        public $layout='//layouts/column2';
        
        
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
			 	$this->redirect(array('Concesionarios/admin'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('login'));
	}


	public function actionError308()
	{
		$this->render('error308');
	}
        
        public function actionUpdateBase(){
            
            $dbh = new PDO('mysql:host=deliveryaec.com;dbname=delivery_lee', 'delivery_colon', 'MyConPw_616', array( PDO::ATTR_PERSISTENT => false));
            
            $dbh_2016 = new PDO('mysql:host=localhost;dbname=delivery_lee_2016', 'delivery_motors', 'rsPFz1T4WhXy', array( PDO::ATTR_PERSISTENT => false));
            
            $sql_publica = $dbh->prepare(" SELECT CONCAT(' UPDATE publicaciones  SET  cuotasPlan = \" ', cuotasPlan, '\", enabledPlan = \"',enabledPlan, '\" , explicaPlan  = \"', explicaPlan,'\", explicaPlanDestacado  = \"', explicaPlanDestacado, '\", entrega  = \"' ,entrega ,'\" WHERE idPublicacion = ', idPublicacion, ' ; ' ) as 'update' FROM publicaciones; ");
            // call the stored procedure
            $sql_publica->execute();
            // fetch all rows into an array.

            $rows_mod = $sql_publica->fetchAll(PDO::FETCH_ASSOC);

            $sql_publica->closeCursor();           
            
            
            if(count($rows_mod)){
                foreach ( $rows_mod as $mi_row ){
               
                    $stmt_2016 = $dbh_2016->prepare($mi_row['update']);
                    // call the stored procedure
                    $stmt_2016->execute();
                        
                }
            }
            
            
            
            
            $sql_publica = $dbh->prepare(" SELECT CONCAT(' UPDATE publicacionesAC SET explicaAC = \"', explicaAC, '\",  explicaACDestacado = \"', explicaACDestacado,'\", cantCuotasAC = \"',cantCuotasAC, '\", valorAC = \"', valorAC, '\", promedioCuotasAC = \"',promedioCuotasAC, '\", enabledAC = ',enabledAC, ' WHERE idPublicacionAC = ',idPublicacionAC,';' ) as 'update' FROM publicacionesAC ");
            // call the stored procedure
            $sql_publica->execute();
            // fetch all rows into an array.

            $rows_mod = $sql_publica->fetchAll(PDO::FETCH_ASSOC);

            $sql_publica->closeCursor();           
            
            
            if(count($rows_mod)){
                foreach ( $rows_mod as $mi_row ){
               
                    $stmt_2016 = $dbh_2016->prepare($mi_row['update']);
                    // call the stored procedure
                    $stmt_2016->execute();
                        
                }
            }
            
            
            
            
            $sql_publica = $dbh->prepare(" SELECT  CONCAT('UPDATE modelo SET precio0kmModelo = \"',precio0kmModelo,'\", enabledModelo = \"', enabledModelo, '\", coloresModelo = \"', coloresModelo,'\", equipamientoModelo = \"', equipamientoModelo,'\", videoModelo = \"', videoModelo,'\", tagsModelo =  \"', tagsModelo, '\", coloresModelo = \"',coloresModelo, '\", nombreModelo = \"',nombreModelo,'\", nombreDirectorio = \"',nombreDirectorio,'\" WHERE idModelo = ', idModelo,';' ) as 'update' FROM modelo; ");
            // call the stored procedure
            $sql_publica->execute();
            // fetch all rows into an array.

            $rows_mod = $sql_publica->fetchAll(PDO::FETCH_ASSOC);

            $sql_publica->closeCursor();           
            
            
            if(count($rows_mod)){
                foreach ( $rows_mod as $mi_row ){
               
                    $stmt_2016 = $dbh_2016->prepare($mi_row['update']);
                    // call the stored procedure
                    $stmt_2016->execute();
                        
                }
            }
            
            
            $stmt_2016 = $dbh_2016->prepare("UPDATE publicaciones SET descuentoSuscrip = '25%' WHERE descuentoSuscrip = ''");
            // call the stored procedure
            $stmt_2016->execute();
                    
            
            $this->render('update',array());
            
            
        }
        
        
         public function actionUpdateCache(){
            
            /*
            $dir = __DIR__.'/../../../../img/autos';
            echo '<pre>';
            $files = scandir($dir); 
            
            foreach ( $files as $file ){
                if(substr($file, -4)==".png"){
                    
                    $original = imagecreatefrompng($dir.'/'.$file);

                    if ($original !== false){
                       $thumb = imageCreatetrueColor('85','54');
                       imagesavealpha($thumb, true);

                        $trans_colour = imagecolorallocatealpha($png, 0, 0, 0, 127);
                        imagefill($png, 0, 0, $trans_colour);

                        $red = imagecolorallocate($png, 255, 0, 0);
    
                       if ($thumb !== false){
                          $ancho = imagesx($original);
                          $alto = imagesy($original);

                          imagecopyresampled($thumb,$original,0,0,0,0,'85','54',$ancho,$alto);
                          $resultado = imagepng($thumb,$dir.'/min/'.$file,9);
                          var_dump($resultado);
                       }
                    }
 
                }
            }
            echo 'fin';
            echo '</pre>';
            //die();
            
            */
            // PUBLICACIONES
            $dbh = new PDO('mysql:host=deliveryaec.com;dbname=delivery_lee', 'delivery_colon', 'MyConPw_616', array( PDO::ATTR_PERSISTENT => false));

            $dbh_2016 = new PDO('mysql:host=localhost;dbname=delivery_lee_2016', 'delivery_motors', 'rsPFz1T4WhXy', array( PDO::ATTR_PERSISTENT => false));

            $sql_mod = $dbh->prepare(" SELECT * FROM modelo ");
            // call the stored procedure
            $sql_mod->execute();
            // fetch all rows into an array.

            $rows_mod = $sql_mod->fetchAll(PDO::FETCH_ASSOC);

            $sql_mod->closeCursor();

            if(count($rows_mod)){
                // Publicaciones
                foreach ( $rows_mod as $mi_row ){
                    $modelo = Modelo::model()->findByPk($mi_row["idModelo"]);

                    if(!$modelo){

                        $sql = " INSERT INTO modelo values (";

                        foreach ( $mi_row as $row){
                              $sql .=  "'".$row."',";
                        }

                        $sql =  trim($sql,",")." ) ";

                        var_dump($sql);
                        $stmt_2016 = $dbh_2016->prepare($sql);
                        // call the stored procedure
                        $stmt_2016->execute();

                    }
                }

            }



            $stmt = $dbh->prepare(" SELECT * FROM publicaciones ");
            // call the stored procedure
            $stmt->execute();
            // fetch all rows into an array.

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt->closeCursor();



            // Publicaciones
            foreach ( $rows as $mi_row ){
                $sql = "";
                $publicacion = Publicaciones::model()->findByPk($mi_row["idPublicacion"]);
                //var_dump($publicacion);
                //$publicacion = Publicaciones::findPlanById($mi_row["idPublicacion"]);
                if(!$publicacion){

                    $sql = " INSERT INTO publicaciones values (";
                    foreach ( $mi_row as $k => $row){
                          $sql .=  "'".$row."',";
                    }

                    $sql .= " '','' ";

                    $sql .= ") ";
                    $stmt_2016 = $dbh_2016->prepare($sql);
                    // call the stored procedure
                    $stmt_2016->execute();


                } else {

                    $sql = "UPDATE publicaciones SET cuotasPlan = '".addslashes($mi_row['cuotasPlan'])."' WHERE idPublicacion = '".$mi_row['idPublicacion']."' ";

                    //echo $sql.';<br>';
                    try {
                        $stmt_2016 = $dbh_2016->prepare($sql);
                        // call the stored procedure
                        $stmt_2016->execute();
                    }
                    catch( PDOException $Exception ) {
                        // Note The Typecast To An Integer!
                        throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
                    }

                    if($mi_row['explicaPlan']!=$publicacion->explicaPlan or $mi_row['cuotasPlan']!=$publicacion->cuotasPlan or $mi_row['entrega']!=$publicacion->entrega){

                        //$publicacion->attributes = array("explicaPlan"=>$mi_row['explicaPlan'],"cuotasPlan"=>$mi_row['cuotasPlan'],"entrega"=>$mi_row['entrega']);
                        $publicacion->attributes = array("explicaPlan"=>$mi_row['explicaPlan'],"entrega"=>$mi_row['entrega']);
                        $publicacion->save();

                    }

                }
            }


            $sql_ac = $dbh->prepare(" SELECT * FROM publicacionesAC ");
            // call the stored procedure
            $sql_ac->execute();
            // fetch all rows into an array.

            $rows_ac = $sql_ac->fetchAll(PDO::FETCH_ASSOC);



            foreach ( $rows_ac as $mi_ac ){
                $publicacion = PublicacionesAC::model()->findByPk($mi_ac["idPublicacionAC"]);
                if(!$publicacion){
                    // crear la publicacion

                    $sql = " INSERT INTO publicacionesAC values (";
                    foreach ( $mi_ac as $k => $row){
                          $sql .=  "'".$row."',";
                    }

                    $sql = trim($sql,",").")";

                    //echo $sql.';<br>';
                    $stmt_2016 = $dbh_2016->prepare($sql);
                    // call the stored procedure
                    $stmt_2016->execute();

                } else {
                    //actualizar la publicacion
                    $sql_ac_update = " UPDATE publicacionesAC SET enabledAC = '".$mi_ac['enabledAC']."', prioridad = '".$mi_ac['prioridad']."', cantCuotasAC = '".$mi_ac['cantCuotasAC']."',valorAC = '".$mi_ac['valorAC']."', estadoPlan = '".$mi_ac['estadoPlan']."' WHERE idPublicacionAC = '".$mi_ac['idPublicacionAC']."' ";
                    //echo $sql_ac_update.';<br>';
                    $stmt_2016 = $dbh_2016->prepare($sql_ac_update);
                    // call the stored procedure
                    $stmt_2016->execute();
                }
            }



            $sql = " UPDATE publicaciones
            INNER JOIN modelo ON modelo.idModelo  = publicaciones.idModeloPlan
            SET publicaciones.slug = CONCAT(LOWER(REPLACE(modelo.nombreModelo,' ','-')),'-',publicaciones.tipoPlan)
            WHERE publicaciones.slug IS NULL OR publicaciones.slug  = ''  ";

            $stmt_2016 = $dbh_2016->prepare($sql);
            // call the stored procedure
            $stmt_2016->execute();
                    
            
            $this->render('update',array('cache'=>true));
            
            
        }
        
        public function actionAdminFace(){
            $GLOBALS['todo'] = true;
            $this->render('update',array('admin'=>true));
        }
        
        
        
}