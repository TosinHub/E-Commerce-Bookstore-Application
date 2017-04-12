<?php
		

	function doUserRegister($dbconn, $input){

				//hash the password

	 		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("INSERT INTO users(fname,lname,email,username,hash) VALUES (:fn,:ln,:e,:u,:h)");

	 		//bind params

	 		$data = [
	 					':fn' => $input['fname'],
	 					':ln' => $input['lname'],
	 					':e' => $input['email'],
	 					':u' => $input['username'],
	 					':h' => $hash

	 		];


	 		if($stmt->execute($data)){

	 			redirect ("login.php");
	 		}
	 		

	 	
	 	


	}



	function doUserLogin($dbconn, $input){
 			$result = true;

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("SELECT * FROM  users WHERE email = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input['email']);
	 		$stmt->execute();
	 		$count = $stmt->rowCount();	 		
	 		
	 		$row = $stmt->fetch(PDO::FETCH_ASSOC);

	 		if($count !== 1 OR !password_verify($input['password'], $row['hash'])) {
			$_SESSION['logged'] = false;
			redirect('login.php');
		}

		else
		{	
				$stmt = $dbconn->prepare("UPDATE users SET status = 'online' WHERE email = :e ");         

                $stmt->bindParam(":e", $input['email']);
	 			$stmt->execute();

				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['logged'] = true;
				$_SESSION['username'] = $row['username'];
				redirect('index.php');
		}


	}
															



	 function redirect($loc) {
		header("Location: ".$loc);
	}
		





	
		

	function doesEmailExist($dbconn, $email){
			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM users WHERE email = :e");

			#bind parameter
			$stmt->bindParam(":e", $email);
			$stmt->execute();

			#get number of rolls returned
			$count = $stmt->rowCount();

			if($count > 0){
				$result = true;
			}

			return $result;	
		}


	function displayError($show,$input){

			

				echo '<span class="err">'.$show[$input]. '</span>' ;
				return true;
        }
	


			




	function showCategory($dbconn){
				$stmt = $dbconn->prepare("SELECT * FROM category ");
				 $stmt->execute();
				 $result = "";

	 		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 			$cat_id = $row['cat_id'];
	 			$cat_name = $row['cat_name'];
	 			
	 			 $result .= "<tr>";
	 			  $result .= "<td>" .$cat_id.  "</td>";
	 			   $result .= "<td>" .$cat_name.  "</td>";

	 			 $result .=   "<td><a href='category.php?action=edit&cat_id=$cat_id&cat_name=$cat_name'>edit</a></td>";
					$result .=	 "<td><a href='category.php?act=delete&cat_id=$cat_id'>delete</a></td> ";
	 			     $result .= "</tr>";


	 		}
	  return $result;

	}



	

	function getCategory($dbconn)
	{
			$stmt = $dbconn->prepare("SELECT * FROM category ");
				 $stmt->execute();
				 $result = "";

	 		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 			$cat_id = $row['cat_id'];
	 			$cat_name = $row['cat_name'];

	 			$result .= " <a href='category.php?cat_id=$cat_id'><li class='category'>".$cat_name."</li></a>" ;

	 		}
	 		return $result;
	}




	 		
	 
	function view($dbconn){
				$stmt = $dbconn->prepare("SELECT * FROM book ");
				 $stmt->execute();
				 $result = "";

	 		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 			$book_id = $row['book_id'];
	 			$title = $row['title'];
	 			$author = $row['author'];
	 			$cat_id = $row['cat_id'];
	 			$price = $row['price'];
	 			$year = $row['year'];
	 			$isbn = $row['isbn'];
	 			$image_path = $row['image_path'];
	 			
	 			 $result .= "<tr>";
	 			 $result .= "<td>" .$title.  "</td>";
	 			 $result .= "<td>" .$author.  "</td>";
	 			 $result .= "<td>" .$price.  "</td>";
	 			 $result .= "<td>" .$year.  "</td>";
	 			 $result .= "<td>" .$isbn.  "</td>";
	 			 $result .= "<td><img src='$image_path'  height='100px' width='100px' /></td>";
	 			 $result .=   "<td><a href='edit_products.php?book_id=$book_id'>edit</a></td>";
					$result .=	 "<td><a href='product.php?delete=$book_id'>delete</a></td> ";
	 			     $result .= "</tr>";


	 		}
	  return $result;

	}	
	 	








function Books($dbconn,$book_id){
				 $stmt = $dbconn->prepare("SELECT * FROM book WHERE book_id = :id ");
				 $stmt->bindParam(":id", $book_id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		}


function Users($dbconn,$id){
				 $stmt = $dbconn->prepare("SELECT * FROM users WHERE user_id = :id ");
				 $stmt->bindParam(":id", $id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		}


	function call($dbconn,$flag){
      
        $stmt = $dbconn->prepare("SELECT * FROM book WHERE flag = :f ");
        $stmt->bindParam(":f", $flag);
        $stmt->execute();
        $result = "";
        

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      	$book_id = $row['book_id'];
      	$price = $row['price'];
      	$image_path = $row['image_path'];

            
          $result .= "<li class='book'><a href='bookpreview.php?book_id=$book_id'>";
         $result .= "<div class='book-cover' style=' background: url(\"admin/$image_path\"); background-size: cover; background-position: center; background-repeat: no-repeat;'></div></a> <div class='book-price'><p>$price</p></div>
        </li>";        


        } 


        return $result;


	}


function preview($dbconn,$id){
        
        $stmt = $dbconn->prepare("SELECT * FROM preview WHERE book_id = :f ");
        $stmt->bindParam(":f", $id);
        $stmt->execute();


        $result = "";
        

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      	$preview = $row['r'];
      	$date = $row['date'];

      	$get = Users($dbconn,$row['user_id']);
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
function rowCountPreview($dbconn,$id){

			 $stmt = $dbconn->prepare("SELECT count(*) FROM preview WHERE book_id = :f ");
        $stmt->bindParam(":f", $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $rowCount = $row[0];
         return $rowCount;


}



function bestSelling($dbconn){
				 $stmt = $dbconn->prepare("SELECT * FROM book WHERE flag = 'best selling' ORDER BY book_id DESC LIMIT 0,1  ");
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		}


	function getProduct($dbconn,$id){


		
	}