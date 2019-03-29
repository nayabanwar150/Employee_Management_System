<?php include 'nav.php' ?>
<?php
$connection = mysqli_connect('localhost','root','','record'); // Establishing connection with dataBase 
$Update_Record = $_GET['id'];
$ShowQuery = "SELECT * FROM emp_record WHERE id=$Update_Record ";
$Execute = mysqli_query($connection,$ShowQuery);
while($DataRows = mysqli_fetch_array($Execute))
			{
				$update_Id = $DataRows['id'];
				$Ename = $DataRows['ename'];
				$Ssn = $DataRows['ssn'];
				$Dept = $DataRows['dept'];
				$Salary = $DataRows['salary'];
				$HomeAddress = $DataRows['homeaddress'];
			}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update into DataBase</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	div{
		width: 500px;
		margin-left: 360px;
	}
	input[type="text"],textarea{
		border: 1px solid dashed;
		background-color: rgb(221,216,212);
		width: 480px;
		padding: 0.5em;
		font-size: 1.0em;
	}
	input[type="submit"]{
		color: white;
		font-size: 1.0em;
		font-family: Bitter,Georgia,Times,"Times New Roman",serif;
		width: 200px;
		height: 40px;
		background-color: #5D0580;
		border-radius: 35px;
		border-color: rgb(221,216,212);
		font-weight: bold;
		float: left;
	}
	.FieldInfo,.FieldInfoNew{
		color: rgb(251, 174,44);
		font-family: Bitter,Georgia,Times,"Times New Roman",serif;
		font-size: 1em;
	}
	.success{
		color: green;
		font-family: Bitter,Georgia,Times,"Times New Roman",serif;
		font-size: 1.5em;
		padding: 1em;
	}
</style>
<body>
	<div>
		<form  method="POST">
			<fieldset>
				<span class="FieldInfo">Employee Name :</span><br><input type="text" name="EName" value="<?php echo $Ename;?>"><br>
				<span class="FieldInfo">Social Security Number :</span><br> <input type="text" name="SSN" value="<?php echo $Ssn;?>"><br>
				<span class="FieldInfo">Department :</span><br> <input type="text" name="Dept" value="<?php echo $Dept;?>"><br>
				<span class="FieldInfo">Salary :</span> <br><input type="text" name="Salary" value="<?php echo $Salary;?>"><br>
				<span class="FieldInfo">Home Address :</span><br><textarea name="HomeAddress"><?php echo $HomeAddress;?></textarea><br>
				<input type="submit" name="Submit" value="Update">
			</fieldset>
		</form>
	</div>
</body>
</html>


<?php 

$connection = mysqli_connect('localhost','root','','record'); // Establishing connection with dataBase 
if(isset($_POST['Submit']))
{
	$Update_id = $_GET['id'];
	$Ename = $_POST['EName'];
	$Ssn = $_POST['SSN'];
	$Dept = $_POST['Dept'];
	$Salary = $_POST['Salary'];
	$HomeAddress = $_POST['HomeAddress'];
	$UpdateQuery = "UPDATE emp_record SET ename='$Ename', ssn='$Ssn', dept='$Dept', salary='$Salary', homeaddress='$HomeAddress' WHERE id=$Update_id";
	$Execute = mysqli_query($connection,$UpdateQuery);
	if($Execute)
	{
		echo  "<script>window.location.href = 'View_From_Database.php';</script>";
		//echo '<script>window.open("Update_Into_DataBase.php?Update=Record Updated Successfully","_self") </script>';
	}
}

?>