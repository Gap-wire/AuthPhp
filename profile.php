<?php

if(!empty($_POST['email']) && !empty($_POST['apikey'])){
    $email = $_POST['email'];
    $apikey = $_POST['apikey'];
    $result = array();

    $con= mysqli_connect("localhost", "root", "", "login_register" );

    if ($con) {
        $sql="SELECT * from users where email ='".$email."' and apikey = '".$apikey."'" ;
        $res = mysqli_query($con,$sql);
        
        if (mysqli_num_rows($res) != 0){
            $row = mysqli_fetch_assoc($res);
            $result = array("status"=> "success","message"=> "Database fetched successfully",
                        "name" => $row['name'], "email"=> $row['email'], "apikey" => $row['apikey'] );

            
        }else $result = array("status" => "failed", "message" => "Unauthorised access");
    } else $result = array("status" => "failed", "message" => "Database connection failed");
 } else $result = array("status" => "failed", "message" => "All fields are required");

 echo json_encode($result, JSON_PRETTY_PRINT);
