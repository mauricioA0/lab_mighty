<?php
class DefaultController extends Controller
{
	/**
	 * Displays sitemap in XML or HTML format,
	 * depending on the value of $format parameter
	 * @param string $format
	 */
	public function actionIndex($format = 'xml')
	{
            
                $pages = $this->getModule()->actions;
                
                $this->getModule()->actions = array();
          
                $sitio = explode('.com',$_SERVER['HTTP_HOST']);
                
                $dom_prin = explode('.', $sitio[0]);
                
                $sitios = Sitios::findNombre($dom_prin[count($dom_prin)-1]);
                
                
                foreach ( $sitios['sitios'] as $mi_site ){ 
                    $url_site = 'http://www.'.$mi_site->url_sitio.'/';
                    
                    foreach ($pages as $mi_page ){
                        $mi_page["route"] = $url_site.$mi_page["route"];
                        array_push($this->getModule()->actions,$mi_page);
                    }
                    
                    $marcas = Marca::findSite($mi_site->id);
                    
                    $sitiosconce = Sitiosconce::findByIdSitioAndConceHabilitado($mi_site);

                    $arrIdConce = array();

                    foreach($sitiosconce as $conce)
                    {
                            $arrIdConce[] = $conce->conce_id;
                    }
                    
                    foreach($marcas as $marca){
                        array_push($this->getModule()->actions, array("route"=>$url_site.$marca->concesionarios->marcas->slug,'prefs' => array('priority'=>1)));
                    }
                   // Planes de ahorro nuevos 
                   $nuevos = Publicaciones::findDestacadosByIdConcesionarios($arrIdConce, 1200,null, null, null, null, null, null);
                    foreach ( $nuevos['publicaciones'] as $nuevo ){
                        $url =  $nuevo->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$nuevo->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($nuevo->tipoPlan);
                        array_push($this->getModule()->actions, array("route"=>$url_site.$url));
                    }

                    // Planes de ahorro adjudicados
                    $adjudicados = PublicacionesAC::findDestacadosAdjudicados(1200);
                    foreach ( $adjudicados['adjudicados'] as $destacado ){
                        $url = 'planes-ahorro-comenzados/'.$destacado->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$destacado->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($destacado->tipoAC).'/'.$destacado->idPublicacionAC;
                        array_push($this->getModule()->actions, array("route"=>$url_site.$url, 'prefs' => array('priority'=>0.7)));
                    }

                    // planes de ahorro Comenados
                    $comenzados = PublicacionesAC::findDestacadosComenzados(1200);
                    foreach ( $comenzados['comenzados'] as $destacado ){
                        $url = 'planes-ahorro-comenzados/'.$destacado->modelos->marcas->slug.'/'.strtolower(str_replace(' ', '-',$destacado->modelos->nombreModelo)).'/plan-ahorro-'.TipoPlan::generarSlugTipoPlan($destacado->tipoAC).'/'.$destacado->idPublicacionAC;
                        array_push($this->getModule()->actions, array("route"=>$url_site.$url, 'prefs' => array('priority'=>0.7)));
                    }
                }
              
               
                if ($this->getModule()->actions)
			$urls = $this->getModule()->getSpecifiedUrls();
		else
			$urls = $this->getModule()->getAllUrls();
		
                    
		if ($format == 'xml')
		{
			if (!headers_sent())
				header('Content-Type: text/xml');
			$this->renderPartial('xml', array('urls' => $urls));
		}
		else
			$this->renderPartial('html', array('urls' => $urls));
	}
}