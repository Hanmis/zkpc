<?php

/**
 * This is the model class for table "{{coolsite}}".
 *
 * The followings are the available columns in table '{{coolsite}}':
 * @property integer $cid
 * @property string $name
 * @property string $favicon
 * @property string $url
 * @property integer $state
 * @property integer $sort
 * @property integer $user_id
 * @property integer $ct_id
 *
 * The followings are the available model relations:
 * @property CoolsiteType $ct
 * @property User $user
 */
class Coolsite extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Coolsite the static model class
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
		return '{{coolsite}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required', 'message'=>'请输入名称'),
            array('url', 'required', 'message'=>'请输入网站地址'),
            array('url', 'url', 'message'=>'请输入正确的网址'),
			array('state, sort, user_id, ct_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			array('favicon, url', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cid, name, favicon, url, state, sort, user_id, ct_id', 'safe', 'on'=>'search'),
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
			'ct' => array(self::BELONGS_TO, 'CoolsiteType', 'ct_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cid' => 'Cid',
			'name' => 'Name',
			'favicon' => 'Favicon',
			'url' => 'Url',
			'state' => 'State',
			'sort' => 'Sort',
			'user_id' => 'User',
			'ct_id' => 'Ct',
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

		$criteria->compare('cid',$this->cid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('favicon',$this->favicon,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('ct_id',$this->ct_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}