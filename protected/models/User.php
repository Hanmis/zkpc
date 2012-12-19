<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $uid
 * @property string $username
 * @property string $email
 * @property string $name
 * @property string $avatar_file_name
 * @property integer $verified
 * @property integer $state
 * @property string $website
 * @property string $created_at
 * @property string $updated_at
 * @property string $pwd
 * @property string $pwd_salt
 * @property string $signature
 * @property string $p_Intro
 * @property string $persistence_token
 * @property integer $login_count
 * @property integer $failed_login_count
 * @property string $last_login_at
 * @property string $current_login_ip
 * @property string $last_login_ip
 * @property integer $notes_count
 */
class User extends ZkpcActiveRecord
{
    public $repwd;
    public $verifyCode;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'required', 'message'=>'用户名不能为空'),
            array('username', 'unique', 'message'=>'此用户名已注册！'),
            array('email', 'required', 'message'=>'Email不能为空'),
            array('email', 'unique', 'message'=>'此邮箱已注册'),
            array('email', 'email', 'message'=>'请输入正确的邮箱'),
            array('pwd', 'required', 'message'=>'密码不能为空'),
            array('repwd', 'compare', 'compareAttribute'=>'pwd', 'message'=>'两次输入的密码不一致'),
            array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'message'=>'验证码不正确'),

            array('verified, state, login_count, failed_login_count, notes_count', 'numerical', 'integerOnly'=>true),
			array('username, name, current_login_ip, last_login_ip', 'length', 'max'=>64),
			array('email, avatar_file_name, website, pwd, pwd_salt, signature, persistence_token', 'length', 'max'=>128),
			array('created_at, updated_at, p_Intro, last_login_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, username, email, name, avatar_file_name, verified, state, website, created_at, updated_at, pwd, pwd_salt, signature, p_Intro, persistence_token, login_count, failed_login_count, last_login_at, current_login_ip, last_login_ip, notes_count, repwd', 'safe', 'on'=>'search'),
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
            'replies' => array(self::HAS_MANY, 'Reply', 'user_id'),
            'topics' => array(self::HAS_MANY, 'Topic', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'username' => 'Username',
			'email' => 'Email',
			'name' => 'Name',
			'avatar_file_name' => 'Avatar File Name',
			'verified' => 'Verified',
			'state' => 'State',
			'website' => 'Website',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
			'pwd' => 'Pwd',
			'pwd_salt' => 'Pwd Salt',
			'signature' => 'Signature',
			'p_Intro' => 'P Intro',
			'persistence_token' => 'Persistence Token',
			'login_count' => 'Login Count',
			'failed_login_count' => 'Failed Login Count',
			'last_login_at' => 'Last Login At',
			'current_login_ip' => 'Current Login Ip',
			'last_login_ip' => 'Last Login Ip',
			'notes_count' => 'Notes Count',
            'repwd' => 'Repwd',
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

		$criteria->compare('uid',$this->uid);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('avatar_file_name',$this->avatar_file_name,true);
		$criteria->compare('verified',$this->verified);
		$criteria->compare('state',$this->state);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('pwd',$this->pwd,true);
		$criteria->compare('pwd_salt',$this->pwd_salt,true);
		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('p_Intro',$this->p_Intro,true);
		$criteria->compare('persistence_token',$this->persistence_token,true);
		$criteria->compare('login_count',$this->login_count);
		$criteria->compare('failed_login_count',$this->failed_login_count);
		$criteria->compare('last_login_at',$this->last_login_at,true);
		$criteria->compare('current_login_ip',$this->current_login_ip,true);
		$criteria->compare('last_login_ip',$this->last_login_ip,true);
		$criteria->compare('notes_count',$this->notes_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function validatePassword($pwd)
	{
		return $this->hashPassword($pwd, $this->pwd_salt) == $this->pwd;
	}
	
	public function hashPassword($pwd, $pwd_salt)
	{
		return md5($pwd_salt.$pwd);
	}

    public static function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
	    $url = 'http://www.gravatar.com/avatar/';
	    $url .= md5( strtolower( trim( $email ) ) );
	    $url .= "?s=$s&d=$d&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}
}