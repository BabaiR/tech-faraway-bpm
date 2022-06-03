<?php
if(file_exists("../connections/connection.php")) {
    include_once "../connections/connection.php";
}

//Function to add new hotel
if (isset($_POST['SaveClose_hotel']) || isset($_POST['SaveContinue_hotel'])) {
    $IslandID = filter_var($_POST['IslandName'], FILTER_SANITIZE_STRING);
    $HotelName = filter_var($_POST['HotelName'], FILTER_SANITIZE_STRING);
    $Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
    $ContactNumber = filter_var($_POST['ContactNumber'], FILTER_SANITIZE_STRING);
    $EmailAddress = mysqli_escape_string($conn, $_POST['EmailAddress']);
    $PaymentTerms = filter_var($_POST['PaymentTerms'], FILTER_SANITIZE_STRING);
    
    $add_hotel = "INSERT INTO hotels (`HotelName`,`IslandID`,`Address`,`ContactNumber`,`EmailAddress`,`PaymentTerms`, `CreatedOn`) VALUES ('$HotelName','$IslandID', '$Address','$ContactNumber','$EmailAddress' , '$PaymentTerms',NOW())";
    if ($conn->query($add_hotel)) {
        if (isset($_POST['SaveClose_hotel'])) {
            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2200,showConfirmButton: false}); window.location.href="list-hotels.php";</script>';
        } else {
            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2000,showConfirmButton: false}); </script>';
            header("Refresh:2200");
        }

    } else {
        echo "Error " . $conn->error;
    }
}





//Function to add new Save Close review
if (isset($_POST['SaveClose_review']) || isset($_POST['SaveContinue_review'])) {
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
    $status = 0;
    if (isset($_POST['Review'])) {

            if ($_POST['Review'] != "") {
                $add_review = "INSERT INTO `hotel_review` (`Island`, `Hotel`, `Category`, `Review`, `NumberOfRooms`, `RoomService`, `TeaCoffee`, `InterCom`, `HotWater`, `Pool`, `TV`, `MiniFridge`, `Bar`, `SafeLocker`, `HairDryer`, `ProximityToBeach`, `CheckInTime`, `CheckOutTime`, `CreatedOn`) VALUES ( '$Island_rev', '$Hotel_rev', '$Category_rev', '$Review', '$NumberOfRooms', '$RoomService', '$TeaCoffee', '$InterCom', '$HotWater', '$Pool', '$TV', '$MiniFridge', '$Bar', '$SafeLocker', '$HairDryer', '$ProximityToBeach', '$CheckInTime', '$CheckOutTime',  NOW())";
                
                if ($conn->query($add_review)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
            }

        if ($status == 1) {
            if (isset($_POST['SaveContinue_review'])) {
                echo "Successful";
                echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2000,showConfirmButton: false}); </script>';
           header("Refresh:2200");

            } else {
                echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2200,showConfirmButton: false}); window.location.href="list-hotels-info.php";</script>';
            }

        } else {
            $status = 0;
            echo "Error " . $conn->error;
        }
    }
}





//Function to add new Save Close info
if (isset($_POST['SaveClose_info']) || isset($_POST['SaveContinue_info'])) {
    $add_hotel = "";
    if (isset($_POST['totalCount'])) {
        $status = 0;
        $len = intval($_POST['totalCount']);
        $HotelID = filter_var($_POST['HotelName'], FILTER_SANITIZE_STRING);
        for ($i = 0; $i < $len; $i++) {
            if ($_POST['RoomCategory'] != "") {

                $RoomCat = $i == 0 ? filter_var($_POST['RoomCategory'], FILTER_SANITIZE_STRING) : filter_var($_POST['RoomCategory' . $i], FILTER_SANITIZE_STRING);
                $PayWOGST = $i == 0 ? filter_var($_POST['PayWOGST'], FILTER_SANITIZE_STRING) : filter_var($_POST['PayWOGST' . $i], FILTER_SANITIZE_STRING);
                $BasePriceGST = $i == 0 ? filter_var($_POST['BasePriceGST'], FILTER_SANITIZE_STRING) : filter_var($_POST['BasePriceGST' . $i], FILTER_SANITIZE_STRING);
                $ExtraAWB = $i == 0 ? filter_var($_POST['ExtraAWB'], FILTER_SANITIZE_STRING) : filter_var($_POST['ExtraAWB' . $i], FILTER_SANITIZE_STRING);
                $ExtraCWB = $i == 0 ? filter_var($_POST['ExtraCWB'], FILTER_SANITIZE_STRING) : filter_var($_POST['ExtraCWB' . $i], FILTER_SANITIZE_STRING);
                $ExtraCNB = $i == 0 ? filter_var($_POST['ExtraCNB'], FILTER_SANITIZE_STRING) : filter_var($_POST['ExtraCNB' . $i], FILTER_SANITIZE_STRING);
                $MealPlan = $i == 0 ? filter_var($_POST['MealPlan'], FILTER_SANITIZE_STRING) : filter_var($_POST['MealPlan' . $i], FILTER_SANITIZE_STRING);
                $AddonPriceGST = $i == 0 ? filter_var($_POST['AddonPriceGST'], FILTER_SANITIZE_STRING) : filter_var($_POST['AddonPriceGST' . $i], FILTER_SANITIZE_STRING);

                $add_hotel = "INSERT INTO `hotel_info` ( `HotelID`, `RoomCat`, `PayWOGST`, `BasePriceGST`, `ExtraAWB`,`ExtraCWB`,`ExtraCNB` , `MealPlan`, `AddonPriceGST`, `CreatedOn`) VALUES ( '$HotelID', '$RoomCat', '$PayWOGST', '$BasePriceGST', '$ExtraAWB', '$ExtraCWB', '$ExtraCNB', '$MealPlan', '$AddonPriceGST', NOW());";
                if ($conn->query($add_hotel)) {
                    $status = 1;
                } else {
                    $status = 0;
                }
            }
        }
        if ($status == 1) {
            if (isset($_POST['SaveContinue_info'])) {
                echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2000,showConfirmButton: false}); </script>';
                header("Refresh:2200");
            } else {
                echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2200,showConfirmButton: false}); window.location.href="list-hotels-info.php";</script>';
            }
//            echo "<div class='alert alert-success'>Hotel Info Added Successfully!</div>";
//            echo "<script>window.location.href='list-hotels-info.php';</script>";
        } else {
            $status = 0;
            echo "Error " . $conn->error;
        }
    }
}

//Function to add new Island
if (isset($_POST['SaveClose_island']) || isset($_POST['SaveContinue_island'])) {

    if (isset($_POST['island_name'])) {
        $island_name = filter_var($_POST['island_name'], FILTER_SANITIZE_STRING);
        $que = "INSERT INTO islands (`IslandName` , `CreatedOn`) VALUES ('$island_name' , NOW() )";
        if ($conn->query($que)) {
            if (isset($_POST['SaveClose_island'])) {
                echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2200,showConfirmButton: false}); window.location.href="list-islands.php";</script>';
            } else {
                echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2000,showConfirmButton: false}); </script>';
                header("Refresh:2200");
            }


//            echo "<div class='alert alert-success'>Island Added Successfully!</div>";
//            echo "<script>window.location.href='list-islands.php';</script>";
        } else {
            echo "Errror" . $conn->error;
        }
    }
}
//Form 6 add ftt handler
if (!empty($_POST['status']) && $_POST['status'] == "addFileHandler") {
    echo "inside status";
    $SelectVoucher = filter_var($_SESSION['voucher_id'], FILTER_SANITIZE_STRING);
    $DataType = $_POST['DataType'];
    $FileHandlerName = $_POST['FileHandlerName'];

    if (!empty($FileHandlerName) && !empty($DataType)) {
        echo "inside if";
        $insertFileHandler = "INSERT INTO `file_handler` (`VoucherID`, `DataType`, `FIleHandlerName`, `CreatedOn`) VALUES ('$SelectVoucher', '$DataType', '$FileHandlerName', NOW())";
        echo "inside not FileHandler";
        if ($conn->query($insertFileHandler)) {
            echo "success";
        } else {
            echo $conn->error;
        }
    }
}
//Form 6 add ftt handler
if (!empty($_POST['status']) && $_POST['status'] == "addFileHandlerAgent") {
    echo "inside status";    
    $AgentName = $_POST['AgentName'];
    $FileHandlerName = $_POST['FileHandlerName'];
    if (!empty($FileHandlerName)) {        
        $insertFileHandler = "INSERT INTO `file_handler_agent` (`Agent`, `AgentName`, `CreatedOn`) VALUES ( '$AgentName', '$FileHandlerName', NOW())";        
        
        if ($conn->query($insertFileHandler)) {
            echo "success";
        } else {
            echo $conn->error;
        }
    }
}

//    Generate report
if (!empty($_POST['RoomSelected']) && isset($_POST['blockingRequest']) && !empty($_POST['blockingRequest']) && $_POST['blockingRequest'] == "true") {
    
    echo "inside   secondary if";
    $SelectVoucher = filter_var($_SESSION['voucher_id'], FILTER_SANITIZE_STRING);
    $Status_array = explode("###", $_POST['StatusF4']);
    $NumberOfNights_array = explode("###", $_POST['NumberOfNights']);
    $CheckIn_array = explode("###", $_POST['CheckIn']);
    $CheckOut_array = explode("###", $_POST['CheckOut']);
    $NumberOfRooms_array = explode("###", $_POST['NumberOfRooms']);
    $RoomSelected_array = explode("###", $_POST['RoomSelected']);
    $MealPlan_array = explode("###", $_POST['MealPlan']);
    $HotelSelected_array = explode("###", $_POST['HotelSelected']);
    $SelectedIsland_array = explode("###", $_POST['SelectedIsland']);
    $SelectIsland = "";
    $Amount = "";
    $AmountPayable = "";
    $CutOffDate = "";


    if (intval(mysqli_num_rows($r = $conn->query("SELECT * from hotel_blocking_request where VoucherID = $SelectVoucher"))) > 0) {
        echo "inside if for check for value > 0";
        while ($row = mysqli_fetch_array($r)) {
            $HotelBlockingID = $row['HotelBlockingID'];
            $deleteAccommodationInfo = "DELETE from hotel_blocking_request where HotelBlockingID = '$HotelBlockingID'";
            if ($conn->query($deleteAccommodationInfo)) {
                
            } else {
                echo "delete failed";
                echo $conn->error;
            }
        }
    }
    for ($j = 0; $j < count($CheckIn_array); $j++) {
        echo "inside Secondary Price FOr ";

        if (!empty($CheckIn_array[$j]) && !empty($CheckOut_array[$j])) {
            $insertAccommodationInfo = "INSERT INTO `hotel_blocking_request` (`VoucherID`, `SelectedIsland`, `HotelSelected`, `MealPlan`, `RoomSelected`, `CheckIn`, `CheckOut`, `NumberOfNights`, `NumberOfRooms`, `Amount`, `AmountPayable`, `CutOffDate`, `Status`, `CreatedOn`) VALUES ( '$SelectVoucher', '$SelectedIsland_array[$j]', '$HotelSelected_array[$j]', '$MealPlan_array[$j]', '$RoomSelected_array[$j]', '$CheckIn_array[$j]', '$CheckOut_array[$j]', '$NumberOfNights_array[$j]', '$NumberOfRooms_array[$j]', '$Amount', '$AmountPayable', '$CutOffDate', '$Status_array[$j]', NOW())";

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

//Function to add new Agent in steps case
if (isset($_POST['SaveClose_Agent']) || isset($_POST['SaveContinue_Agent'])) {
    
    $CompanyName = filter_var($_POST['CompanyName'], FILTER_SANITIZE_STRING);
    $Address = filter_var($_POST['addressTextarea'], FILTER_SANITIZE_STRING);
    $GSTNo = filter_var($_POST['GSTNo'], FILTER_SANITIZE_STRING);    
    
    $add_hotel = "INSERT INTO `agent` (`CompanyName`, `Address`, `GSTNo`, `CreatedOn`) VALUES ('$CompanyName', '$Address', '$GSTNo', NOW())";
    
    if ($conn->query($add_hotel)) {
        if (isset($_POST['SaveClose_hotel'])) {
            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2000,showConfirmButton: false}); </script>';
//            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2200,showConfirmButton: false}); window.location.href="list-hotels.php";</script>';
        } else {
            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the agent",timer: 2000,showConfirmButton: false}); </script>';
            echo "<script>window.location.href='list-agent.php';</script>";
        }
//        echo "<div class='alert alert-success'>Hotel Added Successfully!</div>";
//        echo "<script>window.location.href='list-hotels.php';</script>";
    } else {
        echo "Error " . $conn->error;
    }
}
if (isset($_POST['saveandupdateaccount']) ) {
    
    $voucheriid = $_POST['voucherid'];
    $otherexpensesid = $_POST['otherexpensesid'];
    $cashexpenseid = $_POST['cashexpenses'];
    $pettycashpb = $_POST['pettycashpb'];
    $pettycashhl = $_POST['pettycashhl'];
    $pettycashneil = $_POST['pettycashneil'];
    $pettycashsomething = $_POST['pettycashsomething'];
    $comments = $_POST['comments'];
    $vehicleid = $_POST['vehicleid'];
    $carspb = $_POST['carspb'];
    $carshl = $_POST['carshl'];
    $carsneil = $_POST['carsneil'];
    $alicoach = $_POST['aliaccoach'];
    $djsound = $_POST['djsound'];
    $photo = $_POST['photos'];
    $misc = $_POST['miscellaneous'];
    $accountpaymentid = $_POST['accountpaymentid'];
    $paymentComments = $_POST['paymentcomments'];
    $paymentstatus = $_POST['paymentstatus'];
    
    if (!empty($vehicleid)) {
                
        
        $insertPaymentStatus = "UPDATE vehicle_expenses SET VoucherID = '$voucheriid', CarPB = '$carspb' , CarHL = '$carshl', CarNeil = '$carsneil',AliACCouch = '$alicoach' WHERE vehicleExpensesID = '$vehicleid'";
                if ($conn->query($insertPaymentStatus)) {
                    
                        echo "updated success";
                    
                } else {
                    return $conn->error;
                }
            }
            elseif(empty($vehicleid)){
                $insertvehicle = "INSERT INTO `vehicle_expenses` (`VoucherID`, `CarPB`, `CarHL`, `CarNeil`, `AliACCouch`, `CreatedOn`) VALUES ( '$voucheriid', '$carspb', '$carshl', '$carsneil', '$alicoach', NOW())";
                if ($conn->query($insertvehicle)) {
                    
                        echo "insert vehicle success";
                    
                } else {
                    return $conn->error;
                }
            }
    
    if (!empty($cashexpenseid)) {
                
        
        $insertPaymentStatus = "UPDATE cash_expenses SET VoucherID = '$voucheriid', PettyCashPB = '$pettycashpb' , PettyCashHL = '$pettycashhl', PettyCashNeil = '$pettycashneil', AmountSomethingDifferent = '$pettycashsomething', Comment = '$comments' WHERE CashExpensesID = '$cashexpenseid'";
                if ($conn->query($insertPaymentStatus)) {
                    
                        echo "updated cash expense success";
                    
                } else {
                    return $conn->error;
                }
            }
            elseif(empty($cashexpenseid)){
                $insertvehicle = "INSERT INTO `cash_expenses` (`VoucherID`, `PettyCashPB`, `PettyCashHL`, `PettyCashNeil`,`AmountSomethingDifferent`, `Comment`, `Createdon`) VALUES ( '$voucheriid','$pettycashpb', '$pettycashhl', '$pettycashneil', '$pettycashsomething','$comments', NOW())";
                if ($conn->query($insertvehicle)) {
                    
                        echo "insert cah expenses success";
                    
                } else {
                    return $conn->error;
                }
            }
    if (!empty($otherexpensesid)) {
                
        
        $insertPaymentStatus = "UPDATE other_expenses SET VoucherID = '$voucheriid', DjSoundSystem = '$djsound' , Photos = '$photo', Miscellaneous = '$misc' WHERE OtherExpensesID = '$otherexpensesid'";
                if ($conn->query($insertPaymentStatus)) {
                    
                        echo "updated success";
                    
                } else {
                    return $conn->error;
                }
            }
            elseif(empty($otherexpensesid)){
                $insertvehicle = "INSERT INTO `other_expenses` (`VoucherID`, `DjSoundSystem`, `Photos`, `Miscellaneous`, `Createdon`) VALUES ( '$voucheriid', '$djsound', '$photo', '$misc', NOW())";
                if ($conn->query($insertvehicle)) {
                    
                        echo "insert vehicle success";
                    
                } else {
                    return $conn->error;
                }
            }
            if (!empty($accountpaymentid)) {
                
        
        $insertPaymentStatus = "UPDATE accounts_payment SET VoucherID = '$voucheriid', Comments = '$paymentComments' , PaymentStatus = '$paymentstatus' WHERE AccountpaymentID = '$otherexpensesid'";
                if ($conn->query($insertPaymentStatus)) {
                    
                        echo "updated success";
                    
                } else {
                    return $conn->error;
                }
            }
            elseif(empty($accountpaymentid)){
                $insertvehicle = "INSERT INTO `accounts_payment` (`VoucherID`, `Comments`, `PaymentStatus`, `Createdon`) VALUES ( '$voucheriid', '$paymentComments', '$paymentstatus', NOW())";
                if ($conn->query($insertvehicle)) {
                    
                        echo "insert vehicle success";
                    
                } else {
                    return $conn->error;
                }
            }
    
    
//    $add_hotel = "INSERT INTO hotels (`HotelName`,`IslandID`,`Address`,`ContactNumber`,`EmailAddress`,`PaymentTerms`, `CreatedOn`) VALUES ('$HotelName','$IslandID', '$Address','$ContactNumber','$EmailAddress' , '$PaymentTerms',NOW())";
//    if ($conn->query($add_hotel)) {
//        if (isset($_POST['SaveClose_hotel'])) {
//            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2200,showConfirmButton: false}); window.location.href="list-hotels.php";</script>';
//        } else {
//            echo '<script type="text/javascript">swal({title: "Success",text: "Successfully added the island",timer: 2000,showConfirmButton: false}); </script>';
//            header("Refresh:2200");
//        }
//
//    } else {
//        echo "Error " . $conn->error;
//    }
}
?>