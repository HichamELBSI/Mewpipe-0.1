<div>
	<p class=""><?= $nbr; ?> results</p>
</div>

<div class="row">
	<?php foreach($searchvideos as $k=>$v): $v = current($v) ?>
	<div class="col-xs-6 col-md-3">
    	<?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'],'class'=>'thumbnail')); ?>
		<?php echo $this->Html->link($this->Html->media($v['url'],array('width'=>'100%')), array('action'=>'show',$v['id'],$related),array('escape' => false)); ?>
	</div>
	<?php endforeach; ?>
</div>