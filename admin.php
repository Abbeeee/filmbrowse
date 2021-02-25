<?php
session_start();
// Only allow access if the session userID & userName has been succesfully set, and type is admin. Else...
if (isset($_SESSION['userID']) && isset($_SESSION['userName']) && $_SESSION['type'] === 'admin') {

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


	 <div class="admin-container">

		 <div class="admin-box">
			 <form class="admin-form" action="admin.php" method="post" enctype="multipart/form-data">
				 <h1>Yo <?php echo $_SESSION['userName']; ?>, my man.</h1>
				 <input type="submit" name="submit" value="Upload">
	       <input type="file" name="filename" id="filename">

				 <!-- CODE FROM UPLOAD.PHP, works better here lol -->
				 <p>
				 <?php
				 	 // If upload button has been pressed
				 	 if (isset($_POST["submit"])) {
						 // set variables
				 		 $target_dir = "uploads/";
				 		 $target_file = $target_dir . basename($_FILES["filename"]["name"]);
				 		 $uploadOk = 1;
				 		 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
						 // Check if image file is a actual image
				 	   $check = getimagesize($_FILES["filename"]["tmp_name"]);
				 	   if($check !== false) {
				 	     $uploadOk = 1;
				 	   } else {
				 	     $uploadOk = 0;
				 	   }
				 	 }
				 // If upload button has been pressed
				 if (isset($_POST["submit"])) {
				 	 // Check if file already exists
				 	 if (file_exists($target_file)) {
				 	   echo "Sorry, file already exists. ";
				 	   $uploadOk = 0;
				 	 }

				 	 // Check file size, do not allow if larger than 5MB
				 	 if ($_FILES["filename"]["size"] > 5000000) {
				 	   echo "Sorry, your file is too large. ";
				 	   $uploadOk = 0;
				 	 }

				 	 // If it is not any of these file formats, do not allow
				 	 if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				 	 && $imageFileType != "gif" ) {
				 	   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
				 	   $uploadOk = 0;
				 	 }

				 	 // Check if $uploadOk is set to 0 by an error, also print following
				 	 if ($uploadOk == 0) {
				 	   echo "Your file was <strong style='color: #EA4F3F;'> not </strong> uploaded.";
				 	 // if everything is ok, try to upload file
				 	 } else {
						 // Move file to path specified in $target_file, if not moved echo error
				 	   if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
				 	     echo "The file <strong style='color: #3f5ea8;'>". htmlspecialchars(basename( $_FILES["filename"]["name"])). "</strong> has been uploaded.";
				 	   } else {
				 	     echo "Sorry, there was an <strong style='color: #EA4F3F;'> error <strong style='color: #EA4F3F;'> uploading your file.";
				 	   }
				 	 }
				 }
				 ?>
			 	</p>

		 	 </form>
			 <!-- If clicked load logout.php -->
			 <form class="admin-form" action="logout.php">
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
// Else if type is user -> redirect to user page instead.
} else if(isset($_SESSION['userID']) && isset($_SESSION['userName']) && $_SESSION['type'] === 'user') {
  header("Location: user.php");
  exit();
} else {
	// Else if userID and userName has not been set at all -> redirect to login page.
  header("Location: login.php");
  exit();
}
?>
