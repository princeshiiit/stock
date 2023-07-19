
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
      <button class = "btn btn-success btn-print" onclick="tableToExcel('manageTable1', 'void')"><i class ="glyphicon glyphicon-arrow-down"></i>Export Voided History</button>

      

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

<script type="text/javascript">
var manageTable;
var base_url = "<?php echo base_url(); ?>";

$(document).ready(function() {

  $("#mainOrdersNav").addClass('active');
  $("#manageOrdersNav").addClass('active');

  // initialize the datatable 
  manageTable = $('#manageTable1').DataTable({
    'ajax': base_url + 'orders/fetchVoidedHistory',
    'order': [],
    'initComplete': function(settings, json) {
          // Calculate and update the total amount
          updateTotalAmount();
        }

  });


});

function updateTotalAmount() {
      var total = 0;
      var data = manageTable.rows().data();
      $.each(data, function(index, value) {
        total += parseFloat(value[3]);
      });
      $('#totalAmount').text(total.toFixed(2));
    }

var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'CashSales', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

