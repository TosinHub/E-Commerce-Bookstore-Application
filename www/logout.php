<?php 

session_start();
 include 'includes/db.php';


$stmt = $conn->prepare("UPDATE users SET status = 'offline' WHERE user_id = :e ");         

                $stmt->bindParam(":e", $_SESSION['user_id']);
	 			$stmt->execute();
session_destroy();
$logout = "You have logged out, login again";
				header("Location:login.php?message=$logout");