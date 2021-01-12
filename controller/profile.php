<?php
/**
 * 
 */
/**
 * 
 */
class Profile
{
	private $profile_link;
	private $profile_type;
	
	function __construct($profile_link,$profile_type)
	{
		# code...
		$this->profile_link=$profile_link;
		$this->profile_type=$profile_type;
	}
}
class Profile_Controller extends Profile
{
	
	function __construct()
	{
		# code...
	}
	function create_new_profile_for_user($profile_link,$profile_type){
		$profile=new Profile($profile_link,$profile_type);
		$file=new File_Controller();
		$varification=$file->check_profile_existance($profile->$profile_link,$profile->$profile_type);
		if($varification){
			$file->create_profile($profile_link,$profile_type);
		}
	}
	
}