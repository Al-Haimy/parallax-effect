<?php

/*
    Plugin Name: Al-haimi Hero 
    Descripption: Herro for dynamic custom post
    Version: 1.0
    Author: AlHaimi
 */

class WordCountAndTimePlugin
{
    function __construct()
    {
        add_action('admin_menu', array($this, 'adminPage'));
        add_action('admin_init', array($this, 'settings'));
    }
    function settings()
    {
    }
    function adminPage()
    {
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings', array($this, 'ourHTML'));
    }

    function ourHTML()
    { ?>

        <div class="wrap">
            <h1>Word count Settings</h1>
        </div>
<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();
