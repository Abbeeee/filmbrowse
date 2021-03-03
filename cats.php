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



	 <div id="contact-container">

		 <div class="contact-box">
			 <h1>Cat facts bitch</h1>
			 <form class="contact-form" method="post">
			 		<button type="submit" name="fact">Get fact</button>
          <br><br>

          <?php
          $curlconn = curl_init();

          curl_setopt($curlconn, CURLOPT_URL, 'https://catfact.ninja/fact?max_length=50');
          curl_setopt($curlconn, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curlconn, CURLOPT_HTTPHEADER, array(
            'fact:', 'string',
            'lenght:', '50'
          ));

          $catfact = curl_exec($curlconn);
          curl_close($curlconn);

          $jsonArrayResponse = json_decode($catfact);

          if (isset($_POST['fact'])) {
            echo $jsonArrayResponse;
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
