<?php

/**
 * This is the model class for table "sitios".
 *
 * The followings are the available columns in table 'sitios':
 * @property string $id
 * @property string $nombre_sitio
 * @property string $url_sitio
 * @property string $descripcion_prov
 */
class Sitios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sitios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_sitio, url_sitio', 'required'),
			array('nombre_sitio, url_sitio, descripcion_prov', 'length', 'max'=>100),
			array('id, nombre_sitio, url_sitio', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return 
	 */
	public function relations()
	{
		return array(

			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre_sitio' => 'Nombre Sitio',
			'url_sitio' => 'Url Sitio',
                        'descripcion_prov' => 'Descripcion Prov',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('nombre_sitio',$this->nombre_sitio,true);
		$criteria->compare('url_sitio',$this->url_sitio,true);
		$criteria->compare('descripcion_prov',$this->descripcion_prov,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sitios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public static function findNombre($nombre)
	{
		$criteria = new CDbCriteria();

		$criteria->addCondition('t.url_sitio LIKE  "%'.$nombre.'%"', 'AND');

		$sitios = Sitios::model()->findAll($criteria);

		return array('sitios'=>$sitios);

	}
}
