<!DOCTYPE html>
<html lang="en">
 <head>
   <meta charset="<?php bloginfo('charset'); ?>">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
   <title><?php bloginfo('name'); ?></title>
   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet"> <!--displays the primary CSS-->
     
    <?php wp_head(); ?>

  </head>
 <body>


      <nav class="navbar navbar-expand-md navbar-light bg-secondary" role="navigation" id="navi">

   <div class="container">

       <!-- Brand and toggle get grouped for better mobile display -->

       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">

           <span class="navbar-toggler-icon"></span>

       </button>

       <a class="navbar-brand" href="#">Mount Everest</a>

           <?php

           wp_nav_menu( array(

               'theme_location'    => 'primary',

               'depth'             => 2, // 1 = no dropdowns, 2 = dropdown

               'container'         => 'div',

               'container_class'   => 'collapse navbar-collapse',

               'container_id'      => 'bs-example-navbar-collapse-1',

               'menu_class'        => 'nav navbar-nav',

               'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',

               'walker'            => new WP_Bootstrap_Navwalker(),

           ) );

           ?>

       </div>

   </nav>


   <div class="container">
     <div class="blog-header">
       <h1 class="blog-title">Mount Everest</h1>
       <p class="lead blog-description">A travel agency from Vienna</p>
     </div>