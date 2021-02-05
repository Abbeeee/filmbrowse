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


<!-- OLD STATIC TABLE
			<table class="mybooks-table">
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th class="button-cell">Return</th>
				</tr>
				<tr>
					<td>The Fellowship of the Ring</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Return</button></td>
				</tr>
				<tr>
					<td>The Two Towers</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Return</button></td>
				</tr>
				<tr>
					<td>The Return of the King</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Return</button></td>
				</tr>
				<tr>
					<td>The Hobbit</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Return</button></td>
			</table>
-->
				<?php

					// Display all books with matching authors on arrive on page
					$query = "SELECT b.*, a.*
					          FROM book b
					          JOIN bookAuthor o
					          ON b.bookID = o.bookID
					          JOIN author a
					          ON a.authorID = o.authorID
										WHERE status = 'unavailable'";

					// Prepare query as above, and save as variable $stmt
					$stmt = $db->prepare($query);
					// Execute query
					$stmt->execute();
					// Get the result of query
					$result = $stmt->get_result();

					// Print out table
					echo '<table class="browse-table" style="margin:50px auto;">';
					echo '<tr> <b> <th>Title</th> <th>Author</th> <th>Return</th> </b> </tr>';

					// As long as $result contains any rows, display them in <tr>'s
					while($row = $result->fetch_assoc()){
					   echo "<tr>";
						 echo "<td>".$row['title']."</td>";
						 echo "<td>".$row['name']."</td>";
						 echo "<td class='button-cell'>";
						 echo "<form method='POST'>";
						 echo "<input style='display:none;' name='id' value='".$row['bookID']."'>";
						 echo "<input type='submit' name='status' value='Return'></form>";
						 echo "</td>";
						 echo "</tr>";
						 if(isset($_POST['status']) || isset($_POST['id'])){
	 						$id = $_POST['id'];
	 						$reserved = mysqli_query($db," UPDATE book SET status ='available' WHERE bookID = $id ");
	 					}
					};

					echo "</table>";



				?>

		</div>



	<div class="push"></div>
</div>

<?php
	 include 'include/footer.php'; ?>

</body>

</html>
