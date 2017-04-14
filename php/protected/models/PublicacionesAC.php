<?php

/**
 * This is the model class for table "publicacionesAC".
 *
 * The followings are the available columns in table 'publicacionesAC':
 * @property string $idPublicacionAC
 * @property integer $idModeloAC
 * @property string $explicaAC
 * @property string $promedioCuotasAC
 * @property string $explicaACDestacado
 * @property string $tipoAC
 * @property string $enabledAC
 * @property string $reventaAC
 * @property string $prioridad
 * @property string $cantCuotasAC
 * @property string $valorAC
 * @property string $estadoPlan
 * @property string $cantConsultas
 * @property string $cambioModeloAC
 *
 * The followings are the available model relations:
 * @property Modelo $idModeloAC0
 * @property Reventas $reventaAC
 */
class PublicacionesAC extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'publicacionesAC';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idModeloAC, explicaAC, promedioCuotasAC, explicaACDestacado, tipoAC, enabledAC, reventaAC, cantCuotasAC, valorAC, estadoPlan', 'required'),
			array('idModeloAC', 'numerical', 'integerOnly'=>true),
			array('explicaAC', 'length', 'max'=>255),
			array('promedioCuotasAC, valorAC', 'length', 'max'=>6),
			array('explicaACDestacado', 'length', 'max'=>200),
			array('tipoAC', 'length', 'max'=>5),
			array('enabledAC, estadoPlan', 'length', 'max'=>1),
			array('reventaAC, cantCuotasAC', 'length', 'max'=>2),
			array('prioridad', 'length', 'max'=>3),
			array('cantConsultas, cambioModeloAC', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPublicacionAC, idModeloAC, explicaAC, promedioCuotasAC, explicaACDestacado, tipoAC, enabledAC, reventaAC, prioridad, cantCuotasAC, valorAC, estadoPlan, cantConsultas, cambioModeloAC', 'safe', 'on'=>'search'),
		);
	}



	public static function findDestacadosAdjudicados($limit, $marcas=null, $categ=null, $planes=null, $desde=null, $cuota=null, $reventa = null, $reventas = null)
	{

		$criteria = new CDbCriteria();
		$criteria->select = 't.*, MA.nombre_plan_marca, M.claseModeloDos';
                
                $join = 'INNER JOIN modelo as M ON t.idModeloAC = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id ';
                
                if($reventa or $reventas){
                    $join .= 'INNER JOIN reventas as R ON t.reventaAC = R.idReventa '; 
                }
                
                $criteria->join = $join;
        
                if($reventa){
                    $criteria->addCondition(' CONCAT(R.idReventa,"__",R.nombreCortoReventa) = "'.$reventa.'"', 'AND');
                }
                
		$criteria->addCondition('enabledAC = 1', 'AND');
		$criteria->addCondition('estadoPlan = 2', 'AND');

                if(!empty($reventas))
			$criteria->addInCondition('R.idReventa', $reventas, 'AND');
                
		if(!empty($marcas))
			$criteria->addInCondition('MA.nombre_plan_marca', $marcas, 'AND');

		if(!empty($categ))
			$criteria->addInCondition('M.claseModeloDos', $categ, 'AND');

		if(!empty($planes))
			$criteria->addInCondition('t.tipoAC', $planes, 'AND');

		if(!empty($desde))
			$criteria->addCondition('t.valorAC <='.$desde, 'AND');

		if(!empty($cuota))
			$criteria->addCondition('t.promedioCuotasAC <='.$cuota, 'AND');


		$criteria->order = 'RAND()';
		$criteria->limit = $limit;
		$total = PublicacionesAC::model()->count($criteria);
		$pages = new CPagination($total);
		$pages->pageSize = $limit;
		$pages->applyLimit($criteria);
 

		$adjudicados = PublicacionesAC::model()->findAll($criteria);

		return array('adjudicados'=>$adjudicados, 
			         'pages'=>$pages, 
			         'total'=>$total);
	}





	public static function findDestacadosComenzados($limit, $marcas=null, $categ=null, $planes=null, $desde=null, $cuota=null, $reventa = null, $reventas = null)
	{

		$criteria = new CDbCriteria();
		$criteria->select = 't.*, MA.nombre_plan_marca, M.claseModeloDos';

                $join = 'INNER JOIN modelo as M ON t.idModeloAC = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id ';
                
                if($reventa){
                    $join .= 'INNER JOIN reventas as R ON t.reventaAC = R.idReventa '; 
                }
                $criteria->join = $join;
        
                if($reventa){
                    $criteria->addCondition(' CONCAT(R.idReventa,"__",R.nombreCortoReventa) = "'.$reventa.'"', 'AND');
                }
                
		$criteria->addCondition('enabledAC = 1', 'AND');
		$criteria->addCondition('estadoPlan = 3', 'AND');
                
                if(!empty($reventas))
                    $criteria->addInCondition('t.reventaAC ', $reventas, 'AND');

		if(!empty($marcas))
			$criteria->addInCondition('MA.nombre_plan_marca', $marcas, 'AND');

		if(!empty($categ))
			$criteria->addInCondition('M.claseModeloDos', $categ, 'AND');

		if(!empty($planes))
			$criteria->addInCondition('t.tipoAC', $planes, 'AND');

		if(!empty($desde))
			$criteria->addCondition('t.valorAC <='.$desde, 'AND');

		if(!empty($cuota))
			$criteria->addCondition('t.promedioCuotasAC <='.$cuota, 'AND');
		
		$criteria->order = 'RAND()';
		$criteria->limit = $limit;

		$total = PublicacionesAC::model()->count($criteria);
		$pages = new CPagination($total);
		$pages->pageSize = $limit;
		$pages->applyLimit($criteria);
 

		$comenzados = PublicacionesAC::model()->findAll($criteria);


		return array('comenzados'=>$comenzados, 
			         'pages'=>$pages, 
			         'total'=>$total);

	}



	public static function findFiltroByEstado($estado, $reventa = '')
	{

		if($estado == 'Adjudicados')
			$est = '2';

		if($estado == 'Comenzados')
			$est = '3';



		$criteria = new CDbCriteria();
		$criteria->select = 'idModeloAC, tipoAC, valorAC, promedioCuotasAC,reventaAC';
                
                
                
                if($reventa){
                    
                    $join = 'INNER JOIN modelo as M ON t.idModeloAC = M.idModelo INNER JOIN marca as MA ON M.idMarcaModelo = MA.id ';
               
                    $join .= 'INNER JOIN reventas as R ON t.reventaAC = R.idReventa '; 

                    $criteria->join = $join;
                
                    $criteria->addCondition(' CONCAT(R.idReventa,"__",R.nombreCortoReventa) = "'.$reventa.'"', 'AND');
                } 
                
                $criteria->order = 'RAND()';
                
                $criteria->addCondition ( 'enabledAC = 1 AND estadoPlan = '.$est, 'AND' );
                
                
		$publicaciones = PublicacionesAC::model()->findAll($criteria);
                
		//Obtengo las marcas agrupadas
		$arrMarcas = array();
		$arrCategorias = array();
		$arrPlanes = array();
		$arrPrecios = array();
		$arrCuotas = array();
		$arrRevent = array();
		$arrReventaObj = array();

		//Obtengo las Marcas - filtrando con in_array los datos repetidos
		foreach($publicaciones as $publicado)
		{

			$categ = Categorias::model()->findByAttributes(array('codigo_categ'=>$publicado->modelos->claseModeloDos));

			if(!in_array($publicado->modelos->marcas->nombre_plan_marca, $arrMarcas))
				$arrMarcas[] = $publicado->modelos->marcas->nombre_plan_marca;

			if(!in_array($publicado->tipoAC, $arrPlanes))
				$arrPlanes[] = $publicado->tipoAC;

			if(!in_array($categ->nombre_categ, $arrCategorias))
				$arrCategorias[$categ->codigo_categ] = $categ->nombre_categ;

			if(!in_array($publicado->valorAC, $arrPrecios))
				$arrPrecios[] = $publicado->valorAC;

			if(!in_array($publicado->promedioCuotasAC, $arrCuotas))
				$arrCuotas[] = $publicado->promedioCuotasAC;
                        
                        if(!in_array($publicado->reventaAC, $arrRevent)){
				$arrRevent[] = $publicado->reventaAC;
                                $arrReventaObj[] = $publicado->reventas;
                        }
		}


		return array('marcas'=>$arrMarcas, 
			         'planes'=>$arrPlanes, 
			         'categ'=>$arrCategorias,
			         'precios'=>$arrPrecios,
			         'cuotas'=>$arrCuotas,
                                 'reventas' => $arrReventaObj);
	}






	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'modelos' => array(self::BELONGS_TO, 'Modelo', 'idModeloAC'),
			'planes' => array(self::BELONGS_TO, 'TipoPlan', 'tipoPlan'),
			'promos' => array(self::BELONGS_TO, 'Promos', 'promo'),
			'reventas'=>array(self::BELONGS_TO, 'Reventas', 'reventaAC'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPublicacionAC' => 'Id',
			'idModeloAC' => 'Modelo AC',
			'explicaAC' => 'Detalle AC',
			'promedioCuotasAC' => 'Promedio Cuotas AC',
			'explicaACDestacado' => 'Destacado AC',
			'tipoAC' => 'Tipo Plan AC',
			'enabledAC' => 'Habilitar AC',
			'reventaAC' => 'Reventa AC',
			'prioridad' => 'Prioridad AC',
			'cantCuotasAC' => 'Cuotas AC',
			'valorAC' => 'Valor AC',
			'estadoPlan' => 'Estado Plan AC',
			'cantConsultas' => 'Cant Consultas AC',
			'cambioModeloAC' => 'Cambio Modelo Ac',
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

		$criteria->compare('idPublicacionAC',$this->idPublicacionAC,true);
		$criteria->compare('idModeloAC',$this->idModeloAC);
		$criteria->compare('explicaAC',$this->explicaAC,true);
		$criteria->compare('promedioCuotasAC',$this->promedioCuotasAC,true);
		$criteria->compare('explicaACDestacado',$this->explicaACDestacado,true);
		$criteria->compare('tipoAC',$this->tipoAC,true);
		$criteria->compare('enabledAC',$this->enabledAC,true);
		$criteria->compare('reventaAC',$this->reventaAC,true);
		$criteria->compare('prioridad',$this->prioridad,true);
		$criteria->compare('cantCuotasAC',$this->cantCuotasAC,true);
		$criteria->compare('valorAC',$this->valorAC,true);
		$criteria->compare('estadoPlan',$this->estadoPlan,true);
		$criteria->compare('cantConsultas',$this->cantConsultas,true);
		$criteria->compare('cambioModeloAC',$this->cambioModeloAC,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public static function findAdjudicadosComenzadosID($idPublicacion)
	{

		$criteria = new CDbCriteria();
	
	
                $criteria->condition = 'idPublicacionAC = :idpub ';
		$criteria->params = array(':idpub'=>$idPublicacion);
                
                $detalle = PublicacionesAC::model()->findAll($criteria);

		return array("detalle"=>$detalle);


	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PublicacionesAC the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        
}
