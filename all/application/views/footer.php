 <div class="modal modal-vcenter fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Influencer Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	     <p class="mb-0"><a href="#"><img src="<?php echo base_url();?>assets_front/images/instagram.png" alt="logo">Log in with instagram</a></p>
     </div>
    </div>
  </div>
</div>




<!-- footer css Start -->
    <footer class="footer_area">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="footer">
                        <h3>Our Services</h3>
                        <ul>
                            <li><a href="<?=base_url();?>help">Need help with search?</a></li>
                            <li><a href="<?=base_url();?>pricing">Pricing</a></li>
                            
                        </ul>
                    </div>
                </div>
				 <div class="col-lg-3">
                    <div class="footer">
                        <h3>Influencer Login</h3>
                        <ul>
                          <li><a data-toggle="modal" data-target="#exampleModal" class="btn-sm btn btn-primary">Influencer Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="mailto:info.influencertable.com">info.influencertable.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">© 2020 <strong>INFLUENCERTABLE</strong> . All Right Reserved</div>
    </footer>
    <!-- footer css stop -->

    <!-- search area -->

     <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Narrow down your search with specific criteria</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <form action="<?=base_url();?>home/result" method="get">
                        <div class="row row-8">
                            <!--<div class="col-lg-12 mb-2">
                                <h4 class="modal-tag">Platform</h4>
                                <div class="custom-control custom-checkbox  custom-control-inline">
                                    <input type="checkbox" class="custom-control-input" id="Instagram" name="platform[]">
                                    <label class="custom-control-label" for="Instagram">Instagram</label>
                                </div>
                                <div class="custom-control custom-checkbox  custom-control-inline">
                                    <input type="checkbox"  class="custom-control-input" id="Facebook" name="platform[]">
                                    <label class="custom-control-label" for="Facebook">Facebook</label>
                                </div>
                                <div class="custom-control custom-checkbox  custom-control-inline">
                                    <input type="checkbox"  class="custom-control-input" id="TikTok" name="platform[]">
                                    <label class="custom-control-label" for="TikTok">TikTok</label>
                                </div>
                                <div class="custom-control custom-checkbox  custom-control-inline">
                                    <input type="checkbox"  class="custom-control-input" id="Snapchat" name="platform[]">
                                    <label class="custom-control-label" for="Snapchat">Snapchat</label>
                                </div>
                                <div class="custom-control custom-checkbox  custom-control-inline">
                                    <input type="checkbox"  class="custom-control-input" id="Onlyfans" name="platform[]">
                                    <label class="custom-control-label" for="Onlyfans">Onlyfans</label>
                                </div>
                            </div>-->
							<div class="col-lg-4">
                                <div class="form-group">
                                    <label>Platform</label>
                                    <select class="form-control" name="platform">
                                        <option value="">Select Platform</option>
                                                                                
                                           <option value="Instagram">Instagram</option>
                                           <option value="Facebook">Facebook</option>
                                           <option value="TikTok">TikTok</option>
                                           <option value="Snapchat">Snapchat</option>
                                           <option value="Onlyfans">Onlyfans</option>
                                           
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Enter Name">
                                </div>
                            </div>
                           
                            
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Followers from</label>
                                    <input type="text" name="follower_from" class="form-control numeric_input" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label> to</label>
                                    <input type="text" name="follower_to" class="form-control numeric_input" placeholder=">0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Following from</label>
                                    <input type="text" name="following_from" class="form-control numeric_input" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>to</label>
                                    <input type="text" name="following_to" class="form-control numeric_input" placeholder=">0">
                                </div>
                            </div>
							
							<div class="col-lg-3">
                                <div class="form-group">
                                    <label>Like from</label>
                                    <input type="text" name="like_from" class="form-control numeric_input" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>to</label>
                                    <input type="text" name="like_to" class="form-control numeric_input" placeholder=">0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Comment from</label>
                                    <input type="text" name="comment_from" class="form-control numeric_input" placeholder="0">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>to</label>
                                    <input type="text" name="comment_to" class="form-control numeric_input" placeholder=">0">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Category</label>
                                   
                                    <select name="category[]" class="form-control tokenizationSelect2" multiple="true">
                                        <option value="">Select Category</option>
                                        <?php 
                                        $cat=getCategory();
                                        foreach ($cat as $value) {
                                           ?>
                                           <option value="<?=$value->category;?>"><?=$value->category;?></option>
                                           <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select name="country[]" class="form-control tokenizationSelect2" multiple="true">
                                        <option value="">Select Country</option>
                                       <?php 
                                        $country=getCountry();
                                        foreach ($country as $value) {
                                           ?>
                                           <option value="<?=$value->country;?>"><?=$value->country;?></option>
                                           <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city[]" class="form-control tokenizationSelect2" multiple="true" >
                                        <option value="">Select City</option>
                                       <?php 
                                        $city=getCity();
                                        foreach ($city as $value) {
                                           ?>
                                           <option value="<?=$value->city;?>"><?=$value->city;?></option>
                                           <?php 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Audience Interest</label>
                                    <input type="text" class="form-control" name="audience_interest" placeholder="Audience interest">
                                </div>
                            </div>
                           <div class="col-lg-4">
                                <h4 class="modal-tag">Verified</h4>
                                <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio1" name="verified" value="yes">
    <label class="custom-control-label" for="customRadio1">Yes</label>
  </div>
                                <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="customRadio2" name="verified" value="no">
    <label class="custom-control-label" for="customRadio2">No</label>
  </div>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="modal-tag">Email</h4>
                                <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="email_yes" name="email" value="yes">
    <label class="custom-control-label" for="email_yes">Yes</label>
  </div>
                                <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="email_no" name="email" value="no">
    <label class="custom-control-label" for="email_no">No</label>
  </div>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="modal-tag">Gender</h4>
                                <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="gender_yes" name="gender" value="Male">
    <label class="custom-control-label" for="gender_yes">Male</label>
  </div>
                                <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="gender_no" name="gender" value="Female">
    <label class="custom-control-label" for="gender_no">Female</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" class="custom-control-input" id="other_no" name="gender" value="Unknown">
    <label class="custom-control-label" for="other_no">Other</label>
  </div>
                            </div>
                            
                           
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?php echo base_url();?>assets_front/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets_front/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets_front/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
    <script src="https://malsup.github.io/jquery.cycle2.scrollVert.js"></script>
    <script src="<?php echo base_url();?>assets_front/js/jquery.extra.js"></script>
	 <script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js'></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(".menu li").find("ul").parent().append("<span></span>");
            jQuery(".menuButton").click(function() {
                jQuery(".menuButton").toggleClass("arrow_change");
                jQuery(".menuButton + ul").slideToggle();
            });
            jQuery(".menu ul li span").click(function() {
                if (jQuery("span").parent().children("ul").is(":visible")) {
                    jQuery(this).parent().siblings().children("ul").slideUp();
                }
                jQuery(this).parent().children("ul").slideToggle();
            });

             $('.numeric_input').keydown(function(event) {
return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )


      
    });
        });

        jQuery(".myAccount span").click(function() {
            jQuery(".myAccount span").toggleClass("arrow_change");
            jQuery(".myAccountDropdown").slideToggle();

        });

    </script>

<script>
       $(document).ready(function(){
  $(".tokenizationSelect2").select2({
		//placeholder: "Your favourite car", //placeholder
		tags: true,
		tokenSeparators: ['/',',',';'," "] 
	});
})

    </script>
    <!--aside_js area stated-->    
    
    
    <script>
      $(document).ready(function(){
      // $("a.cardclick").click(function(){
      // setTimeout(function(){
          
            
      //  }, 500);
       //$(".aside, .aside-backdrop").addClass("in");
       //});
    });
  </script>
  <script>
      $(document).ready(function(){
      $(".close, .aside-backdrop").click(function(){
      //alert(1);
           $(".aside, .aside-backdrop").removeClass("in");
            
      
       });
      $(".close_class").click(function(){
      alert(1);
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
                     //$("#overlayer").delay(10).fadeOut("slow");
                      $(".loader, #overlayer").hide();
                     $(".aside, .aside-backdrop").addClass("in");
                }else{
                     $this.html($this.data('original-text'));
                    // $("#overlayer").delay(10).fadeOut("slow");
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
  
  
  
  
</body>

</html>