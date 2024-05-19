<?php
    include("connect.php");

    if(isset($_POST['signup-button'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        $checkQuery = "SELECT * FROM users WHERE USemail = '$email'";
        $result = mysqli_query($conn, $checkQuery);

        if(mysqli_num_rows($result) > 0){
            header("Location: loginform.php?error=email_exists");
            exit();
        } else{
            $insertQuery = "INSERT INTO users (USname, USemail, USphone, USpassword) VALUES ('$name', '$email', '$phone', '$password')";
            if(mysqli_query($conn, $insertQuery)){
                header("Location: loginform.php");
                exit();
            } else{
                $error = mysqli_error($conn);
                echo "Error: " . $error;
            }
        }
    }
?>