<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Daftar Perjanjian Sewa Lahan</h2>
					


                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a href="<?php echo URL;?>admin/SewaAdd">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>No.Perjanjian</th>
											<th>Tanggal</th>
											<th>Product</th>
											<th>Harga</th>
											<th>Periode</th>
											<th>Contact Person</th>
											<th>No.KTP</th>
											<th>No.Telp/HP</th>
											<th>Note</th>
											<th>Edit</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->SewaList as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            
                                            <td><?php echo $value['NoPerjanjian']; ?></td>
											<td><?php echo $value['Tanggal']; ?></td>
											<td><?php echo  Code::GetField("product","ProductCode","ID=".$value['ProductID']);?></td>
											<td><?php echo number_format($value['Harga']); ?></td>
											<td><?php echo $value['StartPeriode']; ?> s/d <?php echo $value['EndPeriode']; ?></td>
											<td><?php echo $value['Kontak']; ?></td>
											<td><?php echo $value['NoKTP']; ?></td>
											<td><?php echo $value['NoHP']; ?></td>
											<td><?php echo $value['Note']; ?></td>
											<td><a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editSewa/<?php echo $value['ID']; ?>"><i class="icon-check"></i></a></td>
											
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
