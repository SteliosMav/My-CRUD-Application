<?php
include('dbconnection.php');

$id = $_GET['id'];
$query = "select u.user_name, ud.d_id, u.email from user as u
inner join user_department as ud on u.user_id = ud.u_id where user_id = '$id'";
//$query = "SELECT u.user_name, u.email, ud.d_id, u.datetime_created FROM user AS u inner JOIN user_department AS ud 
//ON u.user_id = ud.u_id INNER join department AS dd
//on dd.dept_id = ud.d_id where dd.dept_id = '$id'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_array($run);
//print_r($data);

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update User</title>
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
		
        <input type="hidden" name="id" value="<?php echo $id; ?>">
		
		<input class="form-control" type="text" name="name" value="<?php echo $data[0]; ?>" required placeholder="Enter User name">
		<br>
          <?php
							
				$query = "select * from department";
				$result = mysqli_query($con,$query);
				echo "<select name='department' class='form-control' required>
				<option value=''>Select Department</option>";
				while($row=mysqli_fetch_array($result))
				{
                    if($row[0] == $data[1])
                    {
                        echo "<option value='$row[1]' selected>$row[1]</option>";    
                    }
                    else
                    {
                        echo "<option value='$row[1]'>$row[1]</option>";    
                    }
				    
				}
				echo "</select>";
							
        ?>
		<br>
        <input class="form-control" type="email" name="email" value="<?php echo $data[2]; ?>" required placeholder="Enter User name">
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
    $department = $_POST['department'];
	$email = $_POST['email'];
	
    $q = "select * from department where dept_name = '$department'";
    $r = mysqli_query($con,$q);
    $d = mysqli_fetch_assoc($r);
    $dpt_id = $d['dept_id'];
    $dpt_name = $d['dept_name'];
    
	$query = "update user set user_name = '$name', email = '$email', departments = '$dpt_name' where user_id = '$id';";
    
    $query .= "update user_department set d_id ='$dpt_id' where u_id = '$id'";
	
	$run = mysqli_multi_query($con,$query);
	if($run)
	{
		echo "<script>alert('User Has Been Updated Sucessfully');
		window.location.href = 'ViewUser.php';
		</script>";
	}
	else{

		echo "<script>alert('User Updation Failed');
		window.location.href = 'ViewUser.php';
		</script>";
	}
	
}


?>