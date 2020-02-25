<?php
require 'database_connect.php';
$id = $_POST['id'];
$tname = $_POST['name'];
$query = "DELETE FROM $tname where id=$id;";
mysqli_query($conn,$query);
?>