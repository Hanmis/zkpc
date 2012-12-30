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
                        <img class="uface" style="width:16px;height:16px;" src=<?php echo User::get_gravatar($hot_topics[$i]['email'], 16)?> alt="">
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
                <li>
                    <a href="/fredwu" class="img_a">
                        <img class="uface" style="width:16px;height:16px;" src="http://ruby-china.org/avatar/2735068c913a072744a799e3c0833b7b.png?s=16&d=404" alt="2735068c913a072744a799e3c0833b7b">
                    </a>
                    <a href="/topics/6859">我的演讲稿 追加未删节完整版</a>
                    <span class="count">29 人喜欢</span>
                </li>
                <li>
                    <a href="/xdite" class="img_a">
                        <img class="uface" style="width:16px;height:16px;" src="http://ruby-china.org/avatar/19e786a2a74377ff6e052d87fd8d1fa8.png?s=16&d=404" alt="19e786a2a74377ff6e052d87fd8d1fa8">
                    </a>
                    <a href="/topics/6886">我的slide: 最佳實踐如何變成了最慢實踐</a>
                    <span class="count">19 人喜欢</span>
                </li>
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
                <label><?php echo $sections[$i]->name?></label>
                    <span class="nodes">
                        <?php for($j=0; $j<count($sections[$i]->nodes); $j++):?>
                            <a href="#"><?php echo $sections[$i]->nodes[$j]->name?></a>
                        <?php endfor;?>
                    </span>
            </li>
            <?php endfor;?>
        </ul>
    </div>
    <!--首页讨论节点分类导航结束-->
    <!--首页热门代码分享开始-->
    <div class="hotcode box">
        <h2 class="title">热门代码分享</h2>
        <ul>
            <li><a href="/users/city/%E5%8C%97%E4%BA%AC">JAVA</a></li>
            <li><a href="/users/city/%E5%8C%97%E4%BA%AC">PHP</a></li>
            <li> <a href="/users/city/%E5%8C%97%E4%BA%AC">C++</a></li>
        </ul>
    </div>
    <!--首页热门代码分享结束-->
</div>
<!--首页内容结束-->