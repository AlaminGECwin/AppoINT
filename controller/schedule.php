<?php
/**
 * 
 */
class Schedule_Controller
{
	
	function __construct()
	{
		# code...
	}
	function update_schedule_slot(){
		$file=new File_Controller();
		$data=$file->getCounselorSchedules($_POST);
		if (sizeof($data)>0) {
			# code...
			//echo "<pre>";
			//print_r($data[0]['slot_schedule']);
			$slot_schedule=$data[0]['slot_schedule'];
			echo $slot_schedule."<br>";
			$status=$_POST['status'];
			$index=$_POST['slot'];
			if ($status=="available") {
				# code...
				$slot_schedule[$index]="1";
			}elseif ($status=="not available") {
				# code...
				$slot_schedule[$index]="2";
			}elseif ($status=="booked") {
				# code...
				$slot_schedule[$index]="3";
			}
			//echo $slot_schedule."<br>";

			//print_r($_POST);
			$file->update_slot($_POST,$slot_schedule);


			session_start();
			$user_type=$_SESSION['user_type'];
			$header_location="Location: index.php?function=".$user_type."_dashboard";
			header($header_location);


		}else{
			echo "not exist";
			$slot_schedule="22222222";
			echo $slot_schedule."<br>";
			$slot_schedule_temp=$slot_schedule;
			$status=$_POST['status'];
			$index=$_POST['slot'];
			if ($status=="available") {
				# code...
				$slot_schedule[$index]="1";
			}elseif ($status=="not available") {
				# code...
				$slot_schedule[$index]="2";
			}elseif ($status=="booked") {
				# code...
				$slot_schedule[$index]="3";
			}
			echo $slot_schedule."<br>";
			if ($slot_schedule==$slot_schedule_temp) {
				# code...
				session_start();
				$user_type=$_SESSION['user_type'];
				$header_location="Location: index.php?function=".$user_type."_dashboard";
				header($header_location);

			}else{
				echo "need insert";
				$file->insert_slot($_POST,$slot_schedule);

				session_start();
				$user_type=$_SESSION['user_type'];
				$header_location="Location: index.php?function=".$user_type."_dashboard";
				header($header_location);
			}


		}

	}
}