

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
      <button class = "btn btn-success btn-print" onclick="tableToExcel('manageTable1', 'reports')"><i class ="glyphicon glyphicon-arrow-down"></i>Export Shift Report</button>

      
      <h4>
        Shift Reports - Note: This from Login Time to Current Time Report, If you have already logged out, it will reset
      </h4>
      <div class="box-body">
           
            <table id="manageTable1" class="table table-bordered table-striped">
             

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
          <section class="content">
      <button class = "btn btn-success btn-print" onclick="tableToExcel('manageTable', 'reports')"><i class ="glyphicon glyphicon-arrow-down"></i>Export Table</button>
 <h4>
        All reports by current user
      </h4>
          <div class="box-body">
           
            <table id="manageTable" class="table table-bordered table-striped">
             

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
      <!-- Small boxes (Stat box) -->
      <div class="row">

        <div class="col-md-12 col-xs-12">
          <form class="form-inline" action="<?php echo base_url('reports/') ?>" method="POST">
            <div class="form-group">
              <label for="date">Year</label>
              <select class="form-control" name="select_year" id="select_year">
                <?php foreach ($report_years as $key => $value): ?>
                  <option value="<?php echo $value ?>" <?php if($value == $selected_year) { echo "selected"; } ?>><?php echo $value; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>

        <br /> <br />


        <div class="col-md-12 col-xs-12">

         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total - Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    var manageTable1;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainOrdersNav").addClass('active');
  $("#manageOrdersNav").addClass('active');

  // initialize the datatable 
  manageTable1 = $('#manageTable1').DataTable({
    'ajax': base_url + 'orders/fetchOrdersDataCurrentUser',
    'order': [],
    'initComplete': function(settings, json) {
          // Calculate and update the total amount
          updateTotalAmount();
        }

  });


});

var manageTable;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainOrdersNav").addClass('active');
  $("#manageOrdersNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable').DataTable({
    'ajax': base_url + 'orders/fetchOrdersDataCurrentUser2',
    'order': [],
    'initComplete': function(settings, json) {
          // Calculate and update the total amount
          updateTotalAmount();
        }

  });


});

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}<tfoot></tfoot></table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: "Shift Report", table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()


function updateTotalAmount() {
      var total = 0;
      var data = manageTable1.rows().data();
      $.each(data, function(index, value) {
        total += parseFloat(value[3]);
      });
      $('#totalAmount').text(total.toFixed(2));

      var total = 0;
      var data = manageTable.rows().data();
      $.each(data, function(index, value) {
        total += parseFloat(value[3]);
      });
      $('#totalAmount1').text(total.toFixed(2));
    }

    $(document).ready(function() {
      $("#reportNav").addClass('active');
    }); 

    var report_data = <?php echo '[' . implode(',', $results) . ']'; ?>;
    

    $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
     var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : report_data
        }
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a';
    barChartData.datasets[0].strokeColor = '#00a65a';
    barChartData.datasets[0].pointColor  = '#00a65a';
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
  </script>
