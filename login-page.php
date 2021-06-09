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


	 <div class="login-container">

		 <div class="login-box">
			 <h1>Login</h1>
			 <!-- When button is pressed, run login.php file -->
			 <form class="login-form" action="login.php" method="post">
				 	<label>Username</label>
				 	<input type="text" name="username" placeholder="Your Username...">
					<label>Password</label>
				 	<input type="password" name="password" placeholder="Your Password...">
						<!-- if an error is set it URL (from login.php) print it here -->
            <?php if (isset($_GET['error'])) { ?>
              <p class="error"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg><?php echo $_GET['error'] ?></p>
            <?php } ?>
			 		<button type="submit" value="Login">Login</button>
			 </form>
		 </div>

	 </div>


		<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>
