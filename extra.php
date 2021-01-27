





Another way of doing________________________________
<?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);
  if($currect_page == $url){
      echo 'active'; //class name in css
  }
}
?>
<li><a class="<?php active('index.php');?>" href="index.php">Home</a></li>
<li><a class="<?php active('about.php');?>" href="about.php">About Us</a></li>
<li><a class="<?php active('browse.php');?>" href="browse.php">Browse Books</a></li>
<li><a class="<?php active('mybooks.php');?>" href="mybooks.php">My Books</a></li>
<li><a class="<?php active('contact.php');?>" href="contact.php">Contact</a></li>




The lab way of doing________________________________
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
||
<?php
$current_page = end(explode('/', $_SERVER['REQUEST_URI']));
?>
<li><a class="<?php echo ($current_page == 'index.php' || $current_page == '') ? 'active' : ' ' ?>" href="index.php">Home</a></li>
<li><a class="<?php echo ($current_page == 'about.php' || $current_page == '') ? 'active' : ' ' ?>" href="about.php">About Us</a></li>
<li><a class="<?php echo ($current_page == 'browse.php' || $current_page == '') ? 'active' : ' ' ?>" href="browse.php">Browse Books</a></li>
<li><a class="<?php echo ($current_page == 'mybooks.php' || $current_page == '') ? 'active' : ' ' ?>" href="mybooks.php">My Books</a></li>
<li><a class="<?php echo ($current_page == 'contact.php' || $current_page == '') ? 'active' : ' ' ?>" href="contact.php">Contact</a></li>
