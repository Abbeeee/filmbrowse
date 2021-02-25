<?php
session_start();
// Allow access if the session userID & userName has been succesfully set, and type is user. Else...
if (isset($_SESSION['userID']) && isset($_SESSION['userName']) && $_SESSION['type'] === 'user') {

?>

<!DOCTYPE html>
<html>

<head>
	<title>Le Bookstore</title>
	<link rel="stylesheet" href="https://use.typekit.net/dix1wpk.css">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="wrapper">

<?php
	 include 'include/header.php'; ?>

	 <!-- using same classes from admin page since looks are the same -->
	 <div class="admin-container">

		 <div class="admin-box">
			 <form class="admin-form" action="logout.php">
			 <h1>Yo <?php echo $_SESSION['userName']; ?>, my USER.</h1>
       <br>
       <p>You cannot upload any images lol</p>
       <br>
       <button>Logout</button>
		 	 </form>
		 </div>

	 </div>


		<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>

<?php
// Else if userID and userName has not been set -> redirect to login page.
} else {
  header("Location: login.php");
  exit();
}
?>
