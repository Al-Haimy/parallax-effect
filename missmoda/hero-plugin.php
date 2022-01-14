<?php

/*
    Plugin Name: Al-haimi Hero 
    Descripption: Herro for dynamic custom post
    Version: 1.0
    Author: AlHaimi
 */
add_filter('the_content', 'addToEndOfPost');

function addToEndOfPost($content)
{
    return $content . '<p>My name is Alhaimi</p>';
}
