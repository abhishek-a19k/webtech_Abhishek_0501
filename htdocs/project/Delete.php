<html>
    <title>Delete File</title>
    <body>
        <link rel="stylesheet" href="css/style.css" />
        <?php 
        $flag=0;
        include("auth.php");
        require('db.php');
        $username = $_SESSION['username'];
         if (isset($_POST['delete'])) 
         {
            $filename=$_POST['filename'];
            $chk=$_POST['filename'];
            $sql = "SELECT username FROM files WHERE filename = '$chk'";
            $result = mysqli_query($con,$sql);
            $row = $result->fetch_assoc();
            if(strcmp($username,$row["username"])==0)
            {
                $fp=$_POST['filename'] . ".txt";
                if(unlink($fp))
                    {
                        $flag=2;
                        $con->query ("DELETE from `files` where filename='$filename'");
                    }
                else
                    {
                        echo "file is not deleted";
                    }
            }
             else
             {
                 $flag=1;
             }
         }
        ?> 
        <div style="font-size:40px;">
        Delete existing File<br><br>
        <form action="delete.php" method="post">
        File Name: <input type="text" name="filename" value="">
        <input type="submit" name="delete" value="Delete File">
        </form>
        <?php if($flag==2){echo "File named $fp has been deleted successfully<br>";}?>
        <?php if($flag==1){echo "No file named $filename was found in your account<br><br>";}?>
        <input type="button" name="button" onclick="location.href='index.php'" value="Return to main page">
        </div>
    </body>
</html>