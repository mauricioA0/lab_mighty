<?php

/**
 * This is the model class for table "fichaTecnica".
 *
 * The followings are the available columns in table 'fichaTecnica':
 * @property integer $id
 * @property integer $modelo_id
 * @property string $archivo_ficha
 * @property string $Habilitar_ficha
 * @property string $fecha_carga_ficha
 *
 * The followings are the available model relations:
 * @property Modelo $modelo
 */
class FichaTecnica extends CActiveRecord
{


	public static $pathFicha = '/uploads/fichas_tecnicas/';



	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fichaTecnica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modelo_id, archivo_ficha, Habilitar_ficha', 'required'),
			array('modelo_id', 'numerical', 'integerOnly'=>true),
			array('archivo_ficha', 'length', 'max'=>100),
			array('Habilitar_ficha', 'length', 'max'=>2),
			array('fecha_carga_ficha', 'safe'),
			array('archivo_ficha', 'file',
                  'types'=>'pdf',
                  'maxSize'=>1024 * 1024 * 10, // 2MB
                  'tooLarge'=>'El archivo supera los 10MB. Por favor intente con un archivo mas chico',
                  'allowEmpty' => true,
                  'on'=>'insert'),

			array('archivo_ficha', 'file',
                  'types'=>'pdf',
                  'maxSize'=>1024 * 1024 * 10, // 2MB
                  'tooLarge'=>'El archivo supera los 10MB. Por favor intente con un archivo mas chico',
                  'allowEmpty' => true,
                  'on'=>'update'),


			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modelo_id, archivo_ficha, Habilitar_ficha, fecha_carga_ficha', 'safe', 'on'=>'search'),
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
			'archivo_ficha' => 'Archivo Ficha',
			'Habilitar_ficha' => 'Habilitar Ficha',
			'fecha_carga_ficha' => 'Fecha Carga Ficha',
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
		$criteria->compare('archivo_ficha',$this->archivo_ficha,true);
		$criteria->compare('Habilitar_ficha',$this->Habilitar_ficha,true);
		$criteria->compare('fecha_carga_ficha',$this->fecha_carga_ficha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FichaTecnica the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
