<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dramaSystem";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT * FROM `Actor`";
	$conn->query("set names 'utf8'");
	$actors = $conn->query($sql);
	//$ven = $venues->fetch_assoc();
	//$venue_num = mysqli_num_rows($venues);
?>

<html lang="en">
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="css/scroll.css" type="text/css" rel="stylesheet" />

	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="js/waypoints.min.js" type="text/javascript"></script>
	<script src="js/navbar2.js" type="text/javascript"></script>


</head>
<body id="home" style="padding-top: 28px; padding-bottom: 28px;">
 
 	<div class="wrapper" style="top:35px;">

		<header>
			<a href="first_page.php"><h1>Drama</h1></a>
		</header>
		
		<div class="nav-container">
			<nav>

				<ul>
					<li><a href="#chapter-1" class="selected">演员列表</a></li>
				</ul>
				
				<div class="nav-left"></div>
				<div class="nav-right"></div>
				<div class="nav-above"></div>

			</nav>
		</div>

		<section id="chapter-1" style="margin-top: 40px;">

            <div>
				<ul style="list-style:none; width:800px;">
					
			    	<?php 
				  		foreach ($actors as $key => $act) {
					    	echo('<li style="width:260px; height:170px; float:left;margin-left:50px; padding-right:50px; padding-bottom:50px;">');
					      	echo('<a href="actor_page.php?aid='.$act['aid'].'"><img style="width:260px; height:170px;" src="');
					      	echo($act['actor_image']);
					      	echo('""></a><br /><a style="margin-left:10px;" href="actor_page.php?aid='.$act['aid'].'">');
					      	echo($act['actor_name']);
					      	echo('</a> </li>');
				    	} 
			    	?>
	            </ul>
	        </div>

		</section>
		
 				
 		<footer style="text-align:center;clear:both">
 			<hr />
 			<p>Drama话剧推荐系统</p>
 		</footer>
 	
 	</div>

</body>
</html>