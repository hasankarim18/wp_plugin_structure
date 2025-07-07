<?php

if (!defined('ABSPATH')) {
    exit;
}

class CustomAdminColumn
{
    public function __construct()
    {
        // var_dump('ddfdf');
        add_filter('manage_posts_columns', [$this, 'add_post_custom_column']);
        add_action('manage_posts_custom_column', [$this, 'post_custom_column_content'], 10, 2);
        //** enqueue scripts */
        // make coulumn sortable 

        add_filter('manage_edit-post_sortable_columns', [$this, 'post_sortable_columns']);

        add_action('pre_get_posts', [$this, 'make_sorting_correct']);



    }

    public function add_post_custom_column($columns)
    {

        $columns['price'] = __('Price', 'admin-column-plugin');
        // $columns['rating'] = 'Rating';
        $columns['keywords'] = 'keywords';
        // error_log('******************************');
        // error_log(print_r($columns, true));
        // error_log('******************************');
        return $columns;
    }

    function post_custom_column_content($column, $post_id)
    {
        $screen = get_current_screen();
        if ($column === 'price') {
            $price = get_post_meta($post_id, 'price', true);
            echo esc_html($price);
            // echo $screen->id;
        } elseif ($column === 'keywords') {
            $keywords = get_post_meta($post_id, 'keywords', true);
            echo esc_html($keywords);
        }

    }

    /*** post sortable columns */
    function post_sortable_columns($columns)
    {
        $columns['price'] = 'price';
        $columns['keywords'] = 'keywords';
        $columns['author'] = 'author';
        // unset($columns['date']);
        // unset($columns['title']);
        return $columns;
    }

    function make_sorting_correct($query)
    {
        if ($query->get('orderby') === 'price') {
            $query->set('meta_key', 'price');
            $query->set('orderby', 'meta_value_num');
        }
    }


}

