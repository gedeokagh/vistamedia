<?php
include('header.php');
include('menu.php');
?>
	<link<!-- PAGE LEVEL STYLES -->
    
 <link href="<?php echo URL;?>assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/Font-Awesome/css/font-awesome.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap-wysihtml5-hack.css" />
<link rel="stylesheet" href="<?php echo URL;?>assets/plugins/chosen/chosen.min.css" />
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
                    <h1 class="page-header">Add New Perjanjian Sewa Lahan</h1>
					<small>[ <a href="<?php echo URL;?>admin/SewaList"><< Back</a> ]</small>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo URL; ?>admin/saveSewa" method="POST"  enctype="multipart/form-data" >
                                        
										<div class="form-group">
                                            <label>No.Perjanjian</label>
                                            <input class="form-control" id="no" name="no" required>
											<input type="hidden" value="<?php echo Code::random_string();?>" id="id" name="id">
                                        </div>
										<div class="form-group">
                                            <label>Product</label><br>
											<input type="hidden" value="<?php echo $this->propertylist["ID"];?>" id="prod" name="prod">
											<?php echo $this->propertylist["ProductCode"];?> | <?php echo $this->propertylist["Address"];?>
                                            
                                        </div>
										
										<div class="form-group">
											<label>Tanggal</label>

											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tanggal"  id="dp1" />
											</div>
										</div>
										
										<div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" id="nilai" name="nilai">
                                        </div>
										<div class="form-group">
                                            <label>Periode</label>
                                            <div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="start"  id="dp2" />
											</div><br> s/d <br>
											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="end" id="dp3" />
											</div>
                                        </div>
										<div class="form-group">
                                            <label>Contact Person</label>
                                            <input class="form-control" id="kontak" name="kontak">
                                        </div>
										<div class="form-group">
                                            <label>No.ID/KTP</label>
                                            <input class="form-control" id="ktp" name="ktp">
                                        </div>
										<div class="form-group">
                                            <label>No.Telp/HP</label>
                                            <input class="form-control" id="hp" name="hp">
                                        </div>
										
										<div class="form-group">
                                            <label>Note</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="note" name="note"></textarea>
                                        </div>
										
										<br>
                                       <input type="submit" value="Submit" class="btn btn-primary">
                                        
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
<script src="<?php echo URL;?>assets/plugins/chosen/chosen.jquery.min.js"></script>
<script>
$(function () { formWysiwyg(); });
$(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });
	$('#dp1').datepicker();
	$('#dp2').datepicker();
	$('#dp3').datepicker();
</script>
</body>

    <!-- END BODY -->
</html>
