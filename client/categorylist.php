<!-- <div>

    <h2>Categories</h2>
    <?php
        // echo "In the categories<br>";
        
        // include("./common/dbconfig.php");

    ?>

</div> -->


<div>
    <h1 class="heading">Categories</h1>
    <?php  
    include("./common/dbconfig.php");

    $query="select * from category";
$result = $conn->query($query);
foreach($result as $row){
    $name=  ucfirst($row['name']);
    $id= $row['id'];
    echo "<div class='row question-list'>
    <h4><a href='?c-id=$id'>$name</a></h4>
    </div>";
}


    ?>
</div>