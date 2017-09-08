<?php
include('header.php');
include('menu.php');
?>
	<link<!-- PAGE LEVEL STYLES -->
    
 <link href="<?php echo URL;?>assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/Font-Awesome/css/font-awesome.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap-wysihtml5-hack.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
<style>
	ul.wysihtml5-toolbar > li {
		position: relative;
	}
	#mexp a img {
            margin-bottom:5px !important;

        }
         #mexp{
			 float:left;
			 margin:10px;
		 }
</style>   
    <!-- END PAGE LEVEL  STYLES -->
<!--PAGE CONTENT -->
      <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner"  style="min-height:400px;">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kirim Dokumentasi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo URL; ?>admin/SendDockView" method="POST"  enctype="multipart/form-data" >
								<div class="row">		
										
                                            		 <?php
													 $i=1;
															foreach ($this->ListImg as $key => $value){
																
															?>

											<div id="mexp">
											<a id="example5" href="#" ><img src="<?php echo URL.$value['img']; ?>" alt="" width="200px;" height="auto" /></a><br>
											<input type="checkbox" name="ch<?php echo $i;?>" value="<?php echo $value["img"];?>"> Kirim Gambar
											</div>
															<?php $i++;}?>
															<input type="hidden" class="form-control" id="ci" name="ci" required value="<?php echo $i;?>">
										</div>
                                        
                                        <div class="row">
									
											

											<div class="input-group col-lg-6">
											<label>Data Lokasi</label>
											<p><?php echo "<b>Kode Lokasi : </b>".$this->prolist["ProductCode"]."<br><b>Alamat  : </b>".$this->prolist["Address"]." - ".$this->prolist["Kota"]." - ".$this->prolist["NamaArea"]."<br><b>Klient : </b>".$this->prosinglekontrak["CustomerName"];?></p>
												
											</div>
										</div>
									
										<div class="row">
									
										<div class="form-group col-lg-5">
											<label>Tanggal Tayang</label>

											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tgltayang"  id="dp1" value="<?php
													$ttayang=explode("-",$this->Single["tgltayang"]);
													echo $ttayang[1]."/".$ttayang[2]."/".$ttayang[0];
												?>"/>
											</div>
										</div>
										
										<div class="form-group col-lg-5">
                                            <label>Tema</label>
                                            <input class="form-control" id="tema" name="tema" required value="<?php echo $this->Single["Tema"];?>">
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <label>Pemasang</label>
                                            <input class="form-control" id="pemasang" name="pemasang" value="<?php echo $this->Single["pemasang"];?>">
                                        </div>
										
										<div class="form-group col-lg-5" >
											<label>Tanggal Foto</label>

											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tglfoto"  id="dp2" value="<?php echo $this->Single["tglfoto"];?>">
												<input type="hidden" class="form-control " name="tglupload" value="<?php echo $this->Single["tglupload"];?>">
												<input type="hidden" class="form-control " name="nomateri" value="<?php echo $this->Single["ID"];?>">
												<input type="hidden" class="form-control " name="cid" value="<?php echo $this->Single["CustomerID"];?>"  />
												<input type="hidden" class="form-control " name="lokasi" value="<?php echo "Kode Lokasi : ".$this->prolist["ProductCode"]." |Alamat  : ".$this->prolist["Address"]." - ".$this->prolist["Kota"];?>"  />
											</div>
										</div>
										</div>
										
										<div class="row">
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Contact To Send</label><br>
											<?php
													 $x=1;
															foreach ($this->ListContact as $key => $value){
																
															?>

											
											<input type="checkbox" name="em<?php echo $x;?>" value="<?php echo $value["Email"];?>"> <?php
											echo $value["Name"]." [ ".$value["Email"]." ] ";
											$x++;
											}?>
														<input type="hidden" class="form-control" id="emx" name="emx" required value="<?php echo $x;?>">
										</div>
										</div>
										</div>
										
										
										<div class="row">
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Send As</label>
											
										 <?php
											foreach ($this->setsender as $key => $value){
												
												$print="<div class='checkbox'><input class='uniform' id='opt' name='opt'  type='radio' value='".$value["ID"]."'";
												$print=$print."> ".$value["name"]."</div>";
												echo $print;
											}
										?>	                      
											
										</div>
										</div>
										</div>
										
										<br>
										<div class="row">
										<div class="form-group">
										<div class="col-lg-6">
											<input type="submit" value="Kirim" class="btn btn-primary">
										</div>
                                        </div>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
                    </div>
                    
                    
                    

                </div>
            <!--END PAGE CONTENT -->
 

    <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  vistamedia &nbsp;2017 &nbsp;</p>
    </div>
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo URL;?>assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="<?php echo URL;?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo URL;?>assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

	
	<!-- PAGE LEVEL SCRIPT-->
 <script src="<?php echo URL;?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo URL;?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo URL;?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo URL;?>assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="<?php echo URL;?>assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo URL;?>assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo URL;?>assets/plugins/bootstrap-wysihtml5-hack.js"></script>
<script src="<?php echo URL;?>assets/js/editorInit.js"></script>
<script>
$(function () { formWysiwyg(); });
	$('#dp1').datepicker();
	$('#dp2').datepicker();
	$('#dp3').datepicker();
	$('.timepicker-24').timepicker({
        minuteStep: 1,
        showSeconds: true,
        showMeridian: false
    });
</script>
</body>

    <!-- END BODY -->
</html>
