<?php
    //connecting to database
    $servername="localhost";
    $username="root";
    $password="";
    $database="idiscuss";

    $conn=mysqli_connect($servername, $username, $password, $database);
    if(!$conn) die ("Couldnt Connect to database. Pls try again later");
?>