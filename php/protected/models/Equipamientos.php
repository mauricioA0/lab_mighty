<?php

/**
 * This is the model class for table "equipamientos".
 *
 * The followings are the available columns in table 'equipamientos':
 * @property integer $id
 * @property integer $modelo_id
 * @property string $detalle_equip
 * @property string $seccion_equip
 * @property string $habilitar_equip
 * @property string $fecha_carga_equip
 *
 * The followings are the available model relations:
 * @property Modelo $modelo
 */
class Equipamientos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'equipamientos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modelo_id, detalle_equip, seccion_equip, habilitar_equip', 'required'),
			array('modelo_id', 'numerical', 'integerOnly'=>true),
			array('seccion_equip', 'length', 'max'=>100),
			array('habilitar_equip', 'length', 'max'=>2),
			array('fecha_carga_equip', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modelo_id, detalle_equip, seccion_equip, habilitar_equip, fecha_carga_equip', 'safe', 'on'=>'search'),
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
			'detalle_equip' => 'Detalle Equip',
			'seccion_equip' => 'Seccion Equip',
			'habilitar_equip' => 'Habilitar Equip',
			'fecha_carga_equip' => 'Fecha Carga Equip',
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
		$criteria->compare('detalle_equip',$this->detalle_equip,true);
		$criteria->compare('seccion_equip',$this->seccion_equip,true);
		$criteria->compare('habilitar_equip',$this->habilitar_equip,true);
		$criteria->compare('fecha_carga_equip',$this->fecha_carga_equip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Equipamientos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
