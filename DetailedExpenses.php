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
  <title>Detailed Expenses</title>
  <link href="css/bootstrap.min.css" rel="stylesheet"> </head>

<body>
  <div>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h5 align="center">Detailed Expenses</h5> <a href="dashboard.php" class="btn btn-primary">Back to dashboard</a>
          <hr />
          <form>
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
$userid = $_SESSION['detsuid'];
$ret = mysqli_query($con, "SELECT ExpenseDate as expdate, Expensecost as Expamount FROM tblexpense  where UserId='$userid'");
$cnt = 1;
while ($row = mysqli_fetch_array($ret))
{

?>
                <tr>
                  <td>
                    <?php echo $cnt;?>
                  </td>
                  <td>
                    <?php  echo $row['expdate']?>
                  </td>
                  <td>
                    <?php  echo $ttlsl=$row['Expamount'];?>
                  </td>
                </tr>
                <?php
$cnt=$cnt+1;
}?>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php } ?>