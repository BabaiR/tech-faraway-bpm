<?php
require 'templates/header.php';
require 'templates/sidebar.php';
include 'commons/common-functions.php';
date_default_timezone_set("Asia/Kolkata");
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
                        <form class="form-horizontal" method="post">
                            <div class="form-body">
                                <h3 class="box-title">Add Hotel Info</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Select Island</label>
                                            <div class="col-md-9">
                                                                 <?php
        
        if (isset($_GET['hotelreviewid']) && isset($_GET['mode']) && $_GET['mode'] === "edit") {
            $hotelid=$_GET['hotelreviewid'];
            $hotel_info = json_decode(getReviewhotel($hotelid,$conn));
            
                                                        
                                                        $island_id = $hotel_info[0]->Island;
                                                        $hotel = $hotel_info[0]->Hotel;
                                                        $cat = $hotel_info[0]->Category;                                                        
                                                        $review = $hotel_info[0]->Review;
                                                        $numberofroom = $hotel_info[0]->NumberOfRooms;
                                                        $roomservice = $hotel_info[0]->RoomService;                                                        
                                                        $tea = $hotel_info[0]->TeaCoffee;
                                                        $inter = $hotel_info[0]->InterCom;
                                                        $hotwater = $hotel_info[0]->HotWater;                                                        
                                                        $pool = $hotel_info[0]->Pool;
                                                        $tv = $hotel_info[0]->TV;
                                                        $minifridge = $hotel_info[0]->MiniFridge;                                                        
                                                        $bar = $hotel_info[0]->Bar;
                                                        $locker = $hotel_info[0]->SafeLocker;
                                                        $hairdryer = $hotel_info[0]->HairDryer;
                                                        $proximity=$hotel_info[0]->ProximityToBeach;
                                                        $checkin=$hotel_info[0]->CheckInTime;
                                                        $checkout=$hotel_info[0]->CheckOutTime;
                                                        echo "<script type='text/javascript'>var hotelid=".$hotel.";</script>";
                                                        
                                                        
        } else {
                                                     
                                                        $island_id = "";
                                                        $hotel = "";
                                                        $cat = "";
                                                        $review = "";
                                                        $numberofroom = "";
                                                        $roomservice = "";
                                                        $tea = "";
                                                        $inter = "";
                                                        $hotwater = "";
                                                        $pool = "";
                                                        $tv = "";
                                                        $minifridge = "";
                                                        $bar = "";
                                                        $locker ="";
                                                        $hairdryer = "";
                                                        $proximity="";
                                                        $checkin="";
                                                        $checkout="";
                                                        
        }
        ?>
                                                <?php
                                                $islands = json_decode(getIslands($conn));
                                                ?>
                                                <select class="form-control custom-select" id="selectIsland" name="Island">
                                                    <option>Select</option>
                                                    <?php
                                                    foreach ($islands as $value) {
                                                        echo (isset($island_id) && $island_id == $value->IslandId) ? "<option value='$value->IslandId' selected>$value->IslandName</option>" : "<option value='$value->IslandId'>$value->IslandName</option>";
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
          
                                    <div class="col-md-4">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Select Hotel</label>
                                            <div class="col-md-9">
                                                <select class="form-control custom-select" id="selectHotel" name="Hotel">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
          
                                    <div class="col-md-4">
                                        <div class="form-group row"> <label class="control-label text-right col-md-3">Category of Hotel</label>
                                            <div class="col-md-9"> 
                                                <input type="text" class="form-control"  name="Category_rev" value="<?php echo $cat; ?>">
                                                 </div>
                                        </div>
                                    </div>

                                    <!--/span--> </div>
                                <hr class="m-t-10 m-b-30">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="guestname">Review</label>
                                            <textarea class="form-control" id="addressTextarea" rows="2" name="Review" ><?php echo $review; ?></textarea></div>
                                    </div>
                                </div>
                                                                    

                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">No:of Rooms</label><input class="form-control" value="<?php echo $numberofroom; ?>" type="text" name="NumberOfRooms"> </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Room Service</label><select id="roomservice" class="form-control custom-select" name="RoomService">
                                                <option value="Yes" <?php if($roomservice=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No"  <?php if($roomservice=="No"){ echo "selected";}?>>No</option>
                                            </select></div>
                                                                            
                                    


                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Tea/Coffee Maker in Room</label>
                                            <select id="tea" class="form-control custom-select" name="TeaCoffee">
                                                <option value="Yes" <?php if($tea=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No"  <?php if($tea=="No"){ echo "selected";}?>>No</option>
                                            </select></div>
                                        
                                    
                                    

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Intercom</label>
                                            <select id="inter" class="form-control custom-select" name="InterCom">
                                                <option value="Yes" <?php if($inter=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($inter=="No"){ echo "selected";}?>>No</option>
                                            </select></div>

                                    </div>

                                    <!--/span--> </div>
                                <!--/row-->
                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Hot Water</label>
                                            <select id="hotwater" class="form-control" name="HotWater"> 
                                                <option value="Yes"  <?php if($hotwater=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($hotwater=="No"){ echo "selected";}?>>No</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Pool</label><select id="pool" class="form-control custom-select" name="Pool">
                                                <option value="Yes"  <?php if($pool=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($pool=="No"){ echo "selected";}?>>No</option>
                                            </select></div>
                                        
                                    
                                    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">TV</label><select id="tv" class="form-control custom-select" name="TV">
                                                <option value="Yes"  <?php if($tv=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($tv=="No"){ echo "selected";}?>>No</option>
                                            </select></div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Minifridge</label><select id="minifridge" class="form-control custom-select" name="MiniFridge">
                                                <option value="Yes" <?php if($minifridge=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($minifridge=="No"){ echo "selected";}?>>No</option>
                                            </select></div>

                                    </div>

                                    

                                    <!--/span--> </div>

                                <!--/row-->

                                <div class="row">
                                    <!--/span-->
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Bar</label>
                                            <select id="bar" class="form-control" type="text" name="Bar"> 
                                                <option value="Yes" <?php if($bar=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($bar=="No"){ echo "selected";}?>>No</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Safe Locker</label><select id="locker" class="form-control custom-select" name="SafeLocker">
                                                <option value="Yes" <?php if($locker=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($locker=="No"){ echo "selected";}?>>No</option>
                                            </select></div>

                                    </div>
                                    
                                    
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Hair Dryer</label><select id="hairdryer" class="form-control custom-select" name="HairDryer">
                                                <option value="Yes" <?php if($hairdryer=="Yes"){ echo "selected";}?>>Yes</option>
                                                <option value="No" <?php if($hairdryer=="No"){ echo "selected";}?>>No</option>
                                            </select></div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Proximity to Beach</label><input class="form-control" type="text" name="ProximityToBeach" value="<?php echo $proximity; ?>"></div>

                                    </div>
                                </div>

                                <!--/row-->
                                <div class="row">
                                    <!--/span-->

                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Check In Time</label><input class="form-control" type="text" name="CheckInTime" value="<?php echo $checkin; ?>">
                                            <input class="form-control" type="hidden" name="hoteliid" value="<?php if(isset($hotelid)){echo $hotelid; }?>">
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="firstName1">Check Out Time</label><input class="form-control" type="text" name="CheckOutTime" value="<?php echo $checkout; ?>"></div>
                                        
                                    </div>
                                    
                                </div>

                                <!--/row--> </div>
                            <hr class="m-t-20 m-b-20">
                            <?php
                                require 'commons/add-common.php';
                                require 'commons/update-common.php';
                            ?>
                            <hr>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-12">
                                                
                                                  <?php
                                                if(isset($hotelid)) {
                                                 
                                               echo '<button type="submit" class="btn btn-success" name="UpdateHotelReview">Update Hotel Review</button>';
                                                
                                               
                                                }
                                                else{
                                                    echo '<button type="submit" class="btn btn-success" name="SaveClose_review">Save and Close</button>';
                                                echo '<button type="submit" class="btn btn-warning" name="SaveContinue_review">Save and Continue</button>';
                                                }
                                                ?>
                                                <button type="button" class="btn btn-inverse" onclick="location.href='list-hotels-review.php'">Cancel</button>
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
    <!-- footer -->
    <?php
    include 'templates/footer.php';
    
    ?>
    <script>
        jQuery(document).ready(function() {
            $('#hotelName').prop("disabled", true);
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
                            str += (hotelid == result.data[i]['HotelID']) ? '<option value="' + result.data[i]['HotelID'] + '" selected>' + result.data[i]['HotelName'] + '</option>' : '<option value="' + result.data[i]['HotelID'] + '">' + result.data[i]['HotelName'] + '</option>';
                        }
                        $("#selectHotel").html(str);
                    }
                });
            }
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
                    $('#selectHotel').prop("disabled", false);
                }
                else {
                    $('#selectHotel').prop("disabled", true);
                }
            });

            // ******To get category based on hotel selected
            $('body').on('change', "#selectHotel", function () {
        var categoryName = $("#Category_rev");
        console.log($(this).val());
        if ($.trim($(this).val()) != "Select") {
            console.log($(this).val());
            categoryName.prop("disabled", false);
            $.ajax({
                url: "php/hotels.php",
                type: 'GET',
                data: {
                    hotel_info_id: $(this).val()
                },
                dataType: "JSON",
                success: function (result) {
                    console.log("hello");
                    console.log(result);
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        str += '<option value="' + result.data[i]['HotelInfoID'] + '">' + result.data[i]['RoomCat'] + '</option>';
                        // roomCategoryArray[result.data[i]['HotelInfoID']] = result.data[i]['RoomCat'];
                        // amountForm6[result.data[i]['HotelInfoID']] = result.data[i]['PayWOGST'];
                    }
                    categoryName.html(str);
                    //                    ************This is for the edit part only
                    
                }
            });
            (function () {
                $(".summernote:not(:first)").each(function () {
                    $(this).summernote();
                });
            })();
            console.log("categoryName");
            console.log(categoryName);
        }
        else {
            categoryName.prop("disabled", true);
        }

    });

        });
    </script>

</body>
</html>
