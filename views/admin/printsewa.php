
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
						<small>[<a href="<?php echo URL;?>admin/sewaList"><< Back </a>][<a href="<?php echo URL;?>admin/sewaAdds/<?php echo $this->Title["ID"];?>"> Add New</a>]</small>
                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b>Sewa Lahan:</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            
                                            <th>TGL. </th>
											<th>SP Sewa Lahan</th>
											<th>Awal</th>
											<th>Akhir</th>
											<th>Pihak I </th>
											<th>Pihak II</th>
											<th>No.KTP</th>
											<th>No.HP</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									if(Code::requery("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
											$chgs=Code::GetField("usrprev","Changes","IDUser='".Session::get('ID')."' and IDModule=4");											
									}
									if(Code::requery("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=4")<>0){
											$void=Code::GetField("usrprev","Void","IDUser='".Session::get('ID')."' and IDModule=4");											
									}
									foreach ($this->ListSewa as $key => $value) {
										?>
                                        <tr >
                                            <td nowrap><?php echo $value['Tanggal']; ?></td>
                                            <td nowrap><?php echo $value['NoPerjanjian']; ?></td>
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											<td nowrap>Vista Media</td>
											<td nowrap><?php echo $value['Kontak']; ?></td>
											<td nowrap><?php echo $value['NoKTP']; ?></td>
											<td nowrap><?php echo $value['NoHP']; ?></td>
											<td nowrap>
											<?php
											if($chgs==1){?> 
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/editSewa/<?php echo $value['ID']; ?>-L"><i class="icon-check"></i></a>
											<?php }
											if($void==1){?>
											<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/DeleteSewa/<?php echo $value['ID']; ?>-L"><i class="icon-remove"></i></a>
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
