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

				//hash the password

	 		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("SELECT * FROM  admin WHERE email = ':e' AND hash = ':h' ");

	 		//bind params

	 		$data = [
	 					
	 					':e' => $input['email'],
	 					':h' => $hash,

	 		];
	 		$stmt->execute($data);
	 		
	 	
	 	


	}
		

	function doesEmailExist($dbconn, $email){
			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM admin WHERE ");

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


	function displayError($show){




				echo '<span class="err">'.$show. '</span>' ;
				return true;

	}


			
	


