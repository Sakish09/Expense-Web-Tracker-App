<?php
session_start();
include ('dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0))
{
    header('location:logout.php');
}
else
{

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker - Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <h1>Expense Tracker App</h1>
    <br> </head>

<body>
    <div> <a class="btn btn-primary" href="add_expense.php">Add Expense</a> <a class="btn btn-primary" href="add_income.php">Add Income</a> <a class="btn btn-primary" href="expense-monthwise-reports.php">View Montly Income and Expense Summary</a> <a class="btn btn-primary" href="DetailedExpenses.php">View detailed Expenses</a> <a class="btn btn-primary" href="logout.php">Logout</a> </div>
    <?php
    //Expense Summary
$userid=$_SESSION['detsuid'];
$query1=mysqli_query($con,"select sum(ExpenseCost) as totalexpense from tblexpense where UserId='$userid';");
$result1=mysqli_fetch_array($query1);
$sum_total1=$result1['totalexpense'];
 ?>
        <?php
  //Income Summary
$userid=$_SESSION['detsuid'];
$query2=mysqli_query($con,"select sum(IncomeAmount) as totalincome from tblincome where UserId='$userid';");
$result2=mysqli_fetch_array($query2);
$sum_total2=$result2['totalincome'];
 ?>
            <div id="barchart" style="width: 900px; height: 500px;"></div>
            <script type="text/javascript">
            google.load("visualization", "1", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Name', 'Amount'], <?php

                                 echo  "['Income',$sum_total2],";
                                 echo  "['Expense',$sum_total1],";

          ?>
                ]);
                var options = {
                    title: 'Summary'
                };
                var chart = new google.visualization.BarChart(document.getElementById('barchart'));
                chart.draw(data, options);
            }
            </script>
</body>

</html>
<?php } ?>