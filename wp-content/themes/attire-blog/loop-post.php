<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
    <div class="archive-div post row m-0">
        <!-- Sidebar-->
        <!--        <div class="col-lg-3 bg-gray">-->
        <!--            <div class="px-2 pt-4 mt-3">-->
        <!--                <div class="mb-5">-->
        <!--                    <h3 class="widget-title">--><?php //_e('Search blog', 'attire-blog'); ?><!--</h3>-->
        <!--                    <div class="input-group-overlay position-relative search">-->
        <!--                        <svg width="17px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">-->
        <!--                            <g>-->
        <!--                                <g>-->
        <!--                                    <path d="M225.474,0C101.151,0,0,101.151,0,225.474c0,124.33,101.151,225.474,225.474,225.474-->
        <!--                                                            c124.33,0,225.474-101.144,225.474-225.474C450.948,101.151,349.804,0,225.474,0z M225.474,409.323-->
        <!--                                                            c-101.373,0-183.848-82.475-183.848-183.848S124.101,41.626,225.474,41.626s183.848,82.475,183.848,183.848-->
        <!--                                                            S326.847,409.323,225.474,409.323z"/>-->
        <!--                                </g>-->
        <!--                            </g>-->
        <!--                            <g>-->
        <!--                                <g>-->
        <!--                                    <path d="M505.902,476.472L386.574,357.144c-8.131-8.131-21.299-8.131-29.43,0c-8.131,8.124-8.131,21.306,0,29.43l119.328,119.328-->
        <!--                                                            c4.065,4.065,9.387,6.098,14.715,6.098c5.321,0,10.649-2.033,14.715-6.098C514.033,497.778,514.033,484.596,505.902,476.472z"/>-->
        <!--                                </g>-->
        <!--                            </g>-->
        <!--                        </svg>-->
        <!--                        <form action="--><?php //echo esc_url(home_url('/')) ?><!--">-->
        <!--                            <input class="form-control" placeholder="Search" type="text" name="s" id="search"-->
        <!--                                   value="--><?php //the_search_query(); ?><!--"/>-->
        <!--                        </form>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="mb-5">-->
        <!--                    <h3 class="widget-title">--><?php //_e('Categories', 'attire-blog'); ?><!--</h3>-->
        <!--                    <ul class="p-0 m-0 list-unstyled cat-list">-->
        <!--                        --><?php //wp_list_categories('number=8&show_count=1&orderby=count&order=DESC&title_li=') ?>
        <!--                    </ul>-->
        <!--                </div>-->
        <!--                <div class="mb-5 tags">-->
        <!--                    <h3 class="widget-title">--><?php //_e('Popular tags', 'attire-blog'); ?><!--</h3>-->
        <!--                    <br>-->
        <!--                    --><?php //$tags = get_tags();
        //                    $args = array(
        //                        'smallest' => 16,
        //                        'largest' => 16,
        //                        'unit' => 'px',
        //                        'number' => 10,
        //                        'format' => 'flat',
        //                        'separator' => " ",
        //                        'orderby' => 'count',
        //                        'order' => 'DESC',
        //                        'show_count' => 0,
        //                        'echo' => false
        //                    );
        //
        //                    $tag_string = wp_generate_tag_cloud($tags, $args);
        //                    echo wp_kses_post($tag_string);
        //                    ?>
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <div class="row bg-white content mb-2 mb-sm-0 pb-sm-5">
            <?php
            $count = 0;
            $posts_per_row = AttireThemeEngine::NextGetOption('attire_posts_per_row', 3);

            while (have_posts()): the_post();
                ?>

                <div class="col-md pb-5">
                    <?php get_template_part("content", get_post_format(), ['posts_per_row' => $posts_per_row]); ?>
                    <div class="clear"></div>
                </div>

                <?php
                $count++;
                if ($count % $posts_per_row === 0) {
                    echo '<div class="w-100"></div>';
                }
            endwhile; ?>

        </div>
        <!-- pagination-->
        <div class="row m-0 mb-5">
            <nav class="pagi-wrap d-inline-block" aria-label="<?php _e('Page navigation example', 'attire-blog'); ?>">
                <?php
                global $wp_query;
                if ($wp_query->max_num_pages > 1) :
                    ?>
                    <div class="clear"></div>
                    <div id="nav-below" class="navigation post box arc">
                        <?php get_template_part('pagination'); ?>
                    </div>
                <?php endif;
                ?>
            </nav>

        </div>
        <!-- // pagination-->
    </div>
<?php

