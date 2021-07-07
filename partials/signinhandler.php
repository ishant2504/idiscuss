<?php 
        include('dbconnect.php');

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $username=$_POST['username'];
            $username=str_replace("<","&lt;",$username);
            $username=str_replace(">","&gt;",$username);
            $username=mysqli_real_escape_string($conn,$username);
            $usermail=$_POST['usermail'];
            $usermail=str_replace("<","&lt;",$usermail);
            $usermail=str_replace(">","&gt;",$usermail);
            $usermail=mysqli_real_escape_string($conn, $usermail);
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            $err="false"; //storing false as a string becoz passing it thru referel link (header)

            $sql="SELECT * FROM `users` WHERE `user_name`= '$username'";
            $request=mysqli_query($conn, $sql);
            if($request)
            {
            $num=mysqli_num_rows($request);
            if($num!=0)
            $err='Username already in use. Pls try some other name.';

            else if($cpassword!=$password)
            $err='Passwords do not match. Pls enter same password in both the columns.';

            else{
                $hashpass= password_hash("$password", PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` ( `user_name`, `user_mail`, `user_password`) VALUES ('$username', '$usermail', '$hashpass')";
                $request=mysqli_query($conn, $sql);
                if($request)
                {
                header("Location: /discussion_forum/index.php?signupsuccess=true");
                exit();
                }
                else
                $err="Server down! Pls try again after sometime";
            }
            }
            else
            $err="Server down! Pls try again after sometime";

            header("Location: /discussion_forum/index.php?signupsuccess=false&signuperror=$err");
        }


?>