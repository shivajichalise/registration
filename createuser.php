<?php
require_once './conn.php';

function unamecheck($uname){
  /* if(!preg_match('/^\w{6,15}$/', $uname)) { // \w equals "[0-9A-Za-z_]"
    return 1;
}
   */
  include('./conn.php');
  $sqlquery = "SELECT id FROM users WHERE username = ?";
  $sql = $conn->prepare($sqlquery);
  $sql->bind_param("s", $uname);
  $sql->execute();
  $sql->store_result();

  if($sql->num_rows > 0){
    return 1;
  }else{
    return 0;
  }

  $sql->fetch();
  $sql->close();  
}

session_start();
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['lastname'] = $_POST['lastname'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['repassword'] = $_POST['repassword'];

// if(!isset($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['repassword'])){
if(count(array_filter($_POST))!=count($_POST)){
  header('Location: ./register.php');
  die();
}else{
  if(unamecheck(trim($_POST['username']))){
    header('Location: ./register.php');
    die();    
  }else{
    $fname    = trim($_POST['firstname']);
    $lname    = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $email    = trim($_POST['email']);

    $sql = $conn->prepare('INSERT INTO users (first_name, last_name, username, password, email) VALUES (?, ?, ?, ?, ?)');
    $sql->bind_param("sssss", $fname, $lname, $username, $password, $email);
    $sql->execute();
    $sql->close();

    header('Location: ./profile.php');
  }
}

?>
