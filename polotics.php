<?php

include('conn.php');
$record_count=$conn->query("SELECT body,category_id,posted,post_id,title,user_id FROM posts where category_id='6' ");
$per_page=2;
$pages=ceil($record_count->num_rows/$per_page); 

if (isset($_GET['p']) && is_numeric($_GET['p'])){
	$page=$_GET['p'];

}
else{
	$page = 1;
}
if ($page <= 0) 
	$start = 0;

else
$start = $page * $per_page - $per_page; 
$prev = $page - 1;
$next = $page + 1;
$query=$conn->prepare("SELECT post_id,posted, title, LEFT  (body,100) as  body , category from posts  inner join category ON category.category_id=posts.category_id where posts.category_id='6' ORDER BY post_id DESC limit $start, $per_page");
$query->execute();
$query->bind_result($post_id, $posted,$title,$body,$category);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	.container{
		/*margin: auto;*/
		/*width: 800px; */
	} 
   h4{
      font-family: Arial;
      background-color: rgba(0,200,10,0.6);
      color: white;
   }

</style>
<body>
	
<div  class="container">
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
   					<li><a href="user.php" >Home</a></li>
   					<li><a href="home.php">Blog</a>
   					
		   				<ul class=>
                      <li><a href="polotics.php" >Politics</a></li>
                     <li><a href="business.php" >Business</a></li>
                     <li><a href="lifestyle.php" >Lifestyle</a></li>
                     <li><a href="sports.php" onclick="document.location.href="">Sports</a></li>
                     <li><a href="relationship.php" onclick="document.location.href="">Relationship</a></li>
                     <li><a href="uncategorized.php" onclick="document.location.href="">General</a></li>
                  </ul>
   					</li>
   					<li><a href="contactus.php">Contact Us</a></li>
   				</ul>
   		</div>
   		</div>
   	</div>
      <h4>POLITICS</h4>
	<?php
       while($query->fetch()):
       $lastspace=strrpos($body,' ');
	?>
	<article>  
	<h2><?php echo $title; ?></h2>
	<p><?php echo substr($body,0,$lastspace)."<a href='post.php?id=$post_id'>Read More </a>" ?></p>
	<p>Time posted  :  <?php echo $posted ?></p>
	</article>
	 <?php endwhile; ?>
	 <?php
	 	if ($prev > 0) {
	 	
	 		echo "<a href='home.php?p=$prev'>Prev</a>";

	 	}
	 	if ($page < $pages) {
	 		
	 		echo "<a href='home.php?p=$next'>Next</a>";
	 	}
	 ?>
</div>

</body>
</html>