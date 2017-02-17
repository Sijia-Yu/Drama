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
		echo "<script>alert('已关注,不可重复关注');location='drama_page_followed.php?did=".$did."';</script>";
	}
	else{
		$sql = "INSERT INTO `Follow` (uid, did) VALUES ('$current_uid', '$did')";
	    if ($conn->query($sql) == TRUE) {
		    echo "<script>alert('关注成功');location='drama_page_followed.php?did=".$did."';</script>";
		}
	    else {
	    	echo "<script>alert('注册失败');location='drama_page.php?did=".$did."';</script>";
	    }
	}
		/*$sql = "INSERT INTO `Follow` (uid, did) VALUES ('$current_uid', '$did')";
	    if ($conn->query($sql) == TRUE) {
		    echo "<script>alert('关注成功');location='drama_page_follow.php?did=".$did."';</script>";
		}
	    else {
	    	echo "<script>alert('注册失败');location='drama_page.php?did=".$did."';</script>";
	    }
	}
	else{
		mysqli_query($conn, "DELETE FROM `Follow` WHERE uid ='".$current_uid."' and did = '".$did."'");
		
		echo "<script>alert('取消关注成功');location='drama_page.php?did=".$did."';</script>";
	}*/
?>
