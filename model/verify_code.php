<?php
/**
 * 
 */
class Verify_Code_Model extends Database
{
	
	function __construct()
	{
		# code...
		
	}

	
	#INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
	function insert_code($code,$receiver_mail){
		//echo "<br> insert user info";
		session_start();
		//$user_id=$_SESSION['id'];
		$database=new Database();
		$sql="INSERT INTO `verify_code` (`id`, `user_email`, `code`) VALUES (NULL, '$receiver_mail', '$code')";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		
	}
	function select_email_of_code($code){
		$database=new Database();
		$sql="select user_email from verify_code where code='$code' ";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0]['user_email'];
	}
	
}