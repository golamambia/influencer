<script type="text/javascript">
  function get_user(){

//alert(1);
document.getElementById('user_search').submit();
  }

</script>
<div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-2">
            <h3 style="text-align: center;" class="content-header-title mb-0">User Add-on Pack List</h3>
            
          </div>
          
        </div>
        <div class="content-body">

<section id="file-export">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">
            <a href="<?php echo base_url();?>apanel/user/upgrade_user" class="btn btn-primary mr-1">
                                    <i class="ft-arrow-left"></i> Back
                                </a></h4>
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
            <!-- <div class="row">
              <div class="col-md-12">
              <form id="user_search" method="get">
                <label>Select user</label>
            <select onchange="get_user()" class="mdb-select md-form" name="user" required>
  <option value=""  selected>--Select type--</option>
  <?php foreach ($userlist as $key => $value){ ?>
     <option <?php if($this->input->get('user',true)==base64_encode($value->id)){echo"selected";}?> value="<?=base64_encode($value->id);?>"><?=ucfirst($value->name);?></option>
 
  <?php } ?>
 
</select>
</form>
</div>
</div> -->
            <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered base-style ">
              <thead>
                <tr>
                  <!-- <th>Name</th> -->
                  <th>Email</th>
                  
				  <th>Plan</th>
				  <th>Amount($)</th>
          <th>Status</th>
          <th>Date</th>
                  <th class="float-centre">Txn id</th>
          <th>Details</th>
                  
                  <!-- <th></th> -->
                </tr>
              </thead>
              <tbody>
               
               <?php 
               foreach ($datatable as $key => $value) {
                //print_r($value)
               ?>
                 <tr>
                  <!-- <td><?=$value->name;?></td> -->
                  <td><?=$value->email;?></td>
                  
				  <td><?=$value->product;?></td>
				  <td><?=$value->amount;?></td>
<td>
                    <?php 
                    
                    if($value->charge_id!=''){
                    ?>
                    <span class="badge bg-success"> success</span>

                  <?php }else{?>
                     <!-- <span class="badge bg-warning"> </span> -->
                  <?php }?>
                  </td>
                  <td><?=date('d-m-Y',strtotime($value->created_at));?></td>
                  <td class="float-centre">
                    <?=$value->charge_id;?>
                <!-- <a href="<?php echo base_url();?>apanel/user/user_edit/<?=$value->id;?>"><span class="badge bg-primary" title="Click here for edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</span></a>
                <a href="<?php echo base_url();?>apanel/user/user_delete/<?=$value->id;?>" onclick="return confirm('Are you sure to delete?')"><span class="badge badge-danger" title="Click here for delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete</span></a> -->
            

                   </td>
                <td><button type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#myModal<?=$value->id;?>">
    View
  </button></td>


                  
                 
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


          
          <p>Pack Name : <span><?=$value->ptitle;?></span></p>
           <p>Searches : <span><?=$value->psearch;?></span></p>
            
             <p>Export : <span><?=$value->pexport;?></span></p>
             
                                        <p>Export Profile : <span><?=$value->pdataid;?></span></p>
             
              <p>Amount($) : <span><?=$value->amount;?></span></p>
               

             

        </div>
        
        
      </div>
    </div>
  </div>




                              
              <?php }?>
                
              </tbody>
              <tfoot>
                <tr>
                 <!--  <th>Name</th> -->
                  <th>Email</th>
                  
          <th>Plan</th>
          <th>amount</th>
          <th>Status</th>
          <th>Date</th>
                  <th class="float-centre">Txn id</th>
          <th>Details</th>
                  
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