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

    //获取场馆
    $sqlv = "SELECT * FROM `saveVenue` WHERE uid = '".$current_uid."'";
    $conn->query("set names 'utf8'");
    $venues = $conn->query($sqlv);

    //获取演员
    $sqla = "SELECT * FROM `saveActor` WHERE uid = '".$current_uid."'";
    $conn->query("set names 'utf8'");
    $actors = $conn->query($sqla);
?>

<html lang="en">
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="css/scroll.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/valist.css" />

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
					<li><a href="private_page_1.php">我的关注</a></li>
					<li><a href="#chapter-2" class="selected">我的收藏</a></li>
					<li><a href="private_page_3.php">我的评论</a></li>
					
		            <li><a href="login.html" style="float:right">退出</a></li>
		            <li style="float:right"><a href="private_page_1.php"><?php echo $current_user['user_name']; ?></a></li>
				</ul>
				
				<div class="nav-left"></div>
				<div class="nav-right"></div>
				<div class="nav-above"></div>
			</nav>
		
		</div>

		<section id="chapter-2" style="margin-top: 40px;">
			<section class="tabs">
	            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		        <label for="tab-1" class="tab-label-1">场馆</label>
		
	            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		        <label for="tab-2" class="tab-label-2">演员</label>
            
			    <div class="clear-shadow"></div>
				
		        <div class="content" style="height:700px;">
			        <div class="content-1" style="width:800px; height:700px;">
			        	
			        	<ul style="list-style:none; width:800px;">
			        		<?php 
			        			foreach ($venues as $key => $ven) {
			        				$sql = "SELECT * FROM `Venue` WHERE vid = '".$ven['vid']."'";
						  			$conn->query("set names 'utf8'");
		    						$result = $conn->query($sql);
		    						$venue = $result->fetch_assoc();

			        				echo ('<li style="width:260px; height:170px; float:left;margin-left:10px; padding-right:60px; padding-bottom:50px;">');
			        				echo ('<a href="venue_page_saved.php?vid='.$ven['vid'].'">');
			        				echo ('<img style="width:260px; height:150px;" src="');
			        				echo ($venue['venue_image']);
			        				echo ('" style="width: 260px; height: 150px"> </a> <br/>');
			        				echo ('<a href="venue_page_saved.php?vid='.$ven['vid'].'">');
			        				echo ($venue['venue_name']);
			        				echo ('</a> <br/><br/> </li>');
			        			}
				            ?>
				            
		            	</ul>   

		            </div>

	          
			        <div class="content-2">
		            	
						<ul style="list-style:none; width:800px;">
			        		<?php 
			        			foreach ($actors as $key => $act) {
			        				$sql = "SELECT * FROM `Actor` WHERE aid = '".$act['aid']."'";
						  			$conn->query("set names 'utf8'");
		    						$result = $conn->query($sql);
		    						$actor = $result->fetch_assoc();

			        				echo ('<li style="width:260px; height:170px; float:left;margin-left:10px; padding-right:60px; padding-bottom:50px;">');
			        				echo ('<a href="actor_page_saved.php?aid='.$act['aid'].'">');
			        				echo ('<img style="width:260px; height:170px;" src="');
			        				echo ($actor['actor_image']);
			        				echo ('" style="width: 260px; height: 150px"> </a> <br/>');
			        				echo ('<a href="actor_page_saved.php?aid='.$act['aid'].'">');
			        				echo ($actor['actor_name']);
			        				echo ('</a> <br/><br/> </li>');
			        			}
				            ?>
				            
		            	</ul>   

		            </div>
		       
		        </div>
		    </section>
		</section>
		
 		<footer style="text-align:center;clear:both">
 			<hr />
 			<p>Drama话剧推荐系统</p>
 		</footer>
 	
 	</div>

</body>
</html>