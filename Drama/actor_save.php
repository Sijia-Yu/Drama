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

	$aid = $_POST["aid"];
	$current_uid = $_SESSION['uid'];
	

	$sqlf = "SELECT * FROM `saveActor` WHERE `aid` = '".$aid."' and `uid` = '".$current_uid."'";
	$resultf = $conn->query($sqlf);

	if($resultf->num_rows > 0) { //已关注
		echo "<script>alert('已收藏,不可重复收藏');location='actor_page_saved.php?aid=".$aid."';</script>";
	}
	else{
		$sql = "INSERT INTO `saveActor` (uid, aid) VALUES ('$current_uid', '$aid')";
	    if ($conn->query($sql) == TRUE) {
		    echo "<script>alert('收藏成功');location='actor_page_saved.php?aid=".$aid."';</script>";
		}
	    else {
	    	echo "<script>alert('收藏失败');location='actor_page.php?vid=".$aid."';</script>";
	    }
	}
?>
