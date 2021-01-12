  <?php
/**
 * 
 */
class Counselling_Controller
{
	
	function __construct()
	{
		# code...

		include('controller/File.php');
		include('controller/Register.php');
		include('controller/supporters/supporters.php');
		include('controller/profile.php');
		include('controller/appointment.php');
		include('controller/schedule.php');
		//echo getcwd() . "\n";
	}
	function send_request(){
		if($_POST['request_type']=="request_name"){
			if(isset($_POST['submit_button_name'])){

			}
		}


		if ($_POST['request_type']=="counselor_add_sector") {
		# code...
			if (isset($_POST['add_sector'])) {
				$sector=$_POST['sector'];
				
				

					$reg=new Register_Controller();
					echo "reg";
					$reg->create_new_sector_for_counselor($sector);
					$header_location="Location: index.php?function=counselor_dashboard";
					header($header_location);
				
				
			}

		}
				
		if ($_POST['request_type']=="user_registry") {
			# code...
			if (isset($_POST['register'])) {
				$first_name=$_POST['first_name'];
				$last_name=$_POST['last_name'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				$confirm_password=$_POST['confirm_password'];
				$user_type=$_POST['user_type'];
				$request_type=$_POST['request_type'];

				$reg=new Register_Controller();
				echo "reg";
				$reg->create_new_user_request($first_name,$last_name,$email,$password,$confirm_password,$user_type,$request_type);
			
				
			}

		}
		

		if (isset($_POST['sign_in'])) {
			if($_POST['request_type']=="user_sign_in"){
				
				$email=$_POST['email'];
				$password=$_POST['password'];
				
				$request_type=$_POST['request_type'];

				if($request_type=="user_sign_in"){
				$file=new File_Controller();
				$varification=$file->check_user_existance($email);
				if($varification){
					echo "varifyed";
					$user_type=$file->get_user_type($email);
					if($user_type!="unauthorized"){
						echo "authorized";

						$supporter=new Security_Guard();
						$sign_in_encrpted_password=$supporter->encrypt($email,$password);

						$authenticity=$file->check_user_authenticity($email,$sign_in_encrpted_password);
						if($authenticity){
							echo "authenticated";
							echo "<br>".$sign_in_encrpted_password;
							$database_password=$file->get_usre_password($email,$sign_in_encrpted_password);

							if($sign_in_encrpted_password==$database_password){
								echo "user ok for dashboard";
								$user_status=$file->get_user_status($email);
								$user_information=$file->get_user_information($email);
								
								session_start();
								
								
								$_SESSION['id']=$user_information['id'];
								$_SESSION['first_name']=$user_information['first_name'];
								$_SESSION['last_name']=$user_information['last_name'];
								$_SESSION['profession']=$user_information['profession'];
								$_SESSION['designation']=$user_information['designation'];
								$_SESSION['email']=$user_information['email'];
								$_SESSION['password']=$user_information['password'];
								$_SESSION['user_type']=$user_information['user_type'];
								$_SESSION['user_status']=$user_information['user_status'];
								$_SESSION['profile_picture']=$user_information['profile_picture'];
								$_SESSION['profile_uid']=$_SESSION['id'];
								
								
								echo $_SESSION['user_status'];
								$header_location="Location: index.php?function=".$user_type."_dashboard";
								echo $header_location;
								header($header_location);
							}
						}
					}
				}
				}
			}
			
		}


		if ($_POST['request_type']=="client_setup") {
			# code...
				if (isset($_POST['setup_client'])) {
				# code...

				$profession=$_POST['profession'];
				$designation=$_POST['designation'];
				$profile_picture= $_FILES['profile_picture']['name'];
				//print_r($_POST);

		        $profile_picture=explode('.', $profile_picture);
		        $file_ex=end($profile_picture);
		        //echo "</br>"; 
		        $profile_picture=rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;
		        echo $profile_picture;




		        $file=new File_Controller();
		        $file->setup_client($profession,$designation,$profile_picture);

		        echo $_FILES['profile_picture']['tmp_name'];
		        move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'assets/images/'.$profile_picture);
		        header("Location: index.php?function=client_dashboard");
		        

			}
		}


		if ($_POST['request_type']=="counselor_setup") {
			# code...
				if (isset($_POST['setup_counselor'])) {
				# code...

				$profession=$_POST['profession'];
				$designation=$_POST['designation'];
				$profile_picture= $_FILES['profile_picture']['name'];
				//print_r($_POST);

		        $profile_picture=explode('.', $profile_picture);
		        $file_ex=end($profile_picture);
		        //echo "</br>"; 
		        $profile_picture=rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;
		        echo $profile_picture;




		        $file=new File_Controller();
		        $file->setup_counselor($profession,$designation,$profile_picture);

		        echo $_FILES['profile_picture']['tmp_name'];
		        move_uploaded_file($_FILES['profile_picture']['tmp_name'], 'assets/images/'.$profile_picture);
		        echo "uploaded";
		        header("Location: index.php?function=counselor_add_sector&controller=Counselling_Manager_GUI");
		        

			}

		}



		if ($_POST['request_type']=="counselor_add_sector") {
			# code...

		}
		

		






	}
	
	function change_user_active_status(){
		echo "<pre>";
		print_r($_GET);
		$file=new File_Controller();
		$file->user_active_status($_GET);

	
		$header_location="Location: index.php?function=admin_dashboard";
		header($header_location);
	}
	function accept_appointment(){
		echo "<pre>";
		print_r($_GET);
		$appointment_controller=new Appointment_Controller();
		$appointment_controller->accept_appointment();
		
		$appointment_id=$_GET['id'];
		
		$appointment=new Appointment_Model();
		$appointment_info=$appointment->get_schedule($appointment_id);
		
		print_r($appointment_info);

		$schedule_id=$appointment_info['schedule_id'];
		
		$schedule=new Schedule_Model();
		$schedule_info=$schedule->getSchedule($schedule_id);


		print_r($schedule_info);
		echo $schedule_info['slot_schedule']."<br>";
		$slot_schedule=$schedule_info['slot_schedule'];
		//echo $appointment_info['slot'];
		$slot=$appointment_info['slot'];
		$slot_schedule[$slot]="3";
		echo $slot_schedule."<br>";

		

		$schedule->update_slot_for_accept($schedule_id,$slot_schedule);
		


		session_start();
		$user_type=$_SESSION['user_type'];
		$header_location="Location: index.php?function=".$user_type."_dashboard";
		header($header_location);
	}
	function reject_appointment(){
		echo "<pre>";
		print_r($_GET);
		$appointment_controller=new Appointment_Controller();
		$appointment_controller->reject_appointment();


		$appointment_id=$_GET['id'];
		
		$appointment=new Appointment_Model();
		$appointment_info=$appointment->get_schedule($appointment_id);
		
		print_r($appointment_info);

		$schedule_id=$appointment_info['schedule_id'];
		
		$schedule=new Schedule_Model();
		$schedule_info=$schedule->getSchedule($schedule_id);


		print_r($schedule_info);
		echo $schedule_info['slot_schedule']."<br>";
		$slot_schedule=$schedule_info['slot_schedule'];
		//echo $appointment_info['slot'];
		$slot=$appointment_info['slot'];
		$slot_schedule[$slot]="1";
		echo $slot_schedule."<br>";

		

		$schedule->update_slot_for_accept($schedule_id,$slot_schedule);
		


		session_start();
		$user_type=$_SESSION['user_type'];
		$header_location="Location: index.php?function=".$user_type."_dashboard";
		header($header_location);
	}
	function delete_appointment(){
		echo "<pre>";
		print_r($_GET);

		$appointment_controller=new Appointment_Controller();
		$appointment_controller->delete_appointment();
		
		session_start();
		$user_type=$_SESSION['user_type'];
		$header_location="Location: index.php?function=".$user_type."_dashboard";
		header($header_location);
	}
	function send_appointment_request(){
		//echo "<pre>";
		//print_r($_POST);
		$appointment_controller=new Appointment_Controller();
		$appointment_controller->send_appointment();
		
		session_start();
		$user_type=$_SESSION['user_type'];
		$header_location="Location: index.php?function=".$user_type."_dashboard";
		header($header_location);


	}
	function add_new_profile(){
		//print_r($_POST);
		//print_r($_FILES['file_name']['name']);
		if ($_POST['p_type']=="linkedin"||$_POST['p_type']=="facebook"||$_POST['p_type']=="twitter"||$_POST['p_type']=="youtube"||$_POST['p_type']=="portfolio") {
			# code...
			$profile_type=$_POST['p_type'];
			$profile_link=$_POST['profile_link'];
			echo $profile_type;

			$profile_controller=new Profile_Controller();
		
			$profile_controller->create_new_profile_for_user($profile_link,$profile_type);

		}elseif (isset($_FILES['file_name']['name'])) {
			# code...
			echo $_FILES['file_name']['name'];

			$file= $_FILES['file_name']['name'];

	        $file=explode('.', $file);
	        $file_ex=end($file);
	        //echo "</br>"; 
	        $file=rand(9999,99999).date('-Y-m-d-H-i-s.').$file_ex;
	        echo $file;
	        $profile_link=$file;
	        $profile_type=$_POST['p_type'];
	        $profile_controller=new Profile_Controller();
		
			$profile_controller->create_new_profile_for_user($profile_link,$profile_type);


	        echo $_FILES['file_name']['tmp_name'];
	        move_uploaded_file($_FILES['file_name']['tmp_name'], 'assets/pdf/'.$file);
	        
		}
				
		session_start();
		$user_type=$_SESSION['user_type'];
		$header_location="Location: index.php?function=".$user_type."_dashboard";
		header($header_location);	
	

	}
	function update_slot(){
		//echo "<pre>";
		//print_r($_POST);
		$schedule_controller=new Schedule_Controller();
		$schedule_controller->update_schedule_slot();
	
		

	}
	function getCounselors(){
		$file=new File_Controller();
		$data=$file->getCounselors();
		return $data;
	}
	function getSchedules(){
		$file=new File_Controller();
		$data=$file->getCounselorSchedules();
		return $data;
	}
	function getCounselorsBySectors($sector){
		//echo $sector;

		$file=new File_Controller();
		$data=$file->getCounselorsBySectors($sector);
		//print_r($data);
		return $data;	
	}
	function getDistinctSectors(){
		$file=new File_Controller();
		$data=$file->getDistinctSectors();
		return $data;	
	}
	function retrieve_account(){
		$sender_mail="laravel58test@gmail.com";
		$sender_password="wapcac-cexxi6-fIjnyx";
		$receiver_mail=$_POST['email'];
		echo $receiver_mail;
		echo(rand(111111,999999));
		$code=rand(111111,999999);

		$file=new File_Controller();
		$data=$file->store_code($code,$receiver_mail);

		$subject="verify account for Counselling Manager";
		$message=" Your Code: ".$code;
		$mail=new Email();
		$mail->send_mail($sender_mail,$sender_password,$receiver_mail,$subject,$message);
		header("Location: index.php?function=forgotten_account_verify_code");
	}
	function verify_code_of_email(){
		$code=$_POST['code'];

		$file=new File_Controller();
		$email=$file->get_code_email($code);
		
		header("Location: index.php?function=forgotten_account_new_password&email=$email");
		
	}
	function update_user_password(){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		if ($password==$confirm_password) {
			# code...
			$final_password=$password;
		}else
		{
			header("Location: index.php?function=forgotten_account_new_password&email=$email");
		}
		$file=new File_Controller();
		$file->update_password($email,$final_password);
		header("Location: index.php?function=sign_in");
		

	}
}