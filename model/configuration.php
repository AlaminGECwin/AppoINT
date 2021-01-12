<?php
/**
 * 
 */
class Database{
	
	function __construct()
	{
		# code...
		//echo "<br>i am database";
	}
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;
	
	protected function connect(){
		//$this->host='localhost';
		//$this->dbusername='bazarsho_CM';
		//$this->dbpassword='54213;.,HbD+';
		//$this->dbname='rowzatus_rsam';



		$this->host='localhost';
		$this->dbusername='root';
		$this->dbpassword='';
		$this->dbname='counselling_manager';
		try{
			$connection=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->dbusername,$this->dbpassword);
		}catch(PDOExection $e){
			echo $e->getMessage();
		}
		return $connection;
	}

	
}