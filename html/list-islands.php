<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
              <div class="card">
                <div class="card-block">
                  <div class="row">
                        <div class="col-md-6"> <h4 class="card-title">Manage Islands</h4>
                  <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF
                    &amp; Print</h6></div>
                          <div class="col-md-6"><a href="form-islands.php"><button class="btn btn-warning btn-circle" type="button" style="float: right">
                                      <i class="fa fa-plus"></i></button></a></div>
                      </div>

                  <div class="table-responsive m-t-20">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"

                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Action</th>                         
                        </tr>
                      </tfoot>
                      <tbody>
                          <?php
                               $islands = json_decode(getIslands($conn));
                               foreach ($islands as $value) {
                               echo "<tr>";
                               echo "<td>$value->IslandName</td>";
                               echo '<td><a href="list-hotels.php?island='.$value->IslandId.'"><i class="mdi mdi-eye" style="font-size:24px"></i></a> <a href="form-islands.php?island='.$value->IslandId.'&mode=edit"><i class="mdi mdi-pencil-circle" style="font-size:24px"></i></a> <a href="javascript:void(0);" class="subtract" data-value="'.utf8_encode($value->IslandId).'"><i class="mdi mdi-delete-circle" style="font-size:24px"></i></a> </td>';
                               echo "</tr>";                               
                               }
                         ?>
                        
                        
                      </tbody>
                    </table>
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
                                island_info: name
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
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->

  </body>
</html>
