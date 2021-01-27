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
	 include 'header.php'; ?>



	 <div id="contact-container">

		 <div class="contact-box">
			 <h1>Contact</h1>
			 <form class="contact-form">
				 	<label>Name</label>
				 	<input type="text" placeholder="Your Name...">
					<label>Email</label>
				 	<input type="text" placeholder="Your Email Address...">
					<label>Message</label>
					<textarea name="subject" placeholder="Your Message..."></textarea>
			 		<input type="submit" value="Send">
			 </form>
			 <img class="person-smiling" src="images/contact-person-new.png" alt="Person smiling">
		 </div>

	 </div>



		<div class="push"></div>
</div>

<?php
	 include 'footer.php'; ?>

</body>

</html>
