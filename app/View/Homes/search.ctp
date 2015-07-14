<div>
	<p class=""><?= $nbr; ?> results</p>
</div>

<div class="row">
	<?php foreach($searchvideos as $k=>$v): $v = current($v) ?>
	<div class="col-xs-6 col-md-3">
    	<?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'],'class'=>'thumbnail')); ?>
		<?php echo $this->Html->link($this->Html->media($v['url'],array('width'=>'100%','preload'=>'metadata')), array('action'=>'show',$v['id'],$related),array('escape' => false)); ?>
	</div>
	<?php endforeach; ?>
</div>

<div class="pagination pagination-large">
<ul class="pagination">
        <?php
echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
        ?>
    </ul>
</div>