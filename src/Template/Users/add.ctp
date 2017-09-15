<ul class="page-breadcrumb breadcrumb">
	<li>
		<i class="fa fa-home">
		</i>
		Home
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		<a href="<?php echo $this->request->webroot.'adminmodule/users'; ?>">
			Users		</a>
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		Add	</li>
</ul>

<div style='padding-bottom:10px;'>
	<?php echo $this->Flash->render(); ?>
</div>
<script type="text/javascript">
	$(document).ready(function()
		{
			var error1 = $('.alert-danger');
			$('#AddUserForm').validate(
				{
					errorElement: 'span', //default input error message container
					errorClass: 'help-block', // default input error message class
					focusInvalid: false, // do not focus the last invalid input
					ignore: "",
					rules:
					{

						"id" : {required : true},
"group_id" : {required : true},
"first_name" : {required : true},
"last_name" : {required : true},
"email" : {required : true},
"password" : {required : true},
"request_reset_password" : {required : true},
"status" : {required : true},
					},
					messages:
					{

						"id" : {required :"Please enter id."},
"group_id" : {required :"Please enter group id."},
"first_name" : {required :"Please enter first name."},
"last_name" : {required :"Please enter last name."},
"email" : {required :"Please enter email."},
"password" : {required :"Please enter password."},
"request_reset_password" : {required :"Please enter request reset password."},
"status" : {required :"Please enter status."},
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
		});

</script>


<div class="row">
	<div class="col-md-12">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder">
							</i><?php echo __('Add User') ?>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form locations">
						<div class="alert alert-danger display-hide">
							<button data-close="alert" class="close">
							</button>
							You have some form errors. Please check below.
						</div>
						<?php echo $this->Form->create($user,array('class'=> 'form-horizontal','id'   =>'AddUserForm')) ?>
						<div class="form-body">

							<?php
																	echo $this->Form->input('group_id', ['options' => $groups]);
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('first_name' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('first_name',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('last_name' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('last_name',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('email' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('email',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('password' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('password',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('request_reset_password' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('request_reset_password',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
										
										?>
										<div class="form-group">
											<?php echo $this->Form->label('status' ,null, array('class'=> 'col-md-3 control-label'));
											?>
											<div class="col-md-4">
												<?php echo $this->Form->input('status',['class' => 'form-control', 'label' => false]);?>
											</div>
										</div>
										<?php
																	?>

							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn blue">
										Submit
									</button>
									<button type="button" class="btn default" onclick="window.location='<?php echo $this->request->webroot.'adminmodule/users'; ?>'">
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
