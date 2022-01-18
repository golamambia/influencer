<!-- BEGIN: Main Menu-->
<style type="text/css">
	.mn_act_cls{
		background: #1b9b9d !important;
	}
</style>
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" navigation-header"><span>Admin Panel</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
          </li>
          
          
          <li class="nav-item"><a href="<?php echo base_url();?>apanel/home"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
          </li>
          
          
         
          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='user'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-user"></i><span class="menu-title" data-i18n="">User</span><span class="badge badge badge-primary badge-pill float-right mr-2">4</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/user/">User List</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='free_user'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/user/free_user">Free User List</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='paid_user'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/user/paid_user">Paid User List</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='upgrade_user'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/user/upgrade_user">Add-on pack user list</a>
              </li>
              
              
            </ul>
          </li>

          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='pricing' || $this->router->fetch_class()=='extra_plan'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-calendar"></i><span class="menu-title" data-i18n="">Pricing Section</span><span class="badge badge badge-primary badge-pill float-right mr-2">2</span></a>
            <ul class="menu-content" style="">

               <li class="has-sub <?php if($this->router->fetch_method()=='index'){echo "open";}?>"><a class="menu-item" href="#">Subscription price</a>
                <ul class="menu-content">
                  <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/pricing/">Pricing List</a>
                  </li>
                  <li class="<?php if($this->router->fetch_method()=='index'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/extra_plan/">Extra Plan</a>
                  </li>
                  
                </ul>
              </li>
             
             
            </ul>
          </li> 

          <li class="nav-item has-sub <?php if($this->router->fetch_class()=='settings'){echo "open";}?>"><a href="javascript:void(0)"><i class="ft-settings"></i><span class="menu-title" data-i18n="">Settings</span><span class="badge badge badge-primary badge-pill float-right mr-2">3</span></a>
            <ul class="menu-content" style="">
              <li class="<?php if($this->router->fetch_method()=='profile'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/settings/profile">Profile</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='general'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/settings/general">General Setting</a>
              </li>
              <li class="<?php if($this->router->fetch_method()=='change_password'){echo "mn_act_cls";}?>"><a class="menu-item" href="<?php echo base_url();?>apanel/settings/change_password">Change Password</a>
              </li>
              
            </ul>
          </li>
          
          
        </ul>



      </div>
    </div>
    <!-- END: Main Menu-->
    <div class="app-content content">