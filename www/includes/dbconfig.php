<?php 
# test.php sandbox

class Database{
	 private $host = "localhost";
   	 private $db_name = "bookstore";
   	 private $username = "root";
   	 private $password = "papa2657";
     public $conn;

		public function dbConnection(){
			$this->conn = null;

				try{

				#Prepare a PDO instance
		$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

				#set verbose error modes
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);


				}
				catch(PDOException $e){


				  echo $e->getMessage();
				}

		return $this->conn;

	}


}
