<?php
if (isset($_POST['SaveClose_info']) || isset($_POST['SaveContinue_info'])) {
    if ($_POST['RoomCategory'] != "") {
        $HotelID = filter_var($_POST['HotelName'], FILTER_SANITIZE_STRING);
        $RoomCat = filter_var($_POST['RoomCategory'], FILTER_SANITIZE_STRING);
        $PayWOGST = filter_var($_POST['PayWOGST'], FILTER_SANITIZE_STRING);
        $BasePriceGST = filter_var($_POST['BasePriceGST'], FILTER_SANITIZE_STRING);
        $ExtraAWB = filter_var($_POST['ExtraAWB'], FILTER_SANITIZE_STRING);
        $ExtraCWB = filter_var($_POST['ExtraCWB'], FILTER_SANITIZE_STRING);
        $ExtraCNB = filter_var($_POST['ExtraCNB'], FILTER_SANITIZE_STRING);
        $MealPlan = filter_var($_POST['MealPlan'], FILTER_SANITIZE_STRING);
        $AddonPriceGST = filter_var($_POST['AddonPriceGST'], FILTER_SANITIZE_STRING);
        $add_hotel = "INSERT INTO `hotel_info` ( `HotelID`, `RoomCat`, `PayWOGST`, `BasePriceGST`, `ExtraAWB`,`ExtraCWB`,`ExtraCNB` , `MealPlan`, `AddonPriceGST`, `CreatedOn`) VALUES ( '$HotelID', '$RoomCat', '$PayWOGST', '$BasePriceGST', '$ExtraAWB', '$ExtraCWB', '$ExtraCNB', '$MealPlan', '$AddonPriceGST', NOW())";
        if ($conn->query($add_hotel)) {
            echo "<div class='alert alert-success'>Hotel Info Added Successfully!</div>";
        } else {
            echo "Error " . $conn->error;
        }
    }
}
?>