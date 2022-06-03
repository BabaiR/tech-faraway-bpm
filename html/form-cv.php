<?php
require 'templates/header.php';
require 'templates/sidebar.php';
include 'commons/common-functions.php';
unset($_SESSION['voucher_id']);
if (isset($_GET['voucher']) && isset($_GET['mode']) && $_GET['mode'] == "edit") {
    $voucher = $_GET['voucher'];
    $UserID = $_SESSION['login_user'];
    $_SESSION['voucher_id'] = $_GET['voucher'];
//    if(voucherAuthantication($voucher,$conn,$UserID) == 0){ 
//        echo "<script type='text/javascript'>alert('You are not authorized');location.href='list-vouchers.php';</script>";
//    }
}

//Dont make any changes in the class name starting with "form" they are being used 
//in the js file so the functionality is class dependent
?>

<style>
    .modal-dialog {
        max-width: 90% !important;
    }    
    td.day {
        color: #04c;
    }
    .modalColumns{
        color: black;
        font-family: serif;
    }
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
        <!-- vertical wizard -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="col-md-12  text-right"> <button type="button"
                                                                class="btn btn-warning snapshotButton" data-toggle="modal" data-target="#testing"

                                                                data-whatever="@getbootstrap" >Snapshot</button></div>


                    <div class="row">
                        <div class="modal fade " id="testing" tabindex="-1"

                             role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">
                                            Snapshot
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <span class="snapshotBody" >

                                        </span>
                                        <?php /*      <div class="form-group"> 
                                          <label for="firstName1">
                                          Select Data Type
                                          </label>
                                          <select class="form-control custom-select" id="DataType">
                                          <option value="2">File Handler For FTT</option>
                                          <option value="3">File Handler For Agent</option>
                                          </select>
                                          </div>
                                          <div class="form-group text-left" id="agentForm6Modal" style="display:none;">
                                          <label for="firstName1">
                                          Select Agent Name
                                          </label>
                                          <select class="form-control custom-select" id="AgentListModal">

                                          </select>
                                          </div>
                                          <div class="form-group text-left">
                                          <label for="agent-name" class="control-label">Name</label>
                                          <input class="form-control" id="FileHandlerName" type="text">
                                          </div> */ ?>
                                    </div>
                                    <div id="waitForm6" class="alert alert-warning" style="display:none;"> Please Wait</div>
                                    <div id="successForm6" class="alert alert-success"  style="display:none;"> Successfully Added</div>
                                    <div class="modal-footer"> <button type="button"

                                                                       class="btn btn-default " id="close6Modal" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="card-block wizard-content ">
                        <form action="#" class="tab-wizard vertical wizard-circle">
                            <!-- Step 1 -->
                            <?php
                            if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                $guest_count = json_decode(getGuestCount($conn, $_SESSION['voucher_id']));
                                foreach ($guest_count as $value) {
                                    $GuestName = $value->GuestName;
                                    $Arrival = $value->Arrival;
                                    $Departure = $value->Departure;
                                    $PaymentStatus = $value->PaymentStatus;
                                    $TotalNights = $value->TotalNights;
                                    $CutOff = $value->CutOff;
                                    $Occupancy = $value->Occupancy;
                                    $ExtraAdult = $value->ExtraAdult;
                                    $ExtraChild = $value->ExtraChild;
                                    $ExtraChildWithMat = $value->ExtraChildWithMat;
                                    $Infant = $value->Infant;
                                    $InfantUnder2 = $value->InfantUnder2;
                                    $SingleOccupancy = $value->SingleOccupancy;
                                    $OccupancyRate = $value->OccupancyRate;
                                    $ExtraAdultRate = $value->ExtraAdultRate;
                                    $ExtraChildRate = $value->ExtraChildRate;
                                    $ExtraChildWithMatRate = $value->ExtraChildWithMatRate;
                                    $InfantRate = $value->InfantRate;
                                    $InfantUnder2Rate = $value->InfantUnder2Rate;
                                    $SingleOccupancyRate = $value->SingleOccupancyRate;
                                    $PortBlairNights = $value->PortBlairNights;
                                    $HavelockNights = $value->HavelockNights;
                                    $NeilIslandNights = $value->NeilIslandNights;
                                    $DiglipurNights = $value->DiglipurNights;
                                    $SingleOccFamilyRate = $value->SingleOccFamilyRate;
                                    $SingleOccFamily = $value->SingleOccFamily;
                                }
                            } else {
                                $GuestName = '';
                                $Arrival = '';
                                $Departure = '';
                                $PaymentStatus = '';
                                $TotalNights = '';
                                $CutOff = '';
                                $Occupancy = '';
                                $ExtraAdult = '';
                                $ExtraChild = '';
                                $ExtraChildWithMat = '';
                                $Infant = '';
                                $InfantUnder2 = '';
                                $SingleOccupancy = '';
                                $OccupancyRate = '';
                                $ExtraAdultRate = '';
                                $ExtraChildRate = '';
                                $ExtraChildWithMatRate = '';
                                $InfantRate = '';
                                $InfantUnder2Rate = '';
                                $SingleOccupancyRate = '';
                                $SingleOccFamilyRate = '';
                                $SingleOccFamily = '';
                                $PortBlairNights = '';
                                $HavelockNights = '';
                                $NeilIslandNights = '';
                                $DiglipurNights = '';
                            }
                            ?>
                            <h6>Guest Count</h6>
                            <section>
                                <div class="row">
<!--                                    <input type="hidden" value="0" name="currentFormID" id="currentFormID">-->
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="firstName1">Name
                                                of Guest</label> <input class="form-control" id="firstName1" name="GuestName"

                                                                    type="text" value="<?php echo!empty($GuestName) ? $GuestName : '' ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="lastName1">Arrival</label>
                                            <label for="lastName1" class="pull-right">Departure</label>
                                            <div class="input-daterange input-group" id="date-range">
                                                <input class="form-control" name="Arrival" type="text" readonly="" id="start_date_form1" value="<?php echo!empty($Arrival) && $Arrival != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($Arrival)) : ''; ?>">
                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                <input class="form-control" name="Departure" type="text" readonly="" id="end_date_form1" value="<?php echo!empty($Departure) && $Departure != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($Departure)) : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label for="emailAddress1">Total No of Nights</label> 
                                            <input class="form-control" id="nights" type="text" name="TotalNights" value="<?php echo!empty($TotalNights) ? $TotalNights : 0 ?>"> </div>
                                    </div>
                                    <div class="col-md-3">                                        <div class="form-group"> <label for="cut for payment">Payment
                                                Status</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" name="PaymentStatus" id="paymentStatus">
                                                    <option value="Advance" <?php echo!empty($PaymentStatus) && $PaymentStatus == "Advance" ? "selected='true'" : ''; ?> >Advance</option>
                                                    <option value="Credit" <?php echo!empty($PaymentStatus) && $PaymentStatus != "Advance" ? "selected='true'" : ''; ?> >Credit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> 
                                            <label for="cut for payment" id="cutOff">Cut of for Payment</label>
                                            <div class="input-group"> <input class="form-control mydatepicker"

                                                                             type="text" name="CutOff" readonly="" id="cutOffInput" value="<?php echo!empty($CutOff) && $CutOff != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($CutOff)) : ''; ?>"> <span class="input-group-addon"><i

                                                        class="icon-calender"></i></span> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group"> <label>Port Blair</label> 
                                            <input class="form-control" id="portBlairNights"  type="text" value="<?php echo!empty($PortBlairNights) ? $PortBlairNights : 0; ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label>Havelock</label> 
                                            <input class="form-control" id="havelockNights"  type="text" value="<?php echo!empty($HavelockNights) ? $HavelockNights : 0; ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label>Neil </label> 
                                            <input class="form-control" id="neilIslandNights"  type="text" value="<?php echo!empty($NeilIslandNights) ? $NeilIslandNights : 0; ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group"> <label>Diglipur</label> 
                                            <input class="form-control" id="diglipurNights"  type="text" value="<?php echo!empty($DiglipurNights) ? $DiglipurNights : 0; ?>"> 
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group"> <label>No of Adults Dbl
                                                Occupancy</label> <input class="form-control" id="noOfAdultsDbl" name="Occupancy"

                                                                     type="text" value="<?php echo!empty($Occupancy) ? $Occupancy : ''; ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Adults Dbl
                                                Occupancy</label> <input class="form-control" id="noOfAdultsDblRate" name="Occupancy"

                                                                     type="text" value="<?php echo!empty($OccupancyRate) ? $OccupancyRate : ''; ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Extra Adult</label> <input name="ExtraAdult"

                                                                                                   class="form-control" id="extraAdult" type="text" value="<?php echo!empty($ExtraAdult) ? $ExtraAdult : ''; ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Extra Adult</label> <input name="ExtraAdultRate"

                                                                                                            class="form-control" id="ExtraAdultRate" type="text" value="<?php echo!empty($ExtraAdultRate) ? $ExtraAdultRate : ''; ?>"> </div>
                                    </div>
                                </div>
                                <div class="row">                                    

                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Extra Child with
                                                Mattress (5-11)</label> <input class="form-control" name="ExtraChildWithMat" id="extraChildWith" type="text" value="<?php echo!empty($ExtraChildWithMat) ? $ExtraChildWithMat : ''; ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Extra Child with
                                                Mattress (5-11)</label> <input class="form-control" name="ExtraChildWithMat" id="extraChildWithRate" type="text" value="<?php echo!empty($ExtraChildWithMatRate) ? $ExtraChildWithMatRate : ''; ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Extra Child without
                                                Mattress (5-11)</label> <input class="form-control" name="ExtraChild" id="extraChildWM" type="text" value="<?php echo!empty($ExtraChild) ? $ExtraChild : ''; ?>"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Extra Child without
                                                Mattress (5-11)</label> <input class="form-control" name="ExtraChild" id="extraChildWMRate" type="text" value="<?php echo!empty($ExtraChildRate) ? $ExtraChildRate : ''; ?>"> </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Infant 2-4</label> 
                                            <input class="form-control" id="infant24" type="text" name="Infant" value="<?php echo!empty($Infant) ? $Infant : ''; ?>"> 
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Rate per Infant 2-4</label> 
                                            <input class="form-control" id="infant24Rate" type="text" name="InfantRate" value="<?php echo!empty($InfantRate) ? $InfantRate : ''; ?>"> 
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Infant (Under 2)</label>
                                            <input class="form-control" id="infant2" type="text" name="InfantUnder2" value="<?php echo!empty($InfantUnder2) ? $InfantUnder2 : ''; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Infant (Under 2)</label>
                                            <input class="form-control" id="infant2Rate" type="text" name="InfantUnder2Rate" value="<?php echo!empty($InfantUnder2Rate) ? $InfantUnder2Rate : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Single Occupancy</label>
                                            <input class="form-control" id="SingleOccupancy" type="text" name="SingleOccupancy"  value="<?php echo!empty($SingleOccupancy) ? $SingleOccupancy : '' ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Single Occupancy</label>
                                            <input class="form-control" id="SingleOccupancyRate" type="text" name="SingleOccupancyRate"  value="<?php echo!empty($SingleOccupancyRate) ? $SingleOccupancyRate : '' ?>">
                                        </div>
                                    </div>                                    
                                </div>

                                <!---this field added by suman-->

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Single Occupancy with Family</label>
                                            <input class="form-control" id="SingleOccFamily" type="text" name="SingleOccFamily"  value="<?php echo!empty($SingleOccFamily) ? $SingleOccFamily : '' ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Rate per Single Occupancy with Family</label>
                                            <input class="form-control" id="SingleOccFamilyRate" type="text" name="SingleOccFamilyRate"  value="<?php echo!empty($SingleOccFamilyRate) ? $SingleOccFamilyRate : '' ?>">
                                        </div>
                                    </div>                                    
                                </div>


                                <!---end-->


                                <hr class="m-t-40 m-b-40">
                                <div class="row">
                                    <?php
                                    if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                        $vehicle_count = json_decode(getVehicleCount($conn, $_SESSION['voucher_id']));
                                        $portBlairSelected = 0;
                                        $HavelockSelected = 0;
                                        $NeilSelected = 0;
                                        $DiglipurSelected = 0;
                                        for ($i = 0; $i < count($vehicle_count); $i++) {
                                            $islandSelected = $vehicle_count[$i]->IslandName;
                                            if ($islandSelected == "Port Blair") {
                                                $portBlairSelected = 1;
                                            }
                                            if ($islandSelected == "Havelock") {
                                                $HavelockSelected = 1;
                                            }
                                            if ($islandSelected == "Neil") {
                                                $NeilSelected = 1;
                                            }
                                            if ($islandSelected == "Diglipur") {
                                                $DiglipurSelected = 1;
                                            }
                                        }
                                        $carPortBlair = 0;
                                        $coachPortBlair = 0;
                                        $tempoPortBlair = 0;
                                        $carPortBlairNumber = 1;
                                        $coachPortBlairNumber = 1;
                                        $tempoPortBlairNumber = 1;
                                        $carHavelock = 0;
                                        $coachHavelock = 0;
                                        $carHavelockNumber = 1;
                                        $coachHavelockNumber = 1;
                                        $carDiglipur = 0;
                                        $coachDiglipur = 0;
                                        $carDiglipurNumber = 1;
                                        $coachDiglipurNumber = 1;
                                        $carNeil = 0;
                                        $carNeilNumber = 1;

                                        for ($i = 0; $i < count($vehicle_count); $i++) {
                                            $VehicleType = $vehicle_count[$i]->VehicleType;

                                            if ($VehicleType == "Car Port Blair") {
                                                $carPortBlair = 1;
                                                $carPortBlairNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Coach Port Blair") {
                                                $coachPortBlair = 1;
                                                $coachPortBlairNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Tempo Port Blair") {
                                                $tempoPortBlair = 1;
                                                $tempoPortBlairNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Havelock Car") {
                                                $carHavelock = 1;
                                                $carHavelockNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Havelock Coach") {
                                                $coachHavelock = 1;
                                                $coachHavelockNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Diglipur Car") {
                                                $carDiglipur = 1;
                                                $carDiglipurNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Diglipur Tempo") {
                                                $coachDiglipur = 1;
                                                $coachDiglipurNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                            if ($VehicleType == "Neil Car") {
                                                $carNeil = 1;
                                                $carNeilNumber = $vehicle_count[$i]->VehicleNumber;
                                            }
                                        }
                                    } else {
                                        $portBlairSelected = 0;
                                        $HavelockSelected = 0;
                                        $DiglipurSelected = 0;
                                        $NeilSelected = 0;
                                        $carPortBlair = 0;
                                        $coachPortBlair = 0;
                                        $tempoPortBlair = 0;
                                        $carPortBlairNumber = 1;
                                        $coachPortBlairNumber = 1;
                                        $tempoPortBlairNumber = 1;
                                        $carHavelock = 0;
                                        $coachHavelock = 0;
                                        $carHavelockNumber = 1;
                                        $coachHavelockNumber = 1;
                                        $carDiglipur = 0;
                                        $coachDiglipur = 0;
                                        $carDiglipurNumber = 1;
                                        $coachDiglipurNumber = 1;
                                        $carNeil = 0;
                                        $carNeilNumber = 1;
                                    }
                                    ?>

                                    <div class="col-md-12">

                                        <div class="form-group"> 
                                            <label for="guestname">Islands Covered</label>
                                            <div class="input-group">
                                                <span style="padding:10px;"><input  type="checkbox" class="islandName" name="PortBlair" id="portBlair" value="Port Blair"  <?php echo $portBlairSelected != 0 ? "checked" : '' ?>>
                                                    <label style="padding-left:5px !important">Port Blair</label></span>
                                                <span style="padding:10px;"><input  type="checkbox" id="havelock" class="islandName" name="havelock" value="Havelock" <?php echo $HavelockSelected != 0 ? "checked" : '' ?>> 
                                                    <label style="padding-left:5px !important">Havelock</label></span>
                                                <span style="padding:10px;"><input  type="checkbox" id="neil" name="neil" class="islandName" value="Neil" <?php echo $NeilSelected != 0 ? "checked" : '' ?>>
                                                    <label style="padding-left:5px !important">Neil</label></span>    
                                                <span style="padding:10px;"><input  type="checkbox" id="diglipur" name="diglipur" class="islandName" value="Diglipur" <?php echo $DiglipurSelected != 0 ? "checked" : '' ?>>
                                                    <label style="padding-left:5px !important">Diglipur</label></span>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 vehicles_div" id="vehicle_portBlair">
                                    <div class="row">
                                        <div class="col-md-12"> <label for="guestname">Select Vehicle Type For Port Blair</label>
                                            <div class="input-group">                     


                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName" name="carForm" id="car_portBlair" value="Car Port Blair" <?php echo $carPortBlair != 0 ? "checked" : '' ?>><label style="padding-left:5px !important">Car</label></span>
                                                <span style="padding:10px;"><input type="text" style="width:30px;" id="count_car_portBlair" class="vehicleCount" value="<?php echo $carPortBlairNumber ?>" > </span>
                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName" name="coachForm" id="coach_portBlair" value="Coach Port Blair" <?php echo $coachPortBlair != 0 ? "checked" : '' ?>><label style="padding-left:5px !important">Coach</label></span>
                                                <span style="padding:10px;"><input type="text" style="width:30px;" class="vehicleCount" id="count_coach_portBlair" value="<?php echo $coachPortBlairNumber ?>"> </span>
                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName" name="tempoForm" id="tempo_portBlair" value="Tempo Port Blair" <?php echo $tempoPortBlair != 0 ? "checked" : '' ?>><label style="padding-left:5px !important">Tempo</label> </span>                                               
                                                <span style="padding:10px;"><input type="text" style="width:30px;"  id="count_tempo_portBlair" class="vehicleCount" value="<?php echo $tempoPortBlairNumber ?>"> </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="m-t-40 m-b-40"> </div>
                                <div class="col-md-10" id="vehicle_havelock">
                                    <div class="row">
                                        <div class="col-md-8"> <label for="guestname">Select Vehicle Type For Havelock</label>
                                            <div class="input-group">

                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName " name="carForm" id="car_havelock" value="Havelock Car" <?php echo $carHavelock != 0 ? "checked" : '' ?> ><label style="padding-left:5px !important">Car</label></span>
                                                <span style="padding:10px;"><input type="text" style="width:30px;" id="count_car_havelock" value="<?php echo $carHavelockNumber ?>" class="vehicleCount"> </span>
                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName" name="coachForm" id="coach_havelock" value="Havelock Coach" <?php echo $coachHavelock != 0 ? "checked" : '' ?>> <label style="padding-left:5px !important">Coach</label></span>
                                                <span style="padding:10px;"><input type="text" style="width:30px;" id="count_coach_havelock" value="<?php echo $coachHavelockNumber ?>" class="vehicleCount">   </span>                                                                                                  
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="m-t-40 m-b-40"> </div>
                                <div class="col-md-10" id="vehicle_neil">
                                    <div class="row">
                                        <div class="col-md-8"> <label for="guestname">Select Vehicle Type For Neil</label>
                                            <div class="input-group">
                                                <span style="padding:10px;"><input  type="checkbox" name="carForm" class="vehicleName" id="car_neil" value="Neil Car" <?php echo $carNeil != 0 ? "checked" : '' ?>><label style="padding-left:5px !important">Car</label></span>
                                                <span style="padding:10px;"><input type="text" style="width:30px;" id="count_car_neil" value="<?php echo $carNeilNumber ?>" class="vehicleCount"></span> 
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="m-t-40 m-b-40"> </div>
                                <div class="col-md-10" id="vehicle_diglipur">
                                    <div class="row">
                                        <div class="col-md-8"> <label for="guestname">Select Vehicle Type For Diglipur</label>
                                            <div class="input-group">

                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName " name="carForm" id="car_diglipur" value="Diglipur Car" <?php echo $carDiglipur != 0 ? "checked" : '' ?> ><label style="padding-left:5px !important">Car</label></span>
                                                <span style="padding:10px;"><input type="text" style="width:30px;" id="count_car_diglipur" value="<?php echo $carDiglipurNumber ?>" class="vehicleCount"> </span>
                                                <span style="padding:10px;"><input type="checkbox" class="vehicleName" name="coachForm" id="coach_diglipur" value="Diglipur Tempo" <?php echo $coachDiglipur != 0 ? "checked" : '' ?>> <label style="padding-left:5px !important">Tempo</label></span>
                                                <!--                                                The id and class will be used so kept as coach instead of tempo-->
                                                <span style="padding:10px;"><input type="text" style="width:30px;" id="count_coach_diglipur" value="<?php echo $coachDiglipurNumber ?>" class="vehicleCount">              </span>                                                                                       
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="m-t-40 m-b-40"> </div>

                                <hr class="m-t-40 m-b-40">
                                <?php /*   <div class="row">
                                  <div class="col-md-12 pull-right">
                                  <div class="form-group">
                                  <button class="btn btn-warning save" type="button" style="float: right" >
                                  Save
                                  </button>
                                  </div>
                                  </div>
                                  </div> */ ?>
                                <hr class="m-t-40 m-b-40"> 

                            </section>
                            <!-- Step 2 -->
                            <h6>Guest Info</h6>
                            <?php
                            if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                $guest_info = json_decode(steps('guest_info', $conn, $_SESSION['voucher_id']));

                                $contact_number = array_key_exists(0, $guest_info) ? $guest_info[0]->ContactNumber : '';
                                $len_guest_info = count($guest_info);
                            } else {
                                $contact_number = '';
                                $len_guest_info = 0;
                            }
                            ?>
                            <section class="form2section">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>Contact Number  (GUEST)</label> 
                                            <input class="form-control" id="contactNumber" type="text" name="ContactNumber" value="<?php echo $contact_number != '' ? $contact_number : ''; ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6"> &nbsp; </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <button class="btn btn-warning btn-circle" type="button" style="float: right" id="addForm2">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="form2count" id="form2count" value="<?php echo $len_guest_info; ?>">
                                <span class="form2span">
                                    <?php
                                    if ($len_guest_info != 0) {
                                        for ($i = 0; $i < $len_guest_info; $i++) {
                                            ?>
                                            <span class = "form2Row" data-id = "<?php echo $i ?>">
                                                <div class = "row">
                                                    <hr class = "m-t-40 m-b-40">
                                                    <div class = "col-md-6">
                                                        <div class = "form-group">
                                                            <label for = "guestname" class = "guestNameLabel">Guest Name <?php echo ($i + 1); ?> </label>
                                                            <input class = "form-control guestName" id = "guestname" type = "text" name = "GuestName" value="<?php echo $guest_info[$i]->GuestName; ?>">
                                                        </div>
                                                    </div>
                                                    <div class = "col-md-6">
                                                        <div class = "form-group"> <label for = "guestage">Age</label>
                                                            <input class = "form-control guestAge" id = "guestage" type = "number" name = "Age" value="<?php echo $guest_info[$i]->Age; ?>">
                                                        </div>
                                                    </div>
                                                    <hr class = "m-t-40 m-b-40">
                                                </div>
                                                <div class = "row form2RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?> data-id = "<?php echo $i ?>">
                                                    <div class = "col-md-12">
                                                        <button class = "btn btn-danger btn-circle form2RowDeleteButton" type = "button" style = "float: right" data-id = "<?php echo $i ?>">
                                                            <i class = "fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class = "m-t-40 m-b-40">
                                            </span>
                                            <?php
                                        }
                                    } else {
                                        ?>

                                        <span class="form2Row" data-id="0">
                                            <div class="row">                                    
                                                <hr class="m-t-40 m-b-40"> 
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label for="guestname" class="guestNameLabel">Guest Name 1 </label> 
                                                        <input class="form-control guestName" id="guestname" type="text" name="GuestName"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label for="guestage">Age</label>
                                                        <input class="form-control guestAge" id="guestage" type="text" name="Age">
                                                    </div>
                                                </div>                                    
                                                <hr class="m-t-40 m-b-40"> 
                                            </div>
                                            <div class="row form2RowDelete" style = "display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form2RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-t-40 m-b-40"> 
                                        </span>

                                        <?php
                                    }
                                    ?>
                                </span>
                                <hr class="m-t-40 m-b-40"> 
                            </section>
                            <!-- Step 3 -->
                            <?php
                            if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                $Arrival_info = json_decode(steps('ticket_info', $conn, $_SESSION['voucher_id']));
                                $len_arrival_info = count($Arrival_info);
                            } else {
                                $len_arrival_info = 0;
                            }
                            ?>
                            <h6>Ticket Info</h6>
                            <section>
                                <input type="hidden" id="hiddenCountF31" value="1">
                                <span class="form31Span">
                                    <?php
                                    if ($len_arrival_info != 0) {
                                        for ($i = 0; $i < $len_arrival_info; $i++) {
                                            ?>
                                            <span class=" form31Row" data-id="<?php echo $i ?>">
                                                <div class="row" >
                                                    <div class="col-md-4">
                                                        <div class="form-group"> <label>Arrival Flight Name</label>
                                                            <select class="form-control arrival-flight-form3" id="arrivalFlight">
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "AIR INDIA" ? 'selected' : '' ?>>AIR INDIA</option>
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "SPICE JET" ? 'selected' : '' ?>>SPICE JET</option>
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "INDIGO" ? 'selected' : '' ?>>INDIGO</option>
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "VISTARA" ? 'selected' : '' ?>>VISTARA</option>
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "JET AIRWAYS" ? 'selected' : '' ?>>JET AIRWAYS</option>
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "GO AIR" ? 'selected' : '' ?>>GO AIR</option>
                                                                <option <?php echo $Arrival_info[$i]->ArrivalFlightName == "TBA" ? 'selected' : '' ?>>TBA</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label>Flight Number</label>                                                     
                                                            <input class="form-control  ArrivalflightNumberForm3" type="text" value="<?php echo $Arrival_info[$i]->FlightNumber ?>"> 
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4"> <label>Arrival Time</label>
                                                        <div class="input-group clockpicker " data-placement="bottom" data-align="bottom" data-autoclose="true"> 
                                                            <input class="form-control arrival-time-form3" value="<?php echo $Arrival_info[$i]->ArrivalTime; ?>" type="text"> <span class="input-group-addon" >
                                                                <span class="fa fa-clock-o"></span> </span> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form31RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?> data-id="<?php echo $i ?>">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-danger btn-circle form31RowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="m-t-20 m-b-20">
                                            </span>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class=" form31Row" data-id="0">
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <div class="form-group"> <label>Arrival Flight Name</label>
                                                        <select class="form-control arrival-flight-form3" id="arrivalFlight">
                                                            <option>AIR INDIA</option>
                                                            <option>SPICE JET</option>
                                                            <option>INDIGO</option>
                                                            <option>VISTARA</option>
                                                            <option>JET AIRWAYS</option>
                                                            <option>GO AIR</option>
                                                            <option>TBA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"> 
                                                    <div class="form-group">
                                                        <label>Flight Number</label>                                                     
                                                        <input class="form-control  ArrivalflightNumberForm3" type="text" value=""> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4"> <label>Arrival Time</label>
                                                    <div class="input-group clockpicker " data-placement="bottom" data-align="bottom" data-autoclose="true"> 
                                                        <input class="form-control arrival-time-form3" value="13:14" type="text"> <span class="input-group-addon">
                                                            <span class="fa fa-clock-o"></span> </span> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form31RowDelete" style="display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form31RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-t-20 m-b-20">
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </span>
                                <div class="row">
                                    <div class="col-md-12"> 
                                        <button class="btn btn-warning btn-circle" type="button" style="float: right" id="addForm31button">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="m-t-20 m-b-20"> 
                                <span class="form31DepartureSpan">                        

                                    <?php
                                    if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                        $Departure_info = json_decode(steps('ticket_info_depature', $conn, $_SESSION['voucher_id']));
                                        $len_departure_info = count($Departure_info);
                                    } else {
                                        $len_departure_info = 0;
                                    }
                                    ?>
                                    <?php
                                    if ($len_departure_info != 0) {
                                        for ($i = 0; $i < $len_departure_info; $i++) {
                                            ?>
                                            <span class=" form31DepartureRow" data-id="<?php echo $i; ?>">
                                                <div class="row" >                                            

                                                    <div class="col-md-4">
                                                        <div class="form-group"> <label>Departure Flight Name</label>                                                            
                                                            <select class="form-control departure-flight-form3" id="arrivalFlight">
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "AIR INDIA" ? 'selected' : '' ?>>AIR INDIA</option>
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "SPICE JET" ? 'selected' : '' ?>>SPICE JET</option>
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "INDIGO" ? 'selected' : '' ?>>INDIGO</option>
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "VISTARA" ? 'selected' : '' ?>>VISTARA</option>
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "JET AIRWAYS" ? 'selected' : '' ?>>JET AIRWAYS</option>
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "GO AIR" ? 'selected' : '' ?>>GO AIR</option>
                                                                <option <?php echo $Departure_info[$i]->DepartureFlightName == "TBA" ? 'selected' : '' ?>>TBA</option>
                                                            </select>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> 
                                                        <div class="form-group">
                                                            <label>Flight Number</label>                                                     
                                                            <input class="form-control  DepartureflightNumberForm3" type="text" value="<?php echo $Departure_info[$i]->FlightNumber ?>"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"> <label>Departure Time</label>
                                                        <div class="input-group clockpicker" data-placement="bottom" data-align="bottom" data-autoclose="true"> 
                                                            <input class="form-control  departure-time-form3" type="text" value="<?php echo $Departure_info[$i]->DepartureTime; ?>" > 
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-clock-o"></span> 
                                                            </span> 
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row form31DepartureRowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?>  data-id="<?php echo $i; ?>">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-danger btn-circle form31DepartureRowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="m-t-20 m-b-20">
                                            </span>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class=" form31DepartureRow" data-id="0">
                                            <div class="row" >                                            

                                                <div class="col-md-4">
                                                    <div class="form-group"> <label>Departure Flight Name</label>                                                        
                                                        <select class="form-control departure-flight-form3">
                                                            <option>AIR INDIA</option>
                                                            <option>SPICE JET</option>
                                                            <option>INDIGO</option>
                                                            <option>VISTARA</option>
                                                            <option>JET AIRWAYS</option>
                                                            <option>GO AIR</option>
                                                            <option>TBA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"> 
                                                    <div class="form-group">
                                                        <label>Flight Number</label>                                                     
                                                        <input class="form-control  DepartureflightNumberForm3" type="text" value=""> 
                                                    </div>
                                                </div>
                                                <div class="col-md-4"> <label>Departure Time</label>
                                                    <div class="input-group clockpicker" data-placement="bottom" data-align="bottom" data-autoclose="true"> 
                                                        <input class="form-control  departure-time-form3" value="13:14" type="text" id=""> 
                                                        <span class="input-group-addon">
                                                            <span class="fa fa-clock-o"></span> </span> </div>
                                                </div>

                                            </div>
                                            <div class="row form31DepartureRowDelete" style = "display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form31DepartureRowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-t-20 m-b-20">
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </span>

                                <div class="row">
                                    <div class="col-md-12"> 
                                        <button class="btn btn-warning btn-circle" type="button" style="float: right" id="addForm31Departurebutton">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <hr class="m-t-20 m-b-20"> 

                                <div class="row">
                                    <?php
                                    if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                        $Ticket_speacial_remark = json_decode(steps('ticket_special_remark', $conn, $_SESSION['voucher_id']));
                                        $len_speacial_remark = count($Ticket_speacial_remark);
                                    } else {
                                        $len_speacial_remark = 0;
                                    }
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <h4 for="guestname">Ferry Ticket</h4><br />
                                            <span id="ferryTicketForm3check">                                                
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12"> 
                                            <button class="btn btn-warning btn-circle" id="addForm32button" type="button" style="float: right"><i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <input type="hidden" id="hiddenCountF32" value="1">
                                        <div class="form-group">
                                            <h4 for="guestname">Any Special Remarks </h4>
                                            <span class="form32Span">
                                                <?php
                                                if ($len_speacial_remark != 0) {
                                                    for ($i = 0; $i < $len_speacial_remark; $i++) {
                                                        ?>

                                                        <span class="form32Row"  data-id="<?php echo $i; ?>">               
                                                            <div>
                                                                <label for="guestname" class="guestName32">Remark <?php echo ($i + 1) ?></label>
                                                                <input class="form-control SpeacialRemarkForm3"  value="<?php echo $Ticket_speacial_remark[$i]->SpeacialRemark ?>" type="text">                                                                                                 
                                                            </div>
                                                            <div class="row form32RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?>  data-id="<?php echo $i ?>">
                                                                <div class="col-md-12"> 
                                                                    <button class="btn btn-danger btn-circle form32RowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </span>
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <span class="form32Row"  data-id="0">               
                                                        <div>
                                                            <label for="guestname" class="guestName32">Remark 1</label>
                                                            <input class="form-control SpeacialRemarkForm3" type="text">                                                                                                 
                                                        </div>
                                                        <div class="row form32RowDelete" style="display: none;" data-id="0">
                                                            <div class="col-md-12"> 
                                                                <button class="btn btn-danger btn-circle form32RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </span>
                                                    <?php
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Status of Ticket</h4>
                                    </div>
                                </div>                                
                                <span class="form33Span">
                                    <span class="form33Row" data-id="noshow" style="display:none;">
                                        <div class="row">
                                            <input type="hidden" class="ferryTicketID" data-id="">
                                            <div class="col-md-4"> <label><strong id="form33Label">PB - HL</strong></label>
                                                <div class="form-group"> 
                                                    <label for="firstName1">Date of Sailing</label>
                                                    <div class="input-group"> 
                                                        <input class="form-control from33Sailing" type="text" readonly=""> 
                                                        <span class="input-group-addon">
                                                            <i class="icon-calender"></i>
                                                        </span> 
                                                    </div>
                                                </div>                                                
                                            </div>

                                            <div class="col-md-4"> <label><strong>&nbsp;</strong></label>
                                                <div class="form-group"> <label for="guestname">Status
                                                    </label> <select class="form-control custom-select form33Status">
                                                        <option>Pending</option>
                                                        <option>Confirmed</option>
                                                    </select>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-4"> <label><strong>&nbsp;</strong></label>
                                                <div class="form-group"> <label for="guestage">Ferry
                                                        Name</label>
                                                    <select class="form-control custom-select form33FerryName">

                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                        <hr class="m-t-40 m-b-40"> 
                                    </span>


                                </span>

                                <hr class="m-t-40 m-b-40">

                            </section>
                            <!-- Step 4 -->
                            <?php
                            if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                $RoomBlocking = steps('hotel_blocking_request', $conn, $_SESSION['voucher_id']);
                                echo "<script type='text/javascript'>var AccomodationInfoForm4 =" . $RoomBlocking . "</script>";
                                $RoomBlocking = json_decode($RoomBlocking);
                                $len_roomblocking = count($RoomBlocking);
                            } else {
                                $len_roomblocking = 0;
                            }
                            ?>
                            <h6>Acommodation</h6>
                            <section>

                                <span class="form41Span">
                                    <?php
                                    if ($len_roomblocking != 0) {
                                        for ($i = 0; $i < $len_roomblocking; $i++) {
                                            ?>

                                            <span class="form41Row" data-id="<?php echo $i; ?>">
                                                <input type="hidden" class="HotelBlockingID_form41" value="<?php echo $RoomBlocking[$i]->HotelBlockingID; ?>" >  
                                                <div class="row hideOnRecheck">
                                                    <div class="col-md-3">
                                                        <div class="form-group"> <label for="firstName1">Location</label>
                                                            <select class="form-control custom-select SelectedIslandForm41 recheckInHide">
                                                                <option>Select</option>
                                                                <?php
                                                                $islands = json_decode(getIslands($conn));
                                                                foreach ($islands as $value) {
                                                                    echo ($value->IslandId == $RoomBlocking[$i]->SelectedIsland) ? "<option value='$value->IslandId'  selected >$value->IslandName</option>" : "<option value='$value->IslandId'>  $value->IslandName</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            <label for="lastName1">Hotel Name</label>
                                                            <div class="input-group">                                                                
                                                                <select class="form-control custom-select HotelSelectedForm41" disabled="true">
                                                                    <option></option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            <label for="cut for payment">Meal Plan</label>

                                                            <div class="input-group">
                                                                <select class="form-control custom-select MealPlanForm41">
                                                                    <option <?php echo $RoomBlocking[$i]->MealPlan == "CP - Continental Plan" ? 'selected' : '' ?> value="CP - Continental Plan">CP - Continental Plan</option>
                                                                    <option <?php echo $RoomBlocking[$i]->MealPlan == "MAP - Modified American Plan" ? 'selected' : '' ?> value="MAP - Modified American Plan">MAP - Modified American Plan</option>
                                                                    <option <?php echo $RoomBlocking[$i]->MealPlan == "AP - American Plan" ? 'selected' : '' ?>value="AP - American Plan">AP - American Plan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            <label for="emailAddress1">Room Category</label>
                                                            <select class="form-control custom-select RoomSelectedForm41">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group"> 

                                                            <label for="emailAddress1">C/In and C/Out</label>
                                                            <div class="input-daterange input-group form41DateRange" id="date-range">
                                                                <input class="form-control CheckInForm41" name="start" type="text" value="<?php echo!empty($RoomBlocking[$i]->CheckIn) && $RoomBlocking[$i]->CheckIn != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($RoomBlocking[$i]->CheckIn)) : ''; ?>">
                                                                <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                                <input class="form-control CheckOutForm41" name="end" type="text" value="<?php echo!empty($RoomBlocking[$i]->CheckOut) && $RoomBlocking[$i]->CheckOut != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($RoomBlocking[$i]->CheckOut)) : ''; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <div class="form-group"> <label>No of Nights</label>
                                                            <input class="form-control NumberOfNightsForm41" id="nights" type="text" value="<?php echo $RoomBlocking[$i]->NumberOfNights; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <div class="form-group"> 
                                                            <label>No of Rooms</label> 
                                                            <input class="form-control NumberOfRoomsForm41"  type="text" value="<?php echo $RoomBlocking[$i]->NumberOfRooms; ?>"> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> <label>Status</label>
                                                            <select class="form-control custom-select StatusForm41">
                                                                <option <?php echo $RoomBlocking[$i]->Status == "Not Sent" ? 'selected' : '' ?>>Not Sent</option>
                                                                <option <?php echo $RoomBlocking[$i]->Status == "Pending" ? 'selected' : '' ?>>Pending</option>
                                                                <option <?php echo $RoomBlocking[$i]->Status == "Confirmed" ? 'selected' : '' ?>>Confirmed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form41RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?>  data-id="<?php echo $i; ?>">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-danger btn-circle form41RowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <hr class="m-t-20 m-b-20">
                                                <div class="row hideOnRecheck">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-warning recheckInAdd" type="button"  style="float: right" data-id="0">
                                                            ReCheck In
                                                        </button>
                                                    </div>
                                                </div>

                                            </span>
                                            <?php
                                            
                                        }
                                    } else {
                                        ?>
                                        <span class="form41Row" data-id="0" >
                                            <input type="hidden" class="HotelBlockingID_form41" value="" >  
                                            <div class="row hideOnRecheck">
                                                <div class="col-md-3">
                                                    <div class="form-group"> <label for="firstName1">Location</label>
                                                        <select class="form-control custom-select SelectedIslandForm41">
                                                            <option>Select</option>
                                                            <?php
                                                            $islands = json_decode(getIslands($conn));
                                                            foreach ($islands as $value) {
                                                                echo "<option value='$value->IslandId'>$value->IslandName</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group"> 
                                                        <label for="lastName1">Hotel Name</label>
                                                        <div class="input-group">
                                                            <select class="form-control custom-select HotelSelectedForm41" disabled="true">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> 
                                                        <label for="cut for payment">Meal Plan</label>

                                                        <div class="input-group">
                                                            <select class="form-control custom-select MealPlanForm41">
                                                                <option>CP - Continental Plan</option>
                                                                <option>MAP - Modified American Plan</option>
                                                                <option>AP - American Plan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> 
                                                        <label for="emailAddress1">Room Category</label>
                                                        <select class="form-control custom-select RoomSelectedForm41">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group"> 

                                                        <label for="emailAddress1">C/In and C/Out</label>
                                                        <div class="input-daterange input-group form41DateRange" id="date-range">
                                                            <input class="form-control CheckInForm41" name="start" type="text">
                                                            <span class="input-group-addon bg-info b-0 text-white">to</span>
                                                            <input class="form-control CheckOutForm41" name="end" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">

                                                    <div class="form-group"> <label>No of Nights</label>
                                                        <input class="form-control NumberOfNightsForm41"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">

                                                    <div class="form-group"> 
                                                        <label>No of Rooms</label> 
                                                        <input class="form-control NumberOfRoomsForm41"  type="text"> 
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> <label>Status</label>
                                                        <select class="form-control custom-select StatusForm41">
                                                            <option>Not Sent</option>
                                                            <option>Pending</option>
                                                            <option>Confirmed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                        
                                            <div class="row form41RowDelete" style="display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form41RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row hideOnRecheck">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-warning recheckInAdd" type="button"  style="float: right" data-id="0">
                                                        ReCheck In
                                                    </button>
                                                </div>
                                            </div>

                                            <hr class="m-t-20 m-b-20">


                                        </span>
                                        <?php
                                    }
                                    ?>

                                </span>

                                <div class="row">
                                    <div class="col-md-12"> 
                                        <button class="btn btn-warning btn-circle" type="button" id="form41add" style="float: right">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php /*      <button type="button" id="save" class="btn btn-success">
                                          Save
                                          </button> */ ?>
                                        <button type="button" id="saveAndGenerate" class="btn btn-warning" >Save
                                            and Generate Room Blocking Request</button> </div>
                                    <div class="modal fade" id="roomrequest" tabindex="-1" role="dialog"

                                         aria-labelledby="roomrequestLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="roomrequestLabel1">Room Blocking Request</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <table>
                                                        <tr>
                                                            <td colspan="4">&nbsp;</td>
                                                            <td colspan="4" id="nameOfGuestModal4">nbsp;</td>
                                                            <td id="totalPaxModals4">Total Pax : 6 </td>
                                                            <td id="adultsModals4">Adult : 3</td>
                                                            <td id="childModal4">Child : 1</td>
                                                            <td id="infantModal4">Infants : 2</td>
                                                        </tr>
                                                    </table>
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Location</th>
                                                                    <th>Hotel Name</th>
                                                                    <th>Meal Plan</th>
                                                                    <th>Room Category</th>
                                                                    <th>C/In</th>
                                                                    <th>C/Out</th>
                                                                    <th>No of nights</th>
                                                                    <th>No of rooms</th>                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody id="formGenerate41">                                                                
                                                                <tr>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-t-40 m-b-40">
                                <h4 for="guestname">Extras as requested </h4>
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        <button class="btn btn-warning btn-circle" type="button" style="float: right" id="form42Add"><i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php
                                if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                    $Accomodation_info42 = json_decode(steps('accommodation_info', $conn, $_SESSION['voucher_id']));
                                    $len_accomodation_info42 = count($Accomodation_info42);
                                } else {
                                    $len_accomodation_info42 = 0;
                                }
                                ?>
                                <span class="form42Span">
                                    <?php
                                    if ($len_accomodation_info42 != 0) {
                                        for ($i = 0; $i < $len_accomodation_info42; $i++) {
                                            ?>
                                            <span class="form42Row" data-id="<?php echo $i ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"> 
                                                            <label for="guestname">Description</label>
                                                            <textarea class="form-control DescriptionForm42" id="addressTextarea" rows="3"><?php echo $Accomodation_info42[$i]->Description; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label>Price</label> 
                                                            <input class="form-control PriceForm42"  type="text" value="<?php echo $Accomodation_info42[$i]->Price; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form42RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?>  data-id="<?php echo $i ?>">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-danger btn-circle form42RowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="m-t-40 m-b-40">
                                            </span>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class="form42Row" data-id="0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group"> 
                                                        <label for="guestname">Description</label>
                                                        <textarea class="form-control DescriptionForm42" id="addressTextarea" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label>Price</label> 
                                                        <input class="form-control PriceForm42"  type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form42RowDelete" style="display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form42RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-t-40 m-b-40">
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </span>

                                <hr class="m-t-40 m-b-40"> 
                            </section>
                            <!-- Step 5 -->
                            <h6>Itinerary</h6>
                            <section>
                                <?php
                                if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                    $Itenarray_info = json_decode(steps('itenarary', $conn, $_SESSION['voucher_id']));
                                    $len_itenarary_info = count($Itenarray_info);
                                } else {
                                    $len_itenarary_info = 0;
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-4">&nbsp;</div>
                                    <div class="col-md-4">
                                        <div class="form-group"> <label>Package Name</label> 
                                            <input class="form-control" id="PackageName4" value="<?php echo (isset($Itenarray_info) && !empty($Itenarray_info)) ? $Itenarray_info[0]->PackageName : ''; ?>" type="text"> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">&nbsp;</div>
                                </div>
                                <span class="form5Span">
                                    <?php
                                    if ($len_itenarary_info != 0) {
                                        for ($i = 0; $i < $len_itenarary_info; $i++) {
                                            ?>
                                            <span class="form5Row" data-id="<?php echo $i ?>">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group"> <label for="firstName1">Select Date</label> &nbsp; <label class="dayOnTheDate" style='float:right'><?php echo!empty($Itenarray_info[$i]->SelectDate) && $Itenarray_info[$i]->SelectDate != "0000-00-00 00:00:00" ? date("l", strtotime($Itenarray_info[$i]->SelectDate)) : ''; ?></label>  
                                                            <div class="input-group"> 
                                                                <input class="form-control SelectDateForm5" type="text" value="<?php echo!empty($Itenarray_info[$i]->SelectDate) && $Itenarray_info[$i]->SelectDate != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($Itenarray_info[$i]->SelectDate)) : ''; ?>"> 

                                                                <span class="input-group-addon">
                                                                    <i class="icon-calender"></i>
                                                                </span> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                 <div class="col-md-2">
                                                        <div class="form-group"> <label for="firstName1">Select Island</label> &nbsp; 
                                                            <div class="input-group"> 
                                                                <select class="form-control custom-select SelectedIslandForm5 ">
                                                                <option>Select</option>
                                                                <?php
                                                                $islands = json_decode(getIslands($conn));
                                                                foreach ($islands as $value) {
                                                                    echo ($value->IslandId == $Itenarray_info[$i]->SelectedIsland) ? "<option value='$value->IslandId'  selected >$value->IslandName</option>" : "<option value='$value->IslandId'>  $value->IslandName</option>";
                                                                }
                                                                ?>
                                                            </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group"> <label>Remark</label> <input

                                                                class="form-control RemarkForm5"  type="text" value="<?php echo $Itenarray_info[$i]->Remark ?>"> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group"> <label for="guestname">
                                                                Brief Itinerary </label><textarea class="form-control BriefItenararyForm5"

                                                                                              id="addressTextarea" rows="3"><?php echo $Itenarray_info[$i]->BriefItenarary ?></textarea></div>
                                                    </div>
                                                </div>
                                                <div class="row detailedItinearary">
                                                    <div class="col-12"> 
                                                        <label for="guestname">Detailed Itinerary </label>
                                                        <div class="card">
                                                            <div class="card-block">
                                                                <div class="summernote" id="summerNote<?php echo $i != 0 ? $i : ''; ?>">                                                                    
                                                                    <?php echo $Itenarray_info[$i]->DetailedItenarary ?>                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form5RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?> data-id="<?php echo $i; ?>">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-danger btn-circle form5RowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="m-t-40 m-b-40">
                                            </span>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class="form5Row" data-id="0">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group"> <label for="firstName1">Select Date</label> &nbsp; <label class="dayOnTheDate" style='float:right'></label> 
                                                        <div class="input-group"> 
                                                            <input class="form-control SelectDateForm5" readonly type="text"> 
                                                            <span class="input-group-addon">
                                                                <i class="icon-calender"></i>
                                                            </span> 
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <div class="form-group"> <label for="firstName1">Select Island</label>
                                                        <div class="input-group"> 
                                                            <select class="form-control custom-select SelectedIslandForm5">
                                                            <option>Select</option>
                                                            <?php
                                                            $islands = json_decode(getIslands($conn));
                                                            foreach ($islands as $value) {
                                                                echo "<option value='$value->IslandId'>$value->IslandName</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group"> <label>Remark</label> <input

                                                            class="form-control RemarkForm5"  type="text"> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group"> <label for="guestname">Brief
                                                            Itinerary </label><textarea class="form-control BriefItenararyForm5"

                                                                                    id="addressTextarea" rows="3"></textarea></div>
                                                </div>
                                            </div>
                                            <div class="row detailedItinearary">
                                                <div class="col-12"> 
                                                    <label for="guestname">Detailed Itinerary </label>
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="summernote" id="summerNote">
                                                                <h3></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form5RowDelete" style="display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form5RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-t-40 m-b-40">
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </span>


                                <div class="row">
                                    <div class="col-md-12"> <button class="btn btn-warning btn-circle form5Add" type="button" style="float: right"><i class="fa fa-plus"></i></button></div>
                                </div>
                                <hr class="m-t-40 m-b-40">

                                <hr class="m-t-40 m-b-40"> 
                            </section>
                            <!-- Step 6 -->
                            <h6>Closure</h6>
                            <section>
                                <div class="row">
                                    <div class="col-md-12  text-right"> <button type="button"

                                                                                class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"

                                                                                data-whatever="@getbootstrap" id="addFttModalForm6">Add</button></div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"

                                         role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel1">
                                                        Add Data
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group"> 
                                                        <label for="firstName1">
                                                            Select Data Type
                                                        </label>
                                                        <select class="form-control custom-select" id="DataType">                                                            
                                                            <option value="2">File Handler For FTT</option>
                                                            <option value="3">File Handler For Agent</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group text-left" id="agentForm6Modal" style="display:none;"> 
                                                        <label for="firstName1">
                                                            Select Agent Name
                                                        </label>
                                                        <select class="form-control custom-select" id="AgentListModal">                                                            

                                                        </select> 
                                                    </div>
                                                    <div class="form-group text-left"> 
                                                        <label for="agent-name" class="control-label">Name</label> 
                                                        <input class="form-control" id="FileHandlerName" type="text"> 
                                                    </div>
                                                </div>
                                                <div id="waitForm6" class="alert alert-warning" style="display:none;"> Please Wait</div>
                                                <div id="successForm6" class="alert alert-success"  style="display:none;"> Successfully Added</div>
                                                <div class="modal-footer"> <button type="button"

                                                                                   class="btn btn-default" id="close6Modalclose" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="addForm6Modal">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>








                                <?php
                                if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                    $Closure_info = steps('closure', $conn, $_SESSION['voucher_id']);
                                    echo "<script type='text/javascript'>var ClosureForm6 =" . $Closure_info . "</script>";
                                    $Closure_info = json_decode($Closure_info);
                                    $Agents = getAllAgent($conn);
                                    $Agents = json_decode($Agents);
                                    $FttAgent = getAllFttAgent($conn);
                                    $FttAgent = json_decode($FttAgent);
                                    $fhAgent  = isset($Closure_info[0]->Agent)?getfhAgent($Closure_info[0]->Agent,$conn):json_encode([]);
                                    $fhAgent = json_decode($fhAgent);
                                    //lokesh('hihi');
                                } else {
                                    
                                }
                                ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="firstName1">Agent</label>                                            

                                            <select class="form-control custom-select" id="AgentForm61">
                                                <?php
                                                if (isset($Agents)) {
                                                    foreach ($Agents as $key => $value) {
                                                        ?>                                                
                                                <option value='<?php echo $value->AgentID; ?>' <?php echo ($value->AgentID == $Closure_info[0]->Agent) ? 'selected':'' ?> > <?php echo $value->CompanyName; ?></option>
                                                            <?php
                                                    }
                                                }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <!-- /.modal --> </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="lastName1">File
                                                Handler For FTT</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="FileHandlerForm61">
                                                    
                                                <?php
                                                if (isset($FttAgent)) {
                                                    foreach ($FttAgent as $key => $value) {
                                                        ?>
                                                <option value='<?php echo $value->FIleHandlerName; ?>' <?php echo ($value->FIleHandlerName == $Closure_info[0]->FileHandlerFTT) ? 'selected':'' ?> > <?php echo $value->FIleHandlerName; ?></option>
                                                            <?php
                                                    }
                                                }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="cut for payment">File
                                                Handler For Agent</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="FileHandlerAgentForm61">
                                                <?php
                                                if (isset($fhAgent)) {
                                                    foreach ($fhAgent as $key => $value) {
                                                        ?>
                                                
                                                <option value='<?php echo $value->FileHandlerID; ?>' <?php echo ($value->FileHandlerID == $Closure_info[0]->FileHandlerAgent) ? 'selected':'' ?> > <?php echo $value->FIleHandlerName; ?></option>
                                                            <?php
                                                    }
                                                }
                                                ?>    
                                                    
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Package Amount</label>
                                            <input class="form-control" type="text" id="PackageAmountForm61" value="<?php echo isset($Closure_info[0]->PackageAmount) ? $Closure_info[0]->PackageAmount : ''; ?> ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="cut for payment">GST
                                                Included (5%)</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="GSTIncludedForm61">                                                    
                                                    <option <?php echo isset($Closure_info[0]->GSTIncluded) && $Closure_info[0]->GSTIncluded == "Yes" ? "selected" : '' ?>>Yes</option>
                                                    <option <?php echo isset($Closure_info[0]->GSTIncluded) && $Closure_info[0]->GSTIncluded == "No" ? "selected" : '' ?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="cut for payment">Payment
                                                Terms</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="PaymentTermsForm61">
                                                    <option <?php echo isset($Closure_info[0]->PaymentTerms) && $Closure_info[0]->PaymentTerms == "Advance" ? "selected" : '' ?>>Advance</option>
                                                    <option <?php echo isset($Closure_info[0]->PaymentTerms) && $Closure_info[0]->PaymentTerms == "Credit" ? "selected" : '' ?>>Credit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> 
                                            <label>File Reference Number</label> 
                                            <input class="form-control" type="text" id="FileReferenceNumberForm61" value="<?php echo isset($Closure_info[0]->FileReferenceNumber) ? $Closure_info[0]->FileReferenceNumber : ''; ?>"> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label>Additional payment
                                                made during tour</label> 
                                            <input class="form-control" type="text" id="AdditionalPaymentForm61" value="<?php echo isset($Closure_info[0]->AdditionalPayement) ? $Closure_info[0]->AdditionalPayement : ''; ?>"> </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="firstName1">Due
                                                By</label>
                                            <div class="input-group"> <input class="form-control mydatepicker"

                                                                             placeholder="mm/dd/yyyy" type="text" id="DueByForm61" value="<?php echo!empty($Closure_info[0]->AdditionalPayement) && $Closure_info[0]->AdditionalPayement != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($Closure_info[0]->AdditionalPayement)) : ''; ?>"> <span class="input-group-addon"><i

                                                        class="icon-calender"></i></span> </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="cut for payment">Status</label>
                                            <div class="input-group">
                                                <select class="form-control custom-select" id="StatusForm61">
                                                    <option <?php echo isset($Closure_info[0]->Status) && $Closure_info[0]->Status == "Unpaid" ? "selected" : '' ?>>Unpaid</option>
                                                    <option <?php echo isset($Closure_info[0]->Status) && $Closure_info[0]->Status == "Paid" ? "selected" : '' ?>>Paid</option>                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-t-40 m-b-40">
                                <div class="row">
                                    <div class="col-md-12"> <button class="btn btn-warning btn-circle" type="button" id="addForm62" style="float: right"><i class="fa fa-plus"></i></button></div>
                                    <?php
                                    if (isset($_SESSION['voucher_id']) && isset($_GET['mode'])) {
                                        $PaymentStatus_info = steps('payment_status', $conn, $_SESSION['voucher_id']);
                                        $PaymentStatus_info = json_decode($PaymentStatus_info);
                                        $len_paymentStatus_info = count($PaymentStatus_info);
                                    } else {
                                        $len_paymentStatus_info = 0;
                                    }
                                    ?>
                                </div>
                                <hr class="m-t-40 m-b-40">
                                <span class="form62Span">
                                    <?php
                                    if ($len_paymentStatus_info != 0) {
                                        for ($i = 0; $i < $len_paymentStatus_info; $i++) {
                                            ?>

                                            <span class="form62Row" data-id="<?php echo $i; ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4>Payment Status</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            <label for="firstName1">Date of Payment</label>
                                                            <div class="input-group"> <input class="form-control mydatepicker DateOfPaymentForm62" placeholder="mm/dd/yyyy" type="text" value="<?php echo!empty($PaymentStatus_info[$i]->DateOfPayment) && $PaymentStatus_info[$i]->DateOfPayment != "0000-00-00 00:00:00" ? date("m/d/Y", strtotime($PaymentStatus_info[$i]->DateOfPayment)) : ''; ?>"> 
                                                                <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> <label for="cut for payment">Confirmation
                                                                Via</label>
                                                            <div class="input-group">
                                                                <select class="form-control custom-select ConfirmationViaForm62">
                                                                    <option <?php echo $PaymentStatus_info[$i]->ConfirmationVia == "Email" ? "selected" : '' ?>>Email</option>
                                                                    <option <?php echo $PaymentStatus_info[$i]->ConfirmationVia == "Telephone" ? "selected" : '' ?>>Telephone</option>
                                                                    <option <?php echo $PaymentStatus_info[$i]->ConfirmationVia == "Benazir" ? "selected" : '' ?>>Benazir</option>
                                                                    <option <?php echo $PaymentStatus_info[$i]->ConfirmationVia == "Bank Statement" ? "selected" : '' ?>>Bank Statement</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> <label>Payment Amount</label>
                                                            <input class="form-control PaymentAmountForm62"  type="text" value="<?php echo $PaymentStatus_info[$i]->PaymentAmount; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> <label>TDS Cut</label>
                                                            <input class="form-control TDSCutForm62" type="text" value="<?php echo $PaymentStatus_info[$i]->TDSCut; ?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form62RowDelete" <?php echo $i == 0 ? 'style = "display: none;"' : ''; ?> data-id="<?php echo $i; ?>">
                                                    <div class="col-md-12"> 
                                                        <button class="btn btn-danger btn-circle form62RowDeleteButton" type="button" style="float: right"  data-id="<?php echo $i ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr class="m-t-40 m-b-40">
                                            </span>                                        
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <span class="form62Row" data-id="0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4>Payment Status</h4>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group"> <label for="firstName1">Date
                                                            of Payment</label>
                                                        <div class="input-group"> <input class="form-control mydatepicker DateOfPaymentForm62" placeholder="mm/dd/yyyy" type="text"> <span class="input-group-addon"><i class="icon-calender"></i></span> </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> <label for="cut for payment">Confirmation
                                                            Via</label>
                                                        <div class="input-group">
                                                            <select class="form-control custom-select ConfirmationViaForm62">
                                                                <option>Email</option>
                                                                <option>Telephone</option>
                                                                <option>Benazir</option>
                                                                <option>Bank Statement</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> <label>Payment Amount</label>
                                                        <input class="form-control PaymentAmountForm62"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group"> <label>TDS Cut</label>
                                                        <input class="form-control TDSCutForm62" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form62RowDelete" style="display: none;" data-id="0">
                                                <div class="col-md-12"> 
                                                    <button class="btn btn-danger btn-circle form62RowDeleteButton" type="button" style="float: right"  data-id="0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <hr class="m-t-40 m-b-40">
                                        </span>
                                        <?php
                                    }
                                    ?>
                                </span>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group "> <label for="firstName1">Discrepancy
                                                if any</label> </div>
                                    </div>
                                    <input type="hidden" value="0" id="DiscrepancyForm61">
                                    <div class="col-md-6">
                                        <h4 id="DiscrepencyAmount"></h4>
                                    </div>
                                </div>
                                <hr class="m-t-40 m-b-40">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap" id="roomPaymentForm6">Room Payment Status Pop-up</button>
                                    </div>
                                </div>
                                <hr class="m-t-40 m-b-40">


                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Hotel Payment Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelHotelPaymentStatusModal"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>

                                                                <th>Hotel Name</th>                                                                                                                                
                                                                <th>Payment Term</th>                                                                    
                                                                <th>Amount</th>
                                                                <th>Amount Payable</th>
                                                                <th>Cut Of Date(If applicable)</th>
                                                                <th>Payment Status</th>                                                                    
                                                            </tr>
                                                        </thead>
                                                        <tbody id="form61ModalTable">                                                                


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer"> 
                                                <button type="button" class="btn btn-default" data-dismiss="modal" id="closeForm6Modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="submitModalForm6">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 pull-right"> 
                                        <div class="form-group">                                                
                                            <button class="btn btn-warning" type="button" style="float: right" name="service" id="serviceConfirmation" >
                                                Client Service Confirmation
                                            </button>
                                            <button class="btn btn-warning" type="button" style="float: right" name="block" id="roomBlockingConfirmed">
                                                Room Blocking Confirmed
                                            </button>
                                            <button class="btn btn-warning" type="button" style="float: right" name="block" id="generateInvoice">
                                                Generate Invoice
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr class="m-t-40 m-b-40"> 

                            </section>
                        </form>
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
    include 'templates/footer.php';
    $Closure_info1111 = "hihihihi";
    ?>
    <script src="assets/plugins/moment/min/moment.min.js"></script>
    <script src="assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/plugins/wizard/steps.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- icheck -->
    <script src="assets/plugins/icheck/icheck.min.js"></script>
    <script src="assets/plugins/icheck/icheck.init.js"></script>
    <script>
        if ((new URL(location.href)).searchParams.get("mode") == "edit") {
            
            setTimeout(function() {
                console.log("data from lokesh after 2 sec");
                console.log(ClosureForm6);
                var form6Agent = ClosureForm6[0]["Agent"];
                var form6FileHandlerFTT = ClosureForm6[0]["FileHandlerFTT"];
                var form6FileHandlerAgent = ClosureForm6[0]["FileHandlerAgent"];
                console.log(form6Agent);
                console.log(form6FileHandlerFTT);
                console.log(form6FileHandlerAgent);
                $("#AgentForm61").val(form6Agent);
                $("#FileHandlerForm61").val(form6FileHandlerFTT);
                $("#FileHandlerAgentForm61").val(form6FileHandlerAgent);
                $("#AgentForm61").trigger("change");
            }, 3000);
        }
        
        
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('body').on('focus', ".clockpicker", function() {
            $(this).clockpicker({
                donetext: 'Done',
            }).find('input').change(function() {
                console.log(this.value);
            });
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
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
        
        // Date Picker
        $("#start_date_form1 , #end_date_form1 ").change(function() {
            
            
            
            jQuery('.from33Sailing').datepicker({
                startDate: new Date($("#start_date_form1").val()),
                endDate: new Date($("#end_date_form1").val())
            });
            $('body').on('focus', ".from33Sailing ", function() {
                $(this).datepicker({
                    startDate: new Date($("#start_date_form1").val()),
                    endDate: new Date($("#end_date_form1").val())
                });
            });
            
            $('.SelectDateForm5').datepicker('remove');
            $(this).datepicker({
                startDate: new Date($("#start_date_form1").val()),
                endDate: new Date($("#end_date_form1").val())
            });
            
            jQuery('.SelectDateForm5').datepicker({
                startDate: new Date($("#start_date_form1").val()),
                endDate: new Date($("#end_date_form1").val())
            });
            $('body').on('focus', ".SelectDateForm5", function() {
                $(this).datepicker({
                    startDate: new Date($("#start_date_form1").val()),
                    endDate: new Date($("#end_date_form1").val())
                });
            });
            $(".form41DateRange").each(function() {
                $(this).datepicker("remove");
                $(this).datepicker({
                    startDate: new Date($("#start_date_form1").val()),
                    endDate: new Date($("#end_date_form1").val())
                });
            });
        });
        jQuery('.SelectDateForm5').datepicker({
            startDate: new Date()
                    
        });
        $('body').on('focus', ".SelectDateForm5", function() {
            $(this).datepicker({
                startDate: new Date()
                        
            });
        });
        
        if ($("#start_date_form1").val() != "" && $("#end_date_form1").val() != "") {
            
            $('body').on('focus', ".SelectDateForm5", function() {
                $(this).datepicker("remove");
                $(this).datepicker({
                    startDate: $("#start_date_form1").val(),
                    endDate: $("#end_date_form1").val()
                            
                });
            });
        }
        
        jQuery('.from33Sailing, #datepicker').datepicker({
            startDate: new Date($("#start_date_form1").val()),
            endDate: new Date($("#end_date_form1").val())
        });
        $('body').on('focus', ".from33Sailing, #datepicker", function() {
            $(this).datepicker({
                startDate: new Date($("#start_date_form1").val()),
                endDate: new Date($("#end_date_form1").val())
            });
        });
        
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true,
            startDate: new Date()
                    
        });
        
        
        jQuery('#date-range , .input-daterange').datepicker({
            toggleActive: true,
            startDate: new Date()
                    
        });
        $('body').on('focus', "#date-range , .input-daterange", function() {
            $(this).datepicker({
                toggleActive: true,
                startDate: new Date()
            });
        });
        
        
        
        
        $('body').on('focus', ".form41DateRange", function() {
            $(this).datepicker({
                toggleActive: true,
                startDate: new Date()
            });
        });
        if ($("#start_date_form1").val() != "" && $("#end_date_form1").val() != "") {
            $('body').on('focus', ".form41DateRange", function() {
                $(this).datepicker("remove");
                $(this).datepicker({
                    toggleActive: true,
                    startDate: $("#start_date_form1").val(),
                    endDate: $("#end_date_form1").val()
                });
            });
        }
        
        
        
        
        jQuery('#date-range , .input-daterange').datepicker({
            toggleActive: true,
            startDate: new Date(),
        });
        $('body').on('focus', "#date-range , .input-daterange", function() {
            $(this).datepicker({
                toggleActive: true,
                startDate: new Date()
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
            startDate: new Date()
                    
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
            startDate: new Date()
                    
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2015',
            maxDate: '06/30/2015',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse',
            startDate: new Date(),
            dateLimit: {
                days: 6
            }
        });
        
    </script>
    <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            $("a[href='#next']").html('Save And Next');
            
            $('#summerNote').summernote({
                height: 350, // set editor height                
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: false // set focus to editable area after initializing summernote                        
            });
            
            $('body').on('focus', ".inline-editor", function() {
                
                $(this).summernote({
                    airMode: true
                            
                });
            });
            
            
            
        });
        
        window.edit = function() {
            
            $(".click2edit").summernote()
        },
                window.save = function() {
            
            $(".click2edit").summernote('destroy');
        }
        
        
    </script>
    <script src="js/form-cv.js"></script>
    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->

</body>
</html>
