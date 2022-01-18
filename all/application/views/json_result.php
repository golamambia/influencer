<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
     
    
     jQuery('#instagramcarousel').owlCarousel({
        loop:false,
        autoplay:true,
        margin:16,
        dots:true,
        nav:false,
        navText:[],
        responsive:{

            0:{

                items:1
            },
            479:{

                items:1,
                
            },
            640:{

                items:1,
                
            },
            768:{

                items:3,
                
            },
            992:{

                items:3,
                
            },
            1199:{

                items:3
            }
        }
    })
     $(document).ready(function(){
      
      $(".close_class").click(function(){
     // alert(1);
           $(".aside, .aside-backdrop").removeClass("in");
            
      
       });
    });
  </script>
        <div class="aside-header">
            <div class="container">
               <div class="row d-flex justify-content-center">
                 <div class="col-lg-8 asideprofile">
                   <div class="row row-0">
                      <div class="col-lg-5 col-md-5 d-flex align-content-stretch">
                        <div class="aside_headerthumble">
                           <img src="<?=$result[0]->profile_picture_url;?>" alt=""> 
                        </div>
                      </div>
                      <div class="col-lg-7 col-md-7  d-flex align-content-stretch">
                        <div class="aside_contantbox d-block w-100">
                          <ul>
                             <li><strong><?=$result[0]->user_name;?></strong></li>
                             <li><?=$result[0]->user_full_name;?></li>
                             <!-- <li>last name</li> -->
                             <li><?=$result[0]->email_id;?></li>
                          </ul>
                        </div>
                      </div>
                   </div>
                 </div>
               </div>
            </div>
            <span class="close close_class" data-dismiss="aside" aria-hidden="true"><i class="zmdi zmdi-chevron-right"></i></span>
        </div>
        <div class="reting_area d-flex justify-content-around">
          <div class="retingtopbox">
            <strong><i class="fa fa-reply-all" aria-hidden="true"></i>99%</strong>
            <span>real</span>
          </div>
          <div class="retingtopbox">
           <strong> <i class="fa fa-mars" aria-hidden="true"></i>83%</strong>
            <span>male</span>
          </div>
          <div class="retingtopbox">
            <strong><i class="fa fa-venus" aria-hidden="true"></i>99%</strong>
            <span>female</span>
          </div>
        </div>
        <div class="instagram_likebox d-flex justify-content-between">
          <div class="likebox bg_blue">
            <div class="d-block text-center">
              <i class="fa fa-instagram" aria-hidden="true"></i>
              <span><?php
              $main=$characters->graphql->user;
 $follower= $main->edge_followed_by->count;
 if($follower>1000){
  $fk=$follower/1000;
  echo round($fk, 1).'k';
 }else{
echo $follower;
 }


              ?></span>
            </div>
          </div>
          
          <div class="likebox">
            <div class="d-block text-center">
              <span><?=$result[0]->post_count;?></span>
              <p>Post count</p>
            </div>
          </div>
          
          <div class="likebox ">
            <div class="d-block text-center">
              <span><?=$result[0]->follower_count;?></span>
              <p>Follower count</p>
            </div>
          </div>
          
          <div class="likebox ">
            <div class="d-block text-center">
              <span><?=$result[0]->following_count;?></span>
              <P>Following count</P>
            </div>
          </div>
          
          <div class="likebox ">
            <div class="d-block text-center">
             
              <span><?=$result[0]->verified;?><i class="fa fa-heart-o" aria-hidden="true"></i></span>
              <p>Verified</p>
            </div>
          </div>
           <div class="likebox ">
            <div class="d-block text-center">
              <span><?=$result[0]->country;?><i class="fa fa-comment-o" aria-hidden="true"></i></span>
              <p>Country</p>
            </div>
          </div>
          
        </div>
        <div class="aside-contents">
           <div class="owl-carousel instagram-carousel" id="instagramcarousel">
           <?php 
           $photo=$characters->graphql->user->edge_owner_to_timeline_media->edges;
 //edge_owner_to_timeline_media->edges->node->id;
  //echo"<pre>";
 //print_r($photo);
 foreach ($photo as $key => $value) {
  ?>
           
              <div class="instagram_box">
              <div class="d-block w-100">
                <!-- <div class="instagram_top d-flex justify-content-between">
                  <div class="textbox">
                     <strong class="green">4.7%</strong> engagement
                  </div>
                  <div class="textbox">
                     CPF-$0.09
                  </div>
                </div> -->
                <div class="instagram_thumble">
                  <img src="<?=$value->node->display_url;?>" alt="">
                </div>
                <div class="instagram_bootom">
                  <div class="instagram_bootom_top clearfix">
                    <ul>
                      <li><?=$value->node->edge_liked_by->count;?><i class="fa fa-heart-o" aria-hidden="true"></i></li>
                      <li><?=$value->node->edge_media_to_comment->count;?><i class="fa fa-comment-o" aria-hidden="true"></i></li>
                      <li><?=date('d-m-Y', $value->node->taken_at_timestamp);?></li>
                    </ul>
                  </div>
                  <p><?=$value->node->edge_media_to_caption->edges[0]->node->text;?></p>
                </div>
                </div>
              </div>
              
              
              
             
              <?php }?>
              
              
              
           </div>
        </div>
    