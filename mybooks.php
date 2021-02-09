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

		<div id="mybooks-container">

			<div id="mybooks-top-container">
				<h1>My Books</h1>
			</div>

				<?php
					// Display all books with matching authors on arrive on page
					$query = "SELECT book.*, author.*
					          FROM book
					          JOIN bookAuthor
					          ON book.bookID = bookAuthor.bookID
					          JOIN author
					          ON author.authorID = bookAuthor.authorID
										WHERE status = 'unavailable'";

					// Prepare query as above, and save as variable $stmt
					$stmt = $db->prepare($query);
					// Execute query
					$stmt->execute();
					// Get the result of query
					$result = $stmt->get_result();

					// Print out table
					echo '<table class="mybooks-table" style="margin:50px auto;">';
					echo '<tr><b><th>Title</th><th>Author</th><th>Return</th></b></tr>';

					// Print boodID outside while loop, see below
					$id = '';
					// As long as $result contains any rows, display them in <tr>'s
					while ($row = $result->fetch_assoc()){
					   echo "<tr>";
						 echo "<td>".$row['title']."</td>";
						 echo "<td>".$row['name']."</td>";
						 echo "<td class='button-cell'>";
						 echo "<form method='POST'>";
						 echo "<button class='update-btn' type='submit' name='status' value='".$row['bookID']."'>Return</button></form>";
						 echo "</td>";
						 echo "</tr>";
					};

					// If the Return button has been pressed, SET status to available where bookID matches
					// the row that has been pressed. Get this value from hidden input that recieves the bookID as value
					if (isset($_POST['status'])){
					$id = $_POST['status'];
					$stmt = $db->prepare("UPDATE book SET status = 'available' WHERE bookID = $id");
					$stmt->execute();
					// Force refresh of page
					// echo "<script type='text/javascript'>location.href = 'mybooks.php';</script>";
					};

					echo "</table>";

					// Print boodID outside while loop
					// print_r($id);

					// free results
					$stmt->free_result();
   				// close statement
   				$stmt->close();
					// close connection
					$db->close();
				?>

		</div>

	<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>
