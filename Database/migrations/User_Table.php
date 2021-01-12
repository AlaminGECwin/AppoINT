<?php# is not working
include('../../model/configuration.php');
class Notice_Table_Controller extends Database{
	function __construct()
	{
		# code...
		echo getcwd() . "\n";
	}
	function up()
	{
		echo "i am up in migration";
		$database=new Database();
		
		$sql="CREATE TABLE `rsam`.`notice` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `notice_title` VARCHAR(200) NOT NULL , `file` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
		
		$stmt=$database->connect()->prepare($sql);
		$stmt->execute();
		echo "exeduted";

	}
}
$obj=new Notice_Table_Controller();
$obj->up();