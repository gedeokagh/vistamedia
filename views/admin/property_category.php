<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Daftar Property Category </h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<?php 
					
					if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=7")<>0){
							$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=7");
							
							if($lloc==1){?>
                        <div class="panel-heading">
                             <a href="AddCategory">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
					<?php }}?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
											<th>Edit</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->catlist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td  nowrap><?php echo $value['JenisID']; ?></td>
                                            <td  nowrap><?php echo $value['NamaJenis']; ?> (<?php echo $x = Code::GetField("product","Count(ID)","JenisID=".$value["JenisID"]);?>)</td>
											<td  nowrap>
											<?php 
											if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=7")<>0){
											$lloc=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=7");											
											if($lloc==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editCat/<?php echo $value['JenisID']; ?>"><i class="icon-check"></i></a>
											<?php }}
											if ($x==0){
												if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=7")<>0){
											$lloc=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=7");
											
											if($lloc==1){
											?>
											<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/CatDel/<?php echo $value['JenisID']; ?>"><i class="icon-remove"></i></a>
											<?php } } }?>
											</td>
											
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
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
