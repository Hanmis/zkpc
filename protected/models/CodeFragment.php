<?php

/**
 * This is the model class for table "{{code_fragment}}".
 *
 * The followings are the available columns in table '{{code_fragment}}':
 * @property integer $cfid
 * @property string $intro
 * @property string $code
 * @property integer $sort
 * @property integer $comments_count
 * @property integer $love_count
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user_id
 * @property integer $cfu_id
 *
 * The followings are the available model relations:
 * @property CodeComment[] $codeComments
 * @property User $user
 * @property CodeFunction $cfu
 */
class CodeFragment extends ZkpcActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeFragment the static model class
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
		return '{{code_fragment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code', 'required'),
			array('sort, comments_count, love_count, user_id, cfu_id', 'numerical', 'integerOnly'=>true),
			array('intro, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cfid, intro, code, sort, comments_count, love_count, created_at, updated_at, user_id, cfu_id', 'safe', 'on'=>'search'),
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
			'codeComments' => array(self::HAS_MANY, 'CodeComment', 'cfr_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'cfu' => array(self::BELONGS_TO, 'CodeFunction', 'cfu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cfid' => 'Cfid',
			'intro' => 'Intro',
			'code' => 'Code',
			'sort' => 'Sort',
			'comments_count' => 'Comments Count',
			'love_count' => 'Love Count',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'user_id' => 'User',
			'cfu_id' => 'Cfu',
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
		$criteria->compare('intro',$this->intro,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('comments_count',$this->comments_count);
		$criteria->compare('love_count',$this->love_count);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('cfu_id',$this->cfu_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}