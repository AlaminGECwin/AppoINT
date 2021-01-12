<?php
/**
 * 
 */
class Counselor_Model extends Database
{
	
	function __construct()
	{
		# code...
		//echo "Counselor_Model";
	}
	function select_all_counselors(){

		$database=new Database();
		$sql="select * from user where user_type='counselor'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	
	}
	function select_all_counselors_by_sectors($sector){
		$database=new Database();
		$sql="SELECT * FROM user WHERE id IN(SELECT DISTINCT counselor_id FROM `counselor_sectors` WHERE sector='$sector')";
		//echo $sql;
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

}