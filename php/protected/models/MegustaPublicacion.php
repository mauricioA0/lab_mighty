<?php

/**
 * This is the model class for table "megustaPublicacion".
 *
 * The followings are the available columns in table 'megustaPublicacion':
 * @property integer $id
 * @property integer $publicacion_id
 * @property string $cantidad_megusta
 * @property string $ip_megusta
 * @property string $fecha_megusta
 *
 * The followings are the available model relations:
 * @property Publicaciones $publicacion
 */
class MegustaPublicacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'megustaPublicacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publicacion_id, cantidad_megusta, ip_megusta', 'required'),
			array('publicacion_id', 'numerical', 'integerOnly'=>true),
			array('cantidad_megusta', 'length', 'max'=>10),
			array('ip_megusta', 'length', 'max'=>25),
			array('fecha_megusta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, publicacion_id, cantidad_megusta, ip_megusta, fecha_megusta', 'safe', 'on'=>'search'),
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
			'publicacion' => array(self::BELONGS_TO, 'Publicaciones', 'publicacion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'publicacion_id' => 'Publicacion',
			'cantidad_megusta' => 'Cantidad',
			'ip_megusta' => 'Ip',
			'fecha_megusta' => 'Fecha',
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
		$criteria->compare('publicacion_id',$this->publicacion_id);
		$criteria->compare('cantidad_megusta',$this->cantidad_megusta,true);
		$criteria->compare('ip_megusta',$this->ip_megusta,true);
		$criteria->compare('fecha_megusta',$this->fecha_megusta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MegustaPublicacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
