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
        $dateexpense = $_POST['dateexpense'];
        $costitem = $_POST['costitem'];
        $query = mysqli_query($con, "insert into tblexpense(UserId,ExpenseDate,ExpenseCost) value('$userid','$dateexpense','$costitem')");
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
  <title>Add Expense</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" defer src="js/Validation.js"></script>
</head>

<body>
  <div id="error"></div>
  <form name="ExpenseForm" action="" onsubmit="return validateForm()" method="post">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <h1>Add Expense</h1>
          <br>
          <label>Date of Expense</label>
          <input id="dateexpense" type="date" name="dateexpense">
          <label>Amount</label>
          <input id="costitem" type="value" name="costitem">
          <br>
          <button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button> <span></span> <a href="dashboard.php" class="btn btn-primary">Cancel</a> </div>
      </div>
    </div>
  </form>
</body>

</html>
<?php } ?>