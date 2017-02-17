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

	$username = $_POST["username"];
    $password = $_POST["password"];

	//验证---查询数据库
    $sql="SELECT * FROM `User` WHERE `user_name` = N'".$username."' and `password` = '".$password."'";
    $conn->query("set names utf8");
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uid = $row['uid'];
    $_SESSION['uid'] = $uid;

    if ($result->num_rows > 0) {
	    // go to index.html
	    echo "<script>location='first_page.php';</script>";
	} else {
	    // show tips
	    echo "<script>alert('该用户未注册或登陆密码错误');location='auth.php';</script>";
	}
?>