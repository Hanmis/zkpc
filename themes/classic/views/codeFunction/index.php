<?php
/* @var $this codeFragmentController */
/* @var $model codeType */

$this->breadcrumbs=array(
    '代码片段'=>array('index'),
);
?>
<!--代码片段开始-->
<div class="column2_content">
<!--代码语言开始-->
    <div class="codeCatalogs">
        <h2>请选择编程语言:</h2>
        <ul>
            <li>
                <a href="/code/list/1/java?show=time">Java</a>
            </li>
            <li>
                <a href="/code/list/1/java?show=time">Java</a>
            </li>
            <li>
                <a href="/code/list/1/java?show=time">Java</a>
            </li>
            <li>
                <a href="/code/list/1/java?show=time">Java</a>
            </li>
            <li>
                <a href="/code/list/1/java?show=time">Java</a>
            </li>
            <li>
                <a href="/code/list/1/java?show=time">Java</a>
            </li>
        </ul>
    </div>
<!--代码语言结束-->

<!--列表开始-->
    <div class="codeList">
        <ul>
            <li>
                <span class="stat">0评/0阅</span>
                <span class="lang1">[Java]</span>
                <span class="title">
                <a title="（面试常见）递归列举指定盘下的所有文件路径,另外有问题问下大家，请看简介！" target="_blank" href="http://www.oschina.net/code/snippet_247890_17388">（面试常见）递归列举指定盘下的所有文件路径,另...</a>
                <span class="date">12分钟前 By Mr.Hsu</span>
                </span>
            </li>
        </ul>
    </div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$cfudataProvider,
	'itemView'=>'_view',
	'ajaxUpdate'=>false,
)); ?>
<!--列表结束-->
</div><!--代码片段结束-->