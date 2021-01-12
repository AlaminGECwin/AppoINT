<?php
class homeModel{
	function __construct(){
		try{
			$this->con=new PDO("mysql:host=localhost;dbname=Counselling_Manager","root","");
		}catch(PDOExection $e){
			echo $e->getMessage();
		}
	}
	function page($id){
		$sql="select title,data from page where id='$id'";
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		$arr=$data['0'];
		return $arr;
	}
	function table_data($table_name)
	{
		$sql="select *from ".$table_name;
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	function table_columns($table_name)
	{
		$sql="SHOW COLUMNS FROM ".$table_name;
		$stmt=$this->con->prepare($sql);
		$stmt->execute();
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
}
?>