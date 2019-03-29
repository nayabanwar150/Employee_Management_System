<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
</head>
<body>
	<?php
		$connection = mysqli_connect('localhost','root','','record');
		if ($connection) {
			echo "DataBase connected<br>";
		}
		else
		{
			echo "Connection Failed!<br>";
		}

	?>
</body>
</html>