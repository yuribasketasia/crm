<?php 
include_once('../includes/connection/conn.php');
session_start();
$username_session = $_SESSION['login_user'];
$sesstion_sql = mysqli_query($conn, "SELECT username FROM login WHERE username='$username'");
$row = mysqli_fetch_array($sesstion_sql);
$login_session = $row['username'];
    // if (isset($login_session)) {
    //     # code
    //     mysqli_close($conn);
    //     header('Location: ../index.php');
        
    // }
    if(!isset($_SESSION['username'])){ 
        header("Location: login.php");
    }
?>