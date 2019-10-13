<?php

include ("../../admin/inc/header.php");    
 include ("../../admin/inc/navbar.php"); 
 include ("../../admin/inc/functions.php");
 

 ?>




 
 
<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['addpost'])){

$title = filter_input(INPUT_POST,'title', FILTER_SANITIZE_STRING);
$content = filter_input(INPUT_POST,'content', FILTER_SANITIZE_STRING);
$category = filter_input(INPUT_POST,'category', FILTER_SANITIZE_STRING);
$excerpt = filter_input(INPUT_POST,'excerpt', FILTER_SANITIZE_STRING);
$tags = filter_input(INPUT_POST,'tags', FILTER_SANITIZE_STRING);
$author = "Alex"; // temporary Author until creating admins


date_default_timezone_set("Asia/Riyadh");
$datetimeone = date( 'M-D-Y h:m' , time());




$image= $_FILES['image'];

$img_name=$image['name'];

$img_tmp_name=$image['tmp_name'];
$img_size=$image['size'];


$error_msg = "";
if(strlen($title) <100 || strlen($title) > 200 ) {
	$error_msg = "Title must be between 100 and 200";
} else if (strlen($content) <500 || strlen($content) > 1000 ) {
	$error_msg = "Content must be between 500 and 1000";
} else if (! empty($excerpt)) {
	if (strlen($excerpt)<100 || strlen($excerpt) > 500 ) {
	$error_msg = "Excerpt must be between 500 and 1000";
}

}else{
	if(! empty($img_name)){
		$img_extension = explode('.', $img_name)[1];
		$allowed_extension = array('jpg','png','jpeg');
		if (! in_array($img_extension, $allowed_extension)){
			$error_msg = "Allowed Extension are jpg,png,jpeg";
		


		}else if ($img_size > 1000000) {
			$error_msg = "Image size must be less than 1M";
			# code...
		}




	}
}
if (empty($error_msg)){
	//insert data in database
	if(insert_post($datetimeone,$title,$content,$author,$excerpt,$img_name,$category,$tags) ){
		echo "Success";
	}
}


}
}

?>



<script src="resources/js/jquery.js"></script>
<script src="resources/js/popper.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<script src="resources/js/script.js"></script>


 <div class="container-fluid">
 	<div class="row">
 		<div class="col-sm-2">

 			<?php  include ("../../admin/inc/sidebar.php"); ?>




 		</div>
 		<div class="col-sm">
		<div class="post">
		<h3>ADD NEW POST</h3>
		<form action="post.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input class="form-control" type="text" name="title" placeholder="Title" required autocomplete="off">	
			<p class="error title-error">Title Must Be Between 100 And 1000 Characters</p>

			</div>
<div class="form-group">
			<textarea required placeholder="Content" autocomplete="off"    row="6" name="content" class="form-control"></textarea>	
			<p class=" error  content-error">Content Must Be Between 100 And 1000 Characters</p>

			</div>
<div class="form-group">
		<select name="form-control" name="category">
			<?php 
foreach (get_categories() as $category) {
	echo "<option>";
	echo $category['name'];
	echo "</option>";
}

			?>
		</select>
	</div>
	<div class="form-group">
	<input class="form-control" type="text" name="excerpt" autocomplete="off" placeholder="Excerpt (Optional)" >	
<p class="error  excerpt-error">Excerpt Must Be Between 100 And 500 Characters</p>
	</div>
		<div class="form-group">
	<input class="form-control" type="text" name="tags" autocomplete="off" placeholder="Tags" >	

	</div>
	<div class="form-group">

		<input type="file" name="image" class="form-control">

	</div>
	<div>
		<input type="submit" name="addpost" class="btn btn-primary" style="float: right;" value="Addpost" >
	</div>
		</form>	
		</div>
		
		</div>
 	</div>


 </div>

<?php include ("../../admin/inc/footer.php"); ?>