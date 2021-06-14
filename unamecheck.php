<?php

$uname = $_GET["q"];
require_once './conn.php';

$sqlquery = "SELECT id FROM users WHERE username = ?";
$sql = $conn->prepare($sqlquery);
$sql->bind_param("s", $uname);
$sql->execute();
$sql->store_result();

if($sql->num_rows > 0){
  echo 1;
}else{
  echo 0;
}

$sql->fetch();
$sql->close();

?>
