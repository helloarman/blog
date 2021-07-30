<?php
if (!defined('ABSPATH')) {
    exit;
}
const ATTIRE_BLOG_THEME_PREFIX = 'attire_blog_';


add_theme_support('title-tag');
if (!isset($content_width)) $content_width = 900;
if (is_singular()) wp_enqueue_script("comment-reply");

add_action('wp_enqueue_scripts', ATTIRE_BLOG_THEME_PREFIX . 'enqueue_assets');
function attire_blog_enqueue_assets()
{
    wp_register_style(ATTIRE_BLOG_THEME_PREFIX . 'google_fonts', 'https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap');
    wp_enqueue_style(ATTIRE_BLOG_THEME_PREFIX . 'google_fonts');
}

function attireBlogGetUrl()
{
    $url = isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
    $url .= '://' . (isset($_SERVER['SERVER_NAME']) ? wp_unslash($_SERVER['SERVER_NAME']) : '');
    $url .= in_array($_SERVER['SERVER_PORT'], array('80', '443')) ? '' : ':' . $_SERVER['SERVER_PORT'];
    $url .= $_SERVER['REQUEST_URI'];
    return $url;
}
