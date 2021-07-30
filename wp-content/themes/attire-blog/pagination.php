<?php
if (!defined('ABSPATH')) {
    exit;
}
global $wp_rewrite;
$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

$pagination = array(
    'base' => add_query_arg('paged', '%#%'),
    'format' => '',
    'total' => $wp_query->max_num_pages,
    'current' => $current,
    'show_all' => false,
    'type' => 'list',
    'prev_next' => true,
    'prev_text' => '<span class="arrow-left">&#10140;</span>',
    'next_text' => '<span class="arrow-right">&#10140;</span>',
    'screen_reader_text' => '',
);

if ($wp_rewrite->using_permalinks() && !is_search()) {
    $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
}

if (!empty($wp_query->query_vars['s'])) {
    $pagination['add_args'] = array('s' => get_query_var('s'));
}
?>
<div class="text-center">
    <?php
    echo wp_kses_post(str_replace('<ul class=\'page-numbers\'>',
        '<ul class="pagination mb-0 pl-1">',
        get_the_posts_pagination($pagination)));
    ?>
</div>
