<?php 
        include('dbconnect.php');

        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $username=$_POST['username'];
            $usermail=str_replace("<","&lt;",$username);
            $usermail=str_replace(">","&gt;",$usermail);
            $password=$_POST['userpassword'];
            $err="false"; //storing false as a string becoz passing it thru referel link (header)

            $sql=$conn->prepare("SELECT * FROM `users` WHERE `user_name`= ?");
            $sql->bind_param("s",$username);
            $sql->execute();
            $request=mysqli_stmt_get_result($sql);
            if($request)
            {
                $row=mysqli_fetch_assoc($request);
                if($row!=NULL && password_verify("$password", $row['user_password']))
                {
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['username']=$row['user_name'];
                    $_SESSION['usermail']=$usermail;
                    $_SESSION['userid']=$row['user_id'];
                }
                else
                $err="Invalid credentials";
            }
            else
            $err="Server Down! Pls try again after sometime";


            if($err=="false")
            header("Location: /discussion_forum/index.php?loginsuccess=true");

            else
            header("Location: /discussion_forum/index.php?loginerror=$err");
        
        }