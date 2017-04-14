<?php

/**
 * This is the model class for table "raty".
 *
 * The followings are the available columns in table 'raty':
 * @property integer $id
 * @property integer $modelo_id
 * @property integer $puntos_raty
 * @property integer $total_raty
 * @property integer $sitio_id
 * @property string $fecha_raty
 */
class Raty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'raty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modelo_id, puntos_raty, total_raty, sitio_id, fecha_raty', 'required'),
			array('modelo_id, puntos_raty, total_raty, sitio_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, modelo_id, puntos_raty, total_raty, sitio_id, fecha_raty', 'safe', 'on'=>'search'),
		);
	}



	public static function findUpdateRatyByIdModelo($idmod, $voto)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'modelo_id = :idmod';
		$criteria->params = array(':idmod'=>$idmod);

		$raty = Raty::model()->find($criteria);

		$raty->puntos_raty = $raty->puntos_raty + $voto;
		$raty->total_raty = $raty->total_raty + 1;

		if($raty->update())
		{
			$promedio = $raty->puntos_raty  / $raty->total_raty;
			$promedio = number_format($promedio, 1);
		}
		
		return $promedio;
	}



	public static function findRatyByIdModelo($idmod)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'modelo_id = :idmod';
		$criteria->params = array(':idmod'=>$idmod);

		$raty = Raty::model()->find($criteria);
                if($raty){
                    $promedio = $raty->puntos_raty  / $raty->total_raty;
                    $promedio = number_format($promedio, 1);
                    
                    return $promedio;
                }
		
	}
        
        public static function findRatyByIdModeloTot($idmod)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = 'modelo_id = :idmod';
		$criteria->params = array(':idmod'=>$idmod);

		$raty = Raty::model()->find($criteria);
                
                if($raty){
                    return " ".$raty->total_raty." ";
                }
		
	}




	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(

			'modelos'=>array(self::BELONGS_TO, 'Modelo', 'modelo_id'),
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
			'puntos_raty' => 'Puntos Raty',
			'total_raty' => 'Total Raty',
			'sitio_id' => 'Sitio',
			'fecha_raty' => 'Fecha',
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
		$criteria->compare('puntos_raty',$this->puntos_raty);
		$criteria->compare('total_raty',$this->total_raty);
		$criteria->compare('sitio_id',$this->sitio_id);
		$criteria->compare('fecha_raty',$this->fecha_raty,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Raty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
