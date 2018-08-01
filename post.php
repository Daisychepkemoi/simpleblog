
			
<?php
// echo $_GET['id'];
if (!isset($_GET['id'])) {
	header('location:home.php');
}
else{
	$id=$_GET['id'];
 
}
include("conn.php");
if(!is_numeric($_GET['id'])){
		header('location:home.php');
	}
	$sql="SELECT title,body  ,posted from posts where post_id='$id'";
	$query=$conn->query($sql);
	// echo $query->num_rows;
	if ($query->num_rows!=1) {
		header('location:home.php');
		exit();
	}
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$name=$_POST['name'];
		$comment=$_POST['comment'];

		if ($email && $name && $comment) {
			$email=$conn->real_escape_string($email);
			$name=$conn->real_escape_string($name);
			$id=$conn->real_escape_string($id);
			$comment=$conn->real_escape_string($comment);
			if($addcomment=$conn->prepare(
				"INSERT into comments(name,post_id,email,comment) values (?,?,?,?)")){
				$addcomment->bind_param('ssss',$name,$id,$email,$comment);
				$addcomment->execute();
				// echo "comment was added";
				}
		}
		else{
			echo "error";
		}
	}

?> 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="">
	.container{
		/*width: 800px;
		padding: 5px;
		margin: auto;*/
	}
	label{
		display: block;
	}
	input{
		background-color: white;
	}
</style>

<script type="text/javascript" src="validate.js"></script>
<body>
 <div class="container">
 <div  class="container">
<div class="header">
   		
   		<div class="head">
   			<p><h3>My Blog</h3></p>
   			
   			<div class="menu">
   				<ul class="nav" >
   					<li><a href="user.php" active >Home</a></li>
   					<li><a href="home.php">Blog</a>
   					<ul class=>
   						 <li><a href="polotics.php" >Politics</a></li>
   						<li><a href="business.php" >Business</a></li>
   						<li><a href="lifestyle.php" >Lifestyle</a></li>
   						<li><a href="polotics.php" >Politics</a></li>
   						<li><a href="relationships.php" >Relationship</a></li>
   						<li><a href="uncategorized.php" >General</a></li>
   					</ul>
		   				
   					</li>
   					<li><a href="">Contact Us</a></li>
   				</ul>
   		</div></div>
		
		<div style=" background-color: rgba(100,100,255,0.4);">
 	<div class="posts" style="padding-top: 20px; ">
 		<?php
 		$row=$query->fetch_object();
 		echo "<h2 style='padding-left:20px'>".$row->title."</h2>";
 		echo "<p style='padding-left:20px;'>".$row->body."</p>";
 		echo "<p style='padding-left:30px;'> Time Posted :".$row->posted."</p>";  

 		?>

 	</div>
 	<div id="add_comments">
 	<fieldset style="background-color:#E6E6F1; width:300px; border-width: 1px;border-radius: 5px; padding: 30px;'">
 	<form action="<?php echo $_SERVER['PHP_SELF']." ?id=$id " ?>" method="post" name="myform" onsubmit="return validate();">
 	<div>
 		<label>Email Address </label><input type="text" name="email" required>
 	</div>
 	<div>
 		<label>Name </label><input type="text" name="name" required>
 	</div>
 		<div>
 		<label>Comment </label><textarea name="comment" required></textarea>
 	</div>
 	<input type="submit" name="submit" value="Submit">
 	</form>

 		</fieldset>
 	</div>
 	<hr>
 	<h4 style="padding-left: 20px;">Comments</h4>
 	<div class="comments" style="padding-left: 20px;">
 	
 		<?php 
 			$query=$conn->query("SELECT * from comments where post_id='$id' order by comment_id DESC");
 			while ($row=$query->fetch_object()):
 		 ?>
 		<div>
 		    
 			<h5><?php echo $row->name?></h5>
 			<blockquote><?php echo $row->comment ?></blockquote>
 		</div>
 	<?php endwhile;?>
 	</div>
 	</div>
 </div>
</body>
</html>