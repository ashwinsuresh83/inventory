<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
form{
    max-width:450px;
    margin:20px auto;
    padding:20px;
}
</style>
<body>
    <div class="container grey-text center">
        <h2 class="center">Enter details</h2>
        <form class="form " method="POST">
        <input class="uname" type="text" placeholder="Enter your name" name="username">
        <input class="email"type="email" placeholder="enter email" name="email">
        <input class="pwd"type="password" placeholder="Enter password" name="pwd">
        <input class="btn submit_btn waves-effect waves-light"type="submit" value="Sign up" name="submit">

        </form>
    </div>
    <script>
    let name=document.querySelector(".uname")
    let email=document.querySelector(".email")
    let password=document.querySelector(".pwd")
    let btn=document.querySelector(".submit_btn")
    btn.addEventListener("click",(event)=>{
        
        if(name.value==="" || email.value===""||password.value===""){
            alert("Enter all fields")
            event.preventDefault()
        }
        else{
            document.querySelector(".form").setAttribute("action","include/insert.php")
        }
    })
    </script>
</body>
</html>