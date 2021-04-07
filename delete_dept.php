<?php

include('dbconnection.php');

$id = $_GET['id'];

$query = "delete from department where dept_id = '$id'";

$run = mysqli_query($con, $query);

if($run)
	{
		echo "<script>
	alert('Department has been Deleted Successfully');
	window.location.href = 'ViewDepartment.php';
	</script>";
	}
	else
	{
		echo "<script>
	alert('Department Deletion Failed..');
	window.location.href = 'ViewDepartment.php';
	</script>";
	}


?>