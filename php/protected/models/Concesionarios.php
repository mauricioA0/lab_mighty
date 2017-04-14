<?php

/**
 * This is the model class for table "concesionarios".
 *
 * The followings are the available columns in table 'concesionarios':
 * @property integer $id
 * @property integer $marca_id
 * @property string $nombre_conce
 * @property string $nombre_corto_conce
 * @property string $habilitar_conce
 * @property string $precio_listado_conce
 * @property string $destacar_listado_conce
 * @property string $descuento_conce
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property Marca $marca
 * @property Sitiosconce[] $sitiosconces
 */
class Concesionarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'concesionarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('marca_id, nombre_conce, nombre_corto_conce, habilitar_conce, precio_listado_conce', 'required'),
			array('marca_id', 'numerical', 'integerOnly'=>true),
			array('nombre_conce, nombre_corto_conce', 'length', 'max'=>45),
			array('habilitar_conce, precio_listado_conce, destacar_listado_conce', 'length', 'max'=>2),
			array('descuento_conce', 'length', 'max'=>3),
			array('slug', 'length', 'max'=>100),

			array('id, marca_id, nombre_conce, nombre_corto_conce, habilitar_conce, precio_listado_conce, destacar_listado_conce, descuento_conce, slug', 'safe', 'on'=>'search'),
		);
	}


	public static function nombreCortoConceById($id)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'id = :id';
		$criteria->params = array(':id'=>$id);

		$conce = Concesionarios::model()->find($criteria);
		$nombre = $conce->nombre_corto_conce;

		return $nombre;
	}


	public static function nombreConceByMarcaId($id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.nombre_conce';
		$criteria->join = 'INNER JOIN marca as M on t.marca_id = M.id';
		$criteria->condition = 't.marca_id = :id';
		$criteria->params = array(':id'=>$id);
                $criteria->addInCondition('t.id', Yii::app()->params['conce']);

		$conce = Concesionarios::model()->find($criteria);
		$nombre = $conce->nombre_conce;

		return $nombre;
	}
        
        public static function idConceByMarcaId($id)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.id';
		$criteria->join = 'INNER JOIN marca as M on t.marca_id = M.id';
		$criteria->condition = 't.marca_id = :id';
		$criteria->params = array(':id'=>$id);
                $criteria->addInCondition('t.id', Yii::app()->params['conce']);

		$conce = Concesionarios::model()->find($criteria);
		$id_conce = $conce->id;

		return $id_conce;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'marcas' => array(self::BELONGS_TO, 'Marca', 'marca_id'),
			'sitiosconces' => array(self::HAS_MANY, 'Sitiosconce', 'conce_id'),
			'publicaciones'=>array(self::HAS_MANY, 'Publicaciones', 'concePlan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'marca_id' => 'Marca',
			'nombre_conce' => 'Nombre',
			'nombre_corto_conce' => 'Nombre Corto',
			'habilitar_conce' => 'Habilita',
			'precio_listado_conce' => 'Precio Listado',
			'destacar_listado_conce' => 'Destacar Listado',
			'descuento_conce' => 'Descuento',
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
		$criteria->compare('marca_id',$this->marca_id);
		$criteria->compare('nombre_conce',$this->nombre_conce,true);
		$criteria->compare('nombre_corto_conce',$this->nombre_corto_conce,true);
		$criteria->compare('habilitar_conce',$this->habilitar_conce,true);
		$criteria->compare('precio_listado_conce',$this->precio_listado_conce,true);
		$criteria->compare('destacar_listado_conce',$this->destacar_listado_conce,true);
		$criteria->compare('descuento_conce',$this->descuento_conce,true);
		$criteria->compare('slug',$this->slug,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Concesionarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
