<?php

/**
 * This is the model class for table "tbl_user_group_reference".
 *
 * The followings are the available columns in table 'tbl_user_group_reference':
 * @property integer $id
 * @property integer $group_id
 * @property integer $user_id
 * @property integer $user_status
 * @property string $user_role
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Group $group
 */
class UserGroupReference extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserGroupReference the static model class
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
		return 'tbl_user_group_reference';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, user_id', 'required'),
			array('group_id, user_id, user_status ', 'numerical', 'integerOnly'=>true),
			array('user_role, user_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, group_id, user_id, user_status, user_role', 'safe', 'on'=>'search'),
		);
	}
    public static function loadUserNames($type=null)
    {
		$myItems=array();
        $models=self::model()->findAll(array(
        ));
        foreach($models as $model)
            $myItems[$model->id]=$model->user->username;
		return $myItems;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'carrySnarCount' => array(self::STAT, 'Snar','tbl_snar_group_reference(carrier_id,snar_id)',
			'condition' => 'tbl_snar_group_reference.group_id = 1',
			),
			'snarWeight' => array(self::STAT, 'Snar','tbl_snar_group_reference(carrier_id,snar_id)',
			'condition' => 'tbl_snar_group_reference.group_id = 1',
			'select'=>'SUM(weight)',
			),
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
			'user_id' => 'User',
			'user_status' => 'User Status',
			'user_role' => 'должность',
			'user_name' => 'имя',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_status',$this->user_status);
		$criteria->compare('user_role',$this->user_role,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function snarDiff(){ 
		$has_weight = $this->snarWeight();
		if( 2 == $this->user->profile->gender) $need_weight = $this->group->male_weight();
		else $need_weight = $this->group->female_weight();
		return $has_weight-$need_weight;
	} 
}
