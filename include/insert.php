<?php
require 'database_connect.php';
if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn,$_POST["username"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["pwd"]);
    
    $query="INSERT INTO users (name,email,password) VALUES('$name','$email','$password');";
    if(mysqli_query($conn,$query)){
        $q="SELECT id from users where email='$email'";
        if($res=mysqli_query($conn,$q)){
            $row=mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['user_id']=$row['id'];
            $i = $row['id'];
            $tname = 'user_'.$i;
            $query2 = "CREATE TABLE $tname (  id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY , item_name VARCHAR(255) NOT NULL , quantity INT(11) NOT NULL)";
            if(!mysqli_query($conn,$query2)){
                echo mysqli_error($conn);
            }
            else
                header("Location:../dashboard.php");
        }
        else 
            mysqli_error($conn);
    }
    else 
        mysqli_error($conn);
    
}
?>
