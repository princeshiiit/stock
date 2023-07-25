<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <center>
      <h1>
        Void Orders
        <!-- <small>Orders</small> -->
      </h1>

      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Void Orders</li>
      </ol>
  </section>

  <!-- Main content -->

  <!DOCTYPE html>
  <html>

  <head>

  </head>

  <body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "stock";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Using database connection file here
    
    if (isset($_POST['submit'])) {
      $id = $_POST['orderid'];
      if ($id != null || $id != "") {
        $prod = mysqli_query($conn, "SELECT * FROM orders_item WHERE order_id=$id");

        $num_results = mysqli_num_rows($prod);
        for ($i = 0; $i < $num_results; $i++) {
          $row = mysqli_fetch_array($prod);
          // $id_prod = $row['product_id'];
          // $qty_back = $row['qty'];
    
          $idvoid = $row['id'];
          $orderId = $row['order_id'];
          $id_prod = $row['product_id'];
          $qty_back = $row['qty'];
          $rate = $row['rate'];
          $amount = $row['amount'];
          $slot = $row['slot'];
          $staff = $row['staff'];
          $dateTime = $row['date_time'];
          $prodName = $row['product_name'];
          // $voided_date = strtotime(date('Y-m-d H:i:s'));
    
          $test = mysqli_query($conn, "INSERT INTO `voided_orders_item`(`id`, `order_id`, `product_id`, `qty`, `rate`, `amount`, `slot`, `staff`, `date_time`, `product_name`) VALUES ('$idvoid','$orderId','$id_prod','$qty_back','$rate','$amount','$slot','$staff','$dateTime','$prodName')");
          // $row = mysqli_fetch_array($test);
    

          // back the used qty
          $res = mysqli_query($conn, "SELECT * FROM products WHERE `id`='$id_prod'");
          $resprod = mysqli_fetch_array($res);

          $curQty = $resprod['qty'];
          $curQtyUsed = $resprod['qty_used'];



          $newQty = $curQty + $qty_back;
          $newQtyUsed = $curQtyUsed - $qty_back;


          $response = mysqli_query($conn, "SELECT * FROM machine WHERE `prod_id`='$id_prod'");
          $resmachine = mysqli_fetch_array($response);
          $curMachQty = $resmachine['prod_qty'];

          $newMachQty = $curMachQty - $qty_back;


          mysqli_query($conn, "UPDATE products SET `qty`='$newQty', `qty_used`='$newQtyUsed' WHERE `id`='$id_prod'");
          mysqli_query($conn, "UPDATE machine SET `prod_qty`='$newMachQty' WHERE `prod_id`='$id_prod'");


          //UPDATE machine SET `prod_qty`=prod_qty+$newval WHERE prod_id='$test'
    
        }

        $insert = mysqli_query($conn, "DELETE FROM orders_item WHERE `order_id` = '$id'");
        $insert = mysqli_query($conn, "DELETE FROM orders WHERE `id` = '$id'");

        if (!$insert) {
          echo mysqli_error();
        } else {
          // echo "Records added successfully.";
        }
      }


    }

    mysqli_close($conn); // Close connection
    ?>



    <form method="POST">

      <br />
      <?php

      $link = mysqli_connect("localhost", "root", "", "stock");

      $sql = "SELECT order_id FROM orders_item GROUP BY order_id;";

      $result = mysqli_query($link, $sql);
      if ($result != 0) {
        echo ' <div class="form-group">';
        echo ' <label for="exampleFormControlSelect1">Order ID</label>';
        echo '<select name="orderid" class="form-control" id="exampleFormControlSelect1">';
        echo '<option value="">--SELECT AN ORDER ID--</option>';
        $num_results = mysqli_num_rows($result);
        for ($i = 0; $i < $num_results; $i++) {
          $row = mysqli_fetch_array($result);
          $name = $row['order_id'];

          echo '<option value="' . $name . '">' . $name . '</option>';
        }

        echo '</select>';
        echo '</div>';
      }

      mysqli_close($link);

      ?>

      <form method="POST">
        <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><strong>Void Order</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <!-- <i class="fas fa-user prefix grey-text"></i> -->
                  <label id="selectedOption" data-error="wrong" data-success="right" for="orangeForm-name"></label>

                </div>


              </div>
              <div class="modal-footer d-flex justify-content-center">
                <input type="submit" class="btn btn-warning" name="submit" value="Void">

              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- <input type="submit" name="submit" value="Submit"> -->

      <button id="myButton1" data-toggle="modal" data-target="#modalRegisterForm" class="btn btn-danger"><i
          class="glyphicon glyphicon-warning-sign"></i> Void Transaction </button>

    </form>
    </center>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
      // Get the selected value from the dropdown and display it in the modal
      $('#modalRegisterForm').on('show.bs.modal', function (event) {
        var dropdown = document.getElementById('exampleFormControlSelect1');
        var selectedOption = dropdown.options[dropdown.selectedIndex].text;
        var modal = $(this);
        modal.find('#selectedOption').text("Are you sure do you want to void order no. : " + selectedOption);
      });
    </script>



  </body>

  </html>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->