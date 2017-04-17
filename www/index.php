 <?php 

 $page_title = "Home";

    include 'includes/header.php';
    

    

    $book = new BOOK ();

     $item = $book->bestSelling();


          if(array_key_exists('cart', $_POST)){

            if(empty($_POST['quantity'])){
                  $msg = "Please enter quantity";
                    $book->redirect('index.php?pmessage='.$msg.'&book_id='.$_POST['book_id']);

                }else{
              

            $clean = array_map('trim', $_POST);
           $book->addCart($clean);
          }
        }
   ?>
  <!-- main content starts here -->



  <div class="main">
    <div class="book-display">
    <h3 class="header">Latest Best Selling Book</h3>
      <div class="display-book" style="background: url('<?php  echo "admin/".$item['image_path']; ?>');background-size: cover;background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php echo $item['title']; ?> </h2>
        <h3 class="book-author"><?php echo $item['author']; ?></h3>
        <h3 class="book-price">$<?php echo $item['price']; ?></h3>
        <form method="post" action='index.php' >

          

           <?php if(isset($_GET['pmessage'])){echo '<strong style="color:#F00">'.$_GET['pmessage']. '</strong>' ; } ?></br>
           <label for="book-amout">Quantity</label> 
          <input type="number" class="book-amount text-field" name="quantity">

          <input type="hidden" name="book_id"  value="<?php echo $item['book_id'] ?>"/>
          <input type="hidden" name="session_id" value="<?php echo $_SESSION['user_session'] ?>" />

           <input type="hidden" name="price"  value="<?php echo $item['price'] ?>"/>

      <input type="hidden" name="image_path" value="<?php echo $item['image_path'] ?>" />

          <input class="def-button add-to-cart" type="submit" name="cart" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="trending-books horizontal-book-list">
      <h3 class="header">Trending</h3>
      <ul class="book-list">
        

<?php 
        echo $book->books("trending")

  ?>

        </ul>
        
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
       <?php 
        
     echo $book->books("rv")
  ?>
      </ul>
    </div>
    
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
