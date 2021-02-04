<?php

include 'include/config.php';
include 'include/connect.php';
include 'include/search.php';

?>

  <header>
    <nav>
      <a href="index.php"><img id="logo" src="images/logo3.svg" alt="logo" ></a>
        <a class="<?php echo ($current_page == 'index.php') ? 'active' : 'not-active' ?>" href="index.php">Home</a
        ><a class="<?php echo ($current_page == 'about.php') ? 'active' : 'not-active' ?>" href="about.php">About Us</a
        ><a class="<?php echo ($current_page == 'browse.php') ? 'active' : 'not-active' ?>" href="browse.php">Browse</a
        ><a class="<?php echo ($current_page == 'mybooks.php') ? 'active' : 'not-active' ?>" href="mybooks.php">My Books</a
        ><a class="<?php echo ($current_page == 'contact.php') ? 'active' : 'not-active' ?>" href="contact.php">Contact</a>
    </nav>
  </header>
