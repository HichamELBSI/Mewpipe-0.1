<?php foreach($videos as $k=>$v): $v = current($v) ?>
	<h1><?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'])); ?></h1>
	<video width="100%" height="480"  controls>
	  <source src="<?php echo $v['url']; ?>" type="video/mp4">
		Your browser does not support the video tag.
	</video>
<?php endforeach; ?>