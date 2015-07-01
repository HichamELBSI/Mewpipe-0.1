
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/logincss.css'); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo $this->Html->url('/css/usercss.css'); ?>">
      <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      <script type="text/javascript" src="<?php echo $this->Html->url('/js/loginjs.js'); ?>"></script>
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

              <!--button type="button" class="btn btn-default navbar-btn navbar-right" data-toggle="modal" data-target="<!--?php echo $this->Html->url('#myModal'); ?>">
                  Login modal
              </button-->
              <a href="<?php echo $this->Html->url('/users/login'); ?>" class="btn btn-default navbar-btn navbar-right">Log in</a>
          <?php endif; ?>
        </div><!--/.nav-collapse -->

      </div>
    </nav>

    <div class="container">
      <?php echo $content_for_layout ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-login">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a href="#" class="active" id="login-form-link">Login</a>
                                            </div>
                                            <div class="col-xs-6">
                                                <a href="#" id="register-form-link">Register</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form id="login-form"  method="post" role="form" style="display: block;">
                                                    <!--?= $this->Form->create('User'); ?-->
                                                    <div class="form-group">
                                                        <!--?= $this->Form->input('username', array('label' => 'Identifiant')); ?-->
                                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=""-->
                                                    </div>
                                                    <div class="form-group">
                                                        <!--?= $this->Form->input('password', array('label' => 'Mot de passe')); ?-->
                                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                                        <label for="remember"> Remember Me</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                                <!--?= $this->Form->end('Se connecter'); ?-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="text-center">
                                                                    <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
                                                    <div class="form-group">
                                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
  </body>
</html>
