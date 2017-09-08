<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome To Vista Media Product Promotion</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- ============================================
		CSS
	============================================= -->
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

	<link rel="stylesheet" type="text/css" href="css/flexslider.css"  >

  </head>

  <body>

	<div id="details-page" class="body-wrapper">

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

				<div class="row">
					
						
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="sidebar-module colored-module">
							<h3 class="hotel-name"><?php echo $this->proddtl[0]["ProductCode"];?></h3>
							<div class="hotel-location">
								<i class="icon-map-marker"></i> <?php echo $this->proddtl[0]["Address"].", ".$this->proddtl[0]["Kota"].", ".Code::GetField("area","NamaArea","ID=".$this->proddtl[0]["AreaID"]);?>
								
							</div>
							<div class="tip-arrow"></div>
						</div>
						<div class="gap30"></div>
						<div>

								<img src="<?php echo URL.$this->proddtl[0]["img"];?>" style="width:100%;height:50%;" alt=""/>

						</div>
								
								<div class="clearfix"></div>
							
						
						<ul class="tabs">
							<li><a href="#details-tab1"><i class="icon-info-sign"></i> Informasi Area</a></li>
							<li><a href="#details-tab2"><i class="icon-building"></i> Deskripsi</a></li>
							<li><a class="rs-no-br" href="#details-tab3"><i class="icon-star-half-empty"></i> Keterangan Lokasi</a></li>
							<li class="rs-bt"></li>
							<li onclick="loadScript()"><a href="#details-tab4"><i class="icon-map-marker"></i> Map</a></li>
							
						</ul>
						<div class="tab_container">
							<div id="details-tab1" class="tab_content">
								<h4>Informasi Area</h4>
								<div class="gap10"></div>
								<table>
									<tr>
										<td   style="padding:5px;">Rute Jalan </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["RuteJalan"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Akses Menuju </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["akses"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Jarak Pandang </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["JarakPandang"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Kecepatan Kendaraan </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["KecepatanKendaraan"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Kawasan</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["Kawasan"];?></td>
									</tr>
								</table>

							</div>

							<div id="details-tab2" class="tab_content">
								<h4>Deskripsi</h4>
								<table>
									<tr>
										<td   style="padding:5px;">Jenis</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["RuteJalan"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Ukuran </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["Ukuran"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Jumlah </td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php echo $this->proddtl[0]["Jumlah"];?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Orientasi</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"><?php if($this->proddtl[0]["Orientasi"]=="V"){ echo "Vertical";}else{ echo "Horisontal";}?></td>
									</tr>
									<tr>
										<td   style="padding:5px;">Penerangan</td>
										<td  style="padding:5px;"> : </td>
										<td  style="padding:5px;"> <?php  
										switch($this->proddtl[0]["Penerangan"]){
											case 'N' : echo "No-Light"; break;
											case 'B' : echo "Back Light"; break;
											case 'F' : echo "Front Light"; break;
										} ?></td>
									</tr>
								</table>
							</div>

							<div id="details-tab3" class="tab_content">
							<h4>Keterangan Lokasi</h4>
								<div class="gap10"></div>
								<p><?php echo $this->proddtl[0]["Keterangan"];?></p>
							</div>

							<div id="details-tab4" class="tab_content">
								<div id="map-canvas"></div>
							</div>

							
                        </div> 
 
							</div>
<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="row">

													<div class="topsortby">
							
								<h3>See Other : </h3>
						</div>

							<?php 
							if(($this->otr)>2){
							foreach($this->vprod as $key=>$value){?>
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
							<?php }}?>
							
						</div>
						<div class="clear"></div>
						
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

    <!-- JavaScript
    ================================================== -->
    <script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/modernizr.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery.plugins.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery.customs.js"></script>
	<script type="text/javascript" src="<?php echo URL."assetx/";?>js/jquery-ui.min.js"></script>
	

  </body>
</html>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=<?php echo GMAPKEY;?>"></script>
<script type='text/javascript'>
   function initialize() {
   var styles = [
		{
			featureType: 'road.highway',
			elementType: 'all',
			stylers: [
				{ hue: '#e5e5e5' },
				{ saturation: -100 },
				{ lightness: 72 },
				{ visibility: 'simplified' }
			]
		},{
			featureType: 'water',
			elementType: 'all',
			stylers: [
				{ hue: '#30a5dc' },
				{ saturation: 47 },
				{ lightness: -31 },
				{ visibility: 'simplified' }
			]
		},{
			featureType: 'road',
			elementType: 'all',
			stylers: [
				{ hue: '#cccccc' },
				{ saturation: -100 },
				{ lightness: 44 },
				{ visibility: 'on' }
			]
		
		},{
			featureType: 'poi.park',
			elementType: 'all',
			stylers: [
				{ hue: '#d2df9f' },
				{ saturation: 12 },
				{ lightness: -4 },
				{ visibility: 'on' }
			]
		},{
			featureType: 'road.arterial',
			elementType: 'all',
			stylers: [
				{ hue: '#e5e5e5' },
				{ saturation: -100 },
				{ lightness: 56 },
				{ visibility: 'on' }
			]
		},{
			featureType: 'administrative.locality',
			elementType: 'all',
			stylers: [
				
				{ saturation: 0 },
				{ lightness: 0 },
				{ visibility: 'on' }
			]
		}
	];

	
	var myLatlng = new google.maps.LatLng(<?php echo $this->proddtl[0]["Latitude"];?>,<?php echo $this->proddtl[0]["Longitude"];?>);


  // Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
  var styledMap = new google.maps.StyledMapType(styles,
	{name: "Styled Map"});


  // Create a map object, and include the MapTypeId to add
  // to the map type control.
  var mapOptions = {
	zoom: 15,
	center: myLatlng,
	mapTypeControlOptions: {
	  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
	},
	panControl:true,
	mapTypeControl:true,
	streetViewControl:true,
	roteteControl:true,
	overviewMapControl:true
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
	mapOptions);
	
  var marker = new google.maps.Marker({
	  position: myLatlng,
	  map: map,
	  title: '<?php echo $this->proddtl[0]["ProductCode"];?>'
  });


  //Associate the styled map with the MapTypeId and set it to display.
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');
   }
function loadScript() {
	setTimeout(function (){
	  $('#map-canvas').css({'display':'block'});
	  var script = document.createElement('script');
	  script.type = 'text/javascript';
	  script.src = 'https://maps.googleapis.com/maps/api/js?libraries=places&key=<?php echo GMAPKEY;?>&' +
		  'callback=initialize';
	  document.body.appendChild(script);
	  
	  google.maps.event.trigger(map, 'resize');
	}, 500);	
}
   </script>
