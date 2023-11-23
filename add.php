<html>
<head>
	<title>Add Users</title>
	<link rel="stylesheet" href="style.css">
</head>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>NIM</td>
				<td><input type="number" min="1" maxlength="10" name="nim"></td>
			</tr>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr> 
				<td>Jurusan</td>
				<td><select name="jurusan">
				<option value="RPLG">RPLG</option>
				<option value="AKN">AKN</option>
				<option value="DKV">DKV</option>
				<option value="TKJ">TKJ</option></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$nim = $_POST['nim'];
		$name = $_POST['name'];
		$jurusan = $_POST['jurusan'];

		// include database connection file
		include_once("config.php");
				
		// Insert user data into table
		$result = mysqli_query($conn, "INSERT INTO users (nim, nama, jurusan) VALUES('$nim', '$name','$jurusan')");
		
		// Show message when user added
		echo "User added successfully. <a href='index.php'>View Users</a>";
	}
	?>
</body>
</html>