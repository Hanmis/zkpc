<li>
    <?php
        $len = count($data->codeFragments);
        for ($i=0; $i<$len; $i++) {
           $sum += $data->codeFragments[$i]->comments_count;
        }
    ?>
     <span class="stat"><?php echo $sum;?>评/<?php echo $data->read_count;?>阅</span>
     <span class="lang1">[<?php echo $data->programmingLanguage->name;?>]</span>
     <span class="title">
	     <a title="<?php echo $data->title;?>" href="<?php echo Yii::app()->createUrl('CodeFunction/view', array('id'=>$data->cfid));?>"><?php echo $data->title;?></a>
	     <abbr class="date" title="<?php echo $data->created_at;?>"><?php echo Helper::datetime_diff($data->created_at);?></abbr>
     </span>
</li>
          
