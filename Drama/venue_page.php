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
	//呈现查询话剧页面
	$vid = $_GET['vid'];
	//$current_uid = $_SESSION['uid'];
	
	$sql="SELECT * FROM `Venue` WHERE vid = '".$vid."'";
	$conn->query("set names 'utf8'");
    $result = $conn->query($sql);
    $venue = $result->fetch_assoc();

    $sqld="SELECT * FROM `showlist` WHERE vid = '".$vid."'";
	$conn->query("set names 'utf8'");
    $dramas = $conn->query($sqld);

?>

<html lang="en">
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="css/scroll.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/button.css" />

	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo-1.4.2-min.js" type="text/javascript"></script>
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
					<li><a href="#chapter-1" class="selected">场馆</a></li>
					<li><a href="#chapter-2">简介</a></li>
					<li><a href="#chapter-3">演出信息</a></li>
				</ul>
				<div class="nav-left"></div>
				<div class="nav-right"></div>
				<div class="nav-above"></div>
			</nav>
		
		</div>

		<section id="chapter-1" style="margin-top: 40px;">
			<div>
		        <h2 style="text-align:center;clear:both"><?php echo $venue['venue_name']; ?></h2>
			</div>

			<form action="venue_save.php" method="post" style="margin:0px; float: right; margin-bottom: 20px;">
				<input type="hidden" name="vid" value=<?php echo $venue['vid']; ?> />
				<input type="submit" name="click" value="❤收藏" />
			</form>

            <hr/>

			<div class="column left">

				<img src="<?php echo($venue['venue_image']);?>"/>
					
			</div><!--end column-->

			<div class="column right" style="margin-top:20px; padding-left:30px;">
			
				<p>【剧场地点】</p>
				<p>位置：<?php echo $venue['venue_location']; ?></p>
					
			</div><!--end column-->
			
			<hr />
			
		</section>
		
		<section id="chapter-2" style="margin-top: 20px;">

			<div>
				<p>【剧场简介】</p>
				<p> <?php echo($venue['venue_text']);?> </p>
			</div>
			
			<hr />
			
		</section>
		
		<section id="chapter-3">
			
			<div>
	            <p>【演出信息】</p>
	            <ul style="list-style:none; width:800px;">
			    	<?php 
				  		foreach ($dramas as $key => $dra) {
				  			$sql = "SELECT * FROM `Drama` WHERE did = '".$dra['did']."'";
				  			$conn->query("set names 'utf8'");
    						$result = $conn->query($sql);
    						$drama = $result->fetch_assoc();

					    	echo('<li style="width:260px; height:150px; float:left;margin-left:50px; padding-right:50px; padding-bottom:60px;">');
					      	echo('<a href="drama_page.php?did='.$dra['did'].'"><img src="');
					      	echo($drama['drama_image']);
					      	echo('""></a><br /><a style="margin-left:10px;" href="drama_page.php?did='.$dra['did'].'">');
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

<script type="text/javascript">
    $(function (){        
        setInterval(function () {
            $('#thinking ul li:last').hide().insertBefore($("#thinking ul li:first")).slideDown(1000);
          }, 6000);
    });
</script>

</body>
</html>