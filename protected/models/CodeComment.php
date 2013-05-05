<?php

/**
 * This is the model class for table "{{code_comment}}".
 *
 * The followings are the available columns in table '{{code_comment}}':
 * @property integer $ccid
 * @property integer $pid
 * @property string $path
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 * @property integer $cfr_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property CodeFragment $cfr
 */
class CodeComment extends ZkpcActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodeComment the static model class
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
		return '{{code_comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('cfr_id, user_id', 'numerical', 'pid', 'integerOnly'=>true),
			array('content, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ccid, pid, path, content, created_at, updated_at, cfr_id, user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'cfr' => array(self::BELONGS_TO, 'CodeFragment', 'cfr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ccid' => 'Ccid',
            'pid' => 'Pid',
            'path' => 'Path',
			'content' => 'Content',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'cfr_id' => 'Cfr',
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

		$criteria->compare('ccid',$this->ccid);
        $criteria->compare('pid', $this->pid);
        $criteria->compare('path', $this->path, true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('cfr_id',$this->cfr_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}