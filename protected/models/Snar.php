<?php

/**
 * This is the model class for table "tbl_snar".
 *
 * The followings are the available columns in table 'tbl_snar':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $weight
 * @property integer $status
 * @property integer $owner_id
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property SnarGroupReference[] $snarGroupReferences
 */
class Snar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Snar the static model class
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
		return 'tbl_snar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, owner_id', 'required'),
			array('weight, status, owner_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>128),
			array('description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, description, weight, status, owner_id', 'safe', 'on'=>'search'),
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
			'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
			'snarGroupReferences' => array(self::HAS_MANY, 'SnarGroupReference', 'snar_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'weight' => 'Weight',
			'status' => 'Status',
			'owner_id' => 'Owner',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('status',$this->status);
		$criteria->compare('owner_id',$this->owner_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
public function getUrl()
    {
        return Yii::app()->createUrl('snar/view', array(
            'id'=>$this->id,
            'title'=>$this->title,
        ));
    }
}
