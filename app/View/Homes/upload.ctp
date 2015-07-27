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
                <legend>Upload a video</legend>
                <!--iframe src="http://localhost/upload/" style="border: none;" width='100%' height='460px'></iframe-->
                <?= $this->Form->create('Video', array('type'=>'file')); ?>
                <div class="form-group">
                <label for="inputEmail" class="sr-only">Name</label>
                    <?= $this->Form->input('name', array('class' => 'form-control', 'placeholder'=>'Name','required','autofocus', 'div'=>false));?>
                    </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <?= $this->Form->input('description', array('class' => 'form-control', 'placeholder'=>'Description','type'=>'textarea', 'div'=>false));?>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <?php $options = array('0' => 'Public', '1' => 'Unlisted', '2' => 'Private');
                        echo $this->Form->select('status', $options, array('value'=>'0', 'class' => 'form-control', 'div'=>false));?>
                        </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Video (mp4 format)</label>
                    <div class="fallback">
                    <?= $this->Form->input('video_file', array('class' => 'form-control','type'=>'file','required', 'div'=>false)); ?>
                </div>
                </div>
                 <?= $this->Form->end('Add video');?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div style="padding:10px;">
                    <p>
                        The maximum file size for uploads in this demo is <strong>500 MB</strong> (default file size is unlimited).
                    </p>
                    <p>
                        Only Video files <strong>mp4</strong> are allowed in this demo (by default there is no file type restriction).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" >
    $(document).ready(function() {
        $('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#viewimage").html('<img src="img/loading.gif" />');
            $(".uploadform").ajaxForm({
                target: '#viewimage'
            }).submit();
        });
    });
</script>