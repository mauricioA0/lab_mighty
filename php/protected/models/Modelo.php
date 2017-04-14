<?php

/**
 * This is the model class for table "modelo".
 *
 * The followings are the available columns in table 'modelo':
 * @property integer $idModelo
 * @property string $precio0kmModelo
 * @property string $nombreModelo
 * @property string $equipamientoModelo
 * @property integer $idMarcaModelo
 * @property string $enabledModelo
 * @property string $claseModelo
 * @property string $videoModelo
 * @property string $tagsModelo
 * @property string $nombreDirectorio
 * @property string $urlLink
 * @property string $coloresModelo
 * @property integer $claseModeloDos
 * @property string $nivelModelo
 * @property string $votPos
 * @property string $votNeg
 * @property integer $ip
 *
 * The followings are the available model relations:
 * @property Equipamientos[] $equipamientoses
 * @property FichaTecnica[] $fichaTecnicas
 * @property Marca $idMarcaModelo0
 * @property Publicaciones[] $publicaciones
 * @property PublicacionesAC[] $publicacionesACs
 * @property Sitiosmodelo[] $sitiosmodelos
 */
class Modelo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'modelo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('precio0kmModelo, nombreModelo, equipamientoModelo, idMarcaModelo, enabledModelo, videoModelo, nombreDirectorio, coloresModelo, claseModeloDos, nivelModelo, votPos, votNeg, ip', 'required'),
			array('idMarcaModelo, claseModeloDos, ip', 'numerical', 'integerOnly'=>true),
			array('precio0kmModelo', 'length', 'max'=>10),
			array('nombreModelo', 'length', 'max'=>50),
			array('equipamientoModelo, videoModelo, urlLink, coloresModelo', 'length', 'max'=>250),
			array('enabledModelo, nivelModelo', 'length', 'max'=>1),
			array('claseModelo', 'length', 'max'=>2),
			array('tagsModelo, nombreDirectorio', 'length', 'max'=>100),
			array('votPos, votNeg', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idModelo, precio0kmModelo, nombreModelo, equipamientoModelo, idMarcaModelo, enabledModelo, claseModelo, videoModelo, tagsModelo, nombreDirectorio, urlLink, coloresModelo, claseModeloDos, nivelModelo, votPos, votNeg, ip', 'safe', 'on'=>'search'),
		);
	}



	public static function findAllModelosHabByIdMarca($id, $arrConce)
	{

		$criteria = new CDbCriteria();
                $criteria->select = 't.*';
                $criteria->join = 'INNER JOIN publicaciones as P ON P.idModeloPlan = t.idModelo ';
                $criteria->addCondition('P.enabledPlan = 1', 'AND');
                $criteria->addCondition('t.idMarcaModelo = :idmarca', 'AND');
                $criteria->addCondition('t.enabledModelo = :hab', 'AND');
                $criteria->params = array(':idmarca'=>$id ,':hab'=>'1');
		//$criteria->condition = ' P.enabledPlan = 1 AND idMarcaModelo = :idmarca AND enabledModelo = :hab ';
                $criteria->addInCondition('P.concePlan', $arrConce);
		
                $criteria->group = 't.idModelo';
                
		$modelos = Modelo::model()->findAll($criteria);

		return  $modelos;
	}




	
	public static function getNombreImagenCh($marca, $modelo)
	{
		$marca = strtolower(str_replace(' ', '-',$marca));
		$modelo = strtolower(str_replace(' ', '-', $modelo));

		$imagen = $marca.'-'.$modelo.'.png';
		return  $imagen;

	}




	public static function getNombreImagenGr($modelo)
	{

		$modelo = strtolower(str_replace(' ', '-', $modelo));

		$imagen = $modelo.'/'.$modelo;
		return  $imagen;

	}



	/*Devuelve el modelo por el cual suscribe el plan a mostrar*/
	public static function findCambioModeloByIdModelo($idmod)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'idModelo = :idmod AND enabledModelo = :hab';
		$criteria->params = array(':idmod'=>$idmod, ':hab'=>'1');

		$modelocambio = Modelo::model()->find($criteria);

		return $modelocambio;
	}



	/*Devuelve la menor cuota de las 84 del plan segun la fiinanciacion*/
	public static function findCuotaMenorByTipoPlan($tipoPlan, $idmod)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 'cuotasPlan';
		$criteria->condition = 'idModeloPlan = :idmod AND tipoPlan = :tplan';
		$criteria->params = array(':idmod'=>$idmod, ':tplan'=>$tipoPlan);
                $criteria->addInCondition('concePlan', Yii::app()->params['conce']);

                
		$cuotas = Publicaciones::model()->find($criteria);
             
		$arrCuotas = explode('/', $cuotas->cuotasPlan);
		$arrCuotas = array_filter($arrCuotas);		

		$arrValorCuotas = array();

		foreach($arrCuotas as $indice => $valor) 
		{

			if(strlen($valor) > 2 && is_numeric($valor))
				$arrValorCuotas[] = $valor;
		}

                    
                
                $cuotaMenor = number_format(min($arrValorCuotas));
                $cuotaMenor = str_replace(',', '.', $cuotaMenor);

                return $cuotaMenor;
            
                
		

	}



	/*devuelve true si es una de las ultimas publicaciones*/
	public static function getPublicacionNueva($idmod)
	{
		$nuevo = false;

		$criteria = new CDbCriteria();
		$criteria->select = 'idModelo';
		$criteria->addCondition('enabledModelo = 1');
		$criteria->order = 'idModelo DESC';
		$criteria->limit = 10;
		
		$maximos = Modelo::model()->findAll($criteria);

		
		foreach($maximos as $max)
		{
			$arrMaximos[] = $max->idModelo;
		}


		if(in_array($idmod, $arrMaximos))
			$nuevo = true;

		return $nuevo;
	}



	public static function findVotarByIdModelo($id, $voto)
	{

		$criteria = new CDbCriteria();
		$criteria->condition = 'idModelo = :idmod';
		$criteria->params = array(':idmod'=>$id);

		$modelo = Modelo::model()->find($criteria);

		if($voto == 'SI')
		{
			$modelo->votPos = $modelo->votPos + 1;
			$cantVoto = $modelo->votPos;
			$modelo->update();
		}


		if($voto == 'NO')
		{
			$modelo->votNeg = $modelo->votNeg + 1;
			$cantVoto = $modelo->votNeg;
			$modelo->update();
		}


		return $cantVoto;
		
	}



	




	


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'equipamientos' => array(self::HAS_MANY, 'Equipamientos', 'modelo_id', 'order'=>'seccion_equip ASC'),
			'fichas' => array(self::HAS_MANY, 'FichaTecnica', 'modelo_id'),
			'marcas' => array(self::BELONGS_TO, 'Marca', 'idMarcaModelo'),
			'publicaciones' => array(self::HAS_MANY, 'Publicaciones', 'idModeloPlan'),
			'publicacionesACs' => array(self::HAS_MANY, 'PublicacionesAC', 'idModeloAC'),
			'sitiosmodelos' => array(self::HAS_MANY, 'Sitiosmodelo', 'modelo_id'),
			'categorias'=>array(self::HAS_MANY, 'Categorias', 'codigo_categ'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idModelo' => 'Id',
			'precio0kmModelo' => 'Precio 0km',
			'nombreModelo' => 'Nombre',
			'equipamientoModelo' => 'Equipamiento',
			'idMarcaModelo' => 'Marca',
			'enabledModelo' => 'Habilitado',
			'claseModelo' => 'Clase',
			'videoModelo' => 'Video',
			'tagsModelo' => 'Tags',
			'nombreDirectorio' => 'Nombre',
			'urlLink' => 'Url',
			'coloresModelo' => 'Colores',
			'claseModeloDos' => 'Clase Dos',
			'nivelModelo' => 'Nivel ',
			'votPos' => 'Votos Positivos',
			'votNeg' => 'Votos Negativos',
			'ip' => 'Ip',
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

		$criteria->compare('idModelo',$this->idModelo);
		$criteria->compare('precio0kmModelo',$this->precio0kmModelo,true);
		$criteria->compare('nombreModelo',$this->nombreModelo,true);
		$criteria->compare('equipamientoModelo',$this->equipamientoModelo,true);
		$criteria->compare('idMarcaModelo',$this->idMarcaModelo);
		$criteria->compare('enabledModelo',$this->enabledModelo,true);
		$criteria->compare('claseModelo',$this->claseModelo,true);
		$criteria->compare('videoModelo',$this->videoModelo,true);
		$criteria->compare('tagsModelo',$this->tagsModelo,true);
		$criteria->compare('nombreDirectorio',$this->nombreDirectorio,true);
		$criteria->compare('urlLink',$this->urlLink,true);
		$criteria->compare('coloresModelo',$this->coloresModelo,true);
		$criteria->compare('claseModeloDos',$this->claseModeloDos);
		$criteria->compare('nivelModelo',$this->nivelModelo,true);
		$criteria->compare('votPos',$this->votPos,true);
		$criteria->compare('votNeg',$this->votNeg,true);
		$criteria->compare('ip',$this->ip);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}



	/*public function behaviors(){
		return array(
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'fecha_creacion',
				'updateAttribute' => 'fecha_actualizacion',
			),
			'sluggable' => array(
				'class'=>'ext.behaviors.SluggableBehavior',
				'columns' => array('nombre_plan_marca'),
				'unique' => true,
				'update' => false,
			)
		);
	}*/
	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modelo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
