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
 		

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("SELECT * FROM  admin WHERE email = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input['email']);
	 		$stmt->execute();
	 		$count = $stmt->rowCount();


	 		if($count == 1){
	 		
	 		$result = $stmt->fetch(PDO::FETCH_ASSOC);

	 		if(password_verify($input['password'],$result['hash'])){	 		

	 			header("Location:dashboard.php");
			}else{

				$login_error = "Invalid Username and/or Password";
				header("Location:login.php?login_error=$login_error");

				}														


	 		}

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
  		header("Location:category.php?success=$success");
	 		}

	}


	function showCategory($dbconn){
				$stmt = $dbconn->prepare("SELECT * FROM category ");
				 $stmt->execute();
				 $result = "";

	 		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 			
	 			 $result .= "<tr>";
	 			  $result .= "<td>" .$row['cat_id'].  "</td>";
	 			   $result .= "<td>" .$row['cat_name'].  "</td>";

	 			 $result .=   "<td><a href='#'>edit</a></td>";
					$result .=	 "<td><a href='#'>delete</a></td> ";
	 			     $result .= "</tr>";


	 		}
	  return $result;







	}
	
