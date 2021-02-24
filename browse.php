<!DOCTYPE html>
<html>

<head>
	<title>Le Bookstore</title>
	<link rel="stylesheet" href="https://use.typekit.net/dix1wpk.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<script>

		function timeFunction() {
			setTimeout(function(){ location.reload(); }, 800);
		}

	</script>
</head>

<body>

<div class="wrapper">

<?php
  include 'include/header.php'; ?>

  <div id="browse-container">

<!-- THE SEARCH FORM -->
		<div id="form-container">
			<h1>Browse Books</h1>
			<form id="browse-form" action="" method="GET">
					<input type="text" name="title" placeholder="Title">
					<input type="text" name="name" placeholder="Author">
				<input type="submit" value="Search">
			</form>
		</div>


<!-- THE BROWSE TABLE -->
		<div class="table-container">
			<table class="browse-table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th class="button-cell">Reserve</th>
					</tr>
				</thead>

				<tbody>
				<?php
					// Set bookID variable to save it outside of while loop
					$id = '';
					// As long as $result contains any rows, display them
					while ($row = $result->fetch_assoc()){
					   echo "<tr id='".$row['bookID']."'>";
						 echo "<td><div>".$row['title']."</div></td>";
						 echo "<td><div>".$row['name']."</div></td>";
						 echo "<td class='button-cell'><div>";
						 echo "<form method='POST'>";
						 echo "<button id='".$row['bookID']."' class='update-btn' type='submit' name='status' value='".$row['bookID']."'>Reserve</button></form>";
						 echo "</div></td>";
						 echo "</tr>";
					};
					// If the Return button has been pressed, SET status to unavailable where bookID matches
					// the row that has been pressed. Get this value from hidden input that recieves the bookID as value
					if (isset($_POST['status'])){
					 $id = $_POST['status'];
					 // Run css animation
					 echo "<script>
					 				document.getElementById('".$id."').className = 'changed';
									timeFunction();
					 			</script>";
					 $sql = "UPDATE book SET status = 'unavailable' WHERE bookID = $id";
					 $stmt = $db->prepare($sql);
					 $stmt->execute();
					 // Force refresh of page
					 // echo "<script>location.href = 'browse.php';</script>";
				 	};
					// echo "<script> </script>";
					// free results
					$stmt->free_result();
   				// close statement
   				$stmt->close();
					// close connection
					$db->close();
				?>
				</tbody>
			</table>
		</div>


	</div>

</div>



		<div class="push"></div>
</div>


<?php
  include 'include/footer.php'; ?>

</body>

</html>
