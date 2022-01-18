
    <!-- body area start -->
    <section class="mian-area">
        <div class="container-fluid">
            <div class="dashboard-area">
                <div class="row row-8">
                    <div class="col-lg-3 d-flex align-content-stretch">
                         <?php

                                 $this->load->view('left_bar');

                                ?>
                    </div>
                    <div class="col-lg-9 d-flex align-content-stretch">
                        <div class="dashboard_body">
                            <h3>Profile</h3>
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
                   <form method="post" class="w-100 d-flex" enctype="multipart/form-data" action="<?=base_url();?>dashboard/Update_post">
                            <div class="row row-8 dashboardinner">
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                       <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?=$user_info[0]->name;?>" >

                                    <div class="error_msg"><?php echo form_error('name'); ?></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"  id="email" class="form-control" placeholder="Email ID" value="<?=$user_info[0]->email;?>" autocomplete="off" readonly>

                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <input type="file"  name="" class="form-control" >

                                    </div>
                                </div> -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Phone No.</label>
                                       <input type="text" name="phone" id="phone" class="form-control numeric_input" placeholder="Mobile No" autocomplete="off" required value="<?=$user_info[0]->phone;?>" minlength="10" maxlength="11"  title="please enter number only">

                                    <div class="error_msg"><?php echo form_error('phone'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" placeholder="Address"><?=$user_info[0]->address;?></textarea>
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
    </section>
    <!-- body area stop -->

    