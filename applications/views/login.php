<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    #myHeadings{
        font-family: inherit;
        font-size: 500%;
        text-align: center;
        color: black;
        padding: inherit
        }
  </style>
  <title>Oxygen Supply</title>
</head>
<body style="background-color: rgb(238, 238, 209)">

  <?php
  if(isset($_SESSION['message']))
  {
    echo $_SESSION['message'];
    $this->session->unset_userdata('message');
  }
  ?>

  <h1 id="myHeadings">Login</h1>
  <hr>
  <form name="loginform" action="" method="POST">
      <fieldset>
          <legend style="text-align: center">Sign In</legend>
              User ID: <br>
              <input type="text" name="username" id="username"><br>
              Password: <br>
              <input type="password" name="password" id="password"><br>
              <input type="submit" name="submit" value="Submit" id="submit">
              <input type="submit" name="cancel" value="Cancel">
      </fieldset>
  </form>
  <form method="post">
        If you haven't been registered yet, then:
        <input type="submit" name="register" id="register" value="Register Yourself"><br>
  </form>
</body>
</html>

