<?php
include_once('../includes/connection/conn.php');
if(isset($_POST['update'])){
     $idd = $_POST['idd'];
     $expenses_type = mysqli_real_escape_string($conn, $_POST['expenses_type']);
     $amount      = mysqli_real_escape_string($conn, $_POST['amount']);
     $date        = mysqli_real_escape_string($conn, $_POST['date']);
     $query = "UPDATE expenses SET expenses_type='$expenses_type', amount='$amount', date='$date' WHERE id='$idd'";
     $result = mysqli_query($conn, $query) or die($query);
     echo '<script>alert("Succesfully Updated");
                    window.location.href="expenses.php" </script>';
}
if(isset($_GET['id'])) {
     $id = $_GET['id'];
     $query1 = "SELECT * FROM expenses where id='$id' ";
     $result1 = mysqli_query($conn, $query1) or die("Not Valid");
     $row = mysqli_fetch_array($result1);

     $idd = $row['id'];

     $expenses_type = $row['expenses_type'];
     $amount = $row['amount'];
     $date = $row['date'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

</head>
<body>
<form action="expensesEdit.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label for="expenses_type" class="col-sm-4 col-form-label">Expenses Type</label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control" id="idd" name="idd" value="<?php echo $idd;?>" />
                <input type="text" class="form-control" id="expenses_type" name="expenses_type" value="<?php echo  $expenses_type;?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-4 col-form-label">Amount</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="amount" name="amount" value="<?php echo  $amount;?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-sm-4 col-form-label">Date</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="date" name="date" value="<?php echo  $date;?>">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name='update' value="Send">
    </div>
</form>
</body>
</html>