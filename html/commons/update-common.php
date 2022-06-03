<?php

if (isset($_POST['Update_SaveClose_hotel'])) {
    $HotelID = filter_var($hotel_id, FILTER_SANITIZE_NUMBER_INT);
    $IslandID = filter_var($_POST['IslandName'], FILTER_SANITIZE_STRING);
    $HotelName = filter_var($_POST['HotelName'], FILTER_SANITIZE_STRING);
    $Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
    $ContactNumber = filter_var($_POST['ContactNumber'], FILTER_SANITIZE_STRING);
    $EmailAddress = mysqli_escape_string( $conn,$_POST['EmailAddress']) ;
    $PaymentTerms = filter_var($_POST['PaymentTerms'], FILTER_SANITIZE_STRING);
    $add_hotel = "UPDATE hotels SET HotelName = '$HotelName', IslandID = '$IslandID' , Address = '$Address', ContactNumber = '$ContactNumber',EmailAddress = '$EmailAddress' , PaymentTerms = '$PaymentTerms'  WHERE HotelID = '$HotelID'";
    if ($conn->query($add_hotel)) {
        echo "<div class='alert alert-success'>Hotel Updated Successfully!</div>";
        echo "<script>window.location.href='list-hotels.php';</script>";
    } else {
        echo "Error " . $conn->error;
    }
}
if (isset($_POST['Update_SaveClose_info'])) {
    $add_hotel = "";
    if (isset($_POST['totalCount'])) {
        $status = 0;
        $len = intval($_POST['totalCount']);
        $HotelID = filter_var($_POST['HotelName'], FILTER_SANITIZE_STRING);
        for ($i = 0; $i < $len; $i++) {
            if ($_POST['RoomCategory'] != "") {
                $HotelInfoID = $i == 0 ? filter_var($_POST['HotelInfoID'], FILTER_SANITIZE_STRING) : filter_var($_POST['HotelInfoID' . $i], FILTER_SANITIZE_STRING);
                $RoomCat = $i == 0 ? filter_var($_POST['RoomCategory'], FILTER_SANITIZE_STRING) : filter_var($_POST['RoomCategory' . $i], FILTER_SANITIZE_STRING);
                $PayWOGST = $i == 0 ? filter_var($_POST['PayWOGST'], FILTER_SANITIZE_STRING) : filter_var($_POST['PayWOGST' . $i], FILTER_SANITIZE_STRING);
                $BasePriceGST = $i == 0 ? filter_var($_POST['BasePriceGST'], FILTER_SANITIZE_STRING) : filter_var($_POST['BasePriceGST' . $i], FILTER_SANITIZE_STRING);
                $ExtraAWB = $i == 0 ? filter_var($_POST['ExtraAWB'], FILTER_SANITIZE_STRING) : filter_var($_POST['ExtraAWB' . $i], FILTER_SANITIZE_STRING);
                $ExtraCWB = $i == 0 ? filter_var($_POST['ExtraCWB'], FILTER_SANITIZE_STRING) : filter_var($_POST['ExtraCWB' . $i], FILTER_SANITIZE_STRING);
                $ExtraCNB = $i == 0 ? filter_var($_POST['ExtraCNB'], FILTER_SANITIZE_STRING) : filter_var($_POST['ExtraCNB' . $i], FILTER_SANITIZE_STRING);
                $MealPlan = $i == 0 ? filter_var($_POST['MealPlan'], FILTER_SANITIZE_STRING) : filter_var($_POST['MealPlan' . $i], FILTER_SANITIZE_STRING);
                $AddonPriceGST = $i == 0 ? filter_var($_POST['AddonPriceGST'], FILTER_SANITIZE_STRING) : filter_var($_POST['AddonPriceGST' . $i], FILTER_SANITIZE_STRING);
                //echo $HotelInfoID."<br/>";
                if (!empty($HotelInfoID)) {
                    //echo $HotelInfoID;
                    $add_hotel = "UPDATE `hotel_info` SET `HotelID` = '$HotelID', `RoomCat` = '$RoomCat', `PayWOGST` = '$PayWOGST', `BasePriceGST` = '$BasePriceGST', `ExtraAWB` = '$ExtraAWB',`ExtraCWB` = '$ExtraCWB',`ExtraCNB` = '$ExtraCNB' , `MealPlan` = '$MealPlan', `AddonPriceGST` = '$AddonPriceGST' WHERE `HotelInfoID` = '$HotelInfoID'";
                } else {
                    $add_hotel = "INSERT INTO `hotel_info` ( `HotelID`, `RoomCat`, `PayWOGST`, `BasePriceGST`, `ExtraAWB`,`ExtraCWB`,`ExtraCNB` , `MealPlan`, `AddonPriceGST`, `CreatedOn`) VALUES ( '$HotelID', '$RoomCat', '$PayWOGST', '$BasePriceGST', '$ExtraAWB', '$ExtraCWB', '$ExtraCNB', '$MealPlan', '$AddonPriceGST', NOW());";
                }
                if ($conn->query($add_hotel)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
            }
        }
        if ($status == 1) {
            echo "<div class='alert alert-success'>Hotel Info Updated Successfully!</div>";
            echo "<script>window.location.href='list-hotels-info.php';</script>";
        } else {
            $status = 0;
            echo "Error " . $conn->error;
        }
    }
}


if (isset($_POST['Update_SaveClose_island']) || isset($_POST['Update_SaveContinue_island'])) {
    if (isset($_POST['island_name'])) {
        $island_name = filter_var($_POST['island_name'], FILTER_SANITIZE_STRING);
        $que = "UPDATE islands set `IslandName` = '$island_name' where IslandId = $island_id";
        if ($conn->query($que)) {
            echo "<div class='alert alert-success'>Island Updated Successfully!</div>";
            echo "<script>window.location.href='list-islands.php';</script>";
        } else {
            echo "Errror" . $conn->error;
        }
    }
}
if (isset($_POST['SavePassword'])) {
    
    if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
        if (isset($_SESSION['login_user'])) {            
            $user = $_SESSION['login_user'];
            echo $user;
            $old_password = hash('sha512',$_POST['old_password']);
            $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
            $con_password = filter_var($_POST['confirm_password'], FILTER_SANITIZE_STRING);
            

            $query = "select * from user where `UserID`= '$user' and `Password` = '$old_password'";
            echo "<script type='text/javascript'>console.log('".$query."');</script>";
            $result = $conn->query($query);
            if ($conn->error) {                                
                die('<script type="text/javascript">swal({title: "Success",text: "Error'.$conn->error.'",timer: 2200,showConfirmButton: false}); /*window.location.href="list-hotels.php";*/</script>');
            }
            $rows = array();
            if ($result->num_rows > 0) {
                
                if ($new_password == $con_password) {
                    $pass = hash('sha512', $new_password);                    
                    $que = "UPDATE user set `Password` = '$pass' where `UserID` = '$user' ";
                    
                    
                    if ($conn->query($que)) {
                        echo '<script type="text/javascript">swal({title: "Success",text: "Successfully updated the password",timer: 2200,showConfirmButton: false}); /*window.location.href="list-hotels.php";*/</script>';
                    } else {
                        echo "<script>alert('je;;p".$conn->error."');</script>";                        
                    }
                } else {
                    echo '<script type="text/javascript">swal({title: "Error",text: "New password do not match",timer: 2200,showConfirmButton: false}); /*window.location.href="list-hotels.php";*/</script>';
                }
            
            } else {
            echo '<script type="text/javascript">swal({title: "Error",text: "Old password does not match",timer: 2200,showConfirmButton: false}); /*window.location.href="list-hotels.php";*/</script>';

            }
        }
    }
}
if (isset($_POST['Update_ftt_agent']) ) {
  
        $agentId =$_POST['agentId'];
        $name=$_POST['CompanyName'];
        $que = "UPDATE file_handler set `FIleHandlerName` = '$name' where FileHandlerID = $agentId";
        if ($conn->query($que)) {
            echo "<div class='alert alert-success'>FTT Agent Updated Successfully!</div>";
            echo "<script>window.location.href='list-fh-ftt.php';</script>";
        } else {
            echo "Errror" . $conn->error;
        }
    
}

if (isset($_POST['Update_fh_Agent']) ) {
   echo "success";
        $agentId =$_POST['FileHandlerid'];
        $name=$_POST['FileHandlerName'];
        $agent=$_POST['AgentList'];
        $que = "UPDATE file_handler_agent set `AgentName` = '$name', `Agent` = '$agent' where FIleHandlerAgentID = $agentId";
        if ($conn->query($que)) {
            echo "<div class='alert alert-success'>FH Agent Updated Successfully!</div>";
            echo "<script>window.location.href='list-fh-agent.php';</script>";
        } else {
            echo "Errror" . $conn->error;
        }
    
}
if (isset($_POST['Update_Agent']) ) {
   echo "success";
        $agentId =$_POST['agentid'];
        $name=$_POST['CompanyName'];
        $adress=$_POST['addressTextarea'];
        $gst=$_POST['GSTNo'];
        $que = "UPDATE agent set `CompanyName` = '$name', `Address` = '$adress', `GSTNo` = '$gst' where AgentID = $agentId";
        if ($conn->query($que)) {
            echo "<div class='alert alert-success'> Agent Updated Successfully!</div>";
            echo "<script>window.location.href='list-agent.php';</script>";
        } else {
            echo "Errror" . $conn->error;
        }
    
}
if (isset($_POST['UpdateHotelReview']) ) {
    $hoteliid= $_POST['hoteliid'];
        $Island_rev = $_POST['Island'];
    $Hotel_rev = $_POST['Hotel'];
    $Category_rev = $_POST['Category_rev'];
    $Review = $_POST['Review'];
    $NumberOfRooms = $_POST['NumberOfRooms'];
    $RoomService = $_POST['RoomService'];
    $TeaCoffee = $_POST['TeaCoffee'];
    $InterCom = $_POST['InterCom'];
    $HotWater = $_POST['HotWater'];
    $Pool = $_POST['Pool'];
    $TV = $_POST['TV'];
    $MiniFridge = $_POST['MiniFridge'];
    $Bar = $_POST['Bar'];
    $SafeLocker = $_POST['SafeLocker'];
    $HairDryer = $_POST['HairDryer'];
    $ProximityToBeach = $_POST['ProximityToBeach'];
    $CheckInTime = $_POST['CheckInTime'];
    $CheckOutTime = $_POST['CheckOutTime'];
        
        $que = "UPDATE `hotel_review` SET `Island` = '$Island_rev', `Hotel` = '$Hotel_rev', `Category` = '$Category_rev', `Review` = '$Review', `NumberOfRooms` = '$NumberOfRooms',`RoomService` = '$RoomService',`TeaCoffee` = '$TeaCoffee' , `InterCom` = '$InterCom', `HotWater` = '$HotWater',  `Pool` = '$Pool', `TV` = '$TV', `MiniFridge` = '$MiniFridge', `Bar` = '$Bar' , `SafeLocker` = '$SafeLocker' , `HairDryer` = '$HairDryer' , `ProximityToBeach` = '$ProximityToBeach', `CheckInTime` = '$CheckInTime', `CheckOutTime` = '$CheckOutTime'  WHERE `HotelReviewID` = '$hoteliid'";
        if ($conn->query($que)) {
            echo "<div class='alert alert-success'> Hotel Review Updated Successfully!</div>";
            echo "<script>window.location.href='list-hotels-review.php';</script>";
        } else {
            echo "Errror" . $conn->error;
        }
    
}

?>