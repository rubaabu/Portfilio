<?php 
session_start(); 
if (!isset($_SESSION['user_roll'])) {
    header('Location: login.php');
}
?>
<html>
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
<div class="container mt-3">
    <div class="container text-white w-50 bg-info rounded" style="height: 450px;">
            <div class="h3 text-white text-center my-2 ">Support page</div>

            <form>                 
                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="check1" value="report user">
                    <label class="form-check-label" for="check1">Report User</label>
                </div>
                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="check1" value="support">
                    <label class="form-check-label" for="check1">Support</label>
                </div>
                <div class="form-check" >
                    <input class="form-check-input" type="radio" name="check1" value="suggestion">
                    <label class="form-check-label" for="check1">Suggestion</label> 
                </div>
                <br>
                <hr>                
                <div class="form-group" >
                    <label for="message">Message</label>
                    <textarea  class="form-control" id="message" rows="4" cols="50" > </textarea>
                </div>
                <div class="form-group text-center" >
                    <input type="button" id="submit" class="btn btn-dark" name="send" value="Send message" />
                </div>
            </form>
    </div><!--row-->
</div><!--container-->

<?php include 'src/inc/footer.php'; ?>

  <script>
    $('#submit').click(function() {

        let msg = document.querySelector('#message').value;
        let type = document.querySelector('input[name="check1"]:checked').value;

        $.ajax({
            method: 'POST',
            url: '../sys/actionFiles/supportmessageAction.php',
            data: { check1: type, message: msg }
        }).done(function() {
            window.location.href = 'userlanding.php';
        });
    });
  </script>

</body>

</html>