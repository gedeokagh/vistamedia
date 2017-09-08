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
    <!-- END PAGE LEVEL  STYLES -->
<!--PAGE CONTENT -->
      <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update IMBR</h1>
					<small>[ 
					<?php
					
					if(isset($this->sts)){?>
					<a href="<?php echo URL;?>admin/ListIjin/<?php echo $this->IMBRSingle["ProductID"]."-".$this->sts;?>"><< Back</a> 
					<?php
					}else{
						?>
					<a href="<?php echo URL;?>admin/IMBRList"><< Back</a> 
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
                                    <form role="form" action="<?php echo URL; ?>admin/UpdIMBR/<?php echo $this->idx;?>" method="POST"  enctype="multipart/form-data" >
                                        
										<div class="form-group">
                                            <label>No.IMBR</label>
                                            <input class="form-control" id="no" name="no" value=<?php echo $this->IMBRSingle["NoIjin"];?> required>
                                        </div>
										<div class="form-group">
                                            <label>Product</label>
                                               <select class="form-control chzn-select" id="prod" name="prod">
											<?php foreach ($this->propertylist as $key => $value) {?>
                                                <option <?php if($this->IMBRSingle["ProductID"]==$value["ID"]){ echo "selected";};?> value="<?php echo $value["ID"];?>"><?php echo $value["ProductCode"];?> | <?php echo $value["Address"];?></option>
											<?php }?>
                                            </select>
                                        </div>
										<div class="form-group">
											<label>Tanggal</label>

											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="tanggal" value=<?php $tanggal=explode("-",$this->IMBRSingle["Tanggal"]); echo $tanggal[1]."/".$tanggal[2]."/".$tanggal[0];?> id="dp1" />
											</div>
										</div>
										<div class="form-group">
                                            <label>Periode</label>
                                            <div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="start" value=<?php $tanggal=explode("-",$this->IMBRSingle["StartPeriode"]); echo $tanggal[1]."/".$tanggal[2]."/".$tanggal[0];?> id="dp2" />
											</div><br> s/d <br>
											<div class="input-group">
											<span class="input-group-addon"><i class="icon-calendar"></i></span>
												<input type="text" class="form-control " name="end" value=<?php $tanggal=explode("-",$this->IMBRSingle["EndPeriode"]); echo $tanggal[1]."/".$tanggal[2]."/".$tanggal[0];?> id="dp3" />
											</div>
                                        </div>
										<div class="form-group">
                                            <label>Note</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="note" name="note"><?php echo $this->IMBRSingle["Ket"];?></textarea>
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
