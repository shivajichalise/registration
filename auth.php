<?php

session_start();
require_once('./conn.php');

if(!isset($_POST['username'], $_POST['password'])){
  header('Location: ./login.php');
  exit("Please enter both username and password to log in.");
}

$sql = $conn->prepare('SELECT id, password FROM users WHERE username = ?');
$username = trim($_POST['username']);
$sql->bind_param('s', $username);
$sql->execute();
$sql->store_result();

if($sql->num_rows > 0){
  $sql->bind_result($id, $password);
  $sql->fetch();

  if(password_verify($_POST['password'], $password)){
    session_regenerate_id();
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['loggedin'] = TRUE;
    header('Location: ./profile.php');
  }else{
    echo "Username/Password donot match.";
  }
}else{
  echo "Username/Password donot match.";
}

$sql->close();

?>

<script>
  setTimeout(function(){location.href = "./login.php"}, 2000);
</script>
