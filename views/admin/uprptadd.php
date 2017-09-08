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
<style>
	ul.wysihtml5-toolbar > li {
		position: relative;
	}
</style>   
    <!-- END PAGE LEVEL  STYLES -->
<!--PAGE CONTENT -->
      <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Laporan Bulanan</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
								<?php $nums=Code::random_string();?>
                                    <form role="form" action="<?php echo URL; ?>admin/uprptimg/<?php echo $nums."-".$this->prolist["ID"];?>" method="POST"  enctype="multipart/form-data" >
                                        <div class="form-group">
											<label>Data Lokasi</label>

											<div class="input-group">
											<p><?php echo "<b>Kode Lokasi : </b>".$this->prolist["ProductCode"]."<br><b>Alamat  : </b>".$this->prolist["Address"]." - ".$this->prolist["Kota"]." - ".$this->prolist["NamaArea"];?></p>
												
											</div>
										</div>
										<div class="form-group">
											<label>Bulan</label>

											<div class="input-group">
											
												<select class="form-control " name="bulan" id="bulan">
												<option value="01">Januari</option>
												<option value="02">Februari</option>
												<option value="03">Maret</option>
												<option value="04">April</option>
												<option value="05">Mei</option>
												<option value="06">Juni</option>
												<option value="07">Juli</option>
												<option value="08">Agustus</option>
												<option value="09">September</option>
												<option value="10">Oktober</option>
												<option value="11">Novenber</option>
												<option value="12">December</option>
												</select>
											</div>
										</div>
										
										<div class="form-group">
                                            <label>Tahun</label>
                                            <input class="form-control" id="tahun" name="tahun" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Note</label>
                                            
											<textarea class="form-control" id="note" name="note"></textarea>
                                        </div>
										
										<div class="form-group">
											<label>Tanggal Foto</label>

											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tglfoto"  id="dp2" required/>
												<input type="hidden" class="form-control " name="tglupload" value="<?php echo date("Y-m-d");?>"  />
												<input type="hidden" class="form-control " name="nomateri" value="<?php echo $nums;?>"  />
												<input type="hidden" class="form-control " name="cid" value="<?php echo $this->prolist["CustomerID"];?>"  />
											</div>
										</div>
										
										<br>
                                       <input type="submit" value="Upload" class="btn btn-primary">
                                        
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
<script src="<?php echo URL;?>assets/plugins/bootstrap-wysihtml5-hack.js"></script>
<script src="<?php echo URL;?>assets/js/editorInit.js"></script>
<script>
$(function () { formWysiwyg(); });
	$('#dp1').datepicker();
	$('#dp2').datepicker();
	$('#dp3').datepicker();
</script>
</body>

    <!-- END BODY -->
</html>
