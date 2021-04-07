<?php
include('dbconnection.php');

$id = $_GET['id'];
$query = "select * from department where dept_id = '$id'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_array($run);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Department</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
	<div class="container">
	<div class="row">
	<div class="col-sm-4 mx-auto" style="-webkit-box-shadow: 2px 2px 33px 3px rgba(0,0,0,1);
-moz-box-shadow: 2px 2px 33px 3px rgba(0,0,0,1);
box-shadow: 2px 2px 33px 3px rgba(0,0,0,1); margin-top: 25px;">
		<br>
	<form action="" method="post">
	<div>
		<h1 class="text-center jumbotron bg-success text-white">UPDATE FORM</h1>
		</div>
		<input type="hidden" name="id" value="<?php echo $data[0]; ?>">
		
		<input class="form-control" type="text" name="name" value="<?php echo $data[1]; ?>" required placeholder="Enter Department name">
		<br>
         <textarea placeholder="Enter Description" value="" class="form-control" name="description" cols="30" rows="8"><?php echo $data[2]; ?></textarea>
		<br>
		<input type="submit" class="btn btn-outline-primary btn-block" value="Update" name="UpdateBtn">
	</form>
		<br>
		</div>
		</div>
		</div>
	<script src="jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php

if(isset($_POST['UpdateBtn']))
{
    $id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	
	$query = "update department set dept_name = '$name', description = '$description' where dept_id = '$id'";
	
	$run = mysqli_query($con,$query);
	if($run)
	{
		echo "<script>alert('Department Has Been Updated Sucessfully');
		window.location.href = 'ViewDepartment.php';
		</script>";
	}
	else{

		echo "<script>alert('Department Updation Failed')
		window.location.href = 'ViewDepartment.php';
		</script>";
	}
	
}


?>