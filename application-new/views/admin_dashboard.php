 <?php  $this->load->view('adminheader');	?>
	<div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
			<style>
			.card .media-body h5{
			font-size:14px;
			}
			.my-c .card-body .p-1{
			    padding:13px 5px 13px 10px !important;
			}
			</style>
            <div class="content-body">
                                 <!-- Stats -->
                <div class="row">
				<div class="col-xl-1"></div>
                    <div class="col-xl-2 col-lg-6 col-xs-12">
                        <div class="card my-c">
                            <div class="card-body">
                              <a href="<?php echo site_url('Admin/Users');?>" >  <div class="media">
                                    <div class="p-1 text-xs-center box-primary bg-primary bg-darken-2 media-left media-middle" style="background-color: #ff6d00 !important;">
                                        <i class="fa fa-users font-large-1 white"></i>
                                    </div>
                                    <div class="p-1 text-xs-center bg-gradient-x-primary white media-body">
                                        <h5> Users </h5>
                                        <h5 class="text-bold-400"><i class="ft-plus"></i> <?php echo count($users); ?></h5>
                                    </div>
									
                                </div></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-xs-12">
                        <div class="card my-c">
                           <a href="<?php echo site_url('Admin/shops');?>" >  <div class="card-body">
                                <div class="media">
                                    <div class="p-1 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                                        <i class="fa fa-cutlery font-large-1 white"></i>
                                    </div>
                                    <div class="p-1 text-xs-center bg-gradient-x-danger white media-body">
                                        <h5>Restaurants</h5>
                                        <h5 class="text-bold-400"><i class="ft-plus"></i>
										<?php echo count($shops); ?></h5>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-xs-12">
                        <div class="card my-c">
						<a href="<?php echo site_url('Admin/DeliveryPeople');?>" > 
						
                            <div class="card-body">
                                <div class="media">
                                    <div class="p-1 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                                        <i class="fa fa-car font-large-1 white"></i>
                                    </div>
                                    <div class="p-1 text-xs-center bg-gradient-x-warning white media-body">
                                        <h5>Drivers</h5>
                                        <h5 class="text-bold-400"><i class="ft-plus"></i> <?php echo count($deliverie_people); ?></h5>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-xs-12">
                        <div class="card my-c">
                            <div class="card-body">
                                <div class="media">
                                    <div class="p-1 text-xs-center bg-success bg-darken-2 media-left media-middle">
                                        <i class="fa fa-list-alt font-large-1 white"></i>
                                    </div>
                                    <div class="p-1 text-xs-center bg-gradient-x-success white media-body">
                                        <h5>Orders</h5>
                                        <h5 class="text-bold-400"><i class="ft-plus"></i> 1560</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-lg-6 col-xs-12">
                        <div class="card my-c">
                            <div class="card-body">
                                <div class="media">
                                    <div class="p-1 text-xs-center bg-success bg-darken-2 media-left media-middle">
                                        <i class="icon-wallet font-large-1 white"></i>
                                    </div>
                                    <div class="p-1 text-xs-center bg-gradient-x-success white media-body">
                                        <h5>Payments</h5>
                                        <h5 class="text-bold-400"><i class="ft-plus"></i> 20000</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-1"></div>
                </div>
                <!--/ Stats -->
				 <!--Recent Orders & Monthly Salse -->
                <div class="row match-height">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Orders</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <p>Total paid invoices <span>$240</span>, unpaid <span>$150</span>. <span class="float-xs-right"><a href="#" >Invoice Summary <i class="ft-arrow-right"></i></a></span></p>
                                </div>
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Order number</th>
                                                <th>Customer Name/ phone number</th>
                                                <th>Restaurant/ phone number</th>
                                                <th>Delivery person/phone number</th>
                                                <th>Delivery adress</th>
                                                <th>Order Status </th>
                                                <th>Amount </th>
                                                <th>Payment Status </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                                                        <tr>
                                                <td class="text-truncate">1</td>
                                                <td class="text-truncate">351234</td>
                                                <td class="text-truncate">Charles 1234567892</td>
                                                <td class="text-truncate">KFC Hobart branch 1234567895</td>
                                                <td class="text-truncate">Yen 5678943214</td>
                                                <td class="text-truncate">Address here</td>
                                                <td class="text-truncate"><span class="tag tag-default tag-success">Order accepted</span></td>
												<td class="text-truncate">$ 130</td>
                                                <td class="text-truncate">Payment done by Credit card or  cash will be paid</td>
                                                
                                            </tr>
                                                                                        <tr>
                                                <td class="text-truncate">2</td>
                                                <td class="text-truncate">351234</td>
                                                <td class="text-truncate">Charles 1234567892</td>
                                                <td class="text-truncate">KFC Hobart branch 1234567895</td>
                                                <td class="text-truncate">Yen 5678943214</td>
                                                <td class="text-truncate">Address here</td>
                                                <td class="text-truncate"><span class="tag tag-default tag-warning">Order pending</span></td>
												<td class="text-truncate">$ 130</td>
                                                <td class="text-truncate">Payment done by Credit card or  cash will be paid</td>
                                                
                                            </tr>
                                                                                       <tr>
                                                <td class="text-truncate">3</td>
                                                <td class="text-truncate">351234</td>
                                                <td class="text-truncate">Charles 1234567892</td>
                                                <td class="text-truncate">KFC Hobart branch 1234567895</td>
                                                <td class="text-truncate">Yen 5678943214</td>
                                                <td class="text-truncate">Address here</td>
                                                <td class="text-truncate"><span class="tag tag-default tag-dander">Order Cancel</span></td>
												<td class="text-truncate">$ 130</td>
                                                <td class="text-truncate">Payment done by Credit card or  cash will be paid</td>
                                                
                                            </tr>
                                                                                        <tr>
                                                <td class="text-truncate">4</td>
                                                <td class="text-truncate">351234</td>
                                                <td class="text-truncate">Charles 1234567892</td>
                                                <td class="text-truncate">KFC Hobart branch 1234567895</td>
                                                <td class="text-truncate">Yen 5678943214</td>
                                                <td class="text-truncate">Address here</td>
                                                <td class="text-truncate"><span class="tag tag-default tag-success">Order accepted</span></td>
												<td class="text-truncate">$ 130</td>
                                                <td class="text-truncate">Payment done by Credit card or  cash will be paid</td>
                                                
                                            </tr>
                                                                                      <tr>
                                                <td class="text-truncate">5</td>
                                                <td class="text-truncate">351234</td>
                                                <td class="text-truncate">Charles 1234567892</td>
                                                <td class="text-truncate">KFC Hobart branch 1234567895</td>
                                                <td class="text-truncate">Yen 5678943214</td>
                                                <td class="text-truncate">Address here</td>
                                                <td class="text-truncate"><span class="tag tag-default tag-success">Order accepted</span></td>
												<td class="text-truncate">$ 130</td>
                                                <td class="text-truncate">Payment done by Credit card or  cash will be paid</td>
                                                
                                            </tr>
                                                                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Recent Orders & Monthly Salse -->
                <!--Product sale & buyers -->
                <div class="row match-height">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Products Sales</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <div id="products-sales" class="height-300"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--/ Product sale & buyers -->
               
            </div>
        </div>
    </div>

    <footer class="footer footer-static footer-light navbar-border">
         <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
            <span class="float-md-left d-xs-block d-md-inline-block">
                © 2018 Storkks 
            </span>
        </p>
            
    </footer>
    <script>
    var resizefunc = [];
    </script>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>admin-assets/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
        <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url(); ?>admin-assets/js/raphael-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/morris.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/unslider-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
        <!-- BEGIN STACK JS-->
    <script src="<?php echo base_url(); ?>admin-assets/js/app-menu.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>admin-assets/js/customizer.min.js" type="text/javascript"></script>
    <!-- END STACK JS-->
        
     <!-- BEGIN PAGE LEVEL JS-->
   
    <script type="text/javascript">
        //var data = "[{&quot;month&quot;:&quot;2018-01&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-02&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-03&quot;,&quot;delivered&quot;:&quot;21&quot;,&quot;cancelled&quot;:&quot;11&quot;},{&quot;month&quot;:&quot;2018-04&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-05&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-06&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-07&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-08&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-09&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-10&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-11&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;},{&quot;month&quot;:&quot;2018-12&quot;,&quot;delivered&quot;:&quot;0&quot;,&quot;cancelled&quot;:&quot;0&quot;}]";
        var data = [ 
                        {
                month: "2018-01",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-02",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-03",  delivered: 21, cancelled: 11
            },
                        {
                month: "2018-04",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-05",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-06",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-07",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-08",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-09",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-10",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-11",  delivered: 0, cancelled: 0
            },
                        {
                month: "2018-12",  delivered: 0, cancelled: 0
            },
                    ];
    </script>
     <script src="<?php echo base_url(); ?>admin-assets/js/dashboard-ecommerce.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>admin-assets/js/scripts.js" type="text/javascript"></script>

</body>
</html>