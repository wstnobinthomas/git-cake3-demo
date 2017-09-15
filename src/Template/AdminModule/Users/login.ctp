
<!-- BEGIN LOGIN FORM -->
<?php
echo $this->Form->create('User',
	array(
		'url'   => array(
			'controller'=> 'users',
			'action'    => 'login'
		),
		'id'   => 'login-form',
		'class'=> 'login-form '
	));
?>

<h3 class="form-title">
	Login to your account
</h3>
<div class="alert alert-danger display-hide">
	<button class="close" data-close="alert">
	</button>
	<span>
		Enter email and password.
	</span>
</div>
<div id="alert">
	<div style='padding-bottom:10px;'>
		<?php echo $this->Flash->render(); ?>
	</div>
</div>
<div class="form-group">
	<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
	<label class="control-label visible-ie8 visible-ie9">
		Email
	</label>
	<div class="input-icon">
		<i class="fa fa-user">
		</i>
		<?php echo $this->Form->input('Users.email', array('name'        => 'email','id'          => 'login-email','autocomplete'=> 'off' ,'placeholder' => 'Email','class'       => 'form-control placeholder-no-fix','label'       => false,'div'         =>false));?>
	</div>
</div>
<div class="form-group">
	<label class="control-label visible-ie8 visible-ie9">
		Password
	</label>
	<div class="input-icon">
		<i class="fa fa-lock">
		</i>
		<?php echo $this->Form->input('Users.password', array('name'        => 'password','id'          => 'login-password','autocomplete'=> 'off' ,'placeholder' => 'Password','class'       => 'form-control placeholder-no-fix','label'       => false,'div'         =>false));?>
	</div>
</div>
<div class="form-actions">
	<label class="checkbox">
	<button type="submit" class="btn blue pull-right">
		Login
		<i class="m-icon-swapright m-icon-white">
		</i>
	</button>
</div>
<div class="forget-password">
	<h4>
		Forgot your password ?
	</h4>
	<p>
		no worries, click
		<a href="javascript:;" id="forget-password" style="color:#fff !important; text-decoration:underline !important;">
			here</a>
		to reset your password.
	</p>
</div>
<?php echo $this->Form->end(); ?>
<!-- END LOGIN FORM -->


<!-- BEGIN FORGOT PASSWORD FORM -->
<?php echo $this->Form->create('Forgotpassword',array('class' => 'forget-form','id'    =>'ForgotpasswordForm','url'   => ['controller' => strtolower('Users'),'action'=> 'forgotpassword'])) ?>
<h3>
	Forget Password ?
</h3>
<p>
	Enter your e-mail address below to reset your password.
</p>

<div id="alert1">
	<div style='padding-bottom:10px;'>
		<?php echo $this->Flash->render(); ?>
	</div>
</div>
<div class="form-group">
	<div class="input-icon">
		<i class="fa fa-envelope">
		</i>
		<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
	</div>
</div>
<div class="form-actions">
	<button type="button" id="back-btn" class="btn">
		<i class="m-icon-swapleft">
		</i> Back
	</button>
	<button type="submit" class="btn blue pull-right">
		Submit
		<i class="m-icon-swapright m-icon-white">
		</i>
	</button>
</div>
<?php echo $this->Form->end(); ?>
<!-- END FORGOT PASSWORD FORM -->