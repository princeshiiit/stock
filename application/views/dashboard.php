<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php

      echo "User: ", $this->session->userdata('username');
      ?>
      <br>
      <?php
      $timein = $this->session->userdata('Time_in');
      $unixTime = strtotime($timein);

      echo "Time in: ", $timein;

      ?>

    </h1>
    <h1>
      Dashboard
      <!--  <?php
      // session_start();
      $username = $_SESSION['username'];
      // echo $username;
      //echo $this->session->userdata('Time_in');
      ?> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->


    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>
              <?php echo $total_products ?>
            </h3>

            <p>Total Products</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo base_url('products/') ?>" class="small-box-footer">More info <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>
              <?php echo $total_paid_orders ?>
            </h3>

            <p>Total Paid Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?php echo base_url('orders/') ?>" class="small-box-footer">More info <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
              <?php echo $total_users; ?>
            </h3>

            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-people"></i>
          </div>
          <a href="<?php echo base_url('users/') ?>" class="small-box-footer">More info <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
              <?php echo $total_stores ?>
            </h3>

            <p>Total Stores</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-home"></i>
          </div>
          <a href="<?php echo base_url('stores/') ?>" class="small-box-footer">More info <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <h1>


    </h1>
    <!-- /.row -->


    <style>
      .btn-group1 button {
        background-color: red;
        /* Green background */
        border: 1px solid black;
        /* Green border */
        color: white;
        /* White text */
        padding: 10px 24px;
        /* Some padding */
        cursor: pointer;
        /* Pointer/hand icon */
        float: left;
        /* Float the buttons side by side */
      }

      .btn-group2 button {
        background-color: blue;
        /* Green background */
        border: 1px solid black;
        /* Green border */
        color: white;
        /* White text */
        padding: 10px 24px;
        /* Some padding */
        cursor: pointer;
        /* Pointer/hand icon */
        float: left;
        /* Float the buttons side by side */
      }

      /* Clear floats (clearfix hack) */
      .btn-group:after {
        content: "";
        clear: both;
        display: table;
      }

      .btn-group button:not(:last-child) {
        border-right: none;
        /* Prevent double borders */
      }

      /* Add a background color on hover */
      .btn-group button:hover {
        background-color: #3e8e41;
      }

      button {
        margin-right: 20px;
      }
    </style>


</div>
</th>
</tr>
</thead>

</section><!-- /.content -->


<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function () {
    $("#dashboardMainMenu").addClass('active');
  }); 
</script>