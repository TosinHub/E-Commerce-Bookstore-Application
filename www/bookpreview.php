 <?php 

$page_title =  "Book Preview";
 include 'includes/header.php';


  include 'includes/db.php';

   include 'includes/function.php';
   // echo $_GET['book_id'];
  

  $item = nowBook($conn,$_GET['book_id']);
   ?>



  <div class="main">
    <p class="global-error">You have not chosen any amount!</p>
<!--    <div class="book-display">
      <div class="display-book" style="  background: url('<?php // echo "admin/".$item['image_path']; ?>');background-size: cover;background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php //echo $item['title']; ?> </h2>
        <h3 class="book-author"><?php //echo $item['author']; ?></h3>
        <h3 class="book-price"><?php // echo $item['price']; ?></h3>
        <form>
          <label for="book-amout">Quantity</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div> -->
 <div class="book-display">
      <div class="display-book" style="background: url('<?php  echo "admin/".$item['image_path']; ?>');background-size: cover;background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php echo $item['title']; ?> </h2>
        <h3 class="book-author"><?php echo $item['author']; ?></h3>
        <h3 class="book-price"><?php echo $item['price']; ?></h3>
        <form>
          <label for="book-amout">Quantity</label>
          <input type="number" class="book-amount text-field">
          <input class="def-button add-to-cart" type="submit" name="" value="Add to cart">
        </form>
      </div>
    </div>

    <div class="book-reviews">
      <h3 class="header">Reviews</h3>
      <ul class="review-list">
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">jm</h4>
          </div>
          <div class="info">
            <h4 class="username">Jon Williams</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">AE</h4>
          </div>
          <div class="info">
            <h4 class="username">Abby Essien</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
        <li class="review">
          <div class="avatar-def user-image">
            <h4 class="user-init">SB</h4>
          </div>
          <div class="info">
            <h4 class="username">Sandra Bullock</h4>
            <p class="comment">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </li>
      </ul>
      <div class="add-comment">
        <h3 class="header">Add your comment</h3>
        <form class="comment">
          <textarea class="text-field" placeholder="write something"></textarea>
          <button class="def-button post-comment">Upload comment</button>
        </form>
      </div>
    </div>
  </div>
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>
