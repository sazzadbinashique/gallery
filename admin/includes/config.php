<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '123456');
define('DB_NAME', 'oop_gallery');
	
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	if ($connection) {
	
		echo "ture";
	}

 ?>