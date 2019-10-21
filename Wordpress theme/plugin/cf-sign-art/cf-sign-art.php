<?php
/*
Plugin Name: Sign-art
Description: Adds a signature after articles
Version: 100.0
Author: ruba
Author URI: ruba.codefactory.live
*/

add_filter('the_content', 'signart');

function signart($content){
    if( !is_single() )
    return $content;
    $signart = '<div class ="alignright>"<em>
    this signature was added by sign-art plug-in...</em></div>';
    return $content . $signart;
}
?>