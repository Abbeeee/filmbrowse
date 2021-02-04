<?php

include ('../config.php');
include ('../connect.php');

$title = $_POST['title'];
$ISBN = $_POST['ISBN'];
$pages = $_POST['pages'];
$edition = $_POST['edition'];
$year = $_POST['year'];
$publisher = $_POST['publisher'];

$sql = "INSERT INTO `lab_db`.`book` (`title`, `ISBN`, `pages`, `edition`, `year`, `publisher`)
          VALUES ('$title', '$ISBN', '$pages', '$edition', '$year', '$publisher');";

$result = $db->query($sql);

header("location: ../browse.php?added=true");


?>
