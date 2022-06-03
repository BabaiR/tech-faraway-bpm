<?php
require 'templates/header.php';
require 'templates/sidebar.php';
include 'commons/common-functions.php';
?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <?php
        
        if (isset($_GET['agent']) && isset($_GET['mode']) && $_GET['mode'] === "edit") {
            $agentID=$_GET['agent'];
            $agent_info = json_decode(getAgent($agentID,$conn));
           
                                                        
                                                        $CompanyName = $agent_info[0]->CompanyName;
                                                        $Address = $agent_info[0]->Address;
                                                        $GSTNo = $agent_info[0]->GSTNo;                                                        
                                                        
        } else {
                                                        $CompanyName = "";
                                                        $Address = "";
                                                        $GSTNo = "";                                                        
                                                        
        }
        ?>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Manage Agent</h4>
                    </div>
                    <div class="card-block">
                        <form method="post" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="box-title">Add Agent</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">                                    
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Company Name</label>
                                            <div class="col-md-9"> 
                                                 <input class="form-control" type="hidden" id="agentid" name="agentid" value="<?php echo $agentID ?>"> 
                                                <input class="form-control" type="text" id="hotelName" name="CompanyName" value="<?php echo $CompanyName ?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Address</label>
                                            <div class="col-md-9"> <textarea class="form-control" name="addressTextarea" rows="3" name="Address" ><?php echo $Address; ?></textarea> </div>
                                        </div>
                                    </div>
                                    
                                    <!--/span--> </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">GST No.</label>
                                            <div class="col-md-9"> 
                                                <input class="form-control" type="text"  name="GSTNo" value="<?php echo $GSTNo; ?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-12">
                                                
                                                  <?php
                                                if(isset($agentID)) {
                                                    echo '<button type="submit" class="btn btn-success" name="Update_Agent">Update</button>';
                                                }
                                                else {
                                                    echo '<button type="submit" class="btn btn-success" name="SaveClose_Agent">Save</button>';
//                                                    
                                                }                                                                                                
//                                                ?>
                                              
                                                
                                                <?php
                                              
//                                                    echo '<button type="submit" class="btn btn-success" name="Update_Agent">Update</button>';
                                                                                                                                              
                                                ?>
                                                <button type="button" class="btn btn-inverse" onclick="location.href='list-agent.php'">Cancel</button>
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
    <!-- footer -->
    <?php
    require 'templates/footer.php';
    ?>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->


    
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <?php
                        include "commons/add-common.php";
                        include "commons/update-common.php";
                     ?>
</body>
</html>
