<?php 
$conn = mysqli_connect("localhost","root","","login_register");

//if(isset($_POST['login'])){
	
	$id = $_GET['id'];
	$token = $_GET['token'];

	$select = "UPDATE register SET status = 'Active' WHERE id = '$id' AND token = '$token'";
	$result = mysqli_query($conn,$select);
	if ($result) {
		echo "verify successful. you can log in now";
	}else{
		echo "verify faild";
	}

//}

?>