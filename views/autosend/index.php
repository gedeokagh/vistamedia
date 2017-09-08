<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome To Vista Media Product Promotion</title>
	<meta name="keywords" content="Promotion Media, Vista Media, Bali Billboard, Bali Iklan"/>
    <meta name="description" content="Bilboard and Media Promotion">
	<meta http-equiv="refresh" content="10">
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- ============================================
		Fav and touch icons
	============================================= -->
  <link rel="shortcut icon" href="images/ico/favicon.png">
	<link href="<?php echo URL."assetx/";?>css/bootstrap.css" rel="stylesheet" media="all" />
	<link href="<?php echo URL."assetx/";?>css/font-awesome.css" type="text/css" rel="stylesheet" media="all" />
	<link href="<?php echo URL."assetx/";?>css/smoothness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
	<link href="<?php echo URL."assetx/";?>css/features.css" rel="stylesheet" media="all" />
    <link href="<?php echo URL."assetx/";?>css/main.css" rel="stylesheet" media="all" />
	<link href="<?php echo URL."assetx/";?>css/responsive.css" rel="stylesheet" media="all" />
	<!--google font-->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,200,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200,100,500,700,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Andika' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>

<body>

	<div class="body-wrapper">

		<div class="little-head">
			<div class="container">
				<div class="row clearfix">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="logo">
							<a href="<?php echo URL;?>"><img src="<?php echo URL;?>images/logo.png" alt="logo"></a>
						</div>
					</div>
				   <div class="col-xs-12 col-sm-6 col-md-6">

						
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end little head -->


		<div class="main-wrapper">

			<div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
					<h2>Daftar Report Otomatis </h2>
					</div>
					
                </div>

                <hr />


                <div class="row" style="min-height:350px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Lokasi</th>
											<th>Alamat</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Customer</th>
											<th>TglKirim</th>
											<th>Penerima</th>
											<th>Pengirim</th>
											<th>Send</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<div id="list">
									<?php
									foreach ($this->prolist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $value['ID']; ?></td>
                                            <td><a href="<?php echo URL."admin/ProductView/".$value['ProductID'];?>" target="Blank"><?php echo Code::GetField("product","ProductCode","ID=".$value['ProductID']); ?></a></td>
											<td><?php echo Code::GetField("product","Address","ID=".$value['ProductID']); ?></td>
											<td><?php echo Code::GetField("product","Kota","ID=".$value['ProductID']); ?></td>
											<td><?php 
											$areaid=Code::GetField("product","AreaID","ID=".$value['ProductID']);
											echo Code::GetField("area","NamaArea","ID=".$areaid); ?></td>
											<td><?php echo Code::GetField("customer","CustomerName","CustomerID=".$value['CustomerID']); ?></td>
											<td><?php 
											$tgl=str_replace("|",",",$value['Date']) ;
											echo $tgl;
											 ?></td>
											<td><?php echo Code::GetRecieve($value["CustomerID"]); ?></td>
											<td><?php $data=explode("-",$value['Sender']); echo $data[1]; ?></td>
											
											<td><?php echo $value['LastSend']; ?></td>
											
                                        </tr>
									<?php }?>
									</div>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            
            


        </div>
		</div>

	</div><!-- /main-wrapper -->

	<footer id="main-footer">
		<div class="container">
			<div class="row">
			VISTAMEDIA @2017
			</div>
		</div>
	</footer>

   <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo URL;?>assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="<?php echo URL;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    

        <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo URL;?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo URL;?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
<script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
        });
    </script>
  </body>
</html>
