<?php foreach($videos as $k=>$v): $v = current($v) ?>
	<video width="100%" height="480" controls>
	  <source src="<?php echo $v['url']; ?>" type="video/mp4">
		Your browser does not support the video tag.
	</video>
	<h1><?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'])); ?>
		<p style="text-align: right;float: right;font-size: 20px;line-height: 36px;"><?=$v['views']?> vues</p>
	</h1>
<?php endforeach; ?>