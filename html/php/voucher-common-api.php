<?php

include "../connections/connection.php";

if (empty($_SESSION['voucher_id']) && isset($_SESSION['login_user'])) {
    $voucher_status="Pending";
    $user_id = $_SESSION['login_user'];
    $insert_voucher = "INSERT INTO `voucher`  (`UserID` , `status`, `CreatedOn`) VALUES ('$user_id','$voucher_status',NOW())";
    if ($conn->query($insert_voucher)) {
        $_SESSION['voucher_id'] = $conn->insert_id;
    } else {
        echo "Error " . $conn->error;
    }
}
$SelectVoucher = filter_var($_SESSION['voucher_id'], FILTER_SANITIZE_STRING);
// step 1
if ($_POST["currentFormID"] == 0 || $_POST["currentFormID"] == "0") {

    $GuestName = filter_var($_POST['GuestName'], FILTER_SANITIZE_STRING);
    $Arrival = $_POST['Arrival'];
    $Departure = $_POST['Departure'];
    $PaymentStatus = filter_var($_POST['PaymentStatus'], FILTER_SANITIZE_STRING);
    $DiglipurNights = filter_var($_POST['DiglipurNights'], FILTER_SANITIZE_STRING);
    $NeilIslandNights = filter_var($_POST['NeilIslandNights'], FILTER_SANITIZE_STRING);
    $HavelockNights = filter_var($_POST['HavelockNights'], FILTER_SANITIZE_STRING);
    $PortBlairNights = filter_var($_POST['PortBlairNights'], FILTER_SANITIZE_STRING);
    $TotalNights = filter_var($_POST['TotalNights'], FILTER_SANITIZE_STRING);
    $CutOff = filter_var($_POST['CutOff'], FILTER_SANITIZE_STRING);
    $Occupancy = filter_var($_POST['Occupancy'], FILTER_SANITIZE_STRING);
    $ExtraAdult = filter_var($_POST['ExtraAdult'], FILTER_SANITIZE_STRING);
    $ExtraChild = filter_var($_POST['ExtraChild'], FILTER_SANITIZE_STRING);
    $Infant = filter_var($_POST['Infant'], FILTER_SANITIZE_STRING);
    $InfantUnder2 = filter_var($_POST['InfantUnder2'], FILTER_SANITIZE_STRING);
    $SingleOccupancy = filter_var($_POST['SingleOccupancy'], FILTER_SANITIZE_STRING);
    $ExtraChildWithMat = filter_var($_POST['ExtraChildWithMat'], FILTER_SANITIZE_STRING);
    $OccupancyRate = filter_var($_POST['OccupancyRate'], FILTER_SANITIZE_STRING);
    $ExtraAdultRate = filter_var($_POST['ExtraAdultRate'], FILTER_SANITIZE_STRING);
    $ExtraChildRate = filter_var($_POST['ExtraChildRate'], FILTER_SANITIZE_STRING);
    $InfantRate = filter_var($_POST['InfantRate'], FILTER_SANITIZE_STRING);
    $InfantUnder2Rate = filter_var($_POST['InfantUnder2Rate'], FILTER_SANITIZE_STRING);
    $SingleOccupancyRate = filter_var($_POST['SingleOccupancyRate'], FILTER_SANITIZE_STRING);
    $ExtraChildWithMatRate = filter_var($_POST['ExtraChildWithMatRate'], FILTER_SANITIZE_STRING);
    $SingleOccupancywithfamily = filter_var($_POST['SingleOccFamily'], FILTER_SANITIZE_STRING);
    $SingleOccupancywithfamilyRate = filter_var($_POST['SingleOccFamilyRate'], FILTER_SANITIZE_STRING);


    if (intval(mysqli_num_rows($r = $conn->query("SELECT * from guest_count where SelectVoucher = $SelectVoucher"))) > 0) {
        while ($row = mysqli_fetch_array($r)) {
            $CountGuestID = $row['CountGuestID'];
        }
        $delteGuestCount = "DELETE from guest_count where CountGuestID = '$CountGuestID'";
        if ($conn->query($delteGuestCount)) {
            $insertGuestCount = "INSERT INTO `guest_count` (`SelectVoucher`, `GuestName`, `Arrival`, `Departure`, `PaymentStatus`, `PortBlairNights` , `HavelockNights` ,`NeilIslandNights`,`DiglipurNights`,`TotalNights`, `CutOff`, `Occupancy`, `ExtraAdult`, `ExtraChild`, `ExtraChildWithMat`,  `Infant`, `InfantUnder2`, `SingleOccupancy`, `OccupancyRate`, `ExtraAdultRate`, `ExtraChildRate`, `ExtraChildWithMatRate`, `InfantRate`, `InfantUnder2Rate`, `SingleOccupancyRate`, `SingleOccFamily`, `SingleOccFamilyRate`, `CreatedOn`) VALUES ( '$SelectVoucher', '$GuestName', '$Arrival', '$Departure', '$PaymentStatus', '$PortBlairNights' , '$HavelockNights' ,'$NeilIslandNights','$DiglipurNights', '$TotalNights', '$CutOff', '$Occupancy', '$ExtraAdult', '$ExtraChild', '$ExtraChildWithMat', '$Infant', '$InfantUnder2', '$SingleOccupancy',  '$OccupancyRate', '$ExtraAdultRate', '$ExtraChildRate', '$ExtraChildWithMatRate', '$InfantRate', '$InfantUnder2Rate', '$SingleOccupancyRate', '" . $SingleOccupancywithfamily . "', '" . $SingleOccupancywithfamilyRate . "', NOW())";

            if ($conn->query($insertGuestCount)) {
                $getStatus = updateInsertVehicalInfo($SelectVoucher, $conn);

                if ($getStatus == 1) {
                    echo $getStatus;
                } else {
                    echo "Error " . $getStatus;
                }
            } else {
                echo "Error " . $conn->error;
            }
        } else {
            echo "Error " . $conn->error;
        }
    } else {
        $insertGuestCount = "INSERT INTO `guest_count` (`SelectVoucher`, `GuestName`, `Arrival`, `Departure`, `PaymentStatus`, `PortBlairNights` , `HavelockNights` ,`NeilIslandNights`,`DiglipurNights`,`TotalNights`, `CutOff`, `Occupancy`, `ExtraAdult`, `ExtraChild`, `ExtraChildWithMat`,  `Infant`, `InfantUnder2`, `SingleOccupancy`, `OccupancyRate`, `ExtraAdultRate`, `ExtraChildRate`, `ExtraChildWithMatRate`, `InfantRate`, `InfantUnder2Rate`, `SingleOccupancyRate`, `SingleOccFamily`, `SingleOccFamilyRate`, `CreatedOn`) VALUES ( '$SelectVoucher', '$GuestName', '$Arrival', '$Departure', '$PaymentStatus', '$PortBlairNights' , '$HavelockNights' ,'$NeilIslandNights','$DiglipurNights', '$TotalNights', '$CutOff', '$Occupancy', '$ExtraAdult', '$ExtraChild', '$ExtraChildWithMat', '$Infant', '$InfantUnder2', '$SingleOccupancy',  '$OccupancyRate', '$ExtraAdultRate', '$ExtraChildRate', '$ExtraChildWithMatRate', '$InfantRate', '$InfantUnder2Rate', '$SingleOccupancyRate', '" . $SingleOccupancywithfamily . "', '" . $SingleOccupancywithfamilyRate . "', NOW())";
        if ($conn->query($insertGuestCount)) {
            $getStatus = updateInsertVehicalInfo($SelectVoucher, $conn);
            if ($getStatus == 1) {
                echo $getStatus;
            } else {
                echo "Error " . $getStatus;
            }
        } else {
            echo "Error " . $conn->error;
        }
    }
}

// step 2
if ($_POST["currentFormID"] == 1 || $_POST["currentFormID"] == "1") {
    echo "Step 2 entered";
//    if (!empty($_POST['ContactNumber'])) {
    if (1) {
        $age_array = explode("###", $_POST['GuestAges']);
        $name_array = explode("###", $_POST['GuestNames']);
        $ContactNumber = $_POST['ContactNumber'];
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from guest_info where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $GuestInfoID = $row['GuestInfoID'];
                $deleteGuestInfo = "DELETE from guest_info where GuestInfoID = '$GuestInfoID'";
                if ($conn->query($deleteGuestInfo)) {
                    
                } else {
                    echo $conn->error;
                }
            }
        }
        for ($j = 0; $j < count($age_array) - 1; $j++) {

            $insertGuestInfo = "INSERT INTO `guest_info` ( `VoucherID`, `ContactNumber`, `GuestName`, `Age`, `CreatedOn`) VALUES ( '$SelectVoucher', '$ContactNumber',  '$name_array[$j]', '$age_array[$j]', NOW())";
            if ($conn->query($insertGuestInfo)) {
                if ($j == count($age_array) - 1) {
                    echo 1;
                }
            } else {
                echo $conn->error;
            }
        }
    }
}
// step 3
if ($_POST["currentFormID"] == 2 || $_POST["currentFormID"] == "2") {

//  Mixing arrival and departure as during starting phase both were in the same table  
//    if (!empty($_POST['ArrivalFlightName']) || !empty($_POST['DepartureFlightName'])) {
    if(1){
        echo "inside form if";
        $Arrival_time_array = explode("###", $_POST['ArrivalTime']);
        $Arrival_FlightNumber_array = explode("###", $_POST['ArrivalflightNumber']);
        $Arrival_name_array = explode("###", $_POST['ArrivalFlightName']);
        $Departure_FlightNumber_array = explode("###", $_POST['DepartureflightNumber']);
        $Departure_time_array = explode("###", $_POST['DepartureTime']);
        $Departure_name_array = explode("###", $_POST['DepartureFlightName']);
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from ticket_info where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $TicketInfoID = $row['TicketInfoID'];
                $delete_ticket_info = "DELETE from ticket_info where TicketInfoID = '$TicketInfoID'";
                if ($conn->query($delete_ticket_info)) {
                    
                } else {
                    echo $conn->error;
                }
            }
        }
//        Departure starts
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from ticket_info_depature where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $TicketInfoID = $row['TicketInfoDepartureID'];
                $delete_ticket_info = "DELETE from ticket_info_depature where TicketInfoDepartureID = '$TicketInfoID'";
                if ($conn->query($delete_ticket_info)) {
                    
                } else {
                    echo $conn->error;
                }
            }
        }
//        Arrival insert
        for ($j = 0; $j < count($Arrival_name_array)-1; $j++) {
            echo "inside form for";
            if (!empty($Arrival_name_array[$j])) {
                $insertTicketInfo = "INSERT INTO `ticket_info` (`VoucherID`, `ArrivalFlightName`, `FlightNumber` ,`ArrivalTime`, `CreatedOn`) VALUES ('$SelectVoucher', '$Arrival_name_array[$j]', '$Arrival_FlightNumber_array[$j]' ,'$Arrival_time_array[$j]', NOW())";
                if ($conn->query($insertTicketInfo)) {
                    if ($j == count($Arrival_name_array) - 1) {
                        echo "Form3 success";
                    }
                } else {
                    echo $conn->error;
                }
            }
        }
//      Departure starts
        for ($j = 0; $j < count($Departure_name_array)-1; $j++) {
            echo "inside form for";
            if (!empty($Departure_name_array[$j])) {
            //
                $insertTicketInfo = "INSERT INTO `ticket_info_depature` (`VoucherID`, `DepartureFlightName`,`FlightNumber` ,`DepartureTime`, `CreatedOn`) VALUES ('$SelectVoucher' , '$Departure_name_array[$j]', '$Departure_FlightNumber_array[$j]' ,  '$Departure_time_array[$j]' , NOW())";
                if ($conn->query($insertTicketInfo)) {
                    if ($j == count($Departure_name_array) - 1) {
                        echo "Form3 success";
                    }
                } else {
                    echo $conn->error;
                }
            }
        }
    }
//    if (!empty($_POST['SpeacialRemark'])) {
    if(1){
        $speacial_remark_array = explode("###", $_POST['SpeacialRemark']);
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from ticket_special_remark where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $RemarksID = $row['RemarksID'];
                $delete_ticket_info = "DELETE from ticket_special_remark where RemarksID = '$RemarksID'";
                if ($conn->query($delete_ticket_info)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }
        for ($j = 0; $j < count($speacial_remark_array)-1; $j++) {
            echo "inside form for";
            if (!empty($speacial_remark_array[$j])) {
                $insertTicketRemark = "INSERT INTO `ticket_special_remark` (`VoucherID`, `SpeacialRemark`, `CreatedOn`) VALUES ('$SelectVoucher', '$speacial_remark_array[$j]', NOW())";
                if ($conn->query($insertTicketRemark)) {
                    if ($j == count($speacial_remark_array) - 1) {
                        echo "Form3 success";
                    }
                } else {
                    return $conn->error;
                }
            }
        }
    }

//    if (!empty($_POST['FerryTicket'])) {
    if(1){
        $count = 0;
        $FerryTicket_array = explode("###", $_POST['FerryTicket']);
        $Status_array = explode("###", $_POST['Status']);
        $ferryTicketID_array = explode("###", $_POST['ferryTicketID']);
        $Arrival_name_array = explode("###", $_POST['Arrival']);
        $lastFerryID = array();
        $FerryName_array = explode("###", $_POST['FerryName']);
        $SailingDate_array = explode("###", $_POST['SailingDate']);



        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from ticket_ferry_info where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {

                $TicketFerryID = $row['TicketFerryID'];
                if (!(in_array($TicketFerryID, $ferryTicketID_array))) {
                    $delete_ticket_info = "DELETE from ticket_ferry_info where TicketFerryID = '$TicketFerryID'";
                    if ($conn->query($delete_ticket_info)) {
                        if (($key = array_search($TicketFerryID, $ferryTicketID_array)) !== false) {
                            array_splice($ferryTicketID_array, $key, 1);
                        }
                    } else {
                        echo $conn->error;
                    }
                }
            }
        }

        for ($j = 0; $j < count($FerryTicket_array)-1; $j++) {
            if (intval(mysqli_num_rows($r = $conn->query("SELECT * from ticket_ferry_info where  `TicketFerryID` = '$ferryTicketID_array[$j]'"))) > 0) {
                $TicketFerryID = $ferryTicketID_array[$j];
                $update = "UPDATE ticket_ferry_info  SET  `SailingDate` = '$SailingDate_array[$j]', `Status`='$Status_array[$j]',  `FerryName` = '$FerryName_array[$j]' where TicketFerryID = $TicketFerryID";
                if ($conn->query($update)) {
                    array_push($lastFerryID, $TicketFerryID);
                } else {
                    echo $conn->error;
                }
            } else {
                if (!empty($FerryTicket_array[$j])) {
                    $insertFerryInfo = "INSERT INTO `ticket_ferry_info` (`VoucherID`, `FerryTicket`, `SailingDate`, `Status`,  `FerryName` ,  `CreatedOn`) VALUES ('$SelectVoucher', '$FerryTicket_array[$j]', '$SailingDate_array[$j]', '$Status_array[$j]',  '$FerryName_array[$j]' , NOW())";
                    if ($conn->query($insertFerryInfo)) {
                        array_push($lastFerryID, $conn->insert_id);
                        if ($j == count($FerryTicket_array) - 1) {
                            
                        }
                    } else {
                        return $conn->error;
                    }
                }
            }
        }
        echo json_encode($lastFerryID);
    }
}
// step 4
if ($_POST["currentFormID"] == 3 || $_POST["currentFormID"] == "3") {
    echo "inside main if";
//    if (!empty($_POST['Price']) && !empty($_POST['Description'])) {
//    if(1){
        echo "inside accomodation info price and descrip";
        $Price_array = explode("###", $_POST['Price']);
        $Description_array = explode("###", $_POST['Description']);

        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from accommodation_info where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $AccommodationInfoID = $row['AccommodationInfoID'];
                $deleteAccommodationInfo = "DELETE from accommodation_info where AccommodationInfoID = '$AccommodationInfoID'";
                if ($conn->query($deleteAccommodationInfo)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }
        for ($j = 0; $j < count($Price_array)-1; $j++) {
            echo "inside Secondary Price FOr accomodation ";
            if (!empty($Price_array[$j]) && !empty($Description_array[$j])) {
                $insertAccommodationInfo = "INSERT INTO accommodation_info ( `VoucherId`, `Description`, `Price`, `CreatedOn`) VALUES ( '$SelectVoucher', '$Description_array[$j]', '$Price_array[$j]', NOW())";
                echo $insertAccommodationInfo;
                if ($conn->query($insertAccommodationInfo)) {
                    if ($j == count($Price_array) - 1) {
                        echo "Form4 success";
                    }
                } else {
                    return $conn->error;
                }
            }
        }
//    }
//    if (!empty($_POST['CheckIn']) && !empty($_POST['CheckOut']) && !empty($_POST['RoomSelected'])) {

        $Status_array = explode("###", $_POST['StatusF4']);
        $NumberOfNights_array = explode("###", $_POST['NumberOfNights']);
        $CheckIn_array = explode("###", $_POST['CheckIn']);
        $CheckOut_array = explode("###", $_POST['CheckOut']);
        $NumberOfRooms_array = explode("###", $_POST['NumberOfRooms']);
        $RoomSelected_array = explode("###", $_POST['RoomSelected']);
        $MealPlan_array = explode("###", $_POST['MealPlan']);
        $HotelSelected_array = explode("###", $_POST['HotelSelected']);
        $SelectedIsland_array = explode("###", $_POST['SelectedIsland']);
        $HotelBlockingID_array = explode("###", $_POST['HotelBlockingID']);
        $Amount_array = explode("###", $_POST['AmountUpdatedWithPax']);
        $AmountPayable = "";
        $CutOffDate = "";
        //Genrate blocking request 
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from hotel_blocking_request where VoucherID = $SelectVoucher"))) > 0) {
           
            while ($row = mysqli_fetch_array($r)) {
                $HotelBlockingID = $row['HotelBlockingID'];
                if (!(in_array($HotelBlockingID, $HotelBlockingID_array))) {
                    $deleteAccommodationInfo = "DELETE from hotel_blocking_request where HotelBlockingID = $HotelBlockingID";
                    echo $deleteAccommodation . "<br/>";
                    if ($conn->query($deleteAccommodationInfo)) {
                        
                    } else {
                        echo "delete failed";
                        echo $conn->error;
                    }
                }
            }
        }

        for ($j = 0; $j < count($CheckIn_array)-1; $j++) {
           
            if (!empty($HotelBlockingID_array[$j]) && intval(mysqli_num_rows($r = $conn->query("SELECT * from hotel_blocking_request where HotelBlockingID = $HotelBlockingID_array[$j]"))) > 0) {
                echo "inside if for check for value > 0";
                while ($row = mysqli_fetch_array($r)) {
                    $HotelBlockingID = $row['HotelBlockingID'];

                    $updateHotelBlockingInfo = "UPDATE hotel_blocking_request SET  `SelectedIsland` = '$SelectedIsland_array[$j]', `HotelSelected` = '$HotelSelected_array[$j]', `MealPlan` = '$MealPlan_array[$j]', `RoomSelected` = '$RoomSelected_array[$j]', `CheckIn` = '$CheckIn_array[$j]', `CheckOut` = '$CheckOut_array[$j]' , `NumberOfNights` = '$NumberOfNights_array[$j]', `NumberOfRooms` = '$NumberOfRooms_array[$j]',  `Amount`= '$Amount_array[$j]',  `Status`= '$Status_array[$j]'   where HotelBlockingID = $HotelBlockingID";
                    echo $updateHotelBlockingInfo . "<br/>";


                   // echo "<br/>" . $updateHotelBlockingInfo . "<br/>";
                    if ($conn->query($updateHotelBlockingInfo)) {
                        
                    } else {
                        echo "delete failed";
                        echo $conn->error;
                    }
                }
            } else {
//                if (!empty($CheckIn_array[$j]) && !empty($CheckOut_array[$j])) {
                   if(1){
                $insertAccommodationInfo = "INSERT INTO `hotel_blocking_request` (`VoucherID`, `SelectedIsland`, `HotelSelected`, `MealPlan`, `RoomSelected`, `CheckIn`, `CheckOut`, `NumberOfNights`, `NumberOfRooms`, `Amount`, `AmountPayable`, `CutOffDate`, `Status`, `PaymentStatus`,`CreatedOn`) VALUES ( '$SelectVoucher', '$SelectedIsland_array[$j]', '$HotelSelected_array[$j]', '$MealPlan_array[$j]', '$RoomSelected_array[$j]', '$CheckIn_array[$j]', '$CheckOut_array[$j]', '$NumberOfNights_array[$j]', '$NumberOfRooms_array[$j]', '$Amount_array[$j]', '$AmountPayable', '$CutOffDate', '$Status_array[$j]','$Status_array[$j]', NOW())";
                    echo $insertAccommodationInfo . "else condition<br/>";
                    echo $j;
                    echo "hell".$HotelBlockingID_array[$j]."hello";
                    echo count($CheckIn_array)."<br/>";
                    if ($conn->query($insertAccommodationInfo)) {
                        if ($j == count($CheckIn_array) - 1) {
                            echo "Form4 blocking success";
                        }
                    } else {
                        echo $conn->error;
                    }
                }
            }
        }
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from accommodation where VoucherID = $SelectVoucher"))) > 0) {
            
            while ($row = mysqli_fetch_array($r)) {
                $AccommodationID = $row['AccommodationID'];
                $deleteAccommodation = "DELETE from accommodation where AccommodationID = '$AccommodationID'";
                //echo $deleteAccommodation;
                if ($conn->query($deleteAccommodation)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }
        for ($j = 0; $j < count($RoomSelected_array)-1; $j++) {
            
//            if (!empty($RoomSelected_array[$j])) {
//            if(1){
                $insertAccommodation = "INSERT INTO `accommodation` (`VoucherID`, `SelectedIsland`, `HotelSelected`, `MealPlan`, `RoomSelected`, `CheckIn`, `CheckOut`, `NumberOfNights`, `NumberOfRooms`, `Status`, `CreatedOn`) VALUES ( '$SelectVoucher', '$SelectedIsland_array[$j]', '$HotelSelected_array[$j]', '$MealPlan_array[$j]', '$RoomSelected_array[$j]', '$CheckIn_array[$j]', '$CheckOut_array[$j]', '$NumberOfNights_array[$j]', '$NumberOfRooms_array[$j]', '$Status_array[$j]', NOW())";
                //echo $insertAccommodation;

                if ($conn->query($insertAccommodation)) {
                    if ($j == count($RoomSelected_array) - 1) {
                        echo "Form4 success";
                    }
                } else {
                    return $conn->error;
                }
            }
//        }
//    }
    
    
}



// step 5
if ($_POST["currentFormID"] == 4 || $_POST["currentFormID"] == "4") {

//    if (!empty($_POST['SelectDate'])) {
//    if(1){
        $SelectDate_array = explode("###", $_POST['SelectDate']);
        $selectIslandItinerary = explode("###", $_POST['islanditinerary']);
        $Remark_array = explode("###", $_POST['Remark']);
        $BriefItenarary_array = explode("###", $_POST['BriefItenarary']);
        $DetailedItenarary_array = explode("###@@@###@@@###", $_POST['DetailedItenarary']);
        $PackageName4 = mysqli_real_escape_string($conn, $_POST['PackageName4']);




        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from itenarary where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $ItenararyID = $row['ItenararyID'];
                $deleteItenarary = "DELETE from itenarary where ItenararyID = '$ItenararyID'";
                if ($conn->query($deleteItenarary)) {
                    echo $deleteItenarary;
                } else {
                    return $conn->error;
                }
            }
        }
        for ($j = 0; $j < count($SelectDate_array)-1; $j++) {
            echo "inside Secondary Price FOr ";
            $DetailedItenarary_array[$j] = mysqli_real_escape_string($conn, $DetailedItenarary_array[$j]);
            $BriefItenarary_array[$j] = mysqli_real_escape_string($conn, $BriefItenarary_array[$j]);
//            if (!empty($SelectDate_array[$j])) {
                $ItenararyAdd = "INSERT INTO `itenarary` ( `VoucherId`,`PackageName`, `SelectDate`, `SelectedIsland`, `Remark`, `BriefItenarary`, `DetailedItenarary`, `CreatedOn`) VALUES ('$SelectVoucher', '$PackageName4', '$SelectDate_array[$j]', '$selectIslandItinerary[$j]', '$Remark_array[$j]', '$BriefItenarary_array[$j]', '$DetailedItenarary_array[$j]',  NOW())";
                echo $ItenararyAdd;

                if ($conn->query($ItenararyAdd)) {
                    if ($j == count($SelectDate_array) - 1) {
                        echo "Form5 success";
                    }
                } else {
                    return $conn->error;
                }
            }
        //}
//    }
}
// step 6
if ($_POST["currentFormID"] == 5 || $_POST["currentFormID"] == "5") {
    echo "inisde form 5";

//    if (!empty($_POST['FileHandlerFTT'])) {
//    if(1){
        echo "inside   secondary if";
        $Agent = $_POST['Agent'];
        $FileHandlerFTT = $_POST['FileHandlerFTT'];
        $FileHandlerAgent = $_POST['FileHandlerAgent'];
        $PackageAmount = $_POST['PackageAmount'];
        $GSTIncluded = $_POST['GSTIncluded'];
        $PaymentTerms = $_POST['PaymentTerms'];
        $GSTIncluded = $_POST['GSTIncluded'];
        $FileReferenceNumber = $_POST['FileReferenceNumber'];
        $AdditionalPayement = $_POST['AdditionalPayement'];
        $DueBy = $_POST['DueBy'];
        $Status6 = $_POST['Status6'];
        $Discrepancy = $_POST['Discrepancy'];



        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from closure where VoucherID = $SelectVoucher"))) > 0) {
            echo "inside delete";
            while ($row = mysqli_fetch_array($r)) {
                $ClosureID = $row['ClosureID'];
                $deleteClosure = "DELETE from closure where ClosureID = '$ClosureID'";
                if ($conn->query($deleteClosure)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }
        //if (!empty($FileHandlerFTT)) {
            $insertClosure = "INSERT INTO `closure` (`VoucherId`, `Agent`, `FileHandlerFTT`, `FileHandlerAgent`, `PackageAmount`, `GSTIncluded`, `PaymentTerms`, `FileReferenceNumber`, `AdditionalPayement`, `DueBy`, `Status`, `Discrepancy` , `CreatedOn`) VALUES ('$SelectVoucher', '$Agent', '$FileHandlerFTT', '$FileHandlerAgent', '$PackageAmount', '$GSTIncluded', '$PaymentTerms', '$FileReferenceNumber', '$AdditionalPayement', '$DueBy', '$Status6', '$Discrepancy', NOW())";
            echo "inside not empty";
            if ($conn->query($insertClosure)) {

                echo "Form5 success";
            } else {
                echo $conn->error;
            }
        //}
//    }





//    if (!empty($_POST['FileHandlerFTT'])) {

        $Agent = $_POST['Agent'];
        $FileHandlerFTT = $_POST['FileHandlerFTT'];
        $FileHandlerAgent = $_POST['FileHandlerAgent'];
        $PackageAmount = $_POST['PackageAmount'];
        $GSTIncluded = $_POST['GSTIncluded'];
        $PaymentTerms = $_POST['PaymentTerms'];
        $GSTIncluded = $_POST['GSTIncluded'];
        $PaymentTerms = $_POST['PaymentTerms'];
        $FileReferenceNumber = $_POST['FileReferenceNumber'];
        $AdditionalPayement = $_POST['AdditionalPayement'];
        $DueBy = $_POST['DueBy'];
        $Status6 = $_POST['Status6'];
        $Discrepancy = $_POST['Discrepancy'];




        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from closure where VoucherID = $SelectVoucher"))) > 0) {

            while ($row = mysqli_fetch_array($r)) {
                $ClosureID = $row['ClosureID'];
                $deleteClosure = "DELETE from closure where ClosureID = '$ClosureID'";
                if ($conn->query($deleteClosure)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }



//        if (!empty($FileHandlerFTT)) {
       // if(1){
            $insertClosure = "INSERT INTO `closure` (`VoucherId`, `Agent`, `FileHandlerFTT`, `FileHandlerAgent`, `PackageAmount`, `GSTIncluded`, `PaymentTerms`, `FileReferenceNumber`, `AdditionalPayement`, `DueBy`, `Status`, `Discrepancy` , `CreatedOn`) VALUES ('$SelectVoucher', '$Agent', '$FileHandlerFTT', '$FileHandlerAgent', '$PackageAmount', '$GSTIncluded', '$PaymentTerms', '$FileReferenceNumber', '$AdditionalPayement', '$DueBy', '$Status6', '$Discrepancy', NOW())";
            echo $insertClosure;
            if ($conn->query($insertClosure)) {

                echo "Form5 success";
            } else {
                echo $conn->error;
            }
        //}
//    }
//    if (!empty($_POST['DateOfPayment'])) {
//    if(1){
        echo "inside main Price";
        $DateOfPayment = explode("###", $_POST['DateOfPayment']);
        $ConfirmationVia = explode("###", $_POST['ConfirmationVia']);
        $PaymentAmount = explode("###", $_POST['PaymentAmount']);
        $TDSCut = explode("###", $_POST['TDSCut']);

        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from payment_status where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $AccommodationInfoID = $row['PaymentStatusID'];
                $deleteAccommodationInfo = "DELETE from payment_status where PaymentStatusID = '$AccommodationInfoID'";
                if ($conn->query($deleteAccommodationInfo)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }
      
        for ($j = 0; $j < count($DateOfPayment)-1; $j++) {
            //if (!empty($DateOfPayment[$j])) {
                $insertPaymentStatus = "INSERT INTO `payment_status` (`VoucherID`, `DateOfPayment`, `ConfirmationVia`, `PaymentAmount`, `TDSCut`, `CreatedOn`) VALUES ( '$SelectVoucher', '$DateOfPayment[$j]', '$ConfirmationVia[$j]', '$PaymentAmount[$j]', '$TDSCut[$j]', NOW())";
               echo $insertPaymentStatus;
                if ($conn->query($insertPaymentStatus)) {
                    if ($j == count($DateOfPayment) - 1) {
                        echo "Form4 success";
                    }
                } else {
                    return $conn->error;
                }
            }
        //}
//    }
}

function updateInsertVehicalInfo($SelectVoucher, $conn) {
    if (isset($_POST['Islands']) && !empty($_POST['Islands'])) {
        if (intval(mysqli_num_rows($r = $conn->query("SELECT * from vehicle_info where VoucherID = $SelectVoucher"))) > 0) {
            while ($row = mysqli_fetch_array($r)) {
                $CountVehicleInfoID = $row['VehicleInfoID'];
                $delteVehicleInfo = "DELETE from vehicle_info where VehicleInfoID = '$CountVehicleInfoID'";
                if ($conn->query($delteVehicleInfo)) {
                    
                } else {
                    return $conn->error;
                }
            }
        }

        $islands = $_POST['Islands'];
        $islands_array = explode('###', $islands);
        $vehicles = $_POST['Vehicles'];
        $vehicles_array = explode('###', $vehicles);
        $VehicleCount = $_POST['VehicleCount'];
        $VehicleCount_array = explode('###', $VehicleCount);
        for ($i = 0; $i < count($islands_array)-1; $i++) {
            $currentIslandName = $islands_array[$i];
            if (!empty($currentIslandName)) {
                if ($i == 0) {
                    for ($j = 0; $j < 3; $j++) {
                        if (!empty($VehicleCount_array[$j]) && !empty($vehicles_array[$j])) {

                            $insertVehicelInfo = "INSERT INTO `vehicle_info` (`VoucherID`, `IslandName`, `VehicleType`, `VehicleNumber`, `CreatedOn`) VALUES ( '$SelectVoucher', '$currentIslandName', '$vehicles_array[$j]', '$VehicleCount_array[$j]',  NOW() )";
                            if ($conn->query($insertVehicelInfo)) {
                                
                            } else {
                                return $conn->error;
                            }
                        }
                    }
                } else if ($i == 1) {

                    for ($j = 3; $j < 5; $j++) {
                        if (!empty($VehicleCount_array[$j]) && !empty($vehicles_array[$j])) {
                            $insertVehicelInfo = "INSERT INTO `vehicle_info` (`VoucherID`, `IslandName`, `VehicleType`, `VehicleNumber`, `CreatedOn`) VALUES ( '$SelectVoucher', '$currentIslandName', '$vehicles_array[$j]', '$VehicleCount_array[$j]',  NOW() )";
                            if ($conn->query($insertVehicelInfo)) {
                                
                            } else {
                                return $conn->error;
                            }
                        }
                    }
                } else if ($i == 2) {

                    for ($j = 5; $j < 7; $j++) {
                        if (!empty($VehicleCount_array[$j]) && !empty($vehicles_array[$j])) {
                            $insertVehicelInfo = "INSERT INTO `vehicle_info` (`VoucherID`, `IslandName`, `VehicleType`, `VehicleNumber`, `CreatedOn`) VALUES ( '$SelectVoucher', '$currentIslandName', '$vehicles_array[$j]', '$VehicleCount_array[$j]',  NOW() )";
                            if ($conn->query($insertVehicelInfo)) {
                                
                            } else {
                                return $conn->error;
                            }
                        }
                    }
                } else {
                    for ($j = 7; $j < 8; $j++) {
                        if (!empty($VehicleCount_array[$j]) && !empty($vehicles_array[$j])) {
                            $insertVehicelInfo = "INSERT INTO `vehicle_info` (`VoucherID`, `IslandName`, `VehicleType`, `VehicleNumber`, `CreatedOn`) VALUES ( '$SelectVoucher', '$currentIslandName', '$vehicles_array[$j]', '$VehicleCount_array[$j]',  NOW() )";
                            if ($conn->query($insertVehicelInfo)) {
                                return 1;
                            } else {
                                return $conn->error;
                            }
                        }
                    }
                }
            }
        }
    }
}



?>