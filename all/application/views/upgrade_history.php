

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
                            <h3>Add-on pack  details</h3>
							
							
                            <div class="table-responsive">
                               
							<table id="example"  class="table tablepackgebox table-bordered table-striped">
								<thead class="thead-dark">
								 <tr>
                                      <th>Pack</th>
                                      
                                        <th>Searches</th>
                                        
                                        <th>Export</th>
                                        
                                        <th>Export Profile</th>
                                        <th>Amount($)</th>
                                        
                                        
                                        <th>Date</th>

                                        <th>Status</th>
                                    </tr>
								</thead>
								<tbody>
                                    <?php
                                    $i=0;
                                    //print_r($pack_info);
                                    foreach ($pack_list as $key => $value) {
                                       $i++;
                                    ?>
                                    <tr>
                                        
                                        <td><?=$value->product;?></td>
                                        <td><?=$value->psearch;?></td>
                                        
                                        <td><?=$value->pexport;?></td>
                                        
                                        <td><?=$value->pdataid;?></td>
                                       <td><?=$value->pamount;?></td>
                                       
                                        
                                        <td><?=date('d-m-Y',strtotime($value->created_at));?></td>
                                        <td>
                                          <?php 
                    
                    if($value->charge_id!=''){
                    ?>
                    <span class="btn_green"> success</span>

                  <?php }else{?>
                     <!-- <span class="badge bg-warning"> </span> -->
                  <?php }?>
                                        </td>

                                    </tr>
                                    <?php }?>
									
                                   
                                   
                                </tbody>
							</table>
							  
                              
                            
                            </div>
                             <span class="text-white btn_yeolow"><a href="<?=base_url();?>dashboard/subscribe" style="color: #fff;">Back</a></span>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- body area stop -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  

