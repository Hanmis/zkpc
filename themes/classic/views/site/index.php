<!--首页内容开始-->
<div class="container">
	<!--首页建议帖子开始-->
    <div class="home_suggest_topics">
    	<!--热门帖子开始-->
        <div class="high_likes_topics box">
            <h2 class="title">热门帖子</h2>
            <ul>
                <?php for($i=0; $i<count($hot_topics); $i++):?>
                <li>
                    <a href="#" class="img_a">
                        <img class="uface" style="width:16px;height:16px;" src="<?php echo User::get_gravatar($hot_topics[$i]['email'], 16)?>">
                    </a>
                    <a href="<?php echo Yii::app()->createUrl('topic/view', array('tid'=>$hot_topics[$i]['tid']));?>"><?php  echo $hot_topics[$i]['title']?></a>
                    <span class="count"><?php echo $hot_topics[$i]['replies_count']?> 回复</span>
                </li>
                <?php endfor;?>
            </ul>
        </div>
        <!--热门帖子结束-->
        <!--高分帖子开始-->
        <div class="high_replies_topics box">
            <h2 class="title">高分帖子</h2>
            <ul>
                <?php for($i=0; $i<count($love_topics); $i++):?>
                <li>
                    <a href="/fredwu" class="img_a">
                        <img class="uface" style="width:16px;height:16px;" src="<?php echo User::get_gravatar($love_topics[$i]['email'], 16)?>">
                    </a>
                    <a href="<?php echo Yii::app()->createUrl('topic/view', array('tid'=>$love_topics[$i]['tid']));?>"><?php  echo $love_topics[$i]['title']?></a>
                    <span class="count"><?php echo $love_topics[$i]['love_count']?> 人喜欢</span>
                </li>
                <?php endfor;?>
            </ul>
        </div>
        <!--高分帖子结束-->
    </div><br/>
    <!--首页建议帖子结束-->
    <!--首页讨论节点分类导航开始-->
    <div class="sections box">
        <h2 class="title">讨论节点分类导航</h2>
        <ul>
            <?php for($i=0; $i<count($sections); $i++):?>
            <li>
                <label><?php echo $sections[$i]['name'];?></label>
                    <span class="nodes">
                        <?php for($j=0; $j<count($nodes); $j++):?>
                            <?php if($nodes[$j]['section_id'] == $sections[$i]['sid']):?>
                                <a href="<?php echo Yii::app()->createUrl('Topic/indexNode', array('node_id'=>$nodes[$j]['nid']));?>"><?php echo $nodes[$j]['name'];?></a>
                            <?php endif;?>
                        <?php endfor;?>
                    </span>
            </li>
            <?php endfor;?>
        </ul>
    </div>
    <!--首页讨论节点分类导航结束-->
    <!--首页热门代码分享开始-->
    <div class="hotcode box">
        <h2 class="title">热门代码片段</h2>
        <ul>
            <?php for($i=0; $i<count($languages); $i++):?>
            <li><a href="<?php echo Yii::app()->createUrl('CodeFunction', array('pl_id'=>$languages[$i]['plid'], 'pl_name'=>$languages[$i]['name'])); ?>"><?php echo $languages[$i]['name'];?></a></li>
            <?php endfor;?>
        </ul>
    </div>
    <!--首页热门代码分享结束-->
</div>
<!--首页内容结束-->