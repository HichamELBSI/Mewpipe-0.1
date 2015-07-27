
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/logincss.css'); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/usercss.css'); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/login.css'); ?>">
      <?php echo $this->Html->meta('icon', $this->Html->url('/favicon.png'));?>
      <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->Html->url('/js/loginjs.js'); ?>"></script>
    <title><?php echo $title_for_layout; ?></title>
  </head>

  <body role="document" style="background-color: #EEE;">
    <div id="fb-root"></div>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default" style="background-color:#ea6153;">
      <div class="container">
        <div class="navbar-header" style="background-color:#ea6153;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>"><?php echo $this->Html->image('logo.png', array('alt' => 'Mewpipe', 'width'=>'180px'));?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php echo $this->Form->create('Home', array('class'=>'navbar-form navbar-left','action'=>'search'));?>&nbsp;

            <?php echo $this->Form->input('search',array('label' => false,'class' => 'form-control','style'=>'border-radius:0px;','div'=>array('class'=>'form-group','style'=>'margin-right:5px;')));

            $options = array(
                    'label' => 'Search video',
                    'class' => 'btn btn-default',
                    'style'=>'border-radius:0px;',
                    'div' => false
                );
            echo $this->Form->end($options); ?>
          <a href="<?php echo $this->Html->url('/homes/upload'); ?>" style="margin-right: 5px;border-radius:0px;" class="btn btn-success navbar-btn navbar-right">Upload</a>
          <?php if (AuthComponent::user('id')): ?>
            <a href="<?php echo $this->Html->url('/users/logout'); ?>" style="margin-right: 5px;border-radius:0px;"  class="btn btn-default navbar-btn navbar-right">Log out</a>
            <a href="<?php echo $this->Html->url('/users/user'); ?>" style="margin-right: 5px;border-radius:0px;" class="btn btn-primary navbar-btn navbar-right">Profil</a>
          <?php endif; ?>
          <?php if (!AuthComponent::user('id')): ?>
            <a href="<?php echo $this->Html->url('/users/login'); ?>" style='border-radius:0px;' class="btn btn-default navbar-btn navbar-right">Log in</a>
          <?php endif; ?>
        </div>

      </div>
    </nav>

    <div class="container">
      <?php echo $content_for_layout ?>
    </div>

    <?php echo $this->Html->script('jquery-1.11.3.min'); ?>
    <?php echo $this->Html->script('jquery.form.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('bootstrap-filestyle.min'); ?>

  <?php echo $this->Html->script('facebook'); ?>
  </body>
</html>
