

    <!-- body area start -->
    <section class="mian-area">
        <div class="container-fluid">
            <div class="dashboard-area">
                <div class="row row-8">
                    <div class="col-lg-3">
                        <?php

                                 $this->load->view('left_bar');

                                ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="dashboard_body">
                            <h3>Package Details</h3>
                            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Pack</th>
                                        <th>Searches</th>
                                        <th>Searches left</th>
                                        <th>Export</th>
                                        <th>Export left</th>
                                        <th>Amount</th>
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
                                        
                                        <td><?=$value->ptitle;?></td>
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
                                        <td><?=$value->charge_id;?></td>
                                        <td><?=date('d-m-Y',strtotime($value->created_at));?></td>
                                        <td><?=$value->ustatus;?></td>

                                    </tr>
                                    <?php }?>
                                   
                                   
                                </tbody>
                                
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- body area stop -->

