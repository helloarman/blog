<?php
//Template Name: Framed Page
if (!defined('ABSPATH')) {
    exit;
}
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();

?>
    <div class="row">
        <?php
        AttireFramework::DynamicSidebars('left');
        do_action(ATTIRE_THEME_PREFIX . "before_main_content_area");
        ?>

        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <div id="single-page-<?php the_ID(); ?>" class="single-page framed">

                <?php while (have_posts()): the_post(); ?>

                    <div <?php post_class('post'); ?>>
                        <div class="clear"></div>
                        <?php do_action("attire_before_content"); ?>
                        <div class="entry-content">

                            <?php
                            $ph_active = AttireThemeEngine::NextGetOption('ph_active', true);

                            /*
                            if ( ! $ph_active ) {
                                ?>
                                <h1 class="page-title"><?php the_title(); ?></h1>
                            <?php } */ ?>

                            <?php the_post_thumbnail(); ?>
                            <?php the_content(); ?>
                            <div class="clear"></div>
                        </div>
                        <?php wp_link_pages(); ?>
                        <?php do_action("attire_after_content"); ?>
                    </div>
                    <?php if (comments_open()) { ?>
                        <div class=" mx_comments">
                            <?php comments_template(); ?>
                        </div>
                    <?php } ?>

                <?php endwhile; ?>

            </div>
        </div>

        <?php
        do_action(ATTIRE_THEME_PREFIX . "after_main_content_area");
        AttireFramework::DynamicSidebars('right'); ?>

    </div>
<?php
get_footer();
