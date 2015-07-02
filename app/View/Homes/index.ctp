<div>
	<h3 style='margin-top:0;'>Best videos</h3>
</div>

<div class="row">
	<?php foreach($videos as $k=>$v): $v = current($v) ?>
	<div class="col-xs-6 col-md-3">
    	<?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'],'class'=>'thumbnail')); ?>
		<?php echo $this->Html->link($this->Html->media($v['url'],array('width'=>'100%')), array('action'=>'show',$v['id']),array('escape' => false)); ?>
	</div>
	<?php endforeach; ?>
</div>