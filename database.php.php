<?php
	$firstName = $_POST['firstname'];
    $middleName = $_POST['middlename'];
	$lastName = $_POST['lastname'];
	$companyName= $_POST['companyname'];
	$mobileNo = $_POST['number'];
	$emailId = $_POST['email'];
	$dob = $_POST['date'];
	$pancard = $_POST['panNumber'];
	$pincode = $_POST['PinCode'];
	$district = $_POST['district'];
	$state = $_POST['state'];
	$city = $_POST['City'];
	$address = $_POST['Address'];

	// Database connection
	$conn = new mysqli('localhost','root','','kyc');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, middleName, lastName, companyName, mobileNo, emailId, dob, pancard, pincode, district, state, city, address) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssisiiissss", $firstName, $middleName, $lastName, $companyName, $mobileNo, $emailId, $dob, $pancard, $pincode, $district, $state, $city, $address);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
