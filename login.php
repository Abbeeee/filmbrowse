<?php
session_start();
include "include/config.php";
include "include/connect.php";

// If something is posted through login form
if (isset($_POST['username']) && isset($_POST['password'])) {

  // Make sure input can't contain harmful code
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
  }

  // Run the function to disarm any potential harmful code
  $username = validate($_POST['username']);
  $password = validate($_POST['password']);


  if (empty($username)) {
      header("Location: login-page.php?error=Username is required");
      exit();
  } else if (empty($password)) {
      header("Location: login-page.php?error=Password is required");
      exit();
  } else {

    // Query to retrieve row from database where it matches the users imput
    $sql = "SELECT * FROM user WHERE userName='$username' AND password='$password'";

    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['userName'] === $username && $row['password'] === $password) {
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
