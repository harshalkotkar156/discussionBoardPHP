
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discuss</title>

    <?php include("./client/commonfiles.php") ?>
</head> 

<body>
    <?php
    session_start();
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    include("./client/header.php");
    if (isset($_GET['signup']) && (!isset($_SESSION['user']['username']) || empty($_SESSION['user']['username']))) {
        include("./client/signup.php");
    } else if (isset($_GET['login']) && (!isset($_SESSION['user']['username']) || empty($_SESSION['user']['username']))) {
        include("./client/login.php");
    } else if(isset($_GET['ask'])) {
        include("./client/ask.php");
    }else if(isset($_GET['q-id'])) {
        $qid = $_GET['q-id'];
        include("./client/question_details.php");
    }else if(isset($_GET['c_id'])){
        echo "Hello from C_ID<br>";
    }else{
        include("./client/questions.php");

    }

    ?>


</body>

</html>