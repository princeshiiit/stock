<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Manage
      <small>Expenses</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Expenses</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">



    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Expenses</h3>
      </div>
      <button class="btn btn-success btn-print" onclick="tableToExcel('manageTable', 'Expenses')"><i
          class="glyphicon glyphicon-arrow-down"></i>EXCEL</button>

      <script type="text/javascript">
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
      <!-- /.box-header -->
      <div class="box-body">
        <table id="manageTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Description</th>
              <th>Category</th>
              <th>Amount</th>
              <th>Date/Time</th>

            </tr>
          </thead>

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

  $(document).ready(function () {


    // initialize the datatable 
    manageTable = $('#manageTable').DataTable({
      'ajax': base_url + 'orders/fetchOrdersData2',
      'order': []
    });

  });

  // remove functions 
  function removeFunc(id) {
    if (id) {
      $("#removeForm").on('submit', function () {

        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: { order_id: id },
          dataType: 'json',
          success: function (response) {

            manageTable.ajax.reload(null, false);

            if (response.success === true) {
              $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                '</div>');

              // hide the modal
              $("#removeModal").modal('hide');

            } else {

              $("#messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                '</div>');
            }
          }
        });

        return false;
      });
    }
  }


</script>