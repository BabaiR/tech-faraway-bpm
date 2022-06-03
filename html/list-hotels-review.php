<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'templates/header.php';
require 'templates/sidebar.php';
include 'commons/common-functions.php';
?>
<style type="text/css">
            #one td {
                border: 1px solid #000;color:black;
            }

            #oneinner td {
                border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000; color:black;
            }

            #typography {font-family:cambria; font-size:11.5px; color:black;}

        </style>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Hotels Review</h4>

                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel,
                                    PDF &amp; Print</h6>
                            </div>
                            <div class="col-md-6"><a href="form-hotels-review.php"><button class="btn btn-warning btn-circle"

                                                                                    type="button" style="float: right"> <i class="fa fa-plus"></i></button></a></div>
                        </div>
                        <div class="table-responsive m-t-20">

                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered"

                                   cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Island</th>
                                        <th>Hotel Name</th>
                                        <th>Category Of Hotel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        
                                        <th>Island</th>
                                        <th>Hotel Name</th>
                                        <th>Category Of Hotel</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        $list_review = json_decode(getlistReview( $conn));
                                        foreach ($list_review  as $value) {
                                            //$island_id= $value->IslandId;
                                            //$island_name = getIslandName($island_id, $conn)[0]["IslandName"];
                                            echo "<tr>";
                                            echo "<td>$value->IslandName</td>";
                                            //echo "<td>$island_name</td>";
                                            echo "<td>$value->HotelName</td>";
                                            echo "<td>$value->Category</td>";
                                            
                                            echo '<td><a href="#" class="listHotelsreview" data-toggle="modal" data-target="#listreview"

                                                                data-whatever="@getbootstrap" data-address="'.$value->Address.'"data-hotelname="'.$value->HotelName.'" data-hotelid="'.$value->Hotel.'" data-cat="'.$value->Category.'"><i class="mdi mdi-eye" style="font-size:24px"></i></a> 
                                                                    <a href="form-hotels-review.php?hotelreviewid=' .$value->HotelReviewID . '&mode=edit"><i class="mdi mdi-pencil-circle" style="font-size:24px"></i></a>
                                                <a href="javascript:void(0);" class="subtract" data-value="'.$value->HotelReviewID .'"><i class="mdi mdi-delete-circle" style="font-size:24px"></i></a></td>';
                                            echo "</tr>";
                                        }
                                    
                                    ?>       
<!--                                     <div class="col-md-12  text-right"> <button type="button"
                                                                class="btn btn-warning snapshotButton" data-toggle="modal" data-target="#listreview"

                                                                data-whatever="@getbootstrap" >Snapshot</button></div>-->
                                 


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                        <div class="modal fade " id="listreview" tabindex="-1"

                             role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">
                                            Hotel Review
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        
                                        <span class="listhotelreview" >
                                            
                                                    <table width="750" cellspacing="0" border="0" cellpadding="5" align="center">
                                                        <tr>
                                                            <td colspan="6" style="font-family:cambria; font-size:11.5px;"><span style="color:#009900"><strong><?php echo getHotelName($value->Hotel, $conn)[0]["HotelName"]; ?></strong></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td  colspan="6">&nbsp;</td>
                                                        </tr>

                                                        <tr id="one">
                                                            <td width="129" valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Hotel Name:</strong></td>
                                                            <td width="166" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($value->Hotel, $conn)[0]["HotelName"]; ?></td>
                                                            <td width="135" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Location:</strong></td>
                                                            <td colspan="3" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($value->Hotel, $conn)[0]["Address"]; ?></td>
                                                        </tr>
                                                        <tr id="oneinner">
                                                            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Category of Hotel </strong></td>
                                                            <td colspan="5" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->Category; ?></td>
                                                        </tr>
                                                        <tr id="oneinner">
                                                            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Review:</strong></td>
                                                            <td colspan="5" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->Review; ?></td>
                                                        </tr>
                                                        <tr id="oneinner">
                                                            <td valign="top"><strong>Number of rooms:</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->NumberOfRooms; ?></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Room Service</strong></td>
                                                            <td colspan="3" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->RoomService; ?></td>
                                                        </tr>
                                                        <tr id="oneinner">
                                                            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Tea/ Coffee Maker in room:</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->TeaCoffee; ?></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Intercom</strong></td>
                                                            <td width="55" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->InterCom; ?></td>
                                                            <td width="82" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Hot Water</strong></td>
                                                            <td width="73" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->HotWater; ?></td>
                                                        </tr>
                                                        <tr id="oneinner">
                                                            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Pool</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->Pool; ?></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>TV</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->TV; ?></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Minifridge</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->MiniFridge; ?></td>
                                                        </tr>
                                                        <tr id="oneinner">
                                                            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Bar</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->Bar; ?></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Safe Locker</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->SafeLocker; ?></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>HairDryer</strong></td>
                                                            <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $value->HairDryer; ?></td>
                                                        </tr>
                                                    </table>
                                        </span>
                                        
                                    </div>
                                    
                                    <div class="modal-footer"> <button type="button"

                                                                       class="btn btn-default " id="close6Modal" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <?php
    require 'templates/footer.php';
    ?>
    <!-- This is data table -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <!--Sweet ALert-->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
            $(document).on("click",".subtract" ,function() {
                console.log($(this).attr("data-value"));
                console.log("clicked cLUW SEND");
                console.log($(this).attr("data-value"));
                var name = $(this).attr("data-value");
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
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
                                list_hotel_review: name
                            },
                            dataType: "JSON",
                            success: function(result) {
                                if (result == 1) {                                    
                                    swal({
                                        title: "Successfully",
                                        text: "Deleted the info",
                                        timer: 1500,
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
            var table = $('#example').DataTable({
                    "columnDefs": [{
                            "visible": false,
                            "targets": 2
                        }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script src="js/form-cv.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->

