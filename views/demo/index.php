<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome To Vista Media Product Promotion</title>
	<meta name="keywords" content="Promotion Media, Vista Media, Bali Billboard, Bali Iklan"/>
    <meta name="description" content="Bilboard and Media Promotion">
    
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
						
                    <a href="<?php echo URL;?>" class="navbar-brand">
                    <img src="<?php echo URL;?>logo.png">
                        
                        </a>

						</div>
					</div>
				   <div class="col-xs-12 col-sm-6 col-md-6">

						<div class="call-us">
							
							<span></span>
						</div>
					</div>
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end little head -->


		<div class="main-wrapper">

			<div class="container">

				<div class="row" style="min-height:550px;">
					
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row">

													<div class="topsortby">
							
								
								<p>Selamat datang di <?php echo strtoupper(PX);?></p>
							

						</div>

							<?php foreach($this->vprod as $key=>$value){?>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="product-item">
									<div class="image">
										<a href="<?php echo URL."demo/detail/".$value["ID"];?>">
											<img src="<?php echo URL.$value["img"];?>" alt="Special Offer"/>
											<span class="hover-effect">
												<i class="icon-link"></i>
											</span>
										</a>
									</div>
									<div class="details">
									<a href="<?php echo URL."demo/detail/".$value["ID"];?>">
										<h4><?php echo $value["ProductCode"];?></h4>
										<span class="hotel-location"><i class="icon-map-marker"></i> <?php echo $value["Address"].", ".$value["Kota"].", ".$value["Area"];?></span>
									</a>
									</div>
								</div>
							</div>
							<?php }?>
							
						</div>
						<div class="clear"></div>
						
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

    <!-- JavaScript
    ================================================== -->
    <script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/initialize-google-map.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery.plugins.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery.customs.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery-ui.min.js"></script>
	

  </body>
</html>
