<?php
include('header.php');
include('menu.php');
?>
<link href="<?php echo URL;?>assets/plugins/dataTables/bottons.css" rel="stylesheet" />
<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Daftar Upload Dockumentasi </h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<?php
					if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=14")<>0){
							$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=14");
							
							if($lloc==1){?>
                        <div class="panel-heading">
                             <a href="<?php echo URL."admin/updock"?>">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
					<?php }}?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
										<tr>
                                            
                                            <th id="hheader" colspan="14"></th>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Lokasi</th>
											<th>Alamat</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Customer</th>
											<th>Tema Materi/
											Dokimentasi</th>
											<th>Tgl Tayang</th>
											<th>Tgl Pasang</th>
											<th>Pemasang</th>
											<th>Daftar Gambar</th>
											<th>Kirim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=14")<>0){
													$ladd=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=14");
									}
									if(Code::requery("usrprev","Kirim","IDUser='".Session::get('ID')."' and IDModule=14")<>0){
													$lsnd=Code::GetField("usrprev","Kirim","IDUser='".Session::get('ID')."' and IDModule=14");
									}
									foreach ($this->prolist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td  nowrap><?php echo $value['ID']; ?></td>
                                            <td  nowrap><?php echo $value['ProdCode']; ?></td>
											<td  nowrap><?php echo $value['Address']; ?></td>
											<td  nowrap><?php echo $value['Kota']; ?></td>
											<td  nowrap><?php echo $value['Area']; ?></td>
											<td  nowrap><?php echo $value['Customer']; ?></td>
											<td  nowrap><?php echo $value['Tema']; ?></td>
											<td  nowrap><?php echo $value['tgltayang']; ?></td>
											<td  nowrap><?php echo $value['tglfoto']; ?></td>
											<td  nowrap><?php echo $value['pemasang']; ?></td>
											<td  nowrap>
											<?php
													
													if($ladd==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/updockUimg/<?php echo $value['ID']; ?>"><i class="icon-picture"></i></a>
											<?php }?>
											</td>
											<td  nowrap>
											<?php
													
													if($lsnd==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/viewSenddock/<?php echo $value['ID']; ?>"><i class="icon-share"></i></a>
											<?php }?>
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

     <script  src="<?php echo URL;?>assets/plugins/dataTables/jquery.dataTables.js"></script>
	<script  src="<?php echo URL;?>assets/plugins/dataTables/dataTables.fixedHeader.min.js"></script>
	<script src="<?php echo URL;?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script  src="<?php echo URL;?>assets/plugins/dataTables/dataTables.buttons.min.js"></script>
	<script  src="<?php echo URL;?>assets/plugins/dataTables/jszip.min.js"></script>
	<script  src="<?php echo URL;?>assets/plugins/dataTables/buttons.html5.js"></script>

   
     <script>
         $(document).ready(function() {
		$('#example').DataTable( {
			dom: 'lBfrtip',
			buttons: [
				
				'excel'
			],

			initComplete: function () {
				this.api().columns(2).every( function () {
					var column = this;
					var title=$('<span>Kota : </span>').appendTo($('#hheader'));
					
					var select = $('<select ><option value=""></option></select>')
						.appendTo( $('#hheader'))
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );
					
					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
				this.api().columns(3).every( function () {
					var column = this;
					var title=$('<span> Area : </span>').appendTo($('#hheader'));
					var select = $('<select ><option value=""></option></select>')
						.appendTo( $("#hheader"))
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );
	} );
    </script>     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
