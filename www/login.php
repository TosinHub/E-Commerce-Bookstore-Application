
<?php 


$page_title = "Login";

 include 'includes/db.php';

 include 'includes/function.php';


 include 'includes/header.php';





 if(array_key_exists('register', $_POST)){
 		#Cache errors
	 	$errors = [];




	 }


	 if(empty($_POST['email'])){

	 			$errors['email'] = "please enter email";

	 	}


	 	 	if(empty($_POST['password'])){

	 			$errors['password'] = "please enter password";


	 		}
	 		if(empty($errors)){


	 		//acess database
	 		$clean = array_map('trim', $_POST);


	 		#register admin

	 		doAdminLogin($conn, $clean);


	 	}






 ?>

<div class="wrapper">
	<h1 id="register-label">Admin Login</h1>
	<hr>
	<form id="register" action ="login.php" method ="POST">
	<div>
	<label>email:</label>
	<input type="text" name="email" placeholder="email">
	</div>
	<div>
	<label>password:</label>
	<input type="password" name="password" placeholder="password">
	</div>
	
	<input type="submit" name="register" value="login">
	</form>
	
	<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>


		<?php include 'includes/footer.php' ?>