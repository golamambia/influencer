<script src="https://cdn.jsdelivr.net/vue/latest/vue.js"></script>
    <section class="mian-area">
        <div class="container-fluid">
            <div class="found_area">
                <h1>Found <?=$srch_result_count;?> profiles.
				
	<span class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1_cus">
        <label class="custom-control-label" for="customCheck1_cus">Select all</label>
		<span id="getcnt"></span>
      </span>
                    <!-- <?php if($this->session->userdata('infllog_check')!=1){?>
                    <span style="cursor: pointer;" > Actions: CSV Export</span>
                     <?php }else{?>
                        <span style="cursor: pointer;" id="csv_export"> Actions: CSV Export</span>
                        <?php } ?> -->
                </h1>
				<?php if($this->session->userdata('infl_sess')['subscribe_pack']>0){
          if(!$this->session->userdata('export_msg')){
          
				
?>			
				<form method="post" action="<?=base_url();?>home/export_data" id="export_formid" style="display:none;">
				<input type="hidden" id="export_id" name="export_id" value="0">
				<input type="submit" class="load-button btn btn-primary mt-3" value="Export to Excel">
				</form>
				<?php }}?>
            </div>
			<p style="font-size: 20px;
    text-align: center;
    color: #e7700a;"><?=$this->session->userdata('search_msg');?></p>
	<p style="font-size: 20px;
    text-align: center;
    color: #e7700a;"><?=$this->session->userdata('export_msg');?></p>
    <p style="font-size: 20px;
    text-align: center;
    color: #e7700a;"><?=$this->session->userdata('dataid_msg');?></p>


             <div class="no-more-tables table-responsive">


            <table class="col-md-12 table-bordered table-striped table-condensed cf first_tab" id="app">
            <thead class="cf">
            <tr>
            <th>#</th>
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
            <tbody>
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
                              <a href="javascript:void(0)" id="side<?=$value->id;?>" class="add_to_cart cardclick"><?php }?>   <img class="mr-2" src="<?=$value->profile_picture_url;?>" alt="<?=$value->user_name;?>" title="<?=$value->user_name;?>" />
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
            <?php if($this->session->userdata('infl_sess')['subscribe_pack']==0 || empty($this->session->userdata('infl_sess'))){ if($i==25){?>

            </tbody>
            </table>
            
        
            </div>
                <div class="no-more-tables table-responsive hide-table">
            <table class="col-md-12 table-bordered table-striped table-condensed cf hide-result">
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
            <tbody>
                 <tr>
            <td data-title="No">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input chk" value="<?=$value->id;?>" id="customCheck<?=$value->id;?>" name="example1">
                                            <label class="custom-control-label" for="customCheck<?=$value->id;?>"><?php//$i;?></label>
              </div>
            </td>
            <td data-title="Name">
             
            <div class="media hide-result">
                                        
                                 <img class="mr-2" src="<?=$value->profile_picture_url;?>" alt="<?=$value->user_name;?>" title="<?=$value->user_name;?>" />
                     
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
            <td data-title="Posts" class="">
                <div class="tableinner">
                <?=$value->post_count;?>
                   </div> 
                </td>
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
                <div class="reviewbox hide-result">
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
           
            
         <?php } }} ?>
            
            </tbody>
            </table>
            <?php if($this->session->userdata('infl_sess')['subscribe_pack']==0 || empty($this->session->userdata('infl_sess'))){ if($j==30){echo'<div class="result-popup">
                        <h3>You can only see the first 10 results</h3>
                        <p>Upgrade now to see all results that match your search</p>
                        <button type="button" class="result" onclick="price_open()">Upgrade now to see all results</button>
                    </div>';}} ?>


            </div>

            <div class="no-more-tables table-responsive hide-table">

        <div id="results" class="text-center"></div>


    </div>


    </section>


<!---------popup html start----->


    
    
    
    <div class="aside"></div>
    <div class="aside-backdrop"></div>

<!-------- html end--->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
		function price_open(){
			location.href='<?=base_url();?>pricing';
		}
    </script>
	<?php if($this->session->userdata('infl_sess')['subscribe_pack']>0){
    if(!$this->session->userdata('search_msg')){
    ?>
	<script type="text/javascript">

(function($){ 
  $.fn.loaddata = function(options) {// Settings
    var settings = $.extend({ 
      loading_gif_url : "<?=base_url();?>assets_front/images/ajax-loader.gif", //url to loading gif
      end_record_text : 'No more records found!', //end of record text
      loadbutton_text : 'Load More', //load button text
      data_url    : '<?=base_url();?>/home/result1', //url to PHP page
      start_page    : 1 //initial page
    }, options);
    
    var el = this;  
    loading  = false; 
    end_record = false;   
    
    //initialize load button
    var load_more_btn = $('<button/>').text(settings.loadbutton_text).addClass('load-button btn btn-primary mt-3').click(function(e){ 
      contents(el, this, settings); //load data on click
    });
    
    contents(el, load_more_btn, settings); //initial data load  
  }; 
  
  //Ajax load function
  function contents(el, load_btn,  settings){
    var load_img = $('<img/>').attr('src',settings.loading_gif_url).addClass('loading-image'); //loading image
    var record_end_txt = $('<div/>').text(settings.end_record_text).addClass('end-record-info'); //end record text
      
    if(loading == false && end_record == false){
      loading = true; //set loading flag on
      el.append(load_img); //append loading image
      
      //temporarily remove button on click
      if(load_btn.type === 'submit' || load_btn.type === 'click'){
        load_btn.remove(); //remove loading img
      }
      
      $.post( settings.data_url, {'page': settings.start_page}, function(data){ //jQuery Ajax post
        if(data.trim().length == 0){ //if no more records
          el.append(record_end_txt); //show end record text
          load_img.remove(); //remove loading img
          load_btn.remove(); //remove load button
          end_record = true; //set end record flag on
          return; //exit
        }
        loading = false;  //set loading flag off
        load_img.remove(); //remove loading img 
        el.append(data).append(load_btn);  //append content and button
        settings.start_page ++; //page increment
      })
    }
  }

})(jQuery);

$("#results").loaddata();
</script>

	<?php }}?>