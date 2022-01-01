<?php
session_start();
include ('dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0))
{
    header('location:logout.php');
}
else
{

    if (isset($_POST['submit']))
    {
        $userid = $_SESSION['detsuid'];
        $IncomeDate = $_POST['IncomeDate'];
        $IncomeAmount = $_POST['IncomeAmount'];
        $query = mysqli_query($con, "insert into tblincome(UserId,IncomeDate,IncomeAmount) value('$userid','$IncomeDate','$IncomeAmount')");
        if ($query)
        {
            header('location:dashboard.php');
        }
        else
        {
            echo 'Something went wrong. Please try again';

        }

    }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Income</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" defer src="js/Validation.js"></script>
</head>

<body>
  <div>
    <form name="IncomeForm" action="" onsubmit="return validateForm2()" method="post">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h1>Add Income</h1>
            <br>
            <label>Date of Income</label>
            <input type="date" name="IncomeDate">
            <label>Amount</label>
            <input type="value" name="IncomeAmount">
            <br>
            <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button><span></span> <a href="dashboard.php" class="btn btn-primary">Cancel</a> </div>
        </div>
      </div>
    </form>
</body>

</html>
<?php } ?>