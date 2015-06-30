<?php if($selected['status'] == 2): ?>
	<?php if($selected['users_id'] != $user['id']): ?>
		<h1>This video is private !</h1>
	<?php endif; ?>
<?php endif; ?>

<?php if(($selected['status'] != 2) || ($selected['status'] == 2 && $selected['users_id'] == $user['id'])): ?>
		<div class="col-md-8">
		<div class="embed-responsive embed-responsive-16by9">
		  	<video id="video" width="100%" autoplay controls>
			  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
				Your browser does not support the video tag.
			</video>
		</div>
		<h2 style="margin-top:0;"><?php echo $selected['name']; ?>
			<p style="outline:none;text-decoration:none;text-align: right;float: right;font-size: 18px;line-height: 36px;">
				<?=$selected['views'];?> vues
			</p>
		</h2>
		<p style="font-size:16px;"><?= $selected['description']; ?></p>
		<div class="thumbnail" style="margin:0;font-size:18px;background-color: #EEE;border-radius: 0;">
		  Comments
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
					    <?=$v['text'];?>
					  </div>
					</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="col-md-4">
			<div class="thumbnail" style="margin-bottom:0;margin-top:10px;font-size:18px;background-color: #EEE;border-radius: 0;">
			  Related videos
			</div>
			<div class="thumbnail" >
				<?php foreach ($relatedvideos as $k => $v): $v = current($v)?>

	<?php echo $this->Html->link(
	    '<div class="thumbnail" style="display: inline-block;margin-bottom: 5px;width: 100%;">
			<video id="video" style="float:left;margin-right: 5px;" width="30%">
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

		<script type="text/javascript">
			$( document ).ready(function() {
		  		$('#video').load(function() {
		  			
		  		})
			});
		</script>
<?php endif; ?>
