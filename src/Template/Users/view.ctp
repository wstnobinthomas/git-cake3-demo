
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
			Users</a>
		<i class="fa fa-angle-right">
		</i>
			View
	</li>
</ul>

<div style='padding-bottom:10px;'>
	<?php echo $this->Flash->render(); ?>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="tab-content">
			<div class="tab-pane active" id="tab_0">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-reorder">
							</i>View <?= __('User') ?>
						</div>
						<div class="tools">
							<a href="javascript:;" class="collapse">
							</a>
						</div>
					</div>
					<div class="portlet-body form users">
						<div class="alert alert-danger display-hide">
							<button data-close="alert" class="close">
							</button>
							You have some form errors. Please check below.
						</div>
						<!-- BEGIN FORM-->
						<?php echo $this->Form->create('District', array('class'=> 'form-horizontal')); ?>
						<div class="form-body">
							<!--
							<div class='form-group'>
							<?php echo $this->Form->label('pincode:' ,null, array('class' => 'col-md-3 control-label')); ?>
							<div class='col-md-4'>
							<p class="form-control-static"><?php echo h($pincode->district->name);?></p>
							</div>
							</div> -->

																												<div class='form-group'>
								<?php echo $this->Form->label('Group:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($user->group_id) ?>
								</div>
							</div>
																												<div class='form-group'>
								<?php echo $this->Form->label('First Name:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($user->first_name) ?>
								</div>
							</div>

																												<div class='form-group'>
								<?php echo $this->Form->label('Last Name:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($user->last_name) ?>
								</div>
							</div>

																												<div class='form-group'>
								<?php echo $this->Form->label('Email:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($user->email) ?>
								</div>
							</div>

																												<div class='form-group'>
								<?php echo $this->Form->label('Password:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($user->password) ?>
								</div>
							</div>

																												<div class='form-group'>
								<?php echo $this->Form->label('Request Reset Password:' ,null, array('class'=> 'col-md-3 control-label')); ?>
								<div class='col-md-4'>
									<p class="form-control-static"><?= h($user->request_reset_password) ?>
								</div>
							</div>

																					
							<div class="form-actions fluid">
								<div class="col-md-offset-3 col-md-9">
									<button type="button" class="btn blue" onclick="window.location='<?php echo $this->request->webroot.'adminmodule/users'; ?>'">
										Go Back
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