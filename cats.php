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



	 <div id="cat-container">

		 <div class="cat-box">
			 <h1>Cat facts bitch</h1>
			 <form class="cat-form" method="get">
			 		<button type="submit" name="fact">Get fact</button>
          <button type="submit" name="breed">Get breed</button>

          <?php

            if (isset($_GET['fact'])) {

							// initiate curl & set url
              $curlconn = curl_init();
              $url = "https://catfact.ninja/fact?max_length=50";

							// set curl options, the url and to return as string
              curl_setopt($curlconn, CURLOPT_URL, $url);
              curl_setopt($curlconn, CURLOPT_RETURNTRANSFER, true);

							// excecute curl and save in variable
              $response = curl_exec($curlconn);

							// decode json file retrieved
              $jsonResponse = json_decode($response, true);

							// save the fact as variable
							$fact = $jsonResponse['fact'];

							// print the fact
              echo "<h3>".$fact."</h3>";

              curl_close($curlconn);
            }

            if (isset($_GET['breed'])) {

							// initiate curl & set url
              $curlconn = curl_init();
              $url = "https://catfact.ninja/breeds?limit=98";

							// set curl options, the url and to return as string
              curl_setopt($curlconn, CURLOPT_URL, $url);
              curl_setopt($curlconn, CURLOPT_RETURNTRANSFER, true);

							// excecute curl and save in variable
              $response = curl_exec($curlconn);

							// decode json file retrieved
              $jsonResponse = json_decode($response, true);

							// set random number between 0-97 to get a random breed from array
              $randomNumber = rand(0, 97);

							// save breed as variable, randomNumber gives a random item from array
							$breed = $jsonResponse['data'][$randomNumber]['breed'];

							// print the breed
              echo "<h3>".$breed."</h3>";

							// close curl connection
              curl_close($curlconn);

            }

          ?>
			 </form>
		 </div>

	 </div>



		<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>
