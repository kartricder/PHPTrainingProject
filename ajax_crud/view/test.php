<?php 

		include_once  '../model/connect.php';
		include_once '../controller/ajax-controller.php';
		$database = new AjaxConnect();
		$db = $database->connection();
		$readProduct =  new CrudTable($db);
		$readTable = $readProduct->read();
		$result = $readTable->fetchAll();	
	
	if (isset($_REQUEST)) {
		$readProduct->name = $_POST['email'];
		$readProduct->comments = $_POST['comment'];
		$readProduct->create();
		echo "Success!";
	}
?>