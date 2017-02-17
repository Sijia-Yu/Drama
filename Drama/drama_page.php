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

	//获取话剧页面id
	$did = $_GET['did'];
	//获取当前用户id
	$current_uid = $_SESSION['uid'];
	
	$sql="SELECT * FROM `Drama` WHERE did = '".$did."'";
	$conn->query("set names 'utf8'");
    $result = $conn->query($sql);
    $drama = $result->fetch_assoc();

    //呈现话剧评论
    $sqlc = "SELECT * FROM `Comment` WHERE did = '".$did."'";
    $conn->query("set names 'utf8'");
    $comments = $conn->query($sqlc);
    
    //添加评论
    $com_text = $_POST["addcomment"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
   		if (empty($_POST["name"])) {

			$sql = "INSERT INTO `Comment` (comment_text, uid, did) VALUES (N'$com_text', '$current_uid', '$did')";
		    if ($conn->query($sql) === TRUE) {
			    echo "<script>alert('评论添加成功');location='drama_page.php?did=".$did."';</script>";
			}
		    else {
		    	echo "<script>alert('评论添加失败');location='drama_page.php?did=".$did."';</script>";
		    }
		}
	}	
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
			 
					<li><a href="#chapter-1" class="selected">剧照</a></li>
					<li><a href="#chapter-2">话剧简介</a></li>
					<li><a href="#chapter-3">话剧评论</a></li>

				</ul>
				
				<div class="nav-left"></div>
				<div class="nav-right"></div>
				<div class="nav-above"></div>
			 
			</nav>
		
		</div>

		<section id="chapter-1" style="margin-top: 40px;">
			<div>
		        <h2 style="text-align:center;clear:both"><?php echo($drama['drama_name']);?></h2>
			</div>

			<form action="drama_follow.php" method="post" style="margin:0px; float: right; margin-bottom: 20px;">
				<input type="hidden" name="did" value=<?php echo $did; ?> />
				<input type="submit" name="click" value="+关注" />
			</form>

            <hr/>

            <p style="text-align:center">
				<img src="<?php echo($drama['drama_image']);?>"/>
			</P>
			
			<hr />
			
		</section>
		
		<section id="chapter-2" style="margin-top: 10px;">

			<div>
				<p>【话剧简介】</p>
				<p> <?php echo($drama['drama_text']);?> </p>
			</div>
			
			<hr />

			<div class="column left">
					
				<p>【演出时间】</p>
				<p>⊙<?php echo($drama['time']);?></p>
					
			</div><!--end column-->

			<div class="column right">
			
				<p>【演出地点】</p>
				<p>⊙<?php echo($drama['drama_location']);?></p>
					
			</div><!--end column-->
			
			<hr />
			
		</section>
		
		<section id="chapter-3">
			<div class="column left">
	            <div id="thinking" class=" mb40 fl p10" style="margin-top: 30px; margin-left: 0px;height:390px; width:560px; margin-right:0px">
				  	<div id="thingk_title" class="bg_all mb20">
					  	<a href="#" title="评论区" class="fr gray noline " target="_blank"></a>
				  	</div>
				  
				  	<ul id="list_thinking" >
				  		<?php 
					  		foreach ($comments as $key => $com) {
					  			$sqlu = "SELECT * FROM `User` WHERE uid = '".$com['uid']."'";
								$conn->query("set names 'utf8'");
								$resultu = $conn->query($sqlu);
								$u = $resultu->fetch_assoc();

								//echo('<ul id="list_thinking" >');
						    	echo('<li><a href="" target="_blank" ><img width="48" height="48" id="face_4920841" class="pic_border pf fl lazy_img"  src="images/avator.png"/></a>');
						      	echo('<span class="txt_thinking fr digest" style="width:450px;">');
						        echo($com['comment_text'].'<br/></span>');
						        echo('<div class="txt_from"><span><a href="#" target="_blank">');		
						      	echo($com['time'].'</a></span> 来自 <a href="#" class="noline" target="_blank">');	
						      	echo($u['user_name']);	
						        echo('</a> </div> </li>');
					    	} 
				    	?>
			    	</ul>
				</div>
				<!--end: thinking-->
			</div><!--end column-->

			<div class="column right">
				<div id="comment" style="margin-top: 30px; height:410px; width:230px; margin-right:0px; float:right;">
					
					<form method="post">
							<textarea name="addcomment" id="addcomment"  placeholder="请输入..." style="width:230px;height:415px;border:3px #666666 solid;"></textarea>
						<br />
						<br />
						<p > 
                            <input type="submit" value="发表评论" style="color:#fff;float:right;font-size:24px;" href="#" class="Button blueButton"/> 
                        </p>
					</form>		
				</div>
			</div><!--end column-->

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