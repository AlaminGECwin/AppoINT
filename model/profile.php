<?php
/**
 * 
 */
class Profile_Model extends Database
{
	
	function __construct()
	{
		# code...
		
	}

	
	#INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
	function insert_profile($profile_link,$profile_type){
		echo "<br> insert user info";

		session_start();
		$user_id=$_SESSION['id'];
		$database=new Database();
		$sql="INSERT INTO `profile` (`id`, `profile_link`, `profile_type`, `user_id`) VALUES (NULL, '$profile_link', '$profile_type', '$user_id')";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		
	}
	function select_profile($id){
		$database=new Database();
		$sql="SELECT * FROM `profile` where user_id=$id ";

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
}