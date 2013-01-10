<?php
/* @var $this TopicController */
/* @var $model Topic */

$this->breadcrumbs=array(
	'酷站'=>array('index'),
);
$size = count($coolsite);
?>
<div class="coolsite">
	<h2><?php 
		echo $size."<br/>";
	    echo $coolsite[0]->name; 
	    ?></h2>
	<div class="row">
		<ul>
			<li>
				<div class="site">
					<img class="favicon" src="http://rabelapp.com/favicon.ico" alt="Favicon">
					<a title="简洁的小众社区软件" target="_blank" rel="nofollow" href="http://rabelapp.com">Rabel</a>
				</div>
			</li>
			<li>
				<div class="site">
					<img class="favicon" src="http://rabelapp.com/favicon.ico" alt="Favicon">
					<a title="简洁的小众社区软件" target="_blank" rel="nofollow" href="http://rabelapp.com">Rabel</a>
				</div>
			</li>
			<li>
				<div class="site">
					<img class="favicon" src="http://rabelapp.com/favicon.ico" alt="Favicon">
					<a title="简洁的小众社区软件" target="_blank" rel="nofollow" href="http://rabelapp.com">Rabel</a>
				</div>
			</li>
			<li>
				<div class="site">
					<img class="favicon" src="http://rabelapp.com/favicon.ico" alt="Favicon">
					<a title="简洁的小众社区软件" target="_blank" rel="nofollow" href="http://rabelapp.com">Rabel</a>
				</div>
			</li>
		</ul>
	</div>
</div>