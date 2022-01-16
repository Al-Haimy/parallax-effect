<?php

/*
    Plugin Name: Alhaimi Hero 
    Description: For the courses page
    Version: 1.0
    Author: Alhaimi
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class AreYOuPayingAttention
{
    function __construct()
    {
        add_action('enqueue_block_editor_assets', array($this, 'adminAssets'));
    }
    function adminAssets()
    {
        wp_enqueue_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
    }
}

$areYouPayingAttention = new AreYOuPayingAttention();
