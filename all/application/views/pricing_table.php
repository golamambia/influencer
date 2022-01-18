
    <section class="mian-area subscrib_area">
        <div class="container-fluid">
            <div class="subscrib-area">
                <div class="box-area">
                    <a href="<?=base_url();?>register">
                    <div class="box">
                        <h3>Free</h3>
                        <h4><sup>$</sup>0<sub>/mo</sub></h4>
                        <?php if($this->session->userdata('infl_sess')){?>
                        <button type="button" class="btn btn-primary">ALREADY SIGN UP</button>
                    <?php }else{?>
                         <a href="<?=base_url();?>register/" class="btn btn-primary">SIGN UP</a>
                    <?php }?>
                        <ul>
                            <li>5 searches</li>
                            <li>0 exports</li>
                            <li>0 Export profile</li>
                        </ul>
                    </div>
                </a>
                </div>
                <?php 
              
               foreach ($datatable as $key => $value) {
                //print_r($value)
                
               ?>
                <div class="box-area <?php if($value->ptitle=='SILVER'){echo"active";}?>">
                    <a href="<?=base_url();?>register?reg=<?=base64_encode($value->pid);?>">
                    <div class="box">
                        <h3><?=$value->ptitle;?></h3>
                        <h4><sup>$</sup><?=$value->pamount;?><sub>/mo</sub></h4>
                        <button type="button" class="btn btn-primary">SUBSCRIBE</button>
                        <ul>
                            <li><?=$value->psearch;?> searches</li>
                            <li><?=$value->pexport;?> exports</li>
                            <li><?=$value->pdataid;?> Export profile</li>
                        </ul>
                        <?php if($value->ptitle=='SILVER'){echo'<div class="recomender">Recommended</div>';}?>
                    </div>
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- subscrib area stop -->

    