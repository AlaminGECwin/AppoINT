<?php
	
function getURL($page_name)
	{
		return 'view/'.$page_name.'.php';
	}

class Counselling_Manager_GUI_Controller{
	function __construct(){
		include('view/p_library.php');
		//include('model/home.php');
		//$this->obj=new homeModel();
		session_start();
	}
	
	function home(){
		//$arr=$this->obj->page(1);
		include(getURL('header'));
		include(getURL('banner'));
		include(getURL('home'));
		include(getURL('footer'));
	}
	function counselors(){
		include('controller/Counselling.php');
		$counselling_controller=new counselling_controller();
		$counselors=$counselling_controller->getCounselors();
		//echo "<pre>";
		//print_r($counselors);
		include(getURL('header'));
		include(getURL('counselors'));
		include(getURL('footer'));
	}
	
	function search_counselling(){
		include('controller/Counselling.php');
		$counselling_controller=new counselling_controller();
		$sectors=$counselling_controller->getDistinctSectors();
		
		

		include(getURL('header'));
		include(getURL('profile_m'));
		include(getURL('search_counselling'));
		include(getURL('footer'));
	}

	function counselor_dashboard(){
		//include(getURL('header'));
		include(getURL('profile_m'));
		include(getURL('button'));
		include(getURL('schedule_m'));
		include(getURL('update_time_slot_m'));
		include(getURL('add_new_profile_m'));
		

		if (isset($_SESSION['password'])) {
			# code...
			if($_SESSION['user_status']=="old"){
				
				//include(getURL('counselor_dashboard'));
				include(getURL('counselor_dashboard'));
			}elseif ($_SESSION['user_status']=="new") {
				# code...
				include(getURL('setup_counselor'));
				print_r($_SESSION);
			}
		}
		

		
		
		
	}
	function temp(){
		
		include(getURL('temp'));
		
	}
	function social(){
		
		include(getURL('social'));
		
	}
	function enter_problem(){
		if (isset($_SESSION['id'])) {
			# code...
			include(getURL('header'));
			include(getURL('enter_problem'));
			
			include(getURL('footer'));
		}else{
			header("Location: index.php?function=search_counselling");
		}

		
	}
	function search_counselling_by_sector(){
		//include('controller/File.php');
		include('controller/Counselling.php');
		$counselling_controller=new counselling_controller();
		
		if(isset($_GET['sector']))
		{
			$sector=$_GET['sector'];
			//echo $sector;
			$counselors_by_sectors=$counselling_controller->getCounselorsBySectors($sector);
			//print_r($counselors_by_sectors);
			
		}
		

		include(getURL('header'));
		
		include(getURL('counselors_by_sectors'));
		//include(getURL('profile_m'));
		include(getURL('footer'));
	}

	function sign_in(){
		
		include(getURL('header'));
		include(getURL('sign_in'));
		include(getURL('footer'));
	}



	function forgotten_account_email(){
		
		include(getURL('header'));
		include(getURL('forgotten_account_email'));
		include(getURL('footer'));
	}

	function forgotten_account_verify_code(){
		
		include(getURL('header'));
		include(getURL('forgotten_account_verify_code'));
		include(getURL('footer'));
	}

	function forgotten_account_new_password(){
		
		include(getURL('header'));
		include(getURL('forgotten_account_new_password'));
		include(getURL('footer'));
	}

	function read_pdf(){
		
		include(getURL('header'));
		include(getURL('read_pdf'));
		include(getURL('footer'));
	}

	function sign_up(){
		
		include(getURL('header'));
		include(getURL('sign_up'));
		include(getURL('footer'));
	}

	function registration_help(){
		
		include(getURL('header'));
		include(getURL('registration_help'));
		include(getURL('footer'));
	}

	function about(){
//		$arr=$this->obj->page(2);
		include(getURL('header'));
		include(getURL('page'));
		include(getURL('footer'));
	}
	function contact(){
		//$arr=$this->obj->page(3);
		include(getURL('header'));
		include(getURL('page'));
		include(getURL('footer'));
	}
	function gec(){
		
		include(getURL('header'));
		include(getURL('counselling_home'));
		include(getURL('footer'));
	}
	function admin_dashboard(){
		include(getURL('header'));
		//include(getURL('admin_dash'));
		include(getURL('admin_dashboard'));
		include(getURL('footer'));
			
		if (isset($_SESSION['id'])) {
			# code...
			//include(getURL('header'));
			//include(getURL('admin_dash'));
			//include(getURL('admin_dashboard'));
			//include(getURL('footer'));
			//echo "session is working<pre><center>";
			//print_r($_SESSION);
		}else{
			//echo "session is not working";
		}
		
		
		
		
	}

	function test(){
		
		include(getURL('header'));
		include(getURL('button'));

		include(getURL('tables'));
		include(getURL('test'));
		include(getURL('footer'));
	}
	
	function update_time_slot(){
		include(getURL('header'));
		include(getURL('update_time_slot'));
		include(getURL('footer'));
	}

	function client_dashboard(){
		
		//include(getURL('header'));
		include(getURL('button'));
		//include(getURL('schedule_m'));
		include(getURL('add_new_profile_m'));
		include(getURL('profile_m'));
		
		if (isset($_SESSION['password'])) {
			# code...
		
			if($_SESSION['user_status']=="old"){
				
				//include(getURL('client_dashboard'));
				include(getURL('dashboard'));
			}elseif ($_SESSION['user_status']=="new") {
				# code...
				include(getURL('setup_client'));
				print_r($_SESSION);
				
					
			}
		}
		
		//include(getURL('footer'));
	}
	function counselor_add_sector(){
		include(getURL('header'));
		include(getURL('counselor_add_sector'));
		include(getURL('footer'));
	}
	function sign_out(){
		session_destroy();
		header("Location: index.php?function=home");
	}

	function dash(){
		
		include(getURL('header'));
		include(getURL('button'));
		include(getURL('schedule_m'));
		include(getURL('update_time_slot_m'));
		include(getURL('add_new_profile_m'));
		include(getURL('profile_m'));

		if (isset($_SESSION['password'])) {
			# code...
			if($_SESSION['user_status']=="old"){
				
				include(getURL('counselor_dashboardoff'));
			}elseif ($_SESSION['user_status']=="new") {
				# code...
				include(getURL('setup_counselor'));
				print_r($_SESSION);
			}
		}
		include(getURL('footer'));
	}
	function request_schedule_edit(){
		
		include(getURL('header'));
		include(getURL('button'));
		include(getURL('enter_problem_m'));
		include(getURL('request_schedule'));
		include(getURL('footer'));
	}

	function request_schedule(){
		
		include(getURL('header'));
		include(getURL('button'));
		include(getURL('enter_problem_m'));
		include(getURL('request_schedule'));
		include(getURL('footer'));
	}

	function change_schedule_for_an_appointment(){

		include(getURL('header'));
		include(getURL('button'));
		include(getURL('enter_problem_m'));
		include(getURL('request_schedule'));
		include(getURL('footer'));
	}
}
?>