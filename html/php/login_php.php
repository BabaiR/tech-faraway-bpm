<?php

if (isset($_POST['login'])) {
    echo "login clicked";
    if (isset($_POST["username"]) && isset($_POST["username"])) {
        echo "login user name checked";
        $user = $_POST["username"];
        $pass = hash('sha512', $_POST['password']);

        $query = "select * from user where `UserName`='$user' and `Password` = '$pass' limit 1";
        $result = $conn->query($query);
        if ($conn->error) {
            echo "Error in getting hotel block" . $conn->error;
        }
        $rows = array();
        if ($result->num_rows > 0) {
            while($r = $result->fetch_assoc()) {
                $_SESSION['login_user'] = $r['UserID'];           
                
            }
            
            
            
//            echo '<script type="text/javascript">swal({title: "Success",text: "Success",timer: 2200,showConfirmButton: false}); /*window.location.href="list-hotels.php";*/</script>';
            echo "<script type='text/javascript'>alert('Login successful');location.href='index.php';</script>";
        } else {
//            echo '<script type="text/javascript">swal({title: "Success",text: "Error",timer: 2200,showConfirmButton: false}); /*window.location.href="list-hotels.php";*/</script>';
                echo "<script type='text/javascript'>alert('Username and Password do not match');</script>";
        }
        
    }
}
?>
    