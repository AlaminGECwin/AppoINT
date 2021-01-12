<?php
/**
 * 
 */
class Appointment_Controller
{
	
	function __construct()
	{
		# code...
	}
	function accept_appointment(){
		$file=new File_Controller();
		$file->AcceptAppointment($_GET);
	}
	function reject_appointment(){
		$file=new File_Controller();
		$file->RejectAppointment($_GET);

	}
	function delete_appointment(){
		$file=new File_Controller();
		$file->DeleteAppointment($_GET);
	}
	function send_appointment(){
		$file=new File_Controller();
		$file->CreateNewAppointment($_POST);

	}
	function get_schedule_id($appointment_id){
		$file=new File_Controller();
		return $file->get_schedule_id($appointment_id);
	}
}