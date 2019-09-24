<?php



$dsn="mysql:host=localhost;dbname=zblog";
$username="root";
$password="";
try{
$conn= new PDO($dsn,$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(Exception $e){
	echo "Error:". $e->getMassage();
}









?>
