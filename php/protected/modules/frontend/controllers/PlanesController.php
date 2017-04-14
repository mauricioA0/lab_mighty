<?php

class PlanesController extends Controller
{
	public function actionPlanesAhorro()
	{

            
                if($GLOBALS['site']->descripcion_prov!=""){
                        $msg = " ".$GLOBALS['site']->descripcion_prov;
                } else {
                        $msg = "";
                }
                
                $GLOBALS['title'] = "Planes de Ahorro para Autos en Cuotas 0Km".$msg;
                $GLOBALS['meta'] = "Todos los Planes de ahorro para tu 0 Km en cuotas en pesos sin interés. Conocé todas las marcas y modelos para tu próximo Auto".$msg;
                
                $model = new Consultas();
                Yii::app()->session['tipoPlan'] = 'planes_ahorro';
		Yii::app()->user->setFlash('buttonDisabled', true);

		$nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], 1200,null, null, null, null, null, null);



		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];

		/*Cargo el filtro del costado con los datos que existen en la base*/
		$filtros = Publicaciones::findFiltroByEstado(Yii::app()->params['conce']);



		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];


                //Yii::app()->clientScript->registerMetaTag(implode(',', $marcas).','.  implode(',', $planes).','.implode(',', $categorias), 'keywords');
		//$GLOBALS['keyworks'] = true;

                //Obtengo el menor y el mayor precio de venta y la cuota para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);


		$cuotas = $filtros['cuotas'];

		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);


		$urlAjaxList = Yii::app()->createUrl('ajax-nuevos-lista');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-nuevos-gal');

		$vista = 'Galeria';



		/*Valido el form por ajax y despues lo valido por php si esta ok lo guardo en
		la base del sitio y tambien en la del delivery asi como lo envio por email. */
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

		$this->render('planes_nuevos', array('nuevos'=>$destacados,
			                                 'total'=>$total,
		                                 	 'pages'=>$pages,
		                                     'urlList'=>$urlAjaxList,
		                                     'urlGal'=>$urlAjaxGal,
		                                     'marcas'=>$marcas,
		                                     'planes'=>$planes,
		                                     'categorias'=>$categorias,
		                                     'precioMin'=>$precioMenor,
		                                     'precioMax'=>$precioMayor,
		                                     'cuotaMin'=>$cuotaMin,
		                                     'cuotaMax'=>$cuotaMax,
		                                     'vista'=>$vista,
		                                     'tipo'=>'',
		                                     'model'=>$model));

	}






	public function actionPlanesAdjudicados($reventa = '')
	{

                $arrMarcas = array();


                switch ($reventa) {
                    case 'fiat-1':
                            $arrMarcas[] = "Fiat Plan";
                            Yii::app()->session['marca'] = $arrMarcas;
                            $reventa = '';
                        break;

                    case 'peugeot-3':
                            $arrMarcas[] = "Autoplan Peugeot";
                            Yii::app()->session['marca'] = $arrMarcas;
                            $reventa = '';
                        break;

                    case 'volkswagen-4':
                            $arrMarcas[] = "Autoahorro Volkswagen";
                            Yii::app()->session['marca'] = $arrMarcas;
                            $reventa = '';
                        break;

                    case 'chevrolet-5':
                            $arrMarcas[] = "Plan Chevrolet";
                            Yii::app()->session['marca'] = $arrMarcas;
                            $reventa = '';
                        break;

                    case 'ford-6':
                            $arrMarcas[] = "Plan Ovalo";
                            Yii::app()->session['marca'] = $arrMarcas;
                            $reventa = '';
                        break;

                    case 'renault-7':
                            $arrMarcas[] = "Plan Rombo";
                            Yii::app()->session['marca'] = $arrMarcas;
                            $reventa = '';
                        break;



                    default:
                        break;
                }

                if($reventa==''){
                    $adjudicados = PublicacionesAC::findDestacadosAdjudicados(12,$arrMarcas);
                } else {
                    $adjudicados = PublicacionesAC::findDestacadosAdjudicados(12, null, null, null, null, null, $reventa);
                }

		$destacados = $adjudicados['adjudicados'];
		$pages = $adjudicados['pages'];
		$total = $adjudicados['total'];

		/*Cargo el filtro del costado con los datos que existen en la base*/
		$filtros = PublicacionesAC::findFiltroByEstado('Adjudicados',$reventa);
		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$reventas = array_reverse($filtros['reventas']);
		$categorias = $filtros['categ'];

		//Obtengo el menor y el mayor precio de venta para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);

		$cuotas = $filtros['cuotas'];
		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);

		$urlAjaxList = Yii::app()->createUrl('ajax-adjudicados-list');
		$urlAjaxGal  = Yii::app()->createUrl('ajax-adjudicados-gal');

		$vista = 'Galeria';
                
                if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " en ".$GLOBALS['site']->descripcion_prov;
                } else {
                    $msg = "";
                }
                
                $GLOBALS['title'] = " Planes adjudicados para tu 0KM. Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Planes Adjudicados de Autos en Cuotas".$msg.". Encontrá las mejores Ofertas en Planes listos para tener tu 0Km ya adjudicado en cuotas sin interés. Consultá ahora";

		$this->render('planes_adjudicados', array('destacados'=>$destacados,
			                                      'pages'=>$pages,
			                                      'total'=>$total,
			                                      'tipo'=>'Adjudicados',
			                                      'urlList'=>$urlAjaxList,
			                                      'urlGal'=>$urlAjaxGal,
                                                              'url'=>$url,
			                                      'marcas'=>$marcas,
			                                      'planes'=>$planes,
			                                      'categorias'=>$categorias,
			                                      'precioMin'=>$precioMenor,
			                                      'precioMax'=>$precioMayor,
			                                      'cuotaMin'=>$cuotaMin,
			                                      'cuotaMax'=>$cuotaMax,
			                                      'vista'=>$vista,
                                                              'reventa'=>$reventa,
                                                              'reventas'=>$reventas));
	}







	//Esto carga el partial de la Galeria de adjudicados
	public function actionAjaxAdjudicadosGalPartial()
	{

		/*Creo los arrays que cargan los filtros para agregarlos a la query de usqueda
		solo si existen o estan con datos*/

		$arrMarcas = array();
		$arrCateg = array();
		$arrPlanes = array();
		$arrReventas = array();
		$precioDesde = '';
		$precioCuota = '';
                $reventa = '';
		$limit = 12;
		Yii::app()->user->setFlash('sin-resultados', false);


		if(!empty($_POST['marca']))
		{
			$arrMarcas = $_POST['marca'];
			Yii::app()->session['marca'] = $arrMarcas;
			$limit = 500;
		}


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
			$limit = 500;
		}

		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
			$limit = 500;
		}

                if(!empty($_POST['reventas']))
		{
			$arrReventas = $_POST['reventas'];
			Yii::app()->session['reventas'] = $arrReventas;
			$limit = 500;
		}


		if(!empty($_POST['precioDesde']))
		{
			$precioDesde = $_POST['precioDesde'];
			$limit = 500;
		}


		if(!empty($_POST['precioCuota']))
		{
			$precioCuota = $_POST['precioCuota'];
			$limit = 500;
		}

                if(!empty($_POST['reventa']))
		{
			$reventa = $_POST['reventa'];
			$limit = 500;
		}


		$adjudicados = PublicacionesAC::findDestacadosAdjudicados($limit, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota, $reventa, $arrReventas);


		$destacados = $adjudicados['adjudicados'];
		$pages = $adjudicados['pages'];
		$tipo = 'Adjudicados';
		$vista = 'Galeria';
                $total = $adjudicados['total'];

		if($adjudicados['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);

		$this->renderPartial('_adjudicadosGaleria', array('destacados'=>$destacados,
			                                              'pages'=>$pages,
                                                                      'total'=>$total,
			                                              'tipo'=>$tipo,
			                                              'vista'=>$vista), false, true);
	}







	//Esto carga el partial de la lista de adjudicados
	public function actionAjaxAdjudicadosListPartial()
	{
		/*Creo los arrays que cargan los filtros para agregarlos a la query de usqueda
		solo si existen o estan con datos*/
		$arrMarcas = array();
		$arrCateg = array();
		$arrPlanes = array();
                $arrReventas = array();
		$precioDesde = '';
		$precioCuota = '';
		$reventa  = '';
		$limit = 12;

		if(!empty($_POST['marca']))
		{
			$arrMarcas = $_POST['marca'];
			Yii::app()->session['marca'] = $arrMarcas;
			$limit = 500;
		}


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
			$limit = 500;
		}

		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
			$limit = 500;
		}

                if(!empty($_POST['reventas']))
		{
			$arrReventas = $_POST['reventas'];
			Yii::app()->session['reventas'] = $arrReventas;
			$limit = 500;
		}

		if(!empty($_POST['precioDesde']))
		{
			$precioDesde = $_POST['precioDesde'];
			$limit = 500;
		}


		if(!empty($_POST['precioCuota']))
		{
			$precioCuota = $_POST['precioCuota'];
			$limit = 500;
		}

                if(!empty($_POST['reventa']))
		{
			$reventa = $_POST['reventa'];
			$limit = 500;
		}


		$adjudicados = PublicacionesAC::findDestacadosAdjudicados($limit, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota, $reventa, $arrReventas);

		$destacados = $adjudicados['adjudicados'];
		$pages = $adjudicados['pages'];
                $total = $adjudicados['total'];
		$tipo = 'Adjudicados';
		$vista = 'Lista';

		if($adjudicados['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);

		$this->renderPartial('_adjudicadosLista', array('destacados'=>$destacados,
			                                            'pages'=>$pages,
                                                                    'total'=>$total,
			                                            'tipo'=>$tipo,
			                                            'vista'=>$vista), false, true);
	}



	public function actionPlanesComenzados($reventa = '')
        {
            
                if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " en ".$GLOBALS['site']->descripcion_prov;
                } else {
                    $msg = "";
                }
                
                $GLOBALS['title'] = "Planes Comenzados de Autos en Cuotas".$msg;
                $GLOBALS['meta'] = " Planes Comenzados de Autos en Cuotas".$msg.". Encontrá las mejores Ofertas en Planes listos para tener tu 0Km ya adjudicado en cuotas sin interés. Consultá ahora";


                if($reventa==''){
                    $comenzados = PublicacionesAC::findDestacadosComenzados(12);
                } else {
                    $comenzados = PublicacionesAC::findDestacadosComenzados(12, null, null, null, null, null, $reventa);
                }
		$destacados = $comenzados['comenzados'];
		$pages = $comenzados['pages'];
		$total = $comenzados['total'];

		/*Cargo el filtro del costado con los datos que existen en la base*/
		$filtros = PublicacionesAC::findFiltroByEstado('Comenzados');
		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];
                $reventas = $filtros['reventas'];

                Yii::app()->clientScript->registerMetaTag(implode(',', $marcas).','.  implode(',', $planes).','.implode(',', $categorias), 'keywords');
		$GLOBALS['keyworks'] = true;

		//Obtengo el menor y el mayor precio de venta y la cuota para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);

		$cuotas = $filtros['cuotas'];
		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);

		$urlAjaxList = Yii::app()->createUrl('ajax-comenzados-list');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-comenzados-gal');

		$vista = 'Galeria';

		$this->render('planes_adjudicados', array('destacados'=>$destacados,
			                                      'pages'=>$pages,
			                                      'total'=>$total,
			                                      'tipo'=>'Comenzados',
			                                      'urlList'=>$urlAjaxList,
			                                      'urlGal'=>$urlAjaxGal,
			                                      'url'=>'planes-empezados',
			                                      'marcas'=>$marcas,
			                                      'planes'=>$planes,
			                                      'categorias'=>$categorias,
			                                      'precioMin'=>$precioMenor,
			                                      'precioMax'=>$precioMayor,
			                                      'cuotaMin'=>$cuotaMin,
			                                      'cuotaMax'=>$cuotaMax,
			                                      'vista'=>$vista,
                                                              'reventa'=>$reventa,
                                                              'reventas'=>$reventas));
	}


	//Esto carga el partial de la Galeria de Comenzados
	public function actionAjaxComenzadosGalPartial()
	{

		/*Creo los arrays que cargan los filtros para agregarlos a la query de usqueda
		solo si existen o estan con datos*/
		$arrMarcas = array();
		$arrCateg = array();
		$arrPlanes = array();
                $arrReventas = array();
		$precioDesde = '';
		$precioCuota = '';
                $reventa = '';
		$limit = 12;

		if(!empty($_POST['marca']))
		{
			$arrMarcas = $_POST['marca'];
			Yii::app()->session['marca'] = $arrMarcas;
			$limit = 500;
		}


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
			$limit = 500;
		}

		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
			$limit = 500;
		}

                if(!empty($_POST['reventas']))
		{
			$arrReventas = $_POST['reventas'];
			Yii::app()->session['reventas'] = $arrReventas;
			$limit = 500;
		}

		if(!empty($_POST['precioDesde']))
		{
			$precioDesde = $_POST['precioDesde'];
			$limit = 500;
		}


		if(!empty($_POST['precioCuota']))
		{
			$precioCuota = $_POST['precioCuota'];
			$limit = 500;
		}

                if(!empty($_POST['reventa']))
		{
			$reventa = $_POST['reventa'];
			$limit = 500;
		}


		$comenzados = PublicacionesAC::findDestacadosComenzados($limit, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota, $reventa, $arrReventas);

		$destacados = $comenzados['comenzados'];
		$pages = $comenzados['pages'];
		$total = $comenzados['total'];

		$vista = 'Galeria';

		if($comenzados['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);

		$this->renderPartial('_adjudicadosGaleria', array('destacados'=>$destacados,
			                                              'pages'=>$pages,
			                                              'total'=>$total,
			                                              'tipo'=>'Comenzados',
			                                              'vista'=>$vista), false, true);
	}


	//Esto carga el partial de la lista de Comenzados
	public function actionAjaxComenzadosListPartial()
	{
		/*Creo los arrays que cargan los filtros para agregarlos a la query de usqueda
		solo si existen o estan con datos*/
		$arrMarcas = array();
		$arrCateg = array();
		$arrPlanes = array();
                $arrReventas = array();
		$precioDesde = '';
		$precioCuota = '';
                $reventa = '';
		$limit = 12;

		if(!empty($_POST['marca']))
		{
			$arrMarcas = $_POST['marca'];
			Yii::app()->session['marca'] = $arrMarcas;
			$limit = 500;
		}


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
			$limit = 500;
		}

		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
			$limit = 500;
		}

                if(!empty($_POST['reventas']))
		{
			$arrReventas = $_POST['reventas'];
			Yii::app()->session['reventas'] = $arrReventas;
			$limit = 500;
		}

		if(!empty($_POST['precioDesde']))
		{
			$precioDesde = $_POST['precioDesde'];
			$limit = 500;
		}


		if(!empty($_POST['precioCuota']))
		{
			$precioCuota = $_POST['precioCuota'];
			$limit = 500;
		}

                if(!empty($_POST['reventa']))
		{
			$reventa = $_POST['reventa'];
			$limit = 500;
		}


		$comenzados = PublicacionesAC::findDestacadosComenzados($limit, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota, $reventa, $arrReventas);

		$destacados = $comenzados['comenzados'];
		$pages = $comenzados['pages'];
                $total = $comenzados['total'];
		$vista = 'Lista';

		if($comenzados['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);

		$this->renderPartial('_adjudicadosLista', array('destacados'=>$destacados,
			                                            'pages'=>$pages,
			                                            'total'=>$total,
			                                            'tipo'=>'Comenzados',
			                                            'vista'=>$vista), false, true);
	}




	public function actionPlanesNuevos()
	{

            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
                
                $GLOBALS['title'] = "Planes de Autos Nuevos en Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Nuevos Planes de ahorro para Autos 0 Km en cuotas en pesos sin interés. Conocé los últimos lanzamientos en el mercado Automotor".$msg;
                
                

		$model = new Consultas();
		Yii::app()->user->setFlash('buttonDisabled', true);
		Yii::app()->session['tipoPlan'] = 'Nuevos';

		$nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], 12);

		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];

		/*Cargo el filtro del costado con los datos que existen en la base*/
		$filtros = Publicaciones::findFiltroByEstado(Yii::app()->params['conce']);
		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];

		//Obtengo el menor y el mayor precio de venta y la cuota para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);

		$cuotas = $filtros['cuotas'];
		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);

		$urlAjaxList = Yii::app()->createUrl('ajax-nuevos-lista');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-nuevos-gal');

		$vista = 'Galeria';



		/*Valido el form por ajax y despues lo valido por php si esta ok lo guardo en
		la base del sitio y tambien en la del delivery asi como lo envio por email. */
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta')
                {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                }

		$this->render('planes_nuevos', array('nuevos'=>$destacados,
			                                 'total'=>$total,
		                                 	 'pages'=>$pages,
		                                     'urlList'=>$urlAjaxList,
		                                     'urlGal'=>$urlAjaxGal,
		                                     'marcas'=>$marcas,
		                                     'planes'=>$planes,
		                                     'categorias'=>$categorias,
		                                     'precioMin'=>$precioMenor,
		                                     'precioMax'=>$precioMayor,
		                                     'cuotaMin'=>$cuotaMin,
		                                     'cuotaMax'=>$cuotaMax,
		                                     'vista'=>$vista,
		                                     'tipo'=>'Nuevos',
		                                     'model'=>$model));
	}


        public function actionPlanesDestacados()
	{

            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
                
                $GLOBALS['title'] = "Planes de ahorro Destacados en Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Los Planes de Autos más destacados para llegar a tu 0Km en cuotas bajas en pesos al 0%".$msg;
                
                

		$model = new Consultas();
		Yii::app()->user->setFlash('buttonDisabled', true);
		Yii::app()->session['tipoPlan'] = 'Nuevos';

		$nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], 36);

		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];

		/*Cargo el filtro del costado con los datos que existen en la base*/
		$filtros = Publicaciones::findFiltroByEstado(Yii::app()->params['conce']);
		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];

                Yii::app()->clientScript->registerMetaTag(implode(',', $marcas).','.  implode(',', $planes).','.implode(',', $categorias), 'keywords');
		$GLOBALS['keyworks'] = true;

		//Obtengo el menor y el mayor precio de venta y la cuota para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);

		$cuotas = $filtros['cuotas'];
		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);

		$urlAjaxList = Yii::app()->createUrl('ajax-nuevos-lista');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-nuevos-gal');

		$vista = 'Galeria';



		/*Valido el form por ajax y despues lo valido por php si esta ok lo guardo en
		la base del sitio y tambien en la del delivery asi como lo envio por email. */
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

		$this->render('planes_nuevos', array('nuevos'=>$destacados,
			                                 'total'=>$total,
		                                 	 'pages'=>$pages,
		                                     'urlList'=>$urlAjaxList,
		                                     'urlGal'=>$urlAjaxGal,
		                                     'marcas'=>$marcas,
		                                     'planes'=>$planes,
		                                     'categorias'=>$categorias,
		                                     'precioMin'=>$precioMenor,
		                                     'precioMax'=>$precioMayor,
		                                     'cuotaMin'=>$cuotaMin,
		                                     'cuotaMax'=>$cuotaMax,
		                                     'vista'=>$vista,
		                                     'tipo'=>'Nuevos',
		                                     'model'=>$model));
	}


	public function actionAjaxNuevosGalPartial()
	{
		/*Creo los arrays que cargan los filtros para agregarlos a la query de usqueda
		solo si existen o estan con datos*/
		$arrMarcas = array();
		$arrCateg = array();
		$arrPlanes = array();
		$precioDesde = '';
		$precioCuota = '';
		$limit = 12;
		$tipoPlan = Yii::app()->session['tipoPlan'];
		$valorMax = Yii::app()->params['valorMax']; //esto solo se usa para planes economicos


		if(!empty($_POST['marca']))
		{
			$arrMarcas = $_POST['marca'];
			Yii::app()->session['marca'] = $arrMarcas;
			$limit = 500;
		}


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
			$limit = 500;
		}
		else
		{
                    switch ($tipoPlan) {

                        case 'Utilitarios':
				$arrCateg = array('40', '45');
                            break;

                        case 'Autos':
                                $arrCateg = array('0');
                            break;

                        case 'Familiar':
                                $arrCateg = array('5');
                            break;

                        case 'Camioneta':
                                $arrCateg = array('10','20');
                            break;

                        case 'Pick-Up':
                                $arrCateg = array('30');
                            break;


                        default:
                            break;
                    }
		}


		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
			$limit = 500;
		}

		if(!empty($_POST['precioDesde']))
		{
			$precioDesde = $_POST['precioDesde'];
			$limit = 500;
		}


		if(!empty($_POST['precioCuota']))
		{
			$precioCuota = $_POST['precioCuota'];
			$limit = 500;
		}



		if($tipoPlan != 'Economicos')
		{
			$nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], $limit, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota);
		}
		else
		{

			$nuevos = Publicaciones::findMasEconomicosByConceAndFiltro(Yii::app()->params['conce'], $limit, $valorMax, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota);

		}


		if($nuevos['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);

		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];
		$vista = 'Galeria';


		$this->renderPartial('_nuevosGaleria', array('nuevos'=>$destacados,
			                                 'total'=>$total,
			                                 'pages'=>$pages,
			                                 'tipo'=>$tipoPlan,
			                                 'vista'=>$vista), false, true);
	}






	public function actionAjaxNuevosListaPartial()
	{

		/*Creo los arrays que cargan los filtros para agregarlos a la query de usqueda
		solo si existen o estan con datos*/
		$arrMarcas = array();
		$arrCateg = array();
		$arrPlanes = array();
		$precioDesde = '';
		$precioCuota = '';
		$limit = 12;
		$tipoPlan = Yii::app()->session['tipoPlan'];
		$valorMax = Yii::app()->params['valorMax']; //esto solo se usa para planes economicos



		if(!empty($_POST['marca']))
		{
			$arrMarcas = $_POST['marca'];
			Yii::app()->session['marca'] = $arrMarcas;
			$limit = 500;
		}


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
			$limit = 500;
		}
		else
		{
			switch ($tipoPlan) {

                            case 'Utilitarios':
                                    $arrCateg = array('40', '45');
                                break;

                            case 'Autos':
                                    $arrCateg = array('0');
                                break;

                            case 'Familiar':
                                    $arrCateg = array('5');
                                break;

                            case 'Camioneta':
                                    $arrCateg = array('10','20');
                                break;

                            case 'Pick-Up':
                                    $arrCateg = array('30');
                                break;

                            default:
                                break;
                        }

		}

		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
			$limit = 500;
		}

		if(!empty($_POST['precioDesde']))
		{
			$precioDesde = $_POST['precioDesde'];
			$limit = 500;
		}


		if(!empty($_POST['precioCuota']))
		{
			$precioCuota = $_POST['precioCuota'];
			$limit = 500;
		}


                if($tipoPlan== 'planes_ahorro'){

                    $nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], 500, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota, false);

                }elseif($tipoPlan != 'Economicos')
		{
			$nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], $limit, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota);
		}
		else
		{

			$nuevos = Publicaciones::findMasEconomicosByConceAndFiltro(Yii::app()->params['conce'], $limit, $valorMax, $arrMarcas, $arrCateg, $arrPlanes, $precioDesde, $precioCuota);

		}

		if($nuevos['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);

		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];
		$vista = 'Lista';


		$this->renderPartial('_nuevosLista', array('nuevos'=>$destacados,
			                                 'total'=>$total,
			                                 'pages'=>$pages,
			                                 'tipo'=>$tipoPlan,
			                                 'vista'=>$vista), false, true);
	}




	/*IMPORTANTE: La vista de Listado y Galeria de Utilitarios es la misma que la de nuevos*/
	public function actionPlanesUtilitarios( $tipoPlan = 'Utilitarios')
	{

            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
                
                $GLOBALS['title'] = "Planes de Utiltarios en Cuotas - Autos en Cuotas".$msg;
                $GLOBALS['meta'] = "Planes de Utilitarios 0Km en cuotas. Camionetas, Furgones, Pickups, Camiones, Combis y Minibus. Encontrá tu 0 Km en Cuotas".$msg;
                
                
		$model = new Consultas();
		Yii::app()->user->setFlash('buttonDisabled', true);
                switch ($tipoPlan) {

                    case 'Utilitarios':
                            $arrCateg = array('40', '45');
                            Yii::app()->session['tipoPlan'] = 'Utilitarios';
                        break;

                    case 'Autos':
                            $arrCateg = array('0');
                            Yii::app()->session['tipoPlan'] = 'Autos';
                        break;

                    case 'Familiar':
                            $arrCateg = array('5');
                            Yii::app()->session['tipoPlan'] = 'Familiar';
                        break;

                    case 'Camioneta':
                            $arrCateg = array('10','20');
                            Yii::app()->session['tipoPlan'] = 'Camioneta';
                        break;

                    case 'Pick-Up':
                            $arrCateg = array('30');
                            Yii::app()->session['tipoPlan'] = 'Pick-Up';
                        break;


                    default:
                            $arrCateg = array('40', '45');
                            Yii::app()->session['tipoPlan'] = 'Utilitarios';
                        break;
                }


		$nuevos = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], 12, '', $arrCateg);

		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];

		/*Cargo el filtro del costado con los datos que existen en la base, en este caso le paso a la
		funcion del filtro un array con categroias precargadas para que ya las filtre como utilitarios*/
		$filtros = Publicaciones::findFiltroByEstado(Yii::app()->params['conce'], $arrCateg);
		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];

		//Obtengo el menor y el mayor precio de venta y la cuota para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);

		$cuotas = $filtros['cuotas'];
		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);

		$urlAjaxList = Yii::app()->createUrl('ajax-nuevos-lista');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-nuevos-gal');

		$vista = 'Galeria';


		/*Valido el form por ajax y despues lo valido por php si esta ok lo guardo en
		la base del sitio y tambien en la del delivery asi como lo envio por email. */
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

		$this->render('planes_nuevos', array('nuevos'=>$destacados,
			                                 'total'=>$total,
		                                 	 'pages'=>$pages,
		                                     'urlList'=>$urlAjaxList,
		                                     'urlGal'=>$urlAjaxGal,
		                                     'marcas'=>$marcas,
		                                     'planes'=>$planes,
		                                     'categorias'=>$categorias,
		                                     'precioMin'=>$precioMenor,
		                                     'precioMax'=>$precioMayor,
		                                     'cuotaMin'=>$cuotaMin,
		                                     'cuotaMax'=>$cuotaMax,
		                                     'vista'=>$vista,
		                                     'tipo'=>$tipoPlan,
		                                     'model'=>$model));
	}






	/*IMPORTANTE: La vista de Listado y Galeria de Utilitarios es la misma que la de nuevos*/
	public function actionPlanesEconomicos()
	{

            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }
                
                $GLOBALS['title'] = "Planes Económicos".$msg." para Autos 0 Km en Cuotas";
                $GLOBALS['meta'] = "Encontrá los planes más baratos para Autos".$msg." 0 Km en cuotas bajas al 0% Todos los modelos con los mejores precios";
                
                
                
		$model = new Consultas();
		Yii::app()->user->setFlash('buttonDisabled', true);
		$valorMax = Yii::app()->params['valorMax'];
		Yii::app()->session['tipoPlan'] = 'Economicos';

		$nuevos = Publicaciones::findMasEconomicosByConceAndFiltro(Yii::app()->params['conce'], 12, $valorMax);

		$destacados = $nuevos['publicaciones'];
		$total = $nuevos['total'];
		$pages =$nuevos['pages'];

		/*Cargo el filtro del costado con los datos que existen en la base, en este caso le paso a la
		funcion del filtro un array con categroias precargadas para que ya las filtre como utilitarios*/
		$filtros = Publicaciones::findFiltroByEstado(Yii::app()->params['conce']);
		$marcas = $filtros['marcas'];
		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];

		//Obtengo el menor y el mayor precio de venta y la cuota para cargar el filtro
		$precio = $filtros['precios'];
		$precioMayor = max($precio);
		$precioMenor = min($precio);

		$cuotas = $filtros['cuotas'];
		$cuotaMin = min($cuotas);
		$cuotaMax = max($cuotas);

		$urlAjaxList = Yii::app()->createUrl('ajax-nuevos-lista');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-nuevos-gal');

		$vista = 'Galeria';


		/*Valido el form por ajax y despues lo valido por php si esta ok lo guardo en
		la base del sitio y tambien en la del delivery asi como lo envio por email. */
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

		$this->render('planes_nuevos', array('nuevos'=>$destacados,
			                                 'total'=>$total,
		                                 	 'pages'=>$pages,
		                                     'urlList'=>$urlAjaxList,
		                                     'urlGal'=>$urlAjaxGal,
		                                     'marcas'=>$marcas,
		                                     'planes'=>$planes,
		                                     'categorias'=>$categorias,
		                                     'precioMin'=>$precioMenor,
		                                     'precioMax'=>$precioMayor,
		                                     'cuotaMin'=>$cuotaMin,
		                                     'cuotaMax'=>$cuotaMax,
		                                     'vista'=>$vista,
		                                     'tipo'=>'Economicos',
		                                     'model'=>$model));
	}







	public function actionAjaxEnviarConsultasModal()
	{
            session_start();
            $model = new Consultas();

            if(isset($_POST['Consultas'])){


        	$idUpdate = $_POST['Consultas']['id'];
        	$model->attributes = $_POST['Consultas'];




        	if(empty($idUpdate))
        	{
                    $model->consulta_cons = 'sin-consulta';
                    //$model->email_cons ='sinemail@sinemail.com';
        	}
                /*
                echo '<pre>';
                var_dump($model->attributes);
                var_dump($model->validate());
                echo '</pre>';//die();
                */
        	if($model->validate())
        	{

                    // campos del formulario
                    $c = $_POST['Consultas'];

                    if(isset($_SESSION['id_prev'])){
                        $dbh = new PDO('mysql:host=deliveryaec.com;dbname=delivery_manadelivery', 'delivery_freddy', 'MyFdiPw_616', array( PDO::ATTR_PERSISTENT => false));
                        $stmt = $dbh->prepare(" UPDATE clientes SET ciudad = '".$c['provincia_cons']."',telCliente2 = '".$c['cel_cons']."' WHERE idCliente ='".$_SESSION['id_prev']['id_cliente']."' ");
                        $stmt->execute();
                        $stmt = $dbh->prepare(" UPDATE consultas SET mensaje = '".$c['consulta_cons']."' WHERE idConsulta ='".$_SESSION['id_prev']['id_consulta']."' ");
                        $stmt->execute();
                        unset($_SESSION['id_prev']);
                    } else {
                        //enviarConsultaDelivery(       $email,         $telefono,      $telefono2,     $nombre,        $ciudad,                 $conce,        $modelo,            $  origen, $mensaje, $ip, $listadoModelos = '', $listadoMarcas = '')
                        $this->enviarConsultaDelivery($c['email_cons'], $c['tel_cons'], $c['cel_cons'], $c['nombre_cons'], $c['provincia_cons'], $c['conce_id'], $c['publicacion_id'], '19', $c['consulta_cons'], $_SERVER['REMOTE_ADDR'], $listadoModelos = '', $listadoMarcas = '');
                    }
                    $model = new Consultas();
                    echo CJSON::encode(array('id'=>$user->id, 'Ok'=>true, 'url'=>Yii::app()->createUrl('contacto-ok')));
                    /*if(empty($idUpdate))
                    {
        			if($model->save())
	    			{


	    				$id = $model->id;
	    				echo CJSON::encode(array('id'=>$id, 'Ok'=>false));
	    			}
                    }
        		else
        		{
        			$user = Consultas::model()->findByPk($idUpdate);
        			$user->email_cons = $model->email_cons;
        			$user->consulta_cons = $model->consulta_cons;

        			if($user->update())
        			{
        				/*$ch = curl_init('http://www.autosencuotas.com/enviarConsulta.php');
						curl_setopt ($ch, CURLOPT_POST, 1);
						curl_setopt ($ch, CURLOPT_POSTFIELDS, "parametro1=valor1&parametro2=valor2");
						curl_setopt($ch,CURLOPT_RETURNTRANSFER,true)
						$respuesta = curl_exec ($ch);
						$error = curl_error($ch);
						curl_close ($ch);*/

						/*$model = new Consultas();
						echo CJSON::encode(array('id'=>$user->id, 'Ok'=>true, 'url'=>Yii::app()->createUrl('contacto-ok')));
        			}

        		}*/
    		}
    		else
    		{
                    $id = $model->id;
                    $c = $_POST['Consultas'];
                    
                    if(!$_SESSION['id_prev']){
                    
                        $_SESSION['id_prev'] = $this->enviarConsultaDelivery($c['email_cons'], $c['tel_cons'], $c['cel_cons'], $c['nombre_cons'], $c['provincia_cons'], $c['conce_id'], $c['publicacion_id'], '19', $c['consulta_cons'], $_SERVER['REMOTE_ADDR'], $listadoModelos = '', $listadoMarcas = '');
                    }
                    
                    echo CActiveForm::validate($model);
                    //echo CActiveForm::validate($model);
                    //echo CJSON::encode($model);
                    //echo CJSON::encode(array('id'=>$id, 'Ok'=>false));
    		}
    	}
	}






	public function actionAjaxEnviarConsultas()
	{
		$model = new Consultas();

             
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta-detalle')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Consultas']))
        {

        	$model->attributes = $_POST['Consultas'];

        	if($model->validate())
        	{
                    // campos del formulario
                    $c = $_POST['Consultas'];

    			if($model->save())
    			{

                        $this->enviarConsultaDelivery($c['email_cons'], $c['tel_cons'], $c['cel_cons'], $c['nombre_cons'], $c['provincia_cons'], $c['conce_id'], $c['publicacion_id'], '19', $c['consulta_cons'], $_SERVER['REMOTE_ADDR'], $listadoModelos = '', $listadoMarcas = '');


                        /*$ch = curl_init('http://www.autosencuotas.com/enviarConsulta.php');
                                curl_setopt ($ch, CURLOPT_POST, 1);
                                curl_setopt ($ch, CURLOPT_POSTFIELDS, "parametro1=valor1&parametro2=valor2");
                                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true)
                                $respuesta = curl_exec ($ch);
                                $error = curl_error($ch);
                                curl_close ($ch);*/

                            $model = new Consultas();
                            echo CJSON::encode(array('Ok'=>true, 'url'=>Yii::app()->createUrl('contacto-ok')));

    			}
        		else
	    		{
	    			$this->redirect(Yii::app()->createUrl('error-404'));
	    		}
    		}
    		else
    		{
    			die(var_dump($model->getErrors()));
    		}
    	}
	}





	public function actionPlanesMarcas($slug)
	{

		$model = new Consultas();
                
                $slug = str_replace('-car-group', '', $slug);

		Yii::app()->params['slug'] = $slug;
		Yii::app()->session['tipoPlan'] = 'Planes de Ahorro';
		Yii::app()->user->setFlash('sin-resultados', false);

		$publicaciones = Publicaciones::findByNombrePlanAndIdConce(Yii::app()->params['conce'], 500, $slug);

		$destacados = $publicaciones['publicaciones'];
		$total = $publicaciones['total'];
		$pages =$publicaciones['pages'];

                if($GLOBALS['site']->descripcion_prov!=""){
                    $mensa = " en ".$GLOBALS['site']->descripcion_prov;
                } else {
                    $mensa = " en Argentina";
                }

                $GLOBALS['title'] = $destacados[0]->modelos->marcas->nombre_plan_marca.$mensa.' - Autos en Cuotas - Planes de Ahorro 0 KM';
		$GLOBALS['meta'] = $destacados[0]->modelos->marcas->nombre_plan_marca.$mensa.' Planes de Ahorro para tu 0 KM. Autos en cuotas. Financiado al 0% en Argentina.';
                /*Cargo el filtro del costado con los datos que existen en la base, en este caso le paso a la
		funcion del filtro un array con categroias precargadas para que ya las filtre como utilitarios*/
		$filtros = Publicaciones::findFiltroByNombrePlan(Yii::app()->params['conce'], $slug);

		$planes = $filtros['planes'];
		$categorias = $filtros['categ'];


                $precio = $filtros['precios'];

                if(is_array($precio) and count($precio)){
                    $precioMayor = max($precio);
                    $precioMenor = min($precio);
                }

		$urlAjaxList = Yii::app()->createUrl('ajax-planesmarca-lista');
		$urlAjaxGal =  Yii::app()->createUrl('ajax-planesmarca-gal');

		$vista = 'Galeria';




		/*Valido el form por ajax y despues lo valido por php si esta ok lo guardo en
		la base del sitio y tambien en la del delivery asi como lo envio por email. */
		if(isset($_POST['ajax']) && $_POST['ajax']==='form-consulta')
                {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                }

		$this->render('planes_listado', array('publicaciones'=>$destacados,
			                                  'total'=>$total,
			                                  'pages'=>$pages,
			                                  'plan'=>$slug,
			                                  'urlList'=>$urlAjaxList,
		                                      'urlGal'=>$urlAjaxGal,
		                                      'marcas'=>'',
                                                      'precioMin'=>$precioMenor,
                                                      'precioMax'=>$precioMayor,
		                                      'planes'=>$planes,
		                                      'categorias'=>$categorias,
		                                      'vista'=>$vista,
		                                      'tipo'=>Yii::app()->session['tipoPlan'],
		                                      'model'=>$model,
		                                      'slug'=>$slug,
                                                      'mensa'=>$mensa));
	}




	public function actionAjaxPlanesMarcasGalPartial()
	{


		$arrCateg = array();
		$arrPlanes = array();
		$precioDesde = '';
		$precioCuota = '';
		$tipoPlan = Yii::app()->session['tipoPlan'];
		$limit = 500;
		$slug = $_POST['slug'];
		Yii::app()->user->setFlash('sin-resultados', false);


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
		}


                if(!empty($_POST['precioDesde'])){
                    $hasta = $_POST['precioDesde'];
                }


		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
		}

		$planesMarcas = Publicaciones::findByNombrePlanAndIdConce(Yii::app()->params['conce'], $limit, $slug, $arrCateg, $arrPlanes, $hasta);

		if($planesMarcas['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);


		$destacados = $planesMarcas['publicaciones'];
		$total = $planesMarcas['total'];
		$pages =$planesMarcas['pages'];
		$vista = 'Galeria';

		$this->renderPartial('_planesMarcasGaleria',   array('publicaciones'=>$destacados,
							                                 'total'=>$total,
							                                 'pages'=>$pages,
							                                 'tipo'=>$tipoPlan,
							                                 'vista'=>$vista), false, true);
	}




	public function actionAjaxPlanesMarcasListaPartial()
	{

		$arrCateg = array();
		$arrPlanes = array();
		$precioDesde = '';
		$precioCuota = '';
		$tipoPlan = Yii::app()->session['tipoPlan'];
		$limit = 50;
		$slug = $_POST['slug'];
		Yii::app()->user->setFlash('sin-resultados', false);


		if(!empty($_POST['categ']))
		{
			$arrCateg = $_POST['categ'];
			Yii::app()->session['categ'] = $arrCateg;
		}


		if(!empty($_POST['plan']))
		{
			$arrPlanes = $_POST['plan'];
			Yii::app()->session['plan'] = $arrPlanes;
		}

                if(!empty($_POST['precioDesde'])){
                    $hasta = $_POST['precioDesde'];
                }



		$planesMarcas = Publicaciones::findByNombrePlanAndIdConce(Yii::app()->params['conce'], $limit, $slug, $arrCateg, $arrPlanes, $hasta);


		if($planesMarcas['total'] == 0)
			Yii::app()->user->setFlash('sin-resultados', true);


		$destacados = $planesMarcas['publicaciones'];
		$total = $planesMarcas['total'];
		$pages =$planesMarcas['pages'];
		$vista = 'Lista';


		$this->renderPartial('_planesMarcasListado',   array('publicaciones'=>$destacados,
							                                 'total'=>$total,
							                                 'pages'=>$pages,
							                                 'tipo'=>$tipoPlan,
							                                 'vista'=>$vista), false, true);
	}






	public function actionPlanesDetalle($marcaplan, $slug, $plan)
	{

		$model = new Consultas();
                
		$parameter = TipoPlan::generarSlug($slug, $plan);  
                $parameter = str_replace('agile', 'agile-LS', $parameter);
		$detalles = Publicaciones::findByDetalleSlugAndConce(Yii::app()->params['conce'], $parameter);
                if(!$detalles){
                    $this->redirect(Yii::app()->createUrl('404'));
                }
                $detalles->vistasAenC = $detalles->vistasAenC + 1;               
                $detalles->update();
		//Obtengo si ya tiene una cookie de este modelo para no dejarlo votar
		$cookieVoto = Yii::app()->request->cookies['modelo-'.$detalles->modelos->idModelo];
		$cookieRaty = Yii::app()->request->cookies['raty-'.$detalles->modelos->idModelo];
		//Obtengo el Raty de las estrellas
		$raty = Raty::findRatyByIdModelo($detalles->modelos->idModelo);
		$review = Raty::findRatyByIdModeloTot($detalles->modelos->idModelo);


		if(empty($cookieVoto))
		{
			$megustaClass = 'fa fa-thumbs-up  circulo';
			$nogustaClass = 'fa fa-thumbs-down circulo';
		}
		else
		{
			$megustaClass = 'fa fa-heart circulovp';
			$nogustaClass = 'fa fa-check circulo';
		}



		//Obtengo si existe la cookie de raty de estrella para no dejarlo calificar
		if(!empty($cookieRaty))
		{
			$ratyDisabled = true;
			$title = '¡Ya calificaste este modelo!';
		}
		else
		{
			$ratyDisabled = false;
			$title = 'Votá este modelo';
		}


		//Obtengo la cuota pura segun el plan
		$valorAuto = $detalles->modelos->precio0kmModelo;
		$tipoPlan = $detalles->tipoPlan;
		$cantCuotas = 84;

		if($tipoPlan == '100%')
		{
			$cuotaPura = $valorAuto / $cantCuotas;
		}
		else
		{
			$plan = substr($tipoPlan, 0,2);
			$cuotaPura = ($valorAuto * $plan) / 100;
			$cuotaPura = $cuotaPura / $cantCuotas;
			$cuotaPura = round($cuotaPura);
		}


		//Genero la cuota descuento
		$plan = Publicaciones::findPlanCuotasById($detalles->idPublicacion);

                $relacionados = Publicaciones::findRelacionadoFiltro($detalles->idPublicacion,$detalles->modelos->idMarcaModelo,Yii::app()->params['conce']);

		$descuento = $detalles->descuentoSuscrip;

		if(is_numeric($descuento))
		{
			$cuotaDescuento = $plan['valor1'] + $descuento;
			$cuotaDescuento = round($cuotaDescuento);
		}
		else
		{
			$porcentaje = explode('%', $descuento);
		 	$porcentaje = ($plan['valor1'] * $porcentaje[0]) / 100;
		 	$cuotaDescuento = $plan['valor1'] + $porcentaje;
		 	$cuotaDescuento = round($cuotaDescuento);
		}

                $GLOBALS['img_facebook'] = "https://www.".$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl."/img/modelos/".Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).".jpg";
                $GLOBALS['meta-price'] = str_replace(',', '.',number_format($cuotaPura));
								$GLOBALS['nombre-marca'] = $detalles->modelos->marcas->nombre_marca ;
								$GLOBALS['nombre-modelo'] = $detalles->modelos->nombreModelo;

		//Ahorras
		$ahorro = round($cuotaDescuento - $plan['valor1']);


		$cuotaPura = '$'. str_replace(',', '.',number_format($cuotaPura));
		$cuotaDescuento = '$'. str_replace(',', '.',number_format($cuotaDescuento));
		$ahorro = '$'. str_replace(',', '.',number_format($ahorro));
                $colores = explode('--', $detalles->modelos->coloresModelo);
                $tags = explode(',', $detalles->modelos->tagsModelo);


                $publicaciones = Publicaciones::findFiltroByIdModelo(Yii::app()->params['conce'],$detalles->modelos->idModelo);

                $id_conce = Concesionarios::idConceByMarcaId($detalles->modelos->marcas->id);

                $asesores = $this->asesoresOnline($id_conce);
                
                if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " en ".$GLOBALS['site']->descripcion_prov;
                } else {
                    $msg = "";
                }

                $GLOBALS['title'] = "Plan ".$detalles->modelos->marcas->nombre_marca.' '.$detalles->modelos->nombreModelo.$msg.' en cuotas sin interés. Plan Nacional '.$detalles->modelos->marcas->nombre_marca.'  '.$detalles->tipoPlan." financiado  - Autos en cuotas ";

                $GLOBALS['meta'] = 'Plan '.$detalles->modelos->marcas->nombre_marca.' '.$detalles->modelos->nombreModelo.$msg.' - Plan Nacional '.$detalles->modelos->marcas->nombre_marca.'  '.$detalles->tipoPlan.' financiado en cuotas desde '.Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan).' sin interés. '.$detalles->modelos->marcas->nombre_marca.' en Argentina - Planes de ahorro 0 KM';

		$this->render('planes_detalle', array('detalles'=>$detalles,
			                                  'cuotaPura'=>$cuotaPura,
			                                  'cuotaDescuento'=>$cuotaDescuento,
			                                  'ahorro'=>$ahorro,
			                                  'model'=>$model,
			                                  'megustaClass'=>$megustaClass,
			                                  'nogustaClass'=>$nogustaClass,
			                                  'raty'=>$raty,
			                                  'ratyDisabled'=>$ratyDisabled,
			                                  'title'=>$title,
                                                          'colores'=>$colores,
                                                          'relacionados'=>$relacionados,
                                                          'publicaciones'=>$publicaciones,
                                                          'tags'=>$tags,
                                                          'asesores'=>$asesores,
                                                          'review'=>$review,
                                                          'msg'=>$msg,
                                                          'descripcion'=>$msg,
                                                          'favorito' => false));

	}
        
	public function actionPlanesDetalleAMT($marcaplan, $slug, $plan)
	{

		$model = new Consultas();
                
		$parameter = TipoPlan::generarSlug($slug, $plan);  
                $parameter = str_replace('agile', 'agile-LS', $parameter);
		$detalles = Publicaciones::findByDetalleSlugAndConce(Yii::app()->params['conce'], $parameter);
                if(!$detalles){
                    $this->redirect(Yii::app()->createUrl('404'));
                }
                $detalles->vistasAenC = $detalles->vistasAenC + 1;               
                $detalles->update();
		//Obtengo si ya tiene una cookie de este modelo para no dejarlo votar
		$cookieVoto = Yii::app()->request->cookies['modelo-'.$detalles->modelos->idModelo];
		$cookieRaty = Yii::app()->request->cookies['raty-'.$detalles->modelos->idModelo];
		//Obtengo el Raty de las estrellas
		$raty = Raty::findRatyByIdModelo($detalles->modelos->idModelo);
		$review = Raty::findRatyByIdModeloTot($detalles->modelos->idModelo);


		if(empty($cookieVoto))
		{
			$megustaClass = 'fa fa-thumbs-up  circulo';
			$nogustaClass = 'fa fa-thumbs-down circulo';
		}
		else
		{
			$megustaClass = 'fa fa-heart circulovp';
			$nogustaClass = 'fa fa-check circulo';
		}



		//Obtengo si existe la cookie de raty de estrella para no dejarlo calificar
		if(!empty($cookieRaty))
		{
			$ratyDisabled = true;
			$title = '¡Ya calificaste este modelo!';
		}
		else
		{
			$ratyDisabled = false;
			$title = 'Votá este modelo';
		}


		//Obtengo la cuota pura segun el plan
		$valorAuto = $detalles->modelos->precio0kmModelo;
		$tipoPlan = $detalles->tipoPlan;
		$cantCuotas = 84;

		if($tipoPlan == '100%')
		{
			$cuotaPura = $valorAuto / $cantCuotas;
		}
		else
		{
			$plan = substr($tipoPlan, 0,2);
			$cuotaPura = ($valorAuto * $plan) / 100;
			$cuotaPura = $cuotaPura / $cantCuotas;
			$cuotaPura = round($cuotaPura);
		}


		//Genero la cuota descuento
		$plan = Publicaciones::findPlanCuotasById($detalles->idPublicacion);

                $relacionados = Publicaciones::findRelacionadoFiltro($detalles->idPublicacion,$detalles->modelos->idMarcaModelo,Yii::app()->params['conce']);

		$descuento = $detalles->descuentoSuscrip;

		if(is_numeric($descuento))
		{
			$cuotaDescuento = $plan['valor1'] + $descuento;
			$cuotaDescuento = round($cuotaDescuento);
		}
		else
		{
			$porcentaje = explode('%', $descuento);
		 	$porcentaje = ($plan['valor1'] * $porcentaje[0]) / 100;
		 	$cuotaDescuento = $plan['valor1'] + $porcentaje;
		 	$cuotaDescuento = round($cuotaDescuento);
		}

                $GLOBALS['img_facebook'] = "https://www.".$_SERVER['HTTP_HOST'].Yii::app()->request->baseUrl."/img/modelos/".Modelo::getNombreImagenGr($detalles->modelos->nombreDirectorio).".jpg";
                $GLOBALS['meta-price'] = str_replace(',', '.',number_format($cuotaPura));
								$GLOBALS['nombre-marca'] = $detalles->modelos->marcas->nombre_marca ;
								$GLOBALS['nombre-modelo'] = $detalles->modelos->nombreModelo;

		//Ahorras
		$ahorro = round($cuotaDescuento - $plan['valor1']);


		$cuotaPura = '$'. str_replace(',', '.',number_format($cuotaPura));
		$cuotaDescuento = '$'. str_replace(',', '.',number_format($cuotaDescuento));
		$ahorro = '$'. str_replace(',', '.',number_format($ahorro));
                $colores = explode('--', $detalles->modelos->coloresModelo);
                $tags = explode(',', $detalles->modelos->tagsModelo);


                $publicaciones = Publicaciones::findFiltroByIdModelo(Yii::app()->params['conce'],$detalles->modelos->idModelo);

                $id_conce = Concesionarios::idConceByMarcaId($detalles->modelos->marcas->id);

                $asesores = $this->asesoresOnline($id_conce);
                
                if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " en ".$GLOBALS['site']->descripcion_prov;
                } else {
                    $msg = "";
                }

                $GLOBALS['title'] = "Plan ".$detalles->modelos->marcas->nombre_marca.' '.$detalles->modelos->nombreModelo.$msg.' en cuotas sin interés. Plan Nacional '.$detalles->modelos->marcas->nombre_marca.'  '.$detalles->tipoPlan." financiado  - Autos en cuotas ";

                $GLOBALS['meta'] = 'Plan '.$detalles->modelos->marcas->nombre_marca.' '.$detalles->modelos->nombreModelo.$msg.' - Plan Nacional '.$detalles->modelos->marcas->nombre_marca.'  '.$detalles->tipoPlan.' financiado en cuotas desde '.Modelo::findCuotaMenorByTipoPlan($detalles->tipoPlan, $detalles->idModeloPlan).' sin interés. '.$detalles->modelos->marcas->nombre_marca.' en Argentina - Planes de ahorro 0 KM';
                $GLOBALS['amp'] = true;
		$this->render('planes_detalle_amt', array('detalles'=>$detalles,
			                                  'cuotaPura'=>$cuotaPura,
			                                  'cuotaDescuento'=>$cuotaDescuento,
			                                  'ahorro'=>$ahorro,
			                                  'model'=>$model,
			                                  'megustaClass'=>$megustaClass,
			                                  'nogustaClass'=>$nogustaClass,
			                                  'raty'=>$raty,
			                                  'ratyDisabled'=>$ratyDisabled,
			                                  'title'=>$title,
                                                          'colores'=>$colores,
                                                          'relacionados'=>$relacionados,
                                                          'publicaciones'=>$publicaciones,
                                                          'tags'=>$tags,
                                                          'asesores'=>$asesores,
                                                          'review'=>$review,
                                                          'msg'=>$msg,
                                                          'descripcion'=>$msg,
                                                          'favorito' => false));

	}


	public function actionPlanesDetalleReventa($marcaplan, $slug, $plan, $id)
	{

                $detalle = PublicacionesAC::findAdjudicadosComenzadosID($id);

                // variable para validar la marca
                $m1 = $detalle['detalle'][0]->modelos->marcas->slug;
                // variable para validar la slug
                $s2 = strtolower(str_replace(' ', '-',$detalle['detalle'][0]->modelos->nombreModelo));
                // variable para validar la $plan
                $p = 'plan-ahorro-'.TipoPlan::generarSlugTipoPlan($detalle['detalle'][0]->tipoAC);

                if($detalle['detalle'][0]->estadoPlan==2){
                    $tipo = 'planes-adjudicados';
                    $nombre = 'Planes Adjudicados';
                } else {
                    $tipo = 'planes-empezados';
                    $nombre = 'Planes Comenzados';
                }

                $GLOBALS['title'] = $nombre." ".$detalle['detalle'][0]->modelos->marcas->nombre_plan_marca.' '.$detalle['detalle'][0]->modelos->nombreModelo.' .Financia '.$detalle['detalle'][0]->tipoAC."  - Plan de Ahorro Argentina";
                $GLOBALS['meta'] = $nombre." ".$detalle['detalle'][0]->modelos->marcas->nombre_plan_marca." ".$detalle['detalle'][0]->modelos->nombreModelo." en Oferta. Financiado en ".$detalle['detalle'][0]->tipoAC." en Cuotas sin interés. Consultá ahora";
                
                if($m1 == $marcaplan and $s2 == $slug and $p == $plan){
                    $this->render('planes_detalle_reventa', array('publicacion'=>$detalle['detalle'][0],'tipo_url'=>$tipo, 'nombre_url' => $nombre));
                }
	}



	public function actionComparadorPlanes($p = '' , $p1 = '', $p2 = '')
	{
            if($p!=''){
                $p = str_replace('-_-', '.', $p);
            }
            
            if($p1!=''){
                $p1 = str_replace('-_-', '.', $p1);
            }
            
            if($p2!=''){
                $p2 = str_replace('-_-', '.', $p2);
            }
            
            if($GLOBALS['site']->descripcion_prov!=""){
                    $msg = " en ".$GLOBALS['site']->descripcion_prov;
            } else {
                    $msg = "";
            }

            $GLOBALS['title'] = "Comparador de Planes".$msg." de Ahorro para tu 0Km ";
            $GLOBALS['meta'] = "Compará tu Plan".$msg." de Auto 0Km en cuotas - Planes de ahorro en Autos en Cuotas. Elegí entre las marcas y modelos 0Km para comparar. Tu Auto en cuotas, simple.";
            // si esta determinada alguna publicacion, la va a establecer para poder enviarla a la vista
            if($p!=''){
                $mod = explode('_', $p);
                $parameter = TipoPlan::generarSlug($mod[1], $mod[2]);
		$det1 = Publicaciones::findByDetalleSlugAndConce(Yii::app()->params['conce'], $parameter);
                //variable que determina el id de la publicacion
                $d = $det1->idPublicacion;
            }

            // si esta determinada alguna publicacion, la va a establecer para poder enviarla a la vista
            if($p1!=''){
                //variable que determina el id de la publicacion
                $mod = explode('_', $p1);
                $parameter = TipoPlan::generarSlug($mod[1], $mod[2]);
		$det1 = Publicaciones::findByDetalleSlugAndConce(Yii::app()->params['conce'], $parameter);
                //variable que determina el id de la publicacion
                $d1 = $det1->idPublicacion;
            }

            // si esta determinada alguna publicacion, la va a establecer para poder enviarla a la vista
            if($p2!=''){
                //variable que determina el id de la publicacion
                $mod = explode('_', $p2);
                $parameter = TipoPlan::generarSlug($mod[1], $mod[2]);
		$det1 = Publicaciones::findByDetalleSlugAndConce(Yii::app()->params['conce'], $parameter);
                //variable que determina el id de la publicacion
                $d2 = $det1->idPublicacion;
            }


            $this->render('comparar_planes',array('publicacion1'=>$d,'publicacion2'=>$d1,'publicacion3'=>$d2 ));
	}


        // establece los tipos de planes que tiene el modelo, en principio de usa por ajax
        public function actionAjaxPlanesComparador($id_div = '')
	{

            $idModelo = $_POST['modelo'];
            $idDiv = $_POST['idDiv'];

            if($idModelo==''){
                return false;
            }

            $publicaciones = Publicaciones::findFiltroByIdModelo(Yii::app()->params['conce'],$idModelo);




            if(count($publicaciones)){

                $html = '<img src="'.Yii::app()->request->baseUrl.'/img/cerrarGris.png" width="14" height="15" id="cerrarComparacion" onclick="actions.getMarcas(\''.$idDiv.'\');">
                         <p class="tituloComparaorBoton">Seleccionar Plan ('.$publicaciones[0]->modelos->marcas->nombre_plan_marca.' '.$publicaciones[0]->modelos->nombreModelo.')</p>
                                    <form action="?" id="formSelect"> ';

                if(count($publicaciones)==1){
                    //$html .= ' Datos del modelo ';

                    $this->actionAjaxSelectorPlan($publicaciones[0]->idPublicacion,$idDiv);
                    exit();
                } else {

                    foreach ( $publicaciones as $mi_publi ){


                        $html .= '<div class="checkbox">
                                    <label>
                                        <input type="checkbox" onclick="actions.selectorPlan('.$mi_publi->idPublicacion.',\''.$idDiv.'\');" > Plan '.$mi_publi->tipoPlan.'
                                    </label>
                                </div>';
                    }

                }
            }

            $html .= '</form>';

            echo CJSON::encode($html);

	}


        public function actionAjaxSelectorPlan($modelo = '', $div = '')
	{

            // si cuenta $_POST, y existe id_publicacion
            if(isset($_POST['publicacion'])){
                $idModelo = $_POST['publicacion'];
                $idDiv = $_POST['idDiv'];
            } else {
                $idModelo = $modelo;
                $idDiv = $div;
            }

            if($idModelo==''){
                return false;
            }

            $publicacion = Publicaciones::findPlanById($idModelo);

            $plan = Publicaciones::findPlanCuotasById($publicacion->idPublicacion);

            $descuento = $publicacion->descuentoSuscrip;

            if(is_numeric($descuento))
            {
                    $cuotaDescuento = $plan['valor1'] + $descuento;
                    $cuotaDescuento = round($cuotaDescuento);
            }
            else
            {
                    $porcentaje = explode('%', $descuento);
                    $porcentaje = ($plan['valor1'] * $porcentaje[0]) / 100;
                    $cuotaDescuento = $plan['valor1'] + $porcentaje;
                    $cuotaDescuento = round($cuotaDescuento);
            }


            //Obtengo la cuota pura segun el plan
            $valorAuto = $publicacion->modelos->precio0kmModelo;
            $tipoPlan = $publicacion->tipoPlan;
            $cantCuotas = 84;

            if($tipoPlan == '100%')
            {
                $cuotaPura = $valorAuto / $cantCuotas;
                $plan_c = 100;
            }
            else
            {
                $plan_c = substr($tipoPlan, 0,2);
                $cuotaPura = ($valorAuto * $plan_c) / 100;
                $cuotaPura = $cuotaPura / $cantCuotas;
                $cuotaPura = round($cuotaPura);
            }

            $lic_sug = str_replace(',', '.',number_format($valorAuto *0.3));
            $cuotaPura = str_replace(',', '.',number_format($cuotaPura));

            //Ahorras
            $ahorro = round($cuotaDescuento - $plan['valor1']);
            $ahorro = str_replace(',', '.',number_format($ahorro));

            $cont = 0;

            $html = '
                        <div id="contenidoPublicacionComparar">
                            <img src="'.Yii::app()->request->baseUrl.'/img/cerrarGris.png" width="14" style="cursor:pointer;" height="15" id="cerrarComparacion" onclick="actions.getMarcas(\''.$idDiv.'\');actions.quitarURLcomparador(\'/'.strtolower(str_replace(' ', '-',$publicacion->modelos->marcas->nombre_marca.'_'.$publicacion->modelos->nombreModelo)).'_'.TipoPlan::generarSlugTipoPlan($publicacion->tipoPlan).'\');">

                            <div class="ui-title-box col-md-12">
                                <h2 class="">'.$publicacion->modelos->marcas->nombre_marca.' '.$publicacion->modelos->nombreModelo.'</h2>
                                <img src="'.Yii::app()->request->baseUrl.'/img/marcas/logo-'.strtolower(str_replace(' ', '-',$publicacion->modelos->marcas->nombre_marca)).'.png" alt="'.$publicacion->modelos->marcas->nombre_marca.'" width="50" class="right">
                            </div>

                            <div class="ui-content-photo-pay  col-md-12">
                                <img src="'.Yii::app()->request->baseUrl.'/img/autos/'.Modelo::getNombreImagenCh($publicacion->modelos->marcas->nombre_marca,  $publicacion->modelos->nombreDirectorio).'" alt="'.$publicacion->modelos->nombreModelo.' Plan '.$publicacion->tipoPlan.'" width="225" height="150" class="">
                                <p>'.$publicacion->modelos->equipamientoModelo.'</p>
                            </div>

                            <div class="ui-content-pay  col-xs-12 col-md-12">

                                <p class="weight600 tPlan "><span class="tCuotas">Plan '.$publicacion->tipoPlan.' - 84 cuotas</span></p>

                                <p class="dCuotas even" id="precioRegular"><span id="preRegular">Precio Regular:</span> Suscripción + Cuota 1:<span class="pCuotas">$'.str_replace(',', '.',number_format($cuotaDescuento)).'</span></p>
                                <p id="precioOnline" class="dCuotas"><span id="preOnline">Precio Promo Internet:</span>'.$plan['cuota1'].'<span class="pCuotas">$'.str_replace(',', '.',number_format($plan['valor1'])).'</span></p>';
                                foreach($plan['plancuotas'] as $indice => $valor):
                                       $html.='<p class="dCuotas ';
                                            if($cont % 2 == 0) {
                                                $html.='odd';
                                            } else {
                                                $html.='even';
                                            }

                                        $html.='">Cuota '. $indice.':<span class="pCuotas ">$'. str_replace(',', '.',number_format($valor)).'</span></p>';
                                       $cont++;
                                endforeach;

                                $html .='<p class="dCuotas ';
                                if($cont % 2 == 0) {
                                            $html.='odd';
                                        } else {
                                            $html.='even';
                                        }
                                $html .='">Cuota Pura:<span class="pCuotas morocha">$'.$cuotaPura.'</span></p>
                            </div>

                            <div class="contenedorComparaciones  col-xs-12 col-md-12">
                                <div class="ui-description-plan"><div class="col-xs-6 col-sm-6 col-md-6 ui-title-comparation ">Cuanto se financia?</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 ui-value-description">El '.$plan_c.'% de la unidad</div>
                                </div><div class="ui-description-plan"><div class="col-xs-6 col-sm-6 col-md-6 ui-title-comparation ">Valor 0km?</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 ui-value-description">$'.str_replace(',', '.',number_format($valorAuto)).'</div></div>
                                <div class="ui-description-plan"><div class="col-xs-6 col-md-6 col-sm-6 ui-title-comparation ">Licitación sugerida</div>
                                <div class="col-xs-6 col-sm-6 col-md-6 ui-value-description">$'.$lic_sug.' <span class="alcaracionchin">(Corresponde al 30%)</span></div></div>
                                <div class="ui-description-plan">
                                <div class=" ui-title-comparation col-xs-6 col-md-6 col-sm-6">Cuota para adelantar?*</div>
                                <div class="ui-value-description col-xs-6 col-sm-6 col-md-6">$'.$cuotaPura.' <span class="alcaracionchin">(Cuota Pura)</span></div></div>
                                <div class="ui-description-plan">';

                                if(trim($publicacion->entrega)!=''){
                                    $entr = 'Si, en cuota '.intval(preg_replace('/[^0-9]+/', '', $publicacion->entrega), 10);
                                } else {
                                    $entr = 'No';
                                }

                                $html .= '<div class=" ui-title-comparation col-xs-6 col-md-6 col-sm-6">Entrega programada?</div><div class=" ui-value-description col-md-6 col-sm-6">'.$entr.'</div></div>';

                                $html .= '</div>';

                            $html .='
                                <ol id="contenedorBotones" class="col-xs-12 col-sm-12 col-md-12">
                                <p id="ahorra">AHORRÁS <span id="precioAhorra">$'.$ahorro.'</span><span id="aclaracionAhorra">Descuento AutosEnCuotas.com</span></p>
                                    <li style="float:left;">
                                        <a href="'.Yii::app()->createUrl($publicacion->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$publicacion->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($publicacion->tipoPlan)).'" title="'.$publicacion->modelos->nombreModelo.' '.$publicacion->tipoPlan.'" class="btn btn-success-outline">Info del Plan</a>
                                    </li>
                                    <li style="float:right;" data-nombre="'.$publicacion->modelos->nombreModelo.'" class="mostrarModeloModal">
                                        <a class="btn btn-success mostrarModeloModal"  id="mostrarModeloModal-'.$publicacion->modelos->idModelo.'" onclick="actions.modalConsulta(\''.$publicacion->modelos->idModelo.'\');"
                                            data-cuota="$'. Modelo::findCuotaMenorByTipoPlan($publicacion->tipoPlan, $publicacion->idModeloPlan).'" data-id="'.$publicacion->idModeloPlan.'"
                                            data-nombre="'.$publicacion->modelos->nombreModelo.'"
                                            data-img="'.Yii::app()->request->baseUrl.'/img/autos/'.Modelo::getNombreImagenCh($publicacion->modelos->marcas->nombre_marca,  $publicacion->modelos->nombreDirectorio).'"
                                            data-tipo="'.$publicacion->tipoPlan.'"
                                            data-publicacion="'.$publicacion->idPublicacion.'"
                                            data-nom-public="'.$tipoPlan.'"
                                            data-conce="'.Concesionarios::idConceByMarcaId($publicacion->modelos->marcas->id).'"
                                        >consultar</a>
                                    </li>
                                </ol>
                                <span class="alcaracionchin col-md-12">
                                    * Los valores son aproximados, en pesos arg y pueden variar sin previo aviso
                                </span>
                            </div>
                            <script>actions.agregarURLcomparador("/'.strtolower(str_replace(' ', '-',$publicacion->modelos->marcas->nombre_marca.'_'.$publicacion->modelos->nombreModelo)).'_'.TipoPlan::generarSlugTipoPlan($publicacion->tipoPlan).'");</script>
                        </div>
                    ';

            echo CJSON::encode($html);
        }


        public function asesoresOnline($id_conce){

            $dbh = new PDO('mysql:host=deliveryaec.com;dbname=delivery_manadelivery', 'delivery_freddy', 'MyFdiPw_616', array( PDO::ATTR_PERSISTENT => false));
            $stmt = $dbh->prepare(" SELECT online, usuario, Sexo FROM usuarios,vendedores WHERE usuarioCorrespondiente=idUsuario and enabled=1 and online='1'  AND  idConce IN ('".$id_conce."') ");
            // call the stored procedure
            $stmt->execute();
            // fetch all rows into an array.

            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt->closeCursor();

            $stmt = null;
            $dbh = null;

            return $rows;

        }

        public function actionconsultaAdjudicado(){

            // si hay datos por $_POST
            if($_POST['publicacionID']){
                // preparar mail para poder enviar
                $public = new PublicacionesAC();

                $mi_publi = $public->findAdjudicadosComenzadosID($_POST['publicacionID']);




                $publ = $mi_publi['detalle'][0];

                // obtengo el mail del reventa
                $mail_rev = $publ->reventas->emailReventa;

                $asunto = " Plan Adjudicado-Comenzado #".$publ->idPublicacionAC." ".$publ->modelos->marcas->nombre_plan_marca." ".$publ->modelos->nombreModelo." ".$publ->tipoAC;

                $mensaje = "<h1>  Consulta : ".$asunto."</h1>";
                $mensaje.= " <p> Le han realizando una consulta sobre la publicacion. </p>";
                $mensaje.= " <p> Nombre : ".$_POST['nombre']."</p>";
                $mensaje.= " <p> Email : ".$_POST['email']."</p>";
                $mensaje.= " <p> Telefono : ".$_POST['telefono']."</p>";
                $mensaje.= " <p> Celular : ".$_POST['telefono2']."</p>";
                $mensaje.= " <p> Publicacion : <a href='".$_POST['url']."' target='_blank' >".$asunto."</a></p>";
                $mensaje.= " <p> Mensaje : ".$_POST['mensaje']."</p>";
                
                $mensaje.="<br><br><br><img src='https://www.autosencuotas.com.ar/img/logo-autosencuotas.png' />";
                
                
                
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: '.$_POST['nombre'].' <'.$_POST['email'].'>' . "\r\n";
                $cabeceras .= 'From: '.$_POST['nombre'].' <'.$_POST['email'].'>' . "\r\n";
                //$cabeceras .= 'Cc: copia@mail.com' . "\r\n";
                $cabeceras1 = 'Bcc: federico@autosencuotas.com' . "\r\n";

                mail($mail_rev, $asunto, $mensaje, $cabeceras.$cabeceras1);
                ///mail('federico@autosencuotas.com', $asunto, $mensaje, $cabeceras);
                mail('mvillalba2013.02@gmail.com', $asunto, $mensaje, $cabeceras);
                $this->redirect(Yii::app()->createUrl('contacto-ok'));

            }
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
            $id_consulta = $dbh->lastInsertId();
            $stmt->closeCursor();

            $stmt = null;
            $dbh = null;
            
            return array('id_cliente'=>$last_id,'id_consulta'=>$id_consulta);

        }

        public function actionActualizarBase(){

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
            echo '<h1>Actualizacion correcta</h1>';
            
            //var_dump(scandir(Yii::app()->createUrl('img/autos')));
            //die();

            //return $rows;

        }


}
