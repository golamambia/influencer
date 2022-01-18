<style type="text/css">
      .error_msg p{
    color: #e53935 !important;
  }
  </style>
<!-- sign up area start -->
    <section class="mian-area">
        <div class="container-fluid">
        
        
            <div class="thunku_box">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="row row-0">
                     <div class="col-lg-6  d-flex  align-content-stretch">
                       <div class="thunku_boxleft d-block w-100 p-5">
                       <div class="">
                          <div class="iconbox">
                           <img src="<?php echo base_url();?>assets_front/images/tankyou.png" alt=""> 
                          </div>
                          
                          <h3>thank you<br> Registration successful</h3>
                         </div>
                       </div>
                     </div>
                      <div class="col-lg-6 d-flex  align-content-stretch">
                        <div class="thunku_boxright d-block w-100 p-5">
                         <div class="">
                           <p>Your invoice</p>
                            <table class="table table-bordered">
                             <tbody>
                                <tr>
                                  <th scope="row">name</th>
                                  <td><?=$user_info[0]->name;?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Package</th>
                                  <td>Free</td>
                                </tr>
                                <tr>
                                  <th scope="row">Searches</th>
                                  <td>5</td>
                                </tr>
                                <tr>
                                  <th scope="row">Export</th>
                                  <td>0</td>
                                </tr>

                                <tr>
                                  <th scope="row">Export profile</th>
                                  <td>0</td>
                                </tr>




                              </tbody>
                            </table>
                          </div>

                         
                          <span class="text-white btn_yeolow"><a href="<?=base_url();?>dashboard" style="color: #fff;">Goto dashboard</a></span>

                       </div>
                     </div>
                  </div>
                </div>
            </div>
            </div>
          

        </div>
    </section>
    <!-- sign up area stop -->
