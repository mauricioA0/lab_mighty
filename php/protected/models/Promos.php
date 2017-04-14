<?php

/**
 * This is the model class for table "promos".
 *
 * The followings are the available columns in table 'promos':
 * @property integer $id
 * @property integer $conce_id
 * @property string $nombre_promo
 * @property string $texto_promo
 * @property string $descargar_promo
 * @property string $marca_id
 * @property string $habilitar_promo
 * @property string $slug
 *
 * The followings are the available model relations:
 * @property Concesionarios $conce
 */
class Promos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('conce_id, nombre_promo, texto_promo, habilitar_promo, slug', 'required'),
			array('conce_id', 'numerical', 'integerOnly'=>true),
			array('nombre_promo, slug', 'length', 'max'=>100),
			array('descargar_promo', 'length', 'max'=>250),
			array('marca_id', 'length', 'max'=>45),
			array('habilitar_promo', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, conce_id, nombre_promo, texto_promo, descargar_promo, marca_id, habilitar_promo, slug', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'concesionarios' => array(self::BELONGS_TO, 'Concesionarios', 'conce_id'),
			'marcas' => array(self::BELONGS_TO, 'Marca', 'marca_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'conce_id' => 'Concesionario',
			'nombre_promo' => 'Nombre Promo',
			'texto_promo' => 'Titulo',
			'descargar_promo' => 'Texto',
			'marca_id' => 'Marca',
			'habilitar_promo' => 'Habilitar',
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
		$criteria->compare('conce_id',$this->conce_id);
		$criteria->compare('nombre_promo',$this->nombre_promo,true);
		$criteria->compare('texto_promo',$this->texto_promo,true);
		$criteria->compare('descargar_promo',$this->descargar_promo,true);
		$criteria->compare('marca_id',$this->marca_id,true);
		$criteria->compare('habilitar_promo',$this->habilitar_promo,true);
		$criteria->compare('slug',$this->slug,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Promos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
