<?php
//Login function
    function login_user($username, $password){
        global $conn;

        $username = "";
        $password = "";
        session_start();
        if (isset($_POST['login'])) {
            //Post username/password in php 7 above
            $username = $_POST['username'];
            $password = $_POST['password'];
        //check the username is exist or no and run query.    
            $login = "SELECT * FROM `login` WHERE username='$username' and password='$password'";
            $login_user = mysqli_query($conn, $login) or die(mysqli_error());
            $rows = mysqli_num_rows($login_user);
            if ($rows == 1) {
                 $_SESSION['login_user'] = $username; // Initializing Session
                 if(!empty($_POST['remember'])){
                      setcookie("username", $_POST['username'], time()+ (10 * 365 * 24 * 60 * 60));
                      setcookie("password", $_POST['password'], time()+ (10 * 365 * 24 * 60 * 60));
                 }else{
                      if(isset($_COOKIE['username']))
                      {
                           setcookie('username', '');
                      }
                      if(isset($_COOKIE['password']))
                      {
                           setcookie('password', '');
                      }
                 }
                header("Location: index.php"); //redirect to landing
            } else {
                $message = "Username and/or Password is incorrect.\\nTry again";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            return $login_user;
        }
    }

//session start function.
    function session_page()
    {
         global $conn;

         session_start();
         if (isset($_SESSION['login_user'])) {

         } else {
              header('Location: ../public/login.php');
         }
    }

// total amount from revenue function
     function total_amount_revenue()
     {
        global $conn;
        $query1 = "SELECT SUM(amount) AS TotalAmount FROM revenue";
        $result1 = mysqli_query($conn, $query1);
        $row = mysqli_fetch_array($result1);

        $TotalAmount = $row['TotalAmount'];
        echo "RM" . $TotalAmount;
     }
//total amount from expenses function
     function total_amount_expenses()
     {
          global $conn;
          $query1 = "SELECT SUM(amount) AS TotalAmountExpenses FROM expenses";
          $result1 = mysqli_query($conn, $query1);
          $row = mysqli_fetch_array($result1);

          $TotalAmountExpenses = $row['TotalAmountExpenses'];
          echo "RM" . $TotalAmountExpenses;
     }
//total amount from credit function
     function total_amount_credit()
     {
          global $conn;
          $query1 = "SELECT SUM(amount) AS TotalAmountCredit FROM credit";
          $result1 = mysqli_query($conn, $query1);
          $row = mysqli_fetch_array($result1);
          $TotalAmountCredit = $row['TotalAmountCredit'];
          echo "RM" . $TotalAmountCredit;
     }
// function getUserById($id){
//     //return user array from their id
//     global $conn;
//     $query = "SELECT * FROM login WHERE $id=" . $id;
//     $result = mysqli_query($conn, $query);

//     $user = mysqli_fetch_assoc($result);
//     return $user;
// }

// //escape string
// function e($val){
//     global $conn;
//     return mysqli_real_escape_string($conn, trim($val));
// }

// //function to desplay error
// function display_error(){
//     global $error;

//     if (count($error) > 0 ){
//         # code...
//         echo '<div class="error">';
//             foreach($errors as $error){
//                 echo $error . '<br>';
//             }
//         echo '</div>';
//     }
// }

         ?>