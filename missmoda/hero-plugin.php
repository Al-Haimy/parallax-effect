<?php

/*
    Plugin Name: Al-haimi Hero 
    Descripption: Herro for dynamic custom post
    Version: 1.0
    Author: AlHaimi
 */

class WordCountAndTimePlugin
{
}

new WordCountAndTimePlugin();
add_action('admin_menu', 'ourPluginSettingsLink');
function ourPluginSettingsLink()
{
    add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings', 'ourSettingsPage');
}

function ourSettingsPage()
{ ?>

    Hello Word from our pluggin
<?php }
