<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dramaSystem";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

	$keyword = $_POST["searchd"];
	
	$sql="SELECT did FROM `Drama` WHERE drama_name = N'".$keyword."'";//N中文匹配
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
   		$row = $result->fetch_assoc();
    	$did = $row["did"];
   		
    	echo "<script>location='drama_page.php?did=".$did."';</script>";
	} 
	else {
		echo "<script>alert('未找到相关话剧');location='first_page.php';</script>";
	}
?>
