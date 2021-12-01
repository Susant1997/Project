<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$number = $_POST['number'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into admission(firstName, lastName,  email, number, address, gender) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssiss",$firstName, $lastName, $email, $number, $address, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Admission successfully...";
		$stmt->close();
		$conn->close();
	}
?>