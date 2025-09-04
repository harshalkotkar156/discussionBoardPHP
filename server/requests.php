<?php

    // echo "HElllo";
    session_start();

    include("../common/dbconfig.php");
    if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $emailid  = $_POST['emailid'];
    $password = $_POST['password'];
    $address  = $_POST['address'];

    // prepare statement with placeholders
    $stmt = $conn->prepare("INSERT INTO `users` (`username`, `emailid`, `password`, `address`) VALUES (?, ?, ?, ?)");
    
    // bind parameters (ssss = 4 strings)
    $id=NULL;
    $stmt->bind_param("ssss",$username, $emailid, $password, $address);

    // execute
    if ($stmt->execute()) {
        echo "new user added<br>";
        $_SESSION["user"] = ["username"=>$username , "emailid"=>$emailid];
        header("Location: /test/discussionboardphp");
        exit; // always good to stop further execution


    } else {
        echo "error in adding new user: " . $stmt->error . "<br>";
    }
}
else if(isset($_POST['login'])){
        // echo ($_POST['emailid']);echo "<br>";
        // echo ($_POST['password']);echo "<br>";

        $emailid  = $_POST['emailid'];
        $password = $_POST['password'];
        $username ="";
        $query = "select * from users where emailid = '$emailid' and password='$password'";// echo $query;
        $res = $conn->query($query);

        if($res->num_rows == 1){
            foreach($res as $row){
                $username = $row['username'];
            }
            echo $username;
            echo "<br>";
            $_SESSION['user']=["username"=>$username,"emaidid"=>$emailid];
            header("Location: /test/discussionboardphp");

        }else{
            // echo $res->num_rows;
            // echo "<br>";

        }
        // if()



    }else if(isset($_GET['logout'])){
        session_unset();
        header("Location: /test/discussionboardphp");

    }else{
        echo "new user not registerd<br>";
    }

?>