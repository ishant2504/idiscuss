<!-- Adding  the new comment to the database -->
<?php 
            include('dbconnect.php');
            session_start();
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $id=$_POST['threadid'];
                $newcommentdesc=$_POST['newcommentdesc'];
                $commenterid=$_SESSION['userid'];
                $filtereddesc=str_replace("<", "&lt;", $newcommentdesc);
                $filtereddesc=str_replace(">", "&gt;", $filtereddesc);
                $sql="INSERT INTO `comments` (`comment_user_id`, `comment_thread_id`, `comment_dt`, `comment_desc`) VALUES ('$commenterid', '$id', current_timestamp(), '$filtereddesc')";
                $request=mysqli_query($conn, $sql);
                
                if($request)
                {
                    // echo $id;
                    header("location:/discussion_forum/threads.php?threadid=$id&insertionsuccess=true" );
                }
                else
                header("location:/discussion_forum/threads.php?threadid=$id&insertionsuccess=false" );
                
            }
        ?>