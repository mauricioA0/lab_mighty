<?php

/**
 * This is the model class for table "consultas".
 *
 * The followings are the available columns in table 'consultas':
 * @property integer $id
 * @property integer $publicacion_id
 * @property string $nombre_cons
 * @property string $email_cons
 * @property string $tel_cons
 * @property string $cel_cons
 * @property string $provincia_cons
 * @property string $tipo_plan_cons
 * @property integer $cant_cuotas_coons
 * @property string $nombre_plan_con
 * @property string $consulta_cons
 */
class Consultas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'consultas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publicacion_id, nombre_cons, email_cons, tel_cons, consulta_cons', 'required', 'message'=>'Complete el campo'),
			array('publicacion_id, cant_cuotas_coons', 'numerical', 'integerOnly'=>true),
			array('nombre_cons, email_cons', 'length', 'max'=>100),
			array('tel_cons, cel_cons', 'length','min'=>7, 'max'=>25),
			array('provincia_cons, nombre_plan_con', 'length', 'max'=>50),
			array('tipo_plan_cons', 'length', 'max'=>10),
			array('nombre_cons', 'length', 'min'=>2),
			array('email_cons', 'email', 'message'=>'El formato del E-mail es incorrecto'),
			array('provincia_cons', 'required', 'message'=>'Seleccione una provincia'),
			/*array('tel_cons', 'numerical', 
				  'integerOnly'=>true, 
				  'min'=>1111111,
				  'max'=>999999999999999,
				  'tooSmall'=>'Debe ingresar al menos 7 números incluyendo el cod. area',
    			  'tooBig'=>'Máximo 13 números'),*/

			/*array('cel_cons', 'numerical', 
				  'integerOnly'=>true, 
				  'min'=>1111111,
				  'max'=>99999999999999999,
				  'tooSmall'=>'Debe ingresar al menos 7 números incluyendo el cod. area',
    			  'tooBig'=>'Máximo 15 números'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, publicacion_id, nombre_cons, email_cons, tel_cons, cel_cons, provincia_cons, tipo_plan_cons, cant_cuotas_coons, nombre_plan_con, consulta_cons', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'publicacion_id' => 'Publicacion',
			'nombre_cons' => 'Nombre',
			'email_cons' => 'Email',
			'tel_cons' => 'Tel',
			'cel_cons' => 'Cel',
			'provincia_cons' => 'Provincia',
			'tipo_plan_cons' => 'Tipo Plan',
			'cant_cuotas_coons' => 'Cant Cuotas',
			'nombre_plan_con' => 'Nombre Plan',
			'consulta_cons' => 'Consulta',
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
		$criteria->compare('nombre_cons',$this->nombre_cons,true);
		$criteria->compare('email_cons',$this->email_cons,true);
		$criteria->compare('tel_cons',$this->tel_cons,true);
		$criteria->compare('cel_cons',$this->cel_cons,true);
		$criteria->compare('provincia_cons',$this->provincia_cons,true);
		$criteria->compare('tipo_plan_cons',$this->tipo_plan_cons,true);
		$criteria->compare('cant_cuotas_coons',$this->cant_cuotas_coons);
		$criteria->compare('nombre_plan_con',$this->nombre_plan_con,true);
		$criteria->compare('consulta_cons',$this->consulta_cons,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Consultas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
