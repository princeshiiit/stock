
<style>
    /* Custom styles for the dateRangePickerExpress input */
    #dateRangePickerExpress {
      width: 300px;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
    }

    /* Style the date range picker calendar icon */
    #dateRangePickerExpress::after {
      content: '\f073';
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      font-size: 16px;
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
    }

    /* Custom styles for the dateRangePickerExpress input */
    #dateRangePicker {
      width: 300px;
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
    }

    /* Style the date range picker calendar icon */
    #dateRangePicker::after {
      content: '\f073';
      font-family: "Font Awesome 5 Free";
      font-weight: 900;
      font-size: 16px;
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
    }
  </style>

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
      Date Range Picker: <input type="text" id="dateRangePickerExpress">&nbsp;<button class="btn btn-success btn-print"
        onclick="tableToExcel('expressTable', 'EXPRESS DATA:<?php date_default_timezone_set('Asia/Manila'); echo date('Y/m/d H:i:s'); ?>')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Express Report</button>
      <table width="100%" id="expressTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Transaction No.</th>
            <th>Date</th>
            <th>Express Amount</th>
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
    <h4>Current Orders for <?php

echo "Cashier: ", $this->session->userdata('username');
?>
    </h4>
    <div class="box-body">
      <button class="btn btn-success btn-print"
        onclick="tableToExcel('manageTable1', 'CURRENT ORDERS DATA:<?php date_default_timezone_set('Asia/Manila'); echo date('Y/m/d H:i:s'); ?>')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Current Report</button>

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
      <button class="btn btn-success btn-print"
        onclick="tableToExcel('manageTable1', 'YESTERDAY ORDERS DATA:<?php date_default_timezone_set('Asia/Manila'); echo date('Y/m/d', strtotime('-1 day', strtotime(date('Y/m/d H:i:s')))); ?>')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Yesterday Report</button>

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
      <button class="btn btn-success btn-print" onclick="tableToExcel('allOrdersTable', 'ALL ORDERS DATA:<?php date_default_timezone_set('Asia/Manila'); echo date('Y/m/d H:i:s'); ?>')"><i
          class="glyphicon glyphicon-arrow-down"></i>Export Table</button>

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
    <?php if ($user_permission): ?>
      <?php if (in_array('deleteOrder', $user_permission)): ?>
        <h4>Product Sold
        </h4>


        Date Range Picker: <input type="text" id="dateRangePicker" /> &nbsp;<button class="btn btn-success btn-print"
          onclick="tableToExcel('perItemTable', 'PRODUCT SOLD DATA:<?php date_default_timezone_set('Asia/Manila'); echo date('Y/m/d H:i:s'); ?>')"><i
            class="glyphicon glyphicon-arrow-down"></i>Export Products Report</button>

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
            <!-- Table rows will be dynamically filled using JavaScript -->
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

        <script>

        </script>


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
  //expressTable
  $(document).ready(function () {
    var expressTable;

    // Initialize the date range picker
    $('#dateRangePickerExpress').daterangepicker({
      opens: 'right'
    }, function (start, end) {
      // Load data for the selected date range
      expressTable.ajax.url(base_url + 'orders/fetchOrdersDataExpress').load(function (json) {
        var data = json.data.filter(function (item) {
          var date = new Date(item[1]);
          return date >= start && date <= end;
        });

        // Clear the existing table data and show message row if data is empty
        expressTable.clear().rows.add(data).draw();
        if (data.length === 0) {
          var noDataMessageRow = '<tr><td colspan="5" class="text-center">No data available for the selected date range.</td></tr>';
          expressTable.row.add($(noDataMessageRow)).draw();
        }
      });
    });

    // Initialize the datatable
    expressTable = $('#expressTable').DataTable({
      'ajax': {
        'url': base_url + 'orders/fetchOrdersDataExpress',
        'dataSrc': 'data' // The key in the JSON data where the array of rows is located
      },
      "pageLength": 1000,
      'lengthChange': false,
      'columns': [{
        'title': 'Transaction No.',
        'data': 0
      },
      {
        'title': 'Date',
        'data': 1
      },
      {
        'title': 'Express Amount',
        'data': 2
      },
      ],
      'order': [],
      'footerCallback': function (tfoot, data, start, end, display) {
        // Calculate and update the total amount
        var totalAmount = data
          .slice(start, end)
          .reduce(function (sum, row) {
            return sum + parseFloat(row[2]);
          }, 0);
        $(tfoot).find('#expressTotalAmount').text(totalAmount.toFixed(2));
      }
    });

    // Initial table update with the default date range
    var defaultStartDate = new Date('2023-08-01');
    var defaultEndDate = new Date('2023-08-05');
    $('#dateRangePickerExpress').data('daterangepickerexpress').setStartDate(defaultStartDate);
    $('#dateRangePickerExpress').data('daterangepickerexpress').setEndDate(defaultEndDate);
    $('#dateRangePickerExpress').trigger('apply.daterangepickerexpress'); // Trigger data loading
  });

  var manageTable1;
  var base_url = "<?php echo base_url(); ?>";
  //current
  $(document).ready(function () {
    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // Initialize the datatable
    manageTable1 = $('#manageTable1').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUser',
      'order': [],
      "pageLength": 1000,
      'lengthChange': false,
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        console.log('initComplete');
        updateTotalAmount();
      }
    });

    manageTable1.on('draw.dt', function () {
      updateTotalAmount();
    });

    // Initially, update the total amount
    console.log('Document ready');
    updateTotalAmount();
  });

  $(document).ready(function () {
    var perItemTable;

    // Initialize the date range picker
    $('#dateRangePicker').daterangepicker({
      opens: 'right'
    }, function (start, end) {
      // Load data for the selected date range
      perItemTable.ajax.url(base_url + 'orders/fetchOrdersDataPerItem').load(function (json) {
        var data = json.data.filter(function (item) {
          var date = new Date(item[4]);
          return date >= start && date <= end;
        });

        // Clear the existing table data and show message row if data is empty
        perItemTable.clear().rows.add(data).draw();
        if (data.length === 0) {
          var noDataMessageRow = '<tr><td colspan="5" class="text-center">No data available for the selected date range.</td></tr>';
          perItemTable.row.add($(noDataMessageRow)).draw();
        }
      });
    });

    // Initialize the datatable
    perItemTable = $('#perItemTable').DataTable({
      'ajax': {
        'url': base_url + 'orders/fetchOrdersDataPerItem',
        'dataSrc': 'data' // The key in the JSON data where the array of rows is located
      },
      "pageLength": 1000,
      'lengthChange': false,
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
      'footerCallback': function (tfoot, data, start, end, display) {
        // Calculate and update the total amount
        var totalAmount = data
          .slice(start, end)
          .reduce(function (sum, row) {
            return sum + parseFloat(row[3]);
          }, 0);
        $(tfoot).find('#perItemTotalAmount').text(totalAmount.toFixed(2));
      }
    });

    // Initial table update with the default date range
    var defaultStartDate = new Date('2023-08-01');
    var defaultEndDate = new Date('2023-08-05');
    $('#dateRangePicker').data('daterangepicker').setStartDate(defaultStartDate);
    $('#dateRangePicker').data('daterangepicker').setEndDate(defaultEndDate);
    $('#dateRangePicker').trigger('apply.daterangepicker'); // Trigger data loading
  });

  //all orders
  var allOrdersTable;
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function () {

    $("#mainOrdersNav").addClass('active');
    $("#manageOrdersNav").addClass('active');

    // initialize the datatable 
    allOrdersTable = $('#allOrdersTable').DataTable({
      'ajax': base_url + 'orders/fetchOrdersDataCurrentUser2',
      'order': [],
      "pageLength": 1000,
      'lengthChange': false,
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        console.log('initComplete');
        updateTotalAmount();
      }
    });

    allOrdersTable.on('draw.dt', function () {
      console.log('All Orders');
      updateTotalAmount();
    });

    // Initially, update the total amount
    console.log('Document ready');
    updateTotalAmount();


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
      "pageLength": 1000,
      'lengthChange': false,
      'initComplete': function (settings, json) {
        // Calculate and update the total amount
        console.log('initComplete');
        updateTotalAmount();
      }
    });

    manageTableYesterday.on('draw.dt', function () {
      console.log('manageTableYesterday');
      updateTotalAmount();
    });

    // Initially, update the total amount
    console.log('Document ready');
    updateTotalAmount();


  });

  var tableToExcel = (function () {
    var uri = 'data:application/octet-stream;base64,';
    var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}<tfoot></tfoot></table></body></html>';
    
    // AES encryption key - CHANGE THIS KEY TO A SECURE RANDOM VALUE
    var encryptionKey = "PRINCETIGLEYPOGI";
    
    var base64 = function (s) {
      return window.btoa(unescape(encodeURIComponent(s)));
    }
    
    // AES encryption function
    var encryptData = function (data, key) {
      var encrypted = CryptoJS.AES.encrypt(data, key);
      return encrypted.toString();
    };
    
    var format = function (s, c) {
      return s.replace(/{(\w+)}/g, function (m, p) {
        return c[p];
      });
    }

    return function (table, name) {
      if (!table.nodeType) table = document.getElementById(table);
      var ctx = {
        worksheet: name || "Reports",
        table: table.innerHTML
      };
      
      var encryptedTable = encryptData(format(template, ctx), encryptionKey);
      var filename = (name || "Reports") + ".xls"; // Default filename with .xls extension

      var link = document.createElement("a");
      link.download = filename;
      link.href = uri + base64(encryptedTable);
      link.click();
    };
  })();

  // var tableToExcel = (function () {
  //   var uri = 'data:application/vnd.ms-excel;base64,';
  //   var template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}<tfoot></tfoot></table></body></html>';
  //   var base64 = function (s) {
  //     return window.btoa(unescape(encodeURIComponent(s)));
  //   }
  //   var format = function (s, c) {
  //     return s.replace(/{(\w+)}/g, function (m, p) {
  //       return c[p];
  //     });
  //   }

  //   return function (table, name) {
  //     if (!table.nodeType) table = document.getElementById(table);
  //     var ctx = {
  //       worksheet: name || "Reports",
  //       table: table.innerHTML
  //     }; // Use the provided name or default to "Reports"
  //     var filename = (name || "Reports") + ".xls"; // Default filename with .xls extension

  //     var link = document.createElement("a");
  //     link.download = filename;
  //     link.href = uri + base64(format(template, ctx));
  //     link.click();
  //   };
  // })();

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
    $.each(data1, function (index, value) {
      total += parseFloat(value[3]);
    });
    $('#totalAmount').text(total.toFixed(2));



    var totalYesterday = 0;
    var dataYesterday = manageTableYesterday.rows({
      search: 'applied'
    }).data();
    $.each(dataYesterday, function (index, value) {
      totalYesterday += parseFloat(value[3]);
    });
    $('#totalAmountYesterday').text(totalYesterday.toFixed(2));

    var AllOrders = 0;
    var dataAllOrders = allOrdersTable.rows({
      search: 'applied'
    }).data();
    $.each(dataAllOrders, function (index, value) {
      AllOrders += parseFloat(value[3]);
    });
    $('#AllOrders').text(AllOrders.toFixed(2));
  }

</script>