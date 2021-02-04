<?php

include 'config.php';
include 'connect.php';



// IF YOU WANT TO USE ONLY THE EXACT SEARCH PHRASE, USE BELOW
// $sql = "SELECT * FROM book WHERE title ='$title'";
$sql = "SELECT * FROM book";
if ( isset($_GET['title']) ) {
      $title = $_GET['title'];
      $sql = "SELECT * FROM book WHERE title LIKE '%$title%'";
}
$result1 = $db->prepare($sql);
$result1->bind_result($bookID, $title, $ISBN, $pages, $edition, $year, $publisher);
$result1->execute();

// ALTERNATIVE B - instead of 3 rows above - also needs change of while loop in browse.php
// $result = $db->query($sql);


// AUTHOR SEARCH DOES NOT FUCKING WORK FOR SOME FUCKING REASON
// $sql2 = "SELECT * FROM author";
// if ( isset($_GET['name']) ) {
//       $name = $_GET['name'];
//       $sql2 = "SELECT * FROM author WHERE firstName LIKE '%$name%'";
// }
// $result2 = $db->prepare($sql2);
// $result2->bind_result($authorID, $firstName, $lastName);
// $result2->execute();



?>
