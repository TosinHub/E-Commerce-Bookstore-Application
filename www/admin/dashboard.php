<?php
session_start();
$_SESSION['active'] = true;

#connect to databse

 include 'includes/db.php';

 include 'includes/function.php';
 authenticate ();


 include 'includes/header.php';
?>


	<div class="wrapper">
		<div id="stream">
		<h1>Admin Dashboard</h1></br></br>
			<strong>
					
						WEBSITE STATISTICS
						
						
				</strong>
			<table id="tab">
		
				<thead>
					<tr>
						<th></th>
						<th><strong>Number</strong></th>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><strong>Total Number of Categorie</strong></td>
						<td><strong><?php echo rowCount($conn,'category'); ?></strong></td>
						
					</tr>
					<tr>
						<td><strong>Total Number of Producs</strong></td>
						<td><strong><?php echo rowCount($conn,'book'); ?></strong></td>
						
					</tr>
					<tr>
						<td><strong>Total Number of Registers Users</strong></td>
						<td><strong><?php echo rowCount($conn,'users'); ?></strong></td>
						
					</tr>
					<tr>
						<td>Total Number of Orders</td>
						<td></td>
						
					</tr>
          		</tbody>
			</table>
		</div>

	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>
