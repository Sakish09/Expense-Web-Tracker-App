<?php
session_start();
include ('dbconnection.php');
if (isset($_POST['submit']))
{
    $fname = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $ret = mysqli_query($con, "select Email from tbluser where Email='$email' ");
    $result = mysqli_fetch_array($ret);
    if ($result > 0)
    {
        echo 'This email  associated with another account';
    }
    else
    {
        $query = mysqli_query($con, "insert into tbluser(FullName, Email,  Password) value('$fname', '$email', '$password' )");
        if ($query)
        {
            echo 'You have successfully registered';
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker - Signup</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" defer src="js/Validation.js"></script>
</head>

<body>
	<div>
		<form name="RegForm" action="" onsubmit="return validateForm3()" method="post">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<h1>Registration</h1>
						<br>
						<input placeholder="Name" name="name" type="text">
						<input placeholder="E-mail" name="email" type="email">
						<input placeholder="Password" name="password" type="password">
						<br>
						<br>
						<button type="submit" value="submit" name="submit" class="btn btn-primary">Register</button><span></span>
						<br>
						<br> <a href="index.php">Click here to Login</a> </div>
				</div>
			</div>
		</form>
	</div>
</body>

</html>