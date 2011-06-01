<?php

/**
 * This is the model class for table "tbl_group".
 *
 * The followings are the available columns in table 'tbl_group':
 * @property integer $id
 * @property string $groupname
 * @property string $maillist
 * @property integer $admin_id
 *
 * The followings are the available model relations:
 * @property User $admin
 * @property SnarGroupReference[] $snarGroupReferences
 * @property UserGroupReference[] $userGroupReferences
 */
class Group extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Group the static model class
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
		return 'tbl_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groupname, maillist, admin_id', 'required'),
			array('admin_id', 'numerical', 'integerOnly'=>true),
			array('groupname, maillist', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, groupname, maillist, admin_id', 'safe', 'on'=>'search'),
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
			'admin' => array(self::BELONGS_TO, 'User', 'admin_id'),
			'snarGroupReferences' => array(self::HAS_MANY, 'SnarGroupReference', 'group_id'),
			'userGroupReferences' => array(self::HAS_MANY, 'UserGroupReference', 'group_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'groupname' => 'Groupname',
			'maillist' => 'Maillist',
			'admin_id' => 'Admin',
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
		$criteria->compare('groupname',$this->groupname,true);
		$criteria->compare('maillist',$this->maillist,true);
		$criteria->compare('admin_id',$this->admin_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}