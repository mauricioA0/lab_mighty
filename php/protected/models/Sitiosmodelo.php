<?php

/**
 * This is the model class for table "sitiosmodelo".
 *
 * The followings are the available columns in table 'sitiosmodelo':
 * @property integer $id
 * @property integer $sitio_id
 * @property integer $modelo_id
 */
class Sitiosmodelo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sitiosmodelo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{

		return array(
			array('sitio_id, modelo_id', 'required'),
			array('sitio_id, modelo_id', 'numerical', 'integerOnly'=>true),
			array('id, sitio_id, modelo_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(

			'categories'=>array(self::MANY_MANY, 'Category', 'PostCategory(postID, categoryID)'),
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
			'modelo_id' => 'Modelo',
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
		$criteria->compare('modelo_id',$this->modelo_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sitiosmodelo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
