<html>
<body>

<?php

$dbname = 'stock';
$dbuser = 'root';  
$dbpass = ''; 
$dbhost = 'localhost'; 

$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

echo "Connection Success!<br><br>";


$humidity = $_GET["humidity"]; 


$query = "UPDATE status SET status='0'";
$result = mysqli_query($connect,$query);

echo "Insertion Success!<br>";

?>
</body>
</html>