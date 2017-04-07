 <?php include 'includes/header.php';


  include 'includes/db.php';
   ?>
  <!-- main content starts here -->



  <div class="main">
    <div class="book-display">
      <div class="display-book"></div>
      <div class="info">
        <h2 class="book-title">Eloquent Javascript</h2>
        <h3 class="book-author">by Marijn Haverbeke</h3>
        <h3 class="book-price">$200</h3>

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
        $f = "trending";
        $stmt = $conn->prepare("SELECT * FROM book WHERE flag = :f ");
        $stmt->bindParam(":f", $f);
        $stmt->execute();
        

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

?>
            
            
          <li class="book"><a href="<?php echo "bookpreview.php?book_id=".$row['book_id']; ?>">
          <div class="book-cover" style=" background: url('<?php  echo "admin/".$row['image_path']; ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div></a>
          <div class="book-price"><p><?php echo $row['price'] ?></p></div>
        </li>        
        <?php } ?>

        </ul>
        
    <div class="recently-viewed-books horizontal-book-list">
      <h3 class="header">Recently Viewed</h3>
      <ul class="book-list">
        <div class="scroll-back"></div>
        <div class="scroll-front"></div>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$250</p></div>
        </li>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$50</p></div>
        </li>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$125</p></div>
        </li>
        <li class="book">
          <a href="#"><div class="book-cover"></div></a>
          <div class="book-price"><p>$90</p></div>
        </li>
      </ul>
    </div>
    
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
