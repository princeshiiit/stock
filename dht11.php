<?php
class dht11{
 public $link='';
 function __construct($humidity){
  $this->connect();
  $this->storeInDB($humidity);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'stock') or die('Cannot select the DB');
 }
 
 function storeInDB($humidity){
  $query = "UPDATE status SET status='000'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['humidity'] != ''){
 $dht11=new dht11($_GET['humidity']);
}
?>