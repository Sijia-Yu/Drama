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

	$vid = $_POST["vid"];
	$current_uid = $_SESSION['uid'];
	echo $vid;
	echo $current_uid;

	$sqlf = "SELECT * FROM `saveVenue` WHERE `vid` = '".$vid."' and `uid` = '".$current_uid."'";
	$resultf = $conn->query($sqlf);

	if($resultf->num_rows > 0) { //已关注
		mysqli_query($conn, "DELETE FROM `saveVenue` WHERE uid ='".$current_uid."' and vid = '".$vid."'");
		
		echo "<script>alert('取消收藏成功');location='venue_page.php?vid=".$vid."';</script>";
	}
	else{
	    echo "<script>alert('还未收藏该话剧');location='venue_page.php?vid=".$vid."';</script>";
	}
?>
