<?php 


include 'Book.php';



$bk = new Book(3000, "things fall apart", "500");
$book = $bk->getType();
echo $book;




