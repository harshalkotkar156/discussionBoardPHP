
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<?php
    // echo "Hello from ask";

?>
<div class="container">
    
    <h2 class="heading">Ask a Question</h2>
<form method="post" action="/test/discussionBoardPHP/server/requests.php">
 
    <div class="sm-3 col-6 offset-sm-3 margin-bottom-15">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="enter title...">

  </div>

  <div class="sm-3 col-6 offset-sm-3 margin-bottom-15">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="description" placeholder="enter description..."></textarea>

  </div>
    
   <div class="sm-3 col-6 offset-sm-3 margin-bottom-15">
    <label for="category" class="form-label">Category</label>
    <?php
        include("category.php");
    ?>
    <!-- <input type="select" name="category" class="form-control" id="category" placeholder="select category"> -->

  </div>

  <button type="submit" name="ask" class="margin-bottom-15 col-6 sm-3 offset-sm-3 btn btn-primary">Add</button>
</form>

</div>