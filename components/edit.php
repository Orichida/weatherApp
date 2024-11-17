<?php
require_once '../security.php';
require_once '../connect.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/site/css/index.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="/site/js/index.js"></script>
    <link rel="shortcut icon" href="/site/img/meteo.png" type="image/x-icon">
  </head>
<body>
  <div class="container">
  <div class="login-container" id="login">
  <h2>Change <?php echo $_SESSION['user']['login'];?>'s settings</h2>
  <form method="post" onsubmit="event.preventDefault();edit()">
      <p>Change Password : </p>
      <input type="password" name="oldPassword" placeholder="Old Password" class="oldPassword" required>
      <input type="password" name="newPassword" placeholder="New Password" class="newPassword" required>
      <input type="password" name="confPassword" placeholder="Confirm Password" class="confPassword" required>
      <input type="submit" value="Change">
  </form>
  <br>
  <input type="submit" value="Reset All History" onclick="resetHist()">
  <input type="button" value="Delete Account" class="reset" onclick="deleteAcc()">
  <p><a href="meteo.php">Click here to return to home page</a></p>
  </div>
  </div>
  <div class="msgBox error" id="msgBox"></div>
</body>
</html>