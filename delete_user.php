<?php

include('dbconnection.php');

$id = $_GET['id'];

//$query = "delete from user_department where u_id = '$id'";
$query = "delete from user where user_id = '$id'";


$run = mysqli_query($con, $query);

if($run)
	{
		echo "<script>
	alert('User has been Deleted Successfully');
	window.location.href = 'ViewUser.php';
	</script>";
	}
	else
	{
		echo "<script>
	alert('User Deletion Failed..');
    window.location.href = 'ViewUser.php';
	</script>";
	}


?>