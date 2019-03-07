<?php 



class User{

	public $id; 
	public $username; 
	public $password; 
	public $firstname; 
	public $lastname; 
	public $date; 





	public static function find_all_users(){

		// global $database;
		// $result_set = $database->query("SELECT * FROM users");
		// return $result_set; 


		return self::find_this_query("SELECT * FROM users");
	}



	public static function find_user_by_id($user_id){

		global $database;
		$the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id ");


		return !empty($the_result_array)? array_shift($the_result_array):false;
		
		// if (!empty($the_result_array)) {
			
		// 	$first_item = array_shift($the_result_array);

		// 	return $first_item;
		// }else{

		// 	return false;
		// }




		return $found_user; 



	}



	public static function find_this_query($sql){

		global $database; 
		$result_set = $database->query($sql);
		$the_object_array= array();

		while ($row = mysqli_fetch_array($result_set)) {
		 	
		 	$the_object_array[] = self::instantation($row);

		 } 

		return $the_object_array; 
	}


	public static function verify_user($username,$password){

		global $database; 

		$username = $database->escape_string($username);
		$password =$database->escape_string($password); 

		$sql = "SELECT * FROM users WHERE";
		$sql.= "username ={$username} ";
		$sql.= "AND password = {$password}";
		$sql.= "LIMIT 1";


		$the_result_array = self::find_this_query($sql);
		return !empty($the_result_array)? array_shift($the_result_array):false;

	}



	public static function instantation($result){


		$user_object = new self; 
		/*
        $user_object->id        = $result['id'];              
        $user_object->username  = $result['username'];              
        $user_object->password  = $result['password'];              
        $user_object->firstname = $result['firstname'];              
        $user_object->lastname  = $result['lastname'];              
        $user_object->date      = $result['date']; */


        foreach ($result as $the_attribute => $value) {
        	if ($user_object->has_the_attribute($the_attribute)) {
        		$user_object->$the_attribute = $value;
        	}
        }

        return $user_object;
	}



	private function has_the_attribute($the_attribute){

		$object_properties = get_object_vars($this);

		return array_key_exists($the_attribute, $object_properties);

	}









}



 ?>