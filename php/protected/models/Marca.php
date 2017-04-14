<?php

/**
 * This is the model class for table "marca".
 *
 * The followings are the available columns in table 'marca':
 * @property integer $id
 * @property string $nombre_marca
 * @property string $video_marca
 * @property string $habilitar_marca
 * @property string $nombre_plan_marca
 * @property string $orden_importancia_marca
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property Concesionarios[] $concesionarioses
 * @property Modelo[] $modelos
 * @property Promos[] $promoses
 */
class Marca extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'marca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_marca, habilitar_marca', 'required'),
			array('nombre_marca', 'length', 'max'=>45),
			array('video_marca', 'length', 'max'=>250),
			array('habilitar_marca, orden_importancia_marca', 'length', 'max'=>2),
			array('nombre_plan_marca, slug', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre_marca, video_marca, habilitar_marca, nombre_plan_marca, orden_importancia_marca, slug', 'safe', 'on'=>'search'),
		);
	}


	public static function getPosiciones()
	{
		$arrPosiciones = array();

		for($i=1; $i<=30; $i++)
		{
			$arrPosiciones[$i] = $i;
		}

		return $arrPosiciones;
	}




	public static function getMenu()
	{
		$site = Yii::app()->urlSite->urlDecode();

		$criteria = new CDbCriteria();
		$criteria->join =  'INNER JOIN concesionarios as C ON t.conce_id = C.id  INNER JOIN marca as M ON C.marca_id = M.id';
		$criteria->condition = 'sitio_id = :site AND C.habilitar_conce = :hab';
		$criteria->params = array(':site'=>$site->id, ':hab'=>'SI');
		$criteria->order = 'M.orden_importancia_marca ASC';

		$marcas = Sitiosconce::model()->findAll($criteria);
			
		return $marcas;
	}
        
        public static function findSite($site)
	{
		$criteria = new CDbCriteria();
		$criteria->join =  'INNER JOIN concesionarios as C ON t.conce_id = C.id  INNER JOIN marca as M ON C.marca_id = M.id';
		$criteria->condition = 'sitio_id = :site AND C.habilitar_conce = :hab';
		$criteria->params = array(':site'=>$site, ':hab'=>'SI');
		$criteria->order = 'M.orden_importancia_marca ASC';

		$marcas = Sitiosconce::model()->findAll($criteria);
			
		return $marcas;

	}
        
	

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'concesionarios' => array(self::HAS_MANY, 'Concesionarios', 'marca_id'),
			'modelos' => array(self::HAS_MANY, 'Modelo', 'idMarcaModelo'),
			'promos' => array(self::HAS_MANY, 'Promos', 'marca_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre_marca' => 'Nombre Marca',
			'video_marca' => 'Video Marca',
			'habilitar_marca' => 'Habilitar Marca',
			'nombre_plan_marca' => 'Nombre Plan Marca',
			'orden_importancia_marca' => 'Orden Importancia Marca',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre_marca',$this->nombre_marca,true);
		$criteria->compare('video_marca',$this->video_marca,true);
		$criteria->compare('habilitar_marca',$this->habilitar_marca,true);
		$criteria->compare('nombre_plan_marca',$this->nombre_plan_marca,true);
		$criteria->compare('orden_importancia_marca',$this->orden_importancia_marca,true);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Marca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}



	public function behaviors(){
		return array(
			/*'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
				'createAttribute' => 'fecha_creacion',
				'updateAttribute' => 'fecha_actualizacion',
			),*/
			'sluggable' => array(
				'class'=>'ext.behaviors.SluggableBehavior',
				'columns' => array('nombre_plan_marca'),
				'unique' => true,
				'update' => false,
			)
		);
	}
}
