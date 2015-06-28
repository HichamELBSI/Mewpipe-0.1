
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/bootstrap.min.css'); ?>">
    <title><?php echo $title_for_layout; ?></title>
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $this->Html->image('logo.png', array('alt' => 'Mewpipe', 'width'=>'100px'));?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <?php echo $this->Form->create('Home', array('class'=>'navbar-form navbar-left','action'=>'search'));

            echo $this->Form->input('search',array('label' => false,'class' => 'form-control','div'=>array('class'=>'form-group')));

            $options = array(
                    'label' => 'Search video',
                    'class' => 'btn btn-default',
                    'div' => false
                );
            echo $this->Form->end($options); ?>
          <?php if (AuthComponent::user('id')): ?>
              <!--<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Mark Otto</a></p>-->
              <a href="<?php echo $this->Html->url('/users/logout'); ?>" class="btn btn-default navbar-btn navbar-right">Log out</a>
          <?php endif; ?>
          <?php if (!AuthComponent::user('id')): ?>
              <a href="<?php echo $this->Html->url('/users/login'); ?>" class="btn btn-default navbar-btn navbar-right">Log in</a>
          <?php endif; ?>
        </div><!--/.nav-collapse -->
          
      </div>
    </nav>

    <div class="container">
      <?php echo $content_for_layout ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
  </body>
</html>
