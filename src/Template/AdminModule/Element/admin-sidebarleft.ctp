<!--  <?php //$user = $this->Session->read('Auth.User'); 
//$this->set('tabPermission', $this->Session->read("tabPermission"));
?> -->
<ul class="page-sidebar-menu">
	<li class="sidebar-toggler-wrapper">
		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		<div class="sidebar-toggler hidden-phone">
		</div>
		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	</li>
	<br>
                
<li class=" <?php if(strtolower($this->request->params['controller'])=='dashboard')echo 'active';?>"  >
    <a class="loadButton" href="<?php echo $this->request->webroot;?>adminmodule/dashboard">
     <i class="fa fa-dashboard"></i>
      <span class="title">
       Dashboard
         <span class="badge badge-danger"></span>
      </span>
      <span class="selected">
      </span>
    </a>
  </li>  


 <li class=" <?php if(($this->request->params['controller']=='Emailtemplates' && ($this->request->params['action']=='add' || $this->request->params['action'] == 'edit' || $this->request->params['action'] == 'view' || $this->request->params['action'] == 'index')))echo 'active';?> " >
		<a class="loadButton" href="<?php echo $this->request->webroot;?>adminmodule/emailtemplates/index">
			<i class="fa fa-envelope"></i>
			<span class="title">
				Email Template
				 <span class="badge badge-danger"></span>
			</span>
			<span class="selected">
			</span>
		</a>
	</li>



   <li class=" <?php if(($this->request->params['controller']=='Setting1'|| $this->request->params['controller']=='Setting2'))echo 'active';?> " >
              
                <a href="javascript:;">
                    <i class="fa fa-cogs "></i>
                    <span class="title">
                      Settings
                    </span>
                    <span class="arrow ">
                    </span>
                    <span class="selected ">
                    </span>
                    </a>
                    <ul class="sub-menu" >
					
                    <li class=" <?php if(($this->request->params['controller']=='setting1' && ($this->request->params['action']=='add' || $this->request->params['action'] == 'edit' || $this->request->params['action'] == 'view' || $this->request->params['action'] == 'index')))echo 'active';?> " >
                      <a href="<?php echo $this->request->webroot;?>adminmodule/setting1">Setting 1</a>
                    </li>
                     </ul>
                </li>

   <li class=" <?php if($this->request->params['controller']=='Users' && ($this->request->params['action']=='profile'))echo 'active';?>"  >
                <a class="loadButton" href="<?php echo $this->request->webroot; ?>adminmodule/users/profile">
                    <i class="fa fa-picture-o"></i>
                    <span class="title">
                      Profile <span class="badge badge-danger"></span>
                    </span>
                    <span class="selected">
                    </span>
                </a>
                </li>  
              
	<li class="" >
		<a class="loadButton" href="<?php echo $this->request->webroot;?>adminmodule/users/logout">                   
			<i class="fa fa-key"></i>
			<span class="title">
				Logout
			</span>
			<span class="selected">
			</span>
		</a>
	</li>   
</ul>                