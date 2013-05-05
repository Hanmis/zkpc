<?php
/**
 * Created by JetBrains PhpStorm.
 * User: liuhanming
 * Date: 13-5-2
 * Time: 下午11:28
 * To change this template use File | Settings | File Templates.
 */
?>

<!--列表开始-->
<div class="topics">
    <?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$topic,
    'itemView'=>'_view_topic_item',
    'ajaxUpdate'=>false,
)); ?>
</div>
<!--列表结束-->
