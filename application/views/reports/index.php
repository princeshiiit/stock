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


    <h4>Express Orders
    </h4>
    <div class="box-body">
      <button class="btn btn-success btn-print" onclick="tableToExcel('expressTable', '<?php echo date('Y/m/d'); ?>')"><i class="glyphicon glyphicon-arrow-down"></i>Export Current Report</button>
      <table width="100%" id="expressTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Transaction No.</th>
            <th>DateTime</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>


        </tbody>
        <tfoot>
          <tr>
            <th></th>
            <th>Total Express Amount:</th>
            <th id="expressTotalAmount">0</th>
          </tr>
        </tfoot>
      </table>



    </div>
    <h4>Current Orders
    </h4>
    <div class="box-body">
      <button class="btn btn-success btn-print" onclick="tableToExcel('manageTable1', '<?php echo date('Y/m/d'); ?>')"><i class="glyphicon glyphicon-arrow-down"></i>Export Current Report</button>

      <table width="100%" id="manageTable1" class="table table-bordered table-striped">


        <thead>
          <tr>

            <th>Transaction No.</th>
            <th>Item No.</th>
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
      <button class="btn btn-success btn-print" onclick="tableToExcel('manageTable1', '<?php echo date('Y/m/d', strtotime('-1 day', strtotime(date('Y/m/d')))); ?>')"><i class="glyphicon glyphicon-arrow-down"></i>Export Yesterday Report</button>

      <table width="100%" id="manageTableYesterday" class="table table-bordered table-striped">


        <thead>
          <tr>

            <th>Transaction No.</th>
            <th>Item No.</th>
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

    <h4>
      All orders
    </h4>


    <div class="box-body">
      <button class="btn btn-success btn-print" onclick="tableToExcel('manageTable', 'All_Orders_Item')"><i class="glyphicon glyphicon-arrow-down"></i>Export Table</button>

      <table width="100%" id="allOrdersTable" class="table table-bordered table-striped">


        <thead>
          <tr>
            <th>Transaction No.</th>
            <th>Item No.</th>
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
            <th>All orders Total Amount:</th>
            <th></th>
            <th id="AllOrders">0</th>
            <th></th>
            <th></th>


          </tr>
        </tfoot>

      </table>


    </div>
    <?php if ($user_permission) : ?>
      <?php if (in_array('deleteOrder', $user_permission)) : ?>
        <h4>Product Sold Count
        </h4>
        <div class="box-body">

          <div class="box-body">
            <button class="btn btn-success btn-print" onclick="tableToExcel('perItemTable', '<?php echo date('Y/m/d'); ?>')"><i class="glyphicon glyphicon-arrow-down"></i>Export Products Report</button>

            <table width="100%" id="perItemTable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>QTY</th>
                  <th>Total Amount</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>


              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Total Amount</th>
                  <th id="perItemTotalAmount">0</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>



          </div>


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
  $(document).ready(function() {
    // Initialize the datatable
    var expressTable = $('#expressTable').DataTable({
      'ajax': {
        'url': base_url + 'orders/fetchOrdersDataExpress',
        'dataSrc': 'data' // The key in the JSON data where the array of rows is located
      },
      'columns': [{
          'title': 'Transaction No.',
          'data': 0
        },
        {
          'title': 'DateTime',
          'data': 1
        },
        {
          'title': 'Amount',
          'data': 2
        }
      ],
      'order': [],
      'footerCallback': function(tfoot, data, start, end, display) {
        // Calculate and update the total amount
        var totalAmount = data
          .slice(start, end)
          .reduce(function(sum, row) {
            return sum + parseFloat(row[2]);
          }, 0);
        $(tfoot).find('#expressTotalAmount').text(totalAmount.toFixed(2));
      }
    });
  });

  var manageTable1;
  var base_url = "<?php echo base_url(); ?>";
  //current
  $(document).ready(function() {
    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // Initialize the datatable
    manageTable1 = $('#manageTable1').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUser',
      'order': [],
      "pageLength": 1000,
      'lengthChange': false,
      'initComplete': function(settings, json) {
        // Calculate and update the total amount
        console.log('initComplete');
        updateTotalAmount();
      }
    });

    manageTable1.on('draw.dt', function() {
      updateTotalAmount();
    });

    // Initially, update the total amount
    console.log('Document ready');
    updateTotalAmount();
  });

  var perItemTable;
  var base_url = "<?php echo base_url(); ?>";
  //current
  $(document).ready(function() {
    // Initialize the datatable
    var perItemTable = $('#perItemTable').DataTable({
      'ajax': {
        'url': base_url + 'orders/fetchOrdersDataPerItem',
        'dataSrc': 'data' // The key in the JSON data where the array of rows is located
      },
      'columns': [{
          'title': 'Product Name',
          'data': 0
        },
        {
          'title': 'Price',
          'data': 1
        },
        {
          'title': 'QTY',
          'data': 2
        },
        {
          'title': 'Total Amount',
          'data': 3
        },
        {
          'title': 'Date',
          'data': 4
        }
      ],
      'order': [],
      'footerCallback': function(tfoot, data, start, end, display) {
        // Calculate and update the total amount
        var totalAmount = data
          .slice(start, end)
          .reduce(function(sum, row) {
            return sum + parseFloat(row[3]);
          }, 0);
        $(tfoot).find('#perItemTotalAmount').text(totalAmount.toFixed(2));
      }
    });
  });

  //all orders
  var allOrdersTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    allOrdersTable = $('#allOrdersTable').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUser2',
      'order': [],
      "pageLength": 1000,
      // 'lengthChange': false,
      'initComplete': function(settings, json) {
        // Calculate and update the total amount
        console.log('initComplete');
        updateTotalAmount();
      }
    });

    allOrdersTable.on('draw.dt', function() {
      console.log('All Orders');
      updateTotalAmount();
    });

    // Initially, update the total amount
    console.log('Document ready');
    updateTotalAmount();


  });

  var manageTableYesterday;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function() {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    manageTableYesterday = $('#manageTableYesterday').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUserYesterday',
      'order': [],
      "pageLength": 1000,
      'lengthChange': false,
      'initComplete': function(settings, json) {
        // Calculate and update the total amount
        console.log('initComplete');
        updateTotalAmount();
      }
    });

    manageTableYesterday.on('draw.dt', function() {
      console.log('manageTableYesterday');
      updateTotalAmount();
    });

    // Initially, update the total amount
    console.log('Document ready');
    updateTotalAmount();


  });

  var tableToExcel = (function() {
    var uri = 'data:application/vnd.ms-excel;base64,';
    var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}<tfoot></tfoot></table></body></html>';
    var base64 = function(s) {
      return window.btoa(unescape(encodeURIComponent(s)));
    }
    var format = function(s, c) {
      return s.replace(/{(\w+)}/g, function(m, p) {
        return c[p];
      });
    }

    return function(table, name) {
      if (!table.nodeType) table = document.getElementById(table);
      var ctx = {
        worksheet: name || "Reports",
        table: table.innerHTML
      }; // Use the provided name or default to "Reports"
      var filename = (name || "Reports") + ".xls"; // Default filename with .xls extension

      var link = document.createElement("a");
      link.download = filename;
      link.href = uri + base64(format(template, ctx));
      link.click();
    };
  })();

  // function updateTotalAmount2() {
  //   var express = 0;
  // var data1 = expressTable.rows({ search: 'applied' }).data();
  // $.each(data1, function (index, value) {
  //   express += parseFloat(value[2]);
  // });
  // $('#expressTotalAmount').text(express.toFixed(2));
  // }

  function updateTotalAmount() {
    //   var express = 0;
    // var data = expressTable.rows({ search: 'applied' }).data();
    // $.each(data, function (index, value) {
    //   express += parseFloat(value[2]);
    // });
    // $('#expressTotalAmount').text(express.toFixed(2));

    var total = 0;
    var data1 = manageTable1.rows({
      search: 'applied'
    }).data();
    $.each(data1, function(index, value) {
      total += parseFloat(value[3]);
    });
    $('#totalAmount').text(total.toFixed(2));



    var totalYesterday = 0;
    var dataYesterday = manageTableYesterday.rows({
      search: 'applied'
    }).data();
    $.each(dataYesterday, function(index, value) {
      totalYesterday += parseFloat(value[3]);
    });
    $('#totalAmountYesterday').text(totalYesterday.toFixed(2));

    var AllOrders = 0;
    var dataAllOrders = allOrdersTable.rows({
      search: 'applied'
    }).data();
    $.each(dataAllOrders, function(index, value) {
      AllOrders += parseFloat(value[3]);
    });
    $('#AllOrders').text(AllOrders.toFixed(2));
  }

  $(document).ready(function() {
    $("#reportNav").addClass('active');
  });

  var report_data = <?php echo '[' . implode(',', $results) . ']'; ?>;


  $(function() {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    var areaChartData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [{
        label: 'Electronics',
        fillColor: 'rgba(210, 214, 222, 1)',
        strokeColor: 'rgba(210, 214, 222, 1)',
        pointColor: 'rgba(210, 214, 222, 1)',
        pointStrokeColor: '#c1c7d1',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: report_data
      }]
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