<?php

if (!defined('ABSPATH')) {
    exit;
}

class AdminColumn
{
    public function init()
    {
        $this->define_constants();
        add_action('plugin_loaded', [$this, 'init_plugin']);
    }

    public function define_constants()
    {
        define(
            'ADMC_VERSION',
            defined('ADMC_DEV') ? time() : '1.0.0'
        );
        define('ADMC_PATH', \plugin_dir_path(__DIR__));
        define('ADMC__URL', \plugin_dir_url(__DIR__));
    }

    public function init_plugin()
    {
        $this->includes();
        $this->init_hooks();
    }

    public function includes()
    {

    }

    public function init_hooks()
    {
        load_plugin_textdomain('admin-column', false, ADMC_PATH . 'i18n/');
    }

}


