<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-4-22
 * Time: 上午12:48
 * To change this template use File | Settings | File Templates.
 */
$this->breadcrumbs=array(
    '会员'=>array('member'),
);
$len = count($users);
?>

<div class="container">
    <div class="coolsite">
       <h2>Top100 会员</h2>
        <ul>
            <?php for($i=0; $i<$len; $i++):?>
            <li style="width: 88px; margin-bottom: 10px;">
                    <div style="text-align: center;"><a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$users[$i]['uid']));?>"><img style="width: 48px; height: 48px;" class="favicon" src="<?php echo User::get_gravatar($users[$i]['email']);?>" alt="Favicon"></a></div>
                    <div style="text-align: center;"><a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$users[$i]['uid']));?>"><?php echo $users[$i]['name'];?></a></div>
            </li>
            <?php endfor;?>
        </ul>
    </div>
</div>

