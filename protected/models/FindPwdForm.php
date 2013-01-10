<?php

class FindPwdForm extends CFormModel
{
	public $email;

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('email', 'required', 'message'=>'Email不能为空'),
            array('email', 'email', 'message'=>'请输入正确的邮箱'),
            array('email', 'authenticate'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'email'=>'注册邮箱',
		);
	}
	
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$user = User::model()->find('LOWER(email)=?', array(strtolower($this->email)));
			if (!isset($user->email))
				$this->addError('email','此邮箱没有注册过');			
		}
	}
}
