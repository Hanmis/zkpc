<?php

/**
 * This is the model class for table "{{coolsite_type}}".
 *
 * The followings are the available columns in table '{{coolsite_type}}':
 * @property integer $ctid
 * @property string $name
 * @property integer $state
 * @property integer $sort
 *
 * The followings are the available model relations:
 * @property Coolsite[] $coolsites
 */
class CoolsiteType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CoolsiteType the static model class
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
		return '{{coolsite_type}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('state, sort', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ctid, name, state, sort', 'safe', 'on'=>'search'),
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
			'coolsites' => array(self::HAS_MANY, 'Coolsite', 'ct_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ctid' => 'Ctid',
			'name' => 'Name',
			'state' => 'State',
			'sort' => 'Sort',
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

		$criteria->compare('ctid',$this->ctid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}