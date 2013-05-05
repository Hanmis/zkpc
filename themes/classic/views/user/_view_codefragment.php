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
<div class="codeList">
    <ul>
        <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$codeFragment,
        'itemView'=>'_view_codefragment_item',
        'ajaxUpdate'=>false,
    )); ?>
    </ul>
</div>
<!--列表结束-->