<?php

function theme_enqueue_styles()
{

    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles', 1000);

function my_child_theme_setup()
{
    load_child_theme_textdomain('coaching', get_stylesheet_directory() . '/languages');
}

add_action('after_setup_theme', 'my_child_theme_setup');

add_action('init', 'my_add_excerpts_to_pages');
function my_add_excerpts_to_pages()
{
    add_post_type_support('page', 'excerpt');
}


// Enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


//add_filter('https_ssl_verify', '__return_false');
////
//add_filter('https_local_ssl_verify', '__return_false');


function add_google_verification()
{ ?>
    <meta name="google-site-verification" content="QGz_0VQDMyn7b4j8LwNRqgWdrP7WkOIncHDqPVC4CwE"/>
<?php }

add_action('wp_head', 'add_google_verification');
