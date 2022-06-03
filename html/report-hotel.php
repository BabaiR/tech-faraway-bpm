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
            <div class="col-12">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Reports</h4>
                    </div>
                    <div class="card-block">
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group"> <label for="lastName1">Report Type</label>
                                    <div class="input-group">
                                        <select class="form-control custom-select" id="reportType">                                            
                                            <option value="select">Select</option>                                
                                            <option value="hotelPayment">Hotel Payment</option>                                
                                            <option value="makruzz">Makruzz</option>
                                            <option value="bookingDetails">Booking Details</option>
                                            <option value="paymentStatus">Payment Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="hotelPayment checkReportType col-md-10">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="lastName1" id="reportHotelLabel1">Hotel Name</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="hotelNameReport">
                                                    <option>Select</option>                                  
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="lastName1">Payment Status</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="paymentReport">

                                                    <option value="">Select</option>                                
                                                    <option value="Advance">Advance</option>                                
                                                    <option value="Credit">Credit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="lastName1">Type Of Date</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="selectType">
                                                    <option value="">Select</option>                                
                                                    <option value="CIO">Check In/Check Out</option>                                
                                                    <option value="CO">Cut Off</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-2" id="dateSelectHotelReport" >
                                        <div class="form-group"> <label for="lastName1">Start Date/End Date </label>
                                            <div class="input-daterange input-group" id="date-range">
                                                <input class="form-control" name="start" type="text" id="startHotelPayment">
                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                <input class="form-control" name="end" type="text" id="endHotelPayment">
                                            </div>
                                        </div>
                                    </div>                                    



                                    <!--/span-->
                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="lastName1">Status</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="statusreport">
                                                    <option value="">Select</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Paid">Paid</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group"> <label for="lastName1">&nbsp;</label>
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-warning" id="generateReport">Generate</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="makruzz checkReportType col-md-10">

                                <div class="row">



                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="lastName1">Sector</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="sectorBody">
                                                    <option>PB - HL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="lastName1">Date of Sailing</label>
                                            <div class="input-daterange input-group" id="date-range">
                                                <input class="form-control" name="start" type="text" id="startSail">
                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                <input class="form-control" name="end" type="text" id="endSail">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->

                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="lastName1">Status</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="makruzzStatus">
                                                    <option value="">Select</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Confirmed">Confirmed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label for="lastName1">&nbsp;</label>
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-warning" id="makruzzGenerate">Generate</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span--> </div>


                            </div>


                            <!--/span--> </div>
                        <hr class="m-t-10 m-b-10">
                        <div class="table-responsive m-t-20">
                            <div class="hotelPayment checkReportType col-md-12">
                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered reportHoteldDtatable"

                                       cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>CV #</th>
                                            <th>Name of Guest</th>
                                            <th id="dataStatusHotelPayment">C/In - C/Out</th>
                                            <th>Hotel Name</th>
                                            <th>Amount Payable</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>CV #</th>
                                            <th>Name of Guest</th>
                                            <th>C/In - C/Out</th>
                                            <th>Hotel Name</th>
                                            <th>Amount Payable</th>
                                            <th>Amount </th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="hotelPaymentBody">                                        

                                    </tbody>
                                </table>
                            </div>
                            <div class="makruzz checkReportType col-md-12">

                                <table id="example24" class="display nowrap table table-hover table-striped table-bordered reportHoteldDtatable"

                                       cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>CV #</th>
                                            <th>Sector</th>
                                            <th>Date of Sailing</th>
                                            <th>Total Pax</th>
                                            <th>Booked</th>
                                            <th>Pending</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>CV #</th>
                                            <th>Sector</th>
                                            <th>Date of Sailing</th>
                                            <th>Total Pax</th>
                                            <th>Booked</th>
                                            <th>Pending</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="makruzzTable">


                                    </tbody>
                                </table>


                            </div>
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
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer"> © 2017 Faraway Tree Hospitality Pvt. Ltd </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== --> </div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- modal form -->
<!-- modal form -->
<div class="modal fade" id="exampleModal" tabindex="-1"

     role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">CV-1707-01-124</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div id="advanceModalForm">
                    <div class="form-group text-left" > 
                        <h4> Advance</h4>
                        <label for="agent-name"

                               class="control-label">Amount Payable</label> 

                        <input class="form-control" id="idReportHotel" type="hidden">

                        <input

                            class="form-control AmountPayableRport" type="number">
                        <input type="hidden" class="amountPayableHotelReport" >
                    </div>
                    <div class="form-group" id="cutOffDate"> <label for="firstName1">Cut of Date</label>
                        <div class="input-group"> 
                            <input class="form-control mydatepicker cutOffDateAmountPayable" placeholder="mm/dd/yyyy" type="text" id="cutOffDate1"> 
                            <span class="input-group-addon"></span> 
                        </div>
                    </div>
                    <div class="form-group" > <label for="firstName1">Status</label>
                        <select class="form-control custom-select paymentStatus12" name >
                            <option value="Pending" id="pending">Pending</option>
                            <option value="Paid" id="paid">Paid</option>
                        </select>
                    </div>


                </div> 

                <hr>




            </div>
            <div class="modal-footer"> <button type="button"

                                               class="btn btn-default" data-dismiss="modal" id="closeModalHotelReport">Close</button>
                <button type="button" class="btn btn-primary" id="updateModalSubmit" >Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- modal form ends-->




<div class="modal fade" id="makruzzModal" tabindex="-1"

     role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modaltitlelabel" id="exampleModalLabel1"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<!--                <input type="hidden" class="numberpax" value="">-->
                <input type="hidden" class="macruzzticketferryID" value="">
            </div>
            <div class="modal-body">
                <span class="makruzzBodySpanFirst">
                    <span class="makruzzBodySpan">
<!--                        <div class="row makruzzModalBodyRow">
                            <input type="hidden" class="ferryReportID" value="">

                            <div class="col-md-12">
                                <label for="firstName1" class="personInfo"><strong>Name:  | Age: </strong></label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="guestage">Ferry
                                        Name</label>
                                    <select class="form-control custom-select makruzFerryname" id="makruzzFerryname">
                                        <option>Makruzz Gold @ 0800 hrs</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control makruzzAmount"  type="number" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control makruzzPNR"  type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group makruzzStatus"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                        <option value="Pending">Pending</option>
                                        <option value="Confirmed">Confirmed</option>
                                    </select>
                                </div>
                            </div>

                        </div>-->

                    </span>

                </span>

            </div>
            <div class="modal-footer"> <button type="button"

                                               class="btn btn-default closemakruzz" id="closeReportFerry" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="makruzSubmitButton">Submit</button>
            </div>
        </div>
    </div>
</div>









<!-- All Jquery -->
<?php
require 'templates/footer.php';
?>


<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
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
<script src="assets/plugins/moment/min/moment.min.js"></script>
<script src="assets/plugins/wizard/jquery.steps.min.js"></script>
<script src="assets/plugins/wizard/jquery.validate.min.js"></script>
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="assets/plugins/wizard/steps.js"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<!-- Date range Plugin JavaScript -->
<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- icheck -->
<script src="assets/plugins/icheck/icheck.min.js"></script>
<script src="assets/plugins/icheck/icheck.init.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        
        
        $(document).ready(function() {
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
    $('.reportHoteldDtatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });






    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }

    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker({
        startDate: new Date()
    });
    $('body').on('focus', ".mydatepicker, #datepicker", function() {
        $(this).datepicker({
            startDate: new Date()
        });
    });






    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
    });


    jQuery('#date-range , .input-daterange').datepicker({
        toggleActive: true,
    });
    $('body').on('focus', "#date-range , .input-daterange", function() {
        $(this).datepicker({
            toggleActive: true,
        });
    });










    jQuery('#date-range , .input-daterange').datepicker({
        toggleActive: true,
    });
    $('body').on('focus', "#date-range , .input-daterange", function() {
        $(this).datepicker({
            toggleActive: true,
        });
    });



    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true,
        minDate: 0
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });



</script>
<script src="js/report-hotel.js"></script>

<script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
</body>
</html>
