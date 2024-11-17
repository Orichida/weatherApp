<?php
require_once 'connect.php';
session_start();
$info="";
if ($_POST) {
  extract(array_map('trim', $_POST));
  if (empty($login) || empty($password)) {
    $_SESSION['info'] = "Please fill all fields with valid data";
    header("location: index.php");
    exit;
  }
  else {
    $query = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) 
      {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $queryw = "SELECT * FROM warnings WHERE id='$id'";
        $resultw = mysqli_query($con, $queryw);
        $countw = mysqli_num_rows($resultw);
        $warningRow = mysqli_fetch_assoc($resultw);
        $DateTime = date('Y-m-d H:i:s');
        if ($countw == 1 && $warningRow['nbr'] == 3) {
          $banDate = $warningRow['banDate'];
          $dateTime1 = new DateTime($banDate);
          $dateTime2 = new DateTime($DateTime);
          $timestamp1 = $dateTime1->getTimestamp();
          $timestamp2 = $dateTime2->getTimestamp();
          $difference = abs($timestamp2 - $timestamp1);
          if ($difference < 300) {
            $_SESSION['info'] = "Too many wrong Passwords for this account, Ban Timer : " . ($dateTime2->diff($dateTime1))->format('%I:%S') . ", wait until the 5 minutes ban.";
            header("location: index.php");
            exit;
          }
        }
        if ($row['password'] == md5($password)) {
          $queryDelete = "DELETE FROM warnings WHERE id='$id'";
          $resultDelete = mysqli_query($con, $queryDelete);
          $_SESSION['user'] =$row;
          header("location: ./components/meteo.php");
          exit;
        }else{
          if ($countw == 0) {
            $queryInsert = "INSERT into warnings VALUES(null,$id,1,null)";
            $resultInsert = mysqli_query($con, $queryInsert);
            $_SESSION['info'] = "Wrong password, you have 2 attempts left";
            header("location: index.php");
            exit;
          }
          else {
            if ($warningRow['nbr'] == 1) {
              $_SESSION['info'] = "Wrong password, you have 1 attempt left";
              $queryUpdate = "UPDATE warnings SET nbr=2 where id='$id'";
              $resultUpdate = mysqli_query($con, $queryUpdate);
              header("location: index.php");
              exit;
            }
            elseif ($warningRow['nbr'] == 2) {
              $queryUpdate = "UPDATE warnings SET nbr=3,banDate='$DateTime' where id='$id'";
              $resultUpdate = mysqli_query($con, $queryUpdate);
              $_SESSION['info'] = "Too many wrong Passwords, wait 5 minutes";
              header("location: index.php");
              exit;
            }
            else {
              $queryDelete = "DELETE FROM warnings WHERE id='$id'";
              $resultDelete = mysqli_query($con, $queryDelete);
              // ###
              $queryInsert = "INSERT into warnings VALUES(null,$id,1,null)";
              $resultInsert = mysqli_query($con, $queryInsert);
              $_SESSION['info'] = "Wrong password, you have 2 attempts left";
              header("location: index.php");
              exit;
            }
            }
          }
        } 
    else 
      {
        $_SESSION['info'] = "User not found";
        header("location: index.php");
        exit;
      }
  }
}
if (isset($_SESSION['info'])) {
  $info = $_SESSION['info'];
  unset($_SESSION['info']); 
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <link rel="shortcut icon" href="img/meteo.png" type="image/x-icon">
  </head>
<body>
  <div class="container">
  <div class="login-container" id="login">
  <h2>Login</h2>
  <form method="post">
      <input type="text" name="login" placeholder="Username" class="login" required>
      <input type="password" name="password" placeholder="Password" class="password" required>
      <input type="submit" value="Login">
      <p>New ? click here to <a onclick="flip()">create an account</a></p>
  </form>
  </div>
  </div>
  <?php if (!empty($info)) echo "<script>$(document).ready(function () { throwErr('".$info."') }); </script>"; ?>
  <div class="msgBox error" id="msgBox"></div>
</body>
</html>
