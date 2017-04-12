 <?php 

$page_title =  "Book Preview";
 include 'includes/header.php';


  include 'includes/db.php';

   include 'includes/function.php';
   // echo $_GET['book_id'];
  

  $item = Books($conn,$_GET['book_id']);



if(array_key_exists('add', $_POST) AND !empty($_POST['preview'])){
      

    $clean = array_map('trim', $_POST);
    $date = date("F j,Y, g:i a");

$stmt = $conn->prepare("INSERT INTO preview(book_id,user_id,r,date) VALUES (:c,:u,:r,:d)");

      //bind params
      $stmt->bindParam(":c", $clean['book_id']);
      $stmt->bindParam(":u", $clean['user_id']);
      $stmt->bindParam(":r", $clean['preview']);
       $stmt->bindParam(":d", $date);
      $stmt->execute();
      redirect('bookpreview.php?book_id='.$clean['book_id']);
  }

  elseif(empty($_POST['preview'])){

    $error = "Please type comment before uploading";



  }

   ?>



  <div class="main">
    <p class="global-error">You have not chosen any amount!</p>

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
     <?php  $rowCount = rowCountPreview($conn,$_GET['book_id']);
              echo "Total number of reviews: " .$rowCount. " comment(s)"; ?>
      <ul class="review-list">
        <?php   $view = preview($conn,$_GET['book_id']);

              echo $view;
         ?>
       
      </ul>


      <div class="add-comment">
 

       


<?php if(isset($_SESSION['logged']) == true && $_SESSION['logged'] ){ ?>

    <h3 class="header">Add your Comment</h3>


    <form  class="comment"  method="post" action='<?php echo "bookpreview.php?book_id=".$_GET['book_id'] ; ?>' style="background-color: #00a6fb">
      <input type="hidden" name="book_id"  value="<?php echo $_GET['book_id'] ?>"/>
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
      
      <?php if(isset($error)){echo '<strong style="color:#F00">'.$error. '</strong>' ; } ?>
      <textarea class="text-field" name="preview" placeholder="Write Something"></textarea>
      <input class="def-button post-comment" type="submit" name="add" value="Upload Comment" style="color:#F00  ">

    </form>
<?php }else{
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

