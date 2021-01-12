<?php
/**
 * 
 */

class File_Controller 
{
	
	function __construct()
	{
		# code...
		//echo "<br>i am file controller";
		include('model/configuration.php');
		include('model/user.php');
		include('model/counselor.php');
		include('model/sector.php');
		include('model/verify_code.php');
		include('model/profile.php');
		include('model/schedule.php');
		include('model/appointment.php');
		
		
	}
	function getAllUser(){
		//echo "ok";
		session_destroy();
		$user=new User_Model();
		return $user->getAllUser();
	}
	function RejectAppointment($get_data){
		$id=$get_data['id'];
		$appointment=new Appointment_Model();
		$appointment->reject_appointment($id);
	}
	function user_active_status($get_data){
		$user_id=$get_data['id'];
		$active_status=$get_data['active_status'];
		//session_destroy();
		$user=new User_Model();
		$user->update_active_status($user_id,$active_status);
	}
	function get_schedule_id($appointment_id){
		$appointment=new Appointment_Model();
		return $appointment->get_schedule_id($appointment_id);
	}
	function AcceptAppointment($get_data){
		$id=$get_data['id'];
		$appointment=new Appointment_Model();
		$appointment->accept_appointment($id);
	}
	function DeleteAppointment($get_data){
		$id=$get_data['id'];
		$appointment=new Appointment_Model();
		$appointment->delete_appointment($id);

	}
	function CreateNewAppointment($post_data){
		echo "<pre>";
		print_r($post_data);
		$problem=$post_data['problem'];
		$schedule_id=$post_data['schedule_id'];
		$slot=$post_data['slot'];
		session_start();
		$client_id=$_SESSION['id'];
		$counselor_id=$post_data['counselor_id'];
		$appointment=new Appointment_Model();
		$appointment->insert_appointment($problem,$schedule_id,$slot,$client_id,$counselor_id);

	}
	function insert_slot($post_data,$slot_schedule){
		$date=$post_data['date'];
		$month=$post_data['month'];
		$year=$post_data['year'];

		$schedule=new Schedule_Model();
		session_start();
		$id=$_SESSION['id'];
		$schedule->insert_slot($id,$date,$month,$year,$slot_schedule);
	}

	function update_slot($post_data,$slot_schedule){
		$date=$post_data['date'];
		$month=$post_data['month'];
		$year=$post_data['year'];

		$schedule=new Schedule_Model();
		session_start();
		$id=$_SESSION['id'];
		$schedule->update_slot($id,$date,$month,$year,$slot_schedule);

	}
	function getCounselorSchedules($post_data){
		//echo "<pre>";
		//print_r($post_data);
		$date=$post_data['date'];
		$month=$post_data['month'];
		$year=$post_data['year'];

		$schedule=new Schedule_Model();
		session_start();
		$id=$_SESSION['id'];
		$data=$schedule->select_schedule($id,$date,$month,$year);
		return $data;
	}
	function getCounselors(){
		$counselor=new Counselor_Model();
		$data=$counselor->select_all_counselors();
		return $data;
	}
	function getCounselorsBySectors($sector){
		//echo "<br>".$sector;
		$counselor=new Counselor_Model();
		$data=$counselor->select_all_counselors_by_sectors($sector);
		return $data;
	}
	function getDistinctSectors(){
		$sector=new Sector_Model();
		$data=$sector->select_distinct_sectors();
		return $data;
	}

	function check_user_existance($email){
		$user=new User_Model();
		$data=$user->user_existance($email);


		if(sizeof($data)>=1)
		{
			return true;
		}else
		{
			return false;
		}

	}
	function check_profile_existance($profile_link,$profile_type){
		return true;
	}
	function check_sector_existance($sector){
		//session_start();
		//echo $sector;
		//echo "<br>".$_SESSION['id'];
		return true;
	}


	function check_user_authenticity($email,$password){
		$user=new User_Model();
		$data=$user->user_authenticity($email,$password);


		if(sizeof($data)>=1)
		{
			return true;
		}else
		{
			return false;
		}
	}

	function get_user_type($email){
		$user=new User_Model();
		$data=$user->user_type($email);
		

		if(sizeof($data)>=1)
		{
			return $data[0]['user_type'];
		}else
		{
			return "unauthorized";
		}

	}

	function get_user_information($email){
		$user=new User_Model();
		$data=$user->user_information($email);
		return $data[0];
	}

	function get_user_status($email){
		$user=new User_Model();
		$data=$user->user_status($email);
		

		if(sizeof($data)>=1)
		{
			return $data[0]['user_status'];
		}else
		{
			return "unauthorized";
		}

	}

	function get_usre_password($email,$sign_in_encrpted_password){
		$user=new User_Model();
		$data=$user->user_password($email,$sign_in_encrpted_password);
		

		if(sizeof($data)>=1)
		{
			return $data[0]['password'];
		}else
		{
			return "password not matched";
		}
	}
	function create_profile($profile_link,$profile_type){
		$profile_controller=new Profile_Model();
		$profile_controller->insert_profile($profile_link,$profile_type);

	}
	function create_sector($sector){
		$sector_controller=new Sector_Model();
		$sector_controller->insert_sector($sector);// from here
	}
	function store_code($code,$receiver_mail){
		$verify_code=new Verify_Code_Model();
		$verify_code->insert_code($code,$receiver_mail);
	}

	function get_code_email($code){
		$verify_code=new Verify_Code_Model();
		$email=$verify_code->select_email_of_code($code);
		return $email;
	}

	function create_user($first_name,$last_name,$email,$password,$user_type){
		echo "<br> create user";
		$supporter=new Security_Guard();

		$password=$supporter->encrypt($email,$password);

		$user=new User_Model();
		$user->insert_user_information($first_name,$last_name,$email,$password,$user_type);
	}
	function update_password($email,$final_password){
		$supporter=new Security_Guard();

		$password=$supporter->encrypt($email,$final_password);

		$user=new User_Model();
		$user->update_user_password($email,$password);
	}

	function setup_client($profession,$designation,$profile_picture){
		$user=new User_Model();
		$user->update_user_setup_information($profession,$designation,$profile_picture);
	}
	function setup_counselor($profession,$designation,$profile_picture){
		$user=new User_Model();
		$user->update_user_setup_information($profession,$designation,$profile_picture);
	}

	

	
}