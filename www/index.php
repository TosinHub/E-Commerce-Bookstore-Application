 <?php 


$page_title = "Home";


include 'includes/header.php';

  include 'includes/db.php';
   include 'includes/function.php';

    

     $item = bestSelling($conn);
   ?>
  <!-- main content starts here -->



  <div class="main">
    <div class="book-display">
    <h3 class="header">Latest Best Selling Book</h3>
      <div class="display-book" style="background: url('<?php  echo "admin/".$item['image_path']; ?>');background-size: cover;background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php echo $item['title']; ?> </h2>
        <h3 class="book-author"><?php echo $item['author']; ?></h3>
        <h3 class="book-price"><?php echo $item['price']; ?></h3>

        <form>
          <label for="book-amout">Amount</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div>
    <div class="trending-books horizontal-book-list">
      <h3 class="header">Trending</h3>
      <ul class="book-list">
        

<?php 
        $view = call($conn,'trending');
        echo $view;

  ?>

        </ul>
        
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
       <?php 
        $bs = call($conn,'best selling');
        echo $bs;

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
