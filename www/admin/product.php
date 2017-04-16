<?php
session_start();

#connect to databse


$page_title = "Products";

 include 'includes/header.php';

 include 'includes/db.php';

 include 'includes/function.php';
 authenticate ();








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
					

						<?php 
        $query = "SELECT * FROM book";       
		$products_per_page=5;
		$newquery = $paginate->paging($query,$products_per_page);
		$paginate->dataview($newquery);
				
		?>
						
						
          		</tbody>
			</table>
		</div>
		
		<div class="paginated">
		<?php 	$paginate->paginglink($query,$products_per_page); ?>
		</div>
	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>
