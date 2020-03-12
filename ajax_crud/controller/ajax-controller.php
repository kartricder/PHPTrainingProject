<?php
	/**
	 * CRUD Data table
	 */
	namespace ajax_crud\controller;
	class CrudTable
	{
		public $conn;

		function __construct($db)
		{
			$this->conn= $db;
		}

		public function read()
		{	
			$query = "SELECT * FROM crud"; 
			$stmt = $this->conn->prepare("Select * from crud");	//echo "1320";
			$stmt->execute();
			return $stmt;
		}		

		public function create(){

		}
	}
?>