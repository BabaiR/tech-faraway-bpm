<?php
    include "../connections/connection.php";
    if(isset($_GET['hotel_info'])) {
        $hotel_id = utf8_decode($_GET['hotel_info']);
        $que = "DELETE FROM `hotel_info` where  HotelInfoID = $hotel_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['island_info'])) {
        $hotel_id = utf8_decode($_GET['island_info']);
        $que = "DELETE FROM `islands` where  IslandId = $hotel_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['hotel_single'])) {
        $hotel_id = utf8_decode($_GET['hotel_single']);
        $que = "DELETE FROM `hotels` where  HotelID = $hotel_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['voucher_single'])) {
        $voucher_id = utf8_decode($_GET['voucher_single']);
        $que = "DELETE FROM `voucher` WHERE `VoucherID` = $voucher_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['fhAgent'])) {
        $voucher_id = utf8_decode($_GET['fhAgent']);
        $que = "DELETE FROM `file_handler_agent` WHERE `FIleHandlerAgentID` = $voucher_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['fttAgent'])) {
        $voucher_id = utf8_decode($_GET['fttAgent']);
        $que = "DELETE FROM `file_handler` WHERE `FileHandlerID` = $voucher_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['Agent'])) {
        $agent_id = utf8_decode($_GET['Agent']);
        $que = "DELETE FROM `agent` WHERE `AgentID` = $agent_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
    if(isset($_GET['list_hotel_review'])) {
        $agent_id = utf8_decode($_GET['list_hotel_review']);
        $que = "DELETE FROM `hotel_review` WHERE `HotelReviewID` = $agent_id";
        if($conn->query($que)) {
            echo 1;
        }
        else {
            echo "Failed".$conn->error ; 
        }
    }
?>