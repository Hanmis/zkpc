<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-3-16
 * Time: 下午10:45
 * To change this template use File | Settings | File Templates.
 */
$this->breadcrumbs=array(
    '代码片段'=>array('index'),
    $model->title,
);
//var_dump($model);exit;
$arr = explode('.',$model->programmingLanguage->highlighted);
$highlighted_language = $arr[0];
//var_dump($model->codeFragments[0]->codeComments);exit;
//将$model->codeFragments[$i]->codeComments转化为一般数组
function genCommentArr ($arr) {
    $dataArr = array();
    $len = count($arr);
    for ($i=0; $i<$len; $i++) {
        $dataArr[$i]['ccid'] = $arr[$i]['ccid'];
        $dataArr[$i]['pid'] = $arr[$i]['pid'];
        $dataArr[$i]['cfr_id'] = $arr[$i]['cfr_id'];
        $dataArr[$i]['path'] = $arr[$i]['path'];
        $dataArr[$i]['user_id'] = $arr[$i]['user_id'];
        $dataArr[$i]['user'] = $arr[$i]->user->name;
        $dataArr[$i]['user_email'] = $arr[$i]->user->email;
        $dataArr[$i]['content'] = $arr[$i]['content'];
        $dataArr[$i]['created_at'] = $arr[$i]['created_at'];
    }
    return $dataArr;
}
//var_dump(genCommentArr($model->codeFragments[0]->codeComments));exit
?>

<div class="codeCatalogs">
    <h2><?php echo $model->programmingLanguage->name."&nbsp;&nbsp;";?><?php echo $model->title;?></h2>
    <!--分享工具条开始-->
    <DIV class=bshare-custom>
        <A class=bshare-qzone title=分享到QQ空间></A>
        <A class=bshare-sinaminiblog title=分享到新浪微博></A>
        <A class=bshare-renren title=分享到人人网></A>
        <A class=bshare-qqmb title=分享到腾讯微博></A>
        <A class=bshare-neteasemb title=分享到网易微博></A>
        <A class="bshare-more bshare-more-icon more-style-addthis" title=更多平台></A>
        <SPAN class="BSHARE_COUNT bshare-share-count">0</SPAN></DIV>
    <SCRIPT type=text/javascript charset=utf-8 src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></SCRIPT>
    <SCRIPT type=text/javascript charset=utf-8 src="http://static.bshare.cn/b/bshareC0.js"></SCRIPT><!--分享工具条结束-->
</div>


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/code/viewcode.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl."/protected/extensions/rainbow/themes/blackboard.css"?>"/>



<div  id="div_MemberManagerMenu">
    <?php for($i=0;$i<count($model->codeFragments);$i++):?>
    <div class="div_MemberManagerMenuItem">
        <div>
            <div class="codeLoveComment" style="float: right; margin-top: 5px;"><?php echo $model->codeFragments[$i]->comments_count;?>人评论/
                <a class="likeable" onclick="clickLove(<?php echo $model->codeFragments[$i]->cfid;?>)" rel="twipsy" data-type="Topic" data-state="" data-id="7803" data-count="5" href="javascript:void(0)" data-original-title="喜欢">
                    <i id='loveImg<?php echo $model->codeFragments[$i]->cfid;?>'<?php
                        $cookie = Yii::app()->request->getCookies();
                        if (!isset($cookie['CodeLoveCookie'.$model->codeFragments[$i]->cfid])):
                            ?>class="icon small_like"
                            <?php else:?>class="icon small_liked"
                            <?php endif;?>
                        ></i>
                    <span><i id='loveNum<?php echo $model->codeFragments[$i]->cfid;?>'><?php echo $model->codeFragments[$i]->love_count;?></i>人喜欢</span>
                </a>
            </div>
            <div class="code_head">
                <?php echo $model->codeFragments[$i]->user->name;?>
            </div>
        </div>
        <div class="code_container">
            <img class="topic_user_img" style=" float:none; margin: 2px 5px 2px 2px;" src="<?php echo User::get_gravatar($model->codeFragments[$i]->user->email);?>" alt="">
            <?php
            echo "介绍：<br/>";
            if ($model->codeFragments[$i]['intro'])
                echo  $model->codeFragments[$i]['intro'];
            else
                echo "<p><无详细介绍></p>";
            ?>
            <div class="code" style="overflow: auto;">
                    <pre>
                    <code data-language="<?php echo $highlighted_language?>">
                        <?php echo  $model->codeFragments[$i]['code'];?>
                    </code>
                    </pre>
            </div>
            <div class="comment">
                <div class="border-bottom: 1px solid #DDDDDD;color: #999999;margin: 0 -10px;padding: 0 10px 6px;">共<?php echo $nums = count($model->codeFragments[$i]->codeComments);?>条评论：</div>
                <?php
                    $commentArr=genCommentArr($model->codeFragments[$i]->codeComments);
                    $newData = CommentHelper::genNewData($commentArr);
                ?>

                <?php foreach ($newData As $k => $rows) : ?>
<!--                <div class = "main">-->
<!--                    <h2>--><?php //echo "#".($k+1). "楼"; ?><!--</h2>-->
                    <?php foreach($rows as $j=>$row): ?>
                    <div class = "level lv_<?php echo $row['lv']?>">
                        <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$row['user_id']));?>">
                        <img class="" style=" float:left; margin: 2px 5px 2px 2px; width: 20px; height: 20px;" src="<?php echo User::get_gravatar( $row['user_email']);?>" alt="">
                        </a>
                        <a href="<?php echo Yii::app()->createUrl('user/view', array('uid'=>$row['user_id']));?>">
                        <?php echo $row['user'] ?>
                        </a>
                        •于<?php echo Helper::datetime_diff($row['created_at']);?>
                        <?php if ($j ==0) : ?>•说 :
                            <?php if(!Yii::app()->user->isGuest):?>
                                <div class="reply_ref" style="float: right;"><label class="button gray verysmall" onclick="showCommentForm(<?php echo "'".$i.$k.$j."'";?>);">回复</label></div>
                            <?php endif?>
                        <?php else :?>•回复#
                            <?php if(!Yii::app()->user->isGuest):?>
                                <div class="reply_ref" style="float: right;"><label class="button gray verysmall" onclick="showCommentForm(<?php echo "'".$i.$k.$j."'";?>);">回复</label></div>
                            <?php endif?>
                        <div class = "re_comment">
                            <?php
//                              var_dump($row['pid']);var_dump($rows);
                            echo CommentHelper::getAuthor($row['pid'],$rows)
                            ?>
                            :</div>
                        <?php endif ?>
                        <div class = "comment_content"><?php echo $row['content'] ?></div>
                            <form class="re_comment_form" id="re_comment_form<?php echo $i.$k.$j;?>" action="<?php echo Yii::app()->createUrl('CodeFunction/comment')?>" method="post" style="display: none;" onsubmit="return checkReComment(<?php echo "'".$i.$k.$j."'";?>);">
                                <textarea rows="5" cols="200" name='content' id='re_comment<?php echo $i.$k.$j;?>'></textarea>
                                <input type="hidden" value="<?php echo $model->codeFragments[$i]['cfid'];?>" name="cfr_id">
                                <input type="hidden" value="<?php echo $row['ccid'];?>" name="pid">
                                <input type="hidden" value="<?php echo $row['path'];?>" name="path">
                                <br/>
                                <input type="submit" class="button blue small" value="提交">&nbsp;<input type="button" class="button blue small" value="关闭" onclick="closeCommentForm(<?php echo "'".$i.$k.$j."'";?>);">
                            </form>
                    </div>
                    <?php endforeach; ?>
<!--                </div>-->
                <?php endforeach; ?>

                <div style="margin-top: 10px;margin-left: 20px;">
                    <?php if(!Yii::app()->user->isGuest):?>
                        <form action="<?php echo Yii::app()->createUrl('CodeFunction/comment')?>" method="post" onsubmit="return checkComment(<?php echo $i;?>);">
                            <textarea rows="5" cols="200" name='content' id='comment<?php echo $i;?>'></textarea><br/>
                            <input type="hidden" value="<?php echo $model->codeFragments[$i]['cfid'];?>" name="cfr_id">
                            <input type="submit" class="button blue" value="发表评论">
                        </form>
                    <?php else:?>
                    <a class="button green" href="<?php echo Yii::app()->createUrl('User/login')?>">会员登录后可以评论</a>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
    <?php endfor;?>
</div>

<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/protected/extensions/rainbow/js/rainbow.js");?>
<?php //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl."/protected/extensions/rainbow/js/language/generic.js");?>
<?php //Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl."/protected/extensions/rainbow/js/language/".$model->programmingLanguage->highlighted);?>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/accordion.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl."/protected/extensions/rainbow/js/rainbow.js"?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl."/protected/extensions/rainbow/js/language/generic.js"?>"></script>
<script type="text/javascript" src="<?php echo Yii::app()->baseUrl."/protected/extensions/rainbow/js/language/".$model->programmingLanguage->highlighted?>"></script>

<script type="text/javascript">

    (function(){
        var mainMenu = document.getElementById("div_MemberManagerMenu");
        var accordion = new __AccordionClass();
        //accordion.isMultiExpand = true; // 是否可已同时展开多个
        accordion.initAccordion( mainMenu.getElementsByClassName('code_head'), mainMenu.getElementsByClassName('code_container'));
    })();


    function checkComment(i) {
        var comment = document.getElementById('comment'+i).value;
        if ('' == comment || comment.length == 0) {
            alert('评论不能为空！');
            return false;
        } else {
            return true;
        }
    }

    function checkReComment(ikj) {
        var comment = document.getElementById('re_comment'+ikj).value;
        if ('' == comment || comment.length == 0) {
            alert('回复不能为空！');
            return false;
        } else {
            return true;
        }
    }

    function showCommentForm(ikj) {
        var forms = document.getElementsByClassName('re_comment_form');
        for (var i=0; i<forms.length; i++) {
            if (forms[i].style.display == 'inline') {
                forms[i].style.display = 'none';
            }
        }
        var form = document.getElementById('re_comment_form'+ikj);
        form.style.display = 'inline';
    }

    function closeCommentForm(ikj) {
        var form = document.getElementById('re_comment_form'+ikj);
        form.style.display = 'none';
    }

    var url = '<?php echo Yii::app()->createUrl('CodeFunction/love');?>';

    function clickLove(cfid) {
        sendRequest('cfid='+cfid);
        var loveImg = document.getElementById('loveImg'+cfid);
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
                    var strs= new Array(); //定义一数组
                    strs=xmlHttp.responseText.split(":"); //字符分割
                    var lovenum = document.getElementById('loveNum'+strs[0]);
                    lovenum.innerHTML = strs[1];
                }
            } else {
                alert('请求失败');
            }
        }
    }
</script>
