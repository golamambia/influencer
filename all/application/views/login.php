<style type="text/css">
      .error_msg p{
    color: #e53935 !important;
  }
  </style>
<!-- sign up area start -->
    <section class="mian-area">
        <div class="container-fluid">
        
                      
            
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="form_area">
                        <h3>Log In</h3>
                         <?php if($this->session->flashdata('error')){?>



                              <div class="alert alert-danger alert-dismissable">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>

                  </div>                           

                   <?php } if($this->session->flashdata('message')){?>

                    <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>



</div>



                   <?php }?>
				   
				   <?php 
				     error_reporting(0);
				
				   if($result_strip[0]->id!=''){?>

                    <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;font-weight: 500;">Thank you for registration</p>



</div>



                   <?php $_SESSION['data']='';}?>
				   
                        <form action="<?=base_url();?>register/login_validation" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_name" class="form-control" placeholder="Email" value="<?php echo set_value('user_name'); ?>" required>
                                    <div class="error_msg"><?=form_error('user_name');?></div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
                                    <div class="error_msg"><?=form_error('password');?></div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <!-- <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                            <label class="custom-control-label" for="customCheck">Remember Me</label> -->
                            <a href="<?=base_url();?>register/forgotpassword" class="forgot_password">Forgot Password ?</a>
                        </div>
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sign up area stop -->
