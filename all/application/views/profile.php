<!DOCTYPE html>
<html lang="en">
   <head>
      <?php $this->load->view('includes/meta'); ?>
      <link href="<?php echo base_url();?>assets_front/css/listing.css" rel="stylesheet" />
   </head>
   <body>
      <?php $this->load->view('includes/header'); ?>
      <!-- /header -->
      <div class="clearfix"></div>
      <main>
     <div class="main_box">
       <div class="container">
           <div class="site-content-contain-wrapper clearfix">
                <!--Left Panel Start-->
                <div class="left-panelbg"></div>
                  
                <!--Left Panel End-->
                <?php $this->load->view('left_menu'); ?>
                
                <!--Main Contaner Start-->
                 <div id="main">
                   <div class="site-content-contain">
                    <div id="content" class="site-content">
                       <div class="page-header clearfix">
                            <h1 class="pull-left"><i class="icon fa fa-home" aria-hidden="true"></i> Dashboard</h1>
                        </div>
                        
                        
                        <div class="card card-box">
                <div class="card-head">
                  <header>edit profile</header>
                  
                </div>
                <div class="card-body no-padding height-9">
                  <?php if($this->session->flashdata('error')){?>



                              <div class="alert alert-danger alert-dismissable">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>

                  </div>                           

                   <?php } if($this->session->flashdata('message')){?>

                    <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>

<!-- <p style="font-weight: 500;"><a href="<?=base_url();?>register/login">Login Now</a></p> -->

</div>



                   <?php }?>

                  <form method="post" action="<?=base_url();?>/dashboard/profile_update/<?=$user_info[0]->id;?>" enctype="multipart/form-data">
                  <div class="row">
                                      <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="<?=$user_info[0]->name;?>" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email" value="<?=$user_info[0]->email;?>" name="email" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone No.</label>
                                        <input type="text" class="form-control numeric_input" placeholder="Phone No." maxlength="11" style="pointer-events: none;" value="<?=$user_info[0]->phone;?>" required="" />
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" placeholder="Address" required=""><?=$user_info[0]->address;?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Profile pic</label>
                                        <input type="file" class="form-control " name="profile_pic1"  />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                  <label>Profile pic</label>
                                    <div class="form-group">
                                        <img style="width: 50px;height: 50px;" src="<?=base_url();?>uploads/customers/<?=$this->session->userdata('cus_profile_pic');?>">
                                    </div>
                                </div>

                                      <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary text-capitalize">Update</button>
                                </div>

                                    </div>
                                  </form>
                </div>
              </div>
                        
                        
                        
                        
                       
                        
                        
                    </div>
                  </div>
                </div>
<!--Main Contaner Start-->
                
          </div> 
       </div>
    </div>
    </main>
      <!-- /main -->
      <?php $this->load->view('includes/footer'); ?>
   </body>
</html>