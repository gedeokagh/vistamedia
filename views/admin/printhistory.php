
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
						<small>[<a href="<?php echo URL;?>admin/Property_List"><< Back </a>]</small>
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
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
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
											
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
						</div>
						<div class="panel panel-default">
						<div class="panel-heading">
                           <b>Ijin Prinsip :</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            
                                            <th>TGL. </th>
											<th>No.Prinsip</th>
											<th>No.SIPR</th>
											<th>Awal</th>
											<th>Akhir</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->ListPrinsip as $key => $value) {
										?>
                                        <tr >
                                            <td nowrap><?php echo $value['Tanggal']; ?></td>
                                            <td nowrap><?php echo $value['NoIjin']; ?></td>
											<td nowrap></td>
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
						</div>
						
						<div class="panel panel-default">
						<div class="panel-heading">
                           <b>Ijin Reklame :</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            
                                            <th>TGL. </th>
											<th>No.Prinsip</th>
											
											<th>Awal</th>
											<th>Akhir</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->ListReklame as $key => $value) {
										?>
                                        <tr >
                                            <td nowrap><?php echo $value['Tanggal']; ?></td>
                                            <td nowrap><?php echo $value['NoIjin']; ?></td>
											
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
						</div>
						
						<div class="panel panel-default">
						<div class="panel-heading">
                           <b>Ijin IMBR :</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            
                                            <th>TGL. </th>
											<th>No.Prinsip</th>
											
											<th>Awal</th>
											<th>Akhir</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->ListIMBR as $key => $value) {
										?>
                                        <tr >
                                            <td nowrap><?php echo $value['Tanggal']; ?></td>
                                            <td nowrap><?php echo $value['NoIjin']; ?></td>
											
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
						</div>
						
						<div class="panel panel-default">
						<div class="panel-heading">
                           <b>Data Customer :</b>
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
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($this->ListKontrak as $key => $value) {
										?>
                                        <tr >
											<td nowrap><?php echo $value['CustomerName']; ?></td>
                                            <td nowrap><?php echo $value['NoKontrak']; ?></td>
											<td nowrap><?php echo $value['Tanggal']; ?></td>
											<td nowrap><?php echo $value['StartPeriode']; ?></td>
											<td nowrap><?php echo $value['EndPeriode']; ?></td>
											<td nowrap><?php echo number_format($value['Nilai']); ?></td>
                                        </tr>
									<?php }?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
						</div>
						  <div class="row">
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
