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
					// Print boodID outside while loop, see below
					$id = '';
					// As long as $result contains any rows, display them
					while ($row = $result->fetch_assoc()){
					   echo "<tr id='".$row['bookID']."'>";
						 echo "<td><div>".$row['title']."</div></td>";
						 echo "<td><div>".$row['name']."</div></td>";
						 echo "<td class='button-cell'><div>";
						 echo "<form method='POST'>";
						 echo "<button id='".$row['bookID']."' class='update-btn' name='status' value='".$row['bookID']."'>Reserve</button></form>";
						 echo "</div></td>";
						 echo "</tr>";
					};
					// If the Return button has been pressed, SET status to unavailable where bookID matches
					// the row that has been pressed. Get this value from hidden input that recieves the bookID as value
					if (isset($_POST['status'])){
					 $id = $_POST['status'];
					 // echo "<script type='text/javascript'>document.getElementById('".$id."').className = 'changed';</script>";
					 echo "<script>document.getElementById('".$id."').className = 'hide-row';</script>";
					 $sql = "UPDATE book SET status = 'unavailable' WHERE bookID = $id";
					 $stmt = $db->prepare($sql);
					 $stmt->execute();
					 // Force refresh of page
					 // echo "<script type='text/javascript'>location.href = 'browse.php';</script>";


					 //	theButton.on('click', function() {
					 //	$('tr:nth-child(2)').toggleClass('active');
					 //	});

				 	};
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











		<div style ="border: dashed 5px linen; padding: 25px; margin: 100px 0;">
			<h3 style="margin-bottom:10px; color: salmon;">TEMPORARY</h3>
			<h1>Add books to database</h1>
			<form action="include/add_book.php" method="POST">
					<input type="text" name="title" placeholder="Title">
					<input type="text" name="ISBN" placeholder="ISBN">
					<input type="text" name="pages" placeholder="Pages">
					<input type="text" name="edition" placeholder="Edition">
					<input type="text" name="year" placeholder="Year">
					<input type="text" name="publisher" placeholder="Publisher">
				<input type="submit" name="submit" value="Add to database">
			</form>
		</div>

			<?php
				$query = "SELECT * from book";
				$stmt = $db->prepare($query);
				$stmt->bind_result($bookID, $title, $ISBN, $pages, $edition, $year, $publisher, $status);
				$stmt->execute();

				echo '<table class="browse-table" style="margin:50px auto;">';
				echo '<tr> <b> <th>BookID</th> <th>Title</th> <th>ISBN</th> <th>Pages</th> <th>Edition</th> <th>Year</th> <th>Publisher</th> <th>Status</th> </b> </tr>';
				while ($stmt->fetch()) {
					echo "<tr>";
					echo "<td> $bookID </td> <td> $title </td><td> $ISBN </td><td> $pages </td><td> $edition </td><td> $year </td><td> $publisher </td><td> $status </td>";
					echo "</tr>";
				}
				echo "</table>";

				$stmt->close();
				// close connection
				$db->close();
			?>

	</div>

</div>



		<div class="push"></div>
</div>


<?php
  include 'include/footer.php'; ?>
</body>

</html>
