<?php

	$fname= $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$phone = $_POST['phone'];
	$institute = $_POST['institute'];
	$gender = $_POST['gender'];
    $email_err = $password_err = $confirm_password_err = "";
	

	// Database connection
	$conn = new mysqli('localhost','root','','pr');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
	 else {
		$stmt = $conn->prepare("select * from reg where email = ?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			//if main already exist
			header( 'Location: http://localhost/e-learn/404.html' );
		} 





	else {
		$sql_query = $conn->prepare("INSERT INTO reg (fname, lname, email, password, confirm_password,phone, institute, gender) 
			VALUES(?, ?, ?, ?, ?, ?, ?,?)");
		$sql_query->bind_param("ssssssss", $fname, $lname, $email,$password, $confirm_password, $phone, $institute, $gender);
		 $sql_query->execute();
		$sql_query->close();

		$sql_query_1 = $conn->prepare("INSERT INTO `login`(`email`, `password`) VALUES (?,?)");
	$sql_query_1->bind_param("ss",$email,$password);
	 $sql_query_1->execute();
	$sql_query_1->close();

		$conn->close();
		header( 'Location: http://localhost/e-learn/login.html' );
	}

}

?>


