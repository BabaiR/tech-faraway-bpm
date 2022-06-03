<?php
// 123_Foo_Bar_123_Foo used when the whole data need to be selected where as rest are id specific
function getHotels($value,$conn) {
    $que = ($value === '123_Foo_Bar_123_Foo') ?  "SELECT * FROM hotels" : "SELECT * FROM hotels where IslandID = ".$value ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting hotel".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}

function getIslands($conn) {
    $que = "SELECT * FROM islands";
    $result = $conn->query($que);
    if($conn->error) {
        die("Error in getting");
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    $islands_json = json_encode($rows); 
    return $islands_json;
}



function getHotelInfo($value, $conn){
    $que = ($value === "123_Foo_Bar_123_Foo") ? "SELECT * FROM hotel_info" : "SELECT * FROM hotel_info where HotelID=".$value;
    $result = $conn->query($que);
    if($conn->error) {
        die("Error in getting");
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    $islands_info = json_encode($rows); 
    return $islands_info;
}
function getIslandName($value,$conn) {    
    $que = "SELECT IslandName from islands where IslandId = $value";
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    return $rows;
}

//This function will get all the details of a particular hotelId
function getHotelName($value,$conn) {
    $que = "SELECT * from hotels where HotelID = '$value'";
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    return $rows;
}
// get ferry name 
//This function will get all the details of a particular sector
function getSectorName($value,$conn) {
    $que = "SELECT * FROM `sector` where SectorID = $value";
 
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    return $rows;
}
//This function will get all the details of a particular sector timing
function getSectorTicket($value,$conn) {
    

    $que = "SELECT * FROM `sector_timings` where SectorTimingsID = $value";
 
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    return $rows;
}
//get all the info about a particular hotel from hotel_info table

//Hotel array for particular Id
function getHotelInfo_particular($id, $conn){
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $que = "SELECT * FROM hotel_info where HotelID = $id";
    $result = $conn->query($que);
    if($conn->error) {
        die("Error in getting");
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }    
    return $rows;
}
//Hotel info for a particular id
function getHotelInfo_ID($id, $conn){
    $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $que = "SELECT * FROM hotel_info where HotelInfoID = $id";
    $result = $conn->query($que);
    if($conn->error) {
        die("Error in getting");
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }    
    return $rows;
}
function showSuccess($text , $redirect) {
    echo "function called";
    echo empty($redirect) ? '<script type="text/javascript">successFull_Same();' : '<script type="text/javascript">successFull_Redirect('.$redirect.');</script>';
    
}
// Form-cv.php functions start here
// List view 
function getVouchers($conn,$UserID) {
    
//    $que = "SELECT * FROM `voucher`WHERE UserID= $UserID" ;
    $que = "SELECT DISTINCT voucher.VoucherID,voucher.status, gc.guestCount as gc,arr.arrival as arr, guest_count.GuestName,guest_count.Arrival,guest_info.ContactNumber,agent.CompanyName  FROM voucher LEFT JOIN guest_count ON guest_count.SelectVoucher = voucher.VoucherID LEFT JOIN guest_info ON guest_info.VoucherID=voucher.VoucherID LEFT JOIN closure ON closure.VoucherId=  voucher.VoucherID LEFT JOIN agent ON agent.AgentID=closure.Agent LEFT JOIN (SELECT count(*) as guestCount,VoucherID FROM guest_info WHERE guest_info.Age='' OR guest_info.GuestName ='' GROUP BY guest_info.VoucherID ) as gc ON voucher.VoucherID=gc.VoucherID LEFT JOIN (SELECT COUNT(*) as arrival,VoucherID FROM ticket_info WHERE ticket_info.FlightNumber='' GROUP BY ticket_info.VoucherID ) as arr ON voucher.VoucherID=arr.VoucherID" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting voucher".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
// list view
// step 1
function getGuestCount($conn,$voucher_id) {
    $que = "SELECT * FROM `guest_count` WHERE SelectVoucher = $voucher_id LIMIT 1" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
    }
    $guest_json = json_encode($rows);  
    return $guest_json;
}

// step 1
function getVehicleCount($conn,$voucher_id) {
    $que = "SELECT * FROM `vehicle_info` WHERE VoucherID = $voucher_id" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
// step 2
function steps($tableName,$conn,$voucher_id) {
    $que = "SELECT * FROM $tableName WHERE VoucherID = $voucher_id" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
// get review for hotel
function getHotelReview($hotelId,$conn) {
    $que = "SELECT * FROM hotel_review WHERE Hotel = $hotelId" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
//Invoice get agent detail
function getAgent($agentID,$conn) {
    $que = "SELECT * FROM agent WHERE AgentID = $agentID" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}
function voucherAuthantication($voucher,$conn,$userID){
    $que = "SELECT * FROM voucher WHERE UserID = '$userID' and VoucherID= '$voucher'" ;
    echo $que;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        return 1;
        
        
    }
    else {
        return 0;
    }
    
}

function ferryDatareport($conn){
    $que = "SELECT * FROM ferry_report" ;
    echo $que;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        return $rows;
        
        
    }
    else {
        return 0;
    }
    
}
function getAllAgent($conn) {
    $que = "SELECT * FROM agent " ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}
function getAllFhAgent($conn) {
    $que = "SELECT file_handler_agent.FIleHandlerAgentID,file_handler_agent.AgentName,agent.CompanyName FROM file_handler_agent INNER JOIN agent on agent.AgentID= file_handler_agent.Agent" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}
function getAllFttAgent($conn) {
    $que = "SELECT * FROM file_handler " ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}

function getfhAgent($agentID,$conn) {
   
    if(isset($agentID) && !empty($agentID)){
    $que = "SELECT file_handler_agent.FIleHandlerAgentID,file_handler_agent.AgentName,agent.CompanyName FROM file_handler_agent INNER JOIN agent on agent.AgentID= file_handler_agent.Agent WHERE FIleHandlerAgentID = $agentID" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
    }
    else{
        $send_json = json_encode([]);  
    return $send_json;
    }
}
function getftAgent($agentID,$conn) {
    $que = "SELECT * FROM file_handler WHERE FileHandlerID = $agentID " ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}
function checkintime($conn,$hotelID) {
    $que = "SELECT * FROM hotel_review WHERE hotel_review.Hotel=$hotelID " ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}
function mainHotelData($conn,$hotelID) {
    $que = "SELECT * FROM hotels WHERE HotelID=$hotelID " ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $send_json = json_encode($rows);  
    return $send_json;
}
function updateVoucher($conn,$voucher_id){
    $que = "update voucher SET status ='Issued' where voucherID = ".$voucher_id ;
    //echo $que;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }        
}
function getlistReview($conn) {
    $que = "SELECT hotel_review.HotelReviewID,hotel_review.Island,hotel_review.Category,hotel_review.Hotel,hotel_review.Review,hotel_review.NumberOfRooms,hotel_review.RoomService,hotel_review.TeaCoffee,hotel_review.InterCom,hotel_review.HotWater,hotel_review.Pool,hotel_review.TV,hotel_review.MiniFridge,hotel_review.Bar,hotel_review.SafeLocker,hotel_review.HairDryer,islands.IslandName,hotels.Address,hotels.HotelName FROM
hotel_review LEFT JOIN islands ON islands.IslandId= hotel_review.Island LEFT JOIN hotels ON hotels.HotelID= hotel_review.Hotel";
    $result = $conn->query($que);
    if($conn->error) {
        die("Error in getting");
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        echo "No data found";
    }
    $review_json = json_encode($rows); 
    return $review_json;
}
function getReviewhotel($hotelId,$conn) {
    $que = "SELECT * FROM hotel_review WHERE HotelReviewID = $hotelId" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
function selectedhoteldatainfo($conn,$voucher_id) {
    $que = "SELECT islands.IslandId,islands.IslandName,hotel_blocking_request.RoomSelected,hotels.HotelID,hotels.HotelName,hotel_info.HotelID,hotel_info.RoomCat,hotel_info.PayWOGST,hotel_blocking_request.Amount FROM hotel_blocking_request LEFT JOIN islands ON islands.IslandId= hotel_blocking_request.SelectedIsland LEFT JOIN hotels ON hotels.HotelID= hotel_blocking_request.HotelSelected LEFT JOIN hotel_info ON hotel_info.HotelInfoID=hotel_blocking_request.RoomSelected	 WHERE VoucherID =   $voucher_id" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
function ferryReportAmount($conn,$voucher_id) {
    $que = "SELECT sector.SectorID, sector.Name AS SectorName,ferry_report.Amount FROM ticket_ferry_info LEFT JOIN sector ON sector.SectorID= ticket_ferry_info.FerryTicket LEFT JOIN ferry_report ON ferry_report.TicketFerryID=ticket_ferry_info.TicketFerryID	 WHERE ticket_ferry_info.VoucherID=  $voucher_id" ;
    $result = $conn->query($que);
    if($conn->error) {
        echo "Error in getting guest_count".$conn->error;
    }
    $rows = array();
    if($result->num_rows > 0) {
        while($r= $result->fetch_assoc()) {
            $rows[] = $r;
        }
    }
    else {
        
    }
    $hotels_json = json_encode($rows);  
    return $hotels_json;
}
?>