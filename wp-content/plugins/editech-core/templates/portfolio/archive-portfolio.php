<?php
$style   = get_theme_mod('osf_portfolio_archive_style', 'list');

$columns = $style != 'list' ? get_theme_mod('osf_portfolio_archive_columns', '1') : '1';
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <?php
                if (have_posts()) : ?>

                    <div class="portfolio-<?php echo esc_attr($style) ?>" data-opal-columns="<?php echo esc_attr($columns) ?>">
                        <?php
                        /* Start the Loop */
                        while (have_posts()) : the_post(); ?>
                            <div class="column-item portfolio-entries">
                                <?php get_template_part('template-parts/portfolio/content'); ?>
                            </div>
                        <?php
                            /* End the Loop */
                        endwhile; ?>
                    </div>

                    <?php
                    the_posts_pagination(array(
                        'prev_text'          => '<span class="opal-icon-chevron-left"></span><span class="lexus-reader-text">' . esc_html__('Previous', 'editech-core') . '</span>',
                        'next_text'          => '<span class="lexus-reader-text">' . esc_html__('Next', 'editech-core') . '</span><span class="opal-icon-chevron-right"></span>',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__('Page', 'editech-core') . ' </span>',
                    ));

                else :
                    get_template_part('template-parts/post/content', 'none');

                endif;
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->
<?php get_footer();
