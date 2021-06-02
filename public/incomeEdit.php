<?php
    include_once('../includes/connection/conn.php');
    if(isset($_POST['update'])){
        $idd = $_POST['idd'];
        $income_type = mysqli_real_escape_string($conn, $_POST['income_type']);
        $amount      = mysqli_real_escape_string($conn, $_POST['amount']);
        $name        = mysqli_real_escape_string($conn, $_POST['name']);
        $date        = mysqli_real_escape_string($conn, $_POST['date']);
            $query = "UPDATE revenue SET income_type='$income_type', amount='$amount', name='$name', date='$date' WHERE id='$idd'";
            $result = mysqli_query($conn, $query) or die($query);
            echo '<script>alert("Succesfully Updated");
                    window.location.href="incomeWeb.php" </script>';
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query1 = "SELECT * FROM revenue where id='$id'";
        $result1 = mysqli_query($conn, $query1) or die("Not Valid");
        $row = mysqli_fetch_array($result1);

        $idd = $row['id'];

        $income_type = $row['income_type'];
        $amount = $row['amount'];
        $name = $row['name'];
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
<form action="incomeEdit.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <div class="form-group row">
            <label for="income_type" class="col-sm-4 col-form-label">Income Type</label>
            <div class="col-sm-8">
                <input type="hidden" class="form-control" id="idd" name="idd" value="<?php echo $idd;?>" />
                <input type="text" class="form-control" id="income_type" name="income_type" value="<?php echo  $income_type;?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="amount" class="col-sm-4 col-form-label">Amount</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="amount" name="amount" value="<?php echo  $amount;?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo  $name;?>">
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