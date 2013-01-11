<?php
/* @var $this CoolsiteController */
/* @var $model CoolsiteType */

$this->breadcrumbs=array(
	'酷站'=>array('index'),
);
?>
<!--酷站开始-->
<?php $size=count($coolsiteType);?>
<?php for($i=0; $i<$size; $i++):?>
<div class="coolsite">	
	<h2><?php echo $coolsiteType[$i]->name; ?></h2>
	<div class="row">
		<ul>
			<?php $count=count($coolsiteType[$i]->coolsites);?>
			<?php for($j=0; $j<$count; $j++):?>
			<li>
				<div class="site">
					<img class="favicon" src="<?php echo $coolsiteType[$i]->coolsites[$j]->favicon;?>" alt="Favicon">
					<a title="" target="_blank" rel="nofollow" href="<?php echo $coolsiteType[$i]->coolsites[$j]->url;?>"><?php echo $coolsiteType[$i]->coolsites[$j]->name;?></a>
				</div>
			</li>
			<?php endfor;?>		
		</ul>
	</div>
</div>
<?php endfor;?>
<!--酷站结束-->