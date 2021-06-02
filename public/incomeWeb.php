<?php
include_once('../includes/connection/conn.php');
include_once('../includes/header/headers.php');
include_once('../includes/function/function.php');
if(isset($_GET['id'])){
     $id = $_GET['id'];
     $query1 = "DELETE FROM revenue where id='$id'";
     $result = mysqli_query($conn, $query1) or die("Not Deleted");
     if($result){
          //header('location:incomeWeb.php');
     }
}

?>
<!-- // form begun -->
<div class="dashboard-wrapper" id="add_data_Modal">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <!-- data table  -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="mb-0">Income Table</h5>
                                <p>All income catagory is here</p>
                            </div>
                            <div class="col-sm-6" align="right">
                                 <a href="#addData" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Payment</span></a>
                                 <a href="#deletePaymentModal" padding="8px"  class="btn btn-danger fas fa-minus-circle" data-toggle="modal"><i class="material-icons"></i> <span>Delete Selected Payment</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="employee_table" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>ID</th>
                                        <th>Income Type</th>
                                        <th>Amount</th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = "SELECT * FROM revenue ORDER BY id DESC";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                        $id = $row['id'];
                                        echo '<tr>';
                                        echo '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox3" name="options[]" value="1"><label for="checkbox3"></label></span></td>';
                                        echo '<td>' . $row['id'] . '</td>';
                                        echo '<td>' . $row['income_type'] . '</td>';
                                        echo '<td>' . $row['amount'] . '</td>';
                                        echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>' . $row['date'] . '</td>';
                                        echo '<td>
                                                <a href="#editData" data-toggle="modal" data-target="#editData" data-whatever="' . $id . '" title="Edit Payment"><i class="fa fa-edit fa-lg ml-2 mr-3"></i></a>
                                                <a href="incomeWeb.php?id=' . $id . '" class="btn btn-sm btn-outline-dark"><i class="fa fa-times"></i></a>

                                              </td>';
                                        echo '<tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Select</th>
                                        <th>ID</th>
                                        <th>Income Type</th>

                                     <?php
                                        $query1 = "SELECT SUM(amount) AS TotalAmount FROM revenue";
                                        $result1 = mysqli_query($conn, $query1);
                                        $row = mysqli_fetch_array($result1);

                                        $TotalAmount = $row['TotalAmount'];
                                        ?>

                                        <th><?php echo "Total: " . $TotalAmount;  ?></th>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end data table  -->
            <!-- ============================================================== -->
        </div>
        <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="memberModalLabel">Update Payment</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="dash">
                    </div>
                </div>
            </div>
        </div>
       <!--End of Delete Modal -->
        <!--add Payment Modal Begun-->
        <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="memberModalLabel">Add Payment</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    </div>
                        <form method="post" action="addPayment.php" enctype="multipart/form-data">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="income_type">Income Type</label>
                                <input type="text" name="income_type" id="income_type" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" name="amount" id="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>
                            <div class=" modal-footer">
                                <input type="submit" class="btn btn-primary" name='update' value="Send">                            </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    <!--Delete Payment modal -->
    <div class="modal fade" id="deletePaymentModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Delete Payment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        <span aria-hidden="true">&times;</span>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('../includes/footer/footer.php'); ?>
<script>
        $('#editData').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this);
            var dataString = 'id=' + recipient;
                console.log(dataString);
            $.ajax({
                type: "GET",
                url: "incomeEdit.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        })
</script>
