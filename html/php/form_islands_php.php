<?php
    if(isset($_POST['SaveClose_island']) || isset($_POST['SaveContinue_island'])) {
        if(isset($_POST['island_name'])) {
            $island_name = filter_var($_POST['island_name'], FILTER_SANITIZE_STRING);
            $que = "INSERT INTO islands (`IslandName` , `CreatedOn`) VALUES ('$island_name' , NOW() )";
            if($conn-> query($que)) {
                echo "<div class='alert alert-success'>Island Added Successfully!</div>";
            }
            else {
                echo "Errror".$conn ->error;
            }
        }
    }
?>