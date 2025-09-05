<div class="container ">
    <h4 class="heading">Question</h4>

    <?php
        include("./common/dbconfig.php");
        $query = "select * from questions where id = $qid";
        $res = $conn->query($query);
        $row = $res->fetch_assoc();
        // print_r($row);

        echo "<h4>Question: " . $row['title'] . " </h4> <br>
            <p>". $row['description'] ." </p>";
        include("answer.php")
        
    ?>

   <div class="col-6">
        <label for="answer" class="form-label">Answer here</label>

        <form action="./server/requests.php" method="post">
            <input type="hidden" name="question_id" value="<?php echo $qid; ?>" >
            <textarea name="answer" class=" col-6 sm-3 form-control" id="answer" placeholder="enter your answer..."></textarea>
            <br>
            <button type="submit" class="margin-bottom-15 col-6 sm-3  btn btn-primary">Write your Answer</button>
        </form>

   </div>

</div>