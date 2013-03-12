<?php
/* @var $this codeFragmentController */
/* @var $model codeType */

$this->breadcrumbs=array(
    '代码片段'=>array('index'),   
);
if (isset($pl_name))
	$this->breadcrumbs=array('代码片段'=>array('index'), $pl_name); 
if (isset($ct_name))
	$this->breadcrumbs=array('代码片段'=>array('index'), $pl_name=>array('index&pl_id='.$pl_id.'&pl_name='.$pl_name), $ct_name);
?>

<!--代码片段开始-->
<!--代码语言开始-->
    <div class="codeCatalogs">
        <h2>请选择代码类型:</h2> 
        <ul>
        	<?php $count = count($codeCatalogs); ?>
        	<?php for($i = 0; $i < $count; $i++):?>
            <li>
            	<?php if(isset($codeCatalogs[$i]['plid'])) {?>
                <a href="<?php echo Yii::app()->createUrl('CodeFunction', array('pl_id'=>$codeCatalogs[$i]['plid'], 'pl_name'=>$codeCatalogs[$i]['name'])); ?>"><?php echo $codeCatalogs[$i]['name']; ?></a>
                <?php } else {?>
                <a href="<?php echo Yii::app()->createUrl('CodeFunction', array('ct_id'=>$codeCatalogs[$i]['ctid'], 'pl_id'=>$pl_id, 'pl_name'=>$pl_name, 'ct_name'=>$codeCatalogs[$i]['name'])); ?>"><?php echo $codeCatalogs[$i]['name']; ?></a>
                <?php }?>
            </li>
            <?php endfor;?>
        </ul>
    </div>
<!--代码语言结束-->

<!--列表开始-->
<div class="codeList">
   <ul>
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$cfudataProvider,
			'itemView'=>'_view',
			'ajaxUpdate'=>false,
		)); ?>
   </ul>
</div>
<!--列表结束-->
<!--代码片段结束-->