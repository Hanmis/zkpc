<?php

/**
 * This is the model class for table "{{code_type}}".
 *
 * The followings are the available columns in table '{{code_type}}':
 * @property integer $ctid
 * @property string $name
 * @property integer $state
 * @property integer $sort
 * @property integer $pl_id
 *
 * The followings are the available model relations:
 * @property CodeFunction[] $codeFunctions
 * @property ProgrammingLanguage $pl
 */
class CodeType extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeType the static model class
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
		return '{{code_type}}';
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
			array('state, sort, pl_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ctid, name, state, sort, pl_id', 'safe', 'on'=>'search'),
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
			'codeFunctions' => array(self::HAS_MANY, 'CodeFunction', 'ct_id'),
			'programminglanguage' => array(self::BELONGS_TO, 'ProgrammingLanguage', 'pl_id'),
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
			'pl_id' => 'Pl',
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
		$criteria->compare('pl_id',$this->pl_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}