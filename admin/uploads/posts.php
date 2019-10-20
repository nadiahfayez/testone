<?php  include ("../../admin/inc/header.php");   ?>
<?php  include ("../../admin/inc/navbar.php");   ?>  
<?php  include ("../../admin/inc/functions.php");   ?>
<?php  include ("../../admin/inc/connect.php");   ?>



<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2">


			<?php include ("../../admin/inc/sidebar.php"); ?>

		</div>
		<div class="col-sm">
		<div class="posts">

<h4>Posts</h4>
<div class="table-responsive">
<table class="table table-hover table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">datatime</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Image</th>
      <th scope="col">Author</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php 
$number = 0;


foreach(get_posts() as $post) { $number++; ?>









    <tr>
      <th scope="row"><?php echo $number ?></th>
      <td><?php echo $post['datatime']; ?></td>


 <td class="title"> 

<?php 
if(strlen($post['title']) > 100){

echo substr($post['title'], 0,100). "...";

}
else{
	echo $post['title'];
}

?>
     </td>




      <td>
<?php 
if(strlen($post['content']) > 250){

echo substr($post['content'], 0,100). "...";

}
else{
	echo $post['content'];
}

?></td>




      <td>
      <?php if(! empty($post['image'])) { ?>

     
      	<img alt="Post Banner" width="100" src="uploads/posts/<?php echo ["image"]; ?>">
      		
 <?php } else {
 	echo "NO image";
 }

?>


      	</td>
      <td><?php echo $post['author']; ?></td>


       <td class="action-links"><a class="btn btn-primary btn-sm" href="">Edit</a>
<form action="deletepost.php" method="">
<input class="btn btn-danger btn-sm" type="submit" value="Delete" name="deletepost">
</form>
       </td>



    </tr>

<?php } ?>









  </tbody>
</table>
<a class="btn btn-info" style="float: right;" href="post.php">Add New Post</a>
</div>



			
		</div>
		
		</div>	


	</div>
</div>




<?php include ("../../admin/inc/footer.php"); ?>