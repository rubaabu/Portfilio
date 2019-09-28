 <!-- if the session is set for this roles theyy will see this-->
 <?php if(isset($_SESSION['director']) || isset($_SESSION['eng']) || isset($_SESSION['dealer']) || isset($_SESSION['manager']) || isset($_SESSION['acc']) ) { ?>
 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" style="color:#17a2b8" href="userprofile.php">My profile</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
   
      <li class="nav-item active">
      <a class="nav-link " href="qmessage.php">Q messages</a>      
      </li>
      <?php if(isset($_SESSION['eng']) || isset($_SESSION['dealer']) || isset($_SESSION['manager']) || isset($_SESSION['acc'])) { ?>

      <li class="nav-item active">
        <a class="nav-link" href="sendRQ.php">Send request</a>
      </li>

       <?php } ?>

      
      
     
<!-- if the session is director he will see also this -->
 <?php if(isset($_SESSION['director'])) { ?>
      

        <li class="nav-item active">
        <a class="nav-link" href="users.php">Users <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="employees.php">Employees</a>
      </li>

      <?php } ?>

     
 <?php } ?>




<!-- if the session is user the navbar will be  -->
<?php if(isset($_SESSION['user'])) { ?>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" style="color:#17a2b8" href="userprofile.php">My profile</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

        <li class="nav-item active">
      <a class="nav-link " href="buy.php">Buy </a>      
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="applyJob.php">Apply for a job</a>
      </li>

      <?php } ?>

    </ul>
   

  </div> <a class="btn btn-info float-right" href ="logout.php?logout">Sign out</a><br><br>
</nav>