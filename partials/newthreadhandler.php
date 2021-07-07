<!-- Adding  the new thread to the database -->
<?php 
            include('dbconnect.php');
            session_start();
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $id=$_POST['catid'];
                $newthreadtitle=$_POST['newthreadtitle'];
                $newthreaddesc=$_POST['newthreaddesc'];
                $threadposterid=$_SESSION['userid'];
                //to stop someone from injecting js to the webpage
                $filteredtitle=str_replace("<", "&lt;", $newthreadtitle);
                $filteredtitle=str_replace(">", "&gt;", $filteredtitle);
                $filteredtitle=mysqli_real_escape_string($conn, $filteredtitle);
                $filtereddesc=str_replace("<", "&lt;", $newthreaddesc);
                $filtereddesc=str_replace(">", "&gt;", $filtereddesc);
                $filtereddesc=mysqli_real_escape_string($conn, $filtereddesc);
                $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `dt`) VALUES ( '$filteredtitle', '$filtereddesc', '$id', '$threadposterid', current_timestamp())";
                $request=mysqli_query($conn, $sql);
                
                if($request)
                {
                    header ("location: /discussion_forum/threadlist.php?catid=$id&insertionsuccess=true");
                }
                else
                header ("location: /discussion_forum/threadlist.php?catid=$id&insertionsuccess=false");
            }
        ?>