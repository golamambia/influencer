<style type="text/css">

  .field-icon{

    position: absolute;

    top: 15px;

    right: 5px;

    cursor: pointer;

  }

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
                        <h3>Signup</h3>
                        <?php if($this->session->flashdata('error')){?>



                              <div class="alert alert-danger alert-dismissable">

                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                  <p style="text-align: center;"><?=$this->session->flashdata('error');?></p>

                  </div>                           

                   <?php } if($this->session->flashdata('message')){?>

                    <div class="alert alert-success alert-dismissable">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

<p style="text-align: center;font-weight: 500;"><?=$this->session->flashdata('message');?></p>

<p style="font-weight: 500;"><a href="<?=base_url();?>register/login">Login Now</a></p>

</div>



                   <?php }?>
                   <form method="post" id="reg_form" action="<?=base_url();?>payment/">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter your name" autocomplete="new-name" required />
                            <div class="error_msg"><?php echo form_error('name'); ?></div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" autocomplete="new-email" placeholder="Email" required />
                             <div class="error_msg"><?php echo form_error('email'); ?></div>

                                     <span id="error_msg" style="color:#e53935; "></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
							<input type="hidden" name="pay_amt" id="pay_amt" value="<?=$price_get[0]->pamount;?>">
                            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" maxlength="11" autocomplete="new-phone" class="form-control numeric_input" placeholder="Phone no" required />
                            <div class="error_msg"><?php echo form_error('phone'); ?></div>
                        </div>
						<div class="form-group">
                                    <label>Plan</label>
                                    <select class="form-control subscribe" name="subscribe" required>
                                        <option value="">Select plan</option>
										<option value="<?=base64_encode(0);?>">FREE</option>
                                          <?php 
              
               foreach ($price_table as $key => $value) {
                //print_r($value)
                
               ?>                                      
                                           <option <?php if($value->pid==$pid){echo"selected";}?> value="<?=base64_encode($value->pid);?>"><?=$value->ptitle;?> ($<?=$value->pamount;?>)</option>
			   <?php }?>
                                    </select>
                                </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" value="<?php echo set_value('password'); ?>" name="password" id="password"  onkeyup='check_pass();' class="form-control" placeholder="Password" required />
                            <!-- <small class="form-text text-muted">( 6 character minimum )</small> -->
                             <div class="error_msg"><?php echo form_error('password'); ?></div>
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" value="<?php echo set_value('confirm_password'); ?>" onkeyup='check_pass();' autocomplete="off"  class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password" required />
                            <div class="error_msg"><?php echo form_error('confirm_password'); ?></div>
                            <span id="pass_msg"></span>
                        </div>
                        <button type="submit" class="btn btn-primary sub" id="submit">SIGN UP</button>
                         </form>
                    </div>
                </div>
            </div>
         
        </div>


    </section>
    <!-- sign up area stop -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
function check_pass() {
            if(document.getElementById('password').value == '' || document.getElementById('confirm_password').value == ''){
                // document.getElementById('submit').disabled = true;
                document.getElementById('pass_msg').innerHTML = "Password and confirm password can't be blank ";
                document.getElementById("pass_msg").style.paddingBottom ="30px";
                document.getElementById("pass_msg").style.color ="red";
            }
            else if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                document.getElementById('submit').disabled = false;
                document.getElementById('pass_msg').innerHTML = "Password and Confirm Password Match";
                document.getElementById("pass_msg").style.paddingBottom ="30px";
                document.getElementById("pass_msg").style.color ="green";
            
            } else {
                document.getElementById('submit').disabled = true;
                document.getElementById('pass_msg').innerHTML = "Password and Confirm Password not Match";
                document.getElementById("pass_msg").style.paddingBottom ="30px";
                document.getElementById("pass_msg").style.color ="red";
            }
        }
      $(document).ready(function(){

       $('#email').keyup(function(){

                //alert(1);

                var email = $('#email').val();

                $.ajax({

                  type:"post",

                  url:'<?=base_url();?>register/GetEmail',

                  data:{email:email},

                  cache:false,

                  success:function(response){

                    //console.log(response);

                    var html=response.trim();

                    if(html>0){

                      $('#error_msg').html('Email alredy exist!');

                      $('.sub').prop('disabled',true);

                    }else{

                      $('#error_msg').html('');

                      $('.sub').prop('disabled',false);

                    }



                  }

                });



            });
			
			$('.subscribe').change(function(){
                //alert(1);
				
                var cat=$('.subscribe').val();
				
				if(cat=='MA=='){
					$("#reg_form").attr('action', '<?=base_url();?>register/register_post');
				}else{
					$("#reg_form").attr('action', '<?=base_url();?>payment/');
				}
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>register/get_sub',
                    cache:false,
                    //dataType: 'json',
                    data:{subs:cat},
                    success:function(response){
                        console.log(response);
						var val=response.trim();
                          $('#pay_amt').val(val);
											  
                    
					}

                });

            });

      });

    </script>