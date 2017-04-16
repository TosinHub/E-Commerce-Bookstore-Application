<?php

require_once('dbconfig.php');

class USER
{	

	protected $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function dbQuery($query)
	{
		$stmt = $this->conn->prepare($query);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($input)
	{
		try
		{
			$result = true;

	 		//INSERT DATA INTO TABLE
	 		$stmt = $this->conn->prepare("SELECT * FROM  users WHERE email = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input['email']);
	 		$stmt->execute();
	 		$count = $stmt->rowCount();	 		
	 		
	 		$row = $stmt->fetch(PDO::FETCH_ASSOC);

	 		if($count !== 1 OR !password_verify($input['password'], $row['hash'])) {

			 $_SESSION['logged'] = false;
         	 $this->redirect('login.php?message=Invalid details');
			
			}else{

					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['session_id'] = rand(000,9999);
					$_SESSION['logged'] = true;
					$_SESSION['username'] = $row['username'];					
					$this->redirect('index.php');

				}
				
			}
		
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
			

		public function is_loggedin()
			{
				if(isset($_SESSION['logged']) == true && $_SESSION['logged'] )
				{
					return true;
				}
			}
			
	public function redirect($url)
			{
				header("Location: $url");
			}
			
			public function doLogout()
			{
				session_destroy();
				unset($_SESSION['user_session']);
				return true;
			}




	function getUsers($id){
				 $stmt = $this->conn->prepare("SELECT * FROM users WHERE user_id = :id ");
				 $stmt->bindParam(":id", $id);
				 $stmt->execute();
				

	 			$row = $stmt->fetch(PDO::FETCH_ASSOC);
	 			return $row;

	 		}


}






?>