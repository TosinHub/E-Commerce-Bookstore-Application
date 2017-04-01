<?php
session_start();
$_SESSION['active'] = true;
$_SESSION ['cat_page'] = true;

#connect to databse


$page_title = "Categories";

 include 'includes/db.php';

 include 'includes/function.php';


 include 'includes/header.php';



  if(array_key_exists('add', $_POST)){
	$clean = array_map('trim', $_POST);
  	addCategory($conn,$clean);


  }
?>
<?php 
if(isset($_GET['action'])){

if($_GET['action']= "edit"){

?>
	<form  id="register" method="post" action="category.php">
			<input type="text" name="cat_name" placeholder="Category Name" value="<?php echo $_GET['cat_name']; ?>" />
			<input type="submit" name="edit">

		</form>



<?php
}



}

?>



	<div class="wrapper">
		<div id="stream"><br/><br/>

<p>
<h3>Add Category</h3>
<?php
		if(isset($_GET['success']))
		{

			echo $_GET['success'];
		}
 ?>

		<form  id="register" method="post" action="category.php">
			<input type="text" name="cat_name" placeholder="Category Name" />
			<input type="submit" name="add">

		</form>


		</p><br/><br/>

<hr>

		<h3>Available categories</h3>
			<table id="tab">
				<thead>
					<tr>
						<th>Category Id</th>
						<th>Category Name</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					
						<?php  $view = showCategory($conn); echo $view; ?>
						
						
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
