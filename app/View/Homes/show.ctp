<!--div class="embed-responsive embed-responsive-16by9">
	  	<video id="video" width="100%" controls autoplay>
		  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
	<h2 style="margin-top:0;"><?php echo $this->Html->link($selected['name'], array('action'=>'show',$selected['id'])); ?>
		<p style="outline:none;text-decoration:none;text-align: right;float: right;font-size: 18px;line-height: 36px;">
			<?=$selected['views'];?> vues
		</p>
	<h2>

	<div class="panel panel-default" style="font-size:14px">
	  <div class="panel-heading">Description</div>

	  <ul class="list-group">
	    <li class="list-group-item">Cras justo odio</li>
	  </ul>
	</div>
</div-->

<div class="col-md-8">
	<div class="embed-responsive embed-responsive-16by9">
	  	<video id="video" width="100%" autoplay controls>
		  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>
	<h2 style="margin-top:0;"><?php echo $this->Html->link($selected['name'], array('action'=>'show',$selected['id'])); ?>
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
		<a href="#">
			<div class="thumbnail" style="display: inline-block;margin-bottom: 5px;">
				<video id="video" style="float:left;margin-right: 5px;" width="30%">
				  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
				<div>
					<p style="margin:0;"><?= $selected['name'];?></p>
					<p style="margin:0;"><?= $selected['description'];?></p>
				</div>
			</div>
		</a>
		<a href="#">
			<div class="thumbnail" style="display: inline-block;margin-bottom: 5px;">
				<video id="video" style="float:left;margin-right: 5px;" width="30%">
				  <source src="<?php echo $selected['url']; ?>" type="video/mp4">
					Your browser does not support the video tag.
				</video>
				<div>
					<p style="margin:0;"><?= $selected['name'];?></p>
					<p style="margin:0;"><?= $selected['description'];?></p>
				</div>
			</div>
		</a>
	</div>
</div>

<script type="text/javascript">
	$( document ).ready(function() {
  		$('#video').load(function() {
  			
  		})
	});
</script>
