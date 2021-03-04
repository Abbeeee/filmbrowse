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
				<form method="get">
					<button name="add-button">New Image</button>
				</form>

        <div class="gallery-item-container">
					<?php

						if (isset($_GET['add-button'])) {

							// Initiate curl
							$curlconn = curl_init();

							// save url in variable
							$url = "https://picsum.photos/v2/list?page=2&limit=100";

							// specify options for curl
							curl_setopt($curlconn, CURLOPT_URL, $url);
							curl_setopt($curlconn, CURLOPT_RETURNTRANSFER, true);

							// excecute curl and save in variable
							$picture = curl_exec($curlconn);

							// decode json file retrieved
							$jsonResponse = json_decode($picture, true);

							// set variable to get random array item from list retrieved from the url
							$randomNumber = rand(0, 99);

							// save url and author key in variables (to make it cleaner when echo)
							$print = $jsonResponse[$randomNumber]['download_url'];
							$author = $jsonResponse[$randomNumber]['author'];

							// print out the actual image
							echo "<img class='gallery-item-new' src=".$print.">";

							// print out the image author
							echo "<h3>".$author."</h3>";

							curl_close($curlconn);



							// echo "<img class ='gallery-item-new' src='https://picsum.photos/id/".$randomId."/2500/1667'><br>";

							// foreach($jsonResponse as $each) {
							// 	echo $each['author'];
							// }
							// print_r($jsonResponse[$randomImage]);

							// $output = "<img ";
          				    // foreach($jsonResponse as $each) {
          				    //   $output = "<img class='gallery-item-new' src=".$print['download_url']."><br>";
							//   // $output .= $each["download_url"]."<br>";
							//   echo $output;
          				    // }

							 // $output2 = "<ul>";
							 // foreach($jsonResponse as $each) {
							 //   $output2 .= "<li>".$each['id']."</li>";
							 // }
							 // $output2 .= "</ul>";
							 // echo $output2;

							// echo '<img src="'.$url.'">';
						}

						// return an array of filenames
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
