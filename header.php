<?php

include ('config.php');?>

  <header>
    <nav>
      <img id="logo" src="images/logo3.svg" alt="logo">
        <a class="<?php echo ($current_page == 'index.php') ? 'active' : ' ' ?>" href="index.php">Home</a
        ><a class="<?php echo ($current_page == 'about.php') ? 'active' : ' ' ?>" href="about.php">About Us</a
        ><a class="<?php echo ($current_page == 'browse.php') ? 'active' : ' ' ?>" href="browse.php">Browse</a
        ><a class="<?php echo ($current_page == 'mybooks.php') ? 'active' : ' ' ?>" href="mybooks.php">My Books</a
        ><a class="<?php echo ($current_page == 'contact.php') ? 'active' : ' ' ?>" href="contact.php">Contact</a>
    </nav>
  </header>
