<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Voided Orders History</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Voided Orders History</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">



    <div class="box">
      <div class="box-header">
        <h3 class="box-title">History</h3>
      </div>


      <!-- /.box-header -->
      <section class="content">
        <button class="btn btn-success btn-print" onclick="tableToExcel('manageTable1', 'void')"><i
            class="glyphicon glyphicon-arrow-down"></i>Export Voided History</button>



        <div class="box-body">

          <table id="manageTable1" class="table table-bordered table-striped">


            <thead>
              <tr>

                <th>id</th>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Amount</th>
                <th>Rate</th>
                <th>Quantity</th>
                <th>Cashier</th>
                <th>Transaction Date and Time (Day/Month/Year)</th>
                <th>Voided date(Day/Month/Year)</th>


              </tr>

            </thead>
            <tbody>


            </tbody>

            <tfoot>
              <tr>
                <th></th>
                <th>Total Amount Voided:</th>
                <th></th>
                <th id="totalAmount">0</th>
                <th></th>
                <th></th>


              </tr>
            </tfoot>

          </table>

          <!-- MACHINE -->
          <?php
          // Replace these with your actual database credentials
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "stock";
          ?>
          <?php
          // Check if $_SESSION['username'] is equal to "prince"
          if ($_SESSION['username'] === 'prince') {
            ?>
            <table>
              <tr>
                <td>
                  <table>
                    <tr>

                      <?php
                      // Replace these with your actual database credentials
                      // $servername = "your_servername";
                      // $username = "your_username";
                      // $password = "your_password";
                      // $dbname = "your_dbname";
                    
                      // Create a connection
                      $conn = new mysqli($servername, $username, $password, $dbname);

                      // Check connection
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }

                      // Query to retrieve prod_name values with "DRY" from the machine table
                      $sql_dry = "SELECT prod_name FROM machine WHERE prod_name LIKE '%DRY%'";
                      $result_dry = $conn->query($sql_dry);

                      if ($result_dry->num_rows > 0) {
                        // Loop through each row and create a button for each prod_name with "DRY"
                        while ($row_dry = $result_dry->fetch_assoc()) {
                          $prod_name_dry = $row_dry["prod_name"];
                          echo "<td><button onclick='handleButtonClick(\"$prod_name_dry\")' class='btn btn-danger btn-md' type='button'>$prod_name_dry</button></td>";
                        }
                      } else {
                        echo "<td>No data available.</td>";
                      }

                      // Close the database connection
                      // $conn->close();
                      ?>
                    </tr>
                  </table><br>
                </td>
              </tr>
              <tr>
                <td>
                  <table>
                    <tr>

                      <?php
                      // Create a connection (you can reuse the same $servername, $username, $password, and $dbname variables)
                    
                      // Query to retrieve prod_name values with "WASH" from the machine table
                      $sql_wash = "SELECT prod_name FROM machine WHERE prod_name LIKE '%WASH%'";
                      $result_wash = $conn->query($sql_wash);

                      if ($result_wash->num_rows > 0) {
                        // Loop through each row and create a button for each prod_name with "WASH"
                        while ($row_wash = $result_wash->fetch_assoc()) {
                          $prod_name_wash = $row_wash["prod_name"];
                          echo "<td><button onclick='handleButtonClick(\"$prod_name_wash\")' class='btn btn-primary btn-sm' type='button'>$prod_name_wash</button></td>";
                        }
                      } else {
                        echo "<td>No data available.</td>";
                      }

                      // Close the database connection
                      $conn->close();
                      ?>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

          <?php } ?> <!-- CLOSE -->


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- col-md-12 -->
</div>
<!-- /.row -->


</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  function handleButtonClick(prodName) {
    
    // var message = document.getElementById('message').value;

    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();

    // Configure the AJAX request
    xhr.open('POST', 'sendToCOM9.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the callback function when the AJAX request completes
    xhr.onreadystatechange = function () {
      console.log("outer - 1");
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Parse the JSON response
          var response = JSON.parse(xhr.responseText);
          console.log("HERE - 1");
          // Update the result div with the response message
          alert("Button clicked: " + prodName + ":" + response.message);
          // document.getElementById('result').innerHTML = response.message;
        } else {
          console.log("HERE - 2");
          alert("Button clicked: " + prodName + ":" + xhr.statusText);
          // document.getElementById('result').innerHTML = 'Error: ' + xhr.statusText;
        }
      }
    };

    // Send the AJAX request with the message as the POST data
    xhr.send('message=' + encodeURIComponent("a"));
    
  }

</script>
<script type="text/javascript">
  var manageTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function () {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    manageTable = $('#manageTable1').DataTable({
      'ajax': base_url + 'orders/fetchVoidedHistory',
      'order': [],
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        updateTotalAmount();
      }

    });


  });

  function updateTotalAmount() {
    var total = 0;
    var data = manageTable.rows().data();
    $.each(data, function (index, value) {
      total += parseFloat(value[3]);
    });
    $('#totalAmount').text(total.toFixed(2));
  }

  var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,'
      , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
      , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
      , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
    return function (table, name) {
      if (!table.nodeType) table = document.getElementById(table)
      var ctx = { worksheet: name || 'CashSales', table: table.innerHTML }
      window.location.href = uri + base64(format(template, ctx))
    }
  })()
</script>