﻿<?php
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
                    <h1 class="page-header">Kirim Ulang/Re-Send user demo:</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo URL; ?>admin/Updkirimlokasi" method="POST"  enctype="multipart/form-data" >
										<div class="form-group">
										<div class="col-lg-12" style="padding:5px;">
                                            		 <?php
													 $i=1;
															foreach ($this->freeProperty as $key => $value){
																$pos=strpos($this->Single[0]["list"],$value["ID"]);
															?>

											<div id="mexp">
											<a id="example5" href="#" ><img src="<?php echo URL.$value['img']; ?>" alt="" width="200px;" height="auto" /></a><br>
											<input type="checkbox" name="ch<?php echo $i;?>" value="<?php echo $value["ID"];?>" <?php if($pos == true){ echo "Checked";}?> > <?php echo $value["ProductCode"];?><br><?php echo $value["Address"];?>
											</div>
															<?php $i++;}?>
															<input type="hidden" class="form-control" id="ci" name="ci" required value="<?php echo $i;?>">
										</div>
                                        </div>
                                        
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Username</label>
                                            <input class="form-control" id="user" name="user" required value="<?php echo $this->Single[0]["Username"];?>">
											<input type="hidden" class="form-control" id="ID" name="ID" required value="<?php echo $this->Single[0]["ID"];?>">
										</div>
                                        </div>
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Password</label>
                                            <input class="form-control" id="pass" name="pass" required value="<?php echo $this->Single[0]["Password"];?>">
										</div>
                                        </div>
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Email Tujuan</label>
                                            <input class="form-control" id="mailto" name="mailto" required value="<?php echo $this->Single[0]["send"];?>">
										</div>
                                        </div>
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Subject</label>
                                            <input class="form-control" id="subject" name="subject" required value="<?php echo $this->Single[0]["subject"];?>">
										</div>
                                        </div>
										<div class="form-group">
										<div class="col-lg-6">
											<label>Tanggal Kadaluarsa</label>

											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tanggal"  id="dp1" value="<?php $date=explode("-",$this->Single[0]["expireDate"]);
												echo $date[1]."/".$date[2]."/".$date[0];
												;?>" />
											</div>
										</div>
										</div>
										<div class="form-group">
										<div class="col-lg-6">
											<label>Jam</label>

											<div class="input-group  bootstrap-timepicker">
											<input class="timepicker-24 form-control" name="time" type="text" value="<?php echo $this->Single[0]["expiretime"];?>"/>
													<span class="input-group-addon add-on"><i class="icon-time"></i>
											</div>
											 
										</div>
										</div>
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Note</label>
                                            <textarea  class="form-control" rows="5" id="note" name="note"><?php echo $this->Single[0]["Note"];?></textarea>
										</div>
										<div class="form-group">
										<div class="col-lg-6">
                                            <label>Send As</label>
											
										 <?php
											foreach ($this->setsender as $key => $value){
												$pox=strpos($this->Single[0]["sender"],$value["ID"]);
												$print="<div class='checkbox'><input class='uniform' id='opt' name='opt'  type='radio' value='".$value["ID"]."'";
												if(isset($pox) || $pox<>""){ $print=$print." checked='checked' ";}
												$print=$print."> ".$value["name"]."</div>";
												echo $print;
											}
										?>	                      
											
										
										
										<br>
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
