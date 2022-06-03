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
        $allAgent = json_decode(getAllAgent($conn));
        if (isset($_GET['agent']) && isset($_GET['mode']) && $_GET['mode'] === "edit") {
            $agentID=$_GET['agent'];
            
            $agent_info = json_decode(getfhAgent($agentID,$conn));
           
                                                        
                                                        $CompanyName = $agent_info[0]->CompanyName;
                                                        $agentiid=$agent_info[0]->FIleHandlerAgentID;;
                                                        $agentName = $agent_info[0]->AgentName;
                                                        
                                                        
        } else {
                                                        $CompanyName = "";
                                                        $agentName = "";
                                                   
                                                        
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
                        <h4 class="m-b-0 text-white">Manage FH Agent</h4>
                    </div>
                    <div class="card-block">
                        <form method="post" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="box-title">Add FH-Agent</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">                                    
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Agent Name</label>
                                            <div class="col-md-9"> 
                                                <select class="form-control custom-select" name="AgentList">                                                            
                                                  <?php
                                                          foreach ($allAgent as $value) {
                                                              if($value->CompanyName==$CompanyName)
                                                              {
                                                        ?>
                                                    <option value="'+ <?php echo $value->AgentID; ?> +'" selected><?php echo $value->CompanyName; ?> </option>
                                                    <?php
                                                              }
                                                              else
                                                              {
                                                              ?>
                                                    
                                                    
                                                    <option value="'+ <?php echo $value->AgentID; ?> +'"><?php echo $value->CompanyName; ?> </option>
                                                    <?php
                                                              }
                                                          }
                                                  ?>
                                                        </select>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--/span--> </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">File Handler For Agent Name</label>
                                            <div class="col-md-9"> 
                                                <input class="form-control" name="FileHandlerid" type="hidden" value="<?php echo $agentiid ?>">
                                                <input class="form-control" name="FileHandlerName" type="text" value="<?php echo $agentName ?>"> 
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
                                                
                                                    echo '<button type="submit" class="btn btn-success" name="Update_fh_Agent">Update</button>';
                                                                                                                                           
                                                ?>
                                                <button type="button" class="btn btn-inverse" onclick="location.href='list-fh-agent.php'">Cancel</button>
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
    <script src="assets/plugins/switchery/dist/switchery.min.js"></script>
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"

    type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <!--Sweet alert-->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $('#hotelName').prop("disabled", true);
//            To see if the select element has element selected by default
            $("#selectIsland").val() == "Select" ? $('#hotelName').prop("disabled", true) : $('#hotelName').prop("disabled", false);
//            TO see if the select island has some island selected 
            $("#selectIsland").change(function() {
                $("#selectIsland").val() != "Select" ? $('#hotelName').prop("disabled", false) : $('#hotelName').prop("disabled", true);

            });
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function() {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function() {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function() {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function() {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            
        });
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
