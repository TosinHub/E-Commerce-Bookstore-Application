<?php

require_once('dbconfig.php');
require_once('class.user.php');

class BOOK extends USER
	{	
			protected $book_id;
			protected $title;
			protected $author;
			protected $isbn;
			protected $image_path;


			function books($flag)

				{
		      
		        $stmt = $this->conn->prepare("SELECT * FROM book WHERE flag = :f ");
		        $stmt->bindParam(":f", $flag);
		        $stmt->execute();
		        $result = "";
		        

		      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		      	$this->book_id = $row['book_id'];
		      	$this->price = $row['price'];
		      	$this->image_path = $row['image_path'];

		            
		          $result .= "<li class='book'><a href='bookpreview.php?book_id=$this->book_id'>";
		         $result .= "<div class='book-cover' style=' background: url(\"admin/$this->image_path\");
		         			 background-size: cover; background-position: center; background-repeat: no-repeat;'>
		         			 </div></a> <div class='book-price'><p>$".$this->price."</p></div></li>";        

		        } 


		        return $result;


			}


			function bestSelling()
					{		 


					$stmt = $this->conn->prepare("SELECT * FROM book WHERE flag = 'best selling' ORDER BY book_id DESC LIMIT 0,1 ");
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
			 		return $row;

			 		}


			function bookPreview($id){
				 $stmt = $this->conn->prepare("SELECT * FROM book WHERE book_id = :id ");
				 $stmt->bindParam(":id", $id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		} 		


			function preview($id){
	        
		        $stmt = $this->conn->prepare("SELECT * FROM preview WHERE book_id = :f ");
		        $stmt->bindParam(":f", $id);
		        $stmt->execute();


		        $result = "";
		        

		      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		      	$preview = $row['r'];
		      	$date = $row['date'];

		      	$get = $this->getUsers($row['user_id']);
		      	$username = $get['username'];



		      
		      $result .=	"<li class=\"review\"><div class=\"avatar-def user-image\"><h4 class=\"user-init\">jm</h4></div>
		          <div class=\"info\">
		            <h4 class=\"username\">$username</h4>
		            <p style=\"color:#39F;\">$preview</p>
		            <p style=\"color:#900\">$date</p>
		          </div>
		        </li>"; 
		         


		        } 


		        return $result;

			}


		function rowCountPreview($id){

			 $stmt = $this->conn->prepare("SELECT count(*) FROM preview WHERE book_id = :f ");
        $stmt->bindParam(":f", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $rowCount = $row[0];
         return $rowCount;


				}



		function addComment($clean){
				$date = date("F j,Y, g:i a");

				
				$stmt = $this->conn->prepare("INSERT INTO preview(book_id,user_id,r,date) VALUES (:c,:u,:r,:d)");

	      //bind params
			    $stmt->bindParam(":c", $clean['book_id']);
			    $stmt->bindParam(":u", $clean['user_id']);
			    $stmt->bindParam(":r", $clean['preview']);
			    $stmt->bindParam(":d", $date);


			   if($stmt->execute()){
			      
			    $msg = "Comment successfully added";
			     $this->redirect('bookpreview.php?pmessage='.$msg.'&book_id='.$clean['book_id']);
			  }

			  else

			     {
			     	$msg = "Comment not added";
			     	$this->redirect('bookpreview.php?pmessage='.$msg.'&book_id='.$clean['book_id']);
			     }



		}


		function addCart($clean){

				
				$stmt = $this->conn->prepare("INSERT INTO cart(book_id,session_id,price,quantity,image_path) VALUES (:c,:u,:r,:q,:i)");

	      //bind params
			    $stmt->bindParam(":c", $clean['book_id']);
			    $stmt->bindParam(":u", $clean['session_id']);
			    $stmt->bindParam(":r", $clean['price']);
			    $stmt->bindParam(":q", $clean['quantity']);
			    $stmt->bindParam(":i", $clean['image_path']);
			    


			   if($stmt->execute()){
			      
			    $msg = "Cart successfully added";
			     $this->redirect('index.php');
			  }

			  else

			     {
			     	$msg = "Cart not added";
			     	$this->redirect('bookpreview.php?pmessage='.$msg.'&book_id='.$clean['book_id']);
			     }



		}



		function getCart($id){
        
        $stmt = $this->conn->prepare("SELECT * FROM cart WHERE session_id = :f ");
        $stmt->bindParam(":f", $id);
        $stmt->execute();


        $result = "";
        

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      	$item = $row['image_path'];

      	$quantity = $row['quantity'];
      	$price = $row['price'];
      	$total = $quantity * $price;
      
      $result .= "<tr><td><div class=\"book-cover\" style=\"  background: url('admin/$item');
 						 background-size: cover;background-position: center; background-repeat: no-repeat;\"></div></td>
          			<td><p class=\"book-price\">$ $price</p></td>
          			<td><p class=\"quantity\">$quantity</p></td>
          			<td><p class=\"total\">$ $total </p></td>
          			<td>
          			<form class=\"update\">
              		<input type=\"number\" class=\"text-field qty\">
              		<input type=\"submit\" class=\"def-button change-qty\" value=\"Change Qty\">
           			</form>
          			</td>
          			<td>
            		<a href class=\"def-button remove-item\">Remove Item</a>
          			</td></tr>";
         


		        } 


		        return $result;


			}


	function countCart($id){

		$stmt = $this->conn->prepare("SELECT count(*) FROM cart WHERE session_id = :f ");
		$stmt->bindParam(":f", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $rowCount = $row[0];
         return $rowCount;

     }






	}



?>