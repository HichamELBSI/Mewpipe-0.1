
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/bootstrap.min.css'); ?>">
    <title><?php echo $title_for_layout; ?></title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mewpipe</a>
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
              <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Mark Otto</a></p>
          <?php endif; ?>
          <?php if (!AuthComponent::user('id')): ?>
              <a href="login" class="btn btn-default navbar-btn navbar-right">Sign in</a>
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