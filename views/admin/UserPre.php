<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
					<h2> Hak Akses User [ <?php echo $this->aName;?> ]</h2>
                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a href="<?php echo URL."admin/UserList"?>">[ <i class="icon-arrow-left"></i> Back ]</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="<?php echo URL; ?>admin/SavePre" method="POST">
									
									<?php 
									foreach($this->usrList as $list){
										?>
										<?php
										if ($list["IDM"]<6){
										?>
                                        <div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
						
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-del';?>" <?php if($list["Void"]==1){ echo "checked";}?>/>Remove / Void
                                            </label>
						
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-img';?>" <?php if($list["AddIMG"]==1){ echo "checked";}?>/>Add Images
                                            </label>
                                        </div>
									<?php }
									if (($list["IDM"]==6 ) || ($list["IDM"]==7 )){
										?>
										<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-del';?>" <?php if($list["Void"]==1){ echo "checked";}?>/>Remove / Void
                                            </label>
                                        </div>
									<?php }
									
										if ($list["IDM"]==8){
										?>
										<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-del';?>" <?php if($list["Void"]==1){ echo "checked";}?>/>Remove / Void
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-img';?>" <?php if($list["AddIMG"]==1){ echo "checked";}?>/>Add Images
                                            </label>
                                        </div>
									<?php }
										if ($list["IDM"]==9){
											?>
											<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-del';?>" <?php if($list["Void"]==1){ echo "checked";}?>/>Remove / Void
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-snd';?>" <?php if($list["Kirim"]==1){ echo "checked";}?>/>Send
                                            </label>
											
                                        
                                        </div>
									<?php 
										}
										if ($list["IDM"]==10){
											?>
											<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-del';?>" <?php if($list["Void"]==1){ echo "checked";}?>/>Remove / Void
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-snd';?>" <?php if($list["Kirim"]==1){ echo "checked";}?>/>Cetak Laporan
                                            </label>
                                        </div>
									<?php 
										}
										if ($list["IDM"]==11){
											?>
											<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-del';?>" <?php if($list["Void"]==1){ echo "checked";}?>/>Remove / Void
                                            </label>
											
                                        </div>
									<?php 
										}
										if ($list["IDM"]==12){
											?>
											<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-snd';?>" <?php if($list["Kirim"]==1){ echo "checked";}?>/>Add & See Contact Person
                                            </label>
                                        </div>
									<?php 
										}
										if ($list["IDM"]==13){
										?>
										<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-edt';?>" <?php if($list["Changes"]==1){ echo "checked";}?>/>Edit
                                            </label>
											
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-img';?>" <?php if($list["AddIMG"]==1){ echo "checked";}?>/>Reset Password
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-snd';?>" <?php if($list["Kirim"]==1){ echo "checked";}?>/>User Priveleges
                                            </label>
                                        </div>
									<?php }
									if ($list["IDM"]==14){
										?>
										<div class="form-group">
                                            <label><?php echo $list["Mname"];?></label><br>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="" name="<?php echo $list['IDM'].'-lst';?>" <?php if($list["list"]==1){ echo "checked";}?> />View List
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-add';?>" <?php if($list["AddNew"]==1){ echo "checked";}?>/>Add New
                                            </label>
											<label class="checkbox-inline">
                                                <input type="checkbox" name="<?php echo $list['IDM'].'-snd';?>" <?php if($list["Kirim"]==1){ echo "checked";}?>/>Send Documentasi
                                            </label>
                                        </div>
									<?php }
									}
									?>
										<input type="hidden" id="id" name="id" value="<?php echo $this->id;?>">
										<input type="hidden" id="total" name="total" value="<?php echo $this->total;?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
										
                                    </form>
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

    

        <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?php echo URL;?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo URL;?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
