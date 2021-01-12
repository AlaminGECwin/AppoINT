<?php
/**
 * 
 */
class Schedule_Model extends Database
{
	
	function __construct()
	{
		# code...
		
	}

	
	#INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
	
	function insert_slot($id,$date,$month,$year,$slot_schedule){
		$database=new Database();
		$sql="INSERT INTO `schedule`(`id`, `date`, `month`, `year`, `slot_schedule`, `counselor_id`) VALUES (NULL,'$date','$month','$year','$slot_schedule','$id')";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function update_slot_for_accept($schedule_id,$slot_schedule){
		$database=new Database();
		

		$sql="UPDATE `schedule` SET `slot_schedule` = '$slot_schedule' where id=$schedule_id";
		echo $sql;
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function update_slot($id,$date,$month,$year,$slot_schedule){
		$database=new Database();
		

		$sql="UPDATE `schedule` SET `slot_schedule` = '$slot_schedule' where counselor_id=$id and date=$date and month=$month and year=$year";
		echo $sql;
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function getSchedule($schedule_id){
		$database=new Database();
		$sql="SELECT * FROM `schedule` where id=$schedule_id";
		//echo "<pre>";
		//echo $sql;

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	function select_schedule($id,$date,$month,$year){
		$database=new Database();
		$sql="SELECT * FROM `schedule` where counselor_id=$id and date=$date and month=$month and year=$year";
		//echo "<pre>";
		//echo $sql;

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
	
}