<?php
session_start();
include ('dbconnection.php');
if (strlen($_SESSION['detsuid'] == 0))
{
    header('location:logout.php');
}
else
{

}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monthly Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"> </head>

<body>
	<form role="form" method="post" action="expense-monthwise-reports-detailed.php" name="bwdatesreport">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1 align="center">Monthly Expense</h1>
					<br>
					<div class="form-group">
						<label>From Date</label>
						<input class="form-control" type="date" id="fromdate" name="fromdate" required="true"> </div>
					<div class="form-group">
						<label>To Date</label>
						<input class="form-control" type="date" id="todate" name="todate" required="true"> </div>
					<div class="form-group has-success">
						<button type="submit" class="btn btn-primary" name="submit">Submit</button> <a href="dashboard.php" class="btn btn-primary">Cancel</a> </div>
				</div>
			</div>
		</div>
	</form>
	<br>
	<form role="form" method="post" action="MonthlyIncomeSummary.php" name="incomesummaryreport">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1 align="center">Monthly Income</h1>
					<br>
					<div class="form-group">
						<label>From Date</label>
						<input class="form-control" type="date" id="fromdate" name="fromdate" required="true"> </div>
					<div class="form-group">
						<label>To Date</label>
						<input class="form-control" type="date" id="todate" name="todate" required="true"> </div>
					<div class="form-group has-success">
						<button type="submit" class="btn btn-primary" name="submit">Submit</button> <a href="dashboard.php" class="btn btn-primary">Cancel</a> </div>
				</div>
			</div>
		</div>
	</form>
</body>

</html>