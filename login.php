<?php
session_start();
include "include/config.php";
include "include/connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
  }

  $uname = validate($_POST['uname']);
  $pass = validate($_POST['password']);


  if (empty($uname)) {
      header("Location: login-page.php?error=Username is required");
      exit();
  } else if (empty($pass)) {
      header("Location: login-page.php?error=Password is required");
      exit();
  } else {

    $sql = "SELECT * FROM user WHERE userName='$uname' AND password='$pass'";

    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['userName'] === $uname && $row['password'] === $pass) {
          $_SESSION['userName'] = $row['userName'];
          $_SESSION['type'] = $row['type'];
          $_SESSION['userID'] = $row['userID'];
          if ($row['type'] === 'admin') {
            header("Location: admin.php");
            exit();
          } else {
            header("Location: user.php");
            exit();
          }
      } else {
        header("Location: login-page.php?error=Incorrect username or password");
        exit();
      }
    } else {
      header("Location: login-page.php?error=Incorrect username or password");
      exit();
    }
  }
} else {
  header("Location: login-page.php");
  exit();
}



?>
