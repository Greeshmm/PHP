<!doctype html>
<?php
$con=mysqli_connect("localhost","root","","personal");
?>
<html>
<head>
<meta charset="utf-8">
<title>Student</title>
</head>
<body>
<?php 
if(isset($_POST['update']))
{
	$id=$_POST['id'];
	echo($id);
	$sql2="select * from details where id='$id'";
	$res1=mysqli_query($con,$sql2);
	$row=mysqli_fetch_array($res1);
	?>
	<form  action="#" name="student" method="post">
	<table border="1" background="digiresidency/images/testimonial_person2.jpg">
	<tr><th>Name:</th><td><input type="text" name="name" id="name" value="<?php echo($row['name']); ?>"></td></tr>
	<tr><th>Age:</th><td><input type="text" name="age" id="age" value="<?php echo($row['age']); ?>"></td></tr>
	<tr><th>Address:</th><td><input type="text" name="address" id="address" value="<?php echo($row['address']); ?>"></td></tr>
	<tr><th></th><td><input type="hidden" name="uid" value="<?php echo($id);?>">
	<input type="submit" value="update" name="updates"></td></tr>
	</table>
	</form>
<?php
}
else
{?>
	<form  action="#" name="student" method="post">
	<table border="1">
	<tr><th>Name:</th><td><input type="text" name="name"></td></tr>
	<tr><th>Age:</th><td><input type="text" name="age"></td></tr>
	<tr><th>Address:</th><td><input type="text" name="address"></td></tr>
	<tr><th></th><td><input type="submit"  name="submit"></td></tr>
	</table>
	</form>
<?php
}
?>
<br>
<br>
<br>

<?php 
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$age=$_POST['age'];
	$address=$_POST['address'];
$sql="INSERT INTO `details`( `name`, `age`, `address`) VALUES ('$name','$age','$address')";
	$res=mysqli_query($con,$sql);
}
	if(isset($_POST['Delete']))
	{
		$id=$_POST["id"];
		$sql="DELETE FROM `details` WHERE id='$id'";
		$res=mysqli_query($con,$sql);
		
	}
	
if(isset($_POST['updates']))
{
	$name=$_POST['name'];
	$place=$_POST['age'];
	$phone=$_POST['address'];
	$id=$_POST['uid'];
	$sql="UPDATE `details` SET `name`='$name',`age`='$age',`address`='$address' WHERE id='$id'";
	$res=mysqli_query($con,$sql);
}
?>
<?php
	$sql1="Select * from details";
	$res=mysqli_query($con,$sql1);
	$r=mysqli_num_rows($res);
	if($r)
	{
	?>
<table border="5px">
	<tr><th>ID</th><th>Name</th><th>Age</th><th>Address</th><th>Action</th></tr>
	<?php
	$sql1="Select * from details";
	$res=mysqli_query($con,$sql1);
	while($row=mysqli_fetch_array($res))
	{
		?>
		<form action="#" method="post">
		<?php
		echo("<tr><th>".$row['id']."</th><th>".$row['name']."</th><th>".$row['age']."</th><th>".$row['address']."</th>");
		?>
		<th><input type="hidden" name="id" value="<?php echo($row['id'])?>">
			<input type="submit" value="update" name="update"></th>
		<th><input type="submit" value="Delete" name="Delete"></th></tr>
	<?php
	}
	}
	?>
</table>
</body>
</html>
