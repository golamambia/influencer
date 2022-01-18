
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
                            <h3>Buy Package</h3>
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
                   
                             
                             <div class="subscrib-area new_subscrib">
                <div class="box-area">
                    
                    <div class="box">
                        <h3>Free</h3>
                        <h4><sup>$</sup>0<sub>/mo</sub></h4>
                                                <button type="button" class="btn btn-primary">Current plan</button>
                                            <ul>
                            <li>5 searches</li>
                            <li>0 exports</li>
                            <li>0 Export profile</li>
                        </ul>
                    </div>
                
                </div>


                 <?php 
              
               foreach ($pack_list as $key => $value) {
                //print_r($value)
                
               ?>
                <div class="box-area <?php if($value->ptitle=='SILVER'){echo"active";}?>">
                    
                         <form method="post" class="w-100 " enctype="multipart/form-data" action="<?=base_url();?>payment/">
                             <input type="hidden" name="pay_amt" id="pay_amt" value="<?=$value->pamount;?>">
                             <input type="hidden" name="subscribe" id="subscribe" value="<?=base64_encode($value->pid);?>">
                             
                    <div class="box">
                        <h3><?=$value->ptitle;?></h3>
                        <h4><sup>$</sup><?=$value->pamount;?><sub>/mo</sub></h4>
                        <button type="submit" class="btn btn-primary">SUBSCRIBE</button>
                        <ul>
                            <li><?=$value->psearch;?> searches</li>
                            <li><?=$value->pexport;?> exports</li>
                            <li><?=$value->pdataid;?> Export profile</li>
                        </ul>
                        <?php if($value->ptitle=='SILVER'){echo'<div class="recomender">Recommended</div>';}?>
                    </div>
                    <input type="hidden" name="name" value="<?=$user_info[0]->name;?>">
                                   <input type="hidden" name="pro_id" value="<?=base64_encode($user_info[0]->id);?>">
                                   <input type="hidden" name="email" value="<?=$user_info[0]->email;?>">
                                   <input type="hidden" name="phone" value="free_user">
                                   <input type="hidden" name="name" value="<?=$user_info[0]->id;?>">
                </form>
                    
                </div>
                <?php }?>




                            </div>

                            <span class="text-white btn_yeolow"><a href="<?=base_url();?>dashboard/subscribe" style="color: #fff;">Back</a></span>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- body area stop -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">

             $(document).ready(function(){
            $('.subscribe').change(function(){
                //alert(1);
                
                var cat=$('.subscribe').val();
                 // alert(cat);              
                $.ajax({
                    type:'post',
                    url:'<?=base_url();?>dashboard/get_sub',
                    cache:false,
                    //dataType: 'json',
                    data:{subs:cat},
                    success:function(response){
                        //console.log(response);
                        var val=response.trim();
                          $('#pay_amt').val(val);
                                              
                    
                    }

                });

            });

      });

    </script>

    