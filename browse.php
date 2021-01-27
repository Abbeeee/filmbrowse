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
  include 'header.php'; ?>




  <div id="browse-container">

		<div id="form-container">
			<h1>Browse Books</h1>
			<form id="browse-form">
					<input type="text" placeholder="Title">
					<input type="text" placeholder="Author">
				<input type="submit" value="Search">
			</form>
		</div>

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

	</div>

</div>




		<div class="push"></div>
</div>

<?php
  include 'footer.php'; ?>

</body>

</html>
