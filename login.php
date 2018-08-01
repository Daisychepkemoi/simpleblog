<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	fieldset{
		width: 600px;
		height: 500px;
		background-color: rgba(100,100,255,0.4);

	}
	.container{
		/*width: 600px;*/
		/*height: 500px;*/
	}
</style>
<body>
<?php
session_start();
if (isset($_POST['submit'])) {
		$_username=$_POST['username'];
		$_password=$_POST['password'];
		include("conn.php");
		if (empty($_username)||empty($_password)){
			echo "Missing information";
		}
		else{
			$_username=strip_tags($_username);
			$_username=$conn->real_escape_string($_username);
			$_password=strip_tags($_password);
			$_password=$conn->real_escape_string($_password);
			$_password=md5($_password);
			$query=$conn->query("SELECT user_id ,username from user where username='$_username' and password= '$_password'");
			// echo $query->num_rows;
			if ($query->num_rows===1) {
				while ($row=$query->fetch_object()) {
				 $_SESSION['user_id']=$row->user_id;
				

				}
				 header("location:index.php");
				 exit();
			}
			else{
				echo "Missing information";
			}
		}

     }
?>
 <div class="container">
 <div class="header">
   		<div class="contact">
   			<p id="left">+2547699879</p>
   			<p id="right">myblog2@gmail.com</p>
   		</div>
   		<div class="head">
   			<p><h3>My Blog</h3></p>
   			<!-- <input type="text" name="search" placeholder="Search"></p> -->
   			<div class="form">
   			
   			</div>
   			<div class="menu">
   				<ul class="nav" >
   					<li><a href="" active >Home</a></li>
   					<li><a href="">Blog</a>
   					<ul class=>
   						 <!-- <li><a href="" onclick="document.location.href="">Politics</a></li>
   						<li><a href="" onclick="document.location.href="">Business</a></li>
   						<li><a href="" onclick="document.location.href="">Lifestyle</a></li>
   						<li><a href="" onclick="document.location.href="">Politics</a></li>
   					 --></ul>
		   				
   					</li>
   					<li><a href="">Contact Us</a></li>
   				</ul>
   		</div>
   		</div>
 
 <fieldset>
   	<form action=""  method="post">
   	    <p>
	   		<label>Username</label>
	   		<input type="text" name="username" >
   	    </p>
   		<p>
	   		<label>Password</label>
	   		<input type="password" name="password" >
   		</p>
   		<p>
   			<input type="submit" name="submit" value="Login">
   		</p>
   	</form>
   	</fieldset>
   </div>
   <div class="">

   </div>


</body>
</html>