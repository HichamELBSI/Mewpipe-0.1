


<div class="container">
    <div class="row profile">
        <div class="col-md-6">
            <div class="profile-content">
                <?= $this->Form->create('User', array('class'=>'form-signin', 'div'=>false)); ?>
                <h2 class="form-signin-heading">
                    Sign in
                </h2>
                <div class="form-group">
                <label for="inputEmail" class="sr-only">Username</label>
                    <?= $this->Form->input('username', array('class' => 'form-control', 'placeholder'=>'Username','required','autofocus', 'div'=>false)); ?>
                    </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <?= $this->Form->input('password', array('class' => 'form-control', 'placeholder'=>'Password', 'div'=>false)); ?>
                </div>
                <div class="checkbox">
                  <label>
                    <?php echo $this->Form->checkbox('remember_me'); ?> Remember Me
                  </label>
                </div>

                <?= $this->Form->end(array('label' => 'Login', 'class'=>'btn btn-lg btn-primary btn-block', 'div'=>false));?>
                <div class="form-group" style="text-align:center;">
                    <?php echo $this->Html->image('facebook.png', array(
                    'alt' => 'Login with facebook',
                    'width'=>'50%;',
                    'onclick'=>"window.open('http://localhost/facebook','_blank','toolbar=0, location=0, directories=0, status=0, scrollbars=0, resizable=1, copyhistory=0, left=500,top=500,menuBar=0, width=400, height=150');return(false);"));?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-sidebar">
                <?= $this->Form->create('User', array('class'=>'form-signin', 'div'=>false,'action'=>'add')); ?>
                <h2 class="form-signin-heading">Sign up</h2>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Username</label>
                    <?= $this->Form->input('username', array('id'=>'create-user','class' => 'form-control', 'placeholder'=>'Username','required','autofocus', 'div'=>false)); ?>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <?= $this->Form->input('password', array('id'=>'create-password','class' => 'form-control', 'placeholder'=>'Password', 'div'=>false)); ?>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Mail</label>
                    <?= $this->Form->input('mail', array('id'=>'create-mail','class' => 'form-control', 'placeholder'=>'Password', 'div'=>false)); ?>
                </div>
                <?= $this->Form->end(array('label' => 'Sign up', 'class'=>'btn btn-lg btn-primary btn-block', 'div'=>false));?>
            </div>
        </div>
    </div>
</div>
