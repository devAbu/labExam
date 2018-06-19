<!DOCTYPE html>
<html lang='en'>
<head>
	<title>lab exam</title>
</head>

<body>
	<form action='index.php' method='POST'>
		<table width="300px" border="0" align="center">
			<tr>
				<th style="background-color:red;" colspan="2"> Student's Registration Form'</th>
			</tr>
			<tr>
				<td align="right" style="background-color:blue;">Student's name</td>
				<td style="background-color:blue;"> <input type="text" name="studentName" >
				<font color="red"><?php	 echo @$_GET['name']; ?></font></td>
			</tr>
			<tr>
				<td align="right" style="background-color:blue;">Father's Name </td>
				<td style="background-color:blue;"> <input type="text" name="fatherName">
				<font color="red"><?php	 echo @$_GET['name2']; ?></font></td>
			</tr>
			<tr>
				<td align="right" style="background-color:blue;">School's Name </td>
				<td style="background-color:blue;"> <input type="text" name="schoolName">
				<font color="red"><?php	 echo @$_GET['name3']; ?></font></td>
			</tr>
			<tr>
				<td align="right" style="background-color:blue;">Roll No </td>
				<td style="background-color:blue;"> <input type="number" name="rollNo">
				<font color="red"><?php	 echo @$_GET['name4']; ?></font></td>
			</tr>
			<tr>
				<td align="right" style="background-color:blue;">Class</td>
				<td style="background-color:blue;">
					<select name="class" >
						<option value="-1">Select class</option>
						<option value="10th">10th</option>
						<option value="9th">9th</option>
					</select>
					<font color="red"><?php echo @$_GET['name5']; ?></font></td>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"> <input type="Submit" name="submit" value="Send data"> </td>
			</tr>
		</table>
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

	$studentName = $_POST['studentName'];
	$fatherName = $_POST['fatherName'];
	$schoolName = $_POST['schoolName'];
	$rollNo = $_POST['rollNo'];
	$class = $_POST['class'];

	if($studentName == ""){
		echo "<script> window.open('index.php?name=Please fill this*', '_self')</script>";
		return false;
	}
	elseif($fatherName == ""){
		echo "<script> window.open('index.php?name2=Please fill this*', '_self')</script>";
		return false;
	}
	if($schoolName == ""){
		echo "<script> window.open('index.php?name3=Please fill this*', '_self')</script>";
		return false;
	}
	if($rollNo == ""){
		echo "<script> window.open('index.php?name4=Please fill this*', '_self')</script>";
		return false;
	}
	if($class == "-1"){
		echo "<script> window.open('index.php?name5=Please fill this*', '_self')</script>";
		return false;
	}else{

	$query = "INSERT INTO students(student_name, father_name, student_school, student_roll, class) VALUES ('$studentName', '$fatherName', '$schoolName', '$rollNo', '$class')";
	$result = mysqli_query($connection, $query);
	if($result){
		echo "<table align='center' border='1'><tr ><th colspan='6'>The following data has been inserted into database</th></tr><tr><th> Name</th> <th>Father name</th>
				<th>School</th> <th>Roll No</th> <th>Class </th>
				<tr><td>$studentName</td><td>$fatherName</td>
				<td>$schoolName</td><td>$rollNo</td><td>$class</td>";
	}
	}
	}
	mysqli_close($connection);
?>


</body>
</html>