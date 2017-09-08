
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
<?php
switch($this->Status){
	case "1":
	$link= "IjinPrinsip";
	$back="admin/IjinPrinsipList";
	$adds="admin/IjinPrinsipAdds";
	break;
	case "2":
	$link= "IjinReklame";
	$back="admin/IjinReklameList";
	$adds="admin/IjinReklameAdds";
	break;
	case "3":
	$link= "IMBR";
	$back="admin/IMBRList";
	$adds="admin/IMBRAdds";
	break;
}
?>
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>List  <?php echo $this->Ijin ." : ".$this->Title["ProductCode"];?> | <?php echo $this->Title["Address"]." - ".$this->Title["Kota"]." | ".$this->Title["NamaJenis"]." ".$this->Title["Ukuran"]." ".$this->Title["Side"]." Sisi/".$this->Title["Penerangan"]."L";?></h2>
						<small>[<a href="<?php echo URL.$back;?>"><< Back </a>] [<a href="<?php echo URL.$adds."/".$this->Title["ID"];?>"> Add New </a>]</small>
                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable-example" >
                                    <thead>
                                        <tr>
                                            
                                            <th>TGL. </th>
											<th>No.Ijin</th>
											<th>Awal</th>
											<th>Akhir</th>
											<th>Keterangan</th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									switch($this->Status){
										case "1":
										$link= "IjinPrinsip";
										break;
										case "2":
										$link= "IjinReklame";
										break;
										case "3":
										$link= "IMBR";
										break;
									}
									foreach ($this->IjinList as $key => $value) {
										?>
                                       <tr >
                                            <td nowrap><?php echo $value['Tanggal']; ?></td>
                                            <td nowrap><?php echo $value['NoIjin']; ?></td>
											
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											<td nowrap><?php echo $value['Ket']; ?></td>
											<td nowrap>
											<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/UploadImgPrinsip/<?php echo $value['ID']; ?>"><i class="icon-picture"></i></a>
											
												<a class="btn btn-primary btn-circle" href="<?php echo URL;?>admin/edit
												<?php echo $link."/". $value['ID']."-".$this->Status; ?>"><i class="icon-check"></i></a>
									
												<a class="btn btn-danger btn-circle" href="<?php echo URL;?>admin/Delete<?php echo $link."/". $value['ID']."-".$this->Status; ?>"><i class="icon-remove"></i></a></td>
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
