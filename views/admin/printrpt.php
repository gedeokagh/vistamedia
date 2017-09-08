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
                        <div class="panel-heading">
                       
                             
                                        <div class="col-sm-3">
										<div class="form-group">
											<label>Periode</label>
											
												<select class="form-control " name="bulan" id="bulan">
												<option value="1">Januari s/d Juni</option>
												<option value="2">Juli s/d Desember</option>
												</select>
											
										</div>
										</div>
										<div class="col-sm-3">
										<div class="form-group">
                                            <label>Tahun</label>
											
                                            <input class="form-control" id="tahun" name="tahun">
											
                                        </div>
										</div>
										<br>
                                       
                                        <a class="filter btn btn-success" id="filter" href="#"  > Preview </a>
                             
                        </div>
                        <div class="panel-body">
								
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
	$('.filter').click(function(){
		//alert("test");
		var bln=$("#bulan").val();
		var thn=$("#tahun").val();
		if(thn===""){ alert("Harap Masukkan Tahun Filter"); exit();}
		$.post("./prodlist",{bln:bln,thn:thn},function(x){
			//alert(x);
        $('.panel-body div').remove();
		$('.panel-body').append(x);
		});
	return false;
	});
	 $('#example').dataTable();
	
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->

</body>

    <!-- END BODY -->
</html>
