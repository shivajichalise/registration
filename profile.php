<?php

session_start();

if(!isset($_SESSION['loggedin'])){
  header('Location: login.php');
  exit;
}

?>

<?php include "./htmls/htmlt.html" ?>
<header>
  <div class="container">
    <div id="branding">
    <h1><?= $_SESSION['username'] ?></h1>
    </div>
    <nav>
      <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </div>
</header>

<section id="about">
    <div class="container">
      <img src="images/mypic.jpg" alt="" srcset="" id="myimg">
      <p id="ab">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at est risus. Ut finibus dictum
        suscipit.
        Aliquam sagittis suscipit sodales. Phasellus ipsum ex, laoreet a augue quis, ultricies pellentesque est. Donec
        leo dolor, imperdiet a dapibus a, scelerisque ullamcorper nisl. Mauris accumsan ipsum a porta interdum. Nunc
        consequat nibh id elit facilisis faucibus. Praesent non libero nec est pharetra placerat. In tristique arcu
        tortor, in porttitor nisl luctus ut. Integer molestie, enim in lobortis interdum, dui erat vehicula elit, nec
        elementum libero dolor eu quam. Vivamus eget auctor elit. Etiam
        et dictum est, sed sollicitudin tortor. Etiam orci tortor,
        tristique vitae ante non, finibus dictum elit.</p>
      <img src="images/landscape.png" id="landscape" alt="">
      <p id="ab2">Donec leo dolor, imperdiet a dapibus a, scelerisque ullamcorper nisl. Mauris accumsan ipsum a porta
        interdum. Nunc consequat nibh id elit facilisis faucibus. Praesent non libero nec est pharetra placerat. In
        tristique arcu tortor, in porttitor nisl luctus ut. Vivamus eget auctor elit. Etiam et dictum est.</p>
    </div>
</section>

<?php include "./htmls/htmlb.html" ?>
