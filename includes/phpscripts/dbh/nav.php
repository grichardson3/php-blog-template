<?php
  session_start();
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login System</title>
    <link href="css/foundation.css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-login">
          <?php
            if (isset($_SESSION['u_id'])) {
              echo '
                <form class="row" action="includes/logout-inc.php" method="POST">
                  <div class="small-2 medium-2 large-2 columns" id="logoDiv">
                    <a href="index.php"><img src="img/logo.png" alt="yeet"></a>
                  </div>
                  <div class="small-6 small-push-2 medium-3 medium-push-5 large-2 large-push-7 columns">'; echo '<p class="welcomeMsg">' . "Welcome back " . '<br>' . $_SESSION['u_userid'] . "!" . '</p>'; echo '</div>
                  <div class="small-4 medium-2 large-1 columns">
                    <button type="submit" name="submit">Logout</button>
                  </div>
                </form>';
            } else {
              echo '
                <form class="row" action="includes/login-inc.php" method="POST">
                  <div class="small-12 medium-2 large-2 columns" id="logoDiv">
                    <a href="index.php"><img src="img/logo.png" alt="yeet"></a>
                  </div>
                  <div class="small-6 medium-3 medium-push-2 large-2 large-push-5 columns">
                    <input type="text" name="userid" placeholder="Username/email">
                  </div>
                  <div class="small-6 medium-3 medium-push-2 large-2 large-push-5 columns">
                    <input type="password" name="pass" placeholder="Password">
                  </div>
                  <div class="small-12 medium-2 large-1 columns">
                    <button class="loginButton" type="submit" name="submit">Login</button>
                  </div>
                </form>
                <div class="signUp">
                  <div class="row">
                    <div class="small-12 medium-4 medium-push-8 large-3 large-push-9 columns">
                      <a href="signup.php">No account?  -  Sign Up</a>
                    </div>
                  </div>
                </div>';
            }
          ?>
        </div>
      </nav>
    </header>