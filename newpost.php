<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel=s"stylesheet" type="text/css" href="style.css"> -->
</head>
<style type="text/css">
body{
	background-color:antiquewhite;

	margin: auto;
	width: 1000px;
	height: auto;
}
.container{
	background-color: white;
	height: auto;}
.container .header{
	height: 246px;
	/*position: fixed;*/
}


.header .contact{
	height: 50px;
}
#right{
	float: right;
	margin-right: 200px;
}
#left{
	float: left;
	margin-left: 200px;
}
.header .head{
	height: 180px;
	background-color: red;
}
.head p{
	display: inline;
}
.head h3{
	margin-left: 400px;
	/*font-size: 30px;*/
	/*margin-top: 50px;*/
}
.head .form{
	width: 200px;
	height: 70px;
	float: right;
	
}
.form input{
	/*display: block;*/
}
input #submit{
	display: inline;
}
.head .menu{
	height: 60px;
	background-color: ;
	border-radius: 10px;
	margin-top: 100px;
	width: 750px;
	margin-left: 125px;
	margin-right: 125px;
	clear: both;
	
}

/*
.menu{
	*/	/*height: 40px;*/
		/*line-height: 40px;*/
	/*}*/
	.head .menu ul{
		margin: 0;
		padding:0px;
		width: 750px;
		float: none;
	}
 .menu ul li{
		display: inline;
		list-style-type: none;
		color: white;
		margin-right: 10px;
		font-size: 20px;
		width: 200px;
		text-decoration: none;
		text-align: center;

	}
	ul li a{
		text-decoration: none;
		margin-right: 50px;
		text-align: 
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
.wrapper{
	clear: both;
	margin-top: 70px;
	background-color: #E0E0E7;
}

</style>
<body>
<?php
session_start();
include('conn.php');
if (!isset($_SESSION['user_id'])) {
	header('location:newpost.php');
	exit();
}
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	$body=$_POST['body'];
	$category=$_POST['category'];
	$title=$conn->real_escape_string($title);
	$body=$conn->real_escape_string($body);
	$user_id=$_SESSION['user_id'];
	$date=date('Y-m-d G:i:s');
	$body=htmlentities($body);
	if ($title && $body && $category) {
		$query=$conn->query("INSERT into posts(user_id, title, body,category_id,posted) values ('$user_id','$title','$body','$category','$date ')");
		if ($query) {
			echo "Post ad  ed";
		}
		else{
			echo "eror";
		}
	}
	else{
		echo "<h4>Missing data</h4>";
	}
}
?>
<div class="container">
<div class="header">
   		<div class="contact">
   			<!-- <p id="left">+2547699879</p> -->
   			<!-- <p id="right">myblog2@gmail.com</p> -->
   		</div>
   		<div class="head">
   			<p><h3>My Blog</h3></p>
   			<!-- <input type="text" name="search" placeholder="Search"></p> -->
   			<div class="form">
   			
   			</div>
   			<div class="menu">
   				<ul  >
   				
	 		<li><a href="one.php">Home</a></li>
	 		<li><a href="newpost.php">Create new post</a></li>
	 		<li><a href="delete.php">Delete</a></li>
	 		<li><a href="logout.php ">log Out</a></li>
	 		<li><a href="user.php" > Blog Home Page</a></li>
	 	</ul>
   		
   		</div>
   		</div>

	</div>

<div class="wrapper">
	<div class="content" style="float: none;">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<p><label>Title:</label>
			<input type="text" name="title"></p>
			<p><label for="body">Body:</label>
			<textarea name="body" cols=50 rows=10></textarea></p>
			<p><label>Category:</label>
			<select name="category">
				<?php
				   // include('conn.php');
					$query=$conn->query("SELECT * from category");
					while($row=$query->fetch_object()){
						echo "<option value='".$row->category_id."'>".$row->category."</option>" ;
					}
				?>
			</select></p>
			<p><input type="submit" name="submit" value="submit"></p>
		</form>
	</div>
</div>
</div>
</body>
</html>