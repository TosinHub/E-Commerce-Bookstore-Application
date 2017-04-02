<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<section>
		<div class="mast">
			<h1>T<span>SSB</span> |

<?php

if(isset($_SESSION['active']) && $_SESSION['active']){

?>
			</h1>
			<nav>
				<ul class="clearfix">
					<li><a href="dashboard.php" class="selected">Dashboard</a></li>
					<li><a href="category.php">Categories</a></li>
					<li><a href="product.php">View Products</a></li>
					<li><a href="add_products.php">Add Products</a></li>
					<li><a href="logout.php">Log Out</a></li>
					
					</li>
				</ul>
			</nav>
		

<?php
}
else{


}
?>

</div>
	</section>