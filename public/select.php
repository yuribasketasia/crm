  <?php
require_once('../includes/connection/conn.php');
    if (isset($_POST["income_id"])) {
        $output = '';
        $query = "SELECT * FROM revenue WHERE id = '" . $_POST["income_id"] . "'";
        $result = mysqli_query($conn, $query);
        $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '  
                <tr>  
                     <td width="30%"><label>Income</label></td>  
                     <td width="70%">' . $row["income"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Amount</label></td>  
                     <td width="70%">' . $row["amount"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>From</label></td>  
                     <td width="70%">' . $row["from"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Date</label></td>  
                     <td width="70%">' . $row["date"] . '</td>  
                </tr>  
                 
           ';
        }
        $output .= '  
           </table>  
      </div>  
      ';
        echo $output;
    }
    ?>
 