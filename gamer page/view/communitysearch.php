<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Group search</title>

  <!-- Bootstrap core CSS -->
    <?php include 'src/inc/lib.inc.php'; ?>
  

  <!-- Custom styles for this template -->
  <link href="src/inc/userland.css" rel="stylesheet">

</head>

<body>
<?php include 'src/inc/navbartop.php'; ?>
<nav class="navbar navbar-expand-lg bg-info mb-2 p-1 d-flex justify-content-center ">
  <form class="form-inline my-2 my-lg-0">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search for Community" aria-label="search" aria-describedby="button-addon2" id="searchbar" style="width:60vh;">
    </div>
    <div class="form-group">
      <a href="createcommunity.php"><button class="btn btn-dark" type="button" >Create Community</button></a>
    </div>
  </form>
</nav>

  

    <!-- Page Content -->
    
      <div class="container">      
          <div id="searchpanel" class="bg-info rounded">
          <div class="h2 text-center">Communities</div>
              <div class="bg-dark m-2" id="panel"> 

              <!--loop would come here-->  
                                                          
              </div><!--commlinst --> 
          </div>  <!--communities -->             
      </div><!--end container-->


  

<?php include 'src/inc/footer.php'; ?>

  


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });

    function renderUsers(input) {
            $.ajax({
                method: 'POST',
                url: '../sys/actionFiles/communitysearchAction.php',
                data: { search: input }
            }).done(function(res) {

                let json = JSON.parse(res);

                console.log(json);

                let group_list = '';

                for (let i = 0; i < json.length; i++) {
                    const group = json[i];
                    let tags = '';

                    $.ajax({
                      method: 'POST',
                      url: '../sys/actionFiles/communitysearchAction.php',
                      data: { get_tags: group.community_id }
                    }).done(function(res) {
                      res = JSON.parse(res);

                      for (let j = 0; j < res.length; j++) {
                        tags += res[j]['tags']+' ';
                      }

                      group_list += '<a href="community.php?community_id='+ group.community_id +'"><div class="row text-white my-1"><div class="col-md-3 text-center"><img class="friend img-fluid img-thumbnail rounded-circle" src="src/post_img/'+ group.community_img +'" alt="userpic"></div><div class="text-center col-md-6">'+ group.community_name +'</div><div class="text-center col-md-3"><p>'+ tags +'</p></div></div>';
                      document.querySelector('#panel').innerHTML = group_list;
                    });
                    
                }
                
                
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
