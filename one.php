<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>My Blog</title>
<script type="text/javascript" href="http://code.jquery.com/jquery-1.5.min.js"></script>
</head>
<body>
<?php 

// if (!isset($_session['user_id'])) {
	header('location:login.php');
	exit();
// }
// include('conn.php');
// $post_count=$conn->query("select * from posts");
// $comment_count=$conn->query("select* from comments");
 ?>
<div class="container">
	 <div class="menu">
	 	<ul>
	 		<li><a href="one.php">Home</a></li>
	 		<li><a href="newpost.php">Create new post</a></li>
	 		<li><a href="delete.php">Delete</a></li>
	 		<li><a href="logout.php">log Out</a></li>
	 		<li><a href="user.php" onclick=""> Blog Home Page</a></li>
	 	</ul>
	 </div>
	 <div class="maincontent">
	 	<table>
	 		<tr>
	 			<td>Total Blog Post</td>
	 			<td><?php $post_count->num_rows?></td>
	 		</tr>
	 		<tr>
	 			<td>Total Comments</td>
	 			<td><?php $comment_count->num_rows ?></td>
	 		</tr>
	 	</table>
	 </div>
</div>	
  
</body>
</html>