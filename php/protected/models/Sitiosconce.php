<?php

/**
 * This is the model class for table "sitiosconce".
 *
 * The followings are the available columns in table 'sitiosconce':
 * @property integer $id
 * @property integer $sitio_id
 * @property integer $conce_id
 * 
 */
class Sitiosconce extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sitiosconce';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('sitio_id, conce_id', 'required'),
			array('sitio_id, conce_id', 'numerical', 'integerOnly'=>true),
			array('id, sitio_id, conce_id', 'safe', 'on'=>'search'),
		);
	}


	public static function findByIdSitioAndConceHabilitado($site)
	{

		$criteria = new CDbCriteria();
		$criteria->join =  'INNER JOIN concesionarios as C ON t.conce_id = C.id';
		$criteria->condition = 'sitio_id = :site AND C.habilitar_conce = :hab';
		$criteria->params = array(':site'=>$site->id, ':hab'=>'SI');

		$sitiosconce = Sitiosconce::model()->findAll($criteria);

		return $sitiosconce;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(

			'sitios'=>array(self::BELONGS_TO, 'Sitios', 'sitio_id'),
			'concesionarios'=>array(self::BELONGS_TO, 'Concesionarios', 'conce_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sitio_id' => 'Sitio',
			'conce_id' => 'Concesionarios',
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
		$criteria->compare('sitio_id',$this->sitio_id);
		$criteria->compare('conce_id',$this->conce_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sitiosconce the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
