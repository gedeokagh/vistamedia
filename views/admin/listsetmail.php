<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
					<h2>Daftar Report Otomatis </h2>
					</div>
					
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<?php 
						if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=11")<>0){
						$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=11");											
						if($lloc==1){?>
                        <div class="panel-heading">
                             <a href="<?php echo URL."admin/setMailList"?>">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
						<?php }}?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Lokasi</th>
											<th>Alamat</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Customer</th>
											<th>TglKirim</th>
											<th>Penerima</th>
											<th>Pengirim</th>
											<th>LastSend</th>
											<th> &nbsp; &nbsp; &nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<div id="list">
									<?php
									foreach ($this->prolist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            <td  nowrap><?php echo $value['ID']; ?></td>
                                            <td  nowrap><a href="<?php echo URL."admin/ProductView/".$value['ProductID'];?>" target="Blank"><?php echo Code::GetField("product","ProductCode","ID=".$value['ProductID']); ?></a></td>
											<td  nowrap><?php echo Code::GetField("product","Address","ID=".$value['ProductID']); ?></td>
											<td  nowrap><?php echo Code::GetField("product","Kota","ID=".$value['ProductID']); ?></td>
											<td  nowrap><?php 
											$areaid=Code::GetField("product","AreaID","ID=".$value['ProductID']);
											echo Code::GetField("area","NamaArea","ID=".$areaid); ?></td>
											<td  nowrap><?php echo Code::GetField("customer","CustomerName","CustomerID=".$value['CustomerID']); ?></td>
											<td  nowrap><?php 
											$tgl=str_replace("|",",",$value['Date']) ;
											echo $tgl;
											 ?></td>
											<td  nowrap><?php echo Code::GetRecieve($value["CustomerID"]); ?></td>
											<td  nowrap><?php $data=explode("-",$value['Sender']); echo $data[1]; ?></td>
											
											<td  nowrap><?php echo $value['LastSend']; ?></td>
											<td  nowrap>
											<?php 
											if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=11")<>0){
											$lloc=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=11");											
											if($lloc==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/reportEdit/<?php echo $value['ID']; ?>"><i class="icon-edit"></i></a>
											<?php 
											}}
											if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=11")<>0){
											$lloc=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=11");											
											if($lloc==1){?>
											&nbsp;
											<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/reportDel/<?php echo $value['ID']; ?>"><i class="icon-remove"></i></a>
											<?php }}?></td>
                                        </tr>
									<?php }?>
									</div>
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
		 
	
	$('.filter').click(function(){
		//alert("test");
		var bln=$("#bulan").val();
		var thn=$("#tahun").val();
		if(thn===""){ alert("Harap Masukkan Tahun Filter"); exit();}
		$.post("./rptfilter",{bln:bln,thn:thn},function(x){
        $('table tbody tr').remove();
		$('table tbody').append(x);
		});
	return false;
	});
	 
	
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
