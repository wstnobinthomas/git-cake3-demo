<ul class="page-breadcrumb breadcrumb">
	<li>
		<i class="fa fa-home">
		</i>
		Home
		<i class="fa fa-angle-right">
		</i>
	</li>
	<li>
		<a href="<?php echo $this->request->webroot.'adminmodule/dashboard'; ?>">
			Dashboard
		</a>
	</li>
</ul>

<div class="row">
	<div class="col-md-3 ">
		<div class="dashboard-stat blue">
			<div class="visual">
				<i class="fa fa-group">
				</i>
			</div>
			<div class="details">
				<div class="number">
					<?php $totaluser=123; echo $totaluser;?>
				</div>
				<div class="desc">
					Registered Users
				</div></br>
			</div>

			<a class="more" href="<?php echo $this->request->webroot;?>adminmodule/users">
				View more
				<i class="m-icon-swapright m-icon-white">
				</i>
			</a>

		</div>
	</div>
	<div class="col-md-3 ">
		<div class="dashboard-stat green">
			<div class="visual">
				<i class="fa fa-cogs ">
				</i>
			</div>
			<div class="details">
				<div class="number">
					123
				</div>
				<div class="desc">
					Total Active Products
				</div></br>
			</div>

			<a class="more" href="<?php echo $this->request->webroot;?>adminmodule/products">
				View more
				<i class="m-icon-swapright m-icon-white">
				</i>
			</a>
		</div>
	</div>
	<div class="col-md-3 ">
		<div class="dashboard-stat yellow">
			<div class="visual">
				<i class="fa fa-home">
				</i>
			</div>
			<div class="details">
				<div class="number">
					123
				</div>
				<div class="desc">
					New Orders
				</div></br>
			</div>

			<a class="more" href="<?php echo $this->request->webroot;?>adminmodule/ordermetas">
				View more
				<i class="m-icon-swapright m-icon-white">
				</i>
			</a>
		</div>
	</div>
	<div class="col-md-3 ">
		<div class="dashboard-stat blue">
			<div class="visual">
				<i class="fa fa-money ">
				</i>
			</div>
			<div class="details">
				<div class="number">
					1500
				</div>
				<div class="desc">
					sale Amount
				</div></br>
			</div>

			<a class="more" href="#">
				View more
				<i class="m-icon-swapright m-icon-white">
				</i>
			</a>
		</div>
	</div>
</div>



<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>
<div class="row">
	<div class="col-md-12">
		<div class="portlet box green">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-list-alt">
					</i><?php echo __('Recent Stats'); ?>
				</div>
			</div>
			<div class="portlet-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover " id="sample_1">
						<thead>
							<tr>
								<th>
									#
								</th>
								<th>
									Name
								</th>
								<th>
									Type
								</th>
								<th>
									Date
								</th>

								<th>
									View
								</th>
							</tr>
						</thead>

						<?php
						if(isset($recentorders) && sizeof($recentorders) > 0)
						{
							?>
							<tbody>
							<?php $slno = 0;
							foreach($recentorders as $recentorder): $slno++?>
							<tr>
								<td>
									<?php echo $slno; ?>
								</td>
								<td>
									<?php echo h($recentorder['billusrfirstname']); ?> <?php echo h($recentorder['billusrlastname']); ?>
								</td>
								<td>
									<?php echo h($paymentoptions[$recentorder['ordermetas']['0']['paymenttype']]); ?>&nbsp;
								</td>
								<td>
									<?php echo h($recentorder['ordermetas']['0']['orderdate']); ?>&nbsp;
								</td>

								<td>
									<?php echo $this->Html->link(__('<i class="fa fa-search"></i> View'), ['action' => 'view', $recentorder->id],['class' => 'btn default btn-xs blue','escape' => FALSE]) ?>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php
						}
						else
						{
							?>
							<tr>
								<td colspan='7' align='center'>
									No recent stats
								</td>
							</tr>
							<?php
						}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>