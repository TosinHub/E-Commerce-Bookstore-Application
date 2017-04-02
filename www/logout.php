<?php 

session_start();
session_destroy();
$logout = "Invalid Username and/or Password";
				header("Location:login.php");