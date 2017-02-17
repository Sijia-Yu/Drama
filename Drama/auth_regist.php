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
    $email = $_POST["email"];

	$sql1="SELECT * FROM `User` WHERE `user_mail` = '".$email."'";
	$conn->query("set names utf8");
    $result1 = $conn->query($sql1);

    $sql2="SELECT * FROM `User` WHERE `user_name` = N'".$username."'";
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT * FROM `User` WHERE `user_name` = N'".$username."' and `user_mail` = '".$email."'";
    $result3 = $conn->query($sql3);
    $row = $result3->fetch_assoc();
    $uid = $row["uid"];
    $_SESSION['uid'] = $uid;

    if ($result1->num_rows > 0) {
    	// go to login
    	echo "<script>alert('该邮箱已被注册');location='auth.php';</script>";
	} 
	else if ($result2->num_rows > 0) {
    	// go to login
    	echo "<script>alert('该用户名已被注册');location='auth.php';</script>";
	} 
	else {
		// add to database
	    $sql = "INSERT INTO `User` (user_name, password, user_mail) VALUES (N'$username', '$password', '$email')";
	    if ($conn->query($sql) === TRUE) {
		    echo "<script>alert('注册成功');location='first_page.php';</script>";
		}
	    else {
	    	echo "<script>alert('注册失败');location='auth.php';</script>";
	    }
	}
?>