<?php
//ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);
require 'templates/header.php';
require 'templates/sidebar.php';
include 'commons/common-functions.php';

?>

<!-- ============================================================== -->
<!-- Every thing below Page wrapper  -->
<!-- ============================================================== -->




<!--Page content Goes here-->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Change password</h4>
                    </div>
                    <div class="card-block">
                        <form class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="box-title">Add Islands</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">
                                                Old password</label>
                                            <div class="col-md-9"> 
                                                <input class="form-control" name="old_password" type="password" required >
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-8"> &nbsp; </div>
                                    <!--/span--> </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">
                                                New  Password</label>
                                            <div class="col-md-9"> 
                                                <input class="form-control" name="new_password" type="password" required>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-8"> &nbsp; </div>
                                    <!--/span--> </div>
                                
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">
                                                confirm Password</label>
                                            <div class="col-md-9"> 
                                                <input class="form-control" name="confirm_password" type="password" required>                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-8"> &nbsp; </div>
                                    <!--/span--> </div>
                            </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-12"> 
                                              <button type="submit" name="SavePassword" class="btn btn-success">Save</button>                                                        
                                                        
                                                        <button type="button" class="btn btn-inverse">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Row -->
        
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Every thing before goes above footer -->
    <!-- ============================================================== -->
    <?php
        require 'templates/footer.php';
       
    ?>
    <!--Sweet alert-->
   <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        function Sucessfull(text) {
            console.log("function called");
            
        }
        function successFull_Redirect(text , redirect) {
            console.log("function called");
            swal({title: "Success", text: text ,timer: 1500,showConfirmButton: false}); 
            window.location.href= redirect;
        }
    </script>
    <?php
            include 'commons/add-common.php';
            include 'commons/update-common.php';
        ?>
</body>
</html>