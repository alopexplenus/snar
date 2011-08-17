<?php

/**
 * This is the model class for table "tbl_snar_group_reference".
 *
 * The followings are the available columns in table 'tbl_snar_group_reference':
 * @property integer $id
 * @property integer $group_id
 * @property integer $snar_id
 * @property integer $snar_status
 * @property integer $carrier_id
 *
 * The followings are the available model relations:
 * @property Snar $snar
 * @property Group $group
 */
class SnarGroupReference extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SnarGroupReference the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_snar_group_reference';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, snar_id, snar_status', 'required'),
			array('group_id, snar_id, snar_status, carrier_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_id, snar_id, snar_status, carrier_id', 'safe', 'on'=>'search'),
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
			'snar' => array(self::BELONGS_TO, 'Snar', 'snar_id'),
			'carrier' => array(self::BELONGS_TO, 'User', 'carrier_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'group_id' => 'Group',
			'snar_id' => 'Snar',
			'snar_status' => 'Snar Status',
			'carrier_id' => 'Carrier',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('snar_id',$this->snar_id);
		$criteria->compare('snar_status',$this->snar_status);
		$criteria->compare('carrier_id',$this->carrier_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
public function getUrl()
    {
        return Yii::app()->createUrl('snarGroupReference/update', array(
            'id'=>$this->id,
            'title'=>$this->snar->title,
        ));
    }
}
