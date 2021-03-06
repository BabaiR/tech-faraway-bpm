<?php
require_once 'connections/connection.php';
date_default_timezone_set("Asia/Kolkata");
include 'commons/common-functions.php';
error_reporting(0);
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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Hotel Room Block</title>

        <style type="text/css">
            #one td {
                border: 1px solid #000;
            }

            #oneinner td {
                border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;
            }

            #typography {font-family:cambria; font-size:11.5px }
        </style>
        <script type="text/javascript"> var flag = 0;</script>

    </head>

    <body id="typography">











       <?php /* <form method="post">
            <input type="submit" name="download" value="Download Doc" >
        </form> */?>

        <?php
        if (isset($_POST['download'])) {
            header("Content-Type: application/vnd.ms-word");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("content-disposition: attachment;filename=Hotel_Room_blocking.doc");
        }
        ?>


        <table width="700" cellspacing="0" cellpadding="5" align="center">
            <tr>
                <td style="font-family:cambria; font-size:11.5px;"><h3><u>ACCOMMODATION</u></h3></td>
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
                        <table width="700" cellspacing="0" cellpadding="5" align="center" >
                            <tr>
                                <td style="font-family:cambria; font-size:11.5px"><strong><?php
                                        $hotel_main = json_decode(mainHotelData($conn, $hotel_blocking_request[$i]->HotelSelected));
                                        echo isset($hotel_main[0]->EmailAddress) ? "Email : " . $hotel_main[0]->EmailAddress . "<br/>" : '';
                                        echo "GUEST NAME: " . $guest_count[0]->GuestName;
                                        ?></strong></td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                        </table><br/><br/><br/>
                        <span class="formBlockRow" data-id="<?php echo $hotel_blocking_request[0]->HotelBlockingID; ?>">

                            <table width="700" cellspacing="0" border="0" cellpadding="5" align="center" style="margin-top:-40px;" >
                                <tr id="one">
                                    <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;">Establishment Details</td>
                                    <td colspan="2" align="center" style="border-left:none; font-family:cambria; font-size:11.5px;">Reservation Details</td>
                                </tr>
                                <tr id="oneinner">
                                    <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Name</td>

                                    <td width="288" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["HotelName"]; ?></td>

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
                                        <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy + intval($guest_count[0]->SingleOccFamily))) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? "0" . $guest_count[0]->ExtraChild . "  Child Without Mattress +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>
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
                                        <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy) + intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Mattress +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    
                                    </td>



                                </tr>
                                <tr id="oneinner">
                                    <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Tel</td>
                                    <?php
//                                        $hotelcontact =getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["ContactNumber"]; 
//                                        $exp=  explode("/ ", $hotelcontact);
//                                        //print_r($exp);
//                                        for($i=0;$i<count($exp);$i++) {
//                                            if(strlen($exp[$i])!=10)
//                                            {
//                                                echo $exp[$i];
//                                                echo strlen($exp[$i]);
//                                            }
//                                            if(strlen($exp[$i])==9){
//                                                echo "helllllooooo";
////                                                $first =substr($exp[$i],0,3)." - ";
////                                                echo $first.substr($exp[$i],4);
//                                            }
//                                        }
//                                    ?>
                                    <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[0]->HotelSelected, $conn)[0]["ContactNumber"]; // echo $guest_info[0]->ContactNumber     ?></td>
                                    <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Status</td>
                                    <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $hotel_blocking_request[0]->Status; ?></td>
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
                                        <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) > 0 ? "0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Mattress +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    

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
                        <table width="700" cellspacing="0" cellpadding="5" align="center">
                            <tr>
                                <td style="font-family:cambria; font-size:11.5px"><strong><?php
                                        $hotel_main = json_decode(mainHotelData($conn, $hotel_blocking_request[$i]->HotelSelected));
                                        echo isset($hotel_main[0]->EmailAddress) ? "Email : " . $hotel_main[0]->EmailAddress . "<br/>" : '';
                                        echo "GUEST NAME: " . $guest_count[0]->GuestName;
                                        ?></strong></td>
                            </tr>
                            <tr></tr>
                        </table><br/><br/><br/>
                        <span class="formBlockRow" data-id="<?php echo $hotel_blocking_request[$i]->HotelBlockingID; ?>">
                            <table width="700" cellspacing="0" border="0" cellpadding="5" align="center" style="margin-top:-40px;" >
                                <tr id="one">
                                    <td colspan="2" align="center" style="font-family:cambria; font-size:11.5px;">Establishment Details</td>
                                    <td colspan="2" align="center" style="border-left:none; font-family:cambria; font-size:11.5px;">Reservation Details</td>
                                </tr>
                                <tr id="oneinner">
                                    <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Name</td>

                                    <td width="288" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["HotelName"]; ?></td>

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
                                        <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? "0" . $guest_count[0]->ExtraChild . "  Child Without Mattress +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>
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
                                        <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) > 0 ? " 0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra mattress +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Mattress +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    
                                    </td>



                                </tr>
                                <tr id="oneinner">
                                    <td width="82" valign="top" style="font-family:cambria; font-size:11.5px;">Tel</td>
                                    <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo getHotelName($hotel_blocking_request[$i]->HotelSelected, $conn)[0]["ContactNumber"]; // echo $guest_info[0]->ContactNumber     ?></td>
                                    <td width="80" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">Status</td>
                                    <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><?php echo $hotel_blocking_request[$i]->Status; ?></td>
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
                                        <span class="stripLastPlus"><?php echo (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) > 0 ? "0" . (intval($guest_count[0]->Occupancy) + intval($guest_count[0]->SingleOccupancy)+ intval($guest_count[0]->SingleOccFamily)) . " Adults +" : "" ?><?php echo $guest_count[0]->ExtraAdult > 0 ? " 0" . $guest_count[0]->ExtraAdult . " Extra Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChildWithMat > 0 ? " 0" . $guest_count[0]->ExtraChildWithMat . " Child With Mattress +" : "" ?><?php echo $guest_count[0]->ExtraChild > 0 ? " 0" . $guest_count[0]->ExtraChild . "  Child Without Mattress +" : "" ?><?php echo (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) > 0 ? " 0" . (intval($guest_count[0]->Infant) + intval($guest_count[0]->InfantUnder2)) . " Infants +" : "" ?></span>    

                                    </td>



                                </tr>
                                <tr><td colspan="6">&nbsp;</td></tr>
                            </table>

                        </span>
                    </div>

                    <?php
                }
            }
            ?>

        </span>
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




