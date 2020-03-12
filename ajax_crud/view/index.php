<!DOCTYPE html>
<html>
<head>
	<title>CRUD Model using ajax</title>
	<?php 
	include_once 'cdn.php'; ?>
	
</head>

<body>
	<?php 
	//required headers
	

		include_once  '../model/connect.php';
		include_once '../controller/ajax-controller.php';
		$database = new AjaxConnect();
		$db = $database->connection();

		$readProduct =  new CrudTable($db);
		$readTable = $readProduct->read();
	
	?>	
	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		      <th scope="col">Handle</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		    </tr>
		  </tbody>
		</table>
	</div>
</body>
</html>