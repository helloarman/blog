<?php
if (!defined('ABSPATH')) {
    exit;
}
get_header();
$meta_position = AttireThemeEngine::NextGetOption('attire_single_post_meta_position', 'after-title');
$author_box = AttireThemeEngine::NextGetOption('attire_single_post_author_box', 'show');
$page_header_active = AttireThemeEngine::NextGetOption('ph_active', true);

$navigation_buttons = AttireThemeEngine::NextGetOption('attire_single_post_post_navigation', 'show');
$navigation_buttons = $navigation_buttons === 'show' ? 'canshow' : 'noshow';


$encoded_url = attireBlogGetUrl();
?>

    <div class="row">
        <?php AttireFramework::DynamicSidebars('left');
        do_action(ATTIRE_THEME_PREFIX . "before_main_content_area");
        ?>
        <!-- Content-->
        <div class="<?php AttireFramework::ContentAreaWidth(); ?> attire-post-and-comments">
            <div class="bg-white py-4 mb-2 mb-sm-0 pb-sm-5 single-post">
                <?php

                while (have_posts()): the_post(); ?>
                    <?php
                    if ($meta_position === 'after-content') {
                        get_template_part('single', 'post-meta');
                    } ?>

                    <?php if (!$page_header_active) { ?>
                        <h1 class="single-post-title">
                            <?php
                            do_action(ATTIRE_THEME_PREFIX . 'before_post_title');
                            the_title();
                            do_action(ATTIRE_THEME_PREFIX . 'after_post_title');
                            ?>
                        </h1>
                        <?php
                        if ($meta_position === 'after-title') {
                            get_template_part('single', 'post-meta');
                        } ?>
                    <?php } ?>

                    <?php if ($author_box === 'show') { ?>
                        <div class="row position-relative no-gutters align-items-center border-top border-bottom  mt-5 mb-3">
                            <div class="col-md-6 py-3 pr-md-3">
                                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                                    <div class="media media-ie-fix align-items-center mr-5">
                                        <a class="d-block" href="#">
                                            <img class="rounded-circle mr-1"
                                                 src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), array('size' => 64))); ?>"
                                                 alt="<?php esc_attr_e('Author Avatar', 'attire-blog') ?>"></a>
                                        <div class="media-body pl-2">
                                            <h3 class="mb-1">
                                                <a class="media align-items-center font-weight-normal"
                                                   href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                                                   style="color: #797a95;"><?php the_author(); ?></a>
                                            </h3>
                                            <div class="text-nowrap">
                                                <div class="meta-link d-inline-block mr-2">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="17"
                                                         height="17" viewBox="0 0 17 17">
                                                        <path d="M14 2v-1h-3v1h-5v-1h-3v1h-3v15h17v-15h-3zM12 2h1v2h-1v-2zM4 2h1v2h-1v-2zM16 16h-15v-8.921h15v8.921zM1 6.079v-3.079h2v2h3v-2h5v2h3v-2h2v3.079h-15z"
                                                              fill="#000000"/>
                                                    </svg>
                                                    <?php echo get_the_date(); ?>
                                                </div>
                                                <span class="meta-divider"></span>
                                                <a class="meta-link font-size-xs" href="#comments" data-scroll="">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="17"
                                                         height="17" viewBox="0 0 17 17">
                                                        <path d="M15.5 0h-14c-0.827 0-1.5 0.673-1.5 1.5v10c0 0.827 0.673 1.5 1.5 1.5h0.5v4.102l4.688-4.102h8.812c0.827 0 1.5-0.673 1.5-1.5v-10c0-0.827-0.673-1.5-1.5-1.5zM16 11.5c0 0.275-0.224 0.5-0.5 0.5h-9.188l-3.312 2.898v-2.898h-1.5c-0.276 0-0.5-0.225-0.5-0.5v-10c0-0.275 0.224-0.5 0.5-0.5h14c0.276 0 0.5 0.225 0.5 0.5v10z"
                                                              fill="#000000"/>
                                                    </svg>
                                                    <?php echo esc_attr(get_comments_number()) ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-md-block position-absolute border-left h-100"
                                 style="top: 0; left: 50%; width: 1px;"></div>
                            <div class="col-md-6 pl-md-3 py-3 border-left">
                                <div class="d-flex align-items-center justify-content-end justify-content-md-end">
                                    <h3 class="text-nowrap font-weight-normal my-2 mr-3"
                                        style="color: #797a95;"><?php esc_attr_e('Share post:', 'attire-blog') ?></h3>
                                    <a class="social-btn sb-outline sb-facebook ml-2 my-2"
                                       onclick="window.open(this.href,'pop','width=600, height=400, scrollbars=no')"
                                       href="https://www.facebook.com/sharer/sharer.php?href=<?php echo esc_url($encoded_url); ?>"
                                       target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" viewBox="0 0 17 17">
                                            <path d="M12.461 5.57l-0.309 2.93h-2.342v8.5h-3.518v-8.5h-1.753v-2.93h1.753v-1.764c0-2.383 0.991-3.806 3.808-3.806h2.341v2.93h-1.465c-1.093 0-1.166 0.413-1.166 1.176v1.464h2.651z"
                                                  fill="#000000"/>
                                        </svg>
                                    </a>
                                    <a class="social-btn sb-outline sb-twitter ml-2 my-2"
                                       onclick="window.open(this.href,'pop','width=600, height=400, scrollbars=no')"
                                       target="_blank"
                                       href="https://twitter.com/intent/tweet?url=<?php echo esc_url($encoded_url); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" viewBox="0 0 17 17">
                                            <path d="M15.253 5.038c0.011 0.151 0.011 0.302 0.011 0.454 0 4.605-3.506 9.912-9.913 9.912-1.974 0-3.808-0.572-5.351-1.564 0.281 0.032 0.551 0.042 0.842 0.042 1.629 0 3.127-0.55 4.325-1.488-1.532-0.032-2.815-1.036-3.257-2.417 0.215 0.032 0.431 0.054 0.656 0.054 0.314 0 0.627-0.043 0.918-0.118-1.596-0.324-2.794-1.726-2.794-3.419 0-0.011 0-0.033 0-0.043 0.464 0.258 1.003 0.42 1.575 0.442-0.938-0.626-1.553-1.694-1.553-2.901 0-0.647 0.173-1.241 0.475-1.759 1.715 2.115 4.293 3.496 7.184 3.646-0.055-0.259-0.087-0.529-0.087-0.799 0-1.919 1.554-3.483 3.484-3.483 1.003 0 1.909 0.42 2.546 1.1 0.787-0.151 1.541-0.442 2.211-0.841-0.259 0.809-0.809 1.489-1.532 1.919 0.702-0.075 1.381-0.269 2.007-0.539-0.475 0.69-1.068 1.306-1.747 1.802z"
                                                  fill="#000000"/>
                                        </svg>
                                    </a>
                                    <a class="social-btn sb-outline sb-pinterest ml-2 my-2"
                                       onclick="window.open(this.href,'pop','width=600, height=400, scrollbars=no')"
                                       target="_blank"
                                       href="//pinterest.com/pin/create/link/?url=<?php echo esc_url($encoded_url); ?>">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="17" height="17"
                                             viewBox="0 0 17 17">
                                            <g>
                                            </g>
                                            <path d="M8.5 0.5c-4.418 0-8 3.581-8 8 0 3.275 1.97 6.090 4.789 7.327-0.022-0.559-0.005-1.229 0.139-1.837 0.153-0.649 1.029-4.359 1.029-4.359s-0.256-0.511-0.256-1.266c0-1.186 0.688-2.070 1.544-2.070 0.728 0 1.079 0.546 1.079 1.2 0 0.731-0.467 1.826-0.707 2.839-0.2 0.849 0.426 1.541 1.263 1.541 1.516 0 2.537-1.946 2.537-4.253 0-1.753-1.182-3.066-3.329-3.066-2.427 0-3.938 1.811-3.938 3.831 0 0.698 0.205 1.189 0.527 1.569 0.147 0.175 0.168 0.246 0.115 0.446-0.038 0.147-0.127 0.502-0.163 0.642-0.054 0.203-0.218 0.275-0.4 0.201-1.119-0.457-1.639-1.681-1.639-3.057 0-2.272 1.916-4.998 5.718-4.998 3.054 0 5.064 2.211 5.064 4.583 0 3.139-1.745 5.483-4.316 5.483-0.864 0-1.677-0.468-1.955-0.998 0 0-0.464 1.844-0.562 2.199-0.17 0.617-0.502 1.233-0.806 1.714 0.719 0.214 1.479 0.329 2.267 0.329 4.418 0 8-3.581 8-8s-3.582-8-8-8z"
                                                  fill="#000000"/>
                                        </svg>
                                    </a>
                                    <a class="social-btn sb-outline sb-linkedin ml-2 my-2"
                                       onclick="window.open(this.href,'pop','width=600, height=400, scrollbars=no')"
                                       target="_blank"
                                       href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo esc_url($encoded_url); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" viewBox="0 0 17 17">
                                            <path d="M0.698 5.823h3.438v10.323h-3.438v-10.323zM2.438 0.854c-1.167 0-1.938 0.771-1.938 1.782 0 0.989 0.74 1.781 1.896 1.781h0.021c1.198 0 1.948-0.792 1.938-1.781-0.011-1.011-0.74-1.782-1.917-1.782zM12.552 5.583c-1.829 0-2.643 1.002-3.094 1.709v-1.469h-3.427c0 0 0.042 0.969 0 10.323h3.427v-5.761c0-0.312 0.032-0.615 0.114-0.843 0.251-0.615 0.812-1.25 1.762-1.25 1.238 0 1.738 0.948 1.738 2.333v5.521h3.428v-5.917c0-3.167-1.688-4.646-3.948-4.646z"
                                                  fill="#000000"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div <?php post_class('post py-3 post-contents'); ?>>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                        <div class="clear"></div>

                        <?php wp_link_pages(); ?>

                        <div class="clear"></div>


                    </div>
                    <?php
                    if ($meta_position === 'after-content') {
                        get_template_part('single', 'post-meta');
                    } ?>
                    <div class="bc-border"></div>
                    <?php if (has_tag()) { ?>
                        <div class="single-post-tags card">
                            <div class="card-body">
                                <?php the_tags('<div class="post-tags">', ' ', '</div>'); ?>
                            </div>
                        </div>

                    <?php } ?>
                    <?php if (get_previous_post_link() || get_next_post_link()) { ?>
                        <div class="card d-block overflow-hidden post-navs <?php echo esc_attr($navigation_buttons); ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <?php if ($previous_post = get_previous_post()) echo esc_attr($previous_post->post_title); ?>
                                    </div>
                                    <div class="col-6 text-right">
                                        <?php if ($next_post = get_next_post()) echo esc_attr($next_post->post_title); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <?php previous_post_link('%link', '&#9664; ' . __('Previous Post', 'attire-blog')); ?>
                                    </div>
                                    <div class="col-6 text-right">
                                        <?php next_post_link('%link', __('Next Post', 'attire-blog') . ' &#9654;'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }

                    ?>
                    <div class="row">

                        <?php
                        //4 related posts
                        $tags = wp_get_post_tags(get_the_ID());
                        if ($tags) {
                            $first_tag = $tags[0]->term_id;
                            $args = array(
                                'tag__in' => array($first_tag),
                                'post__not_in' => array(get_the_ID()),
                                'posts_per_page' => 4
                            );
                            $my_query = new WP_Query($args);
                            if ($my_query->have_posts()) {
                                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                    <div class="archive-item mt-5 col-lg-6">
                                        <?php get_template_part("content", get_post_format()); ?>
                                    </div>
                                <?php
                                endwhile;
                            }
                            wp_reset_postdata();
                        }

                        ?>
                    </div>
                    <?php if (comments_open()) { ?>
                        <div class="bc-border mt-4"></div>
                        <div class=" mx_comments">
                            <div class="">

                                <?php comments_template(); ?>
                            </div>
                        </div>
                    <?php } ?>
                <?php endwhile; ?>
            </div>

        </div>
        <?php
        do_action(ATTIRE_THEME_PREFIX . "after_main_content_area");
        AttireFramework::DynamicSidebars('right'); ?>
    </div>

<?php get_footer();