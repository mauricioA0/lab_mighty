<?php

class ModeloController extends Controller
{
	public function actionAjaxVotacion()
	{

		
		$idModelo = $_POST['modelo'];
		$tipoVoto = $_POST['voto'];

		

		if(empty(Yii::app()->request->cookies['modelo-'.$idModelo]))
		{

			$canVotos = Modelo::findVotarByIdModelo($idModelo, $tipoVoto);

			$cookieVoto = new CHttpCookie('modelo-'.$idModelo, $idModelo);
	    	$cookieVoto->expire = time() + (60*60*365); // 24 hours; 
	    	Yii::app()->request->cookies['modelo-'.$idModelo] = $cookieVoto;                          

		}
		else
		{
			if($tipoVoto == 'SI')
			{
	    		$canVotos = Modelo::model()->findByPk($idModelo);
	    		$canVotos = $canVotos->votPos;
			}

	    	if($tipoVoto == 'NO')
	    	{
	    		$canVotos = Modelo::model()->findByPk($idModelo);
	    		$canVotos = $canVotos->votNeg;
	    	}
	    }


		echo CJSON::encode(array('Ok'=>true, 'votos'=>$canVotos));
		
	}



	public function actionAjaxVotacionRaty()
	{
		$voto = $_POST['voto'];
		$idmod = $_POST['modelo'];

		if(empty(Yii::app()->request->cookies['raty-'.$idmod]))
		{
                    $raty = Raty::findUpdateRatyByIdModelo($idmod, $voto);
                    $estado = true;

                    $cookieRaty = new CHttpCookie('raty-'.$idmod, $idmod);
                    $cookieRaty->expire = time() + (60*60*365); // 24 hours; 
                    Yii::app()->request->cookies['raty-'.$idmod] = $cookieRaty;
		}
		else
		{
			$raty = Raty::findRatyByIdModelo($idmod);
			$estado = false;

		}      

		echo CJSON::encode(array('raty'=>$raty, 'estado'=>$estado));

	}
        
        
        
        public function actionMarcasComparador($id_div = ''){
            
            if(count($_POST)){
                $idDiv = $_POST['idDiv'];
            } else {
                $idDiv = '';
            }
            
            $Marcas = Marca::getMenu();
            
            $html = '<div class="nueva-seleccion" id="'.$idDiv.'">
					<p class="tituloComparaorBoton">Seleccionar Marca</p>';
            

            if(count($Marcas)){
                foreach ( $Marcas as $mi_mar){

                    $html.= '<div class="checkbox">
                                <label>
                                    <input type="checkbox" onclick="actions.comparadorMarca('.$mi_mar->concesionarios->marcas->id.',\''.$idDiv.'\');" > '.ucwords($mi_mar->concesionarios->marcas->nombre_plan_marca).' 
                                    
                                </label>
                                <span class="right"><img style="cursor : pointer; " onclick="actions.comparadorMarca('.$mi_mar->concesionarios->marcas->id.',\''.$idDiv.'\');" src="'.Yii::app()->request->baseUrl.'/img/marcas/logo-'.strtolower(str_replace(' ', '-',$mi_mar->concesionarios->marcas->nombre_marca)).'.png" alt="'.$mi_mar->concesionarios->marcas->nombre_marca.'" width="50" class="right"></span>
                            </div>';
                }
            }
            
            $html.= '
                </div>';
            
            echo CJSON::encode($html);
            
        }
        
        public function actionAjaxMarcaComparador()
	{
		
            $idMarca = $_POST['marca'];
            $idDiv = $_POST['idDiv'];

            if($idMarca==''){
                return false;
            }
            
            $modelo = Modelo::findAllModelosHabByIdMarca($idMarca, Yii::app()->params['conce']);

            
            if(count($modelo)){
                
                $html = '<img src="'.Yii::app()->request->baseUrl.'/img/cerrarGris.png" width="14" height="15" id="cerrarComparacion" onclick="actions.getMarcas(\''.$idDiv.'\');"> 
                        <p class="tituloComparaorBoton">Seleccionar Modelo ('.ucwords($modelo[0]->marcas->nombre_plan_marca).')</p>
                                    <form action="?" id="formSelect"> ';

                foreach ( $modelo as $mi_modelo ){


                    $html .= '<div class="checkbox">
                                <label>
                                    <input type="checkbox" onclick="actions.comparadorPlanes('.$mi_modelo->idModelo.',\''.$idDiv.'\');" > '.$mi_modelo->nombreModelo.'
                                </label>
                            </div>';
                }
                
                $html .= '</form>';
            
            }

            

            echo CJSON::encode($html);
		
	}

}