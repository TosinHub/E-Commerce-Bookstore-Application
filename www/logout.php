<?php 

session_start();
session_destroy();
$logout = "You have logged out, login again";
				header("Location:login.php?message=$logout");