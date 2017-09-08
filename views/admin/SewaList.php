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


                        <h2> Daftar Perjanjian Sewa Lahan</h2>
					


                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<?php 
						if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
						$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=4");											
						if($lloc==1){?>
                        <div class="panel-heading">
                             <a href="<?php echo URL;?>admin/SewaAdd">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
						<?php }}?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
										<tr>
										  <th id="hheader" colspan="20"> </th>
										</tr>
                                        <tr>
                                            <th>Kode </th>
											<th>Alamat Lokasi</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Jenis</th>
											<th>Penerangan</th>
											<th>Side</th>
											<th>Qty</th>
											<th>Size</th>
                                            <th>No.Perjanjian</th>
											<th>Tanggal</th>
											<th>Harga</th>
											<th>Awal Periode</th>
											<th>Akhir Periode</th>
											<th>Contact Person</th>
											<th>No.KTP</th>
											<th>No.Telp/HP</th>
											<th>Note</th>
											<th>Dockument</th>
											<th>Edit</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if(Code::requery("usrprev","AddIMG","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
											$lloc=Code::GetField("usrprev","AddIMG","IDUser='".Session::get('ID')."' and IDModule=4");											
									}
									if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
											$chgs=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=4");											
									}
									if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
											$void=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=4");											
									}
									foreach ($this->SewaList as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td  nowrap><a href="<?php echo URL;?>admin/ProductView/<?php echo $value["ProductID"];?>" target="blank"><?php echo $value['ProductCode']; ?></a></td>
                                            <td  nowrap><?php echo $value['Address']; ?></td>
											<td  nowrap><?php echo $value['Kota']; ?></td>
											<td  nowrap><?php echo $value['Area']; ?></td>
											<td  nowrap><?php echo $value['NamaJenis']; ?></td>
											<td  nowrap><?php switch($value['Penerangan']){
												case 'N' : echo "No-Light"; break;
												case 'B' : echo "Back Light"; break;
												case 'F' : echo "Front Light"; break;
												case 'L' : echo "LED Light"; break;
											} 
											?></td>
											<td  nowrap><?php echo $value['Side']; ?></td>
											<td  nowrap><?php echo $value['Jumlah']; ?></td>
											<td  nowrap><?php echo $value['Ukuran']; ?> - <?php echo $value['Orientasi']; ?></td>
                                            <td  nowrap><?php echo $value['NoPerjanjian']; ?></td>
											<td  nowrap><?php echo $value['Tanggal']; ?></td>
											<td  nowrap><?php echo number_format($value['Harga']); ?></td>
											<td  nowrap><?php echo $value['StartPeriode']; ?></td>
											<td  nowrap><?php echo $value['EndPeriode']; ?></td>
											<td  nowrap><?php echo $value['Kontak']; ?></td>
											<td  nowrap><?php echo $value['NoKTP']; ?></td>
											<td  nowrap><?php echo $value['NoHP']; ?></td>
											<td  nowrap><?php echo $value['Note']; ?></td>
											<td  nowrap><?php
											if($value["NoPerjanjian"]!=""){ 
											
											if($lloc==1){?><a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/UploadImgSewa/<?php echo $value["ID"];?>"><i class="icon-check"></i></a>
											<?php }}	?></td>	
											<td  nowrap>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/dtlSewa/<?php echo $value['ProductID']; ?>-L"><i class="icon-list"></i></a>
											<?php if($value["NoPerjanjian"]!=""){ 
											if($chgs==1){?> 
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editSewa/<?php echo $value['ID']; ?>"><i class="icon-check"></i></a>
											<?php }
											if($void==1){?>
											<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/DeleteSewa/<?php echo $value['ID']; ?>"><i class="icon-remove"></i></a>
											<?php }
											}?></td>
											
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
		vlink.href='<?php echo URL."admin/cSewaList/";?>'+ck+'-'+ca;
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
