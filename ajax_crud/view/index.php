<!DOCTYPE html>
<html>
<head>
	<title>CRUD Model using ajax</title>
	<?php 
	include_once 'cdn.php'; ?>
	
</head>

<body>
	<?php 
		include_once  '../model/connect.php';
		include_once '../controller/ajax-controller.php';
		$database = new AjaxConnect();
		$db = $database->connection();
		$readProduct =  new CrudTable($db);
		$readTable = $readProduct->read();
		$result = $readTable->fetchAll();	
	?>	
	<div class="container">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First</th>
		      <th scope="col">Last</th>
		    </tr>
		  </thead>
		  <tbody>
			<?php foreach($result as $value): ?>
		    <tr>
		      <th scope="row"><?php echo $value['id'];?></th>
		      <td><?php echo $value['name'];?></td>
		      <td><?php echo $value['comments'];?></td>
		    </tr>
			<?php endforeach;?>
		  </tbody>
		</table>

		<form id="form-search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail2">Comments</label>
				<input name="comment" type="text" class="form-control" id="exampleInputEmail2" placeholder="Password">
			</div>
			<button id="save" type="submit" class="btn btn-primary">Submit</button>
		</form>
		<?php 
			// if ($_POST) {
			// 	$readProduct->name = $_POST['email'];
			// 	$readProduct->comments = $_POST['comment'];
			// 	$readProduct->create();
			// }
		?>
	</div>
	<script>
		$(document).on('click', '#save', function(e){
			var data = $("#form-search").serialize();
			$.ajax({
				data: data,
				type: "post",
				url: "test.php",
				success: function(data){
					alert("Data save: " + data);
				}
			});
		})
	</script>
</body>
</html>