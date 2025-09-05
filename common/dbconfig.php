<?php
    $host="localhost";
    $username="root";
    $password =null;
    $database = "discussionboard";
    // echo "DB config file here";

    $conn = new mysqli($host,$username,$password,$database);

    if($conn->connect_error){
        die("Error occur");
    }else{
        // echo "Connection Successfull<br>";
    }


?>