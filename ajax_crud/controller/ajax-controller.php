<?php
	/**
	 * CRUD Data table
	 */
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
			$stmt2 = $this->conn->prepare("Select * from crud");	//echo "1320";
			$stmt2->execute();
			return $stmt2;
		}		
	}
?>