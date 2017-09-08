<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Daftar Contact <?php echo  Code::GetField("customer","CustomerName","CustomerID=".$this->id);?> </h2>
					


                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					
                        <div class="panel-heading">
                             <a href="<?php echo URL;?>admin/ContactAdd/<?php echo $this->id;?>">[ <i class="icon-plus"></i> Add New ]</a> <a href="<?php echo URL;?>admin/CustomerList/">[ <i class="icon-back"></i> back ]</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th nowrap>ID </th>
											<th nowrap>Name</th>
											<th nowrap>Address</th>
											<th nowrap>Phone</th>
											<th nowrap>Email</th>
											<th nowrap>Report Recieve's</th>
											<th nowrap>Edit</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->contactlist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td nowrap><?php echo $value['id']; ?></td>
                                            <td nowrap><?php echo $value['Name']; ?></td>
											<td nowrap><?php echo $value['Address']; ?></td>
											<td nowrap><?php echo $value['Phone']; ?></td>
											<td nowrap><?php echo $value['Email']; ?></td>
											<td nowrap><?php if($value['recieve']){ echo "Yes";}else{ echo "No";}; ?></td>
											<td nowrap><a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editContact/<?php echo $value['CustomerID']; ?>-<?php echo $value['id']; ?>"><i class="icon-check"></i></a></td>
											
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
