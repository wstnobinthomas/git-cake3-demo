<script type="text/javascript">
	$(document).ready(function()
		{
			var error1 = $('.alert-danger');
			$('#AdminuserEditForm').validate(
				{
					errorElement: 'span', //default input error message container
					errorClass: 'help-block', // default input error message class
					focusInvalid: false, // do not focus the last invalid input
					ignore: "",
					rules:
					{
						"first_name" :
						{
							required : true,regexalphabet : true,minlength:2
						},
						"last_name" :
						{
							required : true,regexalphabet : true,minlength:1
						},
						"email" :
						{
							required : true, email:true
						},
					},
					messages:
					{
						"first_name" :
						{
							required :"Please enter first name.",regexalphabet : "Only alphabets are allowed."
						},
						"last_name" :
						{
							required :"Please enter last name.",regexalphabet : "Only alphabets are allowed."
						},
						"email" :
						{
							required :"Please enter email address.",email : "Please enter a valid email address."
						},
					},

					invalidHandler: function (event, validator)
					{
						//display error alert on form submit
						//success1.hide();
						error1.show();
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
				});



			$('#AdminuserPasswordEditForm').validate(
				{
					errorElement: 'span', //default input error message container
					errorClass: 'help-block', // default input error message class
					focusInvalid: false, // do not focus the last invalid input
					ignore: "",
					rules:
					{
						"oldpassword" :
						{
							required : false
						},
						"newpassword" :
						{
							required :true, minlength : 5
						},
						"confirmpwd" :
						{
							required :true, equalTo: "#newpassword"
						},

					},

					messages:
					{
						"oldpassword" :
						{
							required :"Please enter old password."
						},
						"newpassword" :
						{
							required :"Please enter new password.", minlength : "Password too short. Use at least 5 characters."
						},
						"confirmpwd" :
						{
							required :"Please confirm new password.", equalTo: "Password mismatch."
						}
					},

					invalidHandler: function (event, validator)
					{
						//display error alert on form submit
						//success1.hide();
						error1.show();
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
				});

			var crntName =  $("#email").val();
			$("#btnSubmit").click(function()
				{
					$('#AdminuserEditForm').valid();
					var name= $("#email").val();
					var originalElemVal = $("#email").attr("data");
					if(crntName!=name)
					{
						$.ajax(
							{
								url: "<?php echo $this->request->webroot;?>adminmodule/users/ajax_duplicateemail/"+name,
								cache: false,
								success: function(html)
								{
									if(html == 1)
									{
										bootbox.alert('Email address already exists.');
										$("#email").val(originalElemVal);
									}else
									{
										$("#AdminuserEditForm").submit();
									}

								}
							});
					}else
					{
						$("#AdminuserEditForm").submit();
					}
				});
		});
</script>
<ul class="page-breadcrumb breadcrumb">
	<li>
		<i class="fa fa-home">
		</i>
		Home
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		<a href="<?php echo $this->request->webroot.'adminmodule/users/profile'; ?>">
			Profile
		</a>
	</li>
</ul>

<div style='padding-bottom:10px;'>
	<?php echo $this->Flash->render();?>
</div>
<div class="alert alert-danger display-hide">
	<button data-close="alert" class="close">
	</button>
	You have some form errors. Please check below.
</div>

<div class="row">
	<div class="col-md-12">
		<div class="tab-content">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user">
						</i><?php echo __('Update Profile'); ?>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
					</div>
				</div>
				<div class="portlet-body form users">
					<!-- BEGIN FORM-->
					<?php echo $this->Form->create('$user', array('class'=> 'form-horizontal','id'   =>'AdminuserEditForm','url'    =>array('controller'=>'Users','action'    =>'profile'))); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-5 control-label" for="">
								&nbsp;
							</label>
							<div class="col-md-6">
								<div class="input text">
									<span class="required" style="color:#F00">
										*
									</span>= Required
								</div>
							</div>
						</div>


						<?php echo $this->Form->input('id', array('type'    => 'hidden','class'   => 'form-control','label'   => false,'required'=> false,'value'   =>$user['id']));?>

						<div class="form-group">
							<label class="col-md-4 control-label">
								First Name
								<span class="required">
									*
								</span>
							</label>
							<div class="col-md-4">
								<?php echo $this->Form->input('first_name', array('class'      => 'form-control','label'      => false,'required'   => false,'hiddenField'=> false,'value'      =>$user['first_name'])); ?>
							</div>
						</div>



						<div class="form-group">
							<label class="col-md-4 control-label">
								Last Name
								<span class="required">
									*
								</span>
							</label>
							<div class="col-md-4">
								<?php echo $this->Form->input('last_name', array('class'      => 'form-control','label'      => false,'required'   => false,'hiddenField'=> false,'value'      =>$user['last_name'])); ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">
								Email
								<span class="required">
									*
								</span>
							</label>
							<div class="col-md-4">
								<?php echo $this->Form->input('email', array('class'   => 'form-control','label'   => false,'required'=> false,'data'    => $user['email'],'value'   =>$user['email']));?>
							</div>
						</div>
						<div class="form-actions fluid">
							<div class="col-md-offset-4 col-md-9">
								<input type="button" class="btn blue" value="Submit" id="btnSubmit"/>
								<button type="button" class="btn default" onclick="window.location='<?php echo $this->request->webroot.'adminmodule/users/profile'; ?>'">
									Cancel
								</button>

							</div>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
					<!-- END FORM-->
				</div>
			</div>
		</div>
	</div>
</div>





</br></br>
<div class="row">
	<div class="col-md-12">
		<div class="tab-content">
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-lock">
						</i><?php echo __('Change Password'); ?>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
					</div>
				</div>
				<div class="portlet-body form users">
					<!-- BEGIN FORM-->
					<?php echo $this->Form->create('User', array('class'=> 'form-horizontal','id'   =>'AdminuserPasswordEditForm','url'    =>array('controller'=>'Users','action'    =>'changepassword'))); ?>
					<div class="form-body">
						<div class="form-group">
							<label class="col-md-5 control-label" for="">
								&nbsp;
							</label>
							<div class="col-md-6">
								<div class="input text">
									<span class="required" style="color:#F00">
										*
									</span>= Required
								</div>
							</div>
						</div>
						<?php echo $this->Form->input('id', array('type'    => 'hidden','class'   => 'form-control','label'   => false,'required'=> false,'value'   =>$user['id']));?>

						<div class="form-group">
							<label class="col-md-4 control-label">
								New Password
								<span class="required">
									*
								</span>
							</label>
							<div class="col-md-4">
								<?php
								echo $this->Form->input('newpassword', array('class'      => 'form-control','label'      => false,'required'   => false,'type'       =>'password','hiddenField'=> false));
								?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">
								Confirm New Password
								<span class="required">
									*
								</span>
							</label>
							<div class="col-md-4">
								<?php
								echo $this->Form->input('confirmpwd', array('class'      => 'form-control','label'      => false,'type'       =>'password','required'   => false,'hiddenField'=> false));
								?>
							</div>
						</div>
						<div class="form-actions fluid">
							<div class="col-md-offset-4 col-md-9">
								<input type="submit" class="btn blue" value="Submit"  />
								<button type="button" class="btn default" onclick="window.location='<?php echo $this->request->webroot.'adminmodule/users/profile'; ?>'">
									Cancel
								</button>

							</div>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
					<!-- END FORM-->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>



