<?php
include('header.php');
include('menu.php');
?>

<!--PAGE CONTENT -->
      <!--PAGE CONTENT -->
        <div id="content">
           
                <div class="inner">
                    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add New User </h1><small>[ <a href="<?php echo URL."admin/UserList";?>"><< back</a> ]</small>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="<?php echo URL; ?>admin/SaveChangePass" method="POST">
                                        <div class="form-group">
                                            <label>UserName</label><br>
                                            <?php echo $this->Single["Username"];?>
                                        </div>
										<div class="form-group">
                                            <label>Name</label><br>
                                            <?php echo $this->Single["Name"];?>
                                        </div>
										<div class="form-group">
                                            <label>New Password</label>
                                            <input type="Password" class="form-control" id="pass" name="pass">
                                        </div>
										
										<input type="hidden" id="id" name="id" value="<?php echo $this->Single["ID"];?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        
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

 
</body>

    <!-- END BODY -->
</html>
