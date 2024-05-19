<?php

if(!empty($_POST['email']) && !empty($_POST['apikey'])){
    $email = $_POST['email'];
    $apikey = $_POST['apikey'];
  
    $con= mysqli_connect("localhost", "root", "", "login_register" );

    if ($con) {
        $sql="SELECT * from users where email ='".$email."' and apikey='".$apikey."' ";
        $res = mysqli_query($con,$sql);
        if (mysqli_num_rows($res) != 0){
            $row = mysqli_fetch_assoc($res);
            $sqlUpdate = "UPDATE users set apikey ='".$apikey."' where  email ='".$email."'";
            if(mysqli_query($con, $sqlUpdate)){
                echo "success";
            } else echo "Logout failed";
        }else echo "Unauthorised to access";
    } else echo "Database connection failed";
 } else echo "All fields are required";
