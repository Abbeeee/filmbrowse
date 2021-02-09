<?php

// IF YOU WANT TO USE ONLY THE EXACT SEARCH PHRASE, USE BELOW
// $query1 = "SELECT * FROM book WHERE title ='$title'";
// $query1 = "SELECT * FROM book . SELECT * FROM author";

// Display all books with matching authors on arrive on page
$query1 = "SELECT book.*, author.*
          FROM book
          JOIN bookAuthor
          ON book.bookID = bookAuthor.bookID
          JOIN author
          ON author.authorID = bookAuthor.authorID
          WHERE status = 'available'";


  // If any input in search fields, change query1 to display only matching titles
  if (isset($_GET['title']) || isset($_GET['name'])) {
        $title = $_GET['title'];
        $name = $_GET['name'];
        $query1 = "SELECT book.*, author.*
                  FROM book
                  JOIN bookAuthor
                  ON book.bookID = bookAuthor.bookID
                  JOIN author
                  ON author.authorID = bookAuthor.authorID
                  WHERE title LIKE '%$title%' && name LIKE '%$name%' && status = 'available'";
  }

// Prepare query1 as either two above, and save as $stmt
$stmt = $db->prepare($query1);

// Execute query1
$stmt->execute();

// Get the result of query1
$result = $stmt->get_result();


// Test too see items in the array
// while($row = $result->fetch_assoc()){
//     echo $row['title']."<br>";
//  };



// IF YOU WANT TO USE ONLY THE EXACT SEARCH PHRASE, USE BELOW
// $query2 = "SELECT * FROM book WHERE title ='$title'";
// $query2 = "SELECT * FROM author";
//   if ( isset($_GET['firstName']) ) {
//         $firstName = $_GET['firstName'];
//         $query2 = "SELECT * FROM author WHERE firstName LIKE '%$firstName%'";
//   }
// // Prepare query1 as either two above, and save as $stmt
// $stmt2 = $db->prepare($query2);
// // Execute query1
// $stmt2->execute();
// // Get the result of query1
// $result2 = $stmt2->get_result();



// ALTERNATIVE B - instead of 3 rows above - also needs change of while loop in browse.php
// $result = $db->query($sql);



// AUTHOR SEARCH DOES NOT FUCKING WORK
// $sql2 = "SELECT * FROM author";
// if ( isset($_GET['name']) ) {
//       $name = $_GET['name'];
//       $sql2 = "SELECT * FROM author WHERE firstName LIKE '%$name%'";
// }
// $result2 = $db->prepare($sql2);
// $result2->bind_result($authorID, $firstName, $lastName);
// $result2->execute();



?>
