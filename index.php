<?php
session_start();
if(!isset($_SESSION['username'])) {
    header('location: login.php');
    exit;
}    
include_once("config.php"); 
 
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>View</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <div class="add-container">
    <a href="add.php">Add New User</a><br/><br/>
    </div>
    <div class="container-view"> 
    <table width='50%' border=7>
 
    <tr>
        <th bgcolor="red">NIM</th> <th bgcolor="red">Name</th> <th bgcolor="red">Jurusan</th> <th bgcolor="green">Update</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['nim']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['jurusan']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    <div class="container-logout">
        <form action="logout.php" method="POST" class="login-email">
            <div class="input-group">
                <button type="submit" class="btn">Logout</button>
            </div>
        </form>
    </div>
    </table>
    </div>
</body>
</html>