
<?php

if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) ){
    $con = mysqli_connect("localhost", "root", "", "login_register" );
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($con){
        $sql =" INSERT INTO users ( name , email, password ) values ('".$name."','".$email."','".$password."') ";
        if(mysqli_query($con, $sql)){
            echo "success";
        } else echo "Registration failed";
    }else echo "Database connection failed";
}else echo "All fields are required";
