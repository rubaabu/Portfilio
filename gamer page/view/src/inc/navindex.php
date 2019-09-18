
<?php
$menuLinks = '
              
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
      <a class="font link mr-3" href="login.php"><i class="fa fa-user-plus"></i> Log in</a>
      </div>
    </div>
  </nav>