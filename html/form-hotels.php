<?php
//error_reporting(E_ALL); 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

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

        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Manage Hotels</h4>
                    </div>
                    <div class="card-block">
                        <form method="post" class="form-horizontal">
                            <div class="form-body">
                                <h3 class="box-title">Add Hotels</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Select Island</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control" id="selectIsland" style="width: 100%" name="IslandName">
                                                    <option>Select</option>
                                                    <?php
                                                    $islands = json_decode(getIslands($conn));
                                                    if (isset($_GET['island']) && isset($_GET['hotel']) && isset($_GET['mode']) && $_GET['mode'] === "edit") {
                                                        $island_id = $_GET['island'];
                                                        $hotel_id = $_GET['hotel'];
                                                        $Hotel_info = getHotelName($hotel_id, $conn);
                                                        $HotelName = $Hotel_info[0]["HotelName"];
                                                        $Address = $Hotel_info[0]["Address"];
                                                        $ContactNumber = $Hotel_info[0]["ContactNumber"];
                                                        $EmailAddress = $Hotel_info[0]["EmailAddress"];
                                                        $PaymentTerms = $Hotel_info[0]["PaymentTerms"];
                                                        foreach ($islands as $value) {
                                                            echo ($value->IslandId == $island_id ) ? "<option value='$value->IslandId' selected>$value->IslandName</option>" : "<option value='$value->IslandId'>$value->IslandName</option>";
                                                        }
                                                    } else {
                                                        $HotelName = "";
                                                        $Address = "";
                                                        $ContactNumber = "";
                                                        $EmailAddress = "";
                                                        $PaymentTerms = "";
                                                        foreach ($islands as $value) {
                                                            echo "<option value='$value->IslandId'>$value->IslandName</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Hotel Name</label>
                                            <div class="col-md-9"> 
                                                <input class="form-control" type="text" id="hotelName" name="HotelName" value="<?php echo $HotelName ?>"> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span--> </div>

                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Address</label>
                                            <div class="col-md-9"> <textarea class="form-control" id="addressTextarea" rows="3" name="Address" ><?php echo $Address; ?></textarea> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Contact Number</label>
                                            <div class="col-md-9"> <input class="form-control" type="tel" name="ContactNumber" value="<?php echo $ContactNumber ?>"> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Email Address</label>
                                            <div class="col-md-9"> <input class="form-control" type="text" name="EmailAddress" value="<?php echo $EmailAddress; ?>"> </div>
                                        </div>
                                    </div>
                                    <!--/span-->                                    
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Payment Terms</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control" id="paymentTerms" style="width: 100%" name="PaymentTerms">
                                                    <option value="Credit" <?php echo $PaymentTerms=="Credit"? "selected='true'" : "" ?> >Credit</option>
                                                    <option value="Advanced" <?php echo $PaymentTerms=="Advanced"? "selected='true'" : "" ?>>Advanced</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span--> </div>
                            </div>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-12">
                                                <?php
                                                if(isset($island_id)) {
                                                    echo '<button type="submit" class="btn btn-success" name="Update_SaveClose_hotel">Update</button>';
                                                }
                                                else {
                                                    echo '<button type="submit" class="btn btn-success" name="SaveClose_hotel">Save and Close</button>';
                                                    echo '<button type="submit" class="btn btn-warning" name="SaveContinue_hotel">Save and Continue</button>';
                                                }                                                                                                
                                                ?>
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
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
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
