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
                    <h1 class="page-header"> Property Update</h1><small>[ <a href="<?php echo URL;?>admin/Property_List"> << back</a> ]</small>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo URL; ?>admin/UpdateProd/<?php echo $this->ProdSingle['ID'];?>" method="POST"  enctype="multipart/form-data" >
                                        <div class="form-group">
										<div class="form-group">
                                            <label>Kode Lokasi</label>
                                            <input class="form-control" id="kode" name="kode" required value="<?php echo $this->ProdSingle["ProductCode"];?>">
                                        </div>
                                            <label>Alamat</label>
                                            <input class="form-control" id="alamat" name="alamat" required value="<?php echo $this->ProdSingle["Address"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Area</label>
                                            <select class="form-control" id="area" name="area">
											<?php foreach ($this->arealist as $list => $Area) {?>
                                                <option <?php if ($Area["ID"]==$this->ProdSingle["AreaID"]){echo "Selected";}?> value="<?php echo $Area["ID"];?>"><?php echo $Area["NamaArea"];?></option>
											<?php }?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Kota</label>
                                            <input class="form-control" id="kota" name="kota" value="<?php echo $this->ProdSingle["Kota"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Koordinat Latitude</label>
                                            <input class="form-control" id="lat" name="lat"  value="<?php echo $this->ProdSingle["Latitude"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Koordinat Longitude</label>
                                            <input class="form-control" id="longs" name="longs" value="<?php echo $this->ProdSingle["Longitude"];?>">
                                        </div>
										
										 <div class="form-group">
                                            <label>Category Property</label>
                                            <select class="form-control" id="cat" name="cat">
											<?php foreach ($this->catlist as $key => $value) {?>
                                                <option  <?php if($value["JenisID"]==$this->ProdSingle["JenisID"]){ echo "selected";}?> value="<?php echo $value["JenisID"];?>"><?php echo $value["NamaJenis"];?></option>
											<?php }?>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Ukuran</label>
                                            <input class="form-control" id="ukuran" name="ukuran" value="<?php echo $this->ProdSingle["Ukuran"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Jumlah</label>
                                            <input class="form-control" id="Jumlah" name="Jumlah" value="<?php echo $this->ProdSingle["Jumlah"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Orientasi</label>
                                            
											<select class="form-control" id="Orientasi" name="Orientasi">
                                                <option <?php if($this->ProdSingle["Orientasi"]=="H"){ echo "Selected";}?> value="H">Horisontal</option>
												<option <?php if($this->ProdSingle["Orientasi"]=="V"){ echo "Selected";}?> value="V">Vertical</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Penerangan</label>
											<select class="form-control" id="Penerangan" name="Penerangan">
                                                <option <?php if($this->ProdSingle["Penerangan"]=="B"){ echo "Selected";}?> value="B">Back Light</option>
												<option <?php if($this->ProdSingle["Penerangan"]=="F"){ echo "Selected";}?> value="F">Front Light</option>
												<option <?php if($this->ProdSingle["Penerangan"]=="N"){ echo "Selected";}?> value="N">No Light</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Print Side</label>
											<select class="form-control" id="side" name="side">
                                                <option <?php if($this->ProdSingle["Side"]=="1"){ echo "Selected";}?>  value="1">1 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="2"){ echo "Selected";}?> value="2">2 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="3"){ echo "Selected";}?> value="3">3 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="4"){ echo "Selected";}?> value="4">4 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="5"){ echo "Selected";}?> value="5">5 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="6"){ echo "Selected";}?> value="6">6 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="7"){ echo "Selected";}?> value="7">7 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="8"){ echo "Selected";}?>  value="8">8 Side</option>
												<option <?php if($this->ProdSingle["Side"]=="9"){ echo "Selected";}?> value="9">9 Side</option>
                                            </select>
                                        </div>
										<div class="form-group">
                                            <label>Rute Jalan</label>
                                            <input class="form-control" id="Rute" name="Rute" value="<?php echo $this->ProdSingle["RuteJalan"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Akses</label>
                                            <input class="form-control" id="Akses" name="Akses" value="<?php echo $this->ProdSingle["akses"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Jarak Pandang</label>
                                            <input class="form-control" id="Jpanjang" name="Jpanjang" value="<?php echo $this->ProdSingle["JarakPandang"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Kecepatan Kendaraan</label>
                                            <input class="form-control" id="Kecepatan" name="Kecepatan" value="<?php echo $this->ProdSingle["KecepatanKendaraan"];?>">
                                        </div>
										<div class="form-group">
                                            <label>Kawasan</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="Kawasan" name="Kawasan"> <?php echo $this->ProdSingle["Kawasan"];?></textarea>
                                        </div>
										
										<div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea id="wysihtml5" class="form-control" rows="5" id="Keterangan" name="Keterangan"> <?php echo $this->ProdSingle["Keterangan"];?></textarea>
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
