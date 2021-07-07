<?php
    session_start();
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true)
    {
        session_unset();
        session_destroy();
        header('Location: /discussion_forum/index.php?logoutsuccess=true');
    }

?>