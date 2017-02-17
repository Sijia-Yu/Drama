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
		echo "<script>alert('已收藏,不可重复收藏');location='venue_page_saved.php?vid=".$vid."';</script>";
	}
	else{
		$sql = "INSERT INTO `saveVenue` (uid, vid) VALUES ('$current_uid', '$vid')";
	    if ($conn->query($sql) == TRUE) {
		    echo "<script>alert('收藏成功');location='venue_page_saved.php?vid=".$vid."';</script>";
		}
	    else {
	    	echo "<script>alert('收藏失败');location='venue_page.php?vid=".$vid."';</script>";
	    }
	}
?>
