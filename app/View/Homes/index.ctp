<?php foreach($videos as $k=>$v): $v = current($v) ?>
	<div class="embed-responsive embed-responsive-16by9">
	  	<video width="100%" height="480" controls>
		  <source src="<?php echo $v['url']; ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
	
	<h2 style="margin-top:0;"><?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'])); ?>
		<p style="outline:none;text-decoration:none;text-align: right;float: right;font-size: 20px;line-height: 36px;"><?=$v['views']?> vues</p><h2>
	
<?php endforeach; ?>