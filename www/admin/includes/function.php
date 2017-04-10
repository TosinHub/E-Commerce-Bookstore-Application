<?php
		

	function doAdminRegister($dbconn, $input){

				//hash the password

	 		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("INSERT INTO admin(fname,lname,email,hash) VALUES (:fn,:ln,:e,:h)");

	 		//bind params

	 		$data = [
	 					':fn' => $input['fname'],
	 					':ln' => $input['lname'],
	 					':e' => $input['email'],
	 					':h' => $hash,

	 		];
	 		$stmt->execute($data);
	 	
	 	


	}



	function doAdminLogin($dbconn, $input){
 			$result = true;

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("SELECT * FROM  admin WHERE email = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input['email']);
	 		$stmt->execute();
	 		$count = $stmt->rowCount();	 		
	 		
	 		$result = $stmt->fetch(PDO::FETCH_ASSOC);

	 		if($count !== 1 OR !password_verify($input['password'], $result['hash'])) {
			$result = false;
		}


		return $result;
	}
															



	 function redirect($loc) {
		header("Location: ".$loc);
	}
		


function fileUpload($files,$error,$pic){


			 define('MAX_FILE_SIZE', "2097152");

    #allowed extentions

    $ext = ["image/jpg","image/jpeg","image/png"];

     if(empty($files[$pic]['name']))
                  {
            $error[$pic] = "Please choose a file";


                  }




                   if($files[$pic]['size'] > MAX_FILE_SIZE)
                  {
                         $error[$pic] = "File exceeds maximum sixe. Maximum size:" . MAX_FILE_SIZE;
                  }

  #check file type/extention
       if(!in_array($files[$pic]['type'], $ext))
                  {

                        $error[$pic] = "Invalid file type";

                  }


    #generate random number to append
                  $rnd = rand(000000000000, 999999999999);

    # strip filename for spaces
                  $strip_name = str_replace("", "_",$_FILES['pic']['name'] );
                  $filename = $rnd.$strip_name;
                  $destination = 'uploads/' .$filename;


        if(!move_uploaded_file($files[$pic]['tmp_name'], $destination))
                  {

                    $error[$pic] = "file upload failed";
                  }

		}
	 		
	 	
	 	


	
		

	function doesEmailExist($dbconn, $email){
			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM admin WHERE  ");

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

			if(isset($show[$input])){


				echo '<span class="err">'.$show[$input]. '</span>' ;
				return true;
        }
	}


			




	function addCategory($dbconn,$input){


			$stmt = $dbconn->prepare("INSERT INTO category(cat_name) VALUES (:c)");

	 		//bind params
			$stmt->bindParam(":c", $input['cat_name']);
			if($stmt->execute()){
			
			$success = "category added";
			redirect("category.php?success=$success");
  		//header("Location:category.php?success=$success");
	 		}

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

	function editCategory($dbconn,$input){

		$stmt = $dbconn->prepare("UPDATE  category SET cat_name = :cn 	WHERE cat_id = :i ");

		$stmt->bindParam(":cn", $input['cat_name']);
		$stmt->bindParam(":i", $input['cat_id']);
		 $stmt->execute();
		 	$success = "category edited!";
  		header("Location:category.php?success=$success");





	}

	function deleteCat($dbconn, $input){


		$stmt = $dbconn->prepare("DELETE FROM  category WHERE cat_id = :i ");

		$stmt->bindParam(":i", $input);
		 $stmt->execute();
		 $success = "category deleted!";
  		redirect("category.php?success=$success");

}
	

	function getCategory($dbconn)
	{
			$stmt = $dbconn->prepare("SELECT * FROM category ");
				 $stmt->execute();
				 $result = "";

	 		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 			$cat_id = $row['cat_id'];
	 			$cat_name = $row['cat_name'];

	 			$result .= "<option value=$cat_id>"  .$cat_name ."</option>";

	 		}
	 		return $result;
	}


function UploadFiles($file, $name, $uploadDir) {
	$data = [];
	$rnd = rand (0000000000,9999999999);

	$strip_name = str_replace ("","",$_FILES['pic']['name']);

	$filename = $rnd.$strip_name;
	$destination = $uploadDir .$filename;

	if (!move_uploaded_file($file[$name]['tmp_name'], $destination)){
		$data[] = false;
	} else {
		$data[] = true;
		$data[] = $destination;
	}

	return $data;
}


function productUpload($dbconn,$input,$destination){
    #generate random number to append
				  $result = true;
                  $stmt = $dbconn->prepare("INSERT INTO book(title,author,cat_id,price,year,isbn,image_path,flag) 
                  	VALUES (:t,:a,:c,:p,:y,:i,:im,:f)");

	 		//bind params

	 			$data = [
	 					':t' => $input['title'],
	 					':a' => $input['author'],
	 					':c' => $input['cat'],
	 					':p' => $input['price'],
	 					':y' => $input['year'],
	 					':i' => $input['isbn'],
	 					':f' => $input['flag'],
	 					':im' => $destination,

	 					

	 					];
	 			if(!$stmt->execute($data)){

	 				$result = false;
	 			}
    				return $result;
                 

		}


	 		
	 
	function viewProducts($dbconn){
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
	 	

	 function deleteProduct($dbconn, $input){


		$stmt = $dbconn->prepare("DELETE FROM  book WHERE book_id = :i ");

		$stmt->bindParam(":i", $input);
		 $stmt->execute();
		 $success = "Product deleted!";
  		header("Location:product.php?success=$success");

}







function editProduct($dbconn,$input,$destination){




                  $stmt = $dbconn->prepare("UPDATE book  
                  	SET title =:t,
                  		author = :a,
                  		cat_id = :c,
                  		price = :p,
                  		year = :y,
                  		isbn =:i,
                  		image_path =:im 



                  	WHERE book_id = :id");

	 		//bind params

	 			$data = [
	 					':t' => $input['title'],
	 					':a' => $input['author'],
	 					':c' => $input['cat'],
	 					':p' => $input['price'],
	 					':y' => $input['year'],
	 					':i' => $input['isbn'],
	 					':id' => $input['book_id'],
	 					':im' => $destination,

	 					];


	 			if($stmt->execute($data)){;

                  $success = "Product Edited";
                  header("Location:product.php?success=$success");

                 }

             else
                 
                {
                   
                		 $success = "Product Edit failed";
                  header("Location:product.php?success=$success");




               }

		


			}


function nowBook($dbconn,$book_id){
				 $stmt = $dbconn->prepare("SELECT * FROM book WHERE book_id = :id ");
				 $stmt->bindParam(":id", $book_id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		}


function newCat($dbconn,$id){
				 $stmt = $dbconn->prepare("SELECT * FROM category WHERE cat_id = :id ");
				 $stmt->bindParam(":id", $id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		}


	 		function authenticate ()
		{

				if(!isset($_SESSION['active']))

				{




					redirect("login.php?message=Please login");

					
				} 


		}


		function rowCount($dbconn,$place){

		$stmt = $dbconn->prepare("SELECT count(*) FROM $place ");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $rowCount = $row[0];
         return $rowCount;


}