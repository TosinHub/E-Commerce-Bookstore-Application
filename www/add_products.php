


<?php

$page_title = "Add Products";

session_start();
$_SESSION['active'] = true;


#connect to databse



#connect to databse
 include 'includes/db.php';

 include 'includes/function.php';


 include 'includes/header.php';



 if(array_key_exists('add', $_POST)){
 		#Cache errors
	 	$errors = [];
	 	#validate first name

	 	if(empty($_POST['title'])){

	 			$errors['title'] = "please enter first name";

	 	}

	 	if(empty($_POST['author'])){

	 			$errors['author'] = "please enter last name";

	 	}

	 	if(empty($_POST['cat'])){

	 			$errors['cat'] = "please enter email";

	 	}


	 	if(empty($_POST['price'])){

	 			$errors['price'] = "please enter password";

	 	}

	 	if(empty($_POST['year'])){

	 			$errors['year'] = "please enter password";

	 	}

	 	if(empty($_POST['isbn'])){

	 			$errors['isbn'] = "please enter password";

	 	}



	 	if(empty($errors)){


	 		$clean = array_map('trim', $_POST);

	 		productUpload($conn,$_FILES,$errors,'pic',$clean);


	 		//acess database
	 		


	 		#register admin

	 		//doAdminRegister($conn, $clean);


	 	}

	 		
}


 	

 	?>





<div class="wrapper">
		<h1 id="register-label">Add Products</h1>
		<hr>
		<form id="register"  action ="add_products.php" method ="POST" enctype="multipart/form-data">
			<div>
			<?php 

			if(isset($errors['title'])){


				echo '<span class="err">'.$errors['title']. '</span>' ;
			
        } ?>
				<label>Title:</label>
				<input type="text" name="title" placeholder="Title">
			</div>
			<div>
			<?php 

			if(isset($errors['author'])){echo '<span class="err">'.$errors['author']. '</span>' ;} ?>
				<label>Author</label>	
				<input type="text" name="author" placeholder="Author">
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
				<input type="text" name="price" placeholder="Price">
			</div>
 
			<div>
			<?php if(isset($errors['year'])){	echo '<span class="err">'.$errors['year']. '</span>' ; } ?>
				<label>Year:</label>	
				<input type="text" name="year" placeholder="year">
			</div>

			<div>
			<?php if(isset($errors['isbn'])){	echo '<span class="err">'.$errors['isbn']. '</span>' ; } ?>
				<label>ISBN:</label>	
				<input type="text" name="isbn" placeholder="ISBN">
			</div>

			<div>
			<label>Upload Image:</label>
			<input type="file" name="pic"/>
			</div>

			<input type="submit" name="add" value="Add Products">
		</form>

		
	</div>

	<?php 



	include 'includes/footer.php' ?>