
<?php
$menuLinks = '<li class="nav-item active mr-5">
              <a class="font nav-link" href="userlanding.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item mr-5">
              <a class="font nav-link" href="communitysearch.php">Communities</a>
              </li>
              <li class="nav-item mr-5">
              <a class="font nav-link" href="usersearch.php">Gamers</a>
              </li>
              <li class="nav-item mr-5">
              <a class="font nav-link" href="supportPage.php">Support</a>
              </li>
              
              ';

?>
<nav class="navbar navbar-expand-lg p-0" id="navbar">
    <a class="font " href="home.php"><img src="src/img/logo.jpg" class="rounded img-fluid mr-5" alt="logo" height="50" width="70"></a>
    <button class="mr-5 navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcontent" aria-controls="navbarcontent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-caret-square-o-down text-info text-center" style="font-size:30px;"></span>
    </button>  
    <div class="collapse navbar-collapse" id="navbarcontent">
      <ul class="navbar-nav mr-5">
        <?php echo $menuLinks;?>
      </ul>
      <div class="ml-auto">      
      <a class="font mr-3" href="logout.php"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Log out</a>
      <a class="font " href="userprofile.php?userid=<?php echo $_SESSION['user_id'] ?>"><img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/<?php echo $_SESSION['user_img'] ?>" alt="userpic"></a>
      </div>
    </div>
  </nav>