<?php



include 'Product.php';
class Book extends Product{


private $pagecount;
private $author;


#@override

public function __construct($pg,$title,$price){

		$this->pagecount = $pg;


#call the overidden constructor
		parent::__construct($title,$price);

		$this->type = "book";



}

public function getPageCount(){

return $this->pagecount;


}

public function preview(){
echo "<p>Type:".$this->getType(). "</p>";
echo "<p>Type:".$this->getTitle(). "</p>";
echo "<p>Type:".$this->getPrice(). "</p>";
echo "<p>Type:".$this->getPageCount(). "</p>";

}

}