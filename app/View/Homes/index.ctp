<div class="row profile">
        <div class="col-md-8" style="background-color: white;border: 1px solid rgba(0,0,0,0.1);padding: 20px;">
			<div>
				<legend>Best viewed videos</legend>
			</div>

			<div class="row">
				<?php foreach($videos as $k=>$v): $v = current($v) ?>
				<div class="col-xs-6 col-md-3">
			    	<?php echo $this->Html->link($v['name'], array('action'=>'show',$v['id'],'class'=>'thumbnail')); ?>
					<?php echo $this->Html->link($this->Html->media($v['url'],array('width'=>'100%','preload'=>'metadata')), array('action'=>'show',$v['id'],substr($v['name'], 0, 4)),array('escape' => false)); ?>
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
		</div>
		<div class="col-md-4" style="background-color: white;border: 1px solid rgba(0,0,0,0.1);padding: 20px;">
			<legend>Most shared</legend>
			<div>
				<?php foreach ($sharedVideos as $k => $v): $v = current($v)?>
					<?php echo $this->Html->link(
					    '<div style="display: inline-block;margin-bottom: 5px;width: 100%;">
							<video id="video" preload="metadata" style="float:left;margin-right: 5px;" width="30%">
							  <source src="'. $v['url'] . '" type="video/mp4">
								Your browser does not support the video tag.
							</video>
							<div>
								<p style="margin:0;">'.$v['name'].'</p>
								<p style="margin:0;">'.$v['description'].'</p>
							</div>
						</div>', 
				    array('action'=>'show',$v['id']),array('escape' => false));?>

				<?php endforeach; ?>
			</div>
		</div>
</div>