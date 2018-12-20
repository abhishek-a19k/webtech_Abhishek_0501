<?php

include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
        <?php
        require('db.php');
        $flag=0;
        $username=$_SESSION['username'];
        if (isset($_POST['submit'])  && isset($_POST['filename'])) {
            $filename = stripslashes($_REQUEST['filename']); // removes backslashes
		    $filename = mysqli_real_escape_string($con,$filename);
            $sql = "SELECT * FROM files WHERE filename = '$filename'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>=1)
            {
                $flag=1;
            }
            else
            {
            if(!file_exists($_POST['filename'] . ".txt")){
                $file = tmpfile();
            }
            $file = fopen($_POST['filename'] . ".txt","a+");
            $text =$_POST["textdata"];
            file_put_contents($_POST['filename'] . ".txt", $text);
            fclose($file);
            $con->query ("INSERT into `files` VALUES ('$filename','$username')");
            }
        }
    ?>
<div style="font-size:45px;">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
   <form name="savefile" method="post" action="index.php">
        File Name: <input type="text" name="filename" value=""><?php if($flag==1){echo"<br>File name already exists";}?><br><br>
        <textarea rows="16" cols="100" name="textdata"></textarea><br>
        <input type="submit" name="submit" value="Save Note to Server">
       <input type="button" name="button" onclick="location.href='list.php'" value="Veiw list of existing files">
       <input type="button" name="button" onclick="location.href='edit.php'" value="Edit existing files">
       <input type="button" name="button" onclick="location.href='delete.php'" value="Delete existing files">
</form><br><br>

<input type="button" name="button" onclick="location.href='logout.php'" value="Logout">
    </div>    
</body>
</html>
