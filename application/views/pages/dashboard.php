<!--start page title -->

                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="page-title-box">
                                    <h4 class="font-size-18">Dashboard</h4>
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item active">Welcome to My Pro Dashboard</li>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
                            </div>
                        </div>
                        <!-- end page title -->

                      <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            
                                            <h5 class="font-size-16 text-center text-uppercase mt-0 text-white-50">Total Users</h5>
                                            <a href="<?php echo site_url('masters/user')?>"><h5 class="font-size-20 text-center text-uppercase mt-0 text-white-50"></h5></a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            
                                            <h5 class="font-size-16 text-center text-uppercase mt-0 text-white-50">Total Orders</h5>
                                           <a href="<?php echo site_url('masters/order')?>"> <h5 class="font-size-20 text-center text-uppercase mt-0 text-white-50"><?php echo $total_orders;?></h5></a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            
                                            <h5 class="font-size-16 text-center text-uppercase mt-0 text-white-50">Today Orders</h5>
                                            <h5 class="font-size-20 text-center text-uppercase mt-0 text-white-50"><?php echo $today_orders;?></h5>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card mini-stat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            
                                            <h5 class="font-size-16 text-center text-uppercase mt-0 text-white-50">Total Transdata</h5>
                                            <a href="<?php echo site_url('masters/transdata')?>"><h5 class="font-size-20 text-center text-uppercase mt-0 text-white-50"><?php echo $total_transdata;?></h5></a>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                             
                            
                           
                        </div>
                       

               
                <!-- end row -->
                       <script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
  