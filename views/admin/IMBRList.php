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


                        <h2> Daftar IMBR</h2>
					

                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<?php 
						if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=3")<>0){
						$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=3");											
						if($lloc==1){?>
                        <div class="panel-heading">
                             <a href="<?php echo URL;?>admin/IMBRAdd">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
						<?php }}?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="example">
                                    <thead>
										<tr>
										  <th id="hheader" colspan="15"> </th>
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
                                            <th>No.Ijin</th>
											<th>Tanggal</th>
											<th>Periode</th>
											<th>Keterangan</th>
											<th>Document</th>
											<th>Edit</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if(Code::requery("usrprev","AddIMG","IDUser='".Session::get('ID')."' and IDModule=3")<>0){
											$aImg=Code::GetField("usrprev","AddIMG","IDUser='".Session::get('ID')."' and IDModule=3");											
									}
									if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=3")<>0){
											$lloc=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=3");											
									}
									if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=3")<>0){
											$void=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=3");											
									}
									foreach ($this->IMBRList as $key => $value) {
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
                                            <td  nowrap><?php echo $value['NoIjin']; ?></td>
											<td  nowrap><?php echo $value['Tanggal']; ?></td>
											<td  nowrap><?php echo $value['StartPeriode']; ?> s/d <?php echo $value['EndPeriode']; ?></td>
											<td  nowrap><?php echo $value['Ket']; ?></td>
											<td  nowrap><?php if($value['NoIjin']!=""){
											
											if($aImg==1){?>
									<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/UploadImgPrinsip/<?php echo $value['ID']; ?>"><i class="icon-picture"></i></a><?php }}?></td>
											
											<td  nowrap>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/ListIjin/<?php echo $value['ProductID']; ?>-3"><i class="icon-list"></i></a><?php if($value['NoIjin']!=""){
											if($lloc==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editIMBR/<?php echo $value['ID']; ?>"><i class="icon-check"></i></a><?php 
											}
											if($void==1){?>
											<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/DeleteIMBR/<?php echo $value['ID']; ?>"><i class="icon-remove"></i></a><?php 
											}
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
		vlink.href='<?php echo URL."admin/cIMBRList/";?>'+ck+'-'+ca;
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
