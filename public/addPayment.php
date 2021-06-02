<?php
// Connect to Database
require_once('../includes/connection/conn.php');
    //update is the name="update" on add modal
    if (isset($_POST['update']))
    {
        // mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection
        $id = $_POST['id'];
        $income_type = mysqli_real_escape_string($conn, $_POST['income_type']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $query = "INSERT INTO revenue (income_type, amount, name, date) VALUES('$income_type', '$amount','$name', '$date')";
        if (mysqli_query($conn, $query)) {
            if(!empty($_POST))
            {
                $query_join = "INSERT INTO track_payment (payment_type, amount, date)
                              SELECT income_type, amount, date FROM income
                              EXCEPT
                              SELECT payment_type, amount, date from track_payment";
                $result = mysqli_query($conn, $query_join);
            }
            header('Location: incomeWeb.php');
        } else {
            echo "ERROR: Could not able to execute $query " . mysqli_error($mysqli);
        }
    }
?>
