<?php
session_start();

#connect to databse


$page_title = "Products";

 include 'includes/db.php';

 include 'includes/function.php';
 authenticate ();


 include 'includes/header.php';



  if(array_key_exists('add', $_POST)){
	$clean = array_map('trim', $_POST);
  	addCategory($conn,$clean);


  }


   if(array_key_exists('edit', $_POST)){
	$clean = array_map('trim', $_POST);
  	editCategory($conn,$clean);


  }


?>



	<div class="wrapper">
		<div id="stream"><br/><br/>

<p>



<?php 

if(isset($_GET['delete'])){
			
				deleteProduct($conn,$_GET['delete']);
			}

if(isset($_GET['success']))
		{

			echo $_GET['success'];
		}



?>


		</p><br/><br/>

<hr>

		<h3>Available Products</h3>
			<table id="tab">
				<thead>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Price</th>
						<th>Year</th>
						<th>ISBN</th>
						<th>Image</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					
						<?php  $view = viewProducts($conn); echo $view; ?>
						
						
          		</tbody>
			</table>
		</div>
		
		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>
