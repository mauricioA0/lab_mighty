<?php

/**
 * This is the model class for table "tipoPlan".
 *
 * The followings are the available columns in table 'tipoPlan':
 * @property integer $id
 * @property string $nombre_plan
 * @property string $detalle_plan
 */
class TipoPlan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipoPlan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_plan, detalle_plan', 'required'),
			array('nombre_plan', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre_plan, detalle_plan', 'safe', 'on'=>'search'),
		);
	}




	//Genera un slug momentaneo para poder agregar el tipo de plan sin simbolos para el %
	public static function generarSlugTipoPlan($tipo)
	{
		$slug = '';

                // se fuerza el slug para no tocar el modelo
                switch ($tipo) {
                    
                    case '100%':
                            $slug = '100-porciento-financiado';
                        break;
                    
                    case '75/25':
                            $slug = '75-porciento-financiado';
                        break;
                    
                    case '70/30':
                            $slug = '70-porciento-financiado';
                        break;
                    
                    case '60/40':
                            $slug = '60-porciento-financiado';
                        break;
                    
                    case '50/50':
                            $slug = '50-porciento-financiado';
                        break;
                    
                    default:
                            $slug = $tipo;
                        break;
                }
                
		/*if($tipo == '100%')
		{
			$slug = '100-porciento';
		}
		else
		{
			$slug = str_replace('/', '-', $tipo);
		}*/
		
		return $slug;

	}



	public static function generarSlug($modelo, $tipoplan)
	{
                switch ($tipoplan) {
                    
                    case '100-porciento-financiado':
                            $tipo = '100%';
                        break;
                    
                    case '75-porciento-financiado':
                            $tipo = '75/25';
                        break;
                    
                    case '70-porciento-financiado':
                            $tipo = '70/30';
                        break;
                    
                    case '60-porciento-financiado':
                            $tipo = '60/40';
                        break;
                    
                    case '50-porciento-financiado':
                            $tipo = '50/50';
                        break;
                    
                    default:
                            $tipo = $tipo;
                        break;
                }
                
		/*if($tipoplan == '100-porciento')
		{
			$tipo = '100%';
		}
		else
		{
			$tipo = str_replace('-', '/', $tipoplan);
		}*/

		$slug = $modelo.'-'.$tipo;

		return $slug;
	}



	public static function findDetallePlanByTipoPlan($tipo)
	{
		$detalle = TipoPlan::model()->findByAttributes(array('nombre_plan'=>$tipo));
		$detalle =$detalle->detalle_plan;

		return $detalle;
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
			'nombre_plan' => 'Nombre',
			'detalle_plan' => 'Detalle',
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
		$criteria->compare('nombre_plan',$this->nombre_plan,true);
		$criteria->compare('detalle_plan',$this->detalle_plan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TipoPlan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
