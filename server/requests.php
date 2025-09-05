<?php

    // echo "HElllo";
    session_start();
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
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
        $newId = $conn->insert_id;
        echo "new user added<br>";
        $_SESSION["user"] = [
            "userid"   => $newId,
            "username" => $username,
            "emailid"  => $emailid
        ];

        // $_SESSION["user"] = ["username"=>$username , "emailid"=>$emailid];
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
        $userid=0;
        $query = "select * from users where emailid = '$emailid' and password='$password'";// echo $query;
        $res = $conn->query($query);

        if($res->num_rows == 1){
            foreach($res as $row){
                $username = $row['username'];
                $userid = $row['id'];

            }

            echo $username . $userid;
            echo "<br>";
            $_SESSION['user']=["username"=>$username,"emaidid"=>$emailid,"userid"=>$userid];
            header("Location: /test/discussionboardphp");

        }else{
            // echo $res->num_rows;
            // echo "<br>";

        }
        // if()



    }else if(isset($_GET['logout'])){
        session_unset();
        header("Location: /test/discussionboardphp");

    }else if(isset($_POST['ask'])){
        
        // print_r($_POST['ask']);
        // print_r($_SESSION['user']);
        // echo $_POST['title'];
        // echo "<br>";
        $title = $_POST['title'];
        $description  = $_POST['description'];
        $categoryid = $_POST['category'];
        $userid = $_SESSION['user']['userid'];
        $stmt = $conn->prepare("INSERT INTO `questions` (`title`, `description`, `categoryid`, `userid`) VALUES (?, ?, ?, ?)");
        
        // bind parameters (ssss = 4 strings)
        $id=NULL;
        $stmt->bind_param("ssss",$title, $description, $categoryid, $userid);

        // execute
        if ($stmt->execute()) {
            $newId = $conn->insert_id;
            echo "new user added<br>";
            header("Location: /test/discussionboardphp");
            exit; // always good to stop further execution

        } else {
            echo "error in adding new question: " . $stmt->error . "<br>";
        }
        

    }else if(isset($_POST['answer'])){
        $answer = $_POST['answer'];
        $question_id = $_POST['question_id'];
        $userid = $_SESSION['user']['userid'];
        $stmt = $conn->prepare("INSERT INTO `answers` (`answer`, `question_id`, `userid`) VALUES (?, ?, ?)");
        
        // bind parameters (ssss = 4 strings)
        $id=NULL;
        $stmt->bind_param("sss",$answer, $question_id, $userid);

        // execute
        if ($stmt->execute()) {
            $newId = $conn->insert_id;
            echo "Answer is added sucessfully<br>";
            header("Location: /test/discussionboardphp?q-id=$question_id");
            exit; // always good to stop further execution

        } else {
            echo "Answer is not sumitted " . $stmt->error . "<br>";
        }


    }else{
        echo "new question not added<br>";
    }

?>