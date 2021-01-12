<?php
/**
 * 
 */
class Appointment_Model extends Database
{
	
	function __construct()
	{
		# code...\
		//echo "Appointment_Model";
		
	}

	
	#INSERT INTO table_name (column1, column2, column3,...) VALUES (value1, value2, value3,...)
	function accept_appointment($id){
		$database=new Database();
		$sql="UPDATE `appointment_request` SET `status` = 'accept' WHERE id=$id";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();

	}
	function reject_appointment($id){
		$database=new Database();
		$sql="UPDATE `appointment_request` SET `status` = 'reject' WHERE id=$id";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function delete_appointment($id){
		$database=new Database();
		$sql="DELETE FROM `appointment_request` WHERE id=$id";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function insert_appointment($problem,$schedule_id,$slot,$client_id,$counselor_id){
		$database=new Database();
		$sql="INSERT INTO `appointment_request`(`id`, `problem`, `schedule_id`, `slot`, `client_id`, `counselor_id`, `status`) VALUES (NULL,'$problem','$schedule_id','$slot','$client_id','$counselor_id','pending')";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function update_appointment($id,$date,$month,$year,$slot_schedule){
		$database=new Database();
		

		$sql="UPDATE `schedule` SET `slot_schedule` = '$slot_schedule' where counselor_id=$id and date=$date and month=$month and year=$year";
		echo $sql;
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
	}
	function getName($counselor_id){
		$database=new Database();
		$sql="select first_name from user where id='$counselor_id'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0]['first_name'];
	}
	function getPhoto($counselor_id){
		$database=new Database();
		$sql="select profile_picture from user where id='$counselor_id'";
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0]['profile_picture'];
	}
	function select_profile($id){
		$database=new Database();
		$sql="SELECT * FROM `profile` where user_id=$id ";

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	function select_schedule($id){
		$database=new Database();
		$sql="SELECT * FROM `schedule` where id=$id ";
		//echo "<pre>";
		//echo $sql;

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	function get_schedule($appointment_id){
		$database=new Database();
		$sql="SELECT * FROM `appointment_request` where id=$appointment_id";
		//echo "<pre>";
		//echo $sql;

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data[0];
	}
	function select_appointment_for_client($id){
		$database=new Database();
		$sql="SELECT * FROM `appointment_request` where client_id=$id";
		//echo "<pre>";
		//echo $sql;

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	function select_appointment_for_counselor($id){
		$database=new Database();
		$sql="SELECT * FROM `appointment_request` where counselor_id=$id";
		//echo "<pre>";
		//echo $sql;

		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	
}