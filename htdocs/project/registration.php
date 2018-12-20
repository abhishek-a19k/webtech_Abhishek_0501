
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
    $flag1=0;
    $flag2=0;
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
        $email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		$trn_date = date("Y-m-d H:i:s");
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>=1)
            {
                $flag1=1;
            }
         $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>=1)
            {
                $flag2=1;
            }
        if($flag1==0&&$flag2==0){
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '$password', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            $flag1=2;
            $flag2=2;
        }
    }}
?>
<div class="form">
<h1 style="font-size:65px;"> Infi-Gyan Registration</h1>
<form name="registration" action="" method="POST">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="email" name="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required /><br>
<input type="password" name="password" placeholder="Password" required /><br><br><br>
    <?php if($flag1==1){ echo "Name already exists<br>"; } ?>
    <?php if($flag2==1){ echo "Email already exists<br>"; } ?>
    <?php if($flag2==2&&$flag1=2){ echo "Congratulations you have succesfully registered"; } ?>
<input type="submit" name="submit" value="Register" /> &nbsp; <input type="button" name="button" onclick="location.href='login.php'" value="Goto login page" />
</form><br>
<p style="font-size:40px; color:white;">Simply better.</p>
    </div>
</body>
</html>
