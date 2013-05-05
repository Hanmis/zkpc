<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 12-12-17
 * Time: 下午9:06
 * To change this template use File | Settings | File Templates.
 */

//echo $model->uid."<br/>";
//echo $model->username."<br/>";
//echo $model->email."<br/>";
//echo $model->name."<br/>";
//echo $model->avatar_file_name."<br/>";
//echo $model->state."<br/>";
//echo $model->website."<br/>";
//echo CHtml::image($model->avatar_file_name);
?>
<div class="userinfo">
    <div class="table">
        <table>
            <tr class="with_nbsp">
                <td><label></label></td>
                <td><span class="title">第 <?php echo $model->uid;?> 位会员</span></td>
            </tr>
            <tr>
                <td><label>ID:</label></td>
                <td><strong class="fn"><?php echo $model->username;?></strong></td>
                <td rowspan="6"><?php echo CHtml::image($model->avatar_file_name);?></td>
            </tr>
            <tr>
                <td><label>Name:</label></td>
                <td><strong><?php echo $model->name;?></strong></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><span>
                <a href="mailto:<?php echo $model->email;?>"><?php echo $model->email;?></a>
                </span></td>
            </tr>
            <tr>
                <td><label>博客:</label></td>
                <td><span>
                <a class="url" target="_blank" href="<?php echo $model->website;?>"><?php echo $model->website;?></a>
                </span></td>
            </tr>
            <tr>
                <td><label>签名:</label></td>
                <td><span><?php echo $model->signature;?></span></td>
            </tr>
            <tr>
                <td><label>Since:</label></td>
                <td><span><?php echo $model->created_at;?></span></td>
            </tr>
        </table>
    </div>
    <hr/>
    <div>
        <h5>个人介绍</h5>
        <p>
            <?php echo $model->p_Intro;?>
        </p>
    </div>
</div>
