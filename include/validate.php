<?php
require 'database_connect.php';

if(isset($_POST['signin'])){
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["pwd"]);
    echo $email;
    echo $password;
    
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["pwd"]);
    $query="SELECT id,email,password from users where email='$email'";
    if($res=mysqli_query($conn,$query)){
        $c = mysqli_num_rows($res);
        if($c>0){
            $row=mysqli_fetch_assoc($res);
            if($password===$row['password']){
                session_start();
                $_SESSION['user_id'] = $row['id'];
                header("Location:../dashboard.php");
            }
            else 
                header("Location:../index.php?=wrongPassword");
        }
        else
            header("Location:../index.php?=usernotfound");
    }
    else 
        mysqli_error($conn);
}
?>