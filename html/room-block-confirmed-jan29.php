<?php
require_once 'connections/connection.php';
include 'commons/common-functions.php';
date_default_timezone_set("Asia/Kolkata");
if (isset($_GET['voucher'])) {
    
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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Hotel Room Block and Confirmation</title>

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
            .style1 {color: #0099FF}
            .fileandunique {color:red}
        </style>
        <script type="text/javascript"> var flag = 0;</script>
    </head>

    <body id="typography">


        <table width="750" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td bgcolor="#FFFF00" style="text-transform:uppercase; font-family:cambria; font-size:11.5px"><h3>ROOMS BLOCKED AND CONFIRMED FOR GUEST <?php echo $guest_count[0]->GuestName; ?> <label class="fileandunique">  <?php echo !empty($closure[0]->FileReferenceNumber) ? "(".$closure[0]->FileReferenceNumber.")" : "" ?> </label> ; AWAITING FULL PAYMENT AND CONFIRMATION WITH DETAILS BY <?php echo date("dS F Y", strtotime($guest_count[0]->CutOff)); ?> <label class="fileandunique">REF ID: <?php echo isset($closure[0]->VoucherId) ? $closure[0]->VoucherId : "" ?></label></h3></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>

                <td style="font-family:cambria; font-size:11.5px">Dear <?php echo isset($closure[0]->FileHandlerAgent) ? $closure[0]->FileHandlerAgent : "" ?>,</td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px">Greetings from Faraway Tree - <strong>Andaman Islands! [Consortium Partner for India-B2B]</strong></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px">Further to your mail please find below details of the package requested for your guest holiday to the Andaman's during the month of <span style="color:#FF0000"><strong><?php echo ($guest_count[0]->Arrival != '' || $guest_count[0]->Arrival != "0000-00-00 00:00:00" ) ? date("F", strtotime($guest_count[0]->Arrival)) : 'Not Specified'; ?></strong></span> <?php echo ($guest_count[0]->Arrival != '' || $guest_count[0]->Arrival != "0000-00-00 00:00:00" ) ? date("Y", strtotime($guest_count[0]->Arrival)) : 'Not Specified'; ?> for <span style="color:#FF0000"><strong><?php echo $guest_count[0]->TotalNights ?></strong></span>  nights and <span style="color:#FF0000"><strong><?php echo intval($guest_count[0]->TotalNights) + 1 ?></strong></span> days.</td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table width="750" cellspacing="0" cellpadding="5" align="center" id="one">

            <tr>
                <td bgcolor="#CCCCCC" style="font-family:cambria; font-size:11.5px"><strong>FOR FURTHER INFORMATION PLEASE CLICK ON THE LINK BELOW</strong></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/FTT%20IMPORTANT%20NOTE%20ABOUT%20OPERATIONS.pdf" target="_blank"><strong>IMPORTANT INFORMATION ABOUT OPERATIONS IN ANDAMAN ISLANDS</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/FTT%20BOOKING,%20PAYMENT%20PROCEDURE%20AND%20AMENDMENT%20-%20CANCELLATION.pdf" target="_blank"><strong>BOOKING, PAYMENT PROCEDURE & AMENDED/ CANCELLATION POLICY</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/BUDGET%20HOTEL%20CATEGORY%20DESCRIPTIONS.pdf" target="_blank"><strong>BUDGET HOTEL CATEGORY DESCRIPTION</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/STANDARD%20HOTEL%20CATEGORY%20DESCRIPTIONS.pdf" target="_blank"><strong>STANDARD HOTEL CATEGORY DESCRIPTION</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/DELUXE%20HOTEL%20CATEGORY%20DESCRIPTIONS.pdf" target="_blank"><strong>DELUXE HOTEL CATEGORY DESCRIPTION</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/LUXURY%20AND%20PREMIUM%20HOTEL%20CATEGORY%20DESCRIPTIONS.pdf" target="_blank"><strong>LUXURY AND PREMIUM HOTEL CATEGORY DESCRIPTION</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"> <a href="http://farawaytree-andaman.com/docs/Dry%20Days%20List%202017.pdf" target="_blank"><strong>DRY DAYS</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/List%20of%20Public%20Holidays%202017.pdf" target="_blank"><strong>PUBLIC HOLIDAYS</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/Honeymoon%20Inclusion.pdf" target="_blank"><strong>HONEYMOON EXTRAS</strong></a></td>
            </tr>
            <tr>
                <td style="border-top:none; font-family:cambria; font-size:11.5px"><a href="http://farawaytree-andaman.com/docs/Information%20about%20Diving.pdf" target="_blank"><strong>INFORMATION ABOUT DIVING</strong></a></td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <table width="750" cellspacing="0" cellpadding="5" align="center">

            <tr>
                <td><span style="color: #009900; font-family:cambria; font-size:11.5px"><strong>Below quote is Non Commissionable and 5% GST is <?php echo isset($closure[0]->GSTIncluded) && $closure[0]->GSTIncluded == "No" ? "excluded" : "included" ?>.</strong></span></td>
            </tr>

            <tr>
                <td><span style="color: #009900; font-family:cambria; font-size:11.5px"><strong>We have provided inter island transfers by Private ferry (Makruzz/Makruzz Gold/Green Ocean/ Coastal Cruise).</strong></span></td>
            </tr>

            <tr>
                <td><span style="color: #009900; font-family:cambria; font-size:11.5px"><strong>Itinerary may be changed according to weather or availability of ferry tickets.</strong></span></td>
            </tr>

            <tr>
                <td style="font-family:cambria; font-size:11.5px"><strong>Kindly note that in order to process your final Confirmation Voucher, may I request for the following: </strong></td>
            </tr>
            <tr>
                <td style="font-family:cambria; font-size:11.5px; background:#FFFF00"><ol><li><span style="color: #009900"><strong>Full payment and confirmation with details by <?php echo date("dS F Y", strtotime($guest_count[0]->CutOff)); ?> </strong></span></li>
                        <li><span style="color: #009900">Arrival and departure <strong><u>flight details</u></strong> to ensure timely pick-up and drop to and from the airport.</span></li>
                        <li><span style="color: #009900"><strong><u>Full names and Age</u></strong> of <strong>ALL</strong> the guest travelling</span></li>
                        <li><span style="color: #0000FF"><strong><u>Contact number of guest</u></strong></span></li>
                    </ol>
                </td>
            </tr>
        </table>
		<p>&nbsp;</p>
        <table width="750" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td style="font-family:cambria; font-size:11.5px"><strong>WE ARE PLEASED TO INFORM YOUR GUEST ROOMS HAVE BEEN BLOCKED AND CONFIRMED AS UNDER:</strong></td>
            </tr>
        </table> 
<br/>
        <span class="formBlockspan">
            
            
            
            
            
            
            
            
            
            
            
            
            <?php
            $len = count($hotel_blocking_request);

            for ($i = 0; $i < $len; $i++) {
                $flag = 0;
                $k=0;
                echo "<script type='text/javascript'>flag = 0;</script>";
                for($j=1;$j<$len;$j++) {
                    if($hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$j]->RoomSelected) {
                       if($flag==0){
                        $flag = 1;
                        $k=$j;
                        echo "<script type='text/javascript'>flag = 0;</script>";
                        }
                    }
                }
                if ($hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$i]->RoomSelected && ($i!=0) && $k==$i) {
                    
                    ?>
            <div class="tableRoomBlocking recheckinClass">
                    <span class="formBlockRow" data-id="<?php echo $hotel_blocking_request[0]->HotelBlockingID; ?>">
                        <p>&nbsp;</p>
                        <table width="750" cellspacing="0" border="0" cellpadding="5" align="center">
                            
                            <tr id="one">
                                <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;">Establishment Details</td>
                                <td colspan="2" align="center" style="border-left:none; font-family:cambria; font-size:11.5px;">Reservation Details</td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Name</td>
                                
                                <td width="288" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["HotelName"]; ?></strong>
                                
                                <br/>
								
                                    <?php $hotel_review= json_decode(checkintime( $conn,$hotel_blocking_request[$i]->HotelSelected));          
                                
                                echo isset($hotel_review[0]->CheckInTime)? "C/IN:  ".$hotel_review[0]->CheckInTime : '';   
                                echo isset($hotel_review[0]->CheckOutTime)? "  &nbsp;&nbsp;&nbsp; C/OUT:  ".$hotel_review[0]->CheckOutTime : '';   
                                
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
                                    <?php echo " ".getHotelInfo_ID($hotel_blocking_request[0]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <br/>
                                    <?php
                                    $totaladultguestcount= intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily);
                                    ?>
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy + intval($guest_count[0]->SingleOccFamily))) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? "0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? "0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>
                                </td>

                            </tr>
                            <tr id="oneinner">
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">Meal Basis</td>
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php
                                    
                                        echo substr($hotel_blocking_request[0]->MealPlan , 0, strpos($hotel_blocking_request[0]->MealPlan, ' ')) . "<br/>";
                                        
                                    
                                    ?>
                                </td>
                            </tr>
                            <tr id="oneinner">
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Rooms</td>


                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php echo $hotel_blocking_request[0]->NumberOfRooms; ?>  
                                    <?php echo " ".getHotelInfo_ID($hotel_blocking_request[0]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    
                                </td>



                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Tel</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["ContactNumber"]; // echo $guest_info[0]->ContactNumber   ?></td>
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Status</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $hotel_blocking_request[0]->Status; ?></td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82"  valign="top" style="font-family:cambria; font-size:11.5px;">Nights</td>
                                <td  valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php
                                    $n1 = isset($hotel_blocking_request[$i]->NumberOfNights) ? intval($hotel_blocking_request[$i]->NumberOfNights) : 0;
                                    $n2 = isset($hotel_blocking_request[0]->NumberOfNights) ? intval($hotel_blocking_request[0]->NumberOfNights) : 0;
                                    $totalNights = $n1+ $n2;
                                    echo str_pad($totalNights, 2, '0', STR_PAD_LEFT) . " Night(s) <br/>";
                                    ?>
                                </td>
                                <td colspan="2" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <strong>In :</strong>
                                    <?php echo !empty($hotel_blocking_request[0]->CheckIn) && $hotel_blocking_request[0]->CheckIn != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[0]->CheckIn)) : ''; ?> <br /><strong>Out : </strong><?php echo!empty($hotel_blocking_request[0]->CheckOut) && $hotel_blocking_request[0]->CheckOut != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[0]->CheckOut)) : ''; ?>
                                    <hr/>
                                         <strong>Re-Check In</strong>   
                                    <hr/>
									<strong>In :</strong>
                                    <?php echo !empty($hotel_blocking_request[$i]->CheckIn) && $hotel_blocking_request[$i]->CheckIn != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckIn)) : ''; ?> <br /><strong>Out : </strong><?php echo!empty($hotel_blocking_request[$i]->CheckOut) && $hotel_blocking_request[$i]->CheckOut != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckOut)) : ''; ?>
                                    
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
                                            if($i == 0 && $flag == 1) {
                                                continue;
                                            }
                          
                                            ?>
            <div class="tableRoomBlocking">
                                             <span class="formBlockRow" data-id="<?php echo $hotel_blocking_request[$i]->HotelBlockingID; ?>">
                                
                    <table width="750" cellspacing="0" border="0" cellpadding="5" align="center">
                            <tr id="one">
                                <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;">Establishment Details</td>
                                <td colspan="2" align="center" style="border-left:none; font-family:cambria; font-size:11.5px;">Reservation Details</td>
                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Name</td>
                                
                                <td width="288" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["HotelName"]; ?></strong>
                                <br/>
								
								
                                    <?php $hotel_review= json_decode(checkintime( $conn,$hotel_blocking_request[$i]->HotelSelected));          
                                
                                echo isset($hotel_review[0]->CheckInTime)? "C/IN:  ".$hotel_review[0]->CheckInTime : '';   
                                echo isset($hotel_review[0]->CheckOutTime)? " &nbsp;&nbsp;&nbsp; C/OUT:  ".$hotel_review[0]->CheckOutTime : '';   
                                
                                ?>
								
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
                                    <?php echo " ".getHotelInfo_ID($hotel_blocking_request[$i]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <br/>
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy + intval($guest_count[0]->SingleOccFamily))) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? "0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? "0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>
                                </td>

                            </tr>
                            <tr id="oneinner">
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">Meal Basis</td>
                                <td style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php
                                    
                                        echo substr($hotel_blocking_request[$i]->MealPlan , 0, strpos($hotel_blocking_request[$i]->MealPlan, ' ')) . "<br/>";
                                        
                                    
                                    ?>
                                </td>
                            </tr>
                            <tr id="oneinner">
                                <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Rooms</td>


                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">
                                    <?php echo $hotel_blocking_request[$i]->NumberOfRooms; ?>  
                                    <?php echo " ".getHotelInfo_ID($hotel_blocking_request[$i]->RoomSelected, $conn)[0]["RoomCat"]; ?>  
                                    <br/>
                                    <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Bed +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Bed +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Bed +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    
                                </td>



                            </tr>
                            <tr id="oneinner">
                                <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Tel</td>
                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["ContactNumber"]; // echo $guest_info[0]->ContactNumber   ?></td>
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
                                    <?php echo !empty($hotel_blocking_request[$i]->CheckIn) && $hotel_blocking_request[$i]->CheckIn != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckIn)) : ''; ?> <br /><strong>Out : </strong><?php echo!empty($hotel_blocking_request[$i]->CheckOut) && $hotel_blocking_request[$i]->CheckOut != "0000-00-00 00:00:00" ? date("dS M,Y", strtotime($hotel_blocking_request[$i]->CheckOut)) : ''; ?>
                                    
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
        <br/>
                                    <table width="750" cellspacing="0" border="0" cellpadding="5" align="center" style="margin-top:-40px; font-family:cambria; font-size:11.5px">
                                        <?php
                                        $len22 = count($accommodation_info);


                                        $i = 0;
                                        for ($i = 0; $i < $len22; $i++) {
                                            ?>            
                                            <tr id="one">
                                                <td width="90px" align="left" style="font-family:cambria; font-size:11.5px">Additional Service</td>
                                                <td align="left" style="border-left:none; font-family:cambria; font-size:11.5px"><?php echo $accommodation_info[$i]->Description; ?></td>
                                            </tr>
                                            
    <?php
}
?>
                                        
                                    </table>
                                    <br/>

                                    <table width="750" cellspacing="0" cellpadding="5" align="center">
                                        <tr>
                                            <td align="center" style="font-family:cambria; font-size:11.5px"><strong><u><?php echo isset($itenarary[0]->PackageName) ? $itenarary[0]->PackageName : ""; ?> <?php
                                        echo "(" . $guest_count[0]->TotalNights . " N/";

                                        if (is_numeric($guest_count[0]->TotalNights)) {
                                            echo (intval($guest_count[0]->TotalNights) + 1) . " D)";
                                        }
?></u></strong></td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-family:cambria; font-size:11.5px"><strong><u><?php echo $guest_count[0]->PortBlairNights > 0 ? $guest_count[0]->PortBlairNights . " N PB " : ''; ?>              <?php echo ($guest_count[0]->PortBlairNights > 0 && $guest_count[0]->HavelockNights > 0 ) ? " + " : ''; ?>      <?php echo $guest_count[0]->HavelockNights > 0 ? $guest_count[0]->HavelockNights . " N HL " : ''; ?>             <?php echo (($guest_count[0]->PortBlairNights > 0 || $guest_count[0]->HavelockNights > 0) && $guest_count[0]->NeilIslandNights > 0) ? " + " : ''; ?>             <?php echo $guest_count[0]->NeilIslandNights > 0 ? $guest_count[0]->NeilIslandNights . " N NL " : ''; ?>        <?php echo (($guest_count[0]->PortBlairNights > 0 || $guest_count[0]->HavelockNights > 0 || $guest_count[0]->NeilIslandNights > 0) && $guest_count[0]->DiglipurNights > 0) ? " + " : ''; ?>      <?php echo $guest_count[0]->DiglipurNights > 0 ? $guest_count[0]->DiglipurNights . " N DL " : ''; ?></u></strong></td>
                                        </tr>
                                    </table> 

                                    <p>&nbsp;</p> 
                                    <span>
                                        <table width="750" cellspacing="0" cellpadding="5" align="center" border="0">
<?php
foreach ($itenarary as $key => $value) {
    ?>

                                                <tr>
                                                    <td valign="top" style="font-family:cambria; font-size:11.5px; background:#CCC; border-bottom: 10px solid #FFF;"><strong> Day <?php echo $key + 1 ?> : <?php echo date("dS F , Y", strtotime($value->SelectDate)) ?> (<?php echo date("l", strtotime($value->SelectDate)); ?>) </strong></td>

                                                </tr>
												
                                                <tr>
                                                    <td valign="top" style="font-family:cambria; font-size:11.5px; background:#CCC;"><strong><?php echo $value->BriefItenarary; ?></strong></td>
                                                </tr>
                                                <tr>

                                                    <td valign="top" style="font-family:cambria; font-size:11.5px"><?php echo $value->DetailedItenarary; ?></td>
                                                </tr>                                                

    <?php
}
?>
                                        </table> 
                                    </span>




                                    <table width="750" cellspacing="0" cellpadding="5" align="center" id="one">                                        
<?php

            $len = count($hotel_blocking_request);
            $flag=0;
            $in=0;
            $match=array();
            for ($i = 0; $i < $len; $i++) {
                for($j=1;$j<$len;$j++){
           if (isset($hotel_blocking_request[0]->RoomSelected) && isset($hotel_blocking_request[$j]->RoomSelected) && $hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$j]->RoomSelected && ($i==0 )) {
               $flag=1;
               $match[$in]=$j;
               $in++;
           }         
                }
                if ($flag==1 && $i==0) {
                    
                    ?>
                                        
                                            <tr>
                                                <td valign="top" style="font-family:cambria; font-size:11.5px">Hotel Name - <?php echo getIslandName($hotel_blocking_request[0]->SelectedIsland, $conn)[0]["IslandName"]; ?></strong></td>
                                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px"><strong> <?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["HotelName"]; ?> - <?php echo getHotelInfo_ID($hotel_blocking_request[$i]->RoomSelected, $conn)[0]["RoomCat"]; ?>  -  on <?php
                                            echo substr($hotel_blocking_request[$i]->MealPlan , 0, strpos($hotel_blocking_request[$i]->MealPlan, ' '));
                                            
                                            ?> </strong>( 
                                            <?php
                                            $totalNights=isset($hotel_blocking_request[0]->NumberOfNights) ? intval($hotel_blocking_request[0]->NumberOfNights) : 0;
                                            for($k=0;$k<count($match);$k++){
                                                $p=$match[$k];
                                    $n1 = isset($hotel_blocking_request[$p]->NumberOfNights) ? intval($hotel_blocking_request[$p]->NumberOfNights) : 0;
                                    //$n2 = isset($hotel_blocking_request[0]->NumberOfNights) ? intval($hotel_blocking_request[0]->NumberOfNights) : 0;
                                    $totalNights+= $n1;
                                            }
                                    echo str_pad($totalNights, 2, '0', STR_PAD_LEFT);
                                    ?>
                                                    Nights )</td>
                                            </tr>

                                                    <?php
                                                    }
                                                    else if(in_array($i, $match)!=-1) {
                                                        ?>
                                                            <tr>
                                                <td valign="top" style="font-family:cambria; font-size:11.5px">Hotel Name - <?php echo getIslandName($hotel_blocking_request[$i]->SelectedIsland, $conn)[0]["IslandName"]; ?></strong></td>
                                                <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px"><strong> <?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["HotelName"]; ?> - <?php echo getHotelInfo_ID($hotel_blocking_request[$i]->RoomSelected, $conn)[0]["RoomCat"]; ?>  -  on <?php
                                                echo substr($hotel_blocking_request[$i]->MealPlan , 0, strpos($hotel_blocking_request[$i]->MealPlan, ' '));
                                            
                                            ?> </strong>( 
                                            <?php
                                    $n1 = isset($hotel_blocking_request[$i]->NumberOfNights) ? intval($hotel_blocking_request[$i]->NumberOfNights) : 0;
                                    
                                    echo str_pad($n1, 2, '0', STR_PAD_LEFT);
                                    ?>
                                                    Nights )</td>
                                            </tr>
                                                            <?php
                                                    }
            }
                                                    ?>





                                        <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Per person, on Dbl Occupancy</strong></td>
<?php
$total = 0;
$Occupancy = $guest_count[0]->Occupancy == '' ? 0 : intval($guest_count[0]->Occupancy);
$OccupancyRate = $guest_count[0]->OccupancyRate == '' ? 0 : intval($guest_count[0]->OccupancyRate);
?>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                        $total+=($Occupancy * $OccupancyRate);
                                        echo "INR ".$OccupancyRate . " x " . $Occupancy;
                                        ?></td>
                                        </tr>
                                        <tr>

                                            <?php
                                            $ExtraAdult = $guest_count[0]->ExtraAdult == '' ? 0 : $guest_count[0]->ExtraAdult;
                                            $ExtraAdultRate = $guest_count[0]->ExtraAdultRate == '' ? 0 : $guest_count[0]->ExtraAdultRate;
                                            $ExtraChildWithMat = $guest_count[0]->ExtraChildWithMat == '' ? 0 : $guest_count[0]->ExtraChildWithMat;
                                            $ExtraChildWithMatRate = $guest_count[0]->ExtraChildWithMatRate == '' ? 0 : $guest_count[0]->ExtraChildWithMatRate;


                                            if ($ExtraAdultRate != 0 && $ExtraAdult != 0) {
                                                ?>
                                                <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Extra adult with bed</strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                               echo 'INR '.$ExtraAdultRate.' x '.$ExtraAdult;
                                               $total+=($ExtraAdult * $ExtraAdultRate);
                                            }?></td>
                                        </tr>
                                                <?php 
                                                if($ExtraChildWithMatRate != 0 && $ExtraChildWithMat != 0)
                                                {
                                                ?>
                                             <tr>   <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Extra child with bed</strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                                echo 'INR '.$ExtraChildWithMatRate.' x '.$ExtraChildWithMat;
                                                $total+=($ExtraChildWithMat * $ExtraChildWithMatRate);
                                                ?></td>
                                                    <?php
                                                }
                                                ?>


<!--                                                                        <td valign="top" style="border-top:none; border-left:none;"><?php
                                            // $total += ((intval($ExtraAdult)+intval($ExtraChildWithMat ) * intval($ExtraAdultRate)) + (intval($ExtraChildWithMat) * intval($ExtraChildWithMatRate)));
//                                                                        echo intval($ExtraAdult) . " x " . intval($ExtraAdultRate) . " + " . intval($ExtraChildWithMat) . " x " . intval($ExtraChildWithMatRate)
                                            ?></td>-->
                                        </tr>
                                        <tr>

                                            <?php
                                            $ExtraChild = $guest_count[0]->ExtraChild == '' ? 0 : intval($guest_count[0]->ExtraChild);
                                            $ExtraChildRate = $guest_count[0]->ExtraChildRate == '' ? 0 : intval($guest_count[0]->ExtraChildRate);
                                            if ($ExtraChildRate != 0 && $ExtraChild != 0) {
                                                ?>
                                                <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Extra child without Bed (5-11 yrs)</strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                                $total+=($ExtraChild * $ExtraChildRate);
                                                echo 'INR '.$ExtraChildRate . " x " . $ExtraChild;
                                                ?></td>
                                                    <?php
                                                }
                                                ?>

                                        </tr>
                                        <tr>
                                            <?php
                                            $Infant = $guest_count[0]->Infant == '' ? 0 : intval($guest_count[0]->Infant);
                                            $InfantRate = $guest_count[0]->InfantRate == '' ? 0 : intval($guest_count[0]->InfantRate);
                                            if ($Infant != 0 && $InfantRate != 0) {
                                                ?>
                                                <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Infant ( 2-4 yrs)</strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                                $total+=($Infant * $InfantRate);
                                                echo 'INR '.$InfantRate . " x " . $Infant;
                                                ?></td>
                                                    <?php
                                                }
                                                ?>    

                                        </tr>
                                        <tr>
                                            <?php
                                            $InfantUnder2 = $guest_count[0]->InfantUnder2 == '' ? 0 : intval($guest_count[0]->InfantUnder2);
                                            $InfantUnder2Rate = $guest_count[0]->InfantUnder2Rate == '' ? 0 : intval($guest_count[0]->InfantUnder2Rate);
                                            if ($InfantUnder2Rate != 0 && $InfantUnder2 != 0) {
                                                ?>
                                                <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Infant ( 0-2 yrs)</strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                                $total+=($InfantUnder2 * $InfantUnder2Rate);
                                                echo 'INR '.$InfantUnder2Rate . ' x ' . $InfantUnder2;
                                                ?> </td>
                                                    <?php
                                                }
                                                ?>

                                        </tr>
                                        <tr>
                                            <?php
                                            $SingleOccupancy = $guest_count[0]->SingleOccupancy == '' ? 0 : intval($guest_count[0]->SingleOccupancy);
                                            $SingleOccupancyRate = $guest_count[0]->SingleOccupancyRate == '' ? 0 : intval($guest_count[0]->SingleOccupancyRate);
                                            if ($SingleOccupancy != 0 && $SingleOccupancyRate != 0) {
                                                ?>
                                                <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Single Occupancy </strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                                $total+=($SingleOccupancy * $SingleOccupancyRate);
                                                echo 'INR '.$SingleOccupancyRate . ' x ' . $SingleOccupancy;
                                                ?> </td>
                                                    <?php
                                                }
                                                ?>

                                        </tr>
                                        <tr>
                                            <?php
                                            $SingleOccFamily = $guest_count[0]->SingleOccFamily == '' ? 0 : intval($guest_count[0]->SingleOccFamily);
                                            $SingleOccFamilyRate = $guest_count[0]->SingleOccFamilyRate == '' ? 0 : intval($guest_count[0]->SingleOccFamilyRate);
                                            if ($SingleOccFamily != 0 && $SingleOccFamilyRate != 0) {
                                                ?>
                                                <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Single Occupancy with family </strong></td>
                                                <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><?php
                                                $total+=($SingleOccFamily * $SingleOccFamilyRate);
                                                echo 'INR '.$SingleOccFamilyRate . ' x ' . $SingleOccFamily;
                                                ?> </td>
                                                    <?php
                                                }
                                                ?>

                                        </tr>
                                    </table> 



                                    <table width="750" cellspacing="0" cellpadding="5" align="center">

                                        <tr>
                                            <td valign="top">&nbsp;</td>
                                        </tr>
<?php
if (isset($closure[0]->GSTIncluded) && $closure[0]->GSTIncluded == "No") {
    ?>
                                            <tr>
                                            <?php $GST = 5 ?>
                                                <td valign="top" bgcolor="#FFFF00" style="font-family:cambria; font-size:11.5px; color:#009900;"><strong>Total: INR <?php echo number_format($total); ?>/- (WITHOUT GST)</strong></td>
                                            </tr>
                                            <tr><td>&nbsp;</td></tr>
                                            <tr>
                                                <td valign="top" bgcolor="#FFFF00" style="font-family:cambria; font-size:11.5px; color:#009900;"><strong>Total With GST: INR <?php echo number_format($total + ($total * $GST / 100)); ?>/- NETT</strong></td>                                                                        
                                            </tr>
    <?php
} else {
    ?>
                                            <tr>
                                                <td valign="top" bgcolor="#FFFF00" style="font-family:cambria; font-size:11.5px; color:#009900;"><strong>Total: INR <?php echo number_format($total); ?>/- (WITH GST)</strong></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </table>

                                    <div><br /></div>

                                    <table width="750" cellspacing="0" cellpadding="5" align="center">
                                        <tr>
                                            <td valign="top" style="font-family:cambria; font-size:11.5px;">
                                                <ul>
                                                    <li>It is assumed that the guest have been informed about the category of hotels and facilities provided as any changes after confirmation would not be possible</li><br />
                                                    <li>Kindly do read the <strong>"Hotel Category Description link"</strong> on top of the email body to ensure there is no mis-match in guest expectation and actual product</li><br />
                                                    <li>Hotels will be blocked based on availability </li>
                                                </ul>
                                            </td>
                                        </tr>   
                                    </table>



                                    <table width="750" cellspacing="0" cellpadding="5" align="center">
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
                                                        $meal = isset($hotel_blocking_request[0]->MealPlan) ? $hotel_blocking_request[0]->MealPlan : '';

                                                        if ($meal == "CP - Continental Plan") {
                                                            echo "<strong>breakfast</strong>";
                                                        } else if ($meal == "MAP - Modified American Plan") {
                                                            echo "<strong>breakfast</strong> and <strong>dinner</strong>";
                                                        } else if ($meal == "AP - American Plan") {
                                                            echo "<strong>breakfast</strong>, <strong>lunch</strong> and <strong>dinner</strong>";
                                                        }

                                                        /*
                                                          echo strpos($meal, 'CP - Continental Plan') != false ? "<strong>breakfast</strong>" : "";
                                                          echo strpos($meal, 'MAP - Modified American Plan') != false ? "<strong>breakfast</strong> and <strong>dinner</strong>" : "";
                                                          echo strpos($meal, 'AP - American Plan') == "" && strpos($meal, 'American') != false ? "<strong>breakfast</strong> and <strong>lunch</strong> and <strong>dinner</strong>" : ""; */
                                                        //break
                                                        //}
                                                        ?>
                                                        , on set menu or buffet basis, as indicated in the meal plan. (Except breakfast on day of arrival and lunch on day of departure)</li><br />
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

                                                    </li>
                                                    <br/>
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



                                    <table width="750" cellspacing="0" cellpadding="5" align="center">
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
                                                    <li>Any extra excursions or sightseeing apart from the suggested tour itinerary.</li><br/>
                                                    <li>Porter Charges, Guide Charges including Cellular Jail & Ross Island and Camera Ticket charges.</li><br />
                                                    <li>Other meals not mentioned laundry, telephone calls, and incidentals. </li><br />
                                                </ol>
                                            </td>
                                        </tr>   
                                    </table>

                                    <p>&nbsp;</p> 
                                    <table width="750" cellspacing="0" cellpadding="5" align="center">
                                        <tr>
                                            <td align="center" style="font-family:cambria; font-size:11.5px;"><strong><u>HOTEL REVIEWS</u></strong></td>
                                        </tr>
                                    </table> 

                                    <span class="reviewHotel">
                                        
<?php


            $len = count($hotel_blocking_request);
            $checkUniqueHotel = array();
            for ($i = 0; $i < $len; $i++) {
                //$flag = 0;
//                for($j=0;$j<$len;$j++) {
//                    if($hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$j]->RoomSelected) {
//                        
//                        $flag = 1;
//                    }
//                }
                if ($hotel_blocking_request[0]->RoomSelected == $hotel_blocking_request[$i]->RoomSelected && ($i==0)) {
                    
if (in_array($hotel_blocking_request[$i]->HotelSelected, $checkUniqueHotel)){
//echo "Match found 1";
}
else{
array_push($checkUniqueHotel,$hotel_blocking_request[0]->HotelSelected);
}                    


                    
    $hotelReview = json_decode(getHotelReview($hotel_blocking_request[0]->HotelSelected, $conn));
    $tempid = 0;
    foreach ($hotelReview as $key => $value) {
        
 
        if ($value->Hotel != $tempid) {
            ?> 
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
                                                    <p>&nbsp;</p> 

            <?php
        }
    }        
    }
    else {
        
//        if($i == 0 && $flag == 1) {
//                                                continue;
//                                            }
                                            
                                            if (in_array($hotel_blocking_request[$i]->HotelSelected, $checkUniqueHotel)){
                                              //echo "Match found 2";
                                              }
                                            else{
                                              array_push($checkUniqueHotel,$hotel_blocking_request[$i]->HotelSelected);
                                                                                          
                                            
            $hotelReview = json_decode(getHotelReview($hotel_blocking_request[$i]->HotelSelected, $conn));
    $tempid = 0;
    foreach ($hotelReview as $key => $value) {
        

        if ($value->Hotel != $tempid) {
            ?> 
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
                                                    <p>&nbsp;</p> 

            <?php
        }
    }
    
    }
        
    }
}
?>



                                    </span>





                                    <p>&nbsp;</p>
                                    <table width="750" cellspacing="0" cellpadding="5" align="center" >

                                        <tr id="one">
                                            <td bgcolor="#CCCCCC" style="font-family:cambria; font-size:11.5px;"><strong><u>BOOKING PROCEDURE</u></strong></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:cambria; font-size:11.5px;">All bookings are confirmed subject to 100% advance payment and we need below details to issue the final Confirmation voucher:</td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:cambria; font-size:11.5px; color:#009900;">
                                               <strong>
                                                        <ol>
                                                            <li>Arrival and departure flight details to ensure timely pick-up and drop to and from the airport.</li><br />
                                                            <li>Full names and Age of ALL the guest travelling</li><br />
                                                            <li>Contact Number of the guest </li><br />
                                                            <li>Note: Incase guest is visiting MG National Park we will need a scan of  PHOTO ID of all guest at the booking stage to confirm the trip.</li>
                                                        </ol></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        </table>
           <?php
          
           if(isset($closure[0]->PaymentTerms) && $closure[0]->PaymentTerms=="Advance"){
          
           
               
           
           ?>
                                    <table width="750" cellspacing="0" cellpadding="5" align="center" border="1">
                                        <tr>
                                        <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px">Account Name</td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><strong>M/s. Faraway Tree Hospitality Private Limited</strong></td>
                                        </tr>
                                        <tr>
                                        <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px">CURRENT Account No. </td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px"><strong>915020021706515</strong></td>
                                        </tr>
                                        <tr>
                                        <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px">Bank Details</td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">Axis Bank Ltd, <br/> 37-D, Velachery-Tambaram Main Road,<br/><strong>Velachery,CHENNAI</strong></td>
                                        </tr>
                                        <tr>
                                        <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px">IFSC Code</td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">UTIB0000234</td>
                                        </tr>                                        
                                        <tr>
                                        <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px">Swift Code</td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">AXISINBB234</td>
                                        </tr>
                                        
                                    </table>
<br/>                                    <table width="750" cellspacing="0" cellpadding="5" align="center" border="1">
                                        <tr>
                                            <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Service Tax Registration No.</strong></td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">AACCF5694ASD001</td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>PAN</strong> </td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">AACCF5694A</td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>CIN/LLPIN no</strong></td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">U55100TN2015PTC100485</td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="border-top:none; font-family:cambria; font-size:11.5px"><strong>Provisional GST Number</strong></td>
                                        <td valign="top" style="border-top:none; border-left:none; font-family:cambria; font-size:11.5px">35AACCF5694A1ZW</td>
                                        </tr>
                                    </table><br/>
                   <?php
           }
                   ?>
                                        <table width="750" cellspacing="0" cellpadding="5" align="center" >
                                        <tr>
                                            <td style="font-family:cambria; font-size:11.5px;">We are truly passionate and it is our endeavour is to provide a true Andaman experience. Andaman & Nicobar Islands are not just a destination that we sell it is something that we believe in, it is a way of life for us.</td>
                                        </tr>

                                    </table> 

                                    <p>&nbsp;</p>
                                    <table width="750" cellspacing="0" cellpadding="5" align="center" >
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;">Best Regards,</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><?php echo isset($closure[0]->FileHandlerFTT) ? $closure[0]->FileHandlerFTT : "" ?> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><strong>Faraway Tree Hospitality Private Limited <br /> <i>(Consortium Partner for India-B2B)</i></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><strong>Port Blair:</strong> No: 38, 3rd Floor, Junglighat, South Andaman, Port Blair - 744101 (Andaman Islands, India)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><strong>Chennai:</strong> Second Floor at No. 6 (New No. 17, Old No. 9), Second Link Street, (Opposite St. Isabel’s hospital), C.I.T.Colony, Mylapore, Chennai – 600004 (Tamil Nadu, India)</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><strong>M</strong> +91-95005.55912 | <strong>T</strong> +91-44-2498.0114 | <strong>T</strong> +91-44-4206.9995 (Office 0930 hrs - 1830 hrs) </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><span style="color:#009900"><strong>Read our guest testimonials:</strong></span>&nbsp;&nbsp;<a href="http://farawaytree-andaman.com/testimonials" target="_blank" class="style1">http://farawaytree-andaman.com/testimonials</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><span style="color:#009900"><strong>Like us on Facebook:</strong></span>&nbsp;&nbsp;<a href="https://www.facebook.com/farawaytree.andaman" target="_blank" class="style1">https://www.facebook.com/farawaytree.andaman</a></a></span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><a href="http://www.farawaytree-andaman.com/" target="_blank" class="style1">www.farawaytree-andaman.com</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><span style="color:#009900"><strong>'Something Different &ndash; A Beachside&nbsp;Caf&eacute;'  (Havelock Island):&nbsp;</strong></span></td>
                                        </tr>
                                        <tr>
                                            <td width="350" style="font-family:cambria; font-size:11.5px;"><a href="http://www.facebook.com/something.different.havelock" target="_blank" class="style1">www.facebook.com/something.different.havelock</a></td>
                                            <td width="328" style="font-family:cambria; font-size:11.5px;"><a href="http://www.havelockrestaurants.com/" target="_blank" class="style1">www.havelockrestaurants.com</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="font-family:cambria; font-size:11.5px;"><span style="color:#009900"><strong>'Aqua Fun' (Havelock Island) : Sailing, Kayaking, Snorkelling & more: :&nbsp;</strong></span></td>
                                        </tr>
                                        <tr>
                                            <td style="font-family:cambria; font-size:11.5px;"><a href="https://www.facebook.com/aquafun.havelock/" target="_blank" class="style1">https://www.facebook.com/aquafun.havelock/</a></td>
                                            <td><a href="http://farawaytree-andaman.com/aquafun/" target="_blank" class="style1">http://farawaytree-andaman.com/aquafun/</a></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                    </table> 
                                    <script type="text/javascript">
                                        str = document.querySelectorAll(".stripLastPlus");
                                        str.forEach(function(item) {
                                            text = item.innerHTML;
                                            item.innerHTML = text.replace(/\+$/, '');
                                        });
                                    </script>
                                    </body>
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
