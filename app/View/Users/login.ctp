<?= $this->Form->create('User', array('class'=>'form-signin', 'div'=>false)); ?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Username</label>
    	<?= $this->Form->input('username', array('class' => 'form-control', 'placeholder'=>'Username','required','autofocus', 'div'=>false)); ?>
    <label for="inputPassword" class="sr-only">Password</label>
    	<?= $this->Form->input('password', array('class' => 'form-control', 'placeholder'=>'Password','required', 'div'=>false)); ?>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
<?= $this->Form->end(array('label' => 'Se connecter', 'class'=>'btn btn-lg btn-primary btn-block', 'div'=>false));?>