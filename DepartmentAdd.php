<?php
include('dbconnection.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Department Add</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    
    
    <div class="container">
        <div class="row">
        <div class="col-sm-10 mx-auto">
            <a href="UserAdd.php" class="btn btn-outline-primary">Add New User</a> | 
            <a href="ViewUser2.php" class="btn btn-outline-primary">View User</a> | 
            <a href="ViewUser.php" class="btn btn-outline-primary">Update & Delete User</a> | 
            <a href="DepartmentAdd.php" class="btn btn-outline-primary">Add New Department</a> | 
            <a href="ViewDepartment.php" class="btn btn-outline-primary">View Department</a>
            <br>
            </div>
        </div>
	<div class="row">
	<div class="col-sm-5 mx-auto" style="-webkit-box-shadow: 2px 2px 33px 3px rgba(0,0,0,0.5);
-moz-box-shadow: 2px 2px 33px 3px rgba(0,0,0,0.5);
box-shadow: 2px 2px 33px 3px rgba(0,0,0,0.5); margin-top: 25px;">
		<br>
	<form action="" method="post">
		<div>
		<h1 class="text-center jumbotron bg-success text-white">ADD DEPARTMENT</h1>
		</div>
		<input type="text" class="form-control" name="name" required placeholder="Enter Department Name">
		<br>
        <textarea placeholder="Enter Description" class="form-control" name="description" cols="30" rows="8"></textarea>
		<br>
		<input type="submit" class="btn btn-outline-primary btn-block" value="Add" name="InsertBtn">
		<br>
	</form>
	</div>	
	</div>
	</div>
    
    
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

if(isset($_POST['InsertBtn']))
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$query = "insert into department (dept_name,description) values('$name','$description')";
	
	$run = mysqli_query($con,$query);
	
	if($run)
	{
		echo "<script>alert('Department Has Been Added Successfully');
        window.location.href = 'ViewDepartment.php';
		</script>";

	}
	else
	{
		echo "<script>alert('Department insertion Failed')</script>";
	}
	
}



?>