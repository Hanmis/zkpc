<?php

/**
 * This is the model class for table "{{reply}}".
 *
 * The followings are the available columns in table '{{reply}}':
 * @property integer $rid
 * @property string $content
 * @property integer $state
 * @property string $source
 * @property string $created_at
 * @property string $updated_at
 * @property integer $topic_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Topic $topic
 * @property User $user
 */
class Reply extends ZkpcActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Reply the static model class
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
		return '{{reply}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'required'),
			array('state, topic_id, user_id', 'numerical', 'integerOnly'=>true),
			array('source', 'length', 'max'=>64),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rid, content, state, source, created_at, updated_at, topic_id, user_id', 'safe', 'on'=>'search'),
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
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rid' => 'Rid',
			'content' => 'Content',
			'state' => 'State',
			'source' => 'Source',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'topic_id' => 'Topic',
			'user_id' => 'User',
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

		$criteria->compare('rid',$this->rid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}