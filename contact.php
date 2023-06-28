<?php
var_dump($_POST);
	$full_name= $_POST['full_name'];
	$email= $_POST['email'];
	$password= $_POST['password'];
	$phone= $_POST['phone'];
	$address= $_POST['address'];


	

	// Database connection
	$conn = new mysqli('localhost','root','','pr');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$sql_query = $conn->prepare("INSERT INTO contact (full_name, email, password, phone, address) 
			VALUES(?, ?, ?, ?, ?)");
		$sql_query->bind_param("sssss", $full_name, $email, $password, $phone, $address);
		$execval = $sql_query->execute();
		echo $execval;
		echo "DB Connection Succes";
		var_dump($execval);
		$sql_query->close();
		$conn->close();
		header('contact.html');
	}
?>


