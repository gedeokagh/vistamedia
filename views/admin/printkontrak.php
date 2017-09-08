
<?php
include('header.php');
include('menu.php');
?>
<link href="<?php echo URL;?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" />
      <style>
        .panel-body a img {
            margin-bottom:5px !important;

        }
         #mexp{
			 float:left;
			 margin:0 10px;
		 }
    </style>
<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2> <?php echo $this->Title["ProductCode"];?> | <?php echo $this->Title["Address"]." - ".$this->Title["Kota"]." | ".$this->Title["NamaJenis"]." ".$this->Title["Ukuran"]." ".$this->Title["Side"]." Sisi/".$this->Title["Penerangan"]."L";?></h2>
						<small>[<a href="<?php echo URL;?>admin/KontrakList"><< Back </a>] [<a href="<?php echo URL;?>admin/KontrakAdds/<?php echo $this->Title["ID"];?>">AddNew </a>]</small>
                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b>Kontrak List</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Client </th>
											<th>No.Kontrak</th>
											<th>Tgl.Kontrak</th>
											<th>Awal</th>
											<th>Akhir</th>
											<th>Nilai</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if(Code::requery("usrprev","AddIMG","IDUser='".Session::get('ID')."' and IDModule=5")<>0){
												$aImg=Code::GetField("usrprev","AddIMG","IDUser='".Session::get('ID')."' and IDModule=5");											
											}
									if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=5")<>0){
											$chgs=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=5");											
									}
									if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=5")<>0){
											$void=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=5");											
									}
									foreach ($this->ListKontrak as $key => $value) {
										?>
                                        <tr >
                                            <td nowrap><?php echo $value['CustomerName']; ?></td>
                                            <td nowrap><?php echo $value['NoKontrak']; ?></td>
											<td nowrap><?php echo $value['Tanggal']; ?></td>
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											<td nowrap><?php echo number_format($value['Nilai']); ?></td>
											<td nowrap>
											<?php
											if($aImg==1){?><a class="btn btn-primary btn-circle" href="<?PHP echo URL;?>admin/UploadImgKontrak/<?php echo $value["KontrakID"];?>"><i class="icon-picture"></i></a><?php }
											if($chgs==1){?> 
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editKontrak/<?php echo $value['KontrakID']; ?>-L"><i class="icon-check"></i></a>
											<?php }
											if($void==1){?>
											<a class="btn btn-danger btn-circle" href="<?PHP echo URL;?>admin/DelKontrak/<?php echo $value["KontrakID"];?>-L"><i class="icon-remove"></i></a>
											<?php
											}?>
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
		 
		$('.del').click(function(){
		delItem=$(this).parent().parent();
		var gid = $(this).attr('rel');
		$.post("./delprod",{gid:gid},function(x){
        delItem.remove();
		});
		
	return false;
	});
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
