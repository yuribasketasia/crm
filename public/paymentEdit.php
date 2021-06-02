<?php
require_once('connection/conn.php');
    $id = $_GET['id'];
    if (isset($_POST['submit'])) {
        $id2 = $_POST['id'];
        $income_type = $_POST['income_type'];
        $amount =  $_POST['amount'];
        $from   =   $_POST['from'];
        $date   =   $_POST['date'];
        $mysqli->query("UPDATE revenue SET income_type ='$income_type', amount='$amount', from='$from', date='$date',");
        header('Location: incomeWeb.php');
    }
    $income1 = $mysqli->query("SELECT * from revenue");
    $income = mysqli_fetch_assoc($income1);
    ?>
    