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
  <title>Monthly Income Summary</title>
  <link href="css/bootstrap.min.css" rel="stylesheet"> </head>

<body>
  <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
?>
    <div>
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h5 align="center" style="color:black;">Monthly Income : <?php echo $fdate?> to <?php echo $tdate?></h5>
            <hr />
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <tr>
                    <th>S.NO</th>
                    <th>Month-Year</th>
                    <th>Income Amount</th>
                  </tr>
                </tr>
              </thead>
              <?php
$userid=$_SESSION['detsuid'];
$ret=mysqli_query($con,"SELECT month(IncomeDate) as rptmonth,year(IncomeDate) as rptyear,sum(IncomeAmount) as totalmonth FROM tblincome  where (IncomeDate BETWEEN '$fdate' and '$tdate') && (UserId='$userid')");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <tr>
                  <td>
                    <?php echo $cnt;?>
                  </td>
                  <td>
                    <?php  echo $row['rptmonth']."-".$row['rptyear'];?>
                  </td>
                  <td>
                    <?php  echo $ttlsl=$row['totalmonth'];?>
                  </td>
                </tr>
                <?php
$cnt=$cnt+1;
}?>
            </table>
          </div>
        </div> <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a> </div>
    </div>
</body>

</html>
<?php } ?>