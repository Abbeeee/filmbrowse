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
			 <form class="cat-form" method="post">
			 		<button type="submit" name="fact">Get fact</button>
          <button type="submit" name="breed">Get breed</button>
    
          <?php
          
            if (isset($_POST['fact'])) {
              
              $curlconn = curl_init();
              $url = "https://catfact.ninja/fact?max_length=50";
            
              curl_setopt($curlconn, CURLOPT_URL, $url);
              curl_setopt($curlconn, CURLOPT_RETURNTRANSFER, true);
    
              $response = curl_exec($curlconn);
    
              $jsonResponse = json_decode($response, true);

              echo "<h3>".$jsonResponse['fact']."</h3>";

              curl_close($curlconn);
            }

            if (isset($_POST['breed'])) {
              
              $curlconn = curl_init();
              $url = "https://catfact.ninja/breeds?limit=98";
            
              curl_setopt($curlconn, CURLOPT_URL, $url);
              curl_setopt($curlconn, CURLOPT_RETURNTRANSFER, true);
    
              $response = curl_exec($curlconn);
              $jsonResponse = json_decode($response, true);
              $randomBreed = rand(1, 98);
             
              echo "<h3>".$jsonResponse['data'][$randomBreed]['breed']."</h3>";

              curl_close($curlconn);
        
            //  $output = "<ul>";
            //  foreach($jsonResponse['data'] as $each) {
            //    $output .= "<li>".$each['breed']."</li>";
            //  }
            //  $output .= "</ul>";
            //  echo $output;
            }

          ?>
          </ul>
			 </form>
		 </div>

	 </div>



		<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>
