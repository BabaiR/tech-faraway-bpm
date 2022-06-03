<?php

include "../connections/connection.php";
date_default_timezone_set("Asia/Kolkata");
if (isset($_GET['id'])) {
    $island_id = $_GET['id'];
    $que = "SELECT * FROM hotels WHERE `IslandID` =$island_id";
    $result = $conn->query($que);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
    return false;
}
if (isset($_GET['hotel_info_id'])) {
    $island_info_id = $_GET['hotel_info_id'];
    $que = "SELECT * FROM `hotel_info` WHERE `HotelID` = '$island_info_id'";
    $result = $conn->query($que);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
    return false;
}
if (isset($_POST['status']) && $_POST['status'] == "form61") {
    $part = $_POST['fileHandler'];
    $query = "SELECT * from file_handler where DataType = '$part'";
    $result = $conn->query($query);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "form41") {
    $SelectVoucher = filter_var($_SESSION['voucher_id'], FILTER_SANITIZE_STRING);
    $query = "SELECT * from hotel_blocking_request where VoucherID = $SelectVoucher";
    $result = $conn->query($query);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "getVocherID") {
    $selectVoucher = $_SESSION['voucher_id'];
    echo "$selectVoucher";
}
// get all data of the hote related to item
if (isset($_POST["status"]) && $_POST["status"] == "hotelForID") {
    $island_info_id = $_POST['name_id'];
    $que = "SELECT * FROM `hotels` WHERE `HotelID` = '$island_info_id'";
    $result = $conn->query($que);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
// For getting hotel name and island name basicaly used in form 4 generate
if (isset($_POST["status"]) && ($_POST["status"] == "island" || $_POST["status"] == "hotel")) {
    if ($_POST["status"] == "hotel") {
        $island_info_id = $_POST['name_id'];
        $que = "SELECT * FROM `hotels` WHERE `HotelID` = '$island_info_id'";
        $result = $conn->query($que);
        if ($conn->error) {
            echo "Some error occoured" . $conn->error;
        }

        if ($result->num_rows > 0) {
            while ($r = $result->fetch_assoc()) {
                echo $r['HotelName'];
            }
        } else {
            echo 'Not found';
        }
    } else { //Island
        $island_id = $_POST['name_id'];
        $que = "SELECT * FROM islands WHERE `IslandId` =$island_id";
        $result = $conn->query($que);
        if ($conn->error) {
            echo "Some error occoured" . $conn->error;
        }

        if ($result->num_rows > 0) {
            while ($r = $result->fetch_assoc()) {
                echo $r['IslandName'];
            }
        } else {
            echo "Not found";
        }
    }
}

// For updating the table room blocking from modal in form 6
if (isset($_POST["status"]) && $_POST["status"] == "updateRoomBlocking") {

    $amountPayable_array = explode("###", $_POST['amountPayable']);
    $paymentStatus_array = explode("###", $_POST['paymentStatus']);
    $cutOfDate_array = explode("###", $_POST['cutOfDate']);
    $hotelSelectedId_array = explode("###", $_POST['hotelSelectedId']);
    $Amount41_array = explode("###", $_POST['Amount41']);


    for ($j = 0; $j < count($hotelSelectedId_array); $j++) {
        echo "   inside form for  ";
        if (!empty($hotelSelectedId_array[$j])) {

            $insertTicketInfo = "UPDATE `hotel_blocking_request` SET `Amount` = '$Amount41_array[$j]' ,`AmountPayable` = '$amountPayable_array[$j]', `CutOffDate` = '$cutOfDate_array[$j]', `Status` = '$paymentStatus_array[$j]' WHERE `hotel_blocking_request`.`HotelBlockingID` = $hotelSelectedId_array[$j]";

            if ($conn->query($insertTicketInfo)) {
                if ($j == count($hotelSelectedId_array) - 1) {
                    echo "Form3 success";
                }
            } else {
                echo $conn->error;
            }
        }
    }
}
// step 3 in voucher 
if (isset($_POST['status']) && $_POST['status'] == "form31sector") {
    $query = "SELECT * from sector";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "form31sectorTiming") {
    $query = "SELECT * from sector_timings";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "showForm33Check") {
    $voucher_id = $_POST['voucher_id'];
    $query = "SELECT * from ticket_ferry_info where VoucherID = $voucher_id";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "client-service-confirmation") {
    $voucher_id = $_SESSION['voucher_id'];
    $DocketNumber = "DN /" . $voucher_id;
    $start_date = $_POST['start_date'];
    $conirmation = "CV -" . date("y", strtotime($start_date)) . date("m", strtotime($start_date)) . "-" . date("d", strtotime($start_date)) . "-" . $voucher_id;
    $insertGuestCount = "INSERT INTO `client_service_confirmation` (`VoucherID`, `ConfirmationNumber`, `DocketNumber`, `CreatedOn`) VALUES ( '$voucher_id', '$conirmation', '$DocketNumber', NOW())";
    if (intval(mysqli_num_rows($r = $conn->query("SELECT * from client_service_confirmation where VoucherID = $voucher_id"))) > 0) {
        while ($row = mysqli_fetch_array($r)) {
            $GuestInfoID = $row['ClientServiceConfirmationID'];
            $deleteGuestInfo = "DELETE from client_service_confirmation where ClientServiceConfirmationID = '$GuestInfoID'";
            if ($conn->query($deleteGuestInfo)) {
                
            } else {
                echo $conn->error;
            }
        }
    }
    $insertGuestCount = "INSERT INTO `client_service_confirmation` (`VoucherID`, `ConfirmationNumber`, `DocketNumber`, `CreatedOn`) VALUES ( '$voucher_id', '$conirmation', '$DocketNumber', NOW())";
    if ($conn->query($insertGuestCount)) {

        echo $voucher_id;
    } else {
        echo $conn->error;
    }
}
if (isset($_POST['status']) && $_POST['status'] == "getAccomodationID") {
    $voucher_id = $_SESSION['voucher_id'];
    $query = "SELECT * from accommodation where VoucherID = $voucher_id)";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}

// step 6 in voucher 
if (isset($_POST['status']) && $_POST['status'] == "AgentFor6") {
    $query = "SELECT * from agent";
    $result = $conn->query($query);
    if ($conn->error) {
        die("Error in getting agent" . $conn->error);
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
// step 6 in voucher 
if (isset($_POST['status']) && $_POST['status'] == "form61getAgent" && !empty($_POST['agentId'])) {
    $Agent = $_POST['agentId'];
    $query = "SELECT * from file_handler_agent where Agent = $Agent";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting agent" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
// step 6 in voucher 
if (isset($_POST['status']) && $_POST['status'] == "getHotelRoomBlocking") {

    $query = "SELECT * from hotel_blocking_request";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel block" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "generatehotel") {

    $hotel_id = isset($_POST['hotel_id']) && !empty($_POST['hotel_id']) ? $_POST['hotel_id'] : "%";
    $Arrival = isset($_POST['Arrival']) && !empty($_POST['Arrival']) ? $_POST['Arrival'] : "0000-00-00 00:00:00";
    $Departure = isset($_POST['Departure']) && !empty($_POST['Departure']) ? $_POST['Departure'] : "2100-08-30 10:37:53";
    $PaymentStatus = isset($_POST['PaymentStatus']) && !empty($_POST['PaymentStatus']) ? $_POST['PaymentStatus'] : "%";
    $reportstatus = isset($_POST['reportstatus']) && !empty($_POST['reportstatus']) ? $_POST['reportstatus'] : "%";
//$statusHotelReport = isset($_POST['statusHotelReport']) && !empty($_POST['statusHotelReport'])? $_POST['statusHotelReport'] : "%";
    $typeOfDate = isset($_POST['typeOfDate']) ? $_POST['typeOfDate'] : "";
    $ioStart = $typeOfDate == "CIO" ? $Arrival : "0000-00-00 00:00:00";
    $ioEnd = $typeOfDate == "CIO" ? $Departure : "2100-08-30 10:37:53";
    $coStart = $typeOfDate == "CO" ? $Arrival : "0000-00-00 00:00:00";
    $coEnd = $typeOfDate == "CO" ? $Departure : "2100-08-30 10:37:53";



    if (!empty($hotel_id) && !empty($Arrival) && !empty($Departure) && !empty($PaymentStatus) && !empty($reportstatus)) {
//$query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn , hotels.HotelName ,  hotel_blocking_request.CheckOut , hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id'";        
// $query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn , hotels.HotelName ,  hotel_blocking_request.CheckOut , hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id' AND hotels.PaymentTerms LIKE '$PaymentStatus'";        
        $query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn ,hotel_blocking_request.HotelBlockingID,hotel_blocking_request.Status, hotel_blocking_request.CutOffDate , hotels.HotelName ,  hotel_blocking_request.CheckOut ,hotels.PaymentTerms, hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id' AND hotels.PaymentTerms LIKE '$PaymentStatus' AND hotel_blocking_request.CheckIn >= '$ioStart' AND hotel_blocking_request.CheckIn < '$ioEnd' AND hotel_blocking_request.CutOffDate >= '$coStart' AND hotel_blocking_request.CutOffDate <= '$coEnd' AND hotel_blocking_request.Status LIKE '$reportstatus'";
    }

    sendJson($conn, $query);
}

function sendJson($conn, $query) {
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel block" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}

if (isset($_POST["status"]) && $_POST["status"] == "updateDataReport") {

    $payterm = $_POST['payterm'];
    $hoteliid = $_POST['hotelID'];
    $amount = $_POST['amount'];
    $paymentstat = $_POST['paymentstatus'];
    $cutOff = $_POST['cutoff'];


    for ($j = 0; $j < count($hotelSelectedId_array); $j++) {
        echo "   inside form for  ";
        if (!empty($hotelSelectedId_array[$j])) {

            $insertTicketInfo = "UPDATE `hotel_blocking_request` SET `AmountPayable` = '$amount' ,`CutOffDate` = '$cutOff', `Status` = '$paymentstat' WHERE `HotelBlockingID` = $hoteliid";

            if ($conn->query($insertTicketInfo)) {
                if ($j == count($hotelSelectedId_array) - 1) {
                    echo "Form3 success";
                }
            } else {
                echo $conn->error;
            }
        }
    }
}


if (isset($_POST['status']) && $_POST['status'] == "getmakruzz") {

    $query = "SELECT * from sector";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel block" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}

if (isset($_POST['status']) && $_POST['status'] == "get_guest_info") {
    $voucher_id = $_POST['voucher_id'];
    $query = "SELECT * from guest_info where VoucherID = $voucher_id";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel block" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}

if (isset($_POST['status']) && $_POST['status'] == "get_report_ferry") {
    $ticketFerryID = $_POST['ticketFerryID'];
    $query = "SELECT * from ferry_report where TicketFerryID = $ticketFerryID";
    $result = $conn->query($query);
    if ($conn->error) {
        echo "Error in getting hotel block" . $conn->error;
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}

if (isset($_POST['status']) && $_POST['status'] == "generatemakruzz") {

    $sector_id = isset($_POST['sector_id']) && !empty($_POST['sector_id']) ? $_POST['sector_id'] : "%";
    $Arrival = isset($_POST['Arrival']) && !empty($_POST['Arrival']) ? $_POST['Arrival'] : "0000-00-00 00:00:00";
    $Departure = isset($_POST['Departure']) && !empty($_POST['Departure']) ? $_POST['Departure'] : "2100-08-30 10:37:53";

    $bookstatus = isset($_POST['bookingStatus']) && !empty($_POST['bookingStatus']) ? $_POST['bookingStatus'] : "%";
//$statusHotelReport = isset($_POST['statusHotelReport']) && !empty($_POST['statusHotelReport'])? $_POST['statusHotelReport'] : "%";



    if (!empty($sector_id) && !empty($Arrival) && !empty($Departure) && !empty($bookstatus)) {
//$query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn , hotels.HotelName ,  hotel_blocking_request.CheckOut , hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id'";        
// $query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn , hotels.HotelName ,  hotel_blocking_request.CheckOut , hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id' AND hotels.PaymentTerms LIKE '$PaymentStatus'";        
        $query = "SELECT sector.Name,sector.SectorID ,client_service_confirmation.ConfirmationNumber , ticket_ferry_info.SailingDate ,ticket_ferry_info.TicketFerryID, ticket_ferry_info.VoucherID ,guest_info.GuestName,guest_info.Age ,guest_info.GuestInfoID , COUNT(guest_info.GuestInfoID) AS pax FROM sector INNER JOIN ticket_ferry_info ON sector.SectorID = ticket_ferry_info.FerryTicket INNER JOIN client_service_confirmation ON ticket_ferry_info.VoucherID = client_service_confirmation.VoucherID INNER JOIN guest_info ON ticket_ferry_info.VoucherID = guest_info.VoucherID WHERE sector.SectorID LIKE '$sector_id' AND ticket_ferry_info.SailingDate >= '$Arrival' AND ticket_ferry_info.Status LIKE '$bookstatus' GROUP BY ticket_ferry_info.TicketFerryID
";
    }

    sendJson($conn, $query);
}

/* if (isset($_POST['status']) && $_POST['status'] == "ferryReportData") {

  $voucher_id= isset($_POST['ticketid']) && !empty($_POST['ticketid']) ? $_POST['ticketid'] : "%";


  //$statusHotelReport = isset($_POST['statusHotelReport']) && !empty($_POST['statusHotelReport'])? $_POST['statusHotelReport'] : "%";

  if (!empty($voucher_id)) {
  //$query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn , hotels.HotelName ,  hotel_blocking_request.CheckOut , hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id'";
  // $query = "SELECT guest_count.GuestName , client_service_confirmation.ConfirmationNumber , hotel_blocking_request.CheckIn , hotels.HotelName ,  hotel_blocking_request.CheckOut , hotel_info.PayWOGST , hotel_blocking_request.AmountPayable FROM hotel_blocking_request INNER JOIN guest_count ON hotel_blocking_request.VoucherID = guest_count.SelectVoucher INNER JOIN client_service_confirmation ON hotel_blocking_request.VoucherID = client_service_confirmation.VoucherID INNER JOIN hotel_info ON hotel_blocking_request.RoomSelected = hotel_info.HotelInfoID INNER JOIN hotels ON hotel_blocking_request.HotelSelected = hotels.HotelID WHERE hotel_blocking_request.HotelSelected LIKE '$hotel_id' AND hotels.PaymentTerms LIKE '$PaymentStatus'";
  //$query ="SELECT FerryReportID ,(SELECT COUNT(*) FROM ferry_report WHERE TicketFerryID='$voucher_id' AND Status='Confirmed') AS confirmed,(SELECT COUNT(*) FROM ferry_report WHERE TicketFerryID=' $voucher_id' AND Status='Pending') AS pending, Amount,PNR,Status FROM ferry_report WHERE TicketFerryID='$voucher_id'";
  }

  sendJson($conn,$query);
  } */

if (isset($_POST['status']) && $_POST['status'] == "generateFerryData") {

    $query = "SELECT * from ferry_report";
    sendJson($conn, $query);
}
if (isset($_POST['status']) && $_POST['status'] == "sectortiming") {
    $sector_id = $_POST['sector_id'];
    if (!empty($sector_id)) {
        $query = "SELECT * FROM sector_timings WHERE SectorID= '$sector_id'";
    }
    sendJson($conn, $query);
}

if (isset($_POST['status']) && $_POST['status'] == "makruzzmodaldata") {
    $ticket = $_POST['ticketFerryID'];
    $fieldata = json_decode($_POST['fielddata']);
    for ($j = 0; $j < count($fieldata); $j++) {
        $ferryid = $fieldata[$j]->ferryid;
        $amount = intval($fieldata[$j]->amount);
        $timing = $fieldata[$j]->timing;
        $pnr = $fieldata[$j]->pnr;
        $status = $fieldata[$j]->status;
        if ($ferryid == "") {
            $insertReportFerry = "INSERT INTO `ferry_report` ( `TicketFerryID`,  `Amount`,`FerryName`, `PNR`, `Status`) VALUES ( '$ticket', '$amount','$timing' , '$pnr', '$status')";
            if ($conn->query($insertReportFerry)) {
                if ($j == count($fieldata) - 1) {
                    echo "success";
                }
            } else {
                echo $conn->error;
            }
        } else {
            $updateReportFerry = "UPDATE `ferry_report` SET `Amount` = '$amount',`FerryName`='$timing',  `PNR` = '$pnr' ,`Status` = '$status' WHERE `FerryReportID`= '$ferryid'";
            if ($conn->query($updateReportFerry)) {
                if ($j == count($fieldata) - 1) {
                    echo "success";
                }
            } else {
                echo $conn->error;
            }
        }
    }
}

if (isset($_POST["status"]) && $_POST["status"] == "updateTicketFerryInfo") {

    $ticketferry = $_POST['ticketFerryID'];
    
        

            $insertTicketInfo = "UPDATE `ticket_ferry_info` SET `Status` = 'Confirmed'  WHERE `TicketFerryID` = '$ticketferry'";
            
            if ($conn->query($insertTicketInfo)) {

                    echo "success1";

            } else {
                echo $conn->error;
            }
        
    }
if (isset($_POST['status']) && $_POST['status'] == "listhotelreview") {
    $hotel_id = $_POST['hotelid'];
    $cat = $_POST['category'];
    if (!empty($hotel_id)) {
        $query = "SELECT * FROM `hotel_review` where Hotel='$hotel_id' and category='$cat'";
    }
    sendJson($conn, $query);
}
if (isset($_POST['status']) && $_POST['status'] == "ferryaccounts") {
    $voucher_iid = $_POST['voucher'];
    
    if (!empty($voucher_iid)) {
        $query = "SELECT  ticket_ferry_info.TicketFerryID,sector.SectorID, sector.Name AS SectorName,ferry_report.Amount,arr.pax FROM ticket_ferry_info LEFT JOIN sector ON sector.SectorID= ticket_ferry_info.FerryTicket LEFT JOIN ferry_report ON ferry_report.TicketFerryID=ticket_ferry_info.TicketFerryID LEFT JOIN (SELECT COUNT(*) as pax,VoucherID FROM guest_info GROUP BY guest_info.VoucherID ) as arr ON ticket_ferry_info.VoucherID=arr.VoucherID   WHERE ticket_ferry_info.VoucherID= $voucher_iid ";
    }
    sendJson($conn, $query);
}
if (isset($_POST['status']) && $_POST['status'] == "get_payment_status") {
    $voucher_iid = $_POST['voucherid'];
    
    if (!empty($voucher_iid)) {
        $query = "SELECT *  FROM payment_status  WHERE VoucherID =$voucher_iid ";
    }
    sendJson($conn, $query);
}
if (isset($_POST['status']) && $_POST['status'] == "updatePaymentStatusModal") {
    $paymentStatusmodalarray =  json_decode($_POST['payment']) ;
    //echo $paymentStatusmodalarray;
    $vouch = $_POST['voucherid'];
    
    foreach ($paymentStatusmodalarray as $value) {
            $paymentid= $value->paymentid;
            
            $date=$value->date;
            $confirm=$value->confirm;
            $payment=$value->payment;
            $tds=$value->tds;
        if (!empty($paymentid)) {
                
        
        $updatepaymentmodal = "UPDATE payment_status SET  DateOfPayment = '$date' , VoucherID = '$vouch' , ConfirmationVia = '$confirm', PaymentAmount = '$payment', TDSCut = '$tds' WHERE PaymentStatusID = '$paymentid'";
                if ($conn->query($updatepaymentmodal)) {
                    
                        echo "updated success";
                    
                } else {
                    return $conn->error;
                }
            }
            elseif(empty($paymentid)){
                $insertpaymentmodal = "INSERT INTO `payment_status` (`DateOfPayment`, `VoucherID`, `ConfirmationVia`, `PaymentAmount`, `TDSCut`, `Createdon`) VALUES ( '$date', '$vouch', '$confirm', '$payment', '$tds',NOW())";
                if ($conn->query($insertpaymentmodal)) {
                    
                        echo "insert vehicle success";
                    
                } else {
                    return $conn->error;
                }
            }
    
    
    }
    
    
}
if (isset($_POST['status']) && $_POST['status'] == "updatedisc") {
    $voucher_iid = $_POST['voucherid'];
    $disc = $_POST['disc'];
    if (!empty($voucher_iid)) {
        $query = "UPDATE closure SET  Discrepancy = '$disc'  WHERE VoucherId = '$voucher_iid'";
    }
    sendJson($conn, $query);
}
if (isset($_POST['status']) && $_POST['status'] == "accountshotelblocking") {
    $SelectVoucher = $_POST['voucher'];
    $query = "SELECT * from hotel_blocking_request where VoucherID = $SelectVoucher";
    $result = $conn->query($query);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
if (isset($_POST['status']) && $_POST['status'] == "accounthotelsdata") {
    
    $query = "SELECT * from hotels";
    $result = $conn->query($query);
    if ($conn->error) {
        die("Error in getting hotel");
    }
    $rows = array();
    if ($result->num_rows > 0) {
        while ($r = $result->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        $sendData['data'] = $rows;
        echo json_encode($sendData);
        return false;
    }
    $sendData['data'] = $rows;
    echo json_encode($sendData);
}
?>