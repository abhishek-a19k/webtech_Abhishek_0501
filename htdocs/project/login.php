<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
    $flag=0;
    // If form submitted, insert values into the database.
    if(isset($_POST["username"], $_POST["password"])) 
        {     
        $name =$_POST["username"]; 
        $password =$_POST["password"]; 
        $sql="select username,password from user";
        $result= $con->query($sql);
        if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $result2= $row["username"];
        $result1= $row["password"];
    }

            if($name == $result2 && $password == $result1) 
            { 
                $_SESSION["username"] = $name; 
                header("Location: index.php");
            }
        else{
                $flag=1;
            }
    }
    }
?>
<div class="form">
<h1 style="font-size:75px;">Infi-Gyan Login</h1>
<form action="" method="POST" name="login.php">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required /><br><br>
<input name="submit" type="submit" value="Login" />
    <?php if($flag){echo "<br><br>Incorrect username or password try again";}?>
</form>
    <p><h1>Not registered yet?</h1> <a href='registration.php'><h1>Register Here</h1></a></p>


</body>
</html>