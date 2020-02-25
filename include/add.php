<?php
$item = $_POST['item'];
$num = $_POST['num'];
$id = $_POST['id'];
$tname = 'user_'.$id;
require 'database_connect.php';

$query="INSERT into $tname (item_name,quantity) values('$item','$num');";

if(!mysqli_query($conn,$query)){
    mysqli_error($conn);
}
else{
    $q="SELECT * from $tname";
    if($res=mysqli_query($conn,$q)){?>
        <table class="highlight ">
        <thead >
         <tr>
            <th>Item Name</th>
            <th>Item quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row=mysqli_fetch_assoc($res)){
            echo "<tr><td>".$row['item_name']."</td><td> ".$row['quantity']."<i x=".$row['id']." class='fa fa-times' aria-hidden='true'></i></tr>";
        }

        
    }
    else mysqli_error($conn);
    

}?>