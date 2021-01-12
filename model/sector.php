<?php
/**
 * 
 */
class Sector_Model extends Database
{
	
	function __construct()
	{
		# code...
		
	}

	
	#INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
	function insert_sector($sector){
		echo "<br> insert user info";
		session_start();
		$counselor_id=$_SESSION['id'];
		$database=new Database();
		$sql="INSERT INTO `counselor_sectors` (`id`, `counselor_id`, `sector`) VALUES (NULL, '$counselor_id', '$sector')";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		
	}
	
	function select_distinct_sectors(){
		$database=new Database();
		$sql="select DISTINCT sector from counselor_sectors ";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
}