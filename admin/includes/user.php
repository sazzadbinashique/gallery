<?php 

class User extends Db_object{

	protected static $db_table = "users";
	protected static $db_table_fields = array( 'id','username', 'password', 'firstname', 'lastname', 'user_image');

	public $id; 
	public $username; 
	public $password; 
	public $firstname; 
	public $lastname; 
	public $user_image;
	public $upload_directory = "images"; 
	public $image_placeholder = "http://placehold.it/400x400&text=image";
	// public $image_placeholder = "http://placehold.it/50x50";


	public function  image_path_and_placeholder(){

		return empty($this->user_image)? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
	}


	public static function verify_user($username, $password){

		global $database; 
		$username = $database->escape_string($username);
		$password =$database->escape_string($password); 

		$sql = "SELECT * FROM " .self::$db_table . " WHERE";
		$sql.= " username ='{$username}' ";
		$sql.= "AND password = '{$password}' ";
		$sql.= "LIMIT 1";

		$the_result_array = self::find_by_query($sql);
		return !empty($the_result_array)? array_shift($the_result_array):false;

	}

	// 	public function user_image_path(){

	// 	return $this->upload_directory. DS . $this->user_image;
	// }



	// public function delete_user(){

	// 	if ($this->delete()) {
	// 		$target_path= SITE_ROOT. DS . 'admin' . DS . $this->user_image_path();
	// 		return unlink($target_path)? true:false;
	// 	}else{
	// 		return false;
	// 	}
	// }




}// user class End ... 



 ?>