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


			
	


