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

		<div id="form-container">
			<h1>Browse Books</h1>
			<form id="browse-form" action="" method="GET">
					<input type="text" name="title" placeholder="Title">
					<input type="text" name="name" placeholder="Author">
				<input type="submit" value="Search">
			</form>
		</div>


<!-- THE SEARCH FORM -->
		<div class="table-container">
			<table class="browse-table">

				<tr>
					<th>Title</th>
					<th class="button-cell">Reserve</th>
				</tr>
				<?php
					while($row = $result1->fetch()){
					    echo "<tr>";
					    echo "<td> $title </td>";
							echo "<td class='button-cell'><button>Reserve</button></td>";
					    echo "</tr>";
					}
					// ALTERNATIVE B - more code here but less in search.php - also changes needed in search.php
					// while($row = $result->fetch_assoc()){
					//    echo "<tr>";
					//    echo "<td>";
					//		echo $row['title'];
					//		echo "</td>";
					//		echo "<td class='button-cell'><button>Reserve</button></td>";
					//    echo "</tr>";
					// }
				?>
				</table>
			</div>


<!-- THE OLD STATIC FORM
		<div class="table-container">
			<table class="browse-table">
				<tr>
					<th>Title</th>
					<th>Author</th>
					<th class="button-cell">Reserve</th>
				</tr>
				<tr>
					<td>The Fellowship of the Ring</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Reserve</button></td>
				</tr>
				<tr>
					<td>The Two Towers</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Reserve</button></td>
				</tr>
				<tr>
					<td>The Return of the King</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Reserve</button></td>
				</tr>
				<tr>
					<td>The Hobbit</td>
					<td>J.R.R Tolkien</td>
					<td class="button-cell"><button>Reserve</button></td>
			</table>
		</div>
 -->

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
				$stmt->bind_result($bookID, $title, $ISBN, $pages, $edition, $year, $publisher);
				$stmt->execute();

				echo '<table class="browse-table" style="margin:50px auto;">';
				echo '<tr> <b> <th>Title</th> <th>ISBN</th> <th>Pages</th> <th>Edition</th> <th>Year</th> <th>Publisher</th> <th>Reserve</th> </b> </tr>';
				while ($stmt->fetch()) {
					echo "<tr>";
					echo "<td> $title </td><td> $ISBN </td><td> $pages </td><td> $edition </td><td> $year </td><td> $publisher </td><td class='button-cell'><button>Reserve</button></td>";
					echo "</tr>";
				}
				echo "</table>";

				$stmt->close();
			?>

	</div>

</div>



		<div class="push"></div>
</div>

<?php
  include 'include/footer.php'; ?>

</body>

</html>
