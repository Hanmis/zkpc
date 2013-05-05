<?php

class ResetPwdForm extends CFormModel
{
	public $email;
	public $pwd;
	public $repwd;
	public $oldpwd;

	public function rules()
	{
		return array(
            array('oldpwd', 'required', 'message'=>'密码不能为空'),
			array('pwd', 'required', 'message'=>'密码不能为空'),
            array('repwd', 'compare', 'compareAttribute'=>'pwd', 'message'=>'两次输入的密码不一致'),
		);
	}	
	
	public function attributeLabels()
	{
		return array(
			'pwd'=>'pwd',
		);
	}
}
