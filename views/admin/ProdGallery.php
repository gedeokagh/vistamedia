
<?php
include('header.php');
include('menu.php');
?>
    <!-- PAGE LEVEL STYLES-->
    <link href="<?php echo URL;?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" />
      <style>
        .panel-body a img {
            margin-bottom:5px !important;

        }
         #mexp{
			 float:left;
			 margin:0 10px;
			 width:200px;
		 }
    </style>

<!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Daftar Gambar : <?php echo $this->msg;?></h2>
					


                    </div>
                </div>

                <hr />
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Upload New Images <small>[ <a href="<?php echo URL."admin/Property_List"?>">back</a> ]</small>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <form action="" method="POST" enctype="multipart/form-data" name="myForm" id="imageuploadFrom" class="form-horizontal form-label-left">
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Select Image </label>
						
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="file" name="files" id="uploadfile" class="form-control" required/>
							<?php if(isset($this->err)){ echo $this->err;}?>
                        </div>
                    </div>
                    <div id="selectedimage"></div>
                    <p id="errors"></p>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
                            </div>
                          
 
                        </div>
                    </div>
                </div>
            </div>
				<hr />
                <div class="row">
                <div class="col-lg-12">
                                   
                        <div class="panel panel-default">
                            <div class="panel-heading">
                              Daftar Gambar <small>[ <a href="<?php echo URL."admin/Property_List"?>">back</a> ]</small>
                            </div>

                            <div class="panel-body" id="lists">
                              
			<p style="text-align:center">
			 <?php
                        foreach ($this->GalList as $key => $value){
                        ?>

		<div id="mexp">
		<a id="example5" href="<?php echo URL.$value['Img']; ?>" ><img src="<?php echo URL.$value['Img']; ?>" alt="" width="200px;" height="auto" /></a><br>
		<a class="del btn btn-danger" id="del" href="#" style="color:#fff;float:left;width:200px;margin-bottom:5px;" rel="<?php echo $value['IDProfile']; ?>" > Delete </a>
		
		<a class="dfl btn <?php if(($value["Status"]==1)&&($value["uri"]=="vistamedia")){ echo " btn-primary ";}else{echo " btn-success ";}?>" id="dfl" href="#" style="color:#fff;float:left;width:200px;margin-bottom:5px;" rel="<?php echo $value['ProductID']."-".$value['IDProfile']; ?>-1" >Set Vista Media</a>
		
		<a class="dflvm btn <?php if(($value["Status"]==1)&&($value["uri"]=="visualmandiri")){ echo " btn-primary ";}else{echo " btn-success ";}?>" id="dflvm" href="#" style="color:#fff;float:left;width:200px;margin-bottom:5px;" rel="<?php echo $value['ProductID']."-".$value['IDProfile']; ?>-2" >Set Visual Mandiri</a>
		
		<a class="dflsmp btn <?php if(($value["Status"]==1)&&($value["uri"]=="SMP")){ echo " btn-primary ";}else{echo " btn-success ";}?>" id="dflsmp" href="#" style="color:#fff;float:left;width:200px;margin-bottom:5px;" rel="<?php echo $value['ProductID']."-".$value['IDProfile']; ?>-3" >Set SMP</a>
		
		</div>
						<?php }?>
	</p>

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
    <script src="<?php echo URL;?>assets/plugins/jquery.fancybox-1.3.4/jquery-1.4.3.min.js"></script> <!--important for gallery-->
     <script src="<?php echo URL;?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js"></script> 
    <script src="<?php echo URL;?>assets/plugins/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>
     <script src="<?php echo URL;?>assets/js/image_gallery.js"></script>
    <script>
	$('.del').click(function(){
		delItem=$(this).parent();
		var gid = $(this).attr('rel');
		//alert(gid);
		$.post("../proddelgal",{gid:gid},function(x){
        //alert(x);
		delItem.remove();
		});
	return false;
	});
	$('.dfl').click(function(){
		var gurl=window.location;
		var gid = $(this).attr('rel');
		var el =$(this);
		var pel=$(this).parent();
		//alert(el);
		//$("#dfl").removeClass().addClass('dfl btn btn-success');
		$("#dfl").toggleClass('btn-default','btn-success');
		//$("#dfl").addClass('dfl btn btn-success');
		
		//el.removeClass();
		//el.addClass('dfl btn btn-default');
		//alert(gid);
		el.remove();
		$.post("../setdefault",{gid:gid},function(x){});
		//pel.append('<a class="dfl btn btn-warning" id="dfl" href="#" style="color:#fff;float:left;width:200px;margin-bottom:5px;" rel="'+ gid +'" >UnSet SMP</a>');
		
		//$(this).submit();
	//return false;
	var gurl=window.location;
	window.location=gurl;
	});
	$('.dflvm').click(function(){
		
		var gid = $(this).attr('rel');
		var el =$(this);
		var pel=$(this).parent();
		$("#dfl").toggleClass('btn-default','btn-success');
		el.remove();
		$.post("../setdefault",{gid:gid},function(x){});
	var gurl=window.location;	
	window.location=gurl;
	});
	$('.dflsmp').click(function(){
		
		var gid = $(this).attr('rel');
		var el =$(this);
		var pel=$(this).parent();
		$("#dfl").toggleClass('btn-default','btn-success');
		el.remove();
		$.post("../setdefault",{gid:gid},function(x){});
		var gurl=window.location;
		window.location=gurl;
	});
	</script>
</body>

    <!-- END BODY -->
</html>
