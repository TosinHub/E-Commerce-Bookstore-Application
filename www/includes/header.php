  <?php

        session_start();

        $_SESSION['user_session'] = session_id();
        

        require_once("includes/class.book.php");
        $book = new BOOK ();

        ?>




<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style/styles.css">
    <tittle></tittle>
<body id="home">
  <!-- DO NOT TAMPER WITH CLASS NAMES! -->

  <!-- top bar starts here -->
  <div class="top-bar">
    <div class="top-nav">
      <a href="index.php"><h3 class="brand"><span>T</span>B<span>S</span>S</h3></a>
      <ul class="top-nav-list">
        <li class="top-nav-listItem Home"><a href="index.php">Home</a></li>
        <li class="top-nav-listItem catalogue"><a href="catalogue.php">Catalogue</a></li>



        <?php        

if($book->is_loggedin()!=""){

      echo "<li class=\"top-nav-listItem login\" >Welcome  " .$_SESSION['username']. "</li>";
      echo "<li class='top-nav-listItem login'><a href='logout.php'>Logout</a></li>";

 } else{
                  ?>

                   <li class="top-nav-listItem login"><a href="login.php">Login</a></li>
        <li class="top-nav-listItem register"><a href="registration.php">Register</a></li>

     
        <?php   }?>


        <li class="top-nav-listItem cart">
          <div class="cart-item-indicator">
          <?php 

                 $view = $book->countCart($_SESSION['user_session']);
                echo "<p>$view</p>";

           ?>
           
            
          </div>
          <a href="cart.php">Cart</a>
        </li>
      </ul>
      <form class="search-brainfood">
        <input type="text" class="text-field" placeholder="Search all books">
      </form>
    </div>
  </div>

