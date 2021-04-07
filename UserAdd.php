<?php
include('dbconnection.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Add</title>
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
            <br><br>
            
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-6 mx-auto">
            
    <div class="alert alert-info alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Note!</strong> A user can belong to multiple departments.
      </div>
                
            </div>
        </div>
	<div class="row">
	<div class="col-sm-4 mx-auto" style="-webkit-box-shadow: 2px 2px 33px 3px rgba(0,0,0,0.5);
-moz-box-shadow: 2px 2px 33px 3px rgba(0,0,0,0.5);
box-shadow: 2px 2px 33px 3px rgba(0,0,0,0.5);">
		<br>
	<form action="" method="post">
		<div>
		<h1 class="text-center jumbotron bg-success text-white">ADD USER</h1>
		</div>
		<input type="text" class="form-control" name="name" required placeholder="Enter Name">
		<br>
		<input type="email" class="form-control" name="email" required placeholder="Enter Email">
		<br>
		<input type="text" class="form-control" name="password" required placeholder="Enter Password">
		<br>
<!--		<input type="text" name="department" class="form-control" required placeholder="Enter Department">-->
        <?php
							
				$query = "select * from department";
				$result = mysqli_query($con,$query);
				echo "<select name='department' class='form-control' required>
				<option value=''>Select Department</option>";
				while($row=mysqli_fetch_array($result))
				{
				echo "<option value='$row[1]'>$row[1]</option>";
				}
				echo "</select>";
							
        ?>
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
	$email = $_POST['email'];
	$password = $_POST['password'];
	$department = $_POST['department'];
    
    $q = "select * from department where dept_name = '$department'";
    $r = mysqli_query($con,$q);
    $data = mysqli_fetch_array($r);
    $dpt_id = $data[0];
    
	$query = "insert into user (user_name,email,password,departments) values('$name','$email','$password','$department')";
	
	$run = mysqli_query($con,$query);
	$last_id = mysqli_insert_id($con);
//    echo $last_id . " " .$data[0];
    $query2 = "insert into user_department (u_id, d_id) values('$last_id','$dpt_id')";
    $run2 = mysqli_query($con,$query2);
    
	if($run)
	{
		echo "<script>alert('User Has Been Added Successfully');
                		window.location.href = 'ViewUser.php';
		</script>";

	}
	else
	{
		echo "<script>alert('Data Not Inserted..');
		window.location.href = 'ViewUser.php';
		</script>";
	}
	
}



?>