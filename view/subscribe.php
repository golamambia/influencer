

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
							  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
							    <div class="card gradient-scooter mb-3">
									<div class="card-body p-4">
									  <div class="media">
									  <div class="media-body text-left">
										<h4 class="text-white heading">Package</h4>
										<span class="text-white btn_yeolow"><?=$pack_info[0]->ptitle;?></span>
									  </div>
									  
									</div>
									</div>
								  </div>
							  </div>

                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
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
							  
							  
							  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Plan Status</h4>
                                        <?php if($pack_info[0]->unsubscribe_plan!=0){?>
                                        <span class="text-white subs_show_id btn_yeolow" >Deactiveted</span>
                                    <?php }else{?>
                                        <span class="text-white subs_show_id btn_yeolow" >Activeted</span>

                                    <?php }?>
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>


                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Add-on Pack</h4>
                                        <?php if($pack_info[0]->search_count==$pack_info[0]->psearch){?>
                                        <span class="text-white  btn_yeolow" ><a href="<?=base_url();?>dashboard/upgrade_plan" style="color: #fff;">Buy now</a></span>
                                    <?php }else{?>
                                        <span class="text-white btn_yeolow" ><a href="<?=base_url();?>dashboard/buy_package" style="color: #fff;">Not available now</a></span>
                                    <?php }?>
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>

                               <?php }else{?>
                                  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Package</h4>
                                        <span class="text-white btn_yeolow">Free</span>
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Plan Action</h4>
                                       
                                        <span class="text-white btn_yeolow" ><a href="<?=base_url();?>dashboard/buy_package" style="color: #fff;">Subscribe Now</a></span>
                                   
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card gradient-scooter mb-3">
                                    <div class="card-body p-4">
                                      <div class="media">
                                      <div class="media-body text-left">
                                        <h4 class="text-white heading">Plan Status</h4>
                                       
                                        <span class="text-white subs_show_id btn_yeolow" >Active</span>

                                   
                                      </div>
                                      
                                    </div>
                                    </div>
                                  </div>
                              </div>


                               <?php }?>

							</div>
                            <div class="table-responsive">
                                <?php 
                                if($user_info[0]->subscribe_pack!=0 && $user_info[0]->customer_strip!=''){

                                ?>
							<table id="example"  class="table tablepackgebox table-bordered table-striped">
								<thead class="thead-dark">
								 <tr>
                                      
                                        <th>Searches</th>
                                        <th>Searches left</th>
                                        <th>Export</th>
                                        <th>Export left</th>
                                        <th>Amount($)</th>
                                        <th>Txn Id</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
								</thead>
								<tbody>
                                    <?php
                                    $i=0;
                                    //print_r($pack_info);
                                    foreach ($pack_info as $key => $value) {
                                       $i++;
                                    ?>
                                    <tr>
                                        
                                        
                                        <td><?=$value->psearch;?></td>
                                        <td><?php
                                        $srvh=$value->psearch;
                                        if($srvh!='unlimited'){
                                           echo $hh=$value->psearch-$value->search_count;
                                        }else{
                                            echo $value->psearch;
                                        }
                                        

                                        ?></td>
                                        <td><?=$value->pexport;?></td>
                                        <td><?php
                                        $gg=$value->pexport-$value->export_count;
                                        echo $gg;

                                        ?></td>
                                        <td><?=$value->amount;?></td>
                                        <td><div class="txnbox"><?=$value->charge_id;?></div></td>
                                        <td><?=date('d-m-Y',strtotime($value->created_at));?></td>
                                        <td><span class="btn_green"><?=$value->ustatus;?></span></td>

                                    </tr>
                                    <?php }?>
									
                                   
                                   
                                </tbody>
							</table>
							  
                              <?php }else{?>
                            
                                <table id="example"  class="table tablepackgebox table-bordered table-striped">
                                <thead class="thead-dark">
                                 <tr>
                                      
                                        <th>Searches</th>
                                        <th>Searches left</th>
                                                                             
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        
                                        
                                        <td><?=$user_info[0]->search_count;?></td>
                                        <td><?php
                                       
                                           echo $hh=5-$user_info[0]->search_count;
                                       
                                        ?></td>
                                                                              
                                        <td><?=date('d-m-Y',strtotime($user_info[0]->entry_date));?></td>
                                        <td><span class="btn_green"><?=$user_info[0]->status;?></span></td>

                                    </tr>
                                  
                                    
                                   
                                   
                                </tbody>
                            </table>

                            <?php }?>
                            </div>
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

