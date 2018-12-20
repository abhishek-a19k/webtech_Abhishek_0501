<?php

$username= $_POST['username'];
$password= $_POST['password'];

if(isset($_POST['login.php'])){
	
	
}


<html>
<head>
<title>Form</title>
</head>




<body>
<div class="container" >
  <div class="jumbotron">
<form name="myForm" action="success.html" onsubmit="return checkForm(this);" method="post">
Name: <input type="text" name="username"><br>
Email: <input type="text" name="email" id="txtEmail"><br>
Password:<input type="password" name="pwd1"><br>
Re-type Password:<input type="password" name="pwd2"><br><br>
<input type="reset" value="Reset"><br><br>
  <button type='submit' name='submit' value="Submit" onclick='Javascript:checkEmail();'/>Submit</button><br>

</form>


</form>


</html>