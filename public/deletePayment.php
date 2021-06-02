<?php
// Connect to Database
require_once('../includes/connection/conn.php');
//update is the name="delete" on delete modal
if (isset($_POST['delete']))
{
     // mysqli_real_escape_string() function escapes special characters in a string for use in an SQL query, taking into account the current character set of the connection
     $query = "DELETE FROM `revenue` where id='$id')";
     if (mysqli_query($conn, $query)) {
          header('Location: incomeWeb.php');
     } else {
          echo "ERROR: Could not able to execute $query " . mysqli_error($mysqli);
     }
}
?>
