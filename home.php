<?php

include('conn.php');
$record_count=$conn->query("SELECT * FROM posts ");
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
$query=$conn->prepare("SELECT post_id,posted, title, LEFT  (body,100) as  body , category from posts inner join category ON category.category_id=posts.category_id  ORDER BY posts.post_id DESC limit $start, $per_page");
$query->execute();
$query->bind_result($post_id,$posted,$title,$body,$category);
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

</style>
<body>
	
<div  class="container">
<div class="header">
   		<div class="contact">
   			<!-- <p id="left">+2547699879</p>
   			<p id="right">myblog2@gmail.com</p> -->
   		</div>
   		<div class="head">
   			<p><h3>My Blog</h3></p>

   			<div class="menu">
   				<ul class="nav" >
   					<li><a href="user.php" >Home</a></li>
   					<li><a href="home.php">Blog</a>
   					<ul class="dropdown">
   						 <li><a href="polotics.php">Politics</a></li>
   						<li><a href="business.php" >Business</a></li>
   						<li><a href="lifestyle.php" >Lifestyle</a></li>
                     <li><a href="sports.php" >Sports</a></li>
                     <li><a href="relationship.php" >Relationship</a></li>
   						<li><a href="uncategorized.php" >General</a></li>
                  </ul>
   					
		   				
   					</li>
   					<li><a href="contactus.php">Contact Us</a></li>
   				 </ul

              

         
   		</div>
   		</div>
   	</div>
	<?php
       while($query->fetch()):
       $lastspace=strrpos($body,' ');
	?>
	<div style="background-color: #D0D0F9; height: 600px;">
	<article style="background-color: #D0D0F9; padding-left: 20px;"> 
   <p style='padding-left: : 20px;'><?php echo "<h3 style=' background-color:rgba(0,255,10,0.6); width:150px; color:white;'>$category </h3>" ?></p> 
	<p style='padding-left: : 20px;'><?php echo substr($body,0,$lastspace)."<a href='post.php?id=$post_id'>Read More </a>" ?></p>
	<p style='padding-left: : 20px;'>Time Posted  :<?php echo $posted ?></p>
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
</div>
</body>
</html>