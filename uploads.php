<?php 

if (isset($_POST['submit'])) {
	
// echo "<pre>";
// print_r($_FILES['file_upload']);

// echo "<pre>";





$upload_errors = array(

	UPLOAD_ERR_OK			 => "There is no error",
	UPLOAD_ERR_INI_SIZE 	 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
	UPLOAD_ERR_FORM_SIZE 	 => "The uploaded file exceeds the MAX_FILE_SIZE was specified in the HTML form",
	UPLOAD_ERR_PARTIAL       =>"The uploaded file was only partially uploaded",
	UPLOAD_ERR_NO_FILE       => "No file was uploaded.",
	UPLOAD_ERR_NO_TMP_DIR    =>"Missing a temporary folder. Introduced in PHP 5.0.3",
	UPLOAD_ERR_CANT_WRITE    =>"Failed to write file to disk. Introduced in PHP 5.1.0",
	UPLOAD_ERR_EXTENSION     => "A PHP extension stopped the file upload",


	 );


 $temp_name = $_FILES['file_upload']['tmp_name'];
 $file_name = $_FILES['file_upload']['name'];
 $directory = "uploads"; 


	if (move_uploaded_file($temp_name, $directory. "/" . $file_name)) {
		$the_messsage = "File uploaded Successfully";
	}else{
		
		$the_error = $_FILES['file_upload']['error'];
		$the_messsage = $upload_errors[$the_error];
	}

}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>file uploads</title>
</head>
<body>


	<form action="uploads.php" enctype="multipart/form-data" method="post">

		<h2>
			
			<?php 
				if (!empty($upload_errors)) {
					echo $the_messsage;
				}

			 ?>
		</h2>
		
		<div class="form-group">
			
			<input type="file"  name = "file_upload" class="form-control">
		</div>

		<div class="form-group">
			
			<input type="submit" name="submit" value="Submit">
		</div>
	</form>
	
</body>
</html>