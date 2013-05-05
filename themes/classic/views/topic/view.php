<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->title,
);
//var_dump($model->replies[0]['user_id']);exit;
//将$model->replies转化为一般数组
function genCommentArr ($arr) {
    $dataArr = array();
    $len = count($arr);
    for ($i=0; $i<$len; $i++) {
        $dataArr[$i]['rid'] = $arr[$i]['rid'];
        $dataArr[$i]['pid'] = $arr[$i]['pid'];
        $dataArr[$i]['topic_id'] = $arr[$i]['topic_id'];
        $dataArr[$i]['path'] = $arr[$i]['path'];
        $dataArr[$i]['user_id'] = $arr[$i]['user_id'];
        $dataArr[$i]['user'] = $arr[$i]->user->name;
        $dataArr[$i]['user_email'] = $arr[$i]->user->email;
        $dataArr[$i]['content'] = $arr[$i]['content'];
        $dataArr[$i]['created_at'] = $arr[$i]['created_at'];
    }
    return $dataArr;
}
//var_dump(genCommentArr($model->replies));exit
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/code/viewcode.css"/>
<!--topic内容开始-->
<div class="column2_content">
    <!--topic头部开始-->
    <div class="topic_info">
        <div class="topic_avatar_large">
            <a href="#">
                <img class="topic_user_img" src="<?php echo User::get_gravatar($model->user->email);?>" alt="">
            </a>
        </div>
        <h1 class="topic_title"><strong><?php echo $model->title;?></strong></h1>
        <div class="topic_info_leader">
            <a class="topic_node" href=""><?php echo $model->node->name;?></a>
            •
            <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$model->user->uid));?>"><?php echo $model->user->name;?></a>
            •于
            <abbr class="topic_timeago" title="<?php echo $model->created_at;?>"><?php echo Helper::datetime_diff($model->created_at);?></abbr>
            发布•最后由
            <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$model->last_reply_user_id));?>"><?php print_r(Helper::getNameById($model->last_reply_user_id));?></a>
            于
            <abbr class="topic_timeago" title="<?php echo $model->replied_at;?>"><?php echo Helper::datetime_diff($model->replied_at);?></abbr>
            回复
<!--            •1165次阅读-->
        </div>
    </div><!--topic头部结束-->
    <!--topic内容开始-->
    <div class="topic_content">
        <?php echo $model->content;?>
    </div><!--topic内容结束-->
    <div>
        <!--分享工具条开始-->
        <DIV class=bshare-custom style="float: right;">
            <A class=bshare-qzone title=分享到QQ空间></A>
            <A class=bshare-sinaminiblog title=分享到新浪微博></A>
            <A class=bshare-renren title=分享到人人网></A>
            <A class=bshare-qqmb title=分享到腾讯微博></A>
            <A class=bshare-neteasemb title=分享到网易微博></A>
            <A class="bshare-more bshare-more-icon more-style-addthis" title=更多平台></A>
            <SPAN class="BSHARE_COUNT bshare-share-count">0</SPAN></DIV>
        <SCRIPT type=text/javascript charset=utf-8 src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></SCRIPT>
        <SCRIPT type=text/javascript charset=utf-8 src="http://static.bshare.cn/b/bshareC0.js"></SCRIPT><!--分享工具条结束-->

        <!--关注喜欢开始-->
        <div class="tools pull-right">
            <a class="likeable" onclick="clickLove()" rel="twipsy" data-type="Topic" data-state="" data-id="7803" data-count="5" href="javascript:void(0)" data-original-title="喜欢">
                <i id='loveImg'<?php
                        $cookie = Yii::app()->request->getCookies();
                        if (!isset($cookie['loveCookie'.$model->tid])):
                   ?>class="icon small_like"
                   <?php else:?>class="icon small_liked"
                    <?php endif;?>
                ></i>
                <span><i id='loveNum'><?php echo $model->love_count;?></i>人喜欢</span>
            </a>
        </div><!--关注喜欢结束-->
    </div>
</div><!--topic内容结束-->
<!--右边栏开始-->
<div class="column2_sidebar">
    <h2 class="title">发布主题</h2>
    <?php if(!Yii::app()->user->isGuest):?>
    <a href="<?php echo Yii::app()->createUrl('Topic/create'); ?>">发布主题</a></br>
    <?php else:?>
    <a class="button green" href="<?php echo Yii::app()->createUrl('User/login')?>">会员登录后可以发布主题</a>
    <?php endif?>
</div><!--右边栏结束-->
<!--topic回复内容开始-->
<div class="column2_content">
    <!--回复数开始-->
    <div class="replies_total">
        共收到
        <b><?php echo $nums = count($model->replies);?></b>
        条回复
    </div><!--回复数结束-->
    <?php
        $commentArr=genCommentArr($model->replies);
        $newData = CommentHelper::genNewData($commentArr);
    ?>
    <!--回复条目开始-->
    <div class="replies_items">
        <?php foreach ($newData as $k => $rows) : ?>
        <?php foreach($rows as $j=>$row): ?>
            <div class = "level lv_<?php echo $row['lv']?>">
                <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$row['user_id']));?>">
                    <img class="" style=" float:left; margin: 2px 5px 2px 2px; width:30px; height: 30px;" src="<?php echo User::get_gravatar( $row['user_email']);?>" alt="">
                </a>
                <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$row['user_id']));?>">
                    <?php echo $row['user'] ?>
                </a>
                 •于<?php echo Helper::datetime_diff($row['created_at']);?>
                <?php if ($j ==0) : ?>•说 :
                    <?php if(!Yii::app()->user->isGuest):?>
                        <div class="reply_ref" style="float: right;"><label class="button gray verysmall" onclick="showCommentForm(<?php echo "'".$k.$j."'";?>);">回复</label></div>
                    <?php endif?>
                <?php else :?>•回复#
                    <?php if(!Yii::app()->user->isGuest):?>
                        <div class="reply_ref" style="float: right;"><label class="button gray verysmall" onclick="showCommentForm(<?php echo "'".$k.$j."'";?>);">回复</label></div>
                    <?php endif?>
                <div class = "re_comment">
                    <?php
                    echo CommentHelper::getAuthor2($row['pid'],$rows)
                    ?>
                    :</div>
                <?php endif ?>
                <div class = "comment_content"><?php echo $row['content'] ?></div>
                <form class="re_comment_form" id="re_comment_form<?php echo $k.$j;?>" action="<?php echo Yii::app()->createUrl('Topic/Reply')?>" method="post" style="display: none;" onsubmit="return checkReComment(<?php echo "'".$k.$j."'";?>);">
                    <textarea rows="5" cols="200" name='content' id='re_comment<?php echo $k.$j;?>'></textarea>
                    <input type="hidden" value="<?php echo $row['rid'];?>" name="pid">
                    <input type="hidden" value="<?php echo $row['path'];?>" name="path">
                    <input type="hidden" name="topic_id" value="<?php echo $model->tid;?>">
                    <br/>
                    <input type="submit" class="button blue small" value="回复">&nbsp;<input type="button" class="button blue small" value="关闭" onclick="closeCommentForm(<?php echo "'".$k.$j."'";?>);">
                </form>
            </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div><!--回复条目结束-->
</div><!--topic回复内容结束-->

<!--回复输入开始-->
<div class="column2_content">
    <?php if(!Yii::app()->user->isGuest):?>
       <form action="<?php echo  Yii::app()->createUrl('Topic/Reply');?>" method="post" onsubmit="return checkReply();">
            <textarea name="content" id="reply"></textarea><br/>
            <input type="submit" class="button blue"  value="回复">
            <input type="hidden" name="topic_id" value="<?php echo $model->tid;?>">
       </form>
    <?php else:?>
    <a class="button green" href="<?php echo Yii::app()->createUrl('User/login')?>">会员登录后可以回复</a>
    <?php endif?>
</div><!--回复输入结束-->

<script type="text/javascript">
   var url = '<?php echo Yii::app()->createUrl('Topic/love');?>';
   var tid = <?php echo $model->tid;?>;
   function clickLove() {
       sendRequest('tid='+tid);
       var loveImg = document.getElementById('loveImg');
       if (loveImg.className == 'icon small_like')
           loveImg.className = 'icon small_liked';
       else
           loveImg.className = 'icon small_like';
   }
   function createXMLHttpRequest() {
       if (window.ActiveXObject) {
           xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
       } else if (window.XMLHttpRequest) {
           xmlHttp = new XMLHttpRequest();
       }
   }
   //data: "first_name=Bill&lname=Gates"
   function sendRequest(data) {
       createXMLHttpRequest();
       xmlHttp.open("POST", url, true);
       xmlHttp.onreadystatechange = responseResults;
       xmlHttp.setRequestHeader("Content-Type",
           "application/x-www-form-urlencoded;");
       xmlHttp.send(data);
   }
   function responseResults() {
       if (xmlHttp.readyState == 4) {
           if (xmlHttp.status == 200) {
               if(xmlHttp.responseText.length>0){
                   var lovenum = document.getElementById('loveNum');
                   lovenum.innerHTML = xmlHttp.responseText;
               }
           } else {
               alert('请求失败');
           }
       }
   }
    function checkReply() {
        var reply = document.getElementById('reply').value;
        if ('' == reply || reply.length == 0) {
            alert('回复不能为空');
            return false;
        } else {
            return true;
        }
    }

    function checkReComment(kj) {
        var comment = document.getElementById('re_comment'+kj).value;
        if ('' == comment || comment.length == 0) {
            alert('回复不能为空！');
            return false;
        } else {
            return true;
        }
    }

    function showCommentForm(kj) {
        var forms = document.getElementsByClassName('re_comment_form');
        for (var i=0; i<forms.length; i++) {
            if (forms[i].style.display == 'inline') {
                forms[i].style.display = 'none';
            }
        }
        var form = document.getElementById('re_comment_form'+kj);
        form.style.display = 'inline';
    }

    function closeCommentForm(kj) {
        var form = document.getElementById('re_comment_form'+kj);
        form.style.display = 'none';
    }


</script>
