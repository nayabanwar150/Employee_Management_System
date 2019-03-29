<?php include 'nav.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>View From DataBase</title>
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
		<form action="Search_From_Database.php" method="GET">
			<fieldset>
				<input type="text" name="Search" value="" placeholder="Search Record By Employee Name or SSN">
				<input type="Submit" name="SearchButton" value="Search">
			</fieldset>
		</form>
	</div>
<?php 
	$connection = mysqli_connect('localhost','root','','record'); // Establishing connection with dataBase
	if(isset($_GET['SearchButton']))
	{
		$Search = $_GET['Search'];
		$SearchQuery = "SELECT * From emp_record WHERE ename='$Search' OR ssn='$Search'";
		$Execute = mysqli_query($connection,$SearchQuery);
		while($DataRows = mysqli_fetch_array($Execute))
		{
				$Id = $DataRows['id'];
				$Ename = $DataRows['ename'];
				$Ssn = $DataRows['ssn'];
				$Dept = $DataRows['dept'];
				$Salary = $DataRows['salary'];
				$HomeAddress = $DataRows['homeaddress'];
?>
<table width="1000" border="5" align="center">
	<caption>Search Results</caption>
	<tr>
		<th>ID</th>
		<th>Employee Name</th>
		<th>SSN</th>
		<th>Department</th>
		<th>Salary</th>
		<th>Home Address</th>
	</tr>
	<tr>
		<td><?php echo $Id ?></td>
		<td><?php echo $Ename ?></td>
		<td><?php echo $Ssn ?></td>
		<td><?php echo $Dept ?></td>
		<td><?php echo $Salary ?></td>
		<td><?php echo $HomeAddress ?></td>
	</tr>
</table>
<?php }
	} 
?>

<table width="1000" border="5" align="center">
	<caption>View From DataBase</caption>
	<tr>
		<th>ID</th>
		<th>Employee Name</th>
		<th>SSN</th>
		<th>Department</th>
		<th>Salary</th>
		<th>Home Address</th>
		<th>Delete</th>
		<th>Update</th>
	</tr>
	
		<?php
			$connection = mysqli_connect('localhost','root','','record'); // Establishing connection with dataBase
			$ViewQuery = "SELECT * From emp_record";
			$Execute = mysqli_query($connection,$ViewQuery);
			while($DataRows = mysqli_fetch_array($Execute))
			{
				$Id = $DataRows['id'];
				$Ename = $DataRows['ename'];
				$Ssn = $DataRows['ssn'];
				$Dept = $DataRows['dept'];
				$Salary = $DataRows['salary'];
				$HomeAddress = $DataRows['homeaddress'];
		?>
	<tr>
		<td><?php echo $Id ?></td>
		<td><?php echo $Ename ?></td>
		<td><?php echo $Ssn ?></td>
		<td><?php echo $Dept ?></td>
		<td><?php echo $Salary ?></td>
		<td><?php echo $HomeAddress ?></td>
		<td><a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
		<td><a href="Update.php?id=<?php echo $Id; ?>">Update</a></td>
	</tr>
	<?php } ?> 
</table>
	
</body>
</html>