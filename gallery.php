<!DOCTYPE html>
<html>

<head>
	<title>Le Bookstore</title>
	<link rel="stylesheet" href="https://use.typekit.net/dix1wpk.css">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
  include 'include/header.php'; ?>

<div class="wrapper">

	 <div class="gallery-container">

		 <div class="gallery-box">

				<h1>Gallery</h1>
        <div class="gallery-item-container">
					<?php
						$images = glob("uploads/*.*");
						foreach($images as $image) {
							echo '<img class="gallery-item" src="'.$image.'" />';
						}
					?>
				</div>

			</div>

	 </div>

    <div class="push"></div>
</div>

<?php
  include 'include/footer.php'; ?>

</body>

</html>
