<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <?php include 'src/inc/lib.inc.php'; ?>

</head>
<body>
<?php include 'src/inc/navbartop.php'; ?>

<!--start carousel  -->  
<div class="bd-example mb-3">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div style="height: 480px; background-color: rgba(255,0,0,0.1);" class="carousel-item active">
            <img src="src/img/r6.jpg" class="d-block w-100" alt="Rainbow 6">
                <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Rainbow 6</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                </div>
            </div>
            <div style="height: 480px; background-color: rgba(255,0,0,0.1);" class="carousel-item">
            <img src="src/img/mario.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Mario Party</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                </div>
            </div>
            <div style="height: 480px; background-color: rgba(255,0,0,0.1);" class="carousel-item">
            <img src="src/img/rocket.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <!-- <h5>Rocket League</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>
</div><!--end of carousel-->
<div class="container">
    <marquee behavior="scroll" direction="right"><h4 class="text-info">Features<i class="fa fa-arrow-down" aria-hidden="true"></i></h4></marquee>

    <div id="features" class="mb-2"><!--features cards-->
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class=" feat card text-center">
                    <i style="font-size:40px;" class="fa fa-download mt-2"></i>                    
                    <div class="card-body">
                        <h5 class="card-title hvr-float-shadow">Card title1</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!--end col-->
            <div class=" col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="feat card text-center">     
                    <i style="font-size:40px;" class="fa fa-download mt-2"></i>                 
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!--end col-->
            <div class=" col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="feat card text-center ">  
                    <i style="font-size:40px;" class="fa fa-download mt-2"></i>                   
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!--end col-->
            <div class=" col-lg-3 col-md-4 col-sm-12 mb-3">
                <div class="feat card text-center">
                    <i style="font-size:40px;" class="fa fa-download mt-2"></i> 
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div><!--end col-->
        </div>
    </div><!--end row features-->
    <div id="news mb-2">
        <marquee behavior="scroll" direction="up"><h4 class="text-info">News</h4></marquee>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="bg-info card text-center">  
                    <img src="" alt="">                  
                    <div class="card-body">
                        <h5 class="card-title">News title</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><a href=""><small class="text-left">Read more</small></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="bg-info card text-center">  
                    <img src="" alt="">                  
                    <div class="card-body">
                        <h5 class="card-title">News title</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><a href=""><small class="text-left">Read more</small></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="bg-info card text-center">  
                    <img src="" alt="">                  
                    <div class="card-body">
                        <h5 class="card-title">News title</h5>
                        <p class="card-text">This is a longer card It's a broader card with text below as a natural lead-in to extra content. This content is a little longer. This content is a little bit longer.</p>
                        <p class="card-text text-left"><a href=""><small class="text-left">Read more</small></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!--end container-->

<?php include 'src/inc/footer.php'; ?>
<script>
$('.carousel').carousel({
  interval: 500
})
</script>
    <script src="src/js/ajaxLogin.js"></script>
</body>
</html>