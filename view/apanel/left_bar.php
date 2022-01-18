
<?php 
 $page_con=$this->router->fetch_class(); 
$page_fun=$this->router->fetch_method(); 

?>
<div class="left-panel">
                            <div class="profile">
                                <div class="icon">
                                   <img src="<?php echo base_url();?>assets_front/images/usericon.png" alt="image">
                                   <!-- <?php if($this->session->userdata('user_photo')){?>
                                    <img src="<?=base_url();?>uploads/<?=$this->session->userdata('user_photo');?>" alt="man" />
                                <?php }else{?>
                                     <img src="<?=base_url();?>assets_front/images/man.jpg" alt="man" />
                                <?php }?>-->
                                    <!-- <?php if($this->session->userdata('user_photo')){?>
                                    <img src="<?=base_url();?>uploads/<?=$this->session->userdata('user_photo');?>" alt="man" />
                                <?php }else{
                                    if($this->session->userdata('infl_sess')['user_photo']){

                                    ?>
                                    <img src="<?=base_url();?>uploads/<?=$this->session->userdata('infl_sess')['user_photo'];?>" alt="man" />

                                <?php }else{?>
                                     <img src="<?=base_url();?>assets_front/images/man.jpg" alt="man" />
                                <?php }}?> -->
                                </div>
                                <h3><?=ucfirst($this->session->userdata('infl_sess')['name']);?></h3>
                                <h4>profile status <small class="text-success">active</small></h4>
                            </div>
                            <div class="menu_area">
                               
                                <ul>
                                    <li class=" <?php if($page_con=='dashboard' && $page_fun=='profile'){echo"active";} ?>"><a href="<?=base_url();?>dashboard/profile"><i class="zmdi zmdi-account-o"></i>Profile</a></li>
								 
									
									<li class=" <?php if($page_con=='dashboard' && $page_fun=='subscribe' || $page_con=='dashboard' && $page_fun=='index'){echo"active";} ?>"><a href="<?=base_url();?>dashboard/subscribe"><i class="zmdi zmdi-storage"></i></i>Package</a></li>
									           
                                 <li class=" <?php if($page_con=='dashboard' && $page_fun=='change_password'){echo"active";} ?>"><a  href="<?=base_url();?>dashboard/change_password"><i class="zmdi zmdi-lock"></i></i>Change Password</a></li>                                                        
									
                                    <li><a href="<?=base_url();?>dashboard/logout"><i class="zmdi zmdi-power"></i></i>Logout</a></li>
                                </ul>
                            </div>
                            <img class="curveimg" src="<?=base_url();?>assets_front/images/curve.png" alt=""> 
                        </div>