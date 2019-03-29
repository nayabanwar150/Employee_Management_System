<?php
if(isset($_POST['Submit']))
{
	if (!empty($_POST['EName'] && !empty($_POST['SSN']))) {
		$EName = $_POST['EName'];
		$SSN = $_POST['SSN'];
		$Dept = $_POST['Dept'];
		$Salary = $_POST['Salary'];
		$HomeAddress = $_POST['HomeAddress'];
		$connection = mysqli_connect('localhost','root','','record'); // Establishing connection with dataBase
		$Query = "INSERT INTO emp_record(ename,ssn,dept,salary,homeaddress)VALUES('$EName','$SSN','$Dept','$Salary','$HomeAddress')";
		mysqli_query($connection,$Query);
		if (mysqli_query($connection, $Query)) {
    		echo '<span class="success">New record created successfully</span>';
		} else {
    		echo "Error: " . $Query . "<br>" . mysqli_error($connection);
		}
	}else
	{
		echo '<span class="FieldInfoNew">Please atleast Add Employee Name and Social Security Number</span>';
	}
	
}

?>
<?php include 'nav.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert into DataBase</title>
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
		<form action="insert_into_database.php?" method="POST">
			<fieldset>
				<span class="FieldInfo">Employee Name :</span><br><input type="text" name="EName" value=""><br>
				<span class="FieldInfo">Social Security Number :</span><br> <input type="text" name="SSN" value=""><br>
				<span class="FieldInfo">Department :</span><br> <input type="text" name="Dept" value=""><br>
				<span class="FieldInfo">Salary :</span> <br><input type="text" name="Salary" value=""><br>
				<span class="FieldInfo">Home Address :</span><br><textarea name="HomeAddress"></textarea><br>
				<input type="submit" name="Submit" value="Submit Your Record">
			</fieldset>
		</form>
	</div>
</body>
</html>