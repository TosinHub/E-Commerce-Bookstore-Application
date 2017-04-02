


<?php

$page_title = "Edit Products";

session_start();
$_SESSION['active'] = true;


#connect to databse



#connect to databse
 include 'includes/db.php';

 include 'includes/function.php';


 include 'includes/header.php';

if(isset($_GET['book_id'])){

$book_id = $_GET['book_id'];

				 $stmt = $conn->prepare("SELECT * FROM book WHERE book_id = :id ");
				 $stmt->bindParam(":id", $book_id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			$title = $row['title'];
	 			$author = $row['author'];
	 			$cat_id = $row['cat_id'];
	 			$price = $row['price'];
	 			$year = $row['year'];
	 			$isbn = $row['isbn'];
	 			$image_path = $row['image_path'];


} 

 if(array_key_exists('add', $_POST)){
 		#Cache errors
	 	$errors = [];
	 	#validate first name

	 	if(empty($_POST['title'])){

	 			$errors['title'] = "please enter title";

	 	}

	 	if(empty($_POST['author'])){

	 			$errors['author'] = "please enter author";

	 	}

	 	if(empty($_POST['cat'])){

	 			$errors['cat'] = "please select";

	 	}


	 	if(empty($_POST['price'])){

	 			$errors['price'] = "please enter price";

	 	}

	 	if(empty($_POST['year'])){

	 			$errors['year'] = "please enter year of publication";

	 	}

	 	if(empty($_POST['isbn'])){

	 			$errors['isbn'] = "please enter isbn";

	 	}



	 	if(empty($errors)){


	 		$clean = array_map('trim', $_POST);

	 		editProduct($conn,$_FILES,$errors,'pic',$clean,$book_id);


	 		//acess database
	 		


	 		#register admin

	 		//doAdminRegister($conn, $clean);


	 	}

	 		
}


 	

 	?>





<div class="wrapper">
<div id="stream">
		<h1 id="register-label">Edit Products</h1>
		<hr>
		<form id="register"  action ="edit_products.php" method ="POST" enctype="multipart/form-data">
			<div>
			<?php 

			if(isset($errors['title'])){echo '<span class="err">'.$errors['title']. '</span>' ;} ?>
				<label>Title:</label>
				<input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>">
			</div>
			<div>
			<?php if(isset($errors['author'])){echo '<span class="err">'.$errors['author']. '</span>' ;} ?>
				<label>Author</label>	
				<input type="text" name="author" placeholder="Author" value="<?php echo $author; ?>">
			</div>
			<div>
			<?php if(isset($errors['cat'])){	echo '<span class="err">'.$errors['cat']. '</span>' ; } ?>
				<label>Category:</label>
				<select name="cat">

				<option value="">Select</option>
				<?php $view = getCategory($conn); echo $view; ?>



				</select>
			</div>
			<div>
			<?php if(isset($errors['price'])){	echo '<span class="err">'.$errors['price']. '</span>' ; } ?>
				<label>Price:</label>
				<input type="text" name="price" placeholder="Price" value="<?php echo $price; ?>">
			</div>
 
			<div>
			<?php if(isset($errors['year'])){	echo '<span class="err">'.$errors['year']. '</span>' ; } ?>
				<label>Year:</label>	
				<input type="text" name="year" placeholder="year" value="<?php echo $year; ?>">
			</div>

			<div>
			<?php if(isset($errors['isbn'])){	echo '<span class="err">'.$errors['isbn']. '</span>' ; } ?>
				<label>ISBN:</label>	
				<input type="text" name="isbn" placeholder="ISBN" value="<?php echo $isbn; ?>">
			</div>

			<div>

			<?php if(isset($errors['pic'])){	echo '<span class="err">'.$errors['pic']. '</span>' ; } ?>
			<label>Upload Image:</label>
			<input type="file" name="pic" value="<?php echo $image_path; ?>" />
			</div>

			<input type="submit" name="add" value="Add Products">
		</form>

		
	</div>
	</div>

	<?php 



	include 'includes/footer.php' ?>