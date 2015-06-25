<div class="embed-responsive embed-responsive-16by9">
	  	<video id="video" width="100%" controls autoplay>
		  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
	
	<h2 style="margin-top:0;"><?php echo $this->Html->link($selected['name'], array('action'=>'show',$selected['id'])); ?>
		<p style="outline:none;text-decoration:none;text-align: right;float: right;font-size: 20px;line-height: 36px;">
			<?=$selected['views'];?> vues
		</p>
	<h2>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
  		$('#video').load(function() {
  			
  		})
	});
</script>
