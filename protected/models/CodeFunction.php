<?php

/**
 * This is the model class for table "{{code_function}}".
 *
 * The followings are the available columns in table '{{code_function}}':
 * @property integer $cfid
 * @property string $title
 * @property integer $sort
 * @property integer $read_count
 * @property string $created_at
 * @property string $updated_at
 * @property integer $ct_id
 * @property integer $pl_id
 *
 * The followings are the available model relations:
 * @property CodeFragment[] $codeFragments
 * @property CodeType $ct
 */
class CodeFunction extends ZkpcActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeFunction the static model class
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
		return '{{code_function}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('sort, read_count, ct_id, pl_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>64),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cfid, title, sort, read_count, created_at, updated_at, ct_id, pl_id', 'safe', 'on'=>'search'),
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
			'codeFragments' => array(self::HAS_MANY, 'CodeFragment', 'cfu_id'),
			'codeType' => array(self::BELONGS_TO, 'CodeType', 'ct_id'),
			'programmingLanguage' => array(self::BELONGS_TO, 'ProgrammingLanguage', 'pl_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cfid' => 'Cfid',
			'title' => 'Title',
			'sort' => 'Sort',
			'read_count' => 'Read Count',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'ct_id' => 'Ct',
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

		$criteria->compare('cfid',$this->cfid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('read_count',$this->read_count);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('ct_id',$this->ct_id);
		$criteria->compare('pl_id',$this->pl_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}