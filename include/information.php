<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "YOU ARE NOT LOGGED IN";
    die();
}
require "database_connect.php";
$id=$_SESSION["user_id"];
$query_name="SELECT name,email from users where id='$id'";
if($result=mysqli_query($conn,$query_name)){
    $row_name=mysqli_fetch_assoc($result);
}
?>