<?php

include('dbconnection.php');

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
	<?php

$query = "select * from department";
$run = mysqli_query($con,$query);
$total_rows = mysqli_num_rows($run);


//print_r($data);


if($total_rows > 0)
{
	?>
	<div class="container">
	<div class="row">
		
		<div class="col-sm-10 mx-auto">
            <a href="UserAdd.php" class="btn btn-outline-primary">Add New User</a> | 
            <a href="ViewUser2.php" class="btn btn-outline-primary">View User</a> | 
            <a href="ViewUser.php" class="btn btn-outline-primary">Update & Delete User</a> | 
            <a href="DepartmentAdd.php" class="btn btn-outline-primary">Add New Department</a> | 
            <a href="ViewDepartment.php" class="btn btn-outline-primary">View Department</a>
            <br><br>
	<table class="table table-bordered table-striped table-hover">
		
		<tr>
			<th colspan="7" class="text-center">DEPARTMENT</th>
		</tr>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>DESCRIPTION</th>
			<th>DATE TIME</th>
			<th>EDIT</th>
			<th>DELETE</th>
		</tr>
	
	<?php
	
	while($data = mysqli_fetch_assoc($run))
	{
		echo "<tr>
			<td>".$data['dept_id']."</td>
			<td>".$data['dept_name']."</td>
			<td>".$data['description']."</td>
			<td>".$data['datetime_created']."</td>
			<td><a class='btn btn-primary' href='update_dept.php?id=$data[dept_id]'>Edit</a></td>
			<td><a class='btn btn-danger' href='delete_dept.php?id=$data[dept_id]' onclick='return Confirmation()'>Delete</a></td>
			</tr>";
	}
}
else
{
	echo "<script>alert('Rows Not Found');
		window.location.href = 'DepartmentAdd.php';
		</script>";
}
?>
</table>
			</div>
	</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script>
	
	function Confirmation()
		{
			return confirm("Are You Sure To Delete Department ??");
		}
	
	</script>
</body>
</html>