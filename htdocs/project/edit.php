<html>
    <title>Edit_file</title>
    <body>
        <link rel="stylesheet" href="css/style.css" />
        <?php 
        $text="";
        $flag=0;
        include("auth.php");
        require('db.php');
        $username = $_SESSION['username'];
         if (isset($_POST['Edit'])||isset($_POST['submit'])) 
         {
             $chk=$_POST['filename'];
             $sql = "SELECT username FROM files WHERE filename = '$chk'";
             $result = mysqli_query($con,$sql);
             $row = $result->fetch_assoc();
              if(strcmp($username,$row["username"])==0)
                 {
                    $fp=$_POST['filename'] . ".txt";
                    $file = fopen($fp, "a+"); 
                    $size = filesize($fp);  
                    $text = fread($file, $size);
                    fclose($file);
                    if (isset($_POST['submit']))
                    {
                        $file = fopen($fp, "w");
                        $textread =$_POST['textdata'];
                        fwrite($file, $textread);
                        fclose($file);
                    }
                 }
             else
             {
                $flag=1;
             }
        }   
        ?> 
        <form action="index_2.php" method="post">
        File Name: <input type="text" name="filename" value="<?php if (isset($_POST['Edit'])){echo $_POST['filename'];}?>">
        <input type="submit" name="Edit" value="Check for file">
        <input type="submit" name="submit" value="Edit data"> <br><br>
        <?php if($flag==1){echo"No file found<br>";}?>
        <textarea rows="16" cols="100" name="textdata"><?php if(isset($_POST['Edit'])){echo $text;}?></textarea><br> 
        </form>
        <input type="button" name="button" onclick="location.href='index.php'" value="Return to main page">

    </body>
</html>