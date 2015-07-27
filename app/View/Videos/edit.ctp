<?php if(isset($error)) : ?>
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  <?= $error?>
</div>
<?php endif;?>
<div class="container">
    <div class="row profile">
        <div class="col-md-9">
            <div class="profile-content">
                <a class="btn btn-error" style="float: right;margin-bottom: -35px;" href="<?= $this->Html->url('/videos/del/'.$video['id']);?>">Delete video</a>
                <legend>Edit video</legend>

                <?= $this->Form->create('Video'); ?>
                <div class="form-group">
                <label for="inputEmail" class="sr-only">Name</label>
                    <?= $this->Form->input('name', array('class' => 'form-control', 'placeholder'=>'Name','required','autofocus', 'div'=>false, 'value'=>$video['name']));?>
                    </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Description</label>
                    <?= $this->Form->input('description', array('class' => 'form-control', 'placeholder'=>'Description','type'=>'textarea', 'div'=>false, 'value'=>$video['description']));?>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Privacy</label>
                    <?php $options = array('0' => 'Public', '1' => 'Unlisted', '2' => 'Private');
                        echo $this->Form->select('status', $options, array('value'=>$video['status'], 'class' => 'form-control', 'div'=>false));?>
                        </div>
                 <?= $this->Form->end('Edit video');?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div style="padding:10px;">
                    <p>
                        Here you can edit your video information. 
                    </p>
                    <p>
                        You cannot edit the video file.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>