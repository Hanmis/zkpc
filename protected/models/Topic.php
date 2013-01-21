<?php

/**
 * This is the model class for table "{{topic}}".
 *
 * The followings are the available columns in table '{{topic}}':
 * @property integer $tid
 * @property string $title
 * @property string $content
 * @property integer $state
 * @property integer $replies_count
 * @property integer $last_reply_user_id
 * @property string $replied_at
 * @property string $source
 * @property string $created_at
 * @property string $updated_at
 * @property integer $node_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Reply[] $replies
 * @property Node $node
 * @property User $user
 */
class Topic extends ZkpcActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topic the static model class
	 */
    const STATUS_PUBLISHED = 1;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{topic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('node_id', 'required', 'message'=>'请选择分类'),
			array('title', 'required', 'message'=>'标题不能为空'),
			array('title', 'length', 'max'=>64, 'message'=>'标题过长'),
			array('content', 'required','message'=>'内容不能为空'),		
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
            'replies' => array(self::HAS_MANY, 'Reply', 'topic_id'),
            'node' => array(self::BELONGS_TO, 'Node', 'node_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tid' => 'Tid',
			'title' => 'Title',
			'content' => 'Content',
			'state' => 'State',
			'replies_count' => 'Replies Count',
			'last_reply_user_id' => 'Last Reply User',
			'replied_at' => 'Replied At',
			'source' => 'Source',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'node_id' => 'Node',
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

		$criteria->compare('tid',$this->tid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('replies_count',$this->replies_count);
		$criteria->compare('last_reply_user_id',$this->last_reply_user_id);
		$criteria->compare('replied_at',$this->replied_at,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('node_id',$this->node_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}