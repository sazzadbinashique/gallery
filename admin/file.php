<?php 
/*
* This is file system magic constant and some buildin funciton 
*/

echo __FILE__ . "<br>";
echo __LINE__ ."<br>";
echo __DIR__ ."<br>";



echo file_exists(__FILE__)? "yes" : "no";
echo "<br>";

if (file_exists(__FILE__)) {
	echo "yes";
}else{
	echo "no";
}

echo "<br>";
if (is_file(__FILE__)){
	echo "yess";
}else{
	echo "no";
}

if (is_dir(__DIR__)){
	echo "yess";

}else{

	echo "noooooooooooooo! ";
}





 ?>