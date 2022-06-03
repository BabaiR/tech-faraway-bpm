<?php
require_once 'connections/connection.php';
include 'commons/common-functions.php';
date_default_timezone_set("Asia/Kolkata");
if (isset($_GET['voucher'])) {
    updateVoucher($conn , $_GET['voucher']);
    $voucher_id = $_GET['voucher'];
    $guest_count = json_decode(getGuestCount($conn, $voucher_id));
    $vehicle_info = json_decode(steps("vehicle_info", $conn, $voucher_id));
    $guest_info = json_decode(steps("guest_info", $conn, $voucher_id));
    $ticket_info = json_decode(steps("ticket_info", $conn, $voucher_id));
    $ticket_info_depature = json_decode(steps("ticket_info_depature", $conn, $voucher_id));
    $ticket_special_remark = json_decode(steps("ticket_special_remark", $conn, $voucher_id));
    $ticket_ferry_info = json_decode(steps("ticket_ferry_info", $conn, $voucher_id));
    $accommodation = json_decode(steps("accommodation", $conn, $voucher_id));
    $accommodation_info = json_decode(steps("accommodation_info", $conn, $voucher_id));
    $itenarary = json_decode(steps("itenarary", $conn, $voucher_id));
    $closure = json_decode(steps("closure", $conn, $voucher_id));
    $hotel_blocking_request = json_decode(steps("hotel_blocking_request", $conn, $voucher_id));
    $itenarary = json_decode(steps("itenarary", $conn, $voucher_id));
    $client = json_decode(steps("client_service_confirmation", $conn, $voucher_id));
    isset($closure[0]->Agent) && !empty($closure[0]->Agent)  ?$agent_info = json_decode(getAgent($closure[0]->Agent, $conn)):"";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Client Service Confirmation Voucher</title>

        <style type="text/css">
            #one td {
                border: 1px solid #000;
            }

            #oneinner td {
                border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;
            }

            #typography {font-family:cambria; font-size:11.5px }

            a {color: #009900;}
            p, a span {color: #000;}
            .style1 {color: #0070c0}
            .style3 {color: #0070c0; font-weight: bold; font-size:12.5px; }
            .style4 {
                color: #009900;
                font-weight: bold;
                font-size:12.5px;
            }
        </style>
        <script type="text/javascript"> var flag = 0;</script>

    </head>

    <body id="typography">


        <table width="600" cellspacing="0" cellpadding="5" align="center">

            <tr>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td width="539" style="font-family:cambria; font-size:11.5px;"><img src="http://farawaytree-andaman.com/img/logo_web.png" width="100" height="100" /></td>
                <td width="339" align="right" style="font-family:cambria; font-size:11.5px;">Faraway Tree Hospitality Private Limited <br />
                    Second Floor at No. 6 <br />(New No. 17, Old No. 9), <br />Second Link Street, <br />(Opposite St. Isabel’s hospital),<br />C.I.T.Colony, Mylapore, Chennai - 600004 <br />M +91-9500-555912 | T +91-44-2498-0114 | T +91-44-4206-9995</td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;"><strong><u>CLIENT SERVICE CONFIRMATION - <?php echo $client[0]->ConfirmationNumber ?></u></strong></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Docket Number:</strong> <?php echo $client[0]->DocketNumber; ?></td>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Booking Date:</strong> <?php echo date("dS F , Y", strtotime($client[0]->CreatedOn)); ?></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Traveller Name:</strong> <?php echo $guest_count[0]->GuestName; ?></td>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Agent:</strong> <?php echo isset($agent_info[0]->CompanyName) ? $agent_info[0]->CompanyName : ''; ?></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Prepared By:</strong> <?php echo isset($closure[0]->FileHandlerFTT) ? $closure[0]->FileHandlerFTT : ''; ?> </td>
                <td>&nbsp;</td>
            </tr>
            <?php
            $ExtraAdult = $guest_count[0]->ExtraAdult == '' ? 0 : intval($guest_count[0]->ExtraAdult);
            $Occupancy = $guest_count[0]->Occupancy == '' ? 0 : intval($guest_count[0]->Occupancy);
            $SingleOccupancy = $guest_count[0]->SingleOccupancy == '' ? 0 : intval($guest_count[0]->SingleOccupancy);
            $SingleOccfamily = $guest_count[0]->SingleOccFamily == '' ? 0 : intval($guest_count[0]->SingleOccFamily);
            $ExtraChildWithMat = $guest_count[0]->ExtraChildWithMat == '' ? 0 : intval($guest_count[0]->ExtraChildWithMat);
            $ExtraChild = $guest_count[0]->ExtraChild == '' ? 0 : intval($guest_count[0]->ExtraChild);
            $Infant = $guest_count[0]->Infant == '' ? 0 : intval($guest_count[0]->Infant);
            $child = $ExtraChildWithMat + $ExtraChild;
            $Infant2 = $guest_count[0]->InfantUnder2 == '' ? 0 : intval($guest_count[0]->InfantUnder2);
            $totalInfant = $Infant + $Infant2;
            ?>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><strong>No. of Adults:</strong> <?php echo $ExtraAdult + $Occupancy + $SingleOccupancy + $SingleOccfamily; ?> Adults</td>
                <td style="font-family:cambria; font-size:11.5px;"><strong>No. of Children:</strong> <?php echo ($child < 10 && $child > 0) ? "0" . $child . " children +" : $child . " children + ";
            echo ($totalInfant < 10 && $totalInfant > 0) ? "0" . $totalInfant . " infant" : $totalInfant . " infant"; ?>  </td>
            </tr>

            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Arrival Date:</strong> 
                    <span class="style3"><?php echo date("dS F , Y", strtotime($guest_count[0]->Arrival)); ?></span></td>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Arrival Flight:</strong> <span class="style3"><?php echo $ticket_info[0]->ArrivalFlightName . " " . $ticket_info[0]->FlightNumber . " @ " . substr($ticket_info[0]->ArrivalTime, 0, strrpos($ticket_info[0]->ArrivalTime, ':')); ?> Hrs</span></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Departure Date:</strong> <span class="style3"><?php echo date("dS F , Y", strtotime($guest_count[0]->Departure)); ?></span></td>
                <td style="font-family:cambria; font-size:11.5px;"><strong>Departure Flight:</strong> <span class="style3"><?php echo $ticket_info_depature[0]->DepartureFlightName . " " . $ticket_info_depature[0]->FlightNumber . " @ " . substr($ticket_info_depature[0]->DepartureTime, 0, strrpos($ticket_info_depature[0]->DepartureTime, ':'));
            ?> Hrs</span></td> 
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><span class="style4">Contact Number: <?php echo isset($guest_info[0]->ContactNumber) ? $guest_info[0]->ContactNumber : ''; ?></span></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <p>&nbsp;</p>

        <table width="600" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td align="center" style="font-family:cambria; font-size:11.5px;"><u><strong>CLIENT SERVICES</strong></u></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><u><strong>ACCOMMODATION</strong></u></td>
            </tr>
        </table>





        <span class="formBlockspan">












            <?php
            $len = count($hotel_blocking_request);

            for ($i = 0; $i < $len; $i++) {
                $flag = 0;
                $k=0;
                echo "<script type='text/javascript'>flag = 0;</script>";
                for ($j = 1; $j < $len; $j++) {
                    if ($hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$j]->RoomSelected) {
                        if($flag==0){
                        $flag = 1;
                        $k=$j;
                        echo "<script type='text/javascript'>flag = 0;</script>";
                        }
                    }
                }
                if ($hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$i]->RoomSelected && ($i != 0) && $k==$i) {
                    ?>
             <div class="tableRoomBlocking recheckinClass">
                    <span class="formBlockRow" data-id="<?php echo $hotel_blocking_request[0]->HotelBlockingID; ?>">
                        <p>&nbsp;</p>
                        <table width="600" cellspacing="0" border="0" cellpadding="5" align="center">
                            <tr id="one">
                                <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;">Establishment Details</td>
                                <td colspan="2" align="center" style="border-left:none; font-family:cambria; font-size:11.5px;">Reservation Details</td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Name</td>

                                <td width="288" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["HotelName"]; ?>
                                    <br/>
                                    <?php
                                    $hotel_review = json_decode(checkintime($conn, $hotel_blocking_request[$i]->HotelSelected));

                                    echo isset($hotel_review[0]->CheckInTime) ? "C/IN:  ". $hotel_review[0]->CheckInTime : '';
                                    echo isset($hotel_review[0]->CheckOutTime) ? "  &nbsp;&nbsp;&nbsp; C/OUT:  " . $hotel_review[0]->CheckOutTime : '';
                                    ?>
                                </td>

                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Location <br />
                                    Area</td>
                                <td width="210" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getIslandName($hotel_blocking_request[0]->SelectedIsland, $conn)[0]["IslandName"]; ?></td>
                            </tr>

                            <tr id="oneinner">
                                <td width="82" rowspan="3" valign="top" style="font-family:cambria; font-size:11.5px;">Address</td>
                                <td rowspan="3" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["Address"]; ?></td>
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Room Type </td>


                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php echo $hotel_blocking_request[0]->NumberOfRooms; ?>  
                                    <?php echo " " . getHotelInfo_ID($hotel_blocking_request[0]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <br/>
                                    <span class="stripLastPlus">
                                        <?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) > 0 && (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily))< 10 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) . " Adults +" : (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily))>=10 ? (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) . " Adults +":"" ?>
                                            <?php echo (($guest_count[0]->ExtraAdult > 0) && ($guest_count[0]->ExtraAdult < 10)) ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : $guest_count[0]->ExtraAdult >= 10?$guest_count[0]->ExtraAdult :"" ?>
                                                <?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? "0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>
                                </td>

                            </tr>
                            <tr id="oneinner">
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">Meal Basis</td>
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php
                                    echo substr($hotel_blocking_request[0]->MealPlan, 0, strpos($hotel_blocking_request[0]->MealPlan, ' ')) . "<br/>";
                                    ?>
                                </td>
                            </tr>
                            <tr id="oneinner">
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Rooms</td>


                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
        <?php echo $hotel_blocking_request[0]->NumberOfRooms; ?>  
        <?php echo " " . getHotelInfo_ID($hotel_blocking_request[0]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    
                                </td>



                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Tel</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["ContactNumber"]; // echo $guest_info[0]->ContactNumber    ?></td>
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Status</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong><?php echo $hotel_blocking_request[0]->Status; ?></strong></td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Nights</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
        <?php
        $n1 = isset($hotel_blocking_request[$i]->NumberOfNights) ? intval($hotel_blocking_request[$i]->NumberOfNights) : 0;
        $n2 = isset($hotel_blocking_request[0]->NumberOfNights) ? intval($hotel_blocking_request[0]->NumberOfNights) : 0;
        $totalNights = $n1 + $n2;
        echo str_pad($totalNights, 2, '0', STR_PAD_LEFT) . " Night(s) <br/>";
        ?>
                                </td>
                                <td colspan="2" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <strong>In :</strong>
                                    <?php echo!empty($hotel_blocking_request[0]->CheckIn) && $hotel_blocking_request[0]->CheckIn != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[0]->CheckIn)) : ''; ?> <br /><strong>Out : </strong><?php echo!empty($hotel_blocking_request[0]->CheckOut) && $hotel_blocking_request[0]->CheckOut != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[0]->CheckOut)) : ''; ?>
                                    <hr/>
                                    <strong>Re-Check In</strong>   
                                    <hr/>
									<strong>In :</strong>
                                    <?php echo!empty($hotel_blocking_request[$i]->CheckIn) && $hotel_blocking_request[$i]->CheckIn != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckIn)) : ''; ?> <br /><strong>Out : </strong><?php echo!empty($hotel_blocking_request[$i]->CheckOut) && $hotel_blocking_request[$i]->CheckOut != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckOut)) : ''; ?>

                                </td>                            
                            </tr>
                           
                            <tr id="oneinner">
                                <td colspan="1" align="left" style="font-family:cambria; font-size:11.5px;">Payment</td>

                                <td colspan="5" align="left" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["PaymentTerms"] ?></td>
                            </tr>
                            <tr id="oneinner">
                                <td colspan="1" align="left" style="font-family:cambria; font-size:11.5px;">Total Number of Pax</td>

                                <td colspan="5" align="left" style="border-left:none; font-family:cambria; font-size:11.5px;" >
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? "0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    

                                </td>



                            </tr>
                            <tr><td colspan="6">&nbsp;</td></tr>
                        </table>
                        <br></br>
                    </span>
             </div>
        <?php
    } else {
        if ($i == 0 && $flag == 1) {
            continue;
        }
        ?>
             <div class="tableRoomBlocking">
                    <span class="formBlockRow" data-id="<?php echo $hotel_blocking_request[$i]->HotelBlockingID; ?>">
                        
                        <table width="600" cellspacing="0" border="0" cellpadding="5" align="center">
                            <tr id="one">
                                <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;">Establishment Details</td>
                                <td colspan="2" align="center" style="border-left:none; font-family:cambria; font-size:11.5px;">Reservation Details</td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Name</td>

                                <td width="288" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["HotelName"]; ?></strong>
                                    <br/>
									
        <?php
        $hotel_review = json_decode(checkintime($conn, $hotel_blocking_request[$i]->HotelSelected));

        echo isset($hotel_review[0]->CheckInTime) ? "C/IN:  " . $hotel_review[0]->CheckInTime : '';
        echo isset($hotel_review[0]->CheckOutTime) ? "  &nbsp;&nbsp;&nbsp; C/OUT:  " . $hotel_review[0]->CheckOutTime : '';
        ?>
                                    <br/>
								
                                </td>

                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Location <br />
                                    Area</td>
                                <td width="210" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getIslandName($hotel_blocking_request[$i]->SelectedIsland, $conn)[0]["IslandName"]; ?></td>
                            </tr>

                            <tr id="oneinner">
                                <td width="82" rowspan="3" valign="top" style="font-family:cambria; font-size:11.5px;">Address</td>
                                <td rowspan="3" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["Address"]; ?></td>
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Room Type </td>


                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
        <?php echo $hotel_blocking_request[$i]->NumberOfRooms; ?>  
        <?php echo " " . getHotelInfo_ID($hotel_blocking_request[$i]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <br/>
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy + intval($guest_count[0]->SingleOccFamily))) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? "0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>
                                </td>

                            </tr>
                            <tr id="oneinner">
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">Meal Basis</td>
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">
        <?php
        echo substr($hotel_blocking_request[$i]->MealPlan, 0, strpos($hotel_blocking_request[$i]->MealPlan, ' ')) . "<br/>";
        ?>
                                </td>
                            </tr>
                            <tr id="oneinner">
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Rooms</td>


                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php echo $hotel_blocking_request[$i]->NumberOfRooms; ?>  
        <?php echo " " . getHotelInfo_ID($hotel_blocking_request[$i]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <br/>
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    
                                </td>



                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Tel</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["ContactNumber"]; // echo $guest_info[0]->ContactNumber    ?></td>
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Status</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong><?php echo $hotel_blocking_request[$i]->Status; ?></strong></td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82"  valign="top" style="font-family:cambria; font-size:11.5px;">Nights</td>
                                <td  valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
        <?php
        $n2 = isset($hotel_blocking_request[$i]->NumberOfNights) ? intval($hotel_blocking_request[$i]->NumberOfNights) : 0;

        echo str_pad($n2, 2, '0', STR_PAD_LEFT) . " Night(s) <br/>";
        ?>
                                </td>
                                <td colspan="2" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <strong>In :</strong>
                                    <?php echo!empty($hotel_blocking_request[$i]->CheckIn) && $hotel_blocking_request[$i]->CheckIn != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckIn)) : ''; ?> <br /><strong>Out : </strong><?php echo!empty($hotel_blocking_request[$i]->CheckOut) && $hotel_blocking_request[$i]->CheckOut != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckOut)) : ''; ?>

                                </td>                            
                            </tr>
                            <tr id="oneinner">
                                <td colspan="1" align="left" style="font-family:cambria; font-size:11.5px;">Payment</td>

                                <td colspan="5" align="left" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["PaymentTerms"] ?></td>
                            </tr>
                            <tr id="oneinner">
                                <td colspan="1" align="left" style="font-family:cambria; font-size:11.5px;">Total Number of Pax</td>

                                <td colspan="5" align="left" style="border-left:none; font-family:cambria; font-size:11.5px;" >
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? "0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    

                                </td>



                            </tr>
                            <tr><td colspan="6">&nbsp;</td></tr>
                        </table>
                        <br></br>
                    </span>
             </div>
        <?php
    }
}
?>

        </span>

    </body>

    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><u><strong>Passenger Names</strong></u></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;">
                <ol>
<?php
foreach ($guest_info as $key => $value) {
    ?>
                        <li><?php echo $value->GuestName; ?> <?php echo $value->Age != '' ? "- " . $value->Age : ''; ?></li>
    <?php
}
?>

                </ol>
            </td>
        </tr>

    </table>

    <div><br /></div>

    <table width="600" cellspacing="0" cellpadding="5" align="center">

        <tr>
            <td style="font-family:cambria; font-size:11.5px; color:#009900;"><strong><u>All Transfer Details: 

<?php
foreach ($vehicle_info as $k => $v) {
    if ($k != 0) {
        echo " / ";
    }
    ?>
                            <strong><?php echo str_pad($v->VehicleNumber, 2, '0', STR_PAD_LEFT); ?> <?php echo str_replace("Car", "AC Car", str_replace("Havelock", "", str_replace("Port Blair", "", str_replace("Neil", "", str_replace("Diglipur", "", $v->VehicleType))))); ?> </strong> in <?php echo $v->IslandName; ?>
    <?php
}
?>
                    </u> </strong></td>

        </tr>
                        <?php
                        foreach ($itenarary as $key => $value) {
                            ?>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px;"><strong>
                        Day <?php echo $key + 1 ?> : <?php echo date("dS F , Y", strtotime($value->SelectDate)); ?>( <?php echo date("l", strtotime($value->SelectDate)); ?>):</strong> <?php echo $value->Remark; ?> 

                    <span class="style3"><?php
                        if ($key == 0) {
                            echo " - " . $ticket_info[0]->ArrivalFlightName . " " . $ticket_info[0]->FlightNumber . " @ " . substr($ticket_info[0]->ArrivalTime, 0, strrpos($ticket_info[0]->ArrivalTime, ':')) . " Hrs";
                        }
                        if ($key == count($itenarary) - 1) {
                            echo " - " . $ticket_info_depature[count($ticket_info_depature) - 1]->DepartureFlightName . " " . $ticket_info_depature[0]->FlightNumber . " @ " . substr($ticket_info_depature[0]->DepartureTime, 0, strrpos($ticket_info_depature[0]->DepartureTime, ':')) . " Hrs";
                        }
                        ?> -

                        <span class="stripLastPlus"><?php echo str_pad((intval($guest_count[0]->ExtraAdult) + intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)  + intval($guest_count[0]->SingleOccFamily)), 2, '0', STR_PAD_LEFT) . " Adults +" ?><?php echo ($guest_count[0]->ExtraChildWithMat + $guest_count[0]->ExtraChild) > 0 ? " " . str_pad(($guest_count[0]->ExtraChildWithMat + $guest_count[0]->ExtraChild), 2, '0', STR_PAD_LEFT) . " Child +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " " . (str_pad(intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2), 2, '0', STR_PAD_LEFT) . " Infants +") : "" ?></span></span>



                </td>
            </tr>




    <?php
}
?>


    </table>

    <p>&nbsp;</p> 

    <table width="600" cellspacing="0" cellpadding="5" align="center">

        <tr>
            <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;"><strong><u>DETAILED ITINERARY</u></strong></td>
        </tr>
        <tr>
            <td valign="top">&nbsp;</td>

        </tr> 
<?php
foreach ($itenarary as $key => $value) {
    ?>
            <tr>
                <td valign="top"  style="font-family:cambria; font-size:11.5px; background:#CCC; border-bottom: 10px solid #FFF;"><strong> Day<?php echo $key + 1 ?> : <?php echo date("dS F , Y", strtotime($value->SelectDate)) ?>(<?php echo date("l", strtotime($value->SelectDate)); ?>)  </strong></td>

            </tr>
            <tr>
                <td valign="top" style="font-family:cambria; font-size:11.5px; background:#CCC;"><strong><?php echo $value->BriefItenarary; ?></strong></td>
            </tr>
            <tr>

                <td valign="top" style="font-family:cambria; font-size:11.5px; "><?php echo $value->DetailedItenarary; ?></td>
            </tr>                                            



    <?php
}
?>

    </table> 
    <p>&nbsp;</p>

    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong><u>The above rates include:</u></strong></td>
        </tr>
        <tr>
            <td valign="top" style="font-family:cambria; font-size:11.5px;">
                <ol>
                    <li>
<?php
foreach ($hotel_blocking_request as $k => $v) {
    ?>                                                    
    <?php echo intval($k) != 0 ? " + " : ""; ?>
                            <strong><?php echo str_pad($v->NumberOfNights, 2, '0', STR_PAD_LEFT) . " "; ?></strong> Night stay at Hotel <?php echo getHotelName($v->HotelSelected, $conn)[0]["HotelName"]; ?> 
                            at <strong><?php echo getIslandName($v->SelectedIsland, $conn)[0]["IslandName"]; ?> </strong>
    <?php
}
?>
                    </li><br />

                    <li>Daily
                        <?php
                        $meal = isset($hotel_blocking_request[0]->MealPlan) ? $hotel_blocking_request[0]->MealPlan : "";

                        if ($meal == "CP - Continental Plan") {
                            echo "<strong>breakfast</strong>";
                        } else if ($meal == "MAP - Modified American Plan") {
                            echo "<strong>breakfast</strong> and <strong>dinner</strong>";
                        } else if ($meal == "AP - American Plan") {
                            echo "<strong>breakfast</strong>, <strong>lunch</strong> and <strong>dinner</strong>";
                        }
                        ?>, on set menu or buffet basis, as indicated in the meal plan. (Except breakfast on day of arrival and lunch on day of departure)</li><br />
                    <li>
                        Entry tickets, and ferry tickets to all sightseeing places. 
                        <?php
                        foreach ($ticket_ferry_info as $k => $v) {
                            ?>
                            <?php echo intval($k) != 0 ? " + " : ""; ?>
                            <?php echo getSectorName($v->FerryTicket, $conn)[0]["Name"]; ?> by <strong><?php echo getSectorTicket($v->FerryName, $conn)[0]["Timings"]; ?> </strong> 
                            <?php
                        }
                        ?>

                    </li><br />
                    <li>All transfers by 
                        <?php
                        foreach ($vehicle_info as $k => $v) {
                            ?>
                            <?php echo intval($k) != 0 ? " + " : ""; ?>
                            <strong><?php echo str_pad($v->VehicleNumber, 2, '0', STR_PAD_LEFT); ?> <?php echo str_replace("Car", "AC Car", str_replace("Havelock", "", str_replace("Port Blair", "", str_replace("Neil", "", str_replace("Diglipur", "", $v->VehicleType))))) ?> </strong> in <?php echo $v->IslandName; ?>
                            <?php
                        }
                        ?>
                    </li><br />
                    <li><span style="color:#FF0000"><strong>5% GST is <?php echo isset($closure[0]->GSTIncluded) && $closure[0]->GSTIncluded == "No" ? "excluded" : "included" ?></strong></span></li>
                </ol>
            </td>
        </tr>   
    </table>

    <div><br /></div>

    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong><u>The above rates don't  include:</u></strong></td>
        </tr>
        <tr>
            <td valign="top" style="font-family:cambria; font-size:11.5px;">
                <ol>
                    <li>
                        Vehicle at disposal at <?php
                        foreach ($vehicle_info as $k => $v) {
                            ?>
    <?php if ($k != 0) echo "and "; echo $v->IslandName; ?>
    <?php
}
?>
                    </li><br />
                    <li>Any personal expenses. Room service and special orders Alcoholic and non alcoholic beverages</li><br />
                    <li>Any extra excursions or sightseeing apart from the suggested tour itinerary.</li><br />
                    <li>Porter Charges, Guide Charges including Cellular Jail & Ross Island and Camera Ticket charges.</li><br />
                    <li>Other meals not mentioned laundry, telephone calls, and incidentals. </li><br />
                </ol>
            </td>
        </tr>   
    </table>

    <div><br /></div>
    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><strong><u>CANCELLATION POLICY:</u></strong></span></td>
        </tr>
        <tr>
            <td colspan="2" style="font-family:cambria; font-size:11.5px;">All cancellations are to be communicated in writing. Cancellation policy will be applicable <u><i>ON FULL TOUR PRICE(transport, hotels & other services)</i></u> , in spite of any Flight / Train cancellation has affected the operation of the Tours.</td>
        </tr>
        <tr>
            <td colspan="2" style="font-family:cambria; font-size:11.5px; color:#009900;"><strong><i>Cancellation for packages</i></strong></td>
        </tr>
        <tr id="one">
            <td style="font-family:cambria; font-size:11.5px;"><i>Cancellation is made</i></td>
            <td style="font-family:cambria; font-size:11.5px;"><i>Charges</i></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px; color:#009900">Booking Date - <span class="style4"><strong>31+ Days</strong></span> prior to the operation of the booked tour</td>
            <td>2% of total tour cost </td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px; color:#009900;"><span class="style4"><strong>31 - 16 Days</strong></span> prior to the operation of the booked tour</td>
            <td>50% of total tour cost </td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px; color:#009900;"><span class="style4"><strong>16 - 00 Days </strong></span> prior to the operation of the booked tour</td>
            <td>100% of total tour cost</td>
        </tr>
        <tr>
            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><ul><li style="background:#999999; padding:5px;"><strong>No refund for cancellations on bookings from 15th December - 15th January</strong></li>
                    <li>No refunds for unused nights or early check-out</li>
                    <li><span style="color:#009900; font-size:12.5px"><strong><u>Cancellations outside the cancellation policy will attract a 2% Cancellation penalty</u></strong></span></li>
                    <li><span style="color: #0070c0; font-size:12.5px;"><strong><u>Contact number of guest</u></strong></span></li>
                    <li>No refunds would be offered on the government ferry tickets or Private (Speed Catamaran) tickets, if already purchased</li>
                    <li>NO REFUND for any unutilized services example : meals, entrance fee, optional, hotel, sightseeing, transportation (surface). All refund if due made will be in INR (Indian Rupees).</li>
                </ul>
            </td>
        </tr>
    </table>
    <div><br /></div>
    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong><u>POINTS TO NOTE FOR PRIVATE FERRY:</u></span></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><ul><li>Kindly note that we do not guarantee the sailing of Private ferry and incase it does not sail due to bad weather or a technical snag we will not be held liable for the same. Our liability is only to value of the Private ferry ticket and if any loss or extra payment for extra services needs to made Faraway Tree will not be liable for it.</li>
                    <li>Please note that the charges mentioned are only for the base category and incase the same is not available, we shall try and block you either on the "HIGHER" category and the difference for the same can be paid on arrival. We offer to book only the base category in our standard package.</li>
                </ul></td>
        </tr>

    </table>
    <div><br /></div>
    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong><u>POINTS TO NOTE FOR GOVERNMENT FERRY:</u></span></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><ul><li>Please note that whereas we undertake to provide you with a place on the sailing, a fixed seat is sometimes not possible and you may have to travel on deck. By default we book only the <u>base category</u> in Government Ferry.</li>
                    <li>Ferry timings are subject to change at the government's discretion, and we assume no liability for disruption in schedule owing to the same, although we will do our best to implement your itinerary to the fullest and provide you with commensurate back-up options in case you are stranded for (say) the first night at Port Blair and the cost of the same will need to be borne by the guest.</li>
                    <li>In case of <strong><u>foreign nationals/NRI/OCI</u></strong> tickets can only be bought after you land since the RAP number is mandatory to book the tickets and hence we cannot guarantee availability of tickets. In case you would like a guaranteed ticket you should book a flight that allows you to connect to Makruzz which departs at 0815 hrs from PB- Havelock for which we can book tickets one month in advance. For Indian nationals tickets can be booked only 02 days in advance and all tickets and seats are subject to availability. We require a ID proof of all Indian Nationals. We do arrange tickets as per guest preference and there are only one or two times a year when we are unable to arrange the same and we will be liable only to the <strong><u>value of the ticket</u></strong>.</li>
                    <li>Faraway merely assist guest with transfers and incase of <strong><u>non availability of tickets or cancellations our liability is limited to the value of the ticket.</u></strong> We will certainly assist in arranging alternates and offer the same to the guest payment for which can be made directly.</li>
                </ul></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
    <div><br /></div>
    <table width="600" cellspacing="0" cellpadding="5" align="center">
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong><u>Things to Note:</u></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;">
                <ol><li><strong>Mandatory document for any travelers</strong> - <i>PAN card will not be accepted as id proof</i> . Indian Nationals / Passport Holders are required to travel with valid Photo ID with address mentioned on it issued by GOVERNMENT OF INDIA. This could be <i>original passport, driving license, voter ID, ADHAR Card</i>. This is a mandatory requirement for all adult traveling in the group. For children they have to be accompanied along, with their parents and should have a Photo ID issued by the school authority. It is also advisable to carry photo copy along with the original Birth Certificate of the children traveling along.</li>
                    <li>All guests are requested to come out of the Airport where our representative will be waiting with a placard. You could contact our Tour Managers for any assistance.</li>
                    <li>Incase you have opted for a snorkelling trip we would request you to carry change of clothes/towel and mineral water.</li>
                    <li>Do carry comfort clothing while in Andamans : Shorts/T Shirts/Open footwear/Cap/Sunglasses and sun lotion.</li>
                    <li>Breakfast is not included on day of arrival and the hotels will charge extra for the same.</li>
                    <li>All hotels in Andaman have an early check out time and late checkout is subject to availability. At Havelock since the ferry departs only at noon guest could relax and unwind on the beach.</li>
                    <li>Incase you are taking the early morning ferry to Havelock or Baratang we would request guest to carry packed breakfast, request you to advice the hotel in advance.</li>
                    <li>The car provided is only for pick up and drop or as per itinerary any extra usage will be chargeable extra. Payment should be made to <b>Mr Raghupathy : 8900957772 & 9932080307 </b> who would provide a receipt for the same.</li>
                </ol></td>
        </tr>

    </table>


    <div><br /></div>
    <table width="600" cellspacing="0" cellpadding="5" align="center" >
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong><u>CONTACT DETAILS AT PORT BLAIR</u></strong></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong>Mr Raghupathy : 8900957772 & 9932080307
                </strong></td>
        </tr>

        <tr>                                                
            <td style="font-family:cambria; font-size:11.5px;">Faraway Tree Andaman<br />
                No 38, Second Floor<br />
                Junglighat Village<br />
                South Andaman District<br />
                Port Blair - 744101<br />
                Andaman & Nicobar Islands, India
            </td>
        </tr>

        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong>Mr. Roy (Tour Manager):</strong> <a href="javascript:void(0);"><span style="color:#283fdf;">+91-9933-252405</span></a></td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong><u>Quality Helpline Number:</u></strong><br /><a href="javascript:void(0);"><span style="color:#283fdf;">+91-9500-555912</span></a> (0930 - 1830 hrs - Monday to Saturday)</td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong><u>Emergency Contact Number:</u></strong><br /><strong>Mr. Akshay Rawat:</strong> <a href="javascript:void(0);"><span style="color:#283fdf;">+91-9003-115483</span></a> (24 hrs)</td>
        </tr>
        <tr>
            <td style="font-family:cambria; font-size:11.5px;"><strong>Note:</strong> Andamans has poor connectivity and network issues and in case the calls do not go through or number is busy request you to kindly send a <strong>SMS</strong> and the concerned person will call you back</td>
        </tr>
    </table> 
    <div><br /></div>
</body>
<script type="text/javascript">
    str = document.querySelectorAll(".stripLastPlus");
    str.forEach(function(item) {
        text = item.innerHTML;
        item.innerHTML = text.replace(/\+$/, '');
    });
</script>
 <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        str = document.querySelectorAll(".stripLastPlus");
        str.forEach(function(item) {
            text = item.innerHTML;
            item.innerHTML = text.replace(/\+$/, '');
        });
        $("document").ready(function() {
            $(".recheckinClass").each(function(){
                
                $($(this).clone()).insertBefore($(".tableRoomBlocking:first"));
                $(this).remove();
            }); 
        });
        



    </script>
</html>
