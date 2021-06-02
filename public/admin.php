<?php
include_once('header/headers.php');
require_once('../includes/function/function.php');
session_page();
if(isset($_POST['submit'])){
      $id = $_POST['id'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $result = $conn->query('SELECT * FROM login');
      $mem = mysqli_fetch_assoc($result);
     }
?>
<!doctype html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <title>Admin Panel</title>
</head>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
                
                    <div class="email-head">
                        <div class="email-head-title">User <?php echo $username ?> Settings<span class="icon mdi mdi-edit"></span></div>
                    </div>
                    <div class="email-compose-fields">
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="user-profile.php" method="post" id="submit" data-parsley-validate="">
                                        <div class="form-group">
                                            <label for="inputUserName">New Username</label>
                                            <input type="text" name="name" data-parsley-trigger="change" required="" value="<?php echo $username ?>" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" name="email" data-parsley-trigger="change" required="" value="<?php echo $email ?>" autocomplete="off" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">New Password</label>
                                            <input  type="password" placeholder="Password" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputRepeatPassword">Confirm Password</label>
                                            <input  data-parsley-equalto="#inputPassword" placeholder="Password" type="password" required="" class="form-control">
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-00">
                                                <p class="text-left">
                                                    <input type="submit" name="submit" class="btn btn-space btn-primary"></button>
                                                    <button class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                      
                  
                    </div>
                    
                </div>
            </div>
             
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script>
    $(document).ready(function() {

        // binding the check all box to onClick event
        $(".chk_all").click(function() {

            var checkAll = $(".chk_all").prop('checked');
            if (checkAll) {
                $(".checkboxes").prop("checked", true);
            } else {
                $(".checkboxes").prop("checked", false);
            }

        });

        // if all checkboxes are selected, then checked the main checkbox class and vise versa
        $(".checkboxes").click(function() {

            if ($(".checkboxes").length == $(".subscheked:checked").length) {
                $(".chk_all").attr("checked", "checked");
            } else {
                $(".chk_all").removeAttr("checked");
            }

        });

    });
    </script>
</body>
 
</html>