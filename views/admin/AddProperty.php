<?php
include('header.php');
include('menu.php');
?>
 <link rel="stylesheet" href="<?php echo URL;?>assets/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="stylesheet" href="<?php echo URL;?>assets/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="<?php echo URL;?>assets/css/bootstrap-wysihtml5-hack.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
    <!-- END PAGE LEVEL  STYLES -->
<!--PAGE CONTENT -->
      <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New Property <small>[ <a href="<?php echo URL."admin/Property_List";?>"><< back</a> ]</small></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo URL; ?>admin/saveprod" method="POST"  enctype="multipart/form-data" >
                                        <div class="form-group">
										<div class="form-group">
                                            <label>Kode Lokasi</label>
                                            <input class="form-control" id="kode" name="kode" required>
                                        </div>
                                            <label>Alamat</label>
                                            <input class="form-control" id="alamat" name="alamat" required>
                                        </div>
										<div class="form-group">
                                            <label>Area</label>
                                            <select class="form-control" id="area" name="area">
											<?php foreach ($this->arealist as $list => $Area) {?>
                                                <option value="<?php echo $Area["ID"];?>"><?php echo $Area["NamaArea"];?></option>
											<?php }?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Kota</label>
                                            <input class="form-control" id="kota" name="kota">
                                        </div>
										
										<div class="form-group">
                                            <label>Koordinat Latitude</label>
                                            <input class="form-control" id="lat" name="lat">
                                        </div>
										<div class="form-group">
                                            <label>Koordinat Langitude</label>
                                            <input class="form-control" id="longs" name="longs">
                                        </div>
										
										 <div class="form-group">
                                            <label>Category Property</label>
                                            <select class="form-control" id="cat" name="cat">
											<?php foreach ($this->catlist as $key => $value) {?>
                                                <option value="<?php echo $value["JenisID"];?>"><?php echo $value["NamaJenis"];?></option>
											<?php }?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Ukuran</label>
                                            <input class="form-control" id="ukuran" name="ukuran">
                                        </div>
										<div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" id="Jumlah" name="Jumlah">
                                        </div>
										<div class="form-group">
                                            <label>Orientasi</label>
                                            
											<select class="form-control" id="Orientasi" name="Orientasi">
                                                <option value="H">Horisontal</option>
												<option value="V">Vertical</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Penerangan</label>
											<select class="form-control" id="Penerangan" name="Penerangan">
                                                <option value="B">Back Light</option>
												<option value="F">Front Light</option>
												<option value="N">No Light</option>
												<option value="L">LED Light</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Print Side</label>
											<select class="form-control" id="side" name="side">
                                                <option value="1">1 Side</option>
												<option value="2">2 Side</option>
												<option value="3">3 Side</option>
												<option value="4">4 Side</option>
												<option value="5">5 Side</option>
												<option value="6">6 Side</option>
												<option value="7">7 Side</option>
												<option value="8">8 Side</option>
												<option value="9">9 Side</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Rute Jalan</label>
                                            <input class="form-control" id="Rute" name="Rute">
                                        </div>
										<div class="form-group">
                                            <label>Akses</label>
                                            <input class="form-control" id="Akses" name="Akses">
                                        </div>
										<div class="form-group">
                                            <label>Jarak Pandang</label>
                                            <input class="form-control" id="Jpanjang" name="Jpanjang">
                                        </div>
										<div class="form-group">
                                            <label>Kecepatan Kendaraan</label>
                                            <input class="form-control" id="Kecepatan" name="Kecepatan">
                                        </div>
										<div class="form-group">
                                            <label>Kawasan</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="Kawasan" name="Kawasan"></textarea>
                                        </div>
										
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="Keterangan" name="Keterangan"></textarea>
										</div>
                                        <br>
										
                                       <input type="submit" value="Submit" class="btn btn-primary">
                                        
                                    </form>
                                </div>
                                
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

  <script src="<?php echo URL;?>assets/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.min.js"></script>
    <script src="<?php echo URL;?>assets/plugins/bootstrap-wysihtml5-hack.js"></script>
    
    <script src="<?php echo URL;?>assets/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>

</body>

    <!-- END BODY -->
</html>
