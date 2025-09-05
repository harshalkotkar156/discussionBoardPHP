<div class="answer-box container">
    <h4>Answers:</h4>
    <?php
    $query= "select * from answers where question_id = $qid";
    $res = $conn->query($query);
    foreach($res as $ans){
        $answer = $ans['answer'];
        echo "<div class='row'>  
            <p class='answer-wrapper'>$answer</p>
        </div>";
    }
?>
</div>
