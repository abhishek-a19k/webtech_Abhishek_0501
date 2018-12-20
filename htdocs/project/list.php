<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>List Files</title>
<link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <div style="font-size:50px;">
<?php
include("auth.php");
$username=$_SESSION['username'];
require('db.php');
$query = "SELECT * FROM files where username='$username'"; //You don't need a ; like you do in SQL
$result = mysqli_query($con,$query);
echo "The list of created files<br><br>";
echo "<table>"; // start a table tag in the HTML
echo "<th>File names</th>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['filename'] . "</td></tr>";  //$row['index'] the index here is a field name
}
echo "</table><br>";
?>
    <input type="button" name="button" onclick="location.href='index.php'" value="Return to main page">
        </div>
</body>
</html>