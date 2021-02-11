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

				<table class="mybooks-table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Author</th>
							<th class="button-cell">Return</th>
						</tr>
					</thead>

					<tbody>
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

					// Print boodID outside while loop, see below
					$id = '';
					// As long as $result contains any rows, display them in <tr>'s
					while ($row = $result->fetch_assoc()){
					   echo "<tr id='".$row['bookID']."'>";
						 echo "<td><div>".$row['title']."</div></td>";
						 echo "<td><div>".$row['name']."</div></td>";
						 echo "<td class='button-cell'><div>";
						 echo "<form method='POST'>";
						 echo "<button id='".$row['bookID']."' class='update-btn' type='submit' name='status' value='".$row['bookID']."'>Return</button></form>";
						 echo "</div></td>";
						 echo "</tr>";
					};

					// If the Return button has been pressed, SET status to available where bookID matches
					// the row that has been pressed. Get this value from hidden input that recieves the bookID as value
					if (isset($_POST['status'])){
					$id = $_POST['status'];
					echo "<script>document.getElementById('".$id."').className = 'changed';</script>";
					$stmt = $db->prepare("UPDATE book SET status = 'available' WHERE bookID = $id");
					$stmt->execute();
					// Force refresh of page
					// echo "<script type='text/javascript'>location.href = 'mybooks.php';</script>";
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

	<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>
