<?php
     include_once('../includes/connection/conn.php');
     include_once('../includes/header/headers.php');
     include_once('../includes/function/function.php');
     if(isset($_GET['id'])){
          $id = $_GET['id'];
          $query1 = "DELETE FROM credit where id='$id'";
          $result = mysqli_query($conn, $query1) or die("Not Deleted");
          if($result){
               //header('location:incomeWeb.php');
          }
          }
?>
<div class="dashboard-wrapper" id="add_data_Modal">
     <div class="container-fluid  dashboard-content">
          <div class="row">
<?php include_once('../includes/footer/footer.php'); ?>

