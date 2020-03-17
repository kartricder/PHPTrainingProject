<?php
	/**
	 * CRUD Data table
	 */
	//namespace ajax_crud\controller;
	class CrudTable
	{
		public $conn;
		public $name;
		public $comments;

		function __construct($db)
		{
			$this->conn= $db;
		}

		public function read()
		{	
			$query = "SELECT * FROM crud"; 
			$stmt = $this->conn->prepare($query);	//echo "1320";
			$stmt->execute();
			return $stmt;
		}		

		public function create(){
			$sql =  'INSERT INTO crud (name, comments) values ("'.$this->name.'","'.$this->comments.'")';
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			//echo "success insert!";
		}
	}
?>