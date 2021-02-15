<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a href="https://sourcecodester.com" class="navbar-brand">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Crud data</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST" action="add.php">
				<div class="form-group">
					<label>Firstname</label>
					<input class="form-control" type="text" name="firstname"/>
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input class="form-control" type="text" name="lastname"/>
				</div>
				<div class="form-group">
					<label>Address</label> 
					<input class="form-control" type="text" name="address"/>
				</div>
				<div class="form-group">
					<button class="btn btn-primary form-control" type="submit" name="save">Save</button>
				</div>
			</form>
		</div>
		<table class="table table-bordered">
			<thead class="alert-danger">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody class="alert-warning">
				<?php
					require 'koneksi.php';
					$sql = $db->prepare("SELECT * FROM `member` ORDER BY `mem_id` DESC");
					$sql->execute();
					while($row = $sql->fetch()){
				?>
				<tr>
					<td><?php echo $row['firstname']?></td>
					<td><?php echo $row['lastname']?></td>
					<td><?php echo $row['address']?></td>
					<td><a href="edit.php?id=<?php echo $row['mem_id']?>">Edit</a> | <a href="delete.php?id=<?php echo $row['mem_id']?>">Delete</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	
</body>
	
</html>