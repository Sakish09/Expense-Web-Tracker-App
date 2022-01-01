<?php
session_start();
include('dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    echo 'Invalid Details';
    }
  }
  ?>
  
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Daily Expense Tracker - Login</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script defer src="js/Validation.js"></script>
</head>

<body>
   <div>
      <form name="LoginForm" onsubmit="return validateForm4()" method="post">
         <div class="container">
            <div class="row">
               <div class="col-sm-3">
                  <h1>Login</h1>
                  <br>
                  <input placeholder="E-mail" name="email" type="email">
                  <input placeholder="Password" name="password" type="password">
                  <br>
                  <br>
                  <button type="submit" value="login" name="login" class="btn btn-primary">Login</button><span></span>
                  <br>
                  <br> <a href="register.php">Click here to Register</a> </div>
            </div>
         </div>
      </form>
   </div>
</body>

</html>