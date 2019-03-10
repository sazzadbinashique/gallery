<?php 

 class Photo extends Db_object{



	protected static $db_table = "photos";
	protected static $db_table_fields = array('photo_id', 'title', 'description', 'filename', 'type', 'size');

	public $photo_id; 
	public $title; 
	public $description; 
	public $filename; 
	public $type; 
	public $size; 

	public $tmp_path;
	public $upload_directory = "images"; 
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



	// This is passing $_FILES['uploaded_file'] as argument 


	public function set_file($file){

		if (empty($file) || !$file || !is_array($file)) {
			
			$this->errors[] = "There was not file uploaded here."; 
			return false; 

		}elseif ($file['error'] != 0) {

			$this->errors[] = $this->upload_errors_array[$file['error']]; 
		}else{

			$this->filename = basename($file['name']);
			$this->tmp_path = $file['tmp_name'];
			$this->type = $file['type'];
			$this->size = $file['size'];
		}


	}// end set_file method 


	public function pictures_path(){

		return $this->upload_directory. DS . $this->filename;
	}



	public function save(){


		if ($this->photo_id) {
			$this->update();
		}else{

			if (!empty($this->errors)) {
				return false;
			}

			if (empty($this->filename) || empty($this->tmp_path)) {

				$this->errors[] = "The file was not available.";
				return false;				
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename; 

			if (file_exists($target_path)) {
				
				$this->errors[]= "The file {$this->filename} already exists"; 
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














 }// end photos class










 ?>