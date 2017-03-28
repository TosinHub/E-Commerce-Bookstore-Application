<?php 
# test.php sandbox
define('DBNAME','bookstore');
define('DBUSER','root');
define('DBPASS','papa2657');

$conn = new PDO('mysql:host = localhost;dbname='.DBNAME, DBUSER, DBPASS);



