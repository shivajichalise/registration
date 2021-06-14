<?php

session_start();

if(isset($_SESSION['loggedin'])){
  header('Location: profile.php');
  exit;
}

?>

<?php include "./htmls/htmlt.html" ?>
<header>
  <div class="container">
    <div id="branding">
      <h1>log in</h1>
    </div>
  </div>
</header>

<section id="logform">
  <div class="container">
    <table id="logtbl">
      <form action="auth.php" method="POST">
       <tr>
          <td>Username</td>
        </tr>
          
        <tr>
          <td><input type="text" name="username" placeholder="Type username.." required></td>
        </tr>
        
        <tr>
          <td>Password</td>
        </tr>
          
        <tr>
          <td><input type="password" name="password" id="pass" placeholder="Type password.." required></td>
        </tr>
    
        <tr>
          <td><button type="submit" name="submit" id="submit">Log in</button></td>
        </tr>
      </form>
    </table>
  </div>
</section>

<footer>
  <div class="container">
    <nav>
      <ul>
        <li><p>Don't have an account? <a href="./register.php">Sign up</a></p></li>
      </ul>
    </nav>
  </div>
</footer>

<?php include "./htmls/htmlb.html" ?>
