<?php
    if(isset($_POST['SaveClose']) || isset($_POST['SaveContinue'])) {
        $IslandID = filter_var($_POST['IslandName'], FILTER_SANITIZE_STRING);
        $HotelName = filter_var($_POST['HotelName'], FILTER_SANITIZE_STRING);
        $Address = filter_var($_POST['Address'], FILTER_SANITIZE_STRING);
        $ContactNumber = filter_var($_POST['ContactNumber'], FILTER_SANITIZE_STRING);
        $EmailAddress = filter_var($_POST['EmailAddress'], FILTER_SANITIZE_STRING);        
        $add_hotel = "INSERT INTO hotels (`HotelName`,`IslandID`,`Address`,`ContactNumber`,`EmailAddress`,`CreatedOn`) VALUES ('$HotelName','$IslandID', '$Address','$ContactNumber','$EmailAddress' , NOW())";
        if($conn->query($add_hotel)) {
            echo "<div class='alert alert-success'>Hotel Added Successfully!</div>";
        }
        else {
            echo "Error ".$conn->error;
        }
    }
?>