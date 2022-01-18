<script type="text/javascript">
  function get_user(){

//alert(1);
document.getElementById('user_search').submit();
  }

</script>
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">User List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <!-- <h4 class="card-title">
            <a href="<?php echo base_url();?>apanel/user/user_add" class="btn btn-primary mr-1">
                                    <i class="ft-plus"></i> Add New User
                                </a></h4> -->
          <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>

        </div>
         <?php if($this->session->flashdata('error')){?>
                        <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('error');?></p>
</div>
<?php }?>
                        <?php if($this->session->flashdata('message')){?>
                        <div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<p style="text-align: center;"><?=$this->session->flashdata('message');?></p>
</div>
<?php }?>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <!-- <p class="card-text">&nbsp;</p> -->
             
<form id="user_search" method="get">
            <div class="row">
              
              
                <div class="col-md">
                <label>User type</label>
            <select  class="form-control" name="user" >
  <option value=""  selected>--Select type--</option>
  <option <?php if($this->input->get('user',true)=='all'){echo"selected";}?> value="all">All</option>
  <option <?php if($this->input->get('user',true)=='paid'){echo"selected";}?> value="paid">Paid user</option>
  
  <option <?php if($this->input->get('user',true)=='free'){echo"selected";}?> value="free">Free user</option>
</select>
</div>
<div class="col-md">
<label>From date</label>
<input type="date" value="<?=$this->input->get('start_date',true);?>" class="form-control" name="start_date" required>
  </div>
  <div class="col-md">
    <label>End date</label>
<input type="date" value="<?=$this->input->get('end_date',true);?>" class="form-control" name="end_date" required>
  </div>
  
  <div class="col-md">
    <input type="submit" style="margin-top: 27px;color: #fff;" class="form-control btn btn-sm btn-primary" value="Search Now">
  </div>



</div>
</form>
            <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <th>Name</th>
                  <!-- <th>Email</th>
                  <th>Phone</th> -->
				  <th>Pack Type</th>
				  <th>Payment</th>
          <th>Details</th>
                  <th>Status</th>
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($datatable as $key => $value) {
                //print_r($value)
               ?>
                 <tr>
                  <td><?=$value->name;?></td>
                  <!-- <td><?=$value->email;?></td>
                  <td><?=$value->phone;?></td> -->
				  <td><?php 
						$utype=$value->subscribe_pack;
						if($utype>0){
				  echo getUserType($value->subscribe_pack).' ($'.getUserAmount($value->customer_strip).')';
						}else{echo"Free user ";
						
						}
						?></td>
				  <td><?php $customer_strip=$value->customer_strip;
				  if($customer_strip!=''){
					  echo"Complete";
				  }else{echo"Free";}
				  ?></td>

                <td><button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal<?=$value->id;?>">
    View
  </button></td>


                  <td>
                    <?php 
                    
                    if($value->status=='Active'){
                    ?>
                    <span class="badge bg-success"> Active</span>

                  <?php }else{?>
                     <span class="badge bg-warning"> Inactive</span>
                  <?php }?>
                  </td>
                  <td class="float-centre">

                <a href="<?php echo base_url();?>apanel/user/user_edit/<?=$value->id;?>"><span class="badge bg-primary" title="Click here for edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span></a>
                <a href="<?php echo base_url();?>apanel/user/user_delete/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><span class="badge badge-danger" title="Click here for delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a>
            

                   </td>
                 
                </tr>


                 <!-- The Modal -->
  <div class="modal fade" id="myModal<?=$value->id;?>">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"><?=ucfirst($value->name);?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">

          <p> Phone : <span> <?=$value->phone;?></span></p>
            <p> Email : <span> <?=$value->email;?></span></p>
          <?php if($value->subscribe_pack==0 ){
            
                                                                        
            ?>

            
            <p>Pack Name : <span> Free Pack</span></p>
           <p>Searches : <span> 5</span></p>
            <p>Searches left : <span><?php
                                        //$srvh=$value->search_count;
                                        
                                           echo $hh=5-$value->search_count;
                                       

                                        ?></span></p>



          <?php } if($value->subscribe_pack>0 && $value->customer_strip!=''){
            $front_fetch=getUserDetails($value->id);
            foreach ($front_fetch as $key => $value21) {
                                                                        
            ?>
          <p>Pack Name : <span><?=$value21->ptitle;?></span></p>
           <p>Searches : <span><?=$value21->psearch;?></span></p>
            <p>Searches left : <span><?php
                                        $srvh=$value21->psearch;
                                        if($srvh!='unlimited'){
                                           echo $hh=$value21->psearch-$value21->search_count;
                                        }else{
                                            echo $value21->psearch;
                                        }
                                        

                                        ?></span></p>
             <p>Export : <span><?=$value21->pexport;?></span></p>
             <p>Export left : <span><?php
                                        $gg=$value21->pexport-$value21->export_count;
                                        echo $gg;

                                        ?></span></p>
                                        <p>Export Profile : <span><?=$value21->pdataid;?></span></p>
             <p>Export Profile left : <span><?php
                                        $gg=$value21->pdataid-$value21->dataid_count;
                                        echo $gg;

                                        ?></span></p>
              <p>Amount : <span><?=$value21->amount;?></span></p>
               <p>Txn Id : <span><?=$value21->charge_id;?></span></p>

                <p>Purchase Date : <span><?=date('d-m-Y',strtotime($value21->created_at));?></span></p>

              <?php }}?>

        </div>
        
        
      </div>
    </div>
  </div>




                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <!-- <th>Email</th>
                  <th>Phone</th> -->
          <th>Pack Type</th>
          <th>Payment</th>
          <th>Details</th>
                  <th>Status</th>
                  <th class="float-centre">Action</th>
                  <!-- <th></th> -->
                </tr>
              </tfoot>        
            </table>  
            </div>      
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        </div>
      </div>