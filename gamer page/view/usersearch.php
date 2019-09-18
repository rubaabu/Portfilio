<?php
session_start();

$onlinefriends = array('FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName','FriendsName',);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Gamers search</title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

  <!-- Custom styles for this template -->
  <link href="src/inc/userland.css" rel="stylesheet">

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>
<nav class="navbar navbar-expand-lg bg-info mb-2 p-1">        
    <div class="row m-auto">
        <form class="form-inline">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for a Gamer's Nickname" aria-label="search" aria-describedby="button-addon2" id="searchbar" style="width: 60vh;">
        </div>
        </form>
    </div> <!--row-->
</nav>

  

    
    
<!-- Page Content -->
    
      <div class="container">      
          <div id="searchpanel" class="bg-info rounded">
          <div class="h2 text-center">Gamers </div>
              <div class="bg-dark m-2" id="panel"> 

              <!--loop would come here-->  
                                                          
              </div><!--commlinst --> 
          </div>  <!--communities -->             
      </div><!--end container-->
    
    <?php include 'src/inc/footer.php'; ?>

  

    <script>
        function renderUsers(input) {
            $.ajax({
                method: 'POST',
                url: '../sys/actionFiles/usersearchAction.php',
                data: { search: input }
            }).done(function(res) {

                let json = JSON.parse(res);

                console.log(json);

                let user_list = '';

                for (let i = 0; i < json.length; i++) {
                    const user = json[i];

                    let badge;
                    let bday = user.user_date_birth.split(" ");
                    let age = getAge(bday[0]);

                    if (user.user_badge == 'begginer') {
                        badge = 'beginner.png';
                    } else if (user.user_badge == 'advanced') {    
                        badge = 'advanced.png';
                    } else if (user.user_badge == 'intermediate') {
                        badge = 'intermediate.png';
                    } else {
                        badge = 'beginner.png';
                    }

                    user_list += '<a href="userprofile.php?userid='+ user.user_id +'" class="list-group-item bg-dark text-white p-1"><img class="friend img-fluid img-thumbnail rounded-circle mx-3" src="src/post_img/'+ user.user_img +'" alt="userpic"><img class="friend img-fluid img-thumbnail rounded-circle mx-3" src="src/img/'+ badge +'" alt="userpic">Nickname - '+ user.user_nickname +' - '+ age +' years old. - </a>';
                    
                }

                document.querySelector('#panel').innerHTML = user_list;
                
                
            });
        }

        $('#searchbar').keyup(function() {

            renderUsers(this.value);
            
        });

        $(document).ready(function() {

            renderUsers('');

        });
    </script>
 

</body>

</html>
