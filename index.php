<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
	<title>My Blog</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" href="http://code.jquery.com/jquery-1.5.min.js"></script>
</head>
<style type="text/css">
	
	.menu{
		/*height: 40px;*/
		line-height: 40px;
	}
	.menu .navi{
		margin: 0;
		padding:0px;
	}
	.menu .navi li{
		display: inline;
		list-style-type: none;
		margin-right: 10px;
		font-size: 20px;
		text-decoration: none;

	}
	.navi li a{
		text-decoration: none;
		margin-right: 50px;
	}
	.maincontent{
		clear:both;
		margin-top: 5px;
		font-size: 25px;
		margin-top: 20px;
		background-color:rgba(100,100,255,0.4); 

	}
	.header{
		height: 80px;
		line-height: 80px;
	}
	.container .header h1{
		font-size: 45px;
		margin: 0px;
	}


</style>
<body>
<?php 
 session_start();
if (!isset($_SESSION['user_id'])) {
	header('location:login.php');
	exit();
}
include ('conn.php');
$post_count= $conn->query("SELECT * from posts");
$comment_count= $conn->query("SELECT* from comments");  
if (isset($_POST['submit'])) {
	$newCategory=$_POST['newCategory'];
	if(!empty($newCategory)){
		$sql="INSERT INTO category (category) values ('$newCategory')";
		$query=$conn->query($sql);
		if ($query) {
			# code...
			echo "new category added";
		}
		else{
			echo "error";
		}
	}
	else{
		echo "Missing NewCategory";
	}
}
 ?>
<div class="container">
<div class="header">
   		<div class="contact">
   			<!-- <p id="left">+2547699879</p>
   			<p id="right">myblog2@gmail.com</p> -->
   		</div>
   		<div class="head">
   			<p><h3>My Blog</h3></p>
   			<!-- <input type="text" name="search" placeholder="Search"></p> -->
   			<div class="form">
   			
   			</div>
   			<div class="menu">
   				<ul class="navi" >
   				
	 		<li><a href="one.php">Home</a></li>
	 		<li><a href="newpost.php">Create new post</a></li>
	 		<li><a href="delete.php">Delete</a></li>
	 		<li><a href="logout.php ">log Out</a></li>
	 		<li><a href="user.php" > Blog Home Page</a></li>
	 	</ul>
   		
   		</div>

	</div>
	 	
	 <div class="maincontent">
	 	<table>
	 		<tr>
	 			<td>Total Blog Post</td>
	 			<td><?php  echo $post_count->num_rows ?></td>
	 		</tr>
	 		<tr>
	 			<td>Total Comments</td>
	 			<td><?php echo $comment_count->num_rows  ?></td>
	 		</tr>
	 	</table>
	 	<div class="category">
	 		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	 			<label for="category"> Add New Category</label>
	 			<input type="text" name="newCategory">
	 			<input type="submit" name="submit" value="submit">
	 		</form>
	 	</div>
	 </div>
</div>	
  
</body>
</html>  