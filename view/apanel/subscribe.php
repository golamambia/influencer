

    <!-- body area start -->
    <section class="mian-area">
        <div class="container-fluid">
            <div class="dashboard-area">
                <div class="row">
                    <div class="col-lg-3">
                        <?php

                                 $this->load->view('left_bar');


                                ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="dashboard_body">
                            <h3>Package Details</h3>
							
							<div class="row row-8 dashboardinner">
                                <?php 
                                if($user_info[0]->subscribe_pack!=0 && $user_info[0]->customer_strip!=''){

                                ?>
							  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
							    <div class="card gradient-scooter mb-3">
									<div class="card-body p-4">
									  <div class="media">
									  <div class="media-body text-left">
										<h4 class="text-white heading">Package</h4>
										<span class="text-white btn_yeolow"><?=$pack_info[0]->ptitle;?></span>
                    <span class="text-white btn_yeolow">$<?=$pack_info[0]->amount;?></span>
									  </div>
									  
									</div>
									</div>
                                   
								  </div>
							  </div>

                              <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Plan Action</h4>
                                        <?php if($pack_info[0]->unsubscribe_plan!=0){?>
                                        <span class="text-white subs_show_id btn_yeolow" >Subscribe Now</span>
                                    <?php }else{?>
                                        <span class="text-white subs_show_id  btn_yeolow" >Unsubscribe Now</span>

                                    <?php }?>
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>
							   -->
							  
							  


                              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Add-on Pack</h4>
                                        
                                        <span class="text-white  btn_yeolow" ><a href="<?=base_url();?>dashboard/upgrade_plan" style="color: #fff;">Buy now</a></span>
                                    
                                        
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>


                              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Add-on Pack history</h4>
                                        
                                        <span class="text-white  btn_yeolow" ><a href="<?=base_url();?>dashboard/upgrade_plan_list" style="color: #fff;">View now</a></span>
                                    
                                        
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>


                               <?php }else{?>
                                  <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Package   <span> - Free</span></h4>
                                        <span class="text-white btn_yeolow"><a href="<?=base_url();?>dashboard/buy_package" style="color: #fff;">Change plan</a></span>
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>

                             
                              

                               <?php }?>


							</div>
                            
                                                      
                            
                                <?php 
                                if($user_info[0]->subscribe_pack!=0 && $user_info[0]->customer_strip!=''){

                                ?>
							
                                    <?php
                                    $i=0;
                                    //print_r($pack_info);
                                    foreach ($pack_info as $key => $value) {
                                       $i++;
                                    ?>


                                     <div class="row row-8">
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Searches</h4>
                                      <h5><?=$value->psearch;?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg1">
                                  <img src="<?php echo base_url();?>assets_front/images/search.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Searches left</h4>
                                      <h5><?php
                                        $srvh=$value->psearch;
                                        if($srvh!='unlimited'){
                                           echo $hh=$value->psearch-$value->search_count;
                                        }else{
                                            echo $value->psearch;
                                        }
                                        

                                        ?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg2">
                                  <img src="<?php echo base_url();?>assets_front/images/search1.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Export</h4>
                                      <h5><?=$value->pexport;?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg3">
                                  <img src="<?php echo base_url();?>assets_front/images/search2.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Export  left</h4>
                                      <h5><?php
                                        $gg=$value->pexport-$value->export_count;
                                        echo $gg;

                                        ?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg4">
                                  <img src="<?php echo base_url();?>assets_front/images/search3.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Export Profile</h4>
                                      <h5><?=$value->pdataid;?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg2">
                                  <img src="<?php echo base_url();?>assets_front/images/search4.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Export Profile left</h4>
                                      <h5><?php
                                        $gg=$value->pdataid-$value->dataid_count;
                                        echo $gg;

                                        ?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg1">
                                  <img src="<?php echo base_url();?>assets_front/images/search5.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Date</h4>
                                      <h5><?=date('d-m-Y',strtotime($value->created_at));?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg2">
                                  <img src="<?php echo base_url();?>assets_front/images/search6.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              
                             <!--  <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Status</h4>
                                      <h5><span class="btn_green">Active</span></h5>
                                  </div>
                                  <div class="tablereuslt_right bg1">
                                  <img src="<?php echo base_url();?>assets_front/images/search7.png" alt="image">
                                  </div>
                                </div>
                              </div> -->
                              
                              
                              <div class="col-lg-12 col-12">
                              <div class="plans_btn">
                                <a class="" onclick="conDelete()" href="javascript:void(0)">do you want to cancel your plan</a>
                                </div>
                              </div>
                              
                            </div>





                                    <?php }?>
									
                                   
                               
                              <?php }else{?>
                            
                               
                            <div class="row row-8">

                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Searches</h4>
                                      <h5>5</h5>
                                  </div>
                                  <div class="tablereuslt_right bg1">
                                  <img src="<?php echo base_url();?>assets_front/images/search.png" alt="image">
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Searches left</h4>
                                      <h5><?php
                                       
                                           echo $hh=5-$user_info[0]->search_count;
                                       
                                        ?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg2">
                                  <img src="<?php echo base_url();?>assets_front/images/search1.png" alt="image">
                                  </div>
                                </div>
                              </div>


                              <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="tablereusltbox d-flex justify-content-between">
                                 <div class="tablereuslt_left">
                                      <h4>Date</h4>
                                      <h5><?=date('d-m-Y',strtotime($user_info[0]->entry_date));?></h5>
                                  </div>
                                  <div class="tablereuslt_right bg2">
                                  <img src="<?php echo base_url();?>assets_front/images/search6.png" alt="image">
                                  </div>
                                </div>
                              </div>

                            </div>
                            <?php }?>
                           
                             <!-- <p>test cancel</p> -->




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- body area stop -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function conDelete() {
    //alert(1);
    swal({
  title: "Are you sure to cancel?",
  text: "Once deleted, you will not be able to recover this plan!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {



    // swal("Poof! Your imaginary file has been deleted!", {
    //   icon: "success",
    // });
$.ajax({
        type: "POST",
        url: "<?=base_url();?>payment/unsub_pack.php",
        data: {sid:'<?=$pack_info[0]->subscription_id;?>',uid:'<?=$pack_info[0]->userid;?>',pid:'<?=$pack_info[0]->plan_id;?>',user:'<?=base64_encode($this->session->userdata('infl_sess')['userid']);?>'},
        cache: false,
        success: function(html) {
        //alert(html);
    var res=html.trim();
    if(res=='success'){
       location.reload(true);
      }else{
        swal("Sorry!", "Please try again", "error");
      }
           console.log(html);

        }
        });



  } 
});
}

</script>
    <script type="text/javascript">
        $(document).ready(function(e){
           $(".subs_show_id").click(function(){
            var con=confirm('Do you want to change status?');
            if(con){
            $.ajax({
        type: "POST",
        url: "<?=base_url();?>payment/unsub_pack.php",
        data: {sid:'<?=$pack_info[0]->subscription_id;?>',uid:'<?=$pack_info[0]->userid;?>',pid:'<?=$pack_info[0]->plan_id;?>',user:'<?=base64_encode($this->session->userdata('infl_sess')['userid']);?>'},
        cache: false,
        success: function(html) {
        //alert(html);
		var res=html.trim();
		if(res=='success'){
			 location.reload(true);
			}else{
				swal("Sorry!", "Please try again", "error");
			}
           //console.log(html);

        }
        });
    }

            });
        });
    </script>

