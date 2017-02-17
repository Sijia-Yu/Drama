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
	//获取用户ID
	$current_uid = $_SESSION['uid'];

	//获取用户条目---以获得用户名
	$sqlu = "SELECT user_name FROM `User` WHERE uid = '".$current_uid."'";
	$conn->query("set names 'utf8'");
    $resultu = $conn->query($sqlu);
    $current_user = $resultu->fetch_assoc();

    //获取用户评论
    $sqlc = "SELECT * FROM `Comment` WHERE uid = '".$current_uid."'";
    $conn->query("set names 'utf8'");
    $comments = $conn->query($sqlc);
    
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
					<li><a href="private_page_1.php" onclick="showTab1();">我的关注</a></li>
					<li><a href="private_page_2.php" onclick="showTab2()">我的收藏</a></li>
					<li><a href="#chapter-3" class="selected" onclick="showTab3()">我的评论</a></li>
					
		            <li><a href="auth.php" style="float:right">退出</a></li>
		            <li style="float:right"><a href="private_page_1.php"><?php echo($current_user['user_name']); ?></a></li>
				</ul>
				
				<div class="nav-left"></div>
				<div class="nav-right"></div>
				<div class="nav-above"></div>
			</nav>
		
		</div>

		<section id="chapter-3" style="margin-top: 40px;">
			<div style="margin-left: 120px;">
	            <div id="thinking" class=" mb40 fl p10" style="margin-top: 30px; margin-left: 0px; width:560px; margin-right:0px">
				<ul id="list_thinking" >
					<?php
						foreach ($comments as $key => $com) {
				  			$sqld = "SELECT * FROM `Drama` WHERE did = '".$com['did']."'";
							$conn->query("set names 'utf8'");
							$resultd = $conn->query($sqld);
							$d = $resultd->fetch_assoc();
							$did = $d['did'];

							echo('<li> <a href="" target="_blank" ><img width="48" height="48" id="face_4920841" class="pic_border pf fl lazy_img"  src="images/avator.png"/></a>');
					  		echo('<span class="txt_thinking fr digest" style="width:450px;">');
					    	echo($com['comment_text'].'<br/></span>');
					    	echo('<div class="txt_from"><span>');
					    	echo($com['time'].' 话剧</span> <a href="">【');
							echo($d['drama_name']);
							echo('】</a></div></li>');
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