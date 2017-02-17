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

	$did = $_POST["did"];
	$current_uid = $_SESSION['uid'];
	echo $did;
	echo $current_uid;

	$sqlf = "SELECT * FROM `Follow` WHERE `did` = '".$did."' and `uid` = '".$current_uid."'";
	$resultf = $conn->query($sqlf);

	if($resultf->num_rows > 0) { //已关注
		mysqli_query($conn, "DELETE FROM `Follow` WHERE uid ='".$current_uid."' and did = '".$did."'");
		
		echo "<script>alert('取消关注成功');location='drama_page.php?did=".$did."';</script>";
	}
	else{
	    echo "<script>alert('还未关注该话剧');location='drama_page.php?did=".$did."';</script>";
	}
?>
