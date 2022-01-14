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
        add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');
        add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
        register_settings('wordcountplugin', 'wcp_location', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    }

    function locationHTML(){?>
Hello

    <?php}
    function adminPage()
    {
        add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHTML'));
    }

    function ourHTML()
    { ?>

        <div class="wrap">
            <h1>Word count Settings</h1>
            <form action="options.php" method="post">

            <?php 
            do_settings_sections('word-count-settings-page');
            submit_button();
            ?>
            </form>
        </div>
<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();
