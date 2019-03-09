<?php 

require_once("config.php");


/**
* 
*/
class Database {

	public $connection;


	function __construct(){

		$this->db_open_connection();
	}




	public function db_open_connection(){

		// $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if ($this->connection->connect_errno) {
			die("Databse connection failed very Badly" . mysqli_error());
		}

	}





	public function query($sql){

		$result=mysqli_query($this->connection, $sql);
	
		return $result;
	}



	private function confirm_query($result){

		if (!$result) {
		die("query failed");
		}
	}



	public function escape_string($string){
		$escaped_string =mysqli_real_escape_string($this->connection, $string);

		return $escaped_string;
	}


	public function the_insert_id(){

		// global $connection;
		return mysqli_insert_id($this->connection);
	}


}

$database= new Database();

// $database->db_open_connection();




 ?>