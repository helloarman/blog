<?php
if (!defined('ABSPATH')) {
    exit;
}
$posts_per_row = isset($args['posts_per_row']) ? $args['posts_per_row'] : 1;

?>
<article <?php post_class('post card card-horizontal card-vertical border-0 d-block'); ?>>
    <?php do_action(ATTIRE_THEME_PREFIX . 'before_content');
    $thumb_url = get_the_post_thumbnail_url(null, [300, 300]) ? get_the_post_thumbnail_url(null, [300, 300]) : get_stylesheet_directory_uri() . '/images/placeholder.png';
    ?>
    <a class="card-img-top" href="<?php the_permalink(); ?>"
       style="background-image: url(<?php echo esc_url($thumb_url); ?>);"></a>
    <div class="pb-3 pt-4 post-info">
        <a class="media float-left align-items-center" href="#">
            <?php echo get_avatar(get_the_author_meta('ID'), 36, '', '', array('class' => 'rounded-circle')); ?>
            <div class="media-body pl-2 d-inline-block" style="margin-bottom: -15px">
                by<span class="font-weight-semibold ml-2">
                    <a class="media float-left align-items-center"
                       href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></span>
                </span>
            </div>
        </a>
        <div class="mt-2 float-right text-right text-nowrap">
            <a class="meta-link d-inline-block mr-3" href="#">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/comments.svg" alt="comments">
                <?php echo esc_attr(get_comments_number()) ?>
            </a>
            <a class="meta-link d-inline-block mr-2" href="#">
                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/calender.svg" alt="date"
                     width="13">
                <a class="black bold align-middle"
                   href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_modified_date()); ?></a>
            </a>
        </div>
    </div>
    <div class="card-body px-0 pb-0 pt-3">

        <h2 class="h4 nav-heading mb-3 mt-0"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
        <?php
        $full_or_excerpt = AttireThemeEngine::NextGetOption('attire_archive_page_post_view', 'excerpt');
        if ($full_or_excerpt === 'full') {
            the_content();
        } else {
            the_excerpt();
        }
        ?>
        <br/>
        <a type="button" href="<?php the_permalink(); ?>"
           class="btn btn-primary mt-3"><?php _e('Continue Reading', 'attire-blog'); ?></a>
    </div>

    <?php do_action(ATTIRE_THEME_PREFIX . 'after_content'); ?>
</article>