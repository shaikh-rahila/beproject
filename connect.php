<?php
	$Username = $_POST['Username'];
	$Email = $_POST['Email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	$RetypePassword = $_POST['RetypePassword'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Username, Email, phone,  password, RetypePassword) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiss", $Username, $Email, $phone,  $password, $RetypePassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>