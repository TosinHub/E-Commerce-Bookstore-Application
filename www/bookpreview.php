 <?php 

$page_title =  "Book Preview";
      include 'includes/header.php'; 
  

       $item = $book->bookPreview($_GET['book_id']);



        if(array_key_exists('add', $_POST)){

            if(empty($_POST['preview'])){
                  $msg = "Please type comment";
                    redirect('bookpreview.php?pmessage='.$msg.'&book_id='.$_POST['book_id']);

                }else{
              

            $clean = array_map('trim', $_POST);
            $book->addComment($clean);
          }
        }

        if(array_key_exists('cart', $_POST)){

            if(empty($_POST['quantity'])){
                  $msg = "Please enter quantity";
                    redirect('bookpreview.php?pmessage='.$msg.'&book_id='.$_POST['book_id']);

                }else{
              

            $clean = array_map('trim', $_POST);
           $book->addCart($clean);
          }
        }





   ?>



  <div class="main">
    <p class="global-error">You have not chosen any amount!</p>

 <div class="book-display">
      <div class="display-book" style="background: url('<?php  echo "admin/".$item['image_path']; ?>');background-size: cover;background-position: center; background-repeat: no-repeat;"></div>
      <div class="info">
        <h2 class="book-title"><?php echo $item['title']; ?> </h2>
        <h3 class="book-author"><?php echo $item['author']; ?></h3>
        <h3 class="book-price">$<?php echo $item['price']; ?></h3>



        <form method="post" action='<?php echo "bookpreview.php?book_id=".$_GET['book_id'] ; ?>' >

          

           <?php if(isset($_GET['pmessage'])){echo '<strong style="color:#F00">'.$_GET['pmessage']. '</strong>' ; } ?></br>
           <label for="book-amout">Quantity</label> 
          <input type="number" class="book-amount text-field" name="quantity">

          <input type="hidden" name="book_id"  value="<?php echo $_GET['book_id'] ?>"/>
          <input type="hidden" name="session_id" value="<?php echo $_SESSION['session_id'] ?>" />

           <input type="hidden" name="price"  value="<?php echo $item['price'] ?>"/>

      <input type="hidden" name="image_path" value="<?php echo $item['image_path'] ?>" />

          <input class="def-button add-to-cart" type="submit" name="cart" value="Add to cart">
        </form>
      </div>
    </div>




    <div class="book-reviews">
      <h3 class="header">Reviews</h3>
     <?php  $rowCount = $book->rowCountPreview($_GET['book_id']);
              echo "Total number of reviews: " .$rowCount. " comment(s)"; ?>
      <ul class="review-list">
        <?php  echo $book->preview($_GET['book_id']);
               
         ?>
       
      </ul>


      <div class="add-comment">
 

       
    <?php if($book->is_loggedin()!=""){ ?>

    <h3 class="header">Add your Comment</h3>


    <form  class="comment"  method="post" action='<?php echo "bookpreview.php?book_id=".$_GET['book_id'] ; ?>' style="background-color: #00a6fb">
      <input type="hidden" name="book_id"  value="<?php echo $_GET['book_id'] ?>"/>
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
      
      <?php if(isset($_GET['pmessage'])){echo '<strong style="color:#F00">'.$_GET['pmessage']. '</strong>' ; } ?>
      <textarea class="text-field" name="preview" placeholder="Write Something"></textarea>
      <input class="def-button post-comment" type="submit" name="add" value="Upload Comment" style="color:#F00  ">

    </form>
<?php }

else
{
echo "<button class=\"def-button\" style=\"background-color:#03C;\" > <a href='login.php' style=\"color:#fff \">Please loggin to comment</a></button>";

}

?>






      </div>
    </div>
  </div>
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>

