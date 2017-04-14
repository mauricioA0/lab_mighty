<?php

/**
 * This is the model class for table "publicaciones".
 *
 * The followings are the available columns in table 'publicaciones':
 * @property string $idPublicacion
 * @property integer $idModeloPlan
 * @property string $explicaPlan
 * @property string $cuotasPlan
 * @property string $explicaPlanDestacado
 * @property string $tipoPlan
 * @property string $cambioModelo
 * @property string $enabledPlan
 * @property string $explicaCambioModelo
 * @property string $concePlan
 * @property string $entrega
 * @property string $prioridad
 * @property string $promo
 * @property string $cantCuotas
 * @property integer $vistasPda
 * @property integer $vistasP0km
 * @property integer $vistasAenC
 * @property integer $vistasCenC
 * @property string $fechaUltimaMod
 * @property string $descuentoSuscrip
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property MegustaPublicacion[] $megustaPublicacions
 * @property Modelo $idModeloPlan0
 */
class Publicaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'publicaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idModeloPlan, explicaPlan, cuotasPlan, explicaPlanDestacado, tipoPlan, enabledPlan, concePlan, vistasPda, vistasP0km, vistasAenC, vistasCenC, fechaUltimaMod', 'required'),
			array('idModeloPlan, vistasPda, vistasP0km, vistasAenC, vistasCenC', 'numerical', 'integerOnly'=>true),
			array('explicaPlan, explicaCambioModelo, entrega', 'length', 'max'=>255),
			array('cuotasPlan', 'length', 'max'=>250),
			array('explicaPlanDestacado', 'length', 'max'=>200),
			array('tipoPlan, cambioModelo', 'length', 'max'=>5),
			array('enabledPlan', 'length', 'max'=>1),
			array('concePlan', 'length', 'max'=>2),
			array('prioridad, promo, cantCuotas', 'length', 'max'=>3),
			array('fechaUltimaMod', 'length', 'max'=>10),
			array('descuentoSuscrip', 'length', 'max'=>25),
			array('slug', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPublicacion, idModeloPlan, explicaPlan, cuotasPlan, explicaPlanDestacado, tipoPlan, cambioModelo, enabledPlan, explicaCambioModelo, concePlan, entrega, prioridad, promo, cantCuotas, vistasPda, vistasP0km, vistasAenC, vistasCenC, fechaUltimaMod, descuentoSuscrip, slug', 'safe', 'on'=>'search'),
		);
	}

	


	public static function findByIdModeloPlanHabilitado($id, $conce)
	{
		$criteria = new CDbCriteria();

		$criteria->condition = 'idModeloPlan = :idmod AND enabledPlan = :hab AND concePlan = :conce';
		$criteria->params = array(':idmod'=>$id, ':hab'=>'1', ':conce'=>$conce);
		$criteria->order = 'idModeloPlan ASC';

		$publicaciones = Publicaciones::model()->findAll($criteria);

		return $publicaciones;
	}




	public static function findDestacadosByIdConcesionarios($arrId, $limit, $marcas=null, $categ=null, $planes=null, $desde=null, $cuota=null, $group = true)
	{
                
		$criteria = new CDbCriteria();
		$criteria->select = 't.*, M.enabledModelo, M.idModelo';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id';

		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		//$criteria->addCondition('t.idPublicacion > 800', 'AND');
		$criteria->addInCondition('t.concePlan', $arrId);

		if(!empty($marcas))
			$criteria->addInCondition('MA.nombre_plan_marca', $marcas, 'AND');

		if(!empty($categ))
			$criteria->addInCondition('M.claseModeloDos', $categ, 'AND');

		if(!empty($planes))
			$criteria->addInCondition('t.tipoPlan', $planes, 'AND');

		if(!empty($desde))
			$criteria->addCondition('M.precio0kmModelo <='.$desde, 'AND');

		if(!empty($cuota))
			$criteria->addSearchCondition('t.cuotasPlan',$cuota, 'AND');


		$criteria->order = ' t.idPublicacion DESC  ';
                if($group){
                    $criteria->group = 't.idPublicacion';
                }
                
		$criteria->limit = $limit;

		$total = Publicaciones::model()->count($criteria);
		$pages = new CPagination($total);
		$pages->pageSize = $limit;
		$pages->applyLimit($criteria);

		$publicaciones = Publicaciones::model()->findAll($criteria);

                
		return array('publicaciones'=>$publicaciones,
					 'pages'=>$pages,
					 'total'=>$total);

	}




	public static function findMasBuscadosByConce($arrId, $limit)
	{
		$criteria = new CDbCriteria();
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addInCondition('t.concePlan', $arrId);
		$criteria->order = 't.prioridad, t.vistasAenC DESC';
		$criteria->group = 't.idModeloPlan';
		$criteria->limit = $limit;

		$masbuscados = Publicaciones::model()->findAll($criteria);

		return $masbuscados;
	}


	public static function findMasEconomicosByConce($arrId)
	{
		$criteria = new CDbCriteria();
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addInCondition('t.concePlan', $arrId);
		$criteria->order = 'M.precio0kmModelo ASC';
		$criteria->group = 't.idModeloPlan';
		$criteria->limit = 8;

		$masEconomicos = Publicaciones::model()->findAll($criteria);

		return $masEconomicos;
	}



	public static function findMasEconomicosByConceAndFiltro($arrId, $limit, $maxValor, $marcas=null, $categ=null, $planes=null, $desde=null, $cuota=null)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.*, M.enabledModelo, M.idModelo';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addCondition('M.precio0kmModelo <= '.$maxValor, 'AND');
		$criteria->addInCondition('t.concePlan', $arrId);


		if(!empty($marcas))
			$criteria->addInCondition('MA.nombre_plan_marca', $marcas, 'AND');

		if(!empty($categ))
			$criteria->addInCondition('M.claseModeloDos', $categ, 'AND');

		if(!empty($planes))
			$criteria->addInCondition('t.tipoPlan', $planes, 'AND');

		if(!empty($desde))
			$criteria->addCondition('M.precio0kmModelo <='.$desde, 'AND');

		if(!empty($cuota))
			$criteria->addSearchCondition('t.cuotasPlan',$cuota, 'AND');


		$criteria->order = 't.idPublicacion, M.precio0kmModelo ASC';
		$criteria->group = 't.idModeloPlan';
		$criteria->limit = $limit;

		$total = Publicaciones::model()->count($criteria);
		$pages = new CPagination($total);
		$pages->pageSize = $limit;
		$pages->applyLimit($criteria);

		$publicaciones = Publicaciones::model()->findAll($criteria);


		return array('publicaciones'=>$publicaciones,
					 'pages'=>$pages,
					 'total'=>$total);
	}




	public static function findFiltroByEstado($arrConce, $arrCateg=null)
	{

		/*Cuando se pasa la variable $arrCateg es para filtrar por categorias en el mismo filtro
		es decir en el caso de utilitarios ya filtra la query solo con utilitarios y muestra en el filtro
		solo los check de utilitarios que es lo que devuelve la funcion utilizando sta variable*/

		$criteria = new CDbCriteria();
		$criteria->select = 't.idModeloPlan, t.tipoPlan, t.idPublicacion';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');

		if(!empty($arrCateg))
		$criteria->addInCondition('M.claseModeloDos', $arrCateg);

		$criteria->addInCondition('t.concePlan', $arrConce);


		$publicaciones = Publicaciones::model()->findAll($criteria);


		//Obtengo las marcas agrupadas
		$arrMarcas = array();
		$arrCategorias = array();
		$arrPlanes = array();
		$arrPrecios = array();
		$arrCuotas = array();

		//Obtengo las Marcas - filtrando con in_array los datos repetidos
		foreach($publicaciones as $publicado)
		{

			$categ = Categorias::model()->findByAttributes(array('codigo_categ'=>$publicado->modelos->claseModeloDos));

			if(!in_array($publicado->modelos->marcas->nombre_plan_marca, $arrMarcas))
				$arrMarcas[] = $publicado->modelos->marcas->nombre_plan_marca;

			if(!in_array($publicado->tipoPlan, $arrPlanes))
				$arrPlanes[] = $publicado->tipoPlan;

			if(!in_array($categ->nombre_categ, $arrCategorias))
				$arrCategorias[$categ->codigo_categ] = $categ->nombre_categ;

			if(!in_array($publicado->modelos->precio0kmModelo, $arrPrecios))
				$arrPrecios[] = $publicado->modelos->precio0kmModelo;

			//Obtengo la menor cuota con la funcion en el modelo
			$cuota = Modelo::findCuotaMenorByTipoPlan($publicado->tipoPlan, $publicado->idModeloPlan);
			$cuota = str_replace('.', '', $cuota);

			if(!in_array($cuota, $arrCuotas))
				$arrCuotas[] = $cuota;
		}


		return array('marcas'=>$arrMarcas, 
			         'planes'=>$arrPlanes, 
			         'categ'=>$arrCategorias,
			         'precios'=>$arrPrecios,
			         'cuotas'=>$arrCuotas);
	}





	public static function findByNombrePlanAndIdConce($arrId, $limit, $slug=null, $categ=null, $planes=null, $hasta = null)
	{
		
		$criteria = new CDbCriteria();
		$criteria->select = 't.idModeloPlan, t.tipoPlan, t.idPublicacion, t.entrega';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addCondition('MA.slug = :slug','AND');
		$criteria->params = array(':slug'=>$slug);
		$criteria->addInCondition('t.concePlan', $arrId);


		if(!empty($categ))
			$criteria->addInCondition('M.claseModeloDos', $categ, 'AND');

		if(!empty($planes))
			$criteria->addInCondition('t.tipoPlan', $planes, 'AND');
                
                if(!empty($hasta))
			$criteria->addCondition('M.precio0kmModelo <='.$hasta, 'AND');


		$criteria->order = 'M.precio0kmModelo ASC';
		$criteria->limit = $limit;
               

		$total = Publicaciones::model()->count($criteria);
                 
		$pages = new CPagination($total);
		$pages->pageSize = $limit;
		$pages->applyLimit($criteria);
                
                
		$publicaciones = Publicaciones::model()->findAll($criteria);

                
                
		return array('publicaciones'=>$publicaciones,
					 'pages'=>$pages,
					 'total'=>$total);
	}




	public static function findFiltroByNombrePlan($arrConce, $slug)
	{

		/*Creo el filtro para la seccion de planes de ahorro - Nombre del Plan que ya ingresa
		 filtrada por esto*/

		$criteria = new CDbCriteria();
		$criteria->select = 't.idModeloPlan, t.tipoPlan, t.idPublicacion';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addCondition('MA.slug = :slug','AND');
		$criteria->params = array(':slug'=>$slug);
		$criteria->addInCondition('t.concePlan', $arrConce);

                
		$publicaciones = Publicaciones::model()->findAll($criteria);

          
		//Obtengo los datos agrupadas
		$arrCategorias = array();
		$arrPlanes = array();
		$arrPrecios = array();
		$arrCuotas = array();

		//Obtengo las Marcas - filtrando con in_array los datos repetidos
		foreach($publicaciones as $publicado)
		{

			$categ = Categorias::model()->findByAttributes(array('codigo_categ'=>$publicado->modelos->claseModeloDos));
                        

			if(!in_array($publicado->tipoPlan, $arrPlanes))
				$arrPlanes[] = $publicado->tipoPlan;

			if(!in_array($categ->nombre_categ, $arrCategorias))
				$arrCategorias[$categ->codigo_categ] = $categ->nombre_categ;

			if(!in_array($publicado->modelos->precio0kmModelo, $arrPrecios))
				$arrPrecios[] = $publicado->modelos->precio0kmModelo;

			//Obtengo la menor cuota con la funcion en el modelo
			$cuota = Modelo::findCuotaMenorByTipoPlan($publicado->tipoPlan, $publicado->idModeloPlan);
			$cuota = str_replace('.', '', $cuota);

			if(!in_array($cuota, $arrCuotas))
				$arrCuotas[] = $cuota;
		}

                
		return array('planes'=>$arrPlanes, 
			         'categ'=>$arrCategorias,
			         'precios'=>$arrPrecios,
			         'cuotas'=>$arrCuotas);
	}

        
        
        public static function findFiltroByIdModelo($arrConce, $idModelo)
	{

		/*Creo el filtro para la seccion de planes de ahorro - Nombre del Plan que ya ingresa
		 filtrada por esto*/

		$criteria = new CDbCriteria();
		$criteria->select = 't.idModeloPlan, t.tipoPlan, t.idPublicacion';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo ';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addCondition('M.idModelo = :slug','AND');
		$criteria->params = array(':slug'=>$idModelo);
		$criteria->addInCondition('t.concePlan', $arrConce);
                $criteria->group = 't.tipoPlan';
                

            return Publicaciones::model()->findAll($criteria);

	}
        
        


	public static function findByDetalleSlugAndConce($arrConce, $slug)
	{

		$criteria = new CDbCriteria();
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('t.slug = :slug', 'AND');
		$criteria->params = array(':slug'=>$slug);
		$criteria->addInCondition('t.concePlan', $arrConce);

         
		$detalle = Publicaciones::model()->find($criteria);

		return $detalle;
	}


	/* en esta funcion separo el string e los planes lo convierto en array luego genero un array con las cuotas
	y otro con el valor y despues recorro estos array para generar un unico array indice-valor con el indice de 
	cantidad de cuotas y el valor de las mismas para despues usarlo en el front*/
	public static function findPlanCuotasById($id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 'cuotasPlan';
		$criteria->condition = 'idPublicacion = :idpub';
		$criteria->params = array(':idpub'=>$id);

		$plan = Publicaciones::model()->find($criteria);

		$arrCuotas = explode('/', $plan->cuotasPlan);
		$arrCuotas = array_filter($arrCuotas);

		$arrCantCuotas = array();
		$arrValorCuotas = array();
		$cuota1 = null;

		foreach($arrCuotas as $indice => $valor)
		{
			if($indice < 2)
			{
				if($indice == 0)
					$cuota1 = $valor;

				if($indice == 1)
					$valor1 = $valor;
			}
			else
			{
				if(strlen($valor) > 2 && is_numeric($valor))
				{
					$arrValorCuotas[] = $valor;
				}
				else
				{
					$arrCantCuotas[] = $valor;
				}
			}
			
		}


		$arrPlancuotas = array();

		foreach($arrValorCuotas as $indice => $valor)
		{
			$arrPlancuotas[$arrCantCuotas[$indice]] = $valor;
		}

		return array('plancuotas'=>$arrPlancuotas, 'cuota1'=>$cuota1, 'valor1'=>$valor1);
	}


        // se busca la publicacion por el id 
        public static function findPlanById($id)
	{
            $criteria = new CDbCriteria();
            $criteria->condition = 'idPublicacion = :idpub';
            $criteria->params = array(':idpub'=>$id);

            return Publicaciones::model()->find($criteria);
	}

	


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'megustas' => array(self::HAS_MANY, 'MegustaPublicacion', 'publicacion_id'),
			'modelos' => array(self::BELONGS_TO, 'Modelo', 'idModeloPlan'),
			'planes' => array(self::BELONGS_TO, 'TipoPlan', 'tipoPlan'),
			'promos' => array(self::BELONGS_TO, 'Promos', 'promo'),
			'concesionarios' => array(self::BELONGS_TO, 'Concesionarios', 'concePlan'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPublicacion' => 'Id ',
			'idModeloPlan' => 'Modelo',
			'explicaPlan' => 'Detalle',
			'cuotasPlan' => 'Cuotas',
			'explicaPlanDestacado' => 'Detalle Destacado',
			'tipoPlan' => 'Tipo Plan',
			'cambioModelo' => 'Cambio Modelo',
			'enabledPlan' => 'Habilitar',
			'explicaCambioModelo' => 'Detalle Cambio Modelo',
			'concePlan' => 'Concesionario',
			'entrega' => 'Entrega',
			'prioridad' => 'Prioridad',
			'promo' => 'Promo',
			'cantCuotas' => 'Cuotas',
			'vistasPda' => 'Vistas Pda',
			'vistasP0km' => 'Vistas P0km',
			'vistasAenC' => 'Vistas Aen C',
			'vistasCenC' => 'Vistas Cen C',
			'fechaUltimaMod' => 'Fecha',
			'descuentoSuscrip' => 'Descuento',
			'slug' => 'Slug',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idPublicacion',$this->idPublicacion,true);
		$criteria->compare('idModeloPlan',$this->idModeloPlan);
		$criteria->compare('explicaPlan',$this->explicaPlan,true);
		$criteria->compare('cuotasPlan',$this->cuotasPlan,true);
		$criteria->compare('explicaPlanDestacado',$this->explicaPlanDestacado,true);
		$criteria->compare('tipoPlan',$this->tipoPlan,true);
		$criteria->compare('cambioModelo',$this->cambioModelo,true);
		$criteria->compare('enabledPlan','1',true);
		$criteria->compare('explicaCambioModelo',$this->explicaCambioModelo,true);
		$criteria->compare('concePlan',$this->concePlan,true);
		$criteria->compare('entrega',$this->entrega,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('promo',$this->promo,true);
		$criteria->compare('cantCuotas',$this->cantCuotas,true);
		$criteria->compare('vistasPda',$this->vistasPda);
		$criteria->compare('vistasP0km',$this->vistasP0km);
		$criteria->compare('vistasAenC',$this->vistasAenC);
		$criteria->compare('vistasCenC',$this->vistasCenC);
		$criteria->compare('fechaUltimaMod',$this->fechaUltimaMod,true);
		$criteria->compare('descuentoSuscrip',$this->descuentoSuscrip,true);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}




	public function behaviors(){
		return array(
			/*'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'fecha_creacion',
				'updateAttribute' => 'fecha_actualizacion',
			),
			'sluggable' => array(
				'class'=>'ext.behaviors.SluggableBehavior',
				'columns' => array('nombre_plan_marca'),
				'unique' => true,
				'update' => false,
			)*/
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Publicaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public static function findRelacionadoFiltro($publicacionID, $marcaModelo, $concePlan)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.*, M.enabledModelo, M.idModelo';
		$criteria->join = 'INNER JOIN modelo as M ON t.idModeloPlan = M.idModelo ';
		$criteria->addCondition('t.enabledPlan = 1', 'AND');
		$criteria->addCondition('M.enabledModelo = 1', 'AND');
		$criteria->addCondition('M.idMarcaModelo = '.$marcaModelo, 'AND');
		$criteria->addCondition('t.idPublicacion != '.$publicacionID, 'AND');
                $criteria->addInCondition('t.concePlan', $concePlan);

		$criteria->order = 't.idPublicacion, M.precio0kmModelo ASC';
		$criteria->group = 't.idModeloPlan';
		$criteria->limit = '4';

		$publicaciones = Publicaciones::model()->findAll($criteria);


		return $publicaciones;
	}
}
