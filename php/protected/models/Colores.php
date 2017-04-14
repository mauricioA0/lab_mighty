<?php

/**
 * This is the model class for table "colores".
 *
 * The followings are the available columns in table 'colores':
 * @property integer $id
 * @property integer $modelo_id
 * @property string $nombre_color
 * @property string $hexa_color
 * @property string $habilitar_color
 */
class Colores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'colores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modelo_id, habilitar_color', 'required'),
			array('modelo_id', 'numerical', 'integerOnly'=>true),
			array('nombre_color, hexa_color', 'length', 'max'=>25),
			array('habilitar_color', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modelo_id, nombre_color, hexa_color, habilitar_color', 'safe', 'on'=>'search'),
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

			'modelos' => array(self::BELONGS_TO, 'Modelo', 'modelo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'modelo_id' => 'Modelo',
			'nombre_color' => 'Nombre Color',
			'hexa_color' => 'Hexa',
			'habilitar_color' => 'Habilitar',
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
		$criteria->compare('modelo_id',$this->modelo_id);
		$criteria->compare('nombre_color',$this->nombre_color,true);
		$criteria->compare('hexa_color',$this->hexa_color,true);
		$criteria->compare('habilitar_color',$this->habilitar_color,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Colores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
