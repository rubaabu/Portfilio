<?php
session_start();
if (!isset($_SESSION['user_roll'])) {
  header('Location: login.php');
} else if ($_SESSION['user_roll'] == 'user') {
  header('Location: userlanding.php');
}

$tools = array(
  array('Ban user','banuser.php'),
  array('Support messages','admsupport.php'),
  array('Create game','creategame.php')
);

$button = array('circbtn.png','r2btn.png','sqrbtn.png','tribtn.png','xby.png','xbx.png');
$btnlenght = count($button); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Adm Panel</title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

  <!-- Custom styles for this template -->
  <link href="src/inc/simple-sidebar.css" rel="stylesheet">

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>

  <div class="d-flex" id="wrapper" >


    <!-- Page Content -->
    <div id="page-content-wrapper">
      

      <div class="container-fluid">
      <div class="row">
                    <?php 
                    foreach($tools as $key => $value)
                    {
                        $ranNumber = rand(0,$btnlenght-1);
                        echo ' 
                        <div class="col-lg-2 col-md-3 col-sm-6 mb-2 p-0" style="height: 120px;">
                            <div class="text-center mx-3 bg-info rounded">
                            <p>'.$value[0].'</p>
                            <a href="'.$value[1].'"><img class="mb-2" src="src/img/'.$button[$ranNumber].'" alt="button'.$button[$ranNumber].'" height="60" width="60"></a>
                            </div>
                        </div>';
                    }
                   
                    ?>
      </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php include 'src/inc/footer.php'; ?>

  


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
