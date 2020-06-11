<?php
    $FullName = $_POST['Full Name'];
	$Gender = $_POST['Gender'];
	$DatefBirth = $_POST['Date of Birth'];
	$MobileNumber = $_POST['Mobile Number'];
	$CourseDegree = $_POST['Course / Degree'];
	$EntryYear = $_POST['Entry Year'];
	$CurrentStatus = $_POST['Current Status'];
	$EmailAddress = $_POST['Email Address'];
	$Password = $_POST['Password'];
	$ConfirmPassword = $_POST['Confirm Password'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','uobkr');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Full Name, Gender, Date of Birth, Mobile Number, Course / Degree, Entry Year, Current Status, Email Address, Password, Confirm Password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $FullName, $Gender, $DatefBirth, $MobileNumber, $CourseDegree, $EntryYear, $CurrentStatus, $EmailAddress, $Password, $ConfirmPassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>