<?php
/**
 * 
 */

class User_Model extends Database
{
	
	function __construct()
	{
		# code...
		
	}
	function getAllUser(){

		$database=new Database();
		$sql="select * from user";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function user_existance($email)
	{	
		$database=new Database();
		$sql="select email from user where email='$email'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	function user_information($email){
		$database=new Database();
		$sql="select * from user where email='$email' and active_status='active'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function user_type($email){
		$database=new Database();
		$sql="select user_type from user where email='$email'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function user_status($email){
		$database=new Database();
		$sql="select user_status from user where email='$email'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function user_authenticity($email,$password){
		$database=new Database();
		$sql="select password from user where email='$email' and password='$password'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	function user_password($email,$sign_in_encrpted_password){
		$database=new Database();
		$sql="select password from user where email='$email' and password='$sign_in_encrpted_password'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	#INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
	function insert_user_information($first_name,$last_name,$email,$password,$user_type){
		echo "<br> insert user info";
		$user_status="new";
		$active_status="active";
		$database=new Database();
		$sql="INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `user_type`,`user_status`, `active_status`) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '$user_type', '$user_status','$active_status')";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		
	}
	function update_active_status($user_id,$active_status){
		$database=new Database();
		

		$sql="UPDATE `user` SET `active_status` = '$active_status' WHERE `user`.`id` = '$user_id'";
		echo $sql;
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		
	}
	function update_user_password($email,$password){
		$database=new Database();
		

		$sql="UPDATE `user` SET `password` = '$password' WHERE `user`.`email` = '$email'";
		echo $sql;
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		
	}
	function update_user_setup_information($profession,$designation,$profile_picture){
		$database=new Database();
		$id=$_SESSION['id'];

		$sql="UPDATE `user` SET `profession` = '$profession', `designation` = '$designation',`user_status` = 'old', `profile_picture` = '$profile_picture' WHERE `user`.`id` = $id";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$_SESSION['user_status']="old";
		$_SESSION['profession']=$profession;
		$_SESSION['designation']=$designation;
		$_SESSION['profile_picture']=$profile_picture;
		echo $sql."<br>";
			
	}
}