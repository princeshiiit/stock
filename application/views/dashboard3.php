
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

if(isset($_POST['submit']))
{   
    $fullname = $_POST['Name1'];
    $age = $_POST['category1'];
  $age2 = $_POST['Amount1'];
    $insert = mysqli_query($conn,"INSERT INTO `expenses`(`Name`, `Category`, `Amount`) VALUES ('$fullname','$age','$age2')");

    if(!$insert)
    {
        echo mysqli_error();
    }
    else
    {
        //echo "Records added successfully.";
    }
}

mysqli_close($conn); // Close connection
?>

<label for="exampleFormControlSelect1">Description</label>

<form method="POST">
  <input type="text" name="Name1" class="form-control" id="exampleFormControlInput1" placeholder="Electricity/Water/Others" Required>
  <br/>
  <?php

$link = mysqli_connect("localhost","root","","stock");

$sql = "SELECT name FROM categories GROUP BY name;";

$result = mysqli_query($link,$sql);
if ($result != 0) {
    echo ' <div class="form-group">';
    echo ' <label for="exampleFormControlSelect1">Category</label>';
    echo '<select name="category1" class="form-control" id="exampleFormControlSelect1">';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }

    echo '</select>';
    echo '</div>';
}

mysqli_close($link);

?>
<label for="exampleFormControlSelect1">Amount</label>
  <input type="number" min="0" name="Amount1" class="form-control" id="exampleFormControlInput1" placeholder="Amount" Required><br/>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



