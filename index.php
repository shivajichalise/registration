<?php

if(!$_SESSION['loggedin']){
  header('Location: ./login.php');
}

?>

<?php require_once('./htmls/htmlt.html') ?>



<?php require_once('./htmls/htmlb.html') ?>
