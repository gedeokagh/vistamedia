<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
					<h2> Daftar Laporan Bulanan </h2>
					</div>
					
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
					<?php 
						if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
						$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=10");											
						if($lloc==1){?>
                        <div class="panel-heading">
                             <a href="<?php echo URL."admin/uprpt"?>">[ <i class="icon-plus"></i> Add New ]</a>
                        </div>
						<?php }}?>
						<div class="panel-heading">
                            <form id='myform' name="myform" action="" Method="GET"> 
                                        <div class="col-sm-3">
										<div class="form-group">
											<label>Bulan</label>
											
												<select class="form-control " name="bulan" id="bulan">
												<option value="01"<?php if ((isset($this->bln))&& ($this->bln=="01")){ echo "selected";}?>>Januari</option>
												<option value="02"<?php if ((isset($this->bln))&& ($this->bln=="02")){ echo "selected";}?>>Februari</option>
												<option value="03"<?php if ((isset($this->bln))&& ($this->bln=="03")){ echo "selected";}?>>Maret</option>
												<option value="04"<?php if ((isset($this->bln))&& ($this->bln=="04")){ echo "selected";}?>>April</option>
												<option value="05"<?php if ((isset($this->bln))&& ($this->bln=="05")){ echo "selected";}?>>Mei</option>
												<option value="06"<?php if ((isset($this->bln))&& ($this->bln=="06")){ echo "selected";}?>>Juni</option>
												<option value="07"<?php if ((isset($this->bln))&& ($this->bln=="07")){ echo "selected";}?>>Juli</option>
												<option value="08"<?php if ((isset($this->bln))&& ($this->bln=="08")){ echo "selected";}?>>Agustus</option>
												<option value="09"<?php if ((isset($this->bln))&& ($this->bln=="09")){ echo "selected";}?>>September</option>
												<option value="10"<?php if ((isset($this->bln))&& ($this->bln=="10")){ echo "selected";}?>>Oktober</option>
												<option value="11"<?php if ((isset($this->bln))&& ($this->bln=="11")){ echo "selected";}?>>Novenber</option>
												<option value="12"<?php if ((isset($this->bln))&& ($this->bln=="12")){ echo "selected";}?>>December</option>
												</select>
											
										</div>
										</div>
										<div class="col-sm-3">
										<div class="form-group">
                                            <label>Tahun</label>
											
                                            <input class="form-control" id="tahun" name="tahun" value="<?php if (isset($this->thn)){ echo $this->thn;}?>">
											
                                        </div>
										</div>
										<br>
                                       
                                        <a class="filter btn btn-success" id="filter" href="#"  > Filter </a>
                            </form> 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							<div id="list">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            
                                            <th>Kode Lokasi</th>
											<th>Alamat</th>
											<th>Kota</th>
											<th>Area</th>
											<th>Customer</th>
											<th>Bulan</th>
											<th>Tahun</th>
											<th>Tgl Foto</th>
											<th>Note</th>
											<th>Daftar Gambar</th>
											<th> &nbsp; &nbsp; &nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
									if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
											$ledt=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=10");					
									}
									if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
											$ldel=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=10");					
									}
									foreach ($this->prolist as $key => $value) {
										?>
                                        <tr class="odd gradeX">
                                            
                                            <td  nowrap><a href="<?php echo URL."admin/ProductView/".$value['ProductID'];?>" target="Blank"><?php echo Code::GetField("product","ProductCode","ID=".$value['ProductID']); ?></a></td>
											<td  nowrap><?php echo Code::GetField("product","Address","ID=".$value['ProductID']); ?></td>
											<td  nowrap><?php echo Code::GetField("product","Kota","ID=".$value['ProductID']); ?></td>
											<td  nowrap><?php 
											$areaid=Code::GetField("product","AreaID","ID=".$value['ProductID']);
											echo Code::GetField("area","NamaArea","ID=".$areaid); ?></td>
											<td  nowrap><?php 
											if(Code::requery("customer","CustomerName","CustomerID=".$value['CustomerID'])!=0){
											echo Code::GetField("customer","CustomerName","CustomerID=".$value['CustomerID']); }
											?></td>
											<td  nowrap><?php 
											switch ($value['Bulan']){
											case "01": echo "Januari";break;
											case "02": echo "Februari";break;
											case "03": echo "Maret";break;
											case "04": echo "April";break;
											case "05": echo "Mei";break;
											case "06": echo "Juni";break;
											case "07": echo "Juli";break;
											case "08": echo "Agustus";break;
											case "09": echo "September";break;
											case "10": echo "Oktober";break;
											case "11": echo "November";break;
											case "12": echo "Desember";break;
											
											}
											 ?></td>
											<td  nowrap><?php echo $value['Tahun']; ?></td>
											<td  nowrap><?php echo $value['TglFoto']; ?></td>
											<td  nowrap><?php echo $value['Note']; ?></td>
											<td  nowrap>
											<?php 
											if(Code::requery("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=10")<>0){
											$lloc=Code::GetField("usrprev","AddNew","IDUser='".Session::get('ID')."' and IDModule=10");											
											if($lloc==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/uprptUimg/<?php echo $value['ID']; ?>"><i class="icon-picture"></i></a>
											<?php }}?>
											</td>
											<td  nowrap>
											<?php 
																	
											if($ledt==1){?>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/rptedit/<?php echo $value['ID']."-".$this->bln."-".$this->thn; ?>"><i class="icon-edit"></i></a>
											<?php }				
											if($ldel==1){?>
											<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/rptdel/<?php echo $value['ID']."-".$this->bln."-".$this->thn; ?>"><i class="icon-remove"></i></a>
											<?php }?></td>
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
		document.myform.submit();
		//alert('sumbit');
		
	//return false;
	});
	 
	
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
