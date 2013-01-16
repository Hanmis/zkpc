<?php
class SharecodeForm extends CFormModel
{
	public $title;
	public $intro;
	public $code;	
	
	public function rules()
	{
		return array(
			array('title', 'required', 'message'=>'标题不能为空'),
			array('title', 'length', 'max'=>64, 'message'=>'标题过长'),
			array('code', 'required', 'message'=>'请粘贴代码'),
		);
	}
}
