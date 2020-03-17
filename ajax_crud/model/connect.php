<?php 
/**
 * Connect to database using class AjaxConnect
 */
class AjaxConnect
{
	public $conn;
	private $dbname = "test";
	private $host = "localhost";
	private $user = "root";
	private $password = "";

	public function connection()
	{
		$this->conn = null;
		try {	
		$pdo = $this->conn = new PDO("mysql:host=".$this->host . ";dbname=".$this->dbname, $this->user, $this->password); 
		} catch (Exception $e) {
			echo "Error connection: " . $e->getMessage();	
		}
		return $pdo;
	}
}
