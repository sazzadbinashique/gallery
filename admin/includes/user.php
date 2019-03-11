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
	public $errors = array();
	public $upload_errors_array = array(

	UPLOAD_ERR_OK			 => "There is no error",
	UPLOAD_ERR_INI_SIZE 	 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
	UPLOAD_ERR_FORM_SIZE 	 => "The uploaded file exceeds the MAX_FILE_SIZE was specified in the HTML form",
	UPLOAD_ERR_PARTIAL       => "The uploaded file was only partially uploaded.",
	UPLOAD_ERR_NO_FILE       => "No file was uploaded.",
	UPLOAD_ERR_NO_TMP_DIR    => "Missing a temporary folder.",
	UPLOAD_ERR_CANT_WRITE    => "Failed to write file to disk.",
	UPLOAD_ERR_EXTENSION     => "A PHP extension stopped the file upload.",


	 );





	public function set_file($file){

		if (empty($file) || !$file || !is_array($file)) {
			
			$this->errors[] = "There was not file uploaded here."; 
			return false; 

		}elseif ($file['error'] != 0) {

			$this->errors[] = $this->upload_errors_array[$file['error']]; 
		}else{

			$this->user_image = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
		}


	}// end set_file method 





	public function save_user_and_image(){


		if ($this->id) {
			$this->update();
		}else{

			if (!empty($this->errors)) {
				return false;
			}

			if (empty($this->user_image) || empty($this->tmp_path)) {

				$this->errors[] = "The file was not available.";
				return false;				
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image; 

			if (file_exists($target_path)) {
				
				$this->errors[]= "The file {$this->user_image} already exists"; 
				return false ;
			}

			if (move_uploaded_file($this->tmp_path, $target_path)) {
				
				if ($this->create()) {
					unset($this->tmp_path); 
					return true;
				}else{
					$this->errors[] = "This file directory probably does not have permission";
					return false;
				}

			}
		}

	}// end save method






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