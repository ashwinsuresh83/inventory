<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link  rel="stylesheet"  href = "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
.header{
    margin: 20px;
}
.log{
    position:absolute;
    right:30px;
    top:10px;
   
    
}
.input-info{
    max-width:600px;
}
th,td{
    text-align:center;
}
td{
    position:relative;
}
.fa-times{
    color:#d86565;
    cursor:pointer;
    position:absolute;
    top:50%;
    right:20px;
    transform:translate(0,-50%);
    size:20px;
  
}
.fa-times:hover{
    color:red;
 
}
.highlight{
    box-shadow: 5px 6px 10px rgba(0,0,0,0.3);
}
</style>
<body class="grey lighten-5">
    <div class="container ">
        <div class="header">
            <div class="intro"><h5>
                <?php
                    require 'include/information.php';
                    echo 'Hello ' . $row_name['name'];
                ?>
                </h5>
            </div>
            <div class="log">
                <a class="log btn red lighten-3 " href="include/logout.php">Logout</a>
            </div>
            
        </div>
        <div class="input-info row">
            <input
                class="item col s6 input-field"
                type="text"
                placeholder="Enter name of item to be added"
            />
            <input type="text" placeholder="no."class="no-of-items col s1 offset-s2"/>
            <button class="add btn col s1 offset-s1 waves-effect waves-light">Add</button>
        </div>
        <div class="response container white">
            <?php
            $id = $_SESSION['user_id'];
            $tname = 'user_'.$id;
            $q="SELECT * from $tname";
            if($res=mysqli_query($conn,$q)){?>
                <table class="highlight center ">
                <thead >
                 <tr>
                    <th>Item Name</th>
                    <th>Item quantity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(mysqli_num_rows($res) == 0)
                    echo "<tr><td>No items added</td></tr>";
                else {
                        while($row=mysqli_fetch_assoc($res)){
                        echo "<tr><td>".$row['item_name']."</td><td> ".$row['quantity']."<i x=".$row['id']." class='fa fa-times' aria-hidden='true'></i></tr>";
                    }
                }
                
            }
            else mysqli_error($conn);
            ?>
        </div>
    </div>

    <script>
        item=document.querySelector(".item");
        no_items=document.querySelector(".no-of-items");
        add_btn=document.querySelector(".add");
        cross = document.querySelectorAll('.fa-times')

        add_btn.addEventListener("click",()=>{
            if (item.value == "" || no_items.value=="" || no_items.value<0 ||isNaN(no_items.value)){
                alert("Enter all fields correctly")
            }
            else if(item.value.length > 20)
                alert("Item name limit exceeded")
            else{
                if(window.XMLHttpRequest)
                    xmlhttp = new XMLHttpRequest();
                else
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');

                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        document.querySelector(".response").innerHTML = xmlhttp.responseText;
                        item.value = ""
                        no_items.value = ""
                        cross = document.querySelectorAll('.fa-times')
                        cross.forEach((element,index) => {
                            element.addEventListener('click' , () => {
                                row_id = element.getAttribute('x')
                                delete_row(row_id)          
                            })
                        })
                    }
                }
                param = 'item='+item.value+'&num='+no_items.value+'&id='+'<?php echo $id ?>'
                // items=cake&num=10
                xmlhttp.open('POST', 'include/add.php', true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.send(param);

            }

        });

        cross.forEach((element,index) => {
            element.addEventListener('click' , () => {
                row_id = element.getAttribute('x')
                delete_row(row_id)                
            })
        })

        function delete_row(row_id){
            if(confirm("Do you want to delete this item from inventory")){
                if(window.XMLHttpRequest)
                    xmlhttp = new XMLHttpRequest();
                else
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        location.reload()
                    }
                }
                param = 'id='+row_id+'&name='+'<?php echo $tname ?>'
                xmlhttp.open('POST', 'include/delete.php', true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.send(param);
            }
               
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>