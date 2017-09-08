<?php
include('header.php');
include('menu.php');
?>
<link href="<?php echo URL;?>assets/plugins/dataTables/bottons.css" rel="stylesheet" />

        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1> Admin Dashboard </h1>
                    </div>
                </div>
               
                  <!--END BLOCK SECTION -->
                <hr />
					      <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
									<tr>
                                            
                                            <th id="hheader" colspan="14"></th>
                                        </tr>
                                        <tr>
                                            
                                            <th nowrap>Kode </th>
											<th nowrap>Alamat Lokasi </th>
											<th nowrap>Kota</th>
											<th nowrap>Area &nbsp; &nbsp; &nbsp;</th>
											<th nowrap>Jenis &nbsp; </th>
											<th nowrap>Penerangan &nbsp; &nbsp; &nbsp;</th>
											<th nowrap>Side</th>
											<th nowrap>Qty</th>
											<th nowrap>Size</th>
											<th nowrap>Customer</th>
											<th nowrap>No.Kontrak</th>
											<th nowrap>Awal Periode </th>
											<th nowrap>Akhir Periode </th>
											<th nowrap>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->prolist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td nowrap><a href="<?php echo URL;?>admin/ProductView/<?php echo $value["ID"];?>" target="blank"><?php echo $value['ProductCode']; ?></a></td>
                                            <td nowrap><?php echo $value['Address']; ?></td>
											<td nowrap><?php echo $value['Kota']; ?></td>
											<td nowrap><?php echo $value['Area']; ?></td>
											<td nowrap><?php echo $value['NamaJenis']; ?></td>
											<td nowrap><?php switch($value['Penerangan']){
												case 'N' : echo "No-Light"; break;
												case 'B' : echo "Back Light"; break;
												case 'F' : echo "Front Light"; break;
											} 
											?></td>
											<td nowrap><?php echo $value['Side']; ?></td>
											<td nowrap><?php echo $value['Jumlah']; ?></td>
											<td nowrap><?php echo $value['Ukuran']; ?> - <?php echo $value['Orientasi']; ?></td>
											<td nowrap><?php echo $value['CustomerName']; ?></td>
											<td nowrap><?php echo $value['NoKontrak']; ?></td>
											<td nowrap><?php echo $value['StartPeriode'];
											?></td>
											<td nowrap><?php echo $value['EndPeriode'];
											?></td>
											<td nowrap><?php echo number_format($value['Nilai']); ?></td>
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
					
					var select = $('<select id="ckota" ><option value=""></option></select>')
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
					var select = $('<select id="carea"><option value=""></option></select>')
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
	$('#hheader').append('<a class="dfl btn btn-primary btn-circle" id="dfl" href="#"  ><i class="icon-fullscreen"></i></a> &nbsp; &nbsp;');
	$('.dfl').click(function(){ 	
		var ck=$('#ckota').val();
		var ca=$('#carea').val();
		
		//window.open('','_blank');
		var vlink=document.createElement('a');
		vlink.href='<?php echo URL."admin/cindex/";?>'+ck+'-'+ca;
		vlink.target="_blank";
		document.body.appendChild(vlink);
		vlink.click();
		vlink.parentNode.removeChild(vlink);
	});
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
