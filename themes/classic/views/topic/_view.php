<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-4-23
 * Time: 下午2:06
 * To change this template use File | Settings | File Templates.
 */
?>
    <div class="topic_line">
            <div class="avatar">
                <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$data->user->uid));?>">
                    <img style="width:48px;height:48px;"  src="<?php echo User::get_gravatar($data->user->email);?>" alt="">
                </a>
            </div>
            <div class="right_info">
                <?php if($data->replies_count != 0):?>
                <div class="right_replies_count">
                    <a class="count state_false" href="<?php echo Yii::app()->createUrl('topic/view', array('tid'=>$data->tid));?>"><?php echo $data->replies_count;?></a>
                </div>
                <?php endif;?>
                <div class="infos">
                    <div class="title" style="margin: 5px; font-size: 14px;">
                        <a title="<?php echo $data->title;?>" href="<?php echo Yii::app()->createUrl('topic/view', array('tid'=>$data->tid));?>"><?php echo $data->title;?></a>
                    </div>
                    <div class="info">
                        <a class="node" href="<?php echo Yii::app()->createUrl('Topic/indexNode', array('node_id'=>$data->node->nid));?>"><?php echo $data->node->name;?></a>
                        •
                        <a data-name="" href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$data->user->uid));?>"><?php echo $data->user->name;?></a>
                        于
                        <abbr class="timeago" title="<?php echo $data->created_at;?>"><?php echo Helper::datetime_diff($data->created_at);?></abbr>
                        发布
                        <em>
                            • 最后由
                            <a data-name="" href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$data->last_reply_user_id));?>"><?php echo Helper::getNameById($data->last_reply_user_id);?></a>
                            于
                            <abbr class="timeago" title="<?php echo $data->replied_at;?>"><?php echo Helper::datetime_diff($data->replied_at);?></abbr>
                            回复
                        </em>
                    </div>
                </div>
            </div>
        </div>