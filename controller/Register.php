<?php
	/**
	 * 
	 */
	class Register_Controller
	{
		
		function __construct()
		{
			# code...
			
			

			//echo getcwd() . "\n";
		}
		function create_new_user_request($first_name,$last_name,$email,$password,$confirm_password,$user_type,$request_type){
			echo "create new user request\n";
			$supporter=new Register();

			$validation=$supporter->check_new_user_information($first_name,$last_name,$email,$password,$confirm_password,$user_type);
			if($validation)
			{
				$file=new File_Controller();
				$varification=$file->check_user_existance($email);
				if($varification)
				{
					echo "<br>not varified";
				}else
				{
					echo "<br>varified";
					$file->create_user($first_name,$last_name,$email,$password,$user_type);
					header("Location: index.php?function=sign_in"); 
				}
				
			}


		}
		
		function create_new_sector_for_counselor($sector){
			
			$file=new File_Controller();
			$varification=$file->check_sector_existance($sector);
			if($varification){
				$file->create_sector($sector);
			}
		}
	}
?>