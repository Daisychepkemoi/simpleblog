<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>bac
<style type="text/css">
	#container{
		width: 800px;
		height: 100px;
		background-color: red;
	}
#container ul{
	list-style: none;
	background-color: blue;

}
#container ul li{
	background-color: rgba(100,25,255,0.9);
	width: 150px;
	border:1px solid white;
	height: 50px;
	line-height: 50px;
	text-align:center;
	float: left;
	color: white;
	font-size: 18px;
	margin-left: 100px;
}
#container ul li a{
	text-decoration: none;
	color: white;
	font-size: 18px;
}
#container ul li:hover{
	background-color: rgba(0,255,100,0.9);

}
#container ul ul{
	display: none;
}
#container ul li:hover >ul{
	display: block;
	margin-top: 0px;
}



.wrapper{
		margin: auto;
		width: 800px;
		background-color: rgba(100,100,255,0.4);
	}
	label{
		display: block;
	}
	
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
		margin-right: 0px;
		font-size: 20px;
		width: 20px;
		text-decoration: none;


	}
	.navi li a{
		text-decoration: none;
		margin-right: 20px;
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




	label{
		display: block;
	}
	.menu{
		/*height: 40px;*/
		line-height: 40px;
	}
	.menu .ul{
		margin: 0;
		padding:0px;
	}
	.menu .ul li{
		display: inline;
		list-style-type: none;
		margin-right: 10px;
		font-size: 20px;
		text-decoration: none;

	}
	.ul li a{
		text-decoration: none;
		margin-right: 50px;
	}






.menu{
		/*height: 40px;*/
		line-height: 40px;
	}
	.menu .navi{
		margin: 0;
		padding:0px;
		width: 750px;
		float: none;
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
<div id="container">
	<ul>
		<li><a href=""> Home</a></li>
		<li><a href="">About</a></li>
		<li><a href=""> blog</a>
		<ul>
			<li>NEWS</li>
			<li>BUsiness </li>
			<li>pOLITICS</li>
			<li>RELATIONSHIPS</li>
		</ul>
		</li>
		
	</ul>
</div>
</body>
</html>