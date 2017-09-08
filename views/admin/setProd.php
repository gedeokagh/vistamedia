<?php
include('header.php');
include('menu.php');
?>


        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Harap Pilih Lokasi : </h1>
                    </div>
                </div>
                <hr />
					      <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Kode </th>
											<th>Alamat Lokasi</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Jenis</th>
											<th>Customer</th>
											<th>Awal Periode</th>
											<th>Akhir Periode</th>
											<th>Pilih Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->prolist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td  nowrap><a href="<?php echo URL;?>admin/setMailAdd/<?php echo $value["ID"]."%7C".$value['CustomerID']."%7C".$value['EndPeriode'];?>" ><?php echo $value['ProductCode']; ?></a></td>
                                            <td  nowrap><?php echo $value['Address']; ?></td>
											<td  nowrap><?php echo $value['Kota']; ?></td>
											<td  nowrap><?php echo $value['Area']; ?></td>
											<td  nowrap><?php echo $value['NamaJenis']; ?></td>
											<td  nowrap><?php echo $value['CustomerName']; ?></td>
											
											<td  nowrap><?php echo $value['StartPeriode']; ?></td>
											<td  nowrap><?php echo $value['EndPeriode']; ?></td>
											<td  nowrap><a href="<?php echo URL;?>admin/setMailAdd/<?php echo $value["ID"]."%7C".$value['CustomerID']."%7C".$value['EndPeriode'];?>" ><i class="icon-check"></i></a></td>
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

        </div>
        <!--END PAGE CONTENT -->

        
    </div>
	
          
    <!--END MAIN WRAPPER -->

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
