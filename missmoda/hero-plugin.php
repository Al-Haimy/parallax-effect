<?php

/*
    Plugin Name: Al-haimi Hero 
    Descripption: Herro for dynamic custom post
    Version: 1.0
    Author: AlHaimi
    Text Domain: wcpdomain
    Domain Path: /languages
 */

class WordCountAndTimePlugin
{
    function __construct()
    {
        add_action('admin_menu', array($this, 'adminPage'));
        add_action('admin_init', array($this, 'settings'));
        add_filter('the_content', array($this, 'ifWrap'));
    }
    function ifWrap($content)
    {
        if ((is_main_query() and is_single()) and (get_option('wcp_wordcount', '1') or
            get_option('wcp_charactercount', '1') or
            get_option('wcp_readtime', '1'))) {
            return $this->createHTML($content);
        }
        return $content;
    }
    function createHTML($content)
    {
        $html = '<h3>' . esc_html(get_option('wcp_headline', 'Post Statistics')) . '</h3><p>';

        if (get_option('wcp_wordcount', '1') or get_option('wcp_readtime', '1')) {
            $wordCount = str_word_count(strip_tags($content));
        }

        if (get_option('wcp_wordcount', '1')) {
            $html .= __('This post has', 'wcpdomain') . " " . $wordCount . " " . __('words', 'wcpdomain') . ".<br>";
        }

        if (get_option('wcp_charactercount', '1')) {
            $html .= "This post has " . strlen(strip_tags($content)) . " characters.<br>";
        }
        if (get_option('wcp_readtime', '1')) {
            $html .= "This post will take about " . round($wordCount / 225) . " minute(s) to read.<br>";
        }
        $html .= "</p>";
        if (get_option('wcp_location', '0') == '0') {
            return $html . $content;
        }
        return $content . $html;
    }
    function settings()
    {
        add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');

        add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
        register_setting('wordcountplugin', 'wcp_location', array('sanitize_callback' => array($this, 'sanitizedLocation'), 'default' => '0'));

        add_settings_field('wcp_headline', 'HeadLine text', array($this, 'headlineHTML'), 'word-count-settings-page', 'wcp_first_section');
        register_setting('wordcountplugin', 'wcp_headline', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Post Statistics'));

        add_settings_field('wcp_wordcount', 'Word Count', array($this, 'checkBoxHTML'), 'word-count-settings-page', 'wcp_first_section', array('theName' => 'wcp_wordcount'));
        register_setting('wordcountplugin', 'wcp_wordcount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));

        add_settings_field('wcp_charactercount', 'Character Count', array($this, 'checkBoxHTML'), 'word-count-settings-page', 'wcp_first_section', array('theName' => 'wcp_charactercount'));
        register_setting('wordcountplugin', 'wcp_charactercount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));

        add_settings_field('wcp_readtime', 'Read Time', array($this, 'checkBoxHTML'), 'word-count-settings-page', 'wcp_first_section', array('theName' => 'wcp_readtime'));
        register_setting('wordcountplugin', 'wcp_readtime', array('sanitize_callback' => 'sanitize_text_field', 'default' => '0'));
    }

    function sanitizedLocation($input)
    {
        if ($input != '0' and $input != '1') {
            add_settings_error('wcp_location', 'wcp_location_error', 'Display Location must be the biggneng or the end');
            return get_option('wcp_location');
        }
        return $input;
    }
    function checkBoxHTML($args)
    { ?>
        <input type="checkbox" name="<?php echo $args['theName'] ?>" value="1" <?php checked(get_option($args['theName']), '1') ?>>
    <?php


    }
    function headlineHTML()
    {
    ?>
        <input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')) ?>">
    <?php
    }
    function locationHTML()
    { ?>
        <select name="wcp_location" id="">
            <option value="0" <?php selected(get_option('wcp_location'), '0') ?>>Beginning of post</option>
            <option value="1" <?php selected(get_option('wcp_location'), '1') ?>>End of Post</option>
        </select>

    <?php
    }
    function adminPage()
    {
        add_options_page('Word Count Settings', __('Word Count', 'wcpdomain'), 'manage_options', 'word-count-settings-page', array($this, 'ourHTML'));
    }

    function ourHTML()
    { ?>

        <div class="wrap">
            <h1>Word count Settings</h1>
            <form action="options.php" method="post">

                <?php
                settings_fields('wordcountplugin');
                do_settings_sections('word-count-settings-page');
                submit_button();
                ?>
            </form>
        </div>
<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();
