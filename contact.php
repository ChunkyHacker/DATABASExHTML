<?php
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Gender = $_POST['Gender'];
	$Password = $_POST['Password'];
	$Number = $_POST['Number'];

	//DATABASE Connection  
	$conn = new mysqli('localhost','root','','denvier');
	if($conn->connect_error) {
		die('Connection Failed : '.$conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO lists (FirstName, LastName, Gender, Password, Number) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $FirstName, $LastName, $Gender, $Password, $Number);
		$stmt->execute();
		echo "Registration successful.";
		$stmt->close();
		$conn->close();
	}
?>
