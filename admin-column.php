<?php


/*
Plugin Name: Admin Column
Plugin URI: https://example.com/my-plugin.html
Description: This is a simple plugin that demonstrates how to write a WordPress header for a plugin. It adds functionality to your site with minimal overhead.
Version: 1.0.0
Author: Jane Doe
Author URI: https://example.com/about-me.html
License: GPL2
Text Domain: my-plugin
*/

if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(plugin_dir_path(__FILE__) . 'includes/AdminColumn.php')) {
    include_once plugin_dir_path(__FILE__) . 'includes/AdminColumn.php';
}

$admin_column = new AdminColumn();
$admin_column->init();


