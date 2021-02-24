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
        ><a class="<?php echo ($current_page == 'contact.php') ? 'active' : 'not-active' ?>" href="contact.php">Contact</a
        ><a class="<?php echo ($current_page == 'gallery.php') ? 'active' : 'not-active' ?>" href="gallery.php">Gallery</a
        ><a class="<?php echo ($current_page == 'login-page.php' || $current_page == 'admin.php' || $current_page == 'user.php') ? 'active' : 'not-active' ?>"
          href="admin.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>

    </nav>
  </header>
