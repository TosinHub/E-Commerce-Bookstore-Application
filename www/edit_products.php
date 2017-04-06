


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


$item = nowBook($conn,$_GET['book_id']);

$cat = newCat($conn, $item['cat_id']);


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



	 	 define('MAX_FILE_SIZE', "2097152");

    #allowed extentions

    $ext = ["image/jpg","image/jpeg","image/png"];

     if(empty($_FILES['pic']['name']))
                  {
            $errors['pic'] = "Please choose a file";


                  }

	if($_FILES['pic']['size'] > MAX_FILE_SIZE)
                  {
                         $errors['pic'] = "File exceeds maximum sixe. Maximum size:" . MAX_FILE_SIZE;
                  }

  #check file type/extention
       if(!in_array($_FILES['pic']['type'], $ext))
                  {

                        $errors['pic'] = "Invalid file type";

                  }
		


    #generate random number to append
                  $rnd = rand(000000000000, 999999999999);

    # strip filename for spaces
                  $strip_name = str_replace("", "_",$_FILES['pic']['name'] );
                  $filename = $rnd.$strip_name;
                  $destination = 'uploads/' .$filename;


        if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination))
                  {

                    $errors['pic'] = "file upload failed";
               }



	 	if(empty($errors)){


	 		$clean = array_map('trim', $_POST);

	 		editProduct($conn,$clean,$destination);


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
		<form id="register"  action ='<?php echo "edit_products.php?book_id=".$_GET['book_id'] ; ?>' method ="POST" enctype="multipart/form-data">
			<div>
			<?php 

			if(isset($errors['title'])){echo '<span class="err">'.$errors['title']. '</span>' ;} ?>
				<label>Title:</label>
				<input type="text" name="title" placeholder="Title" value="<?php echo $item['title']; ?>">
			</div>
			<div>
			<?php if(isset($errors['author'])){echo '<span class="err">'.$errors['author']. '</span>' ;} ?>
				<label>Author</label>	
				<input type="text" name="author" placeholder="Author" value="<?php echo $item['author']; ?>">
			</div>
			<div>
			<?php if(isset($errors['cat'])){	echo '<span class="err">'.$errors['cat']. '</span>' ; } ?>
				<label>Category:</label>
				<select name="cat">

				<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
				<?php $view = getCategory($conn); echo $view; ?>



				</select>
			</div>
			<div>
			<?php if(isset($errors['price'])){	echo '<span class="err">'.$errors['price']. '</span>' ; } ?>
				<label>Price:</label>
				<input type="text" name="price" placeholder="Price" value="<?php echo $item['price']; ?>">
			</div>
 
			<div>
			<?php if(isset($errors['year'])){	echo '<span class="err">'.$errors['year']. '</span>' ; } ?>
				<label>Year:</label>	
				<input type="text" name="year" placeholder="year" value="<?php echo $item['year']; ?>">
			</div>

			<div>
			<?php if(isset($errors['isbn'])){	echo '<span class="err">'.$errors['isbn']. '</span>' ; } ?>
				<label>ISBN:</label>	
				<input type="text" name="isbn" placeholder="ISBN" value="<?php echo $item['isbn']; ?>">
			</div>

			<div>

			<?php if(isset($errors['pic'])){	echo '<span class="err">'.$errors['pic']. '</span>' ; } ?>
			<label>Upload Image:</label>
			<input type="file" name="pic" value="<?php echo $image_path; ?>" />



			</div>
			<input type="hidden" name="book_id" value="<?php echo $item['book_id']; ?>">
			<input type="submit" name="add" value="Add Products">
		</form>

		
	</div>
	</div>

	<?php 



	include 'includes/footer.php' ?>