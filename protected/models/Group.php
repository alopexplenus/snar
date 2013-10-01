<?php

/**
 * This is the model class for table "tbl_group".
 *
 * The followings are the available columns in table 'tbl_group':
 * @property integer $id
 * @property string $groupname
 * @property string $maillist
 * @property integer $admin_id
 * @property double $weight_factor
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
			array('groupname, maillist, admin_id, weight_factor', 'required'),
			array('admin_id', 'numerical', 'integerOnly'=>true),
			array('slon_message_subject, groupname, maillist', 'length', 'max'=>128),
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
			'snars' => array(self::MANY_MANY, 'Snar','tbl_snar_group_reference(group_id,snar_id)',
			'order'=>'title',
			//'condition'=>'snars.weight=500',
			'condition' => 'status ='.Snar::STATUS_GROUP,
			),
			'snarGroupReferences' => array(self::HAS_MANY, 'SnarGroupReference', 'group_id',
			'order'=>'carrier_id',
			),
			'userGroupReferences' => array(self::HAS_MANY, 'UserGroupReference', 'group_id'),
			'userCount' => array(self::STAT, 'UserGroupReference', 'group_id',),
			'maleCount' => array(self::STAT, 'Profile', 'tbl_user_group_reference(group_id,user_id)',
			'condition'=>'gender=1',
			),
			'snarCount' => array(self::STAT, 'Snar','tbl_snar_group_reference(group_id,snar_id)',
			//'condition'=>'weight=500',
			//'condition' => 'status ='.Snar::STATUS_GROUP,
			),
			'snarWeight' => array(self::STAT, 'Snar','tbl_snar_group_reference(group_id,snar_id)',
			//'condition'=>'weight=500',
			//'condition' => 'status ='.Snar::STATUS_GROUP,
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
			'groupname' => 'Название группы',
			'maillist' => 'список рассылки',
			'admin_id' => 'Admin',
			'weight_factor' => 'женский коэффициент',
			'slon_message'=>'текст слоновьей записки',
			'slon_message_subject'=>'тема слоновьей записки',
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
	public function average_weight(){ 
		if (!$this->userCount)return 0;
		return floor($this->snarWeight/$this->userCount);
	} 
	public function male_weight(){ 
		if (!$this->userCount)return 0;
		if (!$this->maleCount)return 0;
		return floor(($this->snarWeight/$this->userCount)*
		($this->userCount-($this->userCount-$this->maleCount)*$this->weight_factor)/$this->maleCount); 
	} 
	public function female_weight(){ 
		if (!$this->userCount)return 0;
		return floor($this->snarWeight/$this->userCount*$this->weight_factor);
	} 
	public function sendslon(){ 
			$users = $this->userGroupReferences;
			shuffle($users);
			$first_emitter = array_pop($users);
			$emitter = clone $first_emitter;
		while($collector= array_pop($users)){ 
				sendslonmessage($emitter,$collector);
				$emitter = $collector;
		} 
		sendslonmessage($emitter,$first_emitter);
	}
	public function sendslonmessage($emitter_reference,$collector_reference){ 
				$subject = $this->slon_message_subject;
				$message= $this->slon_message."\n\n Вот хороший человек, который ждёт не дождётся своего слона: \n ".$collector_reference->user->profile->firstname.$collector_reference->user->profile->lastname;
				$headers="From:nik@niksem.ru";
				mail($emitter_reference->user->email,$subject,$message,$headers);
	}
	public function amIMember(){ 
		$occurences = $this->userGroupReferences(array('condition'=>'user_id='.Yii::app()->user->id));
		if (empty($occurences))return false;
		else return true;
	} 
	public function tryJoin(){ 
		if (!$this->amIMember()){
			$gr = new UserGroupReference();
			$gr->user_id = Yii::app()->user->id;
			$gr->group_id = $this->id; 
			$gr->save();
		}
	} 
	public function isSnarInGroup($id){ 
		$occurences = $this->snarGroupReferences(array('condition'=>'snar_id='.$id));
		if (empty($occurences))return false;
		else return true;
	} 
	public function tryAddSnar($id){ 
		if (!$this->isSnarInGroup($id)){
			$gr = new SnarGroupReference();
			$gr->snar_id = $id;
			$gr->group_id = $this->id; 
			$gr->save();
		}
	} 
}
