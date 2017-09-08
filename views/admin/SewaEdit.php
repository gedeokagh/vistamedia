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
                    <h1 class="page-header">Update Data Perjanjian Sewa Lahan</h1>
					<small>[ 
					<?php					
					if(isset($this->sts)){?>
					<a href="<?php echo URL;?>admin/dtlSewa/<?php echo $this->SewaSingle["ProductID"]."-".$this->sts;?>"><< Back</a> 
					<?php
					}else{
						?>
					<a href="<?php echo URL;?>admin/SewaList"><< Back</a> 
					<?php
					}
					?>
					]</small>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo URL; ?>admin/UpdSewa/<?php echo $this->SewaSingle["ID"];?>-L" method="POST"  enctype="multipart/form-data" >
                                        
										<div class="form-group">
                                            <label>No.Perjanjian</label>
                                            <input class="form-control" id="no" name="no" value=<?php echo $this->SewaSingle["NoPerjanjian"];?> required>
                                        </div>
										<div class="form-group">
                                            <label>Product</label>
                                               <select class="form-control chzn-select" id="prod" name="prod">
											<?php foreach ($this->propertylist as $key => $value) {?>
                                                <option <?php if($this->SewaSingle["ProductID"]==$value["ID"]){ echo "selected";};?> value="<?php echo $value["ID"];?>"><?php echo $value["ProductCode"];?> | <?php echo $value["Address"];?></option>
											<?php }?>
                                            </select>
                                        </div>
										
										<div class="form-group">
											<label>Tanggal</label>
											
											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tanggal" value=<?php $tanggal=explode("-",$this->SewaSingle["Tanggal"]); echo $tanggal[1]."/".$tanggal[2]."/".$tanggal[0];?> id="dp1" />
											</div>
										</div>
										
										<div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" id="harga" name="harga" value="<?php echo $this->SewaSingle["Harga"];?>">
                                        </div>
										
										<div class="form-group">
                                            <label>Contact Person</label>
                                            <input class="form-control" id="kontak" name="kontak" value="<?php echo $this->SewaSingle["Kontak"];?>">
                                        </div>
										
										<div class="form-group">
                                            <label>No.ID/KTP</label>
                                            <input class="form-control" id="ktp" name="ktp" value="<?php echo $this->SewaSingle["NoKTP"];?>">
                                        </div>
										
										<div class="form-group">
                                            <label>No.Telp/HP</label>
                                            <input class="form-control" id="hp" name="hp" value="<?php echo $this->SewaSingle["NoHP"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Periode</label>
                                            <div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="start" value=<?php $tanggal=explode("-",$this->SewaSingle["StartPeriode"]); echo $tanggal[1]."/".$tanggal[2]."/".$tanggal[0];?> id="dp2" />
											</div><br> s/d <br>
											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="end" value=<?php $tanggal=explode("-",$this->SewaSingle["EndPeriode"]); echo $tanggal[1]."/".$tanggal[2]."/".$tanggal[0];?> id="dp2" />
											</div>
                                        </div>
										<div class="form-group">
                                            <label>Note</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="note" name="note"><?php echo $this->SewaSingle["Note"];?></textarea>
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
