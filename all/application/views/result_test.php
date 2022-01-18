

<?php if(!$this->session->userdata('search_msg')){?>
<table class="col-md-12 table-bordered table-striped table-condensed cf first_tab ">
    <thead class="cf">
            <tr>
            <th>No</th>
            <th class="namebox">Name</th>
            <th>Verified</th>
            <th>Gender</th>
            <th>Posts</th>
            <th>Email</th>
            <th>Followers</th>
            <th>Avg Likes</th>
            <th>Avg Comments</th>
            <th>Category</th>
            <th>Country</th>
            <th>City</th>
            <th>Audience Interests</th>
            </tr>
            </thead>
            <tbody class="cf">
						<?php 
                            $i=0;
							$j='';
                            foreach ($get_data as $key => $value) {
                               $i++;
							$j=$i;
                            ?>
                            
            <tr> 
            <td data-title="No">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input chk" value="<?=$value->id;?>" id="customCheck<?=$value->id;?>" name="example1">
                                            <label class="custom-control-label" for="customCheck<?=$value->id;?>"><?php//$i;?></label>
              </div>
            </td>
            <td data-title="Name">
             
            <div class="media <?php if($this->session->userdata('infl_sess')['userid']){echo"";}else{echo"hide-result";}?>">
                                      <?php if($this->session->userdata('infl_sess')['userid']){?>       
                              <a  href="javascript:void(0)" id="side<?=$value->id;?>" class="add_to_cart cardclick"><?php }?>   
                                 <img class="mr-2" src="<?=$value->profile_picture_url;?>" alt="<?=$value->user_name;?>" title="<?=$value->user_name;?>" />
                      <?php if($this->session->userdata('infl_sess')['userid']){?>  </a><?php }?>
                                       <div class="media-body">
                <h5 class="mt-0"><?=$value->user_name;?></h5>
              </div></div>
           </td>
           <td data-title="Verified" class="verifiedbox">
          
            <?php
                                    if($value->verified!='FALSE'){?>
                                        <img  class="verifiedimg" src="<?=base_url();?>assets_front/images/verify.png" alt="man" title="" />
                                        <?php }?>
           </td>
           <td data-title="Gender" class="genderbox">
           
           <?php
                                

                                    if($value->gender=='Male'){?>
                                        <img class="genderboximg" src="<?=base_url();?>assets_front/images/male.png" alt="man" title="" />
                                        <?php }else if($value->gender=='Female'){?>
                                             <img class="genderboximg" src="<?=base_url();?>assets_front/images/female.png" alt="man" title="" />
                                         <?php }?>
           </td>
            <td data-title="Posts" class=""><div class="tableinner"><?=$value->post_count;?></div></td>
            <td data-title="Email" class="">
               <div class="emaibox">
               <?php
                                    if($value->email_id!=''){echo"Yes";}?>
               </div>
            </td>
            <td data-title="Followers" class=""><div class="tableinner"><?=$value->follower_count;?></div></td>
            <td data-title="Avg Likes" class=""><div class="tableinner"><?=$value->avg_like_post;?></div></td>
            <td data-title="Avg Comments" class=""><div class="tableinner"><?=$value->avg_cmt_post;?></div></td>
            <td data-title="Category" class=""><div class="tableinner"><?=$value->category;?></div></td>
            <td data-title="Country" class=""><div class="tableinner"><?=$value->country;?></div></td>
            <td data-title="City" class=""><div class="tableinner"><?=$value->city;?></div></td>
            <td data-title="Audience Interests" class="">
                <div class="reviewbox <?php if($this->session->userdata('infl_sess')['userid']){echo"";}else{echo"hide-result";}?>">
                    <ul>
                        <li class="clearfix">
                          <div class="progress" style="height:5px">
                                <div class="progress-bar" style="width:45%;"></div>
                            </div>
                          <span class="num"><strong>59</strong>% Movies &amp; TV</span>
                        </li>
                        <li class="clearfix">
                          <div class="progress" style="height:5px">
                                <div class="progress-bar" style="width:30%;"></div>
                            </div>
                          <span class="num"><strong>47</strong>% Beauty</span>
                        </li>
                        <li class="clearfix">
                          <div class="progress" style="height:5px">
                                <div class="progress-bar" style="width:20%;"></div>
                            </div>
                          <span class="num"><strong>40</strong>% Fitness &amp; Yoga</span>
                        </li>
                    </ul>
                </div>
            </td>
            </tr>
							
							<?php }?>
							</tbody>
                    </table>
                    <?php }?>
                   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
                   
    <script type="text/javascript">
        $(document).ready(function(){
      $('#export_formid').hide();
             //alert(1);
            $("#customCheck1_cus").click(function () {
//$("#getcnt").html('');
var hh=$("input[name='export_id']").val();
//console.log(hh);
     $('.first_tab input:checkbox').not(this).prop('checked', this.checked);
   var output = $.map($('.chk:checked'), function(n, i){
      return n.value;
    }).join(',');
    
    total = $('.chk:checked').length
   
    $("#export_id").val(output);
  if(total>0){
     $("#getcnt").html(total+' selected');
    $('#export_formid').show();
  }else{
     $("#getcnt").html('');
    $('#export_formid').hide();
  }
 });
 
 var total = 0;

$(".chk").click(function(){
    
    var output = $.map($('.chk:checked'), function(n, i){
      return n.value;
    }).join(',');
    
    total = $('.chk:checked').length
    
    $("#export_id").val(output);
  if(total>0){
    $("#getcnt").html(total+' selected');
    $('#export_formid').show();
  }else{
    $("#getcnt").html('');
    $('#export_formid').hide();
  }
    
});
 
        });
   
    </script>
                    <script>
      $(document).ready(function(){
      $(".close, .aside-backdrop").click(function(){
      
           $(".aside, .aside-backdrop").removeClass("in");
            
      
       });
    });
  </script>
  <script>
      $(document).ready(function() {
      $('.cardclick').on('click', function() {
        //alert(1);
        var $this = $(this);
        //alert($this);
        var loadingText = '<i class="fa fa-spinner fa-spin "></i>';
        if ($(this).html() !== loadingText) {
          $this.data('original-text', $(this).html());
          $this.html(loadingText);
          var side= $(this).attr("id");
          //alert(side);
          $(".loader, #overlayer").show();
          $(".aside").html(''); 
        $.ajax({
            type:'post',
            url:'<?=base_url();?>home/get_aside_data',
            //dataType : 'text',
            data:{post_data:side},
            cache:false,
            success:function (response){
                //console.log(side);
                if(response!='wrong'){
                    
                    $(".aside").append(response); 
                     $this.html($this.data('original-text'));
                      $(".loader, #overlayer").hide();
                     $(".aside, .aside-backdrop").addClass("in");
                }else{
                     $this.html($this.data('original-text'));
                      $(".loader, #overlayer").hide();
                }
                //console.log(response);
            }

            });
        }
        // setTimeout(function() {
        //   $this.html($this.data('original-text'));
        // }, 4000);
      });
    })

      
  </script>