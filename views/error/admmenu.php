<body class="padTop53 " >
    <!-- MAIN WRAPPER -->
    <div id="wrap" >
    <!-- END HEAD -->

    <!-- BEGIN BODY -->

        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-danger btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="<?php echo URL;?>" class="navbar-brand">
                    <img src="<?php echo URL;?>logo.png">
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
                
<div class="col-lg-12">
                        <div style="text-align: center;">
							<?php 
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=7")<>0){
							$lloc=Code::GetField("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=7");
							
							if($lloc==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/Property_List">
                                <i class="icon-map-marker icon-2x"></i>
                                <span> List<br>Lokasi</span>
                            </a>
							<?php }
							}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=12")<>0){
							$lkl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=12");
							
							if($lkl==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/CustomerList">
                                <i class="icon-user icon-2x"></i>
                                <span>Customer<br>&nbsp;</span>
                            </a>
							<?php }
							}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=1")<>0){
							$ipl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=1");
							
							if($ipl==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/IjinPrinsipList">
                                <i class="icon-file-alt icon-2x"></i>
                                <span>Ijin<br>Prinsip</span>
                            </a>
							<?php }
							}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=2")<>0){
							$irl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=2");
							
							if($irl==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/IjinreklameList">
                                <i class="icon-legal icon-2x"></i>
                                <span>Ijin<br>Reklame</span>
                            </a>
							<?php }
							}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=3")<>0){
							$iml=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=3");
							
							if($iml==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/IMBRList">
                                <i class="icon-book icon-2x"></i>
                                <span>IMBR<br>&nbsp;</span>
                            </a>
							<?php }
							}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
							$iswl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=4");
							
							if($iswl==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/SewaList">
                                <i class="icon-legal icon-2x"></i>
                                <span>Sewa<br>Lahan</span>
                            </a>
							<?php }
							}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
							$irpl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=10");
							
							if($irpl==1){?>
							<a class="quick-btn" href="<?php echo URL;?>admin/listrpt">
                                <i class="icon-folder-open icon-2x"></i>
                                <span>Report<br>Bulanan</span>
                            </a>
							<?php }}?>
                            <a class="quick-btn" href="#">
                                <i class="icon-facetime-video icon-2x"></i>
                                <span>CCTV<br>&nbsp;</span>
                            </a>
							<?php 
							
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=9")<>0){
							$krl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=9");
							
							if($krl==1){?>
                            <a class="quick-btn" href="<?php echo URL;?>admin/kirimlokasi">
                                <i class="icon-location-arrow icon-2x"></i>
                                <span>Kirim<br>Lokasi</span>
                            </a>
							<?php }
							}?>
                        </div>
		
                    </div>
			<div class="headmenu">Menu Utama</div>
            </nav>
			
        </div>
        <!-- END HEADER SECTION -->
        <!-- MENU SECTION -->
       <div id="left" >

            <ul id="menu" class="collapse">

                
                <li class="panel">
                    <a href="<?php echo  URL;?>admin/" >
                        <i class="icon-home"></i> Home                       
                    </a>                   
                </li>
				
                <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                        <i class="icon-map-marker"> </i> Titik Lokasi
	   
                        <span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span>
                       
                    </a>
                    <ul class="collapse" id="component-nav">
					<?php 
					
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=8")<>0){
					$krl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=8");
							if($krl==1){?>
                        <li class=""><a href="<?php echo  URL;?>admin/Property_List"><i class="icon-angle-right"></i> Titik Lokasi </a></li>
						<?php }
						}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=6")<>0){
							$ary=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=6");
							if($ary==1){?>
                        <li class=""><a href="<?php echo  URL;?>admin/area"><i class="icon-angle-right"></i> Area </a></li>
						<?php }
						}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=7")<>0){
							$kat=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=7");
							if($kat==1){?>
						<li class=""><a href="<?php echo  URL;?>admin/property_category"><i class="icon-angle-right"></i> Kategori </a></li>
						<?php }
						}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=9")<>0){
							$klok=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=9");
							if($klok==1){?>
						<li class=""><a href="<?php echo  URL;?>admin/kirimlokasi"><i class="icon-angle-right"></i> Kirim Lokasi </a></li>
							<?php }}?>
                    </ul>
                </li>
       
				
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#page-doc">
                        <i class="icon-picture"></i>  Pergantian Materi
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                         
                    </a>
                    <ul class="collapse" id="page-doc">
                        <?php
						if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=14")<>0){
							$upd=Code::GetField("usrprev","AddNew","IDUSer='".Session::get('ID')."' and IDModule=14");
							if($upd==1){?>
                        <li><a href="<?php echo  URL;?>admin/updock"><i class="icon-angle-right"></i> Upload Documentasi </a></li>
						<?php }}
						if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=14")<>0){
							$lsd=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=14");
							if($lsd==1){?>
                        <li><a href="<?php echo  URL;?>admin/updocklist"><i class="icon-angle-right"></i> List Documentasi</a></li>
						<?php }}
						if(Code::requery("usrprev","Kirim","IDUser='".Session::get('ID')."' and IDModule=14")<>0){
							$sdd=Code::GetField("usrprev","Kirim","IDUSer='".Session::get('ID')."' and IDModule=14");
							if($sdd==1){?>
						<li><a href="<?php echo  URL;?>admin/Senddock"><i class="icon-angle-right"></i> Kirim Documentasi</a></li>
						<?php }}?>
                    </ul>
                </li>
				<li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#page-rpt">
                        <i class="icon-picture"></i>  Laporan Bulanan
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                         
                    </a>
                    <ul class="collapse" id="page-rpt">
                        <?php 
						if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
							$ijp=Code::GetField("usrprev","AddNew","IDUSer='".Session::get('ID')."' and IDModule=10");
							if($ijp==1){?>
                        <li><a href="<?php echo  URL;?>admin/uprpt"><i class="icon-angle-right"></i> Upload Data Laporan </a></li>
						<?php }}
						if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
							$ijp=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=10");
							if($ijp==1){?>
                        <li><a href="<?php echo  URL;?>admin/listrpt"><i class="icon-angle-right"></i> List Laporan</a></li>
						<?php }}
						if(Code::requery("usrprev","Kirim","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
							$ijp=Code::GetField("usrprev","Kirim","IDUSer='".Session::get('ID')."' and IDModule=10");
							if($ijp==1){?>
						<li><a href="<?php echo  URL;?>admin/printrpt"><i class="icon-angle-right"></i> Cetak Laporan</a></li>
						<?php }}?>
						
                    </ul>
                </li>
				<?php 
						if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=11")<>0){
							$otr=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=11");
							if($otr==1){?>
				<li class="panel ">
                    <a href="<?php echo  URL;?>admin/reportset">
                        <i class="icon-calendar"></i> Report Outomatis
                    </a>
                </li>
				<?php }}?>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#pagesr-nav">
                        <i class="icon-book"></i>  Ijin
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                         
                    </a>
                    <ul class="collapse" id="pagesr-nav">
                        <?php 
						
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=1")<>0){
							$ijp=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=1");
							if($ijp==1){?>
                        <li><a href="<?php echo  URL;?>admin/IjinPrinsipList"><i class="icon-angle-right"></i> Ijin Prinsip </a></li>
						<?php }
						}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=2")<>0){
							$ijr=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=2");
							if($ijr==1){?>
                        <li><a href="<?php echo  URL;?>admin/IjinreklameList"><i class="icon-angle-right"></i> Ijin Reklame</a></li>
						<?php }
						}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=3")<>0){
							$imb=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=3");
							if($imb==1){?>
                        <li><a href="<?php echo  URL;?>admin/IMBRList"><i class="icon-angle-right"></i> IMBR </a></li>
							<?php }}?>
                        
                    </ul>
                </li>
				
				<?php 
				
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
							$swl=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=4");
							if($swl==1){?>
				<li  class="panel "><a href="<?php echo  URL;?>admin/SewaList"><i class="icon-legal"></i> Sewa Lahan </a></li>
				<?php }
				}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=5")<>0){
							$sale=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=5");
							if($sale==1){?>
				<li class="panel ">
                    <a href="<?php echo  URL;?>admin/KontrakList"><i class="icon-shopping-cart"></i> Penjualan </a>
                </li>
				<?php }
				}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=12")<>0){
							$kli=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=12");
							if($kli==1){?>
                <li class="panel ">
                    <a href="<?php echo  URL;?>admin/CustomerList">
                        <i class="icon-pencil"></i> Klien's
                    </a>
                </li>
				<?php }
				}
							if(Code::requery("usrprev","List","IDUser='".Session::get('ID')."' and IDModule=13")<>0){
							$iusr=Code::GetField("usrprev","List","IDUSer='".Session::get('ID')."' and IDModule=13");
							if($iusr==1){?>
				<li class="panel ">
                    <a href="<?php echo  URL;?>admin/UserList">
                        <i class="icon-user"></i> Users
                    </a>
                </li>
							<?php }}?>
                <li><a href="<?php echo URL;?>login/logout"><i class="icon-signin"></i> Logout</a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->
