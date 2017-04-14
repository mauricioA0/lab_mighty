<?php

/**
 * This is the model class for table "reventas".
 *
 * The followings are the available columns in table 'reventas':
 * @property string $idReventa
 * @property string $nombreReventa
 * @property integer $enabledReventa
 * @property string $nombreCortoReventa
 * @property string $emailReventa
 * @property string $datosContacto
 * @property string $descargo
 */
class Reventas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reventas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreReventa, enabledReventa, nombreCortoReventa, emailReventa', 'required'),
			array('enabledReventa', 'numerical', 'integerOnly'=>true),
			array('nombreReventa', 'length', 'max'=>40),
			array('nombreCortoReventa', 'length', 'max'=>15),
			array('emailReventa', 'length', 'max'=>150),
			array('datosContacto, descargo', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idReventa, nombreReventa, enabledReventa, nombreCortoReventa, emailReventa, datosContacto, descargo', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idReventa' => 'Id',
			'nombreReventa' => 'Nombre',
			'enabledReventa' => 'Habilitar',
			'nombreCortoReventa' => 'Nombre Corto',
			'emailReventa' => 'Email',
			'datosContacto' => 'Datos',
			'descargo' => 'Descargo',
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

		$criteria->compare('idReventa',$this->idReventa,true);
		$criteria->compare('nombreReventa',$this->nombreReventa,true);
		$criteria->compare('enabledReventa',$this->enabledReventa);
		$criteria->compare('nombreCortoReventa',$this->nombreCortoReventa,true);
		$criteria->compare('emailReventa',$this->emailReventa,true);
		$criteria->compare('datosContacto',$this->datosContacto,true);
		$criteria->compare('descargo',$this->descargo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reventas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
