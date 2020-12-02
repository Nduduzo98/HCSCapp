<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$idNo = $_POST['idNo'];
	$cellNo = $_POST['cellNo'];
	$gender = $_POST['gender'];
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];


	//database connection
	$conn = new mysqli('localhost','root','','screenings');
	if ($conn->connect_error) {

		die('connection failed  : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into covid(fname, lname, idNo,cellNo,gender,q1,q2) values(?,?,?,?,?,?,?)");
		$stmt->bind_param("ssiisss",$fname, $lname, $idNo, $cellNo, $gender, $q1 , $q2);
		$stmt->execute();
		echo "Your Covid screening has been sent to the Health care center";
		$stmt->close();
		$conn->close();
	}

?>