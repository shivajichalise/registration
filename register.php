<?php include "./htmls/htmlt.html" ?>
<header>
  <div class="container">
    <div id="branding">
      <h1>register</h1>
    </div>
  </div>
</header>
<?php

session_start();
if(!isset($_SESSION['username'])){
  $_SESSION['firstname']  = "";
  $_SESSION['lastname']   = "";
  $_SESSION['username']   = "";
  $_SESSION['email']      = "";
  $_SESSION['password']   = "";
  $_SESSION['repassword'] = "";  
}

?>
<section id="regform">
  <div class="container">
    <table id="regtbl">
      <form action="./createuser.php" method="POST">
        <tr>
          <td>First Name</td>
        </tr>
          
        <tr>
        <td><input type="text" name="firstname" placeholder="Enter your firstname.." value="<?= $_SESSION['firstname'] ?>" required></td>
        </tr>
        
        <tr>
          <td>Last Name</td>
        </tr>
          
        <tr>
          <td><input type="text" name="lastname" placeholder="Enter your lastname.." value="<?= $_SESSION['lastname'] ?>" required></td>
        </tr>
        
        <tr>
          <td>Email</td>
        </tr>
        
        <tr>
          <td><input type="email" name="email" placeholder="Enter your email.." autocomplete="off" value="<?= $_SESSION['email'] ?>" required></td>
        </tr>

        <tr>
          <td>Username</td>
        </tr>
          
        <tr>
          <td><input type="text" name="username" placeholder="Type username.." onkeyup="unameAval(this.value)"  autocomplete="off" value="<?= $_SESSION['username'] ?>" required><span id="uname"></span></td>
        </tr>
        
        <tr>
          <td>Password</td>
        </tr>
          
        <tr>
          <td><input type="password" name="password" id="pass" placeholder="Type password.." onkeyup="confirmPass()" required><span id="strong"></span></td>
        </tr>
        
        <tr>
          <td>Re-enter your password</td>
        </tr>
          
        <tr>
          <td><input type="password" name="repassword" id="repass" placeholder="Re-enter your password.." onkeyup="confirmPass()" required><span id="message"></span></td>
        </tr>

        <tr>
          <td><button type="submit" name="submit" id="submit">Sign up</button></td>
        </tr>
      </form>
    </table>
  </div>
</section>
<?php

session_destroy();

?>

<footer>
  <div class="container">
    <nav>
      <ul>
        <li><p>Already have an account? <a href="./login.php">Log in</a></p></li>
      </ul>
    </nav>
  </div>
</footer>

<script>
// Global
let submitBtn = document.getElementById('submit');
let des = [];
const reducer = (accumulator, currentValue) => accumulator + currentValue;

//confirm password validation
function confirmPass(){
  let pass       = document.getElementById('pass').value;
  let repass     = document.getElementById('repass').value;
  let message    = document.getElementById('message');
  let strong     = document.getElementById('strong');
  let strongPass = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

  if(pass.length == 0 && repass.length == 0){
    message.innerHTML = '';
    strong.innerHTML  = '';
    return;
  }

  if(pass.length > 0){
    if(!(strongPass.test(pass))){
      strong.style.color = 'red';
      strong.innerHTML   = 'Please use strong password ×';
      return; 
    }else{
      strong.style.color = '';
      strong.innerHTML   = '';
    }
  }

  if(pass == repass){
    message.style.color = 'green';
    message.innerHTML = 'Password matched ✓';
    des[0] = 1;
  }else{
    message.style.color = 'red';
    message.innerHTML = 'Password do not match ×';
    des[0] = 0;
  }
  
  if(des.reduce(reducer) == 2){
    submitBtn.disabled = false;
  }else{
    submitBtn.disabled = true;
  }
}

//username availability check
function unameAval(str){
  let uname = document.getElementById('uname');
  let illegalChars = /\W/; // allow letters, numbers, and underscores

  if(str.length == 0){
    uname.innerHTML = '';
    return;
  }
  
  if(illegalChars.test(str)){
    uname.style.color = 'red';
    uname.innerHTML = "Username not available ×";
    des[1] = 0;
    return;
  }

  if((str.length < 6) || (str.length > 15)){
    uname.style.color = 'red';
    uname.innerHTML = 'Username must be of 6-15 characters.';
    des[1] = 0;
    return;
  }else{
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText == 1){
          uname.style.color = 'red';
          uname.innerHTML = "Username not available ×";
          des[1] = 0;
        }else{
          uname.style.color = 'green';
          uname.innerHTML = "Username available ✓";
          des[1] = 1;
        }
      }
  };
  xmlhttp.open("GET", "unamecheck.php?q="+ str, true);
  xmlhttp.send();
  }

  if(des.reduce(reducer) == 2){
      submitBtn.disabled = false;
    }else{
      submitBtn.disabled = true;
    }

}

</script>

<?php include "./htmls/htmlb.html" ?>
