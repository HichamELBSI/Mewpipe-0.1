<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="<?=$user['avatar'];?>" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $user['username']; ?>
                    </div>
                    <div class="profile-usertitle-job">
                        <?php echo $user['mail']; ?>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#/videos" id="l-videos">
                                Videos </a>
                        </li>
                        <li>
                            <a href="#/settings" id="l-settings">
                                Account Settings </a>
                        </li>
                        <li>
                            <a href="#/help" id="l-help">
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div id="videos">
                    <legend>Videos</legend>
                    <div class="row">
                        <?php foreach($videos as $k=>$v): $v = current($v) ?>
                        <div class="col-xs-6 col-md-3" style="margin: 0 5px;">
                            <?php echo $this->Html->link($v['name'], 
                                array('action'=>'show', $v['id'], 'class'=>'thumbnail')); ?>
                            <?php echo $this->Html->link(
                                $this->Html->media($v['url'],
                                    array(
                                        'style'=>'background:#eee;',
                                        'height'=>'100px',
                                        'width'=>'200px',
                                        'preload'=>'metadata'
                                    )), 
                                    array(
                                        'controller'=>'homes',
                                        'action'=>'show',
                                        $v['id']
                                    ),
                                    array('escape' => false)); ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div style='display:none;' id="settings">
                    <?=  $this->Form->create('User', array('type'=>'file','class'=>'form-horizontal', 'div'=>false, 'action' => 'edit')); ?>
                        <fieldset>
                        <!-- Form Name -->
                        <legend>Settings</legend>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="Username">Username</label>  
                          <div class="col-md-4">
                          <?= $this->Form->input('username', array('readonly'=>'true','value'=>$user['username'],'label' => false, 'class' => 'form-control input-md', 'placeholder'=>'Username', 'div'=>false)); ?>
                          </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="mail">Mail address</label>  
                          <div class="col-md-4">
                          <?= $this->Form->input('mail', array('value'=>$user['mail'],'label' => false, 'class' => 'form-control input-md', 'placeholder'=>'Mail Address','required', 'div'=>false)); ?>
                            
                          </div>
                        </div>

                        <div id="password">
                            <div class="form-group">
                              <label class="col-md-4 control-label" for="password">Password</label>
                              <div class="col-md-4">
                                <?= $this->Form->input('password', array('label' => false, 'class' => 'form-control input-md', 'placeholder'=>'Password', 'div'=>false)); ?>
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="confirm-password">Confirm password</label>
                              <div class="col-md-4">
                                <?= $this->Form->input('password_2', array('type'=>'password','label' => false, 'class' => 'form-control input-md', 'placeholder'=>'Password', 'div'=>false)); ?>
                              </div>
                        </div>
                        <!-- File Button --> 
                        <div class="form-group">
                          <label class="col-md-4 control-label" for="Avatar">Avatar</label>
                          <div class="col-md-4">
                            <input id="Avatar" name="Avatar" class="form-control input-file" type="file">
                          </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>
                          <div class="col-md-8">
                            <?= $this->Form->end(array('label' => 'Save', 'class'=>'btn btn-success', 'div'=>false, 'id'=>'save','name'=>'save'));?>
                          </div>
                        </div>

                        </fieldset>
                    </form>
                </div>
                <div style='display:none;' id="help">
                    <h3 style="margin-top: 0;">Help</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {
        $('#videos').show();
        $('#settings').hide();
        $('#help').hide();
        $('#l-videos').click(function() {
            $('#videos').show();
            $('#settings').hide();
            $('#help').hide();
            $('#l-videos').parents().addClass('active');
            $('#l-settings').parents().removeClass('active');
            $('#l-help').parents().removeClass('active');
        });
        $('#l-settings').click(function() {
            $('#videos').hide();
            $('#settings').show();
            $('#help').hide();
            $('#l-settings').parents().addClass('active');
            $('#l-videos').parents().removeClass('active');
            $('#l-help').parents().removeClass('active');
        });
        $('#l-help').click(function() {
            $('#videos').hide();
            $('#settings').hide();
            $('#help').show();
            $('#l-help').parents().addClass('active');
            $('#l-videos').parents().removeClass('active');
            $('#l-settings').parents().removeClass('active');
        });
    });
</script>