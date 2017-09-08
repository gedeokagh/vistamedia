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
			 height:250px;
		 }
</style>   
    <!-- END PAGE LEVEL  STYLES -->
<!--PAGE CONTENT -->
      <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner"  style="min-height:400px;">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pilih Lokasi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo URL; ?>admin/listPDF" method="POST"  enctype="multipart/form-data" >
										<div class="form-group">
										<div class="col-lg-12" ">
                                            		 <?php
													 $i=1;
															foreach ($this->freeProperty as $key => $value){
															?>

											<div id="mexp" class="col-lg-3">
											<a id="example5" href="#" ><img src="<?php echo URL.$value['img']; ?>" alt="" width="200px;" height="auto" /></a><br>
											<input type="checkbox" name="ch<?php echo $i;?>" value="<?php echo $value["ID"];?>"><?php echo $value["ProductCode"];?><br><?php echo $value["Address"];?>
											</div>
															<?php $i++;}?>
															<input type="hidden" class="form-control" id="ci" name="ci" required value="<?php echo $i;?>">
										</div>
                                        </div>
                                        
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
