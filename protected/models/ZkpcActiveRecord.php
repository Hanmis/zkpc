<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 12-12-8
 * Time: 下午5:17
 * To change this template use File | Settings | File Templates.
 */
abstract class ZkpcActiveRecord extends CActiveRecord
{
    public function beforeValidate()
    {
        if($this->isNewRecord)
        {
            //set the create date, last updated date
            $this->created_at = $this->updated_at = new CDbExpression('NOW()');
        } else {
            //not a new record, so just set the last updated time
            //and last updated user id
            $this->updated_at = new CDbExpression('NOW()');
            //$this->update_user_id = Yii::app()->user->id;
        }
        return parent::beforeValidate();
    }
}