<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>PHP With Sql</title>
</head>

<body>
  <?php
  // start a session 
  session_start();

  // check is loginState is present
  // by default, when the website first run it doesn't create session variable automatically
  // that's why we use isset to prevent undefined index error
  if (isset($_SESSION['loginState']) == 1 || isset($_SESSION['registerState']) == 1 || isset($_SESSION['loggedInAsAdmin']) == 1) {
    // if yes, do the following
    if ($_SESSION['loginState'] == true) {
      // if login was successful
  ?>
      <div class='home'>
        <div class="topContainer">
          <h1 class='greeting'>Welcome <?php echo $_SESSION['username'] ?>! </h1>

        </div>
        <div class="homeBtnContainer" style="display: flex; flex-direction: column">
          <div>
            <button type="button" class="colorBtn" id='colorBtn'>CHANGE COLOR</button>
          </div>
          <div>
            <a class='logoutBtn' href='logout.php'>LOGOUT</a>
          </div>
        </div>
      </div>
    <?php
      // if the loginState variable is false ...
    } elseif ($_SESSION['loggedInAsAdmin'] == true) {
    ?>
      <div class='home'>
        <h1>You are logged in as Administrator</h1>
        <div>
          <a href="admin.php">Go to Admin Page</a>
          <p>or</p>
          <a href="logout.php">Logout</a>
        </div>
      </div>
      <?php
    } else {
      if ($_SESSION['registerState'] == true) {
        // registration form
      ?>
        <div class="registerFormContainer">
          <h1>Register Here</h1>
          <form class="registerForm" action='register.php' method='POST'>
            <label>Enter Username: </label>
            <input required type='text' name='user_name' />
            <label>Enter Password: </label>
            <input required type='password' name='pass_word' />
            <input type='submit' value='Submit' />
          </form>
          <?php
          if (isset($_GET['msg'])) {
            if ($_GET['msg'] == "userExist") {
              echo "<p style='color:red'>Username Already Exist</p>";
            } elseif ($_GET['msg'] == "adminName") {
              echo "<p style='color:red'>You can't use Administrator as Username</p>";
            }
          }
          ?>
          <form method="post">
            <input type="submit" name="loginHere" value="Already a Member? Click here" />
          </form>
        </div>
        <?php
        if (isset($_POST['loginHere'])) {
          $_SESSION['registerState'] = false;
          header("Refresh: 0");
        }
      } else {
        // login form
        ?>
        <div class="loginFormContainer">
          <?php
          if (isset($_GET['msg'])) {
            if ($_GET['msg'] == "regSuccess") {
              echo "<h3 style='color:green'>Registration Successful. Please Login</h3>";
            }
          }
          ?>
          <h1>Login Here</h1>
          <form class="loginForm" action="signin.php" method="POST">
            <label>Enter Username: </label>
            <input required type='text' name='user_name' />
            <label>Enter Password: </label>
            <input required type='password' name='pass_word' />
            <input type="submit" value="Submit" />
          </form>
          <?php
          if (isset($_GET['msg'])) {
            if ($_GET['msg'] == "xadminpass") {
              echo "<p style='color:red'>Check username or password</p>";
            } elseif ($_GET['msg'] == "usernotfound") {
              echo "<p style='color:red'>Username Not Found</p>";
            }
          }
          ?>
          <form method="post">
            <input type="submit" name="registerHere" value="No Account? Click Here" />
          </form>
        </div>
  <?php
        if (isset($_POST['registerHere'])) {
          $_SESSION['registerState'] = true;
          header("Refresh: 0");
        }
      }
    }
  } else {
    $_SESSION['loginState'] = false;
    $_SESSION['registerState'] = true;
    $_SESSION['loggedInAsAdmin'] = false;
    header("Refresh:0");
  }

  ?>
  <script>
    const buton = document.getElementById("colorBtn");
    const allchar = "0123456789ABCDEF";

    buton.addEventListener("click", changeColor);

    function changeColor() {
      let randcol = "";
      for (let i = 0; i < 6; i++) {
        randcol += allchar[Math.floor(Math.random() * 16)];
      }
      document.body.style.backgroundColor = "#" + randcol;
    }
  </script>
</body>

</html>
