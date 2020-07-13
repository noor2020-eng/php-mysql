<?php
//connect to // Db
$conn = mysqli_connect('localhost', 'root', '', 'noor_document');

 

//check connections
if(!$conn){
  echo 'connections error' . mysqli_connect_error();
}
?>