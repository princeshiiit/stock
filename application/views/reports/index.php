<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Reports
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Reports</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- <button class = "btn btn-success btn-print" onclick="tableToExcel('manageTable1', 'reports')"><i class ="glyphicon glyphicon-arrow-down"></i>Export Shift Report</button> -->


    <h4>Current Orders
    </h4>
    <div class="box-body">
      <button class="btn btn-success btn-print"
        onclick="tableToExcel('manageTable1', '<?php echo date('Y/m/d'); ?>')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Current Report</button>

      <table width="100%" id="manageTable1" class="table table-bordered table-striped">


        <thead>
          <tr>

            <th>Item No.</th>
            <th>Transaction No.</th>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Cashier</th>
            <th>Date and Time (Day/Month/Year)</th>


          </tr>

        </thead>
        <tbody>


        </tbody>

        <tfoot>
          <tr>
            <th></th>
            <th>Total Amount:</th>
            <th></th>
            <th id="totalAmount">0</th>
            <th></th>
            <th></th>


          </tr>
        </tfoot>

      </table>


    </div>
    <h4>Yesterday Orders
    </h4>
    <div class="box-body">
      <button class="btn btn-success btn-print"
        onclick="tableToExcel('manageTable1', '<?php echo date('Y/m/d', strtotime('-1 day', strtotime(date('Y/m/d')))); ?>')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Yesterday Report</button>

      <table width="100%" id="manageTableYesterday" class="table table-bordered table-striped">


        <thead>
          <tr>

            <th>Item No.</th>
            <th>Transaction No.</th>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Rate</th>
            <th>Quantity</th>
            <th>Cashier</th>
            <th>Date and Time (Day/Month/Year)</th>


          </tr>

        </thead>
        <tbody>


        </tbody>

        <tfoot>
          <tr>
            <th></th>
            <th>Total Amount:</th>
            <th></th>
            <th id="totalAmountYesterday">0</th>
            <th></th>
            <th></th>


          </tr>
        </tfoot>

      </table>


    </div>
    <section class="content">
      <button class="btn btn-success btn-print" onclick="tableToExcel('manageTable', 'All_Orders_Item')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Table</button>
      <h4>
        All orders
      </h4>
      <div class="box-body">

        <table width="100%" id="manageTable" class="table table-bordered table-striped">


          <thead>
            <tr>

              <th>Item No.</th>
              <th>Transaction No.</th>
              <th>Product Name</th>
              <th>Amount</th>
              <th>Rate</th>
              <th>Quantity</th>
              <th>Cashier</th>
              <th>Date and Time (Day/Month/Year)</th>


            </tr>

          </thead>
          <tbody>


          </tbody>

          <tfoot>
            <tr>
              <th></th>
              <th>Total Amount:</th>
              <th></th>
              <th id="totalAmount1">0</th>
              <th></th>
              <th></th>


            </tr>
          </tfoot>

        </table>


      </div>
      <?php if ($user_permission): ?>
        <?php if (in_array('deleteOrder', $user_permission)): ?>
          <div class="box-body">
            <button class="btn btn-success btn-print"
              onclick="tableToExcel('manageTable3', 'Product Report - <?php echo date('Y/m/d'); ?>')"><i
                class="glyphicon glyphicon-arrow-down"></i>Export Product Reports</button>
            <table width="100%" id="manageTable3" class="table table-bordered table-striped">


              <thead>
                <tr>

                  <th>Product Name</th>
                  <th>Sold Count</th>
                  <th>Rate</th>
                  <th>Amount</th>



                </tr>


              </thead>
              <tbody>

                <?php
                $link = mysqli_connect("localhost", "root", "", "stock");
                // $selectedname=$this->input->post('custdetails');
                $sql = "SELECT * FROM products";

                $result = mysqli_query($link, $sql);
                if ($result != 0) {

                  $num_results = mysqli_num_rows($result);
                  for ($i = 0; $i < $num_results; $i++) {
                    $row = mysqli_fetch_array($result);
                    $name = $row['name'];
                    $rate = $row['price'];
                    $sql2 = "SELECT * FROM orders_item WHERE product_name = $name";
                    $currentDate2 = date('Y/m/d'); // Get the current date in the format: Year-Month-Day
                    $timestamp2 = strtotime($currentDate2);
                    $totalQuery = "SELECT product_name, SUM(qty) AS count FROM orders_item WHERE `product_name` = '$name' AND DATE(FROM_UNIXTIME(date_time)) = CURRENT_DATE";
                    // $result = $link->query($totalQuery);
                    // $row = $result->fetch_assoc()
                    $result2 = mysqli_query($link, $totalQuery);
                    $row2 = mysqli_fetch_array($result2);
                    $value = $row2['count'];
                    if ($value == '') {
                      $value = 0;
                    }

                    $amount = $value * $rate;
                    $totalAmount = $totalAmount + $amount;





                    // $qty = $row['qty'];
                    echo '<tr><td> ' . $name . ' </td><td>' . $value . '</td><td>₱' . $rate . '</td><td>₱' . $amount . '</td></tr>';
                    // $value = $value - $value;
                    // echo '.$row['total_amount'].';
            

                  }

                  echo '          </tbody><tfoot>
                  <tr>
                    <th></th>
                              <th>Total Amount:</th>
                              <th></th>
                              <th id="totalAmount1">₱ ' . $totalAmount . '</th>
                              <th></th>
                              <th></th>
                              
                   
                  </tr>
                </tfoot>';


                }


                ?>

                <!-- <th>Product Name</th>
<th>Sold Count for today</th> -->





                <!-- </tbody> -->

                <!-- <tfoot>
    <tr>
      <th></th>
                <th>Total Amount:</th>
                <th></th>
                <th id="totalAmount1"><?php $rate ?></th>
                <th></th>
                <th></th>
                
     
    </tr>
  </tfoot> -->

            </table>


          </div>

        <?php endif; ?>
      <?php endif; ?>
      <!-- Small boxes (Stat box) -->

      <!-- /.row -->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  var manageTable1;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function () {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    manageTable1 = $('#manageTable1').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUser',
      'order': [],
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        updateTotalAmount();
      }

    });


  });

  var manageTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function () {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUser2',
      'order': [],
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        updateTotalAmount();
      }

    });


  });

  var manageTableYesterday;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function () {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    manageTableYesterday = $('#manageTableYesterday').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUserYesterday',
      'order': [],
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        updateTotalAmount();
      }

    });


  });

  var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,';
    var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}<tfoot></tfoot></table></body></html>';
    var base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))); }
    var format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }); }

    return function (table, name) {
      if (!table.nodeType) table = document.getElementById(table);
      var ctx = { worksheet: name || "Reports", table: table.innerHTML }; // Use the provided name or default to "Reports"
      var filename = (name || "Reports") + ".xls"; // Default filename with .xls extension

      var link = document.createElement("a");
      link.download = filename;
      link.href = uri + base64(format(template, ctx));
      link.click();
    };
  })();


  function updateTotalAmount() {
    var total = 0;
    var data = manageTable1.rows().data();
    $.each(data, function (index, value) {
      total += parseFloat(value[3]);
    });
    $('#totalAmount').text(total.toFixed(2));

    var total = 0;
    var data = manageTable.rows().data();
    $.each(data, function (index, value) {
      total += parseFloat(value[3]);
    });
    $('#totalAmount1').text(total.toFixed(2));

    var totalYesterday = 0;
    var data = manageTableYesterday.rows().data();
    $.each(data, function (index, value) {
      totalYesterday += parseFloat(value[3]);
    });
    $('#totalAmountYesterday').text(totalYesterday.toFixed(2));
  }

  $(document).ready(function () {
    $("#reportNav").addClass('active');
  });

  var report_data = <?php echo '[' . implode(',', $results) . ']'; ?>;


  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    var areaChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label: 'Electronics',
          fillColor: 'rgba(210, 214, 222, 1)',
          strokeColor: 'rgba(210, 214, 222, 1)',
          pointColor: 'rgba(210, 214, 222, 1)',
          pointStrokeColor: '#c1c7d1',
          pointHighlightFill: '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data: report_data
        }
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChart = new Chart(barChartCanvas)
    var barChartData = areaChartData
    barChartData.datasets[0].fillColor = '#00a65a';
    barChartData.datasets[0].strokeColor = '#00a65a';
    barChartData.datasets[0].pointColor = '#00a65a';
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>