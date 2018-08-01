
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
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
	height: auto;
	

}
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
		margin: 3px;
		padding:0px;
		width: 750px;
		float: none;
		background-color: white;
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
		background-color: white;

	}
	.menu ul li a{
		text-decoration: none;
		margin-right: 50px;
		text-align: center;
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
	height: 600px;
	background-color: #E0E0E7;
}

</style>
<body>
<?php
session_start();
include('conn.php');
// if (!isset($_SESSION['user_id'])) {
// 	header('location:newpost.php');
// 	exit();
// }
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	
	$title=$conn->real_escape_string($title);
	
	$user_id=$_SESSION['user_id'];
	
	if ($title!=null ) {
		$query=$conn->query("DELETE FROM posts  WHERE title='".$title."' ");
		if ($query) {
			echo "Post deleted";
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
<!--    			<p id="left">+2547699879</p>
   			<p id="right">myblog2@gmail.com</p> -->
   		</div>
   		<div class="head">
   			<p><h3>My Blog</h3></p>
   			<!-- <input type="text" name="search" placeholder="Search"></p> -->
   			<div class="form">
   			
   			</div>
   			<div class="menu">
   				<ul class="nav" >
   				
	 		<li><a href="one.php">Home</a></li>
	 		<li><a href="newpost.php">Create new post</a></li>
	 		<li><a href="delete.php">Delete</a></li>
	 		<li><a href="logout.php ">log Out</a></li>
	 		<li><a href="user.php"> Blog Home Page</a></li>
	 	</ul>
   		
   		</div>

	</div>

<div class="wrapper">
	<div class="content">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<label>Title:</label><input type="text" name="title">
			
			<input type="submit" name="submit" value="Delete Post">
		</form>
	</div>
</div>
</div>
</body>
</html>