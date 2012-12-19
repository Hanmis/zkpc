<?php

/**
 * This is the model class for table "{{node}}".
 *
 * The followings are the available columns in table '{{node}}':
 * @property integer $nid
 * @property string $name
 * @property integer $state
 * @property integer $sort
 * @property integer $topics_count
 * @property string $summary
 * @property integer $section_id
 *
 * The followings are the available model relations:
 * @property Section $section
 * @property Topic[] $topics
 */
class Node extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Node the static model class
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
		return '{{node}}';
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
			array('state, sort, topics_count, section_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>16),
			array('summary', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nid, name, state, sort, topics_count, summary, section_id', 'safe', 'on'=>'search'),
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
			'section' => array(self::BELONGS_TO, 'Section', 'section_id'),
			'topics' => array(self::HAS_MANY, 'Topic', 'node_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nid' => 'Nid',
			'name' => 'Name',
			'state' => 'State',
			'sort' => 'Sort',
			'topics_count' => 'Topics Count',
			'summary' => 'Summary',
			'section_id' => 'Section',
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

		$criteria->compare('nid',$this->nid);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('topics_count',$this->topics_count);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('section_id',$this->section_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}