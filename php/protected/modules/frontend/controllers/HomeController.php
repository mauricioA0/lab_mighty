<?php

class HomeController extends Controller
{

	public function actionIndex()
	{
		$site = Yii::app()->urlSite->urlDecode();
		Yii::app()->params['site'] = $site;

		$destacados = Publicaciones::findDestacadosByIdConcesionarios(Yii::app()->params['conce'], 8);
		$destacados = $destacados['publicaciones'];
		
		$adjudicados = PublicacionesAC::findDestacadosAdjudicados(3);
		$destacadosAc = $adjudicados['adjudicados'];

		$masBuscados = Publicaciones::findMasBuscadosByConce(Yii::app()->params['conce'], 25);


		$this->render('index', array('destacados'=>$destacados, 
			                         'destacadosAC'=>$destacadosAc,
			                         'masBuscados'=>$masBuscados));
	}

}