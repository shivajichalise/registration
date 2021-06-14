<?php

$db_host  = "localhost";
$db_uname = "alphajr";
$db_pass  = "password";
$db_name  = "registration";

$conn = mysqli_connect($db_host, $db_uname, $db_pass, $db_name);

if( mysqli_connect_errno() ){
  exit('Connection Failed! :( ' . mysqli_connect_error());
}

?>
