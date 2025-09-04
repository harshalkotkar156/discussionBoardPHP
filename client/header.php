<?php 
// Always start session at the top of the file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary margin-bottom-15">
  <div class="container-fluid">
    <a href="#" class="navbar-brand" >
        <img src="public/logo.png" alt="">
    </a>    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./">Home</a>
        </li>

        <?php if (!isset($_SESSION["user"]["username"])): ?>
            <li class="nav-item">
              <a class="nav-link" href="?signup=true">Sign-Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?login=true">Login</a>
            </li>
        <?php else: ?>
             <li class="nav-item">
              <a class="nav-link" href="./server/requests.php?logout=true">Logout</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="?ask=true">Ask a Question</a>
            </li>

           

        <?php endif; ?>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Latest Questions</a>  
        </li>
      </ul>
    </div>
  </div>
</nav>
