<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>Vista Media Property Management | Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
	<?php /* ?>
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/preview.css" />
    	

    <link rel="stylesheet" href="<?php echo URL;?>assets/css/main.css" />
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?php echo URL;?>assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
*/ ?>
    <!-- PAGE LEVEL STYLES -->
    
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >
<div id="content">
    <div id="header">
    	<div id="logo"><img src="<?php echo URL;?>assets/css/logo.png" height="100px" width="100px" /></div>
        <div  id="judul">
        <h3><?php echo $this->ProductView["ProductCode"];?></h3>
        <p><?php echo $this->ProductView["Address"];?> - <?php echo $this->ProductView["Kota"];?></p>
        </div>
    </div>
    <div id="Img"><img src="<?php echo URL.$this->ProductView["DefautIMG"];?>" width="800px" height="auto" /></div>
    <div id="deskripsi">
    <div class="halp">
	    	<h4>Informasi Area</h4>     
        <div id="conts">
        <h5>Rute Jalan</h5>
        <p><?php echo $this->ProductView["RuteJalan"];?></p>
        </div>
        <div id="conts">
        <h5>Akses Menuju</h5>
        <p><?php echo $this->ProductView["akses"];?></p>
        </div>
        <div id="conts">
        <h5>Jarak Pandang terjauh</h5>
        <p><?php echo $this->ProductView["JarakPandang"];?></p>
        </div>
        <div id="conts">
        <h5>Kecepatan Kendaraan</h5>
        <p><?php echo $this->ProductView["KecepatanKendaraan"];?></p>
        </div>
        <div id="conts">
        <h5>Kawasan</h5>
        <p><?php echo $this->ProductView["Kawasan"];?></p>
		</div>
    </div>
    <div class="halp">
		<h4>Deskripsi Billboard</h4>
                <div id="conts">
        <h5>Jenis</h5>
        <p><?php echo $this->ProductView["NamaJenis"];?></p>
        </div>
        <div id="conts">
        <h5>Ukuran</h5>
        <p><?php echo $this->ProductView["Ukuran"];?></p>
        </div>
        <div id="conts">
        <h5>Jumlah</h5>
        <p><?php echo $this->ProductView["Jumlah"];?></p>
        </div>
        <div id="conts">
        <h5>Orientasi</h5>
        <p><?php if($this->ProductView["Orientasi"]=="V"){ echo "Vertical";}else{ echo "Horisontal";}?></p>
        </div>
        <div id="conts">
        <h5>Penerangan</h5>
        <p><?php  
		switch($this->ProductView["Penerangan"]){
			case 'N' : echo "No-Light"; break;
			case 'B' : echo "Back Light"; break;
			case 'F' : echo "Front Light"; break;
		} ?></p>
        </div>
    </div>
     </div>
    <div id="keterangan">
    <div id="nket-body">    
    	<h5>Keterangan Lokasi</h5><p> <?php echo $this->ProductView["Keterangan"];?></p>
    </div>

                       
</div>
                            <div style='overflow:hidden;height:400px;width:100%;'>
                            <div id='gmap_canvas' style='height:400px;width:100%;'></div>
                            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style>
                        </div> 
   
    
</div>
</body>

    <!-- END BODY -->
</html>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyClMvjf9NUKCO-KX-TO7oGFSZPIbRdyX7Q&sensor=false'></script>

<script type='text/javascript'>
    function init_map(){
        var myOptions = {
            zoom:16,
            center:new google.maps.LatLng(<?php echo $this->ProductView["Latitude"];?>,<?php echo $this->ProductView["Longitude"];?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(<?php echo $this->ProductView["Latitude"];?>,<?php echo $this->ProductView["Longitude"];?>)
        });
        infowindow = new google.maps.InfoWindow({
            content:'<?php echo $this->ProductView["ProductCode"];?>'
        });
        google.maps.event.addListener(marker, 'click', 
                function(){infowindow.open(map,marker);}
                );
        infowindow.open(map,marker);
        }
   google.maps.event.addDomListener(window, 'load', init_map);
   
   
   </script>
