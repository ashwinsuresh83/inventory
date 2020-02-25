<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .form{
        max-width:450px;
        margin:20px auto;
        padding:20px;
    }
    </style>
</head>
<body>
    <div class="container grey-text ">
        <h1 class="center white">Sign In</h1>

        <form method="POST" class="form">
            <input class="email" type="text" placeholder="Enter your email" name="email">
            <input class="pwd" type="password" placeholder="Enter password" name="pwd">
            <div class="center">
                <input class="sub btn" type="submit" value="sign in" name="signin">
            </div>
        </form>
        <div class="center">
            Not a member yet?
            <a class="btn-small green lighten-3"href="signup.php"> sign up!</a>
        </div>
    </div>
   
  
    <script>
    const email=document.querySelector(".email")
    const pwd=document.querySelector(".pwd")
    const sub=document.querySelector(".sub")
    sub.addEventListener("click",(event)=>{
        if(email.value===""||pwd.value===""){
            alert("Enter all fields")
            event.preventDefault()
        }
        else{
            document.querySelector(".form").setAttribute("action","include/validate.php")
        }
        })
    </script>
</body>
</html>