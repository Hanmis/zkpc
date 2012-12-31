<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->title,
);
?>
<!--topic内容开始-->
<div class="column2_content">
    <!--topic头部开始-->
    <div class="topic_info">
        <div class="topic_avatar_large">
            <a href="#">
                <img class="topic_user_img" src="" alt="">
            </a>
        </div>
        <h1 class="topic_title"><strong>系统批量吐槽一下各种编辑器</strong></h1>
        <div class="topic_info_leader">
            <a class="topic_node" href="">工具控</a>
            •
            <a data-name="Zete" href="">luikore</a>
            •于
            <abbr class="topic_timeago" title="2012-12-29T19:34:11+08:00">5天前</abbr>
            发布•最后由
            <a data-name="YangZX" href="">YangZX</a>
            于
            <abbr class="topic_timeago" title="2012-12-29T19:34:11+08:00">3小时前</abbr>
            回复•1165次阅读
        </div>
    </div><!--topic头部结束-->
    <!--topic内容开始-->
    <div class="topic_content">
        <p>虽然代码填坑中, 但忍不住又发一帖...</p>
        <p>vim 高亮文件种类非常丰富, 键盘操作设计非常爱护手指, 可惜和操作系统的默认文本编辑习惯不一样, 在命令行用不了某些 cmd 键的绑定, 它是模式编辑器, 但模式判定和编辑的文档内容无关, 另外没有自带的 debug 接口也是缺点之一. vimscript 虽然简单但还是三天不用就会忘...</p>
        <p>emacs 是最早支持 context 和 mode 的编辑器之一, 命令都有对应函数的, 没有 vim 那种绑了键那个东西就不再是那个东西的顾虑. 有 etags 跳转浏览, 结构化编辑 (haskell 包), 二相渲染等高端能力. 对 latex 的编辑支持最完善. 但键盘操作有点费手指, 用的包多了载入速度就会略慢. elisp 和很多 lisp 方言一样: 括号多...</p>
        <p>这里顺便吐槽一下括号省不掉的根本原因: 换行没有语义, 没有带运算符优先级的中缀表达式 (可以用 infix macro 但还是略难受), clojure 可以把一些圆括号转换成方括号花括号什么的, 但是括号总量几乎没变.</p>
        <p>vimscript 和 elisp 都不是通用编程语言, 没有广泛的库支持...</p>
        <hr>
        <p>emacs 影响了很多编辑器, 例如 scintilla. scite, notepad++, ultraedit, komodo, code::block ... 都是基于 scintilla 的, notepad++之类就是在 scintilla 外面包了层皮而已... 很多基于 qt / wxwidget / gtk / fox 的编辑器/IDE也都用了 scintilla. scintilla 的 split buffer (文本存储) 和 line marker (增量着色和 lexer 状态) 就是参照 emacs 设计的. 但 scintilla 基于 cocoa 的版本是收费的, 基于 gtk 的版本在 mac 上基本没有可用性... </p>
        <p>
        <!--关注喜欢开始-->
        <div class="tools pull-right">
            <a rel="twipsy" onclick="return Topics.follow(this);" data-id="7803" data-followed="false" href="#" data-original-title="">
                <i class="icon small_follow"></i>
                关注
            </a>
            <a class="likeable" rel="twipsy" onclick="return App.likeable(this);" data-type="Topic" data-state="" data-id="7803" data-count="5" href="#" data-original-title="喜欢">
                <i class="icon small_like"></i>
                <span>5人喜欢</span>
            </a>
            <a class="icon small_bookmark" rel="twipsy" onclick="return Topics.favorite(this);" data-id="7803" href="#" data-original-title="收藏"></a>
        </div><!--关注喜欢结束-->
        <!--分享工具条开始-->
        <div class="social-share-button" data-url="" data-img="" data-title="系统批量吐槽一下各种编辑器 via: @ruby_china ">
            <a class="social-share-button-twitter" title="分享到Twitter" rel="nofollow " onclick="return SocialShareButton.share(this);" data-site="twitter" href="#"></a>
            <a class="social-share-button-facebook" title="分享到Facebook" rel="nofollow " onclick="return SocialShareButton.share(this);" data-site="facebook" href="#"></a>
            <a class="social-share-button-google_plus" title="分享到Google+" rel="nofollow " onclick="return SocialShareButton.share(this);" data-site="google_plus" href="#"></a>
            <a class="social-share-button-weibo" title="分享到新浪微博" rel="nofollow " onclick="return SocialShareButton.share(this);" data-site="weibo" href="#"></a>
            <a class="social-share-button-douban" title="分享到豆瓣" rel="nofollow " onclick="return SocialShareButton.share(this);" data-site="douban" href="#"></a>
        </div><!--分享工具条结束-->
    </div><!--topic内容结束-->


</div><!--topic内容结束-->

<!--topic回复内容开始-->
<div class="column2_content box_gray">
    <!--回复数开始-->
    <div class="replies_total">
        共收到
        <b>43</b>
        条回复
    </div><!--回复数结束-->
    <!--回复条目开始-->
    <div class="replies_items">
        <div class="replies_reply">
            <!--回复人头像开始-->
            <div class="reply_user_img">
                <a href="">
                    <img class="uface" style="width:48px;height:48px;" src="http://l.ruby-china.org/user/large_avatar/4801.jpeg" alt="4801">
                </a>
            </div><!--回复人头像结束-->
            <div class="reply_infos">
                <div class="reply_info">
                    <span class="name">
                        <a data-name="Hilbert" href="/hilbert">hilbert</a>
                        1楼,
                        <abbr class="timeago" title="2012-12-24T03:12:22+08:00">5天前</abbr>
                        </span>
                    <span class="opts">
                        <a class="likeable" rel="twipsy" onclick="return App.likeable(this);" data-type="Reply" data-state="" data-id="75010" data-count="0" href="#" data-original-title="喜欢">
                            <i class="icon small_like"></i>
                            <span>喜欢</span>
                        </a>
                        <a class="edit icon small_edit" title="修改回帖" data-uid="4801" href="/topics/7803/replies/75010/edit"></a>
                        <a class="icon small_reply" title="回复此楼" data-login="hilbert" data-floor="1" href="#"></a>
                    </span>
                </div>
                <div class="reply_content">
                    Sublime好，相当于变相免费，界面也不错，能把粉色嫩系颜色配得好看，我还是第一次见，所以我用了好久都没换默认皮肤，速度好像比TM快，是TM的接班人啊
                </div>
                <span class="opts"> </span>
            </div>
        </div>
    </div><!--回复条目结束-->
</div><!--topic回复内容结束-->
<div class="column2_content">


</div>