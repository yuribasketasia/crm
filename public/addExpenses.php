<?php
// Connect to Database
require_once('../includes/connection/conn.php');
//update is the name="update" on add modal
     if (isset($_POST['update']))
     {
          // mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection
          $id = $_POST['id'];
          $expenses_type = mysqli_real_escape_string($conn, $_POST['expenses_type']);
          $amount = mysqli_real_escape_string($conn, $_POST['amount']);
          $date = mysqli_real_escape_string($conn, $_POST['date']);
          $query = "INSERT INTO expenses (expenses_type, amount, date) VALUES('$expenses_type', '$amount', '$date')";
          if (mysqli_query($conn, $query)) {
               if(!empty($_POST))
               {
                    $query = "INSERT INTO track_payment (payment_type, amount, date)
                              SELECT expenses_type, amount, date FROM expenses
                              EXCEPT
                              SELECT payment_type, amount, date from track_payment";
               $result = mysqli_query($conn, $query);
               }
               header('Location: expenses.php');
          } else {
               echo "ERROR: Could not able to execute $query " . mysqli_error($mysqli);
          }
     }
?>