<!-- Machine part -- >

	<?php

$server   = "localhost";  // Change this to correspond with your database port
$username   = "root";     // Change if use webhost online
$password   = "";
$DB     = "inventory";     // database name


$conn = new mysqli($server, $username, $password,$DB);    // Check database connection
  if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query1 ="SELECT * from machine WHERE prod_name='WASHER1' ";         // Select all data in table "status"
  $result1 = $conn->query($query1);
  
    while($row = $result1->fetch_assoc()) 
    {
      $w1=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }
//////////////////////////////////////////////
    if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query2 ="SELECT * from machine WHERE prod_name='DRYER1' ";         // Select all data in table "status"
  $result2 = $conn->query($query2);
  
    while($row = $result2->fetch_assoc()) 
    {
      $d1=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }
//////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query3 ="SELECT * from machine WHERE prod_name='WASHER2' ";         // Select all data in table "status"
  $result3 = $conn->query($query3);
  
    while($row = $result3->fetch_assoc()) 
    {
      $w2=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }
    //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query4 ="SELECT * from machine WHERE prod_name='DRYER2' ";         // Select all data in table "status"
  $result4 = $conn->query($query4);
  
    while($row = $result4->fetch_assoc()) 
    {
      $d2=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }
     //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query5 ="SELECT * from machine WHERE prod_name='WASHER3' ";         // Select all data in table "status"
  $result5 = $conn->query($query5);
  
    while($row = $result5->fetch_assoc()) 
    {
      $w3=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }
        //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query6 ="SELECT * from machine WHERE prod_name='DRYER3' ";         // Select all data in table "status"
  $result6 = $conn->query($query6);
  
    while($row = $result6->fetch_assoc()) 
    {
      $d3=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }
         //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query7 ="SELECT * from machine WHERE prod_name='WASHER4' ";         // Select all data in table "status"
  $result7 = $conn->query($query7);
  
    while($row = $result7->fetch_assoc()) 
    {
      $w4=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }

         //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query8 ="SELECT * from machine WHERE prod_name='DRYER4' ";         // Select all data in table "status"
  $result8 = $conn->query($query8);
  
    while($row = $result8->fetch_assoc()) 
    {
      $d4=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }

        //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query9 ="SELECT * from machine WHERE prod_name='WASHER5' ";         // Select all data in table "status"
  $result9 = $conn->query($query9);
  
    while($row = $result9->fetch_assoc()) 
    {
      $w5=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }

          //////////////////////////////////////////////
      if ($conn->connect_error) 
  {
    //die("Connection failed: " . $conn->connect_error);
  } 
  
  $query10 ="SELECT * from machine WHERE prod_name='DRYER5' ";         // Select all data in table "status"
  $result10 = $conn->query($query10);
  
    while($row = $result10->fetch_assoc()) 
    {
      $d5=$row["prod_qty"];
      //echo '<input type="text" id="country" name="country" value='$machine' readonly>';          // Echo echo $row["status"];
    }

?>