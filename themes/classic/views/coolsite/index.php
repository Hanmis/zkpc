<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'酷站'=>array('index'),
);
$size = count($coolsiteType);
?>
<div class="coolsite">
	<h2><?php echo $coolsiteType[0]->name; ?></h2>
	<div class="row">
		<ul>
			<li>
				<div class="site">
					<img class="favicon" src="<?php echo $coolsiteType[0]->coolsites[0]->favicon; ?>" alt="Favicon">
					<a title="简洁的小众社区软件" target="_blank" rel="nofollow" href="<?php echo $coolsiteType[0]->coolsites[0]->url; ?>"><?php echo $coolsiteType[0]->coolsites[0]->name; ?></a>
				</div>
			</li>
		</ul>
	</div>
</div>