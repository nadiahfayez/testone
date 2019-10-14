<?php

/*Category function*/
function get_categories(){
	include "connect.php";
	$sql="SELECT * FROM  categories";
	try {
$result =$conn->query($sql);
return $result;
	}
	catch(Exception $e){
	echo "Error:". $e->getMassage();
}
}


/*Post Function*/
function insert_post($datetimeone,$title,$content,$author,$excerpt,$img_name,$category,$tags)
{

		$fields = array($datetimeone,$title,$content,$author,$excerpt,$img_name,$category,$tags);
	include "connect.php";

$sql = "INSERT INTO posts (datetime,title,content,author,excerpt,image,category,tags) VALUES(?,?,?,?,?,?,?,?) ";


try{

$result = $conn->prepare($sql);

for($i=1; $i<=8; $i++){
$result->bindValue($i, $fields[$i -1], PDO::PARAM_STR);
}
	
return $result->execute();

}
catch (Exception $e) {
     echo "Error". $e->getMessage();
     return false;
        }
}
?>