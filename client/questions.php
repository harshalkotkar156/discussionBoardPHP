<!-- 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



<div class="">

<div class="container">
    <h1 class="heading">Questions</h1>

    <?php
        // include("./common/dbconfig.php");
        // $query = "select * from questions";
        // $res = $conn->query($query);
        //     // echo '<table class="table table-bordered table-striped">';
        //     // echo '<thead><tr><th>Category ID</th><th>Title</th><th>Description</th></tr></thead><tbody>';
        //     foreach($res as $row){
        //         $title = $row['title'];
        //         $id = $row['id'];
        //         echo "<div class='row questions-list'>
        //             <a href='?q-id=$id' >$title</a> 
        //         </div>";
        //     }
            

    ?>

</div>

<div class="col-4">
    <?php
        // include("categorylist.php")
    ?>
</div>
</div> -->



<div class="container">

    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php
            include("./common/dbconfig.php");

            if (isset($_GET["c-id"])) {
                $cid = $_GET['c-id'];
                $query = "select * from questions where categoryid=$cid";
            } else if (isset($_GET["u-id"])) {
                $query = "select * from questions where user_id=$uid";
            } else if (isset($_GET["latest"])) {
                $query = "select * from questions order by id desc";
            } else if (isset($_GET["search"])) {
                $search = $_GET["search"];
                $query = "select * from questions where `title` LIKE '%$search%' ";
            }else {
                $query = "select * from questions";
            }
            $result = $conn->query($query);
            foreach ($result as $row) {
                $title = $row['title'];
                $id = $row['id'];
                echo "<div class='row question-list'>
    <h4 class='my-question'><a href='?q-id=$id'>$title</a>";
    echo $id?"<a href='./server/requests.php?delete=$id'>Delete</a>":NULL;
    echo "</h4></div>";
            }
            ?>
        </div>
        <div class="col-4">
            <?php 
                include("categorylist.php");
             ?>
        </div>
    </div>
</div>