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



		<div id="mybooks-container">

			<div id="mybooks-top-container">
				<h1>My Books</h1>
			</div>

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

		</div>



	<div class="push"></div>
</div>

<?php
	 include 'footer.php'; ?>

</body>

</html>
