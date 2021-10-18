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
		//$this->dbusername='generics_appoint';
		//$this->dbpassword='54213;.,HbD+kjgeappoint';
		//$this->dbname='generics_appoint';



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