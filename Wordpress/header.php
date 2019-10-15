<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="<?php bloginfo('description'); ?>">
    <title><?php bloginfo('name'); ?></title>
    
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"><!--URL of the active theme's directory-->
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet"> <!--displays the primary CSS-->

    <?php wp_head(); ?>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-dark" role="navigation" id="navi">

<div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>

    <a class="navbar-brand" style="color: white;" href="index.php">My First Theme</a>

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
        <div class="blog_header">
            <h1 class="blog-title"> <?php bloginfo('name'); ?></h1>
            <p class="lead blog-description"><?php bloginfo('description'); ?></p>
        </div>
<!-- i did not close the html and body tags here cause i will close it in footer to be one body -->