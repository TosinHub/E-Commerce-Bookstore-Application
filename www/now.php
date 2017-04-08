<?php 

  include 'includes/db.php';

if(array_key_exists('add', $_POST)){
		$clean = array_map('trim', $_POST);
$stmt = $conn->prepare("INSERT INTO preview(book_id,user_id,r) VALUES (:c,:u,:r)");

	 		//bind params
			$stmt->bindParam(":c", $clean['book_id']);
			$stmt->bindParam(":u", $clean['user_id']);
			$stmt->bindParam(":r", $clean['preview']);
			$stmt->execute();
			
		}





		?>


		<h3>Add Comment</h3>


		<form  id="register" method="post" action="now.php">
			<input type="text" name="book_id" placeholder="Category Name" />
			<input type="text" name="user_id" placeholder="Category Name" />
			<textarea name="preview"></textarea>
			<input type="submit" name="add" value="Add">

		</form>




/*
if(array_key_exists('comment', $_POST)){
    #Cache errors
    $errors = [];
   


   if(empty($_POST['review'])){

        $errors['email'] = "Please post a comment/review";

    }

      if(empty($errors)){


      //acess database
      $clean = array_map('trim', $_POST);
      now($conn,$clean);
    }

  }



?>

     <!--   <h3 class="header">Add your comment</h3>



        <form class="comment" method="post" action="bookpreview.php">



          <textarea class="text-field" placeholder="write something" name="review"></textarea>

          <input type="hidden" class="text-field" name="book_id" value="<?php //echo $_GET['book_id'] ?>">
          <input type="hidden" class="text-field" name="user_id" value="<?php //echo $_SESSION['user_id']?>">
          <input type="submit" name="comment" value="Comment">
        </form>




