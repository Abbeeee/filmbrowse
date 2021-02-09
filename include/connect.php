<?php

// Set connection query
$db = new mysqli($host, $user, $password, $database);

// Check connection
if ($db -> connect_errno) {
  echo "Failed to connect to database: " . $db -> connect_error;
  exit();
}

?>
