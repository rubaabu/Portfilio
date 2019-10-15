<?php 
// Register Nav Walker class_alias
require_once('class-wp-bootstrap-navwalker.php');
//Theme Support
function wpd_theme_setup(){
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}
//the first argument is stating when something must be executed
    //the second argument is what should be executed
add_action('after_setup_theme','wpd_theme_setup');


function set_excerpt_length(){
    return 45;
}
 add_filter('excerpt_length','set_excerpt_length'); // reduce the num of char thet ate displayed under the blog post -->

add_theme_support('pot-thumpnails'); // include support fpr the featured image in blog post
