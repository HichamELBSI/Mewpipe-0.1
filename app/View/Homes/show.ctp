<?php if($selected['status'] == 2): ?>
	<?php if($selected['users_id'] != $user['id']): ?>
		<h1>This video is private !</h1>
	<?php endif; ?>
<?php endif; ?>

<?php if(($selected['status'] != 2) || ($selected['status'] == 2 && $selected['users_id'] == $user['id'])): ?>
		<div class="col-md-8" style="margin-bottom:5px;">
		<div class="embed-responsive embed-responsive-16by9">
		  	<video id="video" width="100%" autoplay controls>
			  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
		<div style="background-color: white;padding: 9px;margin-bottom: 5px;border: 1px solid rgba(0,0,0,0.1);">
			<?php if($selected['users_id'] == $user['id']):?>
				<a href="<?= $this->Html->url('/videos/edit/'.$selected['id']);?>" class="btn btn-default" style="
				    float: right;
				    margin-left: 10px;
				    font-weight: bold;
				">Edit</a>
			<?php endif;?>
			<h2 style="margin-top:0;"><?php echo $selected['name']; ?>
				<p style="outline:none;text-decoration:none;text-align: right;float: right;font-size: 18px;line-height: 36px;">
					<?=$selected['views'];?> vues
				</p>
			</h2>
			<p style="font-size:16px;"><?= $selected['description']; ?></p>
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1"><img src="<?= $this->Html->url('/img/share.png');?>" style="  width: 15px;"></span>
			  <input type="text" readonly value="<?php echo Router::url($this->Html->url( null, true ), true); ?>" class="form-control" style="background-color:white;"aria-describedby="basic-addon1">
			</div>
			<div class="btn-group">
				<?php echo $this->SocialShare->link('facebook',__('facebook'),null,array('class'=>'btn btn-primary','style'=>'margin-top:5px;'));?>
				<?php echo $this->SocialShare->link('twitter',__('twitter'),null,array('class'=>'btn btn-info','style'=>'margin-top:5px;'));?>
				<?php echo $this->SocialShare->link('gplus',__('Google+'),null,array('class'=>'btn btn-danger','style'=>'margin-top:5px;'));?>
				<?php echo $this->SocialShare->link('linkedin',__('linkedin'),null,array('class'=>'btn btn-primary','style'=>'margin-top:5px;'));?>
				
			</div>
		</div>
		<div class="thumbnail" style="margin:0;background-color: #FAFAFA;border-radius: 0;">
					<div class="media">
					  	<div class="media-left media-top">
					    	<a href="#">
					    		<img class="media-object" src="" alt="">
					    	</a>
					  	</div>
					  	<div class="media-body" style="font-size:16px;">
						  	<h6 style="margin-top: 5px;margin-bottom: 0;">
						  		<strong><?php echo $user['username'];?></strong>
						  	</h6>
							<input type="text" class="form-control" style="" placeholder="Comment..." name="comment">
						</div>
					</div>
			</div>
		<?php foreach($comments as $k=>$v): $v = current($v) ?>
			<div class="thumbnail" style="margin:0;background-color: #FAFAFA;border-radius: 0;">
					<div class="media">
					  	<div class="media-left media-top">
					    	<a href="#">
					    		<img class="media-object" src="" alt="">
					    	</a>
					  	</div>
					  	<div class="media-body" style="font-size:16px;">
						  	<h6 style="margin-top: 5px;margin-bottom: 0;">
						  		<strong>Hicham</strong>
						  	</h6>
							<p style="margin: 0;"><?=$v['text'];?></p>
						</div>
					</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="col-md-4">
			<div class="thumbnail" style="margin-bottom:0;font-size:18px;background-color: #EEE;border-radius: 0;">
			  Related videos
			</div>
			<div class="thumbnail" >
				<?php foreach ($relatedvideos as $k => $v): $v = current($v)?>

	<?php echo $this->Html->link(
	    '<div class="thumbnail" style="display: inline-block;margin-bottom: 5px;width: 100%;">
			<video id="video" preload="metadata" style="float:left;margin-right: 5px;" width="30%">
			  <source src="'. $v['url'] . '" type="video/mp4">
				Your browser does not support the video tag.
			</video>
			<div>
				<p style="margin:0;">'.$v['name'].'</p>
				<p style="margin:0;">'.$v['description'].'</p>
			</div>
		</div>', 
	    array('action'=>'show',$v['id'],$related),array('escape' => false));?>

				<?php endforeach; ?>
			</div>
		</div>
<?php endif; ?>