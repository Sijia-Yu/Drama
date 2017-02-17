<?php
	header('Content-type: text/html; charset=UTF-8');
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dramaSystem";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	//获取用户ID
	$current_uid = $_SESSION['uid'];

	//获取用户条目---以获得用户名
	$sqlu = "SELECT user_name FROM `User` WHERE uid = '".$current_uid."'";
	$conn->query("set names utf8");

    $resultu = $conn->query($sqlu);
    $current_user = $resultu->fetch_assoc();

    //获取话剧
    $sqlc = "SELECT * FROM `Follow` WHERE uid = '".$current_uid."'";
    $conn->query("set names 'utf8'");
    $dramas = $conn->query($sqlc);
    
?>

<html lang="en">

<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="css/myscroll.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/button.css" />

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
					<li><a href="#chapter-1" class="selected">我的关注</a></li>
					<li><a href="private_page_2.php">我的收藏</a></li>
					<li><a href="private_page_3.php">我的评论</a></li>
					
		            <li><a href="auth.php" style="float:right">退出</a></li>
		            <li style="float:right"><a href="private_page_1.php"><?php echo $current_user['user_name']; ?></a></li>
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
				  		foreach ($dramas as $key => $dra) {
				  			$sql = "SELECT * FROM `Drama` WHERE did = '".$dra['did']."'";
				  			$conn->query("set names 'utf8'");
    						$result = $conn->query($sql);
    						$drama = $result->fetch_assoc();

					    	echo('<li style="width:260px; height:150px; float:left;margin-left:50px; padding-right:50px; padding-bottom:60px;">');
					      	echo('<a href="drama_page_followed.php?did='.$dra['did'].'"><img style="width:260px; height:150px;" src="');
					      	echo($drama['drama_image']);
					      	echo('""></a><br /><a style="margin-left:10px;" href="drama_page_followed.php?did='.$dra['did'].'">');
					      	echo($drama['drama_name']);
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