<!DOCTYPE html>
<html lang='en'>
<head>
	<title>search</title>
</head>

<body>

	<form action="index2.php" method="POST">
		<h1 style="color:red;"> Search student</h1>
		<input type="text" name="search"  placeholder="enter student name">
		<font color="red"><?php	 echo @$_GET['abu']; ?></font>
		<input type="Submit" value="Search" name="submit">
	</form>

	<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$databaseName = "school";

	$connection = mysqli_connect($host, $username, $password);
	if(!$connection){
		die("Connection failed".mysqli_error());
	}else{
		echo "Conection is good";
	}

	$select = mysqli_select_db($connection, $databaseName);
	if(!$select){
		die("Selection falied".mysqli_error());
	}else{
		echo "Selection is good";
	}

	if(isset($_POST['submit'])){
	$studentName = $_POST['search'];

	if($studentName == ""){
		echo "<script> window.open('index2.php?abu=Please fill this*', '_self')</script>";
		return false;
	}else{
		$query = "SELECT * FROM students WHERE student_name = '$studentName'";
		$result = mysqli_query($connection, $query);
		 if($result->num_rows > 0){
		 	 while($row = $result->fetch_assoc()){
			 	 echo "<br>" .$row['student_name']. " " .$row['father_name']. " " .$row['student_school']. " " .$row['student_roll']. " " .$row['class'];
			 }
		 }else{
		 	 echo "No records";
		 }
	}



	}
	mysqli_close($connection);
	?>


</body>
</html>