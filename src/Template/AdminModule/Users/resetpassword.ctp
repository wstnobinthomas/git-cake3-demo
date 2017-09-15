<script type="text/javascript">
	$(document).ready(function()
		{
			var error1 = $('.alert-danger');
			$('#userForgotpassword').validate(
				{
					errorElement: 'span', //default input error message container
					errorClass: 'help-block', // default input error message class
					focusInvalid: false, // do not focus the last invalid input
					ignore: "",
					rules:
					{
						"newpassword" :
						{
							required : true,minlength:7,maxlength :15
						},
						"confirmpassword" :
						{
							required : true,equalTo: "#UserNewpassword"
						}
					},
					messages:
					{
						"newpassword" :
						{
							required :"Please enter new password.",minlength: "Password must be between 7-15 characters.",maxlength : "Password must be between 7-15 characters."
						},
						"confirmpassword" :
						{
							required :"Confirm password.",equalTo :"Please enter the same password as above."
						}
					},

					invalidHandler: function (event, validator)
					{
						//display error alert on form submit
						//success1.hide();
						error1.show();
						$("span.error").html('&nbsp;');
						//App.scrollTo(error1, -200);
					},

					highlight: function (element)
					{
						// hightlight error inputs
						$(element)
						.closest('.form-group').addClass('has-error'); // set error class to the control group
					},

					unhighlight: function (element)
					{
						// revert the change done by hightlight
						$(element)
						.closest('.form-group').removeClass('has-error'); // set error class to the control group
					},

					success: function (label)
					{
						label
						.closest('.form-group').removeClass('has-error'); // set success class to the control group
						label
						.closest('.form-group').removeClass('error');
					},
					submitHandler: function (form)
					{
						//console.log("Submitted!");
						form.submit();
					},

				});
		});

</script>
<!-- BEGIN LOGIN FORM -->
<span class="login-form">
	<?php echo $this->Form->create('',['url'=>['controller'=>'users','action'=>'resetforgottenpassword'],'id'=>'userForgotpassword']); ?>
	<?php echo $this->Form->input('email', array('type' => 'hidden','value'=> $email)); ?>
	<h3 class="form-title">
		Reset Password
	</h3>
	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label>
			New Password
		</label>
		<?php echo $this->Form->input('newpassword', array('type' => 'password','class'=> 'required form-control placeholder-no-fix','label'=> false)); ?>

	</div>
	<div class="form-group">
		<label>
			Confirm Password
		</label>
		<?php echo $this->Form->input('confirmpassword', array('type' => 'password','class'=> 'indent round_all form-control placeholder-no-fix','label'=> false)); ?>

	</div>
	<div class="form-actions">
		<!--<label class="checkbox">
		<input type="checkbox" name="remember" value="1"/> Remember me </label>-->
		<button type="submit" class="btn green pull-right">
			Submit
			<i class="m-icon-swapright m-icon-white">
			</i>
		</button>
	</div>

	<?php  echo $this->Form->end();?>
</span>
<!-- END LOGIN FORM -->
