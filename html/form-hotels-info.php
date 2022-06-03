<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
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
                        <h4 class="m-b-0 text-white">Manage Hotels Information</h4>
                    </div>
                    <div class="card-block">
                        <form  class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="box-title">Add Hotel Info</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Select Island</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control" id="selectIsland" style="width: 100%" name="IslandName">
                                                    <option value="">Select</option>
                                                    <?php
                                                    if (isset($_GET['info']) && isset($_GET['mode'])) {
                                                        $id = $_GET['info'];
                                                        $hotel_info_complete = getHotelInfo_particular($id, $conn);
                                                        $len = count($hotel_info_complete);
                                                        for ($i = 1; $i < $len; $i++) {
                                                            ${HotelInfoID . $i} = $hotel_info_complete[$i]["HotelInfoID"];
                                                            ${RoomCat . $i} = $hotel_info_complete[$i]["RoomCat"];
                                                            ${PayWOGST . $i} = $hotel_info_complete[$i]["PayWOGST"];
                                                            ${BasePriceGST . $i} = $hotel_info_complete[$i]["BasePriceGST"];
                                                            ${ExtraAWB . $i} = $hotel_info_complete[$i]["ExtraAWB"];
                                                            ${ExtraCWB . $i} = $hotel_info_complete[$i]["ExtraCWB"];
                                                            ${ExtraCNB . $i} = $hotel_info_complete[$i]["ExtraCNB"];
                                                            ${MealPlan . $i} = $hotel_info_complete[$i]["MealPlan"];
                                                            ${AddonPriceGST . $i} = $hotel_info_complete[$i]["AddonPriceGST"];
                                                        }
                                                        $HotelInfoID = $hotel_info_complete[0]["HotelInfoID"];
                                                        $HotelID = $hotel_info_complete[0]["HotelID"];
                                                        $RoomCat = $hotel_info_complete[0]["RoomCat"];
                                                        $PayWOGST = $hotel_info_complete[0]["PayWOGST"];
                                                        $BasePriceGST = $hotel_info_complete[0]["BasePriceGST"];
                                                        $ExtraAWB = $hotel_info_complete[0]["ExtraAWB"];
                                                        $ExtraCWB = $hotel_info_complete[0]["ExtraCWB"];
                                                        $ExtraCNB = $hotel_info_complete[0]["ExtraCNB"];
                                                        $MealPlan = $hotel_info_complete[0]["MealPlan"];
                                                        $AddonPriceGST = $hotel_info_complete[0]["AddonPriceGST"];
                                                        $Hotel_info = getHotelName($HotelID, $conn);
                                                        $island_id = $Hotel_info[0]["IslandID"];
                                                    } else {
                                                        $HotelInfoID = '';
                                                        $HotelID = "";
                                                        $RoomCat = "";
                                                        $PayWOGST = "";
                                                        $BasePriceGST = "";
                                                        $ExtraAWB = "";
                                                        $ExtraCWB = "";
                                                        $ExtraCNB = "";
                                                        $MealPlan = "";
                                                        $AddonPriceGST = "";
                                                        $Hotel_info = "";
                                                        $island_id = "";
                                                        $len = 1;
                                                    }
                                                    $islands = json_decode(getIslands($conn));
                                                    foreach ($islands as $value) {
                                                        echo (isset($island_id) && $island_id == $value->IslandId) ? "<option value='$value->IslandId' selected>$value->IslandName</option>" : "<option value='$value->IslandId'>$value->IslandName</option>";
                                                    }
                                                    ?>
                                                </select>                                                                              
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <?php
//                                    Extra input to prevent javascript errror
                                    if (isset($HotelID)) {
                                        echo '<input type="hidden" value="' . $HotelID . '" name="presentHotelId" id="presentHotelId">';
                                    } else {
                                        echo '<input type="hidden" value="0" name="presentHotelId" id="presentHotelId">';
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Select Hotel</label>
                                            <div class="col-md-9">
                                                <select class="select2 form-control" id="selectHotel" style="width: 100%" name="HotelName">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span--> </div>
                                <hr class="m-t-10 m-b-30">
                                <div id="all-hotel-categories">
                                    <input type="hidden" value="<?php echo $len; ?>" id="hidden" name="totalCount">


                                    <div data-id="1" class="hotel-category-form">
                                        <input type="hidden" name="HotelInfoID" value="<?php echo $HotelInfoID; ?>" >                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Room Category</label>
                                                    <div class="col-md-9"> <input class="form-control" type="text" name="RoomCategory" value="<?php echo $RoomCat ?>"> </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Payable without GST</label>
                                                    <div class="col-md-9"> <input class="form-control" type="number" name="PayWOGST" value="<?php echo $PayWOGST ?>"> </div>
                                                </div>
                                            </div>
                                            <!--/span--> </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Base Price GST%</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="number" name="BasePriceGST" value="<?php echo $BasePriceGST; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Extra Adult WB</label>
                                                    <div class="col-md-9"> <input class="form-control" type="number" name="ExtraAWB"  value="<?php echo $ExtraAWB ?>"></div>
                                                </div>
                                            </div>
                                            <!--/span--> </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Extra Child WB</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="number" name="ExtraCWB"  value="<?php echo $ExtraCWB ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Extra Child NB</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="number" name="ExtraCNB"  value="<?php echo $ExtraCNB ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span--> </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Meal Plan</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="number" name="MealPlan"  value="<?php echo $MealPlan ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="control-label text-right col-md-3">Addon Price GST%</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="number" name="AddonPriceGST"  value="<?php echo $AddonPriceGST; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span--> 
                                        </div>

                                        <!--/row-->
                                        <?php
                                        if (isset($_GET['mode']) && $_GET['mode'] == "edit") {
                                            ?>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-12"> <button class="btn btn-warning btn-circle subtract" type="button" id="subtract" data-value="<?php echo utf8_encode($HotelInfoID); ?>" style="float: right"><i class="fa fa-trash"></i></button></div>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <!--/row--> 
                                        <hr class="m-t-0 m-b-40">
                                    </div>

                                    <?php
                                    if (isset($len)) {

                                        for ($i = 1; $i < $len; $i++) {
                                            ?>



                                            <div data-id="<?php echo $i + 1 ?>" class="hotel-category-form">
                                                <input type="hidden" name="HotelInfoID<?php echo $i ?>" value="<?php echo ${"HotelInfoID" . $i}; ?>" >
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Room Category</label>
                                                            <div class="col-md-9"> <input class="form-control" type="text" name="RoomCategory<?php echo $i ?>" value="<?php echo ${"RoomCat" . $i} ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Payable without GST</label>
                                                            <div class="col-md-9"> <input class="form-control" type="number" name="PayWOGST<?php echo $i ?>" value="<?php echo ${"PayWOGST" . $i} ?>"> </div>
                                                        </div>
                                                    </div>
                                                    <!--/span--> </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Base Price GST%</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="number" name="BasePriceGST<?php echo $i ?>" value="<?php echo ${"BasePriceGST" . $i} ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Extra Adult WB</label>
                                                            <div class="col-md-9"> <input class="form-control" type="number" name="ExtraAWB<?php echo $i ?>" value="<?php echo ${"ExtraAWB" . $i} ?>" ></div>
                                                        </div>
                                                    </div>
                                                    <!--/span--> </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Extra Child WB</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="number" name="ExtraCWB<?php echo $i ?>" value="<?php echo ${"ExtraCWB" . $i} ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Extra Child NB</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="number" name="ExtraCNB<?php echo $i ?>" value="<?php echo ${"ExtraCNB" . $i} ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span--> </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Meal Plan</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="number" name="MealPlan<?php echo $i ?>" value="<?php echo ${"MealPlan" . $i} ?>" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Addon Price GST%</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="number" name="AddonPriceGST<?php echo $i ?>" value="<?php echo ${"AddonPriceGST" . $i} ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span--> 
                                                </div>

                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-12"> <button class="btn btn-warning btn-circle subtract" type="button" id="subtract<?php echo $i ?>" data-value="<?php echo utf8_encode(${"HotelInfoID".$i}); ?>" style="float: right"><i class="fa fa-trash"></i></button></div>
                                                </div>
                                                <!--/row--> 
                                                <hr class="m-t-0 m-b-40">
                                            </div>                                        
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>


                                <hr class="m-t-20 m-b-20">
                                <div class="row">
                                    <div class="col-md-12"> <button class="btn btn-warning btn-circle" type="button" id="add" style="float: right"><i class="fa fa-plus"></i></button></div>
                                </div>

                                <hr>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-12">
                                                    <?php
                                                    echo (isset($_GET['mode']) && isset($_GET['info'])) ? '<button type="submit" class="btn btn-success" name="Update_SaveClose_info">Update</button><button type="button" class="btn btn-inverse" >Cancel</button>' : '<button type="submit" class="btn btn-success" name="SaveClose_info">Save and Close</button><button type="submit" class="btn btn-warning" name="SaveContinue_info">Save and Continue</button><button type="button" class="btn btn-inverse">Cancel</button>';
                                                    ?>


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
        <!-- Right sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <?php
    include 'templates/footer.php';
    ?>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
<!--<script src="assets/plugins/switchery/dist/switchery.min.js"></script>-->
    <script src="assets/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"

    type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/multiselect/js/jquery.multi-select.js"></script>
    <!--Sweet ALert-->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $('#hotelName').prop("disabled", true);
            $("#add").click(function() {
                var present_index = parseInt($(".hotel-category-form:last").attr("data-id"));

                $("#hidden").val(present_index + 1);
                console.log($("#hidden").val());
                $("#all-hotel-categories").append($(".hotel-category-form:first").wrap('<p/>').parent().html());

                $(".hotel-category-form:first").unwrap();
                $(".hotel-category-form:last").attr("data-id", present_index + 1);

                $(".hotel-category-form:last").find("input").each(function() {

                    console.log("hello");
                    $(this).val('');
                    $(this).attr("name", ($(this).attr("name")).replace(/\d+/g, '') + present_index);
                    console.log($(this).attr("name"));
                });
            });
            var hotel_id = $("#presentHotelId").val();
            if ($("#selectIsland").val != "Select") {
                console.log($("#selectIsland").val());
                $.ajax({
                    url: "php/hotels.php",
                    type: 'GET',
                    data: {
                        id: $("#selectIsland").val()
                    },
                    dataType: "JSON",
                    success: function(result) {
                        var str = '<option value="">Select</option>';
                        for (var i = 0; i < result.data.length; i++) {
                            str += (hotel_id == result.data[i]['HotelID']) ? '<option value="' + result.data[i]['HotelID'] + '" selected>' + result.data[i]['HotelName'] + '</option>' : '<option value="' + result.data[i]['HotelID'] + '">' + result.data[i]['HotelName'] + '</option>';
                        }
                        $("#selectHotel").html(str);
                    }
                });
            }
            $(".subtract").click(function() {
                console.log($(this).attr("data-value"));
                console.log("clicked cLUW SEND");
                console.log($(this).attr("data-value"));
                var name = $(this).attr("data-value");
                swal({
                    title: "Are you sure?",
                    text: "Save data before deleting or all your changes will be lost!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {

                    if (isConfirm) {
                        console.log("inside confirm");
                        $.ajax({
                            url: "commons/common-delete.php",
                            type: 'GET',
                            data: {
                                hotel_info: name
                            },
                            dataType: "JSON",
                            success: function(result) {
                                if (result == 1) {                                    
                                    swal({
                                        title: "Successfully",
                                        text: "Deleted the info",
                                        timer: 1000,
                                        showConfirmButton: false
                                    });
                                    location.reload();
                                }
                                else {
                                    swal("Deleted!", "Error", "Error");
                                }
                            }
                        });

                    } else {
                        swal("Cancelled", "Your info is safe :)", "error");
                    }
                });
            });
            //==== Fetch Hoteld data on change of Island ====//
            $("#selectIsland").change(function() {

                console.log($("#selectIsland").val());
                $.ajax({
                    url: "php/hotels.php",
                    type: 'GET',
                    data: {
                        id: $("#selectIsland").val()
                    },
                    dataType: "JSON",
                    success: function(result) {
                        var str = '<option value="">Select</option>';
                        for (var i = 0; i < result.data.length; i++) {
                            str += '<option value="' + result.data[i]['HotelID'] + '">' + result.data[i]['HotelName'] + '</option>';
                        }
                        $("#selectHotel").html(str);
                    }
                });

            });

            //==== Enable/Disable Hotel Name on the basis of Selected Island ====//
            $("#selectIsland").change(function() {
                if ($("#selectIsland").val() != "Select") {
                    $('#hotelName').prop("disabled", false);
                }
                else {
                    $('#hotelName').prop("disabled", true);
                }
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
     require "commons/add-common.php";
     require "commons/update-common.php";
?>
</body>
</html>
